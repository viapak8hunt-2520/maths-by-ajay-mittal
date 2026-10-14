<?php

namespace App\Services\Admin;

use App\Models\SiteSetting;

class SiteContentPersister
{
    public function save(array $validated): void
    {
        $homepageBase = SiteSetting::getValue('homepage', config('homepage'));
        $aboutBase = SiteSetting::getValue('about', config('about'));
        $contactBase = SiteSetting::getValue('site.contact', config('site.contact'));
        $socialBase = SiteSetting::getValue('site.social', config('site.social'));

        SiteSetting::setValue('homepage', 'homepage', $this->mergeHomepage($validated['homepage'] ?? [], $homepageBase));
        SiteSetting::setValue('about', 'about', $this->mergeAbout($validated['about'] ?? [], $aboutBase));
        SiteSetting::setValue('site', 'site.contact', $this->mergeContact($validated['contact'] ?? [], $contactBase));
        SiteSetting::setValue('site', 'site.social', array_replace_recursive($socialBase, $validated['social'] ?? []));
        SiteSetting::setValue('site', 'faqs.meta', [
            'title' => $validated['faqs']['title'] ?? config('faqs.title'),
            'intro' => $validated['faqs']['intro'] ?? config('faqs.intro'),
        ]);
    }

    protected function mergeHomepage(array $incoming, array $base): array
    {
        $merged = array_replace_recursive($base, $incoming);

        if (isset($incoming['intro']['highlights'])) {
            $merged['intro']['highlights'] = $this->filterKeyedRows(
                $incoming['intro']['highlights'],
                fn (array $row) => filled($row['label'] ?? '') || filled($row['value'] ?? ''),
            );
        }

        if (isset($incoming['why_choose']['items'])) {
            $merged['why_choose']['items'] = $this->filterKeyedRows(
                $incoming['why_choose']['items'],
                fn (array $row) => filled($row['title'] ?? '') || filled($row['description'] ?? ''),
            );
        }

        if (isset($incoming['methodology']['steps'])) {
            $merged['methodology']['steps'] = $this->filterKeyedRows(
                $incoming['methodology']['steps'],
                fn (array $row) => filled($row['title'] ?? '') || filled($row['description'] ?? ''),
            );
        }

        if (isset($incoming['coaching_modes']['modes'])) {
            $modes = [];
            foreach (array_values($incoming['coaching_modes']['modes']) as $index => $mode) {
                if (! filled($mode['title'] ?? '') && ! filled($mode['description'] ?? '')) {
                    continue;
                }
                $baseMode = $base['coaching_modes']['modes'][$index] ?? ['cta' => ['route' => 'contact', 'label' => 'Enquire']];
                $modes[] = [
                    'title' => $mode['title'] ?? '',
                    'description' => $mode['description'] ?? '',
                    'cta' => [
                        'label' => $mode['cta_label'] ?? ($baseMode['cta']['label'] ?? 'Enquire'),
                        'route' => $baseMode['cta']['route'] ?? 'contact',
                    ],
                ];
            }
            $merged['coaching_modes']['modes'] = $modes ?: ($base['coaching_modes']['modes'] ?? []);
        }

        $merged['hero']['primary_cta']['route'] = $base['hero']['primary_cta']['route'] ?? 'courses.index';
        $merged['hero']['secondary_cta']['route'] = $base['hero']['secondary_cta']['route'] ?? 'contact';

        return $merged;
    }

    protected function mergeAbout(array $incoming, array $base): array
    {
        $merged = array_replace_recursive($base, $incoming);

        if (isset($incoming['sections'])) {
            $merged['sections'] = $this->filterKeyedRows(
                $incoming['sections'],
                fn (array $row) => filled($row['title'] ?? '') || filled($row['body'] ?? ''),
            );
        }

        return $merged;
    }

    protected function mergeContact(array $incoming, array $base): array
    {
        $merged = array_replace_recursive($base, $incoming);

        if (isset($incoming['address'])) {
            $merged['address'] = array_replace_recursive($base['address'] ?? [], $incoming['address']);
        }

        return $merged;
    }

    /**
     * @param  array<int|string, array<string, mixed>>  $rows
     * @return list<array<string, mixed>>
     */
    protected function filterKeyedRows(array $rows, callable $keep): array
    {
        return array_values(array_filter(array_map(
            fn ($row) => is_array($row) ? $row : [],
            $rows,
        ), $keep));
    }
}

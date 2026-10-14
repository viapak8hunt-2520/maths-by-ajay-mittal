<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class SiteConfigService
{
    public function mergeIntoConfig(): void
    {
        if (! $this->databaseReady()) {
            return;
        }

        $site = SiteSetting::getValue('site.contact');
        if (is_array($site)) {
            config(['site.contact' => array_replace_recursive(config('site.contact', []), $site)]);
        }

        $social = SiteSetting::getValue('site.social');
        if (is_array($social)) {
            config(['site.social' => array_replace_recursive(config('site.social', []), $social)]);
        }

        $homepage = SiteSetting::getValue('homepage');
        if (is_array($homepage)) {
            config(['homepage' => array_replace_recursive(config('homepage', []), $homepage)]);
        }

        $about = SiteSetting::getValue('about');
        if (is_array($about)) {
            config(['about' => array_replace_recursive(config('about', []), $about)]);
        }

        $faqsMeta = SiteSetting::getValue('faqs.meta');
        if (is_array($faqsMeta)) {
            config(['faqs.title' => $faqsMeta['title'] ?? config('faqs.title')]);
            config(['faqs.intro' => $faqsMeta['intro'] ?? config('faqs.intro')]);
        }
    }

    protected function databaseReady(): bool
    {
        try {
            return Cache::remember('site_settings.schema_ready', 60, fn () => Schema::hasTable('site_settings'));
        } catch (\Throwable) {
            return false;
        }
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage-content') ?? false;
    }

    public function rules(): array
    {
        return [
            'homepage.hero.headline' => ['required', 'string', 'max:500'],
            'homepage.hero.subheadline' => ['required', 'string', 'max:2000'],
            'homepage.hero.primary_cta.label' => ['required', 'string', 'max:120'],
            'homepage.hero.secondary_cta.label' => ['required', 'string', 'max:120'],

            'homepage.intro.title' => ['required', 'string', 'max:255'],
            'homepage.intro.lead' => ['required', 'string', 'max:2000'],
            'homepage.intro.body' => ['nullable', 'string', 'max:5000'],
            'homepage.intro.highlights' => ['nullable', 'array'],
            'homepage.intro.highlights.*.label' => ['nullable', 'string', 'max:120'],
            'homepage.intro.highlights.*.value' => ['nullable', 'string', 'max:500'],

            'homepage.why_choose.title' => ['required', 'string', 'max:255'],
            'homepage.why_choose.items' => ['nullable', 'array'],
            'homepage.why_choose.items.*.title' => ['nullable', 'string', 'max:255'],
            'homepage.why_choose.items.*.description' => ['nullable', 'string', 'max:2000'],

            'homepage.methodology.title' => ['required', 'string', 'max:255'],
            'homepage.methodology.steps' => ['nullable', 'array'],
            'homepage.methodology.steps.*.title' => ['nullable', 'string', 'max:255'],
            'homepage.methodology.steps.*.description' => ['nullable', 'string', 'max:2000'],

            'homepage.coaching_modes.title' => ['required', 'string', 'max:255'],
            'homepage.coaching_modes.modes' => ['nullable', 'array'],
            'homepage.coaching_modes.modes.*.title' => ['nullable', 'string', 'max:255'],
            'homepage.coaching_modes.modes.*.description' => ['nullable', 'string', 'max:2000'],
            'homepage.coaching_modes.modes.*.cta_label' => ['nullable', 'string', 'max:120'],

            'homepage.admission_cta.title' => ['required', 'string', 'max:255'],
            'homepage.admission_cta.description' => ['required', 'string', 'max:2000'],

            'about.seo.title' => ['required', 'string', 'max:255'],
            'about.seo.description' => ['required', 'string', 'max:500'],
            'about.hero.title' => ['required', 'string', 'max:255'],
            'about.hero.subtitle' => ['required', 'string', 'max:500'],
            'about.sections' => ['nullable', 'array'],
            'about.sections.*.title' => ['nullable', 'string', 'max:255'],
            'about.sections.*.body' => ['nullable', 'string', 'max:5000'],

            'contact.phone' => ['required', 'string', 'max:40'],
            'contact.phone_display' => ['required', 'string', 'max:40'],
            'contact.email' => ['required', 'email', 'max:255'],
            'contact.whatsapp' => ['required', 'string', 'max:20'],
            'contact.whatsapp_message' => ['required', 'string', 'max:500'],
            'contact.address.line1' => ['nullable', 'string', 'max:255'],
            'contact.address.city' => ['nullable', 'string', 'max:120'],
            'contact.address.state' => ['nullable', 'string', 'max:120'],
            'contact.address.pin' => ['nullable', 'string', 'max:20'],

            'social.facebook' => ['nullable', 'string', 'max:500'],
            'social.instagram' => ['nullable', 'string', 'max:500'],
            'social.youtube' => ['nullable', 'string', 'max:500'],

            'faqs.title' => ['required', 'string', 'max:255'],
            'faqs.intro' => ['required', 'string', 'max:2000'],
        ];
    }
}

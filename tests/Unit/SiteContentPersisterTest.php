<?php

namespace Tests\Unit;

use App\Models\SiteSetting;
use App\Services\Admin\SiteContentPersister;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteContentPersisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_persists_structured_site_content(): void
    {
        $payload = [
            'homepage' => [
                'hero' => [
                    'headline' => 'New headline',
                    'subheadline' => 'New sub',
                    'primary_cta' => ['label' => 'Courses'],
                    'secondary_cta' => ['label' => 'Contact us'],
                ],
                'intro' => [
                    'title' => 'Intro title',
                    'lead' => 'Intro lead',
                    'body' => 'Intro body',
                    'highlights' => [
                        ['label' => 'A', 'value' => 'B'],
                    ],
                ],
                'why_choose' => [
                    'title' => 'Why us',
                    'items' => [
                        ['title' => 'Reason', 'description' => 'Because'],
                    ],
                ],
                'methodology' => [
                    'title' => 'Method',
                    'steps' => [
                        ['title' => 'Step 1', 'description' => 'Do this'],
                    ],
                ],
                'coaching_modes' => [
                    'title' => 'Modes',
                    'modes' => [
                        ['title' => 'Offline', 'description' => 'In class', 'cta_label' => 'Enquire'],
                    ],
                ],
                'admission_cta' => [
                    'title' => 'Join',
                    'description' => 'Apply today',
                ],
            ],
            'about' => [
                'seo' => ['title' => 'About SEO', 'description' => 'About meta'],
                'hero' => ['title' => 'About us', 'subtitle' => 'Our story'],
                'sections' => [
                    ['title' => 'Section', 'body' => 'Body text'],
                ],
            ],
            'contact' => [
                'phone' => '+911111111111',
                'phone_display' => '+91 11111 11111',
                'email' => 'admin@example.com',
                'whatsapp' => '911111111111',
                'whatsapp_message' => 'Hello',
                'address' => [
                    'line1' => 'Line 1',
                    'city' => 'City',
                    'state' => 'State',
                    'pin' => '110001',
                ],
            ],
            'social' => [
                'facebook' => 'https://facebook.com/page',
                'instagram' => '',
                'youtube' => '',
            ],
            'faqs' => [
                'title' => 'FAQ title',
                'intro' => 'FAQ intro',
            ],
        ];

        app(SiteContentPersister::class)->save($payload);

        SiteSetting::query()->where('key', 'homepage')->first();
        $this->assertSame('New headline', SiteSetting::getValue('homepage')['hero']['headline']);
        $this->assertSame('admin@example.com', SiteSetting::getValue('site.contact')['email']);
        $this->assertSame('FAQ title', SiteSetting::getValue('faqs.meta')['title']);
        $this->assertSame('contact', SiteSetting::getValue('homepage')['hero']['secondary_cta']['route']);
    }
}

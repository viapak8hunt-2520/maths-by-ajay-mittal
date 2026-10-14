<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Faq;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about', [
            'content' => config('about'),
            'seo' => config('about.seo'),
        ]);
    }

    public function results(): View
    {
        return view('pages.results', [
            'results' => [
                'enabled' => $this->achievements()->isNotEmpty(),
                'intro' => config('testimonials.results.intro'),
                'items' => $this->achievements()->all(),
            ],
            'testimonials' => [
                'enabled' => $this->testimonials()->isNotEmpty(),
                'intro' => config('testimonials.testimonials.intro'),
                'items' => $this->testimonials()->all(),
            ],
            'seo' => [
                'title' => 'Results & Testimonials — '.config('site.name'),
                'description' => 'Student achievements and testimonials from Mathematics by Ajay Mittal.',
            ],
        ]);
    }

    public function faq(): View
    {
        return view('pages.faq', [
            'faqs' => [
                'title' => config('faqs.title'),
                'intro' => config('faqs.intro'),
                'items' => $this->faqItems(),
            ],
            'seo' => [
                'title' => 'FAQ — '.config('site.name'),
                'description' => config('faqs.intro'),
            ],
        ]);
    }

    protected function faqItems(): array
    {
        if (! Schema::hasTable('faqs')) {
            return config('faqs.items', []);
        }

        return Faq::query()->published()->ordered()->get()
            ->map(fn (Faq $faq) => ['question' => $faq->question, 'answer' => $faq->answer])
            ->all();
    }

    protected function achievements()
    {
        if (! Schema::hasTable('achievements')) {
            return collect();
        }

        return Achievement::query()->published()->orderBy('display_order')->get()
            ->map(fn (Achievement $a) => [
                'title' => $a->title,
                'description' => $a->description,
            ]);
    }

    protected function testimonials()
    {
        if (! Schema::hasTable('testimonials')) {
            return collect();
        }

        return Testimonial::query()->published()->orderBy('display_order')->get()
            ->map(fn (Testimonial $t) => [
                'name' => $t->student_name,
                'quote' => $t->quote,
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Support\Content\CourseCatalog;
use App\Support\Content\ResourceLibrary;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(CourseCatalog $courses, ResourceLibrary $resources): View
    {
        $featuredCourses = $courses->all()->take(config('homepage.featured_courses_limit', 3));
        $featuredResources = $resources->all()->take(config('homepage.featured_resources_limit', 6));

        $testimonials = $this->publishedTestimonials();
        $results = $this->publishedAchievements();

        return view('pages.home', [
            'categories' => $courses->categories(),
            'featuredCourses' => $featuredCourses,
            'featuredResources' => $featuredResources,
            'testimonials' => $testimonials->take(config('homepage.testimonials_limit', 3)),
            'results' => $results->take(config('homepage.results_preview_limit', 3)),
            'faqs' => $this->publishedFaqs(),
            'seo' => [
                'title' => config('site.name').' — Mathematics Coaching',
                'description' => config('site.tagline'),
            ],
        ]);
    }

    protected function publishedFaqs(): array
    {
        if (! Schema::hasTable('faqs')) {
            return config('faqs.items', []);
        }

        return Faq::query()->published()->ordered()->get()
            ->map(fn (Faq $faq) => ['question' => $faq->question, 'answer' => $faq->answer])
            ->all();
    }

    protected function publishedTestimonials()
    {
        if (! Schema::hasTable('testimonials')) {
            $config = config('testimonials');
            if ($config['testimonials']['enabled'] ?? false) {
                return collect($config['testimonials']['items'] ?? []);
            }

            return collect($config['placeholder_testimonials'] ?? []);
        }

        $items = Testimonial::query()->published()->orderBy('display_order')->get();

        if ($items->isEmpty()) {
            return collect(config('testimonials.placeholder_testimonials', []));
        }

        return $items->map(fn (Testimonial $t) => [
            'name' => $t->student_name,
            'course' => $t->course_label,
            'quote' => $t->quote,
            'is_placeholder' => false,
        ]);
    }

    protected function publishedAchievements()
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
}

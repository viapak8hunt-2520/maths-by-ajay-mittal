<?php

namespace App\Http\Controllers;

use App\Support\Content\CourseCatalog;
use App\Support\Content\ResourceLibrary;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(CourseCatalog $courses, ResourceLibrary $resources): Response
    {
        $urls = [
            route('home'),
            route('courses.index'),
            route('resources.index'),
            route('results'),
            route('about'),
            route('contact'),
            route('faq'),
        ];

        foreach ($courses->all() as $course) {
            $urls[] = route('courses.show', $course['slug']);
        }

        foreach ($resources->all() as $resource) {
            $urls[] = route('resources.show', $resource['slug']);
        }

        $xml = view('seo.sitemap', ['urls' => $urls])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}

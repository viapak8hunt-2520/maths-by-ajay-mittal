<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSiteContentRequest;
use App\Models\SiteSetting;
use App\Services\Admin\SiteContentPersister;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteContentController extends Controller
{
    public function edit(): View
    {
        return view('admin.site-content.edit', [
            'homepage' => SiteSetting::getValue('homepage', config('homepage')),
            'about' => SiteSetting::getValue('about', config('about')),
            'contact' => SiteSetting::getValue('site.contact', config('site.contact')),
            'social' => SiteSetting::getValue('site.social', config('site.social')),
            'faqsMeta' => SiteSetting::getValue('faqs.meta', [
                'title' => config('faqs.title'),
                'intro' => config('faqs.intro'),
            ]),
        ]);
    }

    public function update(UpdateSiteContentRequest $request, SiteContentPersister $persister): RedirectResponse
    {
        $persister->save($request->validated());

        return redirect()->route('admin.site-content.edit')->with('success', 'Website content updated.');
    }
}

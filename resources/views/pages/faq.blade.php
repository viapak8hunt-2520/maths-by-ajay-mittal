<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'FAQ'],
]">
    <x-site.page-heading :title="$faqs['title']" :lead="$faqs['intro']" />

    <section class="container-page max-w-3xl pb-14">
        <x-site.faq-accordion :items="$faqs['items']" />
    </section>

    <x-site.contact-cta />
</x-layouts.app>

@php
    $contact = config('site.contact');
    $wa = 'https://wa.me/'.preg_replace('/\D/', '', $contact['whatsapp']).'?text='.urlencode($contact['whatsapp_message']);
@endphp

<section class="band-navy text-white">
    <div class="container-page grid gap-8 py-14 lg:grid-cols-[1.2fr_1fr] lg:items-center">
        <div>
            <h2 class="font-display text-3xl font-semibold sm:text-4xl">{{ config('homepage.admission_cta.title') }}</h2>
            <p class="mt-3 max-w-xl text-sm leading-relaxed text-white/80 sm:text-base">{{ config('homepage.admission_cta.description') }}</p>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
            <x-ui.button href="{{ route('contact') }}" variant="gold" class="w-full">Contact form</x-ui.button>
            <x-ui.button href="{{ $wa }}" variant="secondary" class="w-full border-white/20 bg-transparent text-white hover:bg-white/10">WhatsApp</x-ui.button>
            <x-ui.button href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}" variant="secondary" class="w-full border-white/20 bg-transparent text-white hover:bg-white/10">Call {{ $contact['phone_display'] }}</x-ui.button>
        </div>
    </div>
</section>

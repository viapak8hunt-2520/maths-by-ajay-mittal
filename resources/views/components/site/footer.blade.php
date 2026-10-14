@php
    $contact = config('site.contact');
    $categories = config('courses.categories', []);
    $social = config('site.social', []);
    $copyright = str_replace(':year', date('Y'), config('site.footer.copyright'));
@endphp

<footer class="band-navy border-t border-brand-royal/25 text-white">
    <div class="container-page grid gap-10 py-12 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <p class="font-display text-xl font-semibold">Mathematics by Ajay Mittal</p>
            <p class="mt-3 text-sm leading-relaxed text-white/75">{{ config('site.tagline') }}</p>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">Explore</p>
            <ul class="mt-4 space-y-2 text-sm text-white/80">
                @foreach (config('site.navigation', []) as $item)
                    <li><a href="{{ route($item['route']) }}" class="hover:text-white">{{ $item['label'] }}</a></li>
                @endforeach
                <li><a href="{{ route('faq') }}" class="hover:text-white">FAQ</a></li>
            </ul>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">Courses</p>
            <ul class="mt-4 space-y-2 text-sm text-white/80">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('courses.index', ['category' => $category['id']]) }}" class="hover:text-white">
                            {{ $category['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-gold">Contact</p>
            <ul class="mt-4 space-y-2 text-sm text-white/80">
                <li><a href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}" class="hover:text-white">{{ $contact['phone_display'] }}</a></li>
                <li><a href="mailto:{{ $contact['email'] }}" class="hover:text-white">{{ $contact['email'] }}</a></li>
            </ul>
            @if (collect($social)->filter()->isNotEmpty())
                <div class="mt-4 flex flex-wrap gap-3 text-sm">
                    @if ($social['youtube'] ?? false)
                        <a href="{{ $social['youtube'] }}" class="text-white/80 hover:text-white" rel="noopener noreferrer">YouTube</a>
                    @endif
                    @if ($social['instagram'] ?? false)
                        <a href="{{ $social['instagram'] }}" class="text-white/80 hover:text-white" rel="noopener noreferrer">Instagram</a>
                    @endif
                    @if ($social['facebook'] ?? false)
                        <a href="{{ $social['facebook'] }}" class="text-white/80 hover:text-white" rel="noopener noreferrer">Facebook</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="container-page flex flex-col gap-2 py-6 text-xs text-white/60 sm:flex-row sm:items-center sm:justify-between">
            <p>{{ $copyright }}</p>
            <p>Free study resources · Admission enquiries welcome</p>
        </div>
    </div>
</footer>

@php
    $contact = config('site.contact');
    $wa = 'https://wa.me/'.preg_replace('/\D/', '', $contact['whatsapp']).'?text='.urlencode($contact['whatsapp_message']);
    $selectedCourse = old('course_interest', $prefillCourseTitle ?? '');
@endphp

<x-layouts.app :seo="$seo" :breadcrumbs="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Contact'],
]">
    <x-site.page-heading
        title="Contact & admissions"
        lead="Tell us about the student’s class, goals and preferred teaching mode. We will respond as soon as possible."
    />

    <section class="container-page grid gap-10 pb-14 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="card">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-brand-success/30 bg-green-50 px-4 py-3 text-sm text-brand-success" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                    <p class="font-semibold">Please correct the following:</p>
                    <ul class="mt-2 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('contact.store') }}" class="grid gap-4">
                @csrf
                <div class="hidden" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                </div>

                <div>
                    <label for="student_name" class="text-sm font-medium">Student name *</label>
                    <input id="student_name" name="student_name" value="{{ old('student_name') }}" required
                           class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                </div>
                <div>
                    <label for="parent_name" class="text-sm font-medium">Parent / guardian name</label>
                    <input id="parent_name" name="parent_name" value="{{ old('parent_name') }}"
                           class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="phone" class="text-sm font-medium">Phone *</label>
                        <input id="phone" name="phone" value="{{ old('phone') }}" required
                               class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    </div>
                    <div>
                        <label for="email" class="text-sm font-medium">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    </div>
                </div>
                <div>
                    <label for="course_interest" class="text-sm font-medium">Course or class of interest *</label>
                    <input id="course_interest" name="course_interest" list="course-options" value="{{ $selectedCourse }}" required
                           class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                    <datalist id="course-options">
                        @foreach ($courses as $course)
                            <option value="{{ $course['title'] }}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div>
                    <label for="teaching_mode" class="text-sm font-medium">Preferred teaching mode *</label>
                    <select id="teaching_mode" name="teaching_mode" required class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">
                        <option value="">Select…</option>
                        @foreach (['offline' => 'Offline classroom', 'online' => 'Online', 'either' => 'Either mode'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('teaching_mode') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="message" class="text-sm font-medium">Message</label>
                    <textarea id="message" name="message" rows="4" class="mt-1 w-full rounded-lg border border-brand-navy/15 px-3 py-2 text-sm">{{ old('message') }}</textarea>
                </div>
                <x-ui.button type="submit" variant="primary">Submit enquiry</x-ui.button>
            </form>
        </div>

        <aside class="space-y-6">
            <div class="card">
                <h2 class="font-display text-lg font-semibold">Contact information</h2>
                <ul class="mt-4 space-y-3 text-sm text-brand-muted">
                    <li><span class="font-medium text-brand-navy">Phone:</span> <a href="tel:{{ preg_replace('/\s+/', '', $contact['phone']) }}" class="text-brand-royal">{{ $contact['phone_display'] }}</a></li>
                    <li><span class="font-medium text-brand-navy">Email:</span> <a href="mailto:{{ $contact['email'] }}" class="text-brand-royal">{{ $contact['email'] }}</a></li>
                    <li><span class="font-medium text-brand-navy">Address:</span> {{ $contact['address']['line1'] }}, {{ $contact['address']['city'] }}</li>
                </ul>
                <div class="mt-5 flex flex-col gap-2">
                    <x-ui.button href="{{ $wa }}" variant="primary" class="w-full">WhatsApp</x-ui.button>
                </div>
            </div>

            @if ($contact['address']['map_embed_url'] ?? false)
                <div class="card overflow-hidden p-0">
                    <iframe title="Location map" src="{{ $contact['address']['map_embed_url'] }}" class="min-h-64 w-full border-0" loading="lazy"></iframe>
                </div>
            @endif
        </aside>
    </section>
</x-layouts.app>

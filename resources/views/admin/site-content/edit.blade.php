@extends('admin.layouts.app')
@section('page_title', 'Website content')
@section('content')
    @php
        $h = fn (string $path, mixed $default = '') => old('homepage.'.$path, data_get($homepage, $path, $default));
        $a = fn (string $path, mixed $default = '') => old('about.'.$path, data_get($about, $path, $default));
        $c = fn (string $path, mixed $default = '') => old('contact.'.$path, data_get($contact, $path, $default));
        $s = fn (string $key, mixed $default = '') => old("social.{$key}", data_get($social, $key, $default));
        $f = fn (string $key, mixed $default = '') => old("faqs.{$key}", data_get($faqsMeta, $key, $default));
    @endphp

    <x-admin.page-header title="Website content" lead="Edit text shown on the homepage, about page, contact details and FAQ heading — saved to the database and used on the public site." />

    @if ($errors->any())
        <div class="admin-alert-error mb-4">
            <p class="font-semibold">Please fix the highlighted fields:</p>
            <ul class="mt-2 list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('admin.site-content.update') }}" class="admin-card w-full max-w-none" x-data="{ tab: '{{ old('_tab', 'homepage') }}' }">
        @csrf
        @method('PUT')
        <input type="hidden" name="_tab" x-model="tab">

        <nav class="admin-tabs" role="tablist">
            @foreach ([
                'homepage' => 'Homepage',
                'about' => 'About page',
                'contact' => 'Contact & social',
                'faqs' => 'FAQ page',
            ] as $key => $label)
                <button type="button" role="tab" class="admin-tab" :class="tab === '{{ $key }}' && 'admin-tab-active'" @click="tab = '{{ $key }}'">{{ $label }}</button>
            @endforeach
        </nav>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'homepage'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            @include('admin.site-content.partials.tab-homepage')
        </div>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'about'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            @include('admin.site-content.partials.tab-about')
        </div>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'contact'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            @include('admin.site-content.partials.tab-contact')
        </div>

        <div class="admin-tab-panel space-y-6" x-show="tab === 'faqs'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            @include('admin.site-content.partials.tab-faqs')
        </div>

        <div class="admin-form-actions mt-8">
            <button class="admin-btn-primary" type="submit">Save website content</button>
        </div>
    </form>
@endsection

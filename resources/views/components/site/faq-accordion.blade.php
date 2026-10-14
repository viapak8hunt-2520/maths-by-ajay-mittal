@props(['items' => []])

<div class="divide-y divide-brand-navy/10 rounded-2xl border border-brand-navy/10 bg-white">
    @foreach ($items as $index => $item)
        <div>
            <button type="button"
                    class="faq-accordion-trigger flex w-full items-center justify-between gap-4 px-5 py-4 text-left text-sm font-semibold text-brand-navy transition hover:bg-brand-ivory/80 sm:text-base"
                    data-accordion-trigger
                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-controls="faq-panel-{{ $index }}">
                <span>{{ $item['question'] }}</span>
                <span aria-hidden="true" class="faq-accordion-icon text-brand-royal transition-transform duration-300">+</span>
            </button>
            <div id="faq-panel-{{ $index }}"
                 @class(['faq-accordion-panel px-5 pb-4 text-sm leading-relaxed text-brand-muted', 'hidden' => $index !== 0])>
                {{ $item['answer'] }}
            </div>
        </div>
    @endforeach
</div>

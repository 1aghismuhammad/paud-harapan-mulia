@props([
    'image' => null,
    'date',
    'title',
    'excerpt',
    'url' => null,
    'author' => null,
    'placeholder' => false,
])

@if ($url)
    <a href="{{ $url }}" class="news-reference-card block h-full">
@else
    <article class="news-reference-card block h-full">
@endif
        @if ($image)
            <div class="aspect-[1.32/1] overflow-hidden bg-slate-100">
                <img
                    src="{{ $image }}"
                    alt=""
                    class="h-full w-full object-cover transition duration-500 hover:scale-[1.025]"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        @endif

        <div class="relative {{ $image ? '' : 'pt-2' }}">
            <div class="news-meta-strip {{ $image ? '' : 'static mx-5 mt-5 translate-y-0' }}">
                <span class="inline-flex items-center gap-1">
                    <span class="text-brand-green-600">◷</span>
                    {{ $date }}
                </span>
                <span class="inline-flex min-w-0 items-center gap-1">
                    <span class="text-brand-green-600">◌</span>
                    <span class="truncate">{{ $placeholder ? 'Preview' : ($author ?: 'PAUD Harapan Mulia') }}</span>
                </span>
            </div>

            <div class="px-7 {{ $image ? 'pt-8' : 'pt-6' }} pb-7">
                <h3 class="text-[18px] leading-[1.45] font-semibold tracking-[-0.02em] text-site-text">
                    {{ $title }}
                </h3>

                <p class="mt-5 text-[12px] leading-7 text-site-muted">
                    {{ $excerpt }}
                </p>

                <span class="mt-7 inline-flex items-center gap-2 text-[10px] font-semibold tracking-[0.14em] text-brand-green-600 uppercase">
                    Baca Selengkapnya
                    <span aria-hidden="true">→</span>
                </span>
            </div>
        </div>
@if ($url)
    </a>
@else
    </article>
@endif

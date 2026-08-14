@props([
    'image',
    'date',
    'title',
    'excerpt',
    'placeholder' => true,
])

<article class="news-reference-card">
    <div class="aspect-[1.32/1] overflow-hidden bg-slate-100">
        <img
            src="{{ asset($image) }}"
            alt=""
            class="h-full w-full object-cover transition duration-500 hover:scale-[1.025]"
        >
    </div>

    <div class="relative">
        <div class="news-meta-strip">
            <span class="inline-flex items-center gap-1">
                <span class="text-brand-green-600">◷</span>
                {{ $date }}
            </span>
            <span class="inline-flex items-center gap-1">
                <span class="text-brand-green-600">◌</span>
                {{ $placeholder ? 'Preview' : '0 Komentar' }}
            </span>
        </div>

        <div class="px-7 pt-8 pb-7">
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
</article>

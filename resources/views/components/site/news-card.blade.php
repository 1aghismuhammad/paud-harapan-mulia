@props([
    'image',
    'date',
    'title',
    'excerpt',
    'placeholder' => true,
])

<article class="soft-card overflow-hidden">
    <div class="aspect-video overflow-hidden bg-slate-100">
        <img src="{{ asset($image) }}" alt="" class="h-full w-full object-cover transition duration-500 hover:scale-[1.03]">
    </div>
    <div class="p-5 md:p-6">
        <div class="flex items-center justify-between gap-3">
            <time class="text-[11px] font-medium text-brand-green-600">{{ $date }}</time>
            @if ($placeholder)
                <span class="rounded-full bg-brand-yellow-400/15 px-2 py-1 text-[9px] font-semibold tracking-wide text-amber-700 uppercase">Preview</span>
            @endif
        </div>
        <h3 class="mt-3 text-lg leading-7 font-semibold text-site-text">{{ $title }}</h3>
        <p class="mt-3 text-sm leading-6 text-site-muted">{{ $excerpt }}</p>
        <span class="mt-5 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.08em] text-brand-green-700 uppercase">
            Baca Selengkapnya
            <span aria-hidden="true">→</span>
        </span>
    </div>
</article>

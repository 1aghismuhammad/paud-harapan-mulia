@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'breadcrumb' => null,
])

<section class="inner-page-hero">
    <div class="inner-page-hero-inner">
        <div>
            @if ($eyebrow)
                <p class="mb-3 text-[11px] font-medium text-brand-yellow-400">{{ $eyebrow }}</p>
            @endif

            <h1 class="max-w-3xl text-[30px] font-semibold tracking-[-0.035em] md:text-[36px]">
                {{ $title }}
            </h1>

            @if ($description)
                <p class="sr-only">{{ $description }}</p>
            @endif
        </div>

        <div class="inner-page-breadcrumb">
            <a href="{{ route('home') }}" class="text-site-text">Beranda</a>
            <span class="mx-2 text-site-muted">/</span>
            <span class="text-brand-green-600">{{ $breadcrumb ?? $title }}</span>
        </div>
    </div>
</section>

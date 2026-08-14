@props([
    'eyebrow' => 'PAUD Harapan Mulia',
    'title',
    'description' => null,
])

<section class="relative overflow-hidden bg-brand-green-950 py-16 text-white md:py-20">
    <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(circle at 15% 25%, #93c854 0, transparent 30%), radial-gradient(circle at 85% 0%, #f4c90f 0, transparent 22%);"></div>
    <div class="site-container relative">
        <p class="text-xs font-semibold tracking-[0.14em] text-brand-yellow-400 uppercase">{{ $eyebrow }}</p>
        <h1 class="mt-3 max-w-3xl text-3xl font-semibold tracking-[-0.03em] md:text-5xl">{{ $title }}</h1>
        @if ($description)
            <p class="mt-5 max-w-2xl text-sm leading-7 text-white/75 md:text-base">{{ $description }}</p>
        @endif
    </div>
</section>

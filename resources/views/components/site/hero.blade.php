@php
    $slides = [
        ['image' => 'images/paud/hero-sekolah.jpeg', 'alt' => 'Kegiatan bersama siswa dan keluarga PAUD Harapan Mulia'],
        ['image' => 'images/paud/hero-akhirussanah.jpeg', 'alt' => 'Dokumentasi kegiatan akhirussanah PAUD Harapan Mulia'],
        ['image' => 'images/paud/hero-parenting.jpeg', 'alt' => 'Kegiatan home parenting PAUD Harapan Mulia'],
    ];
@endphp

<section class="site-container pt-0 md:pt-0" aria-label="Dokumentasi utama sekolah">
    <div data-carousel class="group relative overflow-hidden bg-slate-100 shadow-sm">
        <div class="relative aspect-[4/3] sm:aspect-[16/9] lg:aspect-[16/7]">
            @foreach ($slides as $index => $slide)
                <div data-carousel-slide @if ($index !== 0) hidden @endif class="absolute inset-0">
                    <img
                        src="{{ asset($slide['image']) }}"
                        alt="{{ $slide['alt'] }}"
                        class="h-full w-full object-cover"
                        @if ($index === 0) fetchpriority="high" @else loading="lazy" @endif
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-transparent"></div>
                </div>
            @endforeach
        </div>

        <button type="button" data-carousel-prev class="absolute top-1/2 left-3 inline-flex h-10 w-10 -translate-y-1/2 items-center justify-center bg-black/35 text-white transition hover:bg-brand-green-900 md:left-5" aria-label="Slide sebelumnya">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
        </button>

        <button type="button" data-carousel-next class="absolute top-1/2 right-3 inline-flex h-10 w-10 -translate-y-1/2 items-center justify-center bg-black/35 text-white transition hover:bg-brand-green-900 md:right-5" aria-label="Slide berikutnya">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
        </button>

        <div class="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-1.5" aria-label="Pilih slide">
            @foreach ($slides as $index => $slide)
                <button type="button" data-carousel-dot aria-label="Tampilkan slide {{ $index + 1 }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" class="h-2 w-2 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/40' }}"></button>
            @endforeach
        </div>
    </div>
</section>

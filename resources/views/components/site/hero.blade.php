@php
    $slides = [
        ['image' => 'images/paud/hero-sekolah.jpeg', 'alt' => 'Kegiatan bersama siswa dan keluarga PAUD Harapan Mulia'],
        ['image' => 'images/paud/hero-akhirussanah.jpeg', 'alt' => 'Dokumentasi kegiatan akhirussanah PAUD Harapan Mulia'],
        ['image' => 'images/paud/hero-parenting.jpeg', 'alt' => 'Kegiatan home parenting PAUD Harapan Mulia'],
    ];
@endphp

<section class="relative" aria-label="Dokumentasi utama sekolah">
    <div class="reference-hero-container">
        <div data-carousel class="relative overflow-hidden bg-slate-100">
            <div class="relative aspect-[4/3] sm:aspect-[16/9] lg:aspect-[2.08/1]">
                @foreach ($slides as $index => $slide)
                    <div data-carousel-slide @if ($index !== 0) hidden @endif class="absolute inset-0">
                        <img
                            src="{{ asset($slide['image']) }}"
                            alt="{{ $slide['alt'] }}"
                            class="h-full w-full object-cover"
                            @if ($index === 0) fetchpriority="high" @else loading="lazy" @endif
                        >
                    </div>
                @endforeach
            </div>

            <div
                data-carousel-fade-layer
                class="pointer-events-none absolute inset-0 z-10 bg-white opacity-0"
                aria-hidden="true"
            ></div>

            <div class="absolute inset-x-0 bottom-0 z-20 flex h-11 items-center justify-center bg-black/22">
                <div class="flex gap-2">
                    @foreach ($slides as $index => $slide)
                        <button
                            type="button"
                            data-carousel-dot
                            aria-label="Tampilkan slide {{ $index + 1 }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            class="h-2.5 w-2.5 rounded-full border border-white/70 {{ $index === 0 ? 'bg-white' : 'bg-white/35' }}"
                        ></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button type="button" data-carousel-prev class="absolute top-1/2 left-0 hidden h-12 w-12 -translate-y-1/2 items-center justify-center bg-[#9c9c9c] text-white lg:inline-flex" aria-label="Slide sebelumnya">
        <span class="text-2xl">‹</span>
    </button>
    <button type="button" data-carousel-next class="absolute top-1/2 right-0 hidden h-12 w-12 -translate-y-1/2 items-center justify-center bg-[#9c9c9c] text-white lg:inline-flex" aria-label="Slide berikutnya">
        <span class="text-2xl">›</span>
    </button>
</section>

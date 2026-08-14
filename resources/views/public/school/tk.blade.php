@extends('layouts.public')

@section('title', 'TK — Harapan Mulia')
@section('meta_description', 'TK Islam Terpadu Harapan Mulia di Kecamatan Ngawen, Kabupaten Blora.')

@section('content')
    <section class="pt-8 md:pt-12 lg:pt-14">
        <div class="unit-hero-container">
            <div class="relative overflow-hidden">
                <img
                    src="{{ asset('images/paud/unit-tk.jpeg') }}"
                    alt="TK Islam Terpadu Harapan Mulia"
                    class="aspect-[4/3] w-full object-cover sm:aspect-[16/8] lg:aspect-[2.1/1]"
                >
                <div class="absolute inset-x-[22%] bottom-[8%] hidden min-h-16 items-center justify-center bg-white/95 px-6 text-center lg:flex">
                    <span class="text-[14px] font-medium tracking-[0.12em] text-brand-green-700 uppercase">TK Islam Terpadu Harapan Mulia</span>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-8 pb-16 md:pt-10 md:pb-20">
        <div class="content-container">
            <div class="text-center">
                <p class="eyebrow">TK Harapan Mulia</p>
                <h1 class="section-title">Profil TK</h1>
            </div>

            <div class="mt-9 grid items-start gap-8 lg:grid-cols-[0.95fr_1.05fr]">
                <div class="grid grid-cols-2 gap-3">
                    <img src="{{ asset('images/paud/visi-anak.jpeg') }}" alt="Siswa TK Harapan Mulia" class="aspect-[4/5] w-full rounded-[5px] object-cover">
                    <img src="{{ asset('images/paud/unit-tk.jpeg') }}" alt="Kegiatan TK Harapan Mulia" class="aspect-[4/5] w-full rounded-[5px] object-cover">
                </div>

                <div class="reference-body-copy">
                    <p>
                        TK IT Harapan Mulia melayani masyarakat sejak 2011 dan mengembangkan program keagamaan, parenting, serta pembelajaran yang mendukung kemandirian dan kreativitas anak.
                    </p>
                    <p class="mt-4">
                        Pembiasaan doa, praktik ibadah, pengenalan Al-Qur’an, pembelajaran kreatif, dan kolaborasi dengan orang tua menjadi arah utama layanan pendidikan.
                    </p>
                </div>
            </div>

            <div class="mt-9 space-y-5">
                <div class="unit-showcase-row">
                    <div class="unit-showcase-label bg-[#f1e2f4] text-site-text"><span>Fasilitas</span></div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ([
                            ['image' => 'images/paud/fasilitas-lingkungan.jpeg', 'label' => null],
                            ['image' => 'images/paud/fasilitas-aktivitas.jpeg', 'label' => 'Ruang & Lingkungan'],
                            ['image' => 'images/paud/profile-sekolah.jpeg', 'label' => null],
                        ] as $item)
                            <div class="reference-media-card aspect-square">
                                <img src="{{ asset($item['image']) }}" alt="">
                                @if ($item['label']) <div class="reference-media-overlay">{{ $item['label'] }}</div> @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="unit-showcase-row">
                    <div class="unit-showcase-label bg-[#fff9e4] text-site-text"><span>Aktivitas</span></div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ([
                            ['image' => 'images/paud/hero-sekolah.jpeg', 'label' => null],
                            ['image' => 'images/paud/visi-kegiatan.jpeg', 'label' => 'Kegiatan Kreatif'],
                            ['image' => 'images/paud/hero-akhirussanah.jpeg', 'label' => null],
                        ] as $item)
                            <div class="reference-media-card aspect-square">
                                <img src="{{ asset($item['image']) }}" alt="">
                                @if ($item['label']) <div class="reference-media-overlay">{{ $item['label'] }}</div> @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="unit-showcase-row">
                    <div class="unit-showcase-label bg-[#dff5f7] text-site-text"><span>Pembiasaan</span></div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ([
                            ['image' => 'images/paud/news-parenting.jpeg', 'label' => null],
                            ['image' => 'images/paud/news-kegiatan.jpeg', 'label' => 'Pembiasaan Islami'],
                            ['image' => 'images/paud/unit-paud.jpeg', 'label' => null],
                        ] as $item)
                            <div class="reference-media-card aspect-square">
                                <img src="{{ asset($item['image']) }}" alt="">
                                @if ($item['label']) <div class="reference-media-overlay">{{ $item['label'] }}</div> @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <section class="mt-14">
                <h2 class="text-center text-[30px] font-semibold tracking-[-0.035em] md:text-[36px]">Keunggulan TK</h2>

                <div class="mt-8 grid overflow-hidden rounded-[3px] border border-site-border md:grid-cols-[0.9fr_1.1fr]">
                    <div class="border-b border-site-border p-6 md:border-r md:border-b-0">
                        <ul class="space-y-4 text-[11px] leading-5 text-site-muted">
                            <li>Pembiasaan doa dan praktik ibadah</li>
                            <li>Pengenalan membaca Al-Qur’an</li>
                            <li>Pembelajaran kreatif dan menyenangkan</li>
                            <li>Program parenting</li>
                            <li>Pengembangan kemandirian anak</li>
                        </ul>
                    </div>

                    <div class="p-6 text-[11px] leading-6 text-site-muted">
                        TK Harapan Mulia menempatkan pembiasaan, kreativitas, kemandirian, dan kolaborasi dengan keluarga sebagai bagian dari proses pendidikan anak usia dini.
                    </div>
                </div>
            </section>

            <section class="mt-14">
                <h2 class="text-center text-[30px] font-semibold tracking-[-0.035em] md:text-[36px]">Berita TK</h2>

                <div class="mt-9 grid gap-6 md:grid-cols-3">
                    <x-site.news-card image="images/paud/news-parenting.jpeg" date="Preview Konten" title="Home Parenting TK Harapan Mulia" excerpt="Preview berita unit untuk kebutuhan review UI." />
                    <x-site.news-card image="images/paud/news-kegiatan.jpeg" date="Preview Konten" title="Pembelajaran Kreatif Siswa" excerpt="Preview berita unit untuk kebutuhan review UI." />
                    <x-site.news-card image="images/paud/news-akhirussanah.jpeg" date="Preview Konten" title="Dokumentasi Kegiatan Sekolah" excerpt="Preview berita unit untuk kebutuhan review UI." />
                </div>
            </section>
        </div>
    </section>
@endsection

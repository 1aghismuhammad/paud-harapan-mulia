@extends('layouts.public')

@section('title', 'PAUD Harapan Mulia — Beranda')
@section('meta_description', 'Website resmi PAUD Islam Terpadu Harapan Mulia di Ngawen, Blora.')

@section('content')
    <x-site.hero />

    {{-- 3 feature cards: overlap hero seperti reference --}}
    <section class="relative z-10 -mt-8 md:-mt-11">
        <div class="mx-auto grid w-[calc(100%-40px)] max-w-[820px] gap-3 md:grid-cols-3">
            @foreach ([
                ['title' => 'Lingkungan Islami', 'copy' => 'Pembiasaan doa, ibadah, dan pengenalan Al-Qur’an.', 'icon' => '✦'],
                ['title' => 'Pembelajaran Menyenangkan', 'copy' => 'Kegiatan kreatif yang mendukung kemandirian anak.', 'icon' => '▣'],
                ['title' => 'Pendampingan Orang Tua', 'copy' => 'Program parenting untuk menguatkan kolaborasi keluarga.', 'icon' => '◎'],
            ] as $item)
                <div class="reference-card flex min-h-[104px] items-center gap-4 rounded-[4px] px-5 py-4">
                    <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-md bg-brand-green-300/15 text-lg text-brand-green-700">{{ $item['icon'] }}</span>
                    <div>
                        <h2 class="text-[13px] leading-[1.35] font-semibold">{{ $item['title'] }}</h2>
                        <p class="mt-1 text-[10px] leading-[1.7] text-site-muted">{{ $item['copy'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Visi & Misi --}}
    <section class="pt-24 pb-20 md:pt-28 md:pb-24">
        <div class="content-container grid items-center gap-14 lg:grid-cols-[0.95fr_1.05fr] lg:gap-20">
            <div class="mx-auto w-full max-w-[460px]">
                <div class="grid grid-cols-2 gap-3">
                    <div class="mt-6 overflow-hidden rounded-[5px] shadow-[0_15px_35px_rgba(20,30,40,.08)]">
                        <img src="{{ asset('images/paud/visi-anak.jpeg') }}" alt="Kegiatan siswa PAUD Harapan Mulia" class="aspect-[4/5] w-full object-cover">
                    </div>
                    <div class="overflow-hidden rounded-[5px] shadow-[0_15px_35px_rgba(20,30,40,.08)]">
                        <img src="{{ asset('images/paud/visi-kegiatan.jpeg') }}" alt="Kegiatan belajar PAUD Harapan Mulia" class="aspect-[4/5] w-full object-cover">
                    </div>
                </div>
            </div>

            <div>
                <p class="eyebrow">PAUD Harapan Mulia</p>
                <h2 class="section-title">Visi & Misi Sekolah</h2>
                <p class="section-copy max-w-[530px]">
                    Mewujudkan generasi Islam yang sehat, mandiri, kreatif, berakhlak mulia, dan berjiwa Pancasila.
                </p>
                <ul class="mt-6 space-y-3 text-[13px] leading-6 text-site-muted">
                    @foreach ([
                        'Menciptakan lingkungan yang sehat, bersih, tertib, aman, dan nyaman.',
                        'Menanamkan sikap mandiri pada peserta didik.',
                        'Menciptakan pembelajaran yang kreatif dan menyenangkan.',
                        'Membiasakan berperilaku Islami dengan meneladani sikap Rasulullah.',
                    ] as $mission)
                        <li class="flex gap-3">
                            <span class="mt-1 text-brand-green-600">◉</span>
                            <span>{{ $mission }}</span>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('about.vision-mission') }}" class="mt-8 inline-flex rounded-[4px] bg-brand-green-600 px-6 py-3 text-[10px] font-semibold tracking-[.12em] text-white uppercase">Selengkapnya</a>
            </div>
        </div>
    </section>

    {{-- Profil --}}
    <section class="pb-24">
        <div class="content-container grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
            <div class="lg:pr-6">
                <p class="eyebrow">PAUD Harapan Mulia</p>
                <h2 class="section-title">Profil Sekolah</h2>
                <p class="section-copy">
                    TK IT Harapan Mulia berdiri di Kecamatan Ngawen, Blora pada tahun 2011. Sekolah hadir dekat dengan masyarakat dengan layanan pendidikan anak usia dini yang menguatkan pembiasaan keagamaan, kemandirian, pembelajaran kreatif, dan kerja sama dengan orang tua.
                </p>
                <a href="{{ route('about.history') }}" class="mt-7 inline-flex items-center gap-3 text-[13px] font-semibold text-site-text">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-brand-green-600 text-[10px] text-brand-green-600">▶</span>
                    Lihat Profil Sekolah
                </a>
            </div>

            <div class="relative overflow-hidden rounded-[5px] bg-brand-green-900">
                <img src="{{ asset('images/paud/profile-sekolah.jpeg') }}" alt="Dokumentasi PAUD Harapan Mulia" class="aspect-[4/3] w-full object-cover opacity-90">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-green-900/25 to-transparent"></div>
                <span class="absolute left-0 top-1/2 -translate-y-1/2 -rotate-90 bg-brand-green-600 px-5 py-2 text-[9px] tracking-[.16em] text-white uppercase">Harapan Mulia</span>
                <span class="absolute bottom-7 left-10 text-[26px] font-normal text-white">Video / Gambar</span>
            </div>
        </div>
    </section>

    {{-- Unit Pendidikan --}}
    <section class="border-t border-site-border py-14">
        <div class="content-container text-center">
            <p class="text-[9px] tracking-[.2em] text-site-muted uppercase">Unit Pendidikan</p>
            <div class="mt-8 flex justify-center gap-5">
                <a href="{{ route('school.paud') }}" class="relative h-[145px] w-[145px] overflow-hidden bg-brand-green-950 text-white">
                    <img src="{{ asset('images/paud/unit-paud.jpeg') }}" alt="Unit PAUD Harapan Mulia" class="h-full w-full object-cover opacity-35">
                    <span class="absolute inset-0 flex items-center justify-center text-[22px]">PAUD</span>
                </a>
                <a href="{{ route('school.tk') }}" class="relative h-[145px] w-[145px] overflow-hidden bg-brand-green-950 text-white">
                    <img src="{{ asset('images/paud/unit-tk.jpeg') }}" alt="Unit TK Harapan Mulia" class="h-full w-full object-cover opacity-35">
                    <span class="absolute inset-0 flex items-center justify-center text-[22px]">TK</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Testimonial: green band + cards overlap ke area putih --}}
    <section class="relative mt-4 bg-brand-green-900 pt-14 pb-[150px] text-white">
        <div class="content-container text-center">
            <p class="text-[10px] text-white/60">Testimonial</p>
            <h2 class="mt-2 text-[32px] font-semibold tracking-[-.03em]">Apa yang mereka katakan?</h2>

            <div class="absolute right-0 -bottom-[120px] left-0">
                <div class="content-container grid gap-5 md:grid-cols-3">
                    @foreach ([
                        ['quote' => 'Lingkungan sekolah terasa ramah dan guru mendampingi anak dengan penuh perhatian.', 'name' => 'Placeholder 01', 'role' => 'Orang Tua Murid'],
                        ['quote' => 'Kegiatan belajar dibuat menyenangkan dan tetap menanamkan kebiasaan baik.', 'name' => 'Placeholder 02', 'role' => 'Orang Tua Murid'],
                        ['quote' => 'Program sekolah membantu anak belajar mandiri dan percaya diri.', 'name' => 'Placeholder 03', 'role' => 'Orang Tua Murid'],
                    ] as $testimonial)
                        <article class="min-h-[230px] rounded-[4px] bg-white p-7 text-left text-site-text shadow-[0_12px_30px_rgba(20,30,40,.08)]">
                            <p class="text-[12px] leading-7 text-site-muted">“{{ $testimonial['quote'] }}”</p>
                            <div class="mt-7 flex items-center gap-3">
                                <span class="h-9 w-9 rounded-full bg-slate-900"></span>
                                <div>
                                    <p class="text-[11px] font-semibold">{{ $testimonial['name'] }}</p>
                                    <p class="text-[9px] text-site-muted">{{ $testimonial['role'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section class="pt-[190px] pb-24">
        <div class="content-container">
            <div class="text-center">
                <p class="eyebrow">Berita & Artikel</p>
                <h2 class="section-title">Berita Terbaru</h2>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <x-site.news-card image="images/paud/news-parenting.jpeg" date="Preview Konten" title="Home Parenting PAUD Harapan Mulia" excerpt="Contoh kartu berita untuk menguji hierarchy dan komposisi sebelum CMS dibangun." />
                <x-site.news-card image="images/paud/news-akhirussanah.jpeg" date="Preview Konten" title="Kegiatan Akhirussanah" excerpt="Preview tampilan berita untuk menguji struktur layout." />
                <x-site.news-card image="images/paud/news-kegiatan.jpeg" date="Preview Konten" title="Kegiatan Siswa Harapan Mulia" excerpt="Konten production nantinya berasal dari berita yang dipublikasikan admin." />
            </div>
        </div>
    </section>
@endsection

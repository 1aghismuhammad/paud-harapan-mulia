@extends('layouts.public')

@section('title', 'PAUD Harapan Mulia — Beranda')
@section('meta_description', 'Website resmi PAUD Islam Terpadu Harapan Mulia di Ngawen, Blora.')

@section('content')
    <x-site.hero />

    <section class="site-container relative z-10 -mt-6 md:-mt-8">
        <div class="mx-auto grid max-w-3xl gap-3 md:grid-cols-3">
            @foreach ([
                ['title' => 'Lingkungan Islami', 'copy' => 'Pembiasaan doa, ibadah, dan pengenalan Al-Qur’an.', 'icon' => '✦'],
                ['title' => 'Pembelajaran Menyenangkan', 'copy' => 'Kegiatan kreatif yang mendukung kemandirian anak.', 'icon' => '◫'],
                ['title' => 'Pendampingan Orang Tua', 'copy' => 'Program parenting untuk menguatkan kolaborasi keluarga.', 'icon' => '◎'],
            ] as $item)
                <div class="soft-card flex min-h-24 items-center gap-4 px-5 py-4">
                    <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-brand-green-300/15 text-xl text-brand-green-700">{{ $item['icon'] }}</span>
                    <div>
                        <h2 class="text-sm font-semibold text-site-text">{{ $item['title'] }}</h2>
                        <p class="mt-1 text-[11px] leading-5 text-site-muted">{{ $item['copy'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section-space">
        <div class="site-container grid items-center gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:gap-20">
            <div class="relative mx-auto w-full max-w-lg lg:mx-0">
                <div class="grid grid-cols-2 gap-3 pl-4 md:gap-4 md:pl-7">
                    <div class="relative mt-5 overflow-hidden rounded-lg shadow-card">
                        <div class="absolute -left-4 top-8 -z-10 h-4/5 w-5 rounded-l-md bg-brand-green-300"></div>
                        <img src="{{ asset('images/paud/visi-anak.jpeg') }}" alt="Kegiatan siswa PAUD Harapan Mulia" class="aspect-[4/5] h-full w-full object-cover">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-card">
                        <img src="{{ asset('images/paud/visi-kegiatan.jpeg') }}" alt="Kegiatan belajar PAUD Harapan Mulia" class="aspect-[4/5] h-full w-full object-cover">
                    </div>
                </div>
            </div>

            <div>
                <x-site.section-heading eyebrow="PAUD Harapan Mulia" title="Visi & Misi Sekolah" />
                <p class="section-copy max-w-xl">
                    Mewujudkan generasi Islam yang sehat, mandiri, kreatif, berakhlak mulia, dan berjiwa Pancasila.
                </p>

                <ul class="mt-6 space-y-3 text-sm leading-6 text-site-muted">
                    @foreach ([
                        'Menciptakan lingkungan yang sehat, bersih, tertib, aman, dan nyaman.',
                        'Menanamkan sikap mandiri pada peserta didik.',
                        'Menciptakan pembelajaran yang kreatif dan menyenangkan.',
                        'Membiasakan berperilaku Islami dengan meneladani sikap Rasulullah.',
                    ] as $mission)
                        <li class="flex gap-3">
                            <span class="mt-1 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand-green-300/20 text-[10px] font-bold text-brand-green-700">✓</span>
                            <span>{{ $mission }}</span>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('about.vision-mission') }}" class="mt-8 inline-flex items-center rounded-md bg-brand-green-600 px-6 py-3 text-xs font-semibold tracking-[0.08em] text-white uppercase transition hover:bg-brand-green-700">
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <section class="pb-16 md:pb-24">
        <div class="site-container grid items-center gap-12 lg:grid-cols-2 lg:gap-20">
            <div class="lg:pr-8">
                <x-site.section-heading eyebrow="PAUD Harapan Mulia" title="Profil Sekolah" />
                <p class="section-copy">
                    TK IT Harapan Mulia berdiri di Kecamatan Ngawen, Blora pada tahun 2011. Sekolah hadir dekat dengan masyarakat dengan layanan pendidikan anak usia dini yang menguatkan pembiasaan keagamaan, kemandirian, pembelajaran kreatif, dan kerja sama dengan orang tua.
                </p>
                <a href="{{ route('about.history') }}" class="mt-7 inline-flex items-center gap-3 text-sm font-semibold text-brand-green-700">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brand-green-300/20">▶</span>
                    Lihat Profil Sekolah
                </a>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-brand-green-900 shadow-soft">
                <img src="{{ asset('images/paud/profile-sekolah.jpeg') }}" alt="Dokumentasi PAUD Harapan Mulia" class="aspect-[4/3] w-full object-cover opacity-90">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-green-900/35 to-transparent"></div>
                <span class="absolute left-4 top-1/2 -translate-y-1/2 -rotate-90 rounded-t bg-brand-orange-500 px-5 py-2 text-[10px] font-semibold tracking-[0.14em] text-white uppercase">Harapan Mulia</span>
                <span class="absolute bottom-6 left-7 text-xl font-medium text-white md:text-2xl">Video / Gambar Profil</span>
            </div>
        </div>
    </section>

    <section class="border-y border-site-border py-12 md:py-16">
        <div class="site-container text-center">
            <p class="eyebrow">Unit Pendidikan</p>
            <div class="mt-8 flex flex-col justify-center gap-5 sm:flex-row">
                <a href="{{ route('school.paud') }}" class="group relative overflow-hidden rounded-lg bg-brand-green-950 text-white shadow-card sm:w-56">
                    <img src="{{ asset('images/paud/unit-paud.jpeg') }}" alt="Unit PAUD Harapan Mulia" class="aspect-square w-full object-cover opacity-50 transition duration-500 group-hover:scale-105">
                    <span class="absolute inset-0 flex items-center justify-center text-2xl font-medium">PAUD</span>
                </a>
                <a href="{{ route('school.tk') }}" class="group relative overflow-hidden rounded-lg bg-brand-green-950 text-white shadow-card sm:w-56">
                    <img src="{{ asset('images/paud/unit-tk.jpeg') }}" alt="Unit TK Harapan Mulia" class="aspect-square w-full object-cover opacity-50 transition duration-500 group-hover:scale-105">
                    <span class="absolute inset-0 flex items-center justify-center text-2xl font-medium">TK</span>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-brand-green-900 py-16 text-white md:py-20">
        <div class="site-container">
            <div class="text-center">
                <p class="text-xs font-medium text-white/60">Testimonial</p>
                <h2 class="mt-2 text-3xl font-semibold tracking-[-0.03em] md:text-4xl">Apa yang mereka katakan?</h2>
                <p class="mx-auto mt-3 max-w-xl text-xs text-brand-yellow-400">Konten di bawah masih placeholder untuk review layout dan wajib diganti sebelum production.</p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-3">
                @foreach ([
                    ['quote' => 'Lingkungan sekolah terasa ramah dan guru mendampingi anak dengan penuh perhatian. Kami senang melihat anak belajar dengan lebih percaya diri.', 'name' => 'Placeholder 01', 'role' => 'Orang Tua Murid'],
                    ['quote' => 'Kegiatan belajar dibuat menyenangkan dan tetap menanamkan kebiasaan baik. Komunikasi sekolah dengan orang tua juga terasa dekat.', 'name' => 'Placeholder 02', 'role' => 'Orang Tua Murid'],
                    ['quote' => 'Program keagamaan dan kegiatan bersama membantu anak belajar mandiri, berani, dan terbiasa berinteraksi dengan lingkungan.', 'name' => 'Placeholder 03', 'role' => 'Orang Tua Murid'],
                ] as $testimonial)
                    <article class="rounded-xl bg-white p-6 text-site-text shadow-card">
                        <span class="inline-block rounded-full bg-brand-yellow-400/15 px-2 py-1 text-[9px] font-semibold text-amber-700 uppercase">Placeholder</span>
                        <p class="mt-5 text-sm leading-7 text-site-muted">“{{ $testimonial['quote'] }}”</p>
                        <div class="mt-6 flex items-center gap-3">
                            <span class="h-9 w-9 rounded-full bg-slate-900"></span>
                            <div>
                                <p class="text-xs font-semibold">{{ $testimonial['name'] }}</p>
                                <p class="text-[10px] text-site-muted">{{ $testimonial['role'] }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="site-container">
            <x-site.section-heading eyebrow="Berita & Artikel" title="Berita Terbaru" align="center" />
            <p class="mx-auto mt-4 max-w-xl text-center text-sm leading-7 text-site-muted">Preview tampilan berita. Konten akan dikelola melalui CMS pada Phase 3.</p>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <x-site.news-card
                    image="images/paud/news-parenting.jpeg"
                    date="Preview Konten"
                    title="Home Parenting PAUD Harapan Mulia"
                    excerpt="Contoh kartu berita untuk menguji hierarchy judul, tanggal, ringkasan, gambar, dan CTA sebelum CMS berita dibangun."
                />
                <x-site.news-card
                    image="images/paud/news-akhirussanah.jpeg"
                    date="Preview Konten"
                    title="Kegiatan Akhirussanah"
                    excerpt="Judul dan deskripsi pada kartu ini masih bersifat preview UI. Data production akan berasal dari berita yang dipublikasikan admin."
                />
                <x-site.news-card
                    image="images/paud/news-kegiatan.jpeg"
                    date="Preview Konten"
                    title="Kegiatan Siswa Harapan Mulia"
                    excerpt="Layout berita mengikuti ritme visual referensi dengan kartu putih, metadata ringan, dan ruang baca yang lapang."
                />
            </div>

            <div class="mt-9 text-center">
                <a href="{{ route('news.index') }}" class="inline-flex items-center rounded-md border border-brand-green-600 px-6 py-3 text-xs font-semibold tracking-[0.08em] text-brand-green-700 uppercase transition hover:bg-brand-green-600 hover:text-white">Lihat Semua Berita</a>
            </div>
        </div>
    </section>
@endsection

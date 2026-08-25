@extends('layouts.public')

@section('title', 'PAUD Harapan Mulia — Beranda')
@section('meta_description', 'Website resmi PAUD Islam Terpadu Harapan Mulia di Ngawen, Blora.')

@section('content')
    @php
        $testimonialSlides = [
            [
                [
                    'quote' => 'Lingkungan sekolah terasa ramah dan guru mendampingi anak dengan penuh perhatian. Kegiatan yang diberikan membantu membangun kebiasaan baik, kemandirian, serta rasa percaya diri anak dalam proses belajar.',
                    'name' => 'Placeholder 01',
                    'role' => 'Orang Tua Murid',
                ],
                [
                    'quote' => 'Kegiatan belajar dibuat menyenangkan dan tetap menanamkan kebiasaan baik. Pendampingan guru dan komunikasi sekolah membantu kami sebagai orang tua untuk mengikuti perkembangan serta proses belajar anak.',
                    'name' => 'Placeholder 02',
                    'role' => 'Orang Tua Murid',
                ],
                [
                    'quote' => 'Program sekolah membantu anak belajar mandiri dan percaya diri. Pembiasaan yang dilakukan secara konsisten memberi pengalaman positif bagi anak sekaligus mendukung kerja sama antara sekolah dan keluarga.',
                    'name' => 'Placeholder 03',
                    'role' => 'Orang Tua Murid',
                ],
            ],
            [
                [
                    'quote' => 'Anak kami menjadi lebih berani, lebih disiplin, dan semakin senang berangkat ke sekolah. Suasana pembelajaran yang hangat sangat membantu perkembangan sosial dan emosionalnya.',
                    'name' => 'Placeholder 04',
                    'role' => 'Orang Tua Murid',
                ],
                [
                    'quote' => 'Sekolah tidak hanya fokus pada kegiatan akademik, tetapi juga membentuk karakter, kebiasaan ibadah, serta perilaku yang baik dalam keseharian anak.',
                    'name' => 'Placeholder 05',
                    'role' => 'Orang Tua Murid',
                ],
                [
                    'quote' => 'Kami merasa terbantu karena komunikasi sekolah dengan orang tua berjalan baik. Informasi kegiatan, perkembangan anak, dan arahan pembiasaan diberikan dengan jelas.',
                    'name' => 'Placeholder 06',
                    'role' => 'Orang Tua Murid',
                ],
            ],
        ];
    @endphp

    <x-site.hero />

    <section class="relative z-10 mt-12 md:mt-14 lg:mt-16">
        <div class="home-feature-container">
            @foreach ([
                [
                    'title' => 'Lingkungan Islami',
                    'copy' => 'Pembiasaan doa, ibadah, dan pengenalan Al-Qur’an.',
                    'icon' => 'images/icons/home-features/environment.png',
                    'icon_hover' => 'images/icons/home-features/environment-green.png',
                ],
                [
                    'title' => 'Pembelajaran Menyenangkan',
                    'copy' => 'Kegiatan kreatif yang mendukung kemandirian anak.',
                    'icon' => 'images/icons/home-features/learning.png',
                    'icon_hover' => 'images/icons/home-features/learning-green.png',
                ],
                [
                    'title' => 'Pendampingan Orang Tua',
                    'copy' => 'Program parenting untuk menguatkan kolaborasi keluarga.',
                    'icon' => 'images/icons/home-features/parenting.png',
                    'icon_hover' => 'images/icons/home-features/parenting-green.png',
                ],
            ] as $item)
                <div class="home-feature-card">
                    <span class="home-feature-icon" aria-hidden="true">
                        <img
                            src="{{ asset($item['icon']) }}"
                            alt=""
                            class="home-feature-icon-default"
                            loading="lazy"
                            decoding="async"
                        >
                        <img
                            src="{{ asset($item['icon_hover']) }}"
                            alt=""
                            class="home-feature-icon-hover"
                            loading="lazy"
                            decoding="async"
                        >
                    </span>

                    <div>
                        <h2 class="home-feature-title">{{ $item['title'] }}</h2>
                        <p class="home-feature-copy">{{ $item['copy'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="pt-20 pb-20 md:pt-24 md:pb-24 lg:pt-28 lg:pb-32">
        <div class="home-main-container grid items-center gap-14 lg:grid-cols-[1.02fr_0.98fr] lg:gap-24">
            <div class="mx-auto w-full max-w-[460px] lg:max-w-[550px]">
                <div class="grid grid-cols-2 gap-3 lg:gap-4">
                    <div class="home-vision-photo mt-6 lg:mt-8">
                        <img
                            src="{{ asset('images/paud/visi-anak.jpeg') }}"
                            alt="Kegiatan siswa PAUD Harapan Mulia"
                            class="aspect-[4/5] w-full object-cover"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>

                    <div class="home-vision-photo">
                        <img
                            src="{{ asset('images/paud/visi-kegiatan.jpeg') }}"
                            alt="Kegiatan belajar PAUD Harapan Mulia"
                            class="aspect-[4/5] w-full object-cover"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>

            <div>
                <p class="eyebrow lg:text-[13px]">PAUD Harapan Mulia</p>
                <h2 class="section-title lg:text-[44px]">Visi & Misi Sekolah</h2>

                <p class="section-copy max-w-[530px] lg:mt-7 lg:max-w-[570px] lg:text-[15px] lg:leading-8">
                    Mewujudkan generasi Islam yang sehat, mandiri, kreatif, berakhlak mulia, dan berjiwa Pancasila.
                </p>

                <ul class="mt-6 space-y-3 text-[13px] leading-6 text-site-muted lg:mt-8 lg:space-y-4 lg:text-[14px] lg:leading-7">
                    @foreach ([
                        'Menciptakan lingkungan yang sehat, bersih, tertib, aman, dan nyaman.',
                        'Menanamkan sikap mandiri pada peserta didik.',
                        'Menciptakan pembelajaran yang kreatif dan menyenangkan.',
                        'Membiasakan berperilaku Islami dengan meneladani sikap Rasulullah.',
                    ] as $mission)
                        <li class="flex gap-3 lg:gap-4">
                            <span class="mt-1 text-brand-green-600">◉</span>
                            <span>{{ $mission }}</span>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ route('about.vision-mission') }}" class="mt-8 inline-flex rounded-[4px] bg-brand-green-600 px-6 py-3 text-[10px] font-semibold tracking-[.12em] text-white uppercase lg:mt-10 lg:px-8 lg:py-3.5">
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <section class="pb-24 lg:pb-36">
        <div class="home-main-container grid items-center gap-14 lg:grid-cols-[0.92fr_1.08fr] lg:gap-24">
            <div class="lg:pr-4">
                <p class="eyebrow lg:text-[13px]">PAUD Harapan Mulia</p>
                <h2 class="section-title lg:text-[44px]">Profil Sekolah</h2>

                <p class="section-copy lg:mt-7 lg:max-w-[510px] lg:text-[15px] lg:leading-8">
                    TK IT Harapan Mulia berdiri di Kecamatan Ngawen, Blora pada tahun 2011. Sekolah hadir dekat dengan masyarakat dengan layanan pendidikan anak usia dini yang menguatkan pembiasaan keagamaan, kemandirian, pembelajaran kreatif, dan kerja sama dengan orang tua.
                </p>

                <a href="{{ route('about.history') }}" class="mt-7 inline-flex items-center gap-3 text-[13px] font-semibold text-site-text lg:mt-9 lg:text-[15px]">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-brand-green-600 text-[10px] text-brand-green-600 lg:h-10 lg:w-10">▶</span>
                    Lihat Profil Sekolah
                </a>
            </div>

            <div class="group relative isolate overflow-hidden rounded-[8px] bg-brand-green-950 shadow-[0_20px_55px_rgba(17,24,39,0.12)] transition-[transform,box-shadow] duration-700 ease-out hover:-translate-y-1 hover:shadow-[0_30px_70px_rgba(41,105,62,0.22)]" id="school-profile-video">
                <div class="relative aspect-[4/3] w-full lg:aspect-[1.34/1]">
                    <img
                        id="school-profile-thumbnail"
                        src="{{ asset('images/paud/profile-sekolah.jpeg') }}"
                        alt="Dokumentasi PAUD Harapan Mulia"
                        class="h-full w-full object-cover opacity-95 transition-[transform,filter,opacity] duration-[1200ms] ease-out group-hover:scale-[1.055] group-hover:brightness-[1.04] group-hover:saturate-[1.08] group-hover:opacity-100"
                        loading="lazy"
                        decoding="async"
                    >

                    <button
                        type="button"
                        id="school-profile-play"
                        class="absolute inset-0 flex items-center justify-center"
                        aria-label="Putar video profil sekolah"
                    >
                        <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-white/90 text-brand-green-600 shadow-lg transition-transform duration-300 hover:scale-110">
                            ▶
                        </span>
                    </button>

                    <div id="school-profile-player" class="hidden absolute inset-0">
                        <iframe
                            class="h-full w-full"
                            src=""
                            title="Video Profil Sekolah Harapan Mulia"
                            allow="autoplay; fullscreen"
                            allowfullscreen
                        ></iframe>
                    </div>

                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-tr from-brand-green-950/30 via-transparent to-white/5 transition-opacity duration-700 group-hover:opacity-70"></div>
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-80 transition-opacity duration-700 group-hover:opacity-45"></div>

                    <span class="absolute left-0 top-1/2 -translate-y-1/2 -rotate-90 bg-brand-green-600 px-5 py-2 text-[9px] tracking-[.16em] text-white uppercase shadow-[0_8px_20px_rgba(0,0,0,0.12)] transition-[background-color,transform] duration-500 group-hover:bg-brand-green-700 group-hover:-translate-y-[52%] lg:px-7 lg:py-3">Harapan Mulia</span>
                </div>
            </div>

            <script>
                (() => {
                    const button = document.getElementById('school-profile-play');
                    const thumbnail = document.getElementById('school-profile-thumbnail');
                    const player = document.getElementById('school-profile-player');
                    const iframe = player?.querySelector('iframe');

                    if (!button || !thumbnail || !player || !iframe) return;

                    button.addEventListener('click', () => {
                        iframe.src = 'https://drive.google.com/file/d/10jwrK1zVdykVL0qYl9ipSen3NVo0NWqW/preview?usp=sharing';
                        thumbnail.classList.add('hidden');
                        button.classList.add('hidden');
                        player.classList.remove('hidden');
                    }, { once: true });
                })();
            </script>
        </div>
    </section>

    {{-- Unit pendidikan dibuat lebih besar --}}
    <section class="border-t border-site-border py-16 lg:py-28">
        <div class="mx-auto w-full max-w-[1320px] px-5 sm:px-6 lg:px-0">
            <div class="text-center">
                <p class="text-[10px] tracking-[.24em] text-site-muted uppercase lg:text-[11px]">Unit Pendidikan</p>
            </div>

            <div class="mt-10 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-14 lg:gap-10">
                <a href="{{ route('school.paud') }}" data-motion-unit-card class="group relative h-[190px] w-[190px] overflow-hidden rounded-[5px] bg-brand-green-950 text-white shadow-[0_20px_46px_rgba(17,24,39,0.14)] transition hover:-translate-y-1 md:h-[250px] md:w-[250px] lg:h-[330px] lg:w-[330px]">
                    <img src="{{ asset('images/paud/unit-paud.jpeg') }}" alt="Unit PAUD Harapan Mulia" class="h-full w-full object-cover opacity-50 transition duration-300 group-hover:scale-105 group-hover:opacity-60" loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-green-950/40 via-brand-green-950/10 to-brand-green-950/20"></div>
                    <span class="absolute inset-0 flex items-center justify-center text-[32px] font-medium tracking-[0.02em] md:text-[42px] lg:text-[54px]">PAUD</span>
                </a>

                <a href="{{ route('school.tk') }}" data-motion-unit-card class="group relative h-[190px] w-[190px] overflow-hidden rounded-[5px] bg-brand-green-950 text-white shadow-[0_20px_46px_rgba(17,24,39,0.14)] transition hover:-translate-y-1 md:h-[250px] md:w-[250px] lg:h-[330px] lg:w-[330px]">
                    <img src="{{ asset('images/paud/unit-tk.jpeg') }}" alt="Unit TK Harapan Mulia" class="h-full w-full object-cover opacity-50 transition duration-300 group-hover:scale-105 group-hover:opacity-60" loading="lazy" decoding="async">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-green-950/40 via-brand-green-950/10 to-brand-green-950/20"></div>
                    <span class="absolute inset-0 flex items-center justify-center text-[32px] font-medium tracking-[0.02em] md:text-[42px] lg:text-[54px]">TK</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Testimonial slider fungsional --}}
    <section class="bg-white">
        <div class="min-h-[300px] bg-brand-green-900 pt-16 text-center text-white md:min-h-[330px] md:pt-20 lg:min-h-[395px] lg:pt-[112px]">
            <p class="text-[11px] text-white/75 md:text-[13px] lg:text-[16px]">
                Testimonial
            </p>

            <h2 class="mx-auto mt-3 max-w-[900px] px-5 text-[32px] leading-tight font-semibold tracking-[-0.035em] md:text-[40px] lg:mt-4 lg:text-[50px]">
                Apa yang mereka katakan?
            </h2>
        </div>

        <div
            class="relative z-10 mx-auto -mt-[86px] w-[calc(100%-40px)] max-w-[1080px] md:-mt-[105px] lg:-mt-[128px] lg:max-w-[1440px]"
            data-testimonial-slider
        >
            <div class="overflow-hidden">
                <div
                    class="flex transition-transform duration-500 ease-out"
                    data-testimonial-track
                    style="transform: translateX(0%);"
                >
                    @foreach ($testimonialSlides as $slide)
                        <div class="w-full shrink-0">
                            <div class="grid gap-5 md:grid-cols-3 lg:gap-[28px]">
                                @foreach ($slide as $testimonial)
                                    <article class="flex min-h-[300px] flex-col rounded-[5px] bg-white px-8 py-9 text-left text-site-text shadow-[0_12px_32px_rgba(17,24,39,0.07)] md:min-h-[360px] lg:min-h-[465px] lg:px-[48px] lg:pt-[48px] lg:pb-[42px]">
                                        <p class="text-[13px] leading-7 text-site-muted md:text-[14px] md:leading-8 lg:text-[17px] lg:leading-[2.02]">
                                            “{{ $testimonial['quote'] }}”
                                        </p>

                                        <div class="mt-auto flex items-center gap-4 pt-8 lg:gap-5 lg:pt-10">
                                            <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#eef0f2] text-[#757986] lg:h-[54px] lg:w-[54px]">
                                                <svg class="h-6 w-6 lg:h-7 lg:w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                                    <circle cx="12" cy="8" r="3.5"/>
                                                    <path d="M5.5 20c.8-4 3-6 6.5-6s5.7 2 6.5 6"/>
                                                </svg>
                                            </span>

                                            <div>
                                                <p class="text-[12px] font-semibold text-site-text md:text-[13px] lg:text-[15px]">
                                                    {{ $testimonial['name'] }}
                                                </p>
                                                <p class="mt-0.5 text-[10px] text-site-muted md:text-[11px] lg:text-[13px]">
                                                    {{ $testimonial['role'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- dots fungsional --}}
            <div class="mt-7 flex justify-center gap-2.5 pb-12 lg:mt-8 lg:pb-[74px]" aria-label="Navigasi testimonial">
                @foreach ($testimonialSlides as $index => $slide)
                    <button
                        type="button"
                        class="h-3 w-3 rounded-full transition lg:h-[14px] lg:w-[14px] {{ $index === 0 ? 'bg-brand-green-600' : 'bg-[#edf0f3]' }}"
                        data-testimonial-dot
                        data-index="{{ $index }}"
                        aria-label="Tampilkan testimonial slide {{ $index + 1 }}"
                        aria-pressed="{{ $index === 0 ? 'true' : 'false' }}"
                    ></button>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pt-16 pb-24 lg:pt-20 lg:pb-32">
        <div class="home-news-container">
            <div class="text-center">
                <p class="eyebrow lg:text-[13px]">Berita & Artikel</p>
                <h2 class="section-title lg:text-[44px]">Berita Terbaru</h2>
            </div>

            @if ($latestNews->isNotEmpty())
                <div class="mt-10 grid gap-6 md:grid-cols-3 lg:mt-12 lg:gap-7">
                    @foreach ($latestNews as $newsPost)
                        @php
                            $plainExcerpt = trim((string) $newsPost->excerpt) ?: \Illuminate\Support\Str::limit(
                                trim(preg_replace('/\s+/', ' ', strip_tags($newsPost->content)) ?? ''),
                                145,
                                '…'
                            );
                            $imageUrl = $newsPost->featured_image
                                ? \Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image)
                                : null;
                        @endphp
                        <x-site.news-card
                            :image="$imageUrl"
                            :date="$newsPost->published_at?->format('d M Y') ?? '—'"
                            :title="$newsPost->title"
                            :excerpt="$plainExcerpt"
                            :author="$newsPost->author?->name"
                            :url="route('news.show', ['newsPost' => $newsPost->slug])"
                        />
                    @endforeach
                </div>

                <div class="mt-10 text-center">
                    <a href="{{ route('news.index') }}" class="inline-flex rounded-[4px] border border-brand-green-600 px-6 py-3 text-[10px] font-semibold tracking-[.12em] text-brand-green-700 uppercase transition hover:bg-brand-green-600 hover:text-white">
                        Lihat Semua Berita
                    </a>
                </div>
            @else
                <div class="mx-auto mt-10 max-w-[680px] rounded-[6px] border border-site-border bg-[#f8faf7] px-6 py-8 text-center">
                    <p class="text-[13px] font-semibold text-site-text">Belum ada berita yang dipublikasikan.</p>
                    <p class="mt-2 text-[11px] leading-6 text-site-muted">Berita terbaru sekolah akan muncul di bagian ini setelah dipublikasikan melalui CMS.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@extends('layouts.public')

@section('title', 'Sekolah Kami — PAUD Harapan Mulia')
@section('meta_description', 'PAUD dan TK Islam Terpadu Harapan Mulia di Ngawen, Blora — satu lingkungan belajar dengan pembiasaan Islami dan pembelajaran kreatif.')

@section('content')
    <section class="pt-16 md:pt-20 lg:pt-24">
        <div class="unit-hero-container">
            <div class="relative overflow-hidden">
                <img
                    src="{{ asset('images/paud/hero-sekolah.jpeg') }}"
                    alt="Lingkungan belajar PAUD dan TK Islam Terpadu Harapan Mulia"
                    class="aspect-[4/3] w-full object-cover sm:aspect-[16/8] lg:aspect-[2.1/1]"
                    decoding="async"
                >
                <div class="absolute inset-x-[22%] bottom-[8%] hidden min-h-16 items-center justify-center bg-white/95 px-6 text-center lg:flex">
                    <span class="text-[14px] font-medium tracking-[0.12em] text-brand-green-700 uppercase">Sekolah Kami</span>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-8 pb-16 md:pt-10 md:pb-20">
        <div class="content-container">
            <div class="text-center">
                <p class="eyebrow">Harapan Mulia</p>
                <h1 class="section-title md:text-[42px] lg:text-[46px]">Sekolah Kami</h1>
            </div>

            {{-- Profile layout: reference-inspired two portrait photos + brand accent --}}
            <div class="mt-8 grid items-start gap-10 md:mt-10 lg:mt-12 lg:grid-cols-[470px_1fr] lg:gap-[72px]">
                <div class="relative mx-auto w-full max-w-[440px] md:max-w-[470px]">
                    <span
                        class="absolute top-[12%] bottom-[12%] left-[-8px] z-0 w-[18px] rounded-[7px] bg-brand-green-600 shadow-[0_10px_24px_rgba(94,161,15,0.12)] md:left-[-12px] md:w-[20px] lg:top-[8%] lg:bottom-[8%] lg:left-[-18px] lg:w-[22px]"
                        aria-hidden="true"
                    ></span>

                    <div class="relative z-10 grid grid-cols-2 gap-2.5 md:gap-3 lg:gap-4">
                        <div class="overflow-hidden rounded-[8px] bg-white shadow-[0_16px_36px_rgba(17,24,39,0.10)] md:shadow-[0_18px_40px_rgba(17,24,39,0.10)]">
                            <img
                                src="{{ asset('images/paud/visi-anak.jpeg') }}"
                                alt="Siswa Harapan Mulia"
                                class="aspect-[2/3] w-full object-cover transition duration-500 md:aspect-[3/4] hover:scale-[1.035]"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>

                        <div class="overflow-hidden rounded-[8px] bg-white shadow-[0_16px_36px_rgba(17,24,39,0.10)] md:shadow-[0_18px_40px_rgba(17,24,39,0.10)]">
                            <img
                                src="{{ asset('images/paud/profile-sekolah.jpeg') }}"
                                alt="Aktivitas belajar di Harapan Mulia"
                                class="aspect-[2/3] w-full object-cover transition duration-500 md:aspect-[3/4] hover:scale-[1.035]"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                    </div>
                </div>

                <div class="max-w-[560px] pt-1 text-[13px] leading-[1.95] text-site-muted md:text-[14px] lg:pt-2 lg:text-[15px] lg:leading-[2]">
                    <p>
                        PAUD dan TK Islam Terpadu Harapan Mulia adalah satu lingkungan pendidikan yang mendampingi anak untuk tumbuh, belajar, dan berkembang dengan nilai-nilai Islami.
                    </p>

                    <p class="mt-5">
                        Sekolah melayani masyarakat di Kecamatan Ngawen, Kabupaten Blora, sejak 2011, dengan pembelajaran yang menyenangkan, pembiasaan doa dan praktik ibadah, pengenalan Al-Qur’an, kemandirian anak, serta kolaborasi dengan orang tua melalui program parenting.
                    </p>
                </div>
            </div>

            {{-- Reference-style showcase carousel rows --}}
            @php
                $showcases = [
                    [
                        'title' => 'Fasilitas',
                        'accent' => '#5EA10F',
                        'panel' => '#EAD9EF',
                        'items' => [
                            ['image' => 'images/paud/fasilitas-lingkungan.jpeg', 'title' => 'Lingkungan Belajar'],
                            ['image' => 'images/paud/fasilitas-aktivitas.jpeg', 'title' => 'Kegiatan Sekolah'],
                            ['image' => 'images/paud/profile-sekolah.jpeg', 'title' => 'Dokumentasi Sekolah'],
                            ['image' => 'images/paud/visi-kegiatan.jpeg', 'title' => 'Kegiatan Kreatif'],
                            ['image' => 'images/paud/hero-sekolah.jpeg', 'title' => 'Lingkungan Sekolah'],
                        ],
                    ],
                    [
                        'title' => 'Aktivitas',
                        'accent' => '#F09712',
                        'panel' => '#FFF7DC',
                        'items' => [
                            ['image' => 'images/paud/hero-parenting.jpeg', 'title' => 'Parenting'],
                            ['image' => 'images/paud/visi-kegiatan.jpeg', 'title' => 'Kegiatan Kreatif'],
                            ['image' => 'images/paud/hero-akhirussanah.jpeg', 'title' => 'Akhirussanah'],
                            ['image' => 'images/paud/news-kegiatan.jpeg', 'title' => 'Kegiatan Siswa'],
                            ['image' => 'images/paud/news-parenting.jpeg', 'title' => 'Kolaborasi Orang Tua'],
                        ],
                    ],
                    [
                        'title' => 'Pembiasaan',
                        'accent' => '#29693E',
                        'panel' => '#E4F3EC',
                        'items' => [
                            ['image' => 'images/paud/news-kegiatan.jpeg', 'title' => 'Kegiatan Siswa'],
                            ['image' => 'images/paud/visi-anak.jpeg', 'title' => 'Kegiatan Bersama'],
                            ['image' => 'images/paud/news-parenting.jpeg', 'title' => 'Pendampingan Keluarga'],
                            ['image' => 'images/paud/hero-sekolah.jpeg', 'title' => 'Lingkungan Sekolah'],
                            ['image' => 'images/paud/profile-sekolah.jpeg', 'title' => 'Pembiasaan Harian'],
                        ],
                    ],
                ];
            @endphp

            <div class="mt-16 space-y-20 md:mt-20 md:space-y-24 lg:mt-24 lg:space-y-28">
                @foreach ($showcases as $showcase)
                    <div
                        class="unit-showcase-row grid items-center gap-10 md:grid-cols-[250px_1fr] lg:grid-cols-[285px_1fr] lg:gap-14"
                        data-unit-showcase
                    >
                        {{-- Decorative label --}}
                        <div class="relative mx-auto h-[305px] w-full max-w-[430px] md:mx-0 md:h-[200px] md:w-[235px] md:max-w-none lg:h-[220px] lg:w-[275px]">
                            <span
                                class="absolute top-[34px] bottom-[58px] left-[4px] w-[20px] rounded-[8px] md:top-[28px] md:bottom-[30px] md:left-[-14px] md:w-[22px]"
                                style="background: {{ $showcase['accent'] }};"
                                aria-hidden="true"
                            ></span>

                            <span
                                class="absolute top-2 left-[18px] h-[265px] w-[calc(50%_-_28px)] -rotate-[3deg] rounded-[11px] shadow-[0_14px_30px_rgba(17,24,39,0.05)] md:left-3 md:h-[165px] md:w-[115px] lg:h-[182px] lg:w-[132px]"
                                style="background: {{ $showcase['panel'] }};"
                                aria-hidden="true"
                            ></span>

                            <span
                                class="absolute top-2 right-[18px] h-[265px] w-[calc(50%_-_28px)] rotate-[3deg] rounded-[11px] shadow-[0_14px_30px_rgba(17,24,39,0.05)] md:right-3 md:h-[165px] md:w-[115px] lg:h-[182px] lg:w-[132px]"
                                style="background: {{ $showcase['panel'] }};"
                                aria-hidden="true"
                            ></span>

                            <span class="absolute right-[12px] bottom-[10px] z-10 min-w-[138px] rounded-[8px] bg-white px-7 py-4 text-center text-[13px] font-semibold italic text-site-text shadow-[0_12px_30px_rgba(17,24,39,0.10)] md:right-0 md:bottom-[12px] md:min-w-[140px]">
                                {{ $showcase['title'] }}
                            </span>
                        </div>

                        {{-- Carousel --}}
                        <div class="relative min-w-0" data-showcase-carousel>
                            <button
                                type="button"
                                class="absolute top-1/2 left-0 z-20 hidden h-11 w-11 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-[#e5e8ec] bg-white text-[23px] text-site-text shadow-[0_10px_26px_rgba(17,24,39,0.12)] transition duration-300 hover:scale-105 hover:shadow-[0_14px_32px_rgba(17,24,39,0.16)] sm:inline-flex md:h-12 md:w-12"
                                data-showcase-prev
                                aria-label="Lihat {{ strtolower($showcase['title']) }} sebelumnya"
                            >
                                <span aria-hidden="true">←</span>
                            </button>

                            <div class="overflow-hidden">
                                <div
                                    class="flex gap-5 transition-transform duration-500 ease-out lg:gap-7"
                                    data-showcase-track
                                >
                                    @foreach ($showcase['items'] as $index => $item)
                                        <article
                                            class="group relative aspect-[6/7] w-full shrink-0 overflow-hidden rounded-[9px] bg-[#eef1f3] shadow-[0_12px_30px_rgba(17,24,39,0.07)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_38px_rgba(17,24,39,0.12)] focus-within:-translate-y-1 focus-within:shadow-[0_18px_38px_rgba(17,24,39,0.12)] sm:w-[calc((100%_-_20px)/2)] lg:w-[calc((100%_-_56px)/3)]"
                                            data-showcase-item
                                            data-index="{{ $index }}"
                                            tabindex="0"
                                            aria-label="{{ $item['title'] }} — arahkan mouse atau fokus untuk melihat keterangan"
                                        >
                                            <img
                                                src="{{ asset($item['image']) }}"
                                                alt="{{ $item['title'] }} — {{ $showcase['title'] }} Harapan Mulia"
                                                class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.035]"
                                                loading="lazy"
                                                decoding="async"
                                            >

                                            <div
                                                class="absolute inset-0 flex items-center justify-center bg-gradient-to-b from-[#20242d]/40 via-[#20242d]/55 to-[#20242d]/78 px-5 text-center opacity-0 transition-opacity duration-500 group-hover:opacity-100 group-focus:opacity-100 group-focus-within:opacity-100"
                                                data-showcase-overlay
                                            >
                                                <div class="text-white">
                                                    <p class="text-[17px] font-semibold leading-tight md:text-[19px]">
                                                        {{ $item['title'] }}
                                                    </p>
                                                    <p class="mt-1 text-[20px] font-medium italic leading-none text-white/95 md:text-[24px]">
                                                        {{ $showcase['title'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>

                            <button
                                type="button"
                                class="absolute top-1/2 right-0 z-20 hidden h-11 w-11 translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-[#e5e8ec] bg-white text-[23px] text-site-text shadow-[0_10px_26px_rgba(17,24,39,0.12)] transition duration-300 hover:scale-105 hover:shadow-[0_14px_32px_rgba(17,24,39,0.16)] sm:inline-flex md:h-12 md:w-12"
                                data-showcase-next
                                aria-label="Lihat {{ strtolower($showcase['title']) }} berikutnya"
                            >
                                <span aria-hidden="true">→</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <section class="mt-16 md:mt-20 lg:mt-24">
                <h2 class="text-center text-[32px] font-semibold leading-tight text-site-text md:text-[40px] lg:text-[46px]">
                    Keunggulan Sekolah
                </h2>

                @php
                    $advantages = [
                    [
                        'title' => 'Pembiasaan nilai-nilai Islami',
                        'content' => 'Harapan Mulia membangun pembiasaan nilai-nilai Islami melalui doa harian, pengenalan adab, praktik ibadah sederhana, pengenalan Al-Qur’an, dan aktivitas yang menanamkan kebiasaan baik sejak usia dini.',
                    ],
                    [
                        'title' => 'Pembelajaran kreatif dan menyenangkan',
                        'content' => 'Kegiatan belajar dirancang melalui permainan, eksplorasi, seni, gerak, dan pengalaman langsung agar anak belajar dengan suasana yang menyenangkan sekaligus mengembangkan rasa ingin tahu.',
                    ],
                    [
                        'title' => 'Lingkungan yang aman dan mendukung',
                        'content' => 'Lingkungan belajar diarahkan agar aman, nyaman, dan ramah anak sehingga peserta didik dapat beraktivitas dengan percaya diri serta memperoleh pendampingan sesuai tahap perkembangannya.',
                    ],
                    [
                        'title' => 'Kolaborasi sekolah dengan orang tua',
                        'content' => 'Sekolah melibatkan orang tua melalui komunikasi rutin dan kegiatan parenting agar pembiasaan di sekolah dapat dilanjutkan secara konsisten di rumah.',
                    ],
                    [
                        'title' => 'Kegiatan yang mendukung kemandirian',
                        'content' => 'Anak dibiasakan melakukan aktivitas sederhana secara mandiri, bertanggung jawab terhadap barang pribadi, mengikuti rutinitas kelas, dan berpartisipasi dalam kegiatan bersama.',
                    ],
                    ];
                @endphp

                <div
                    class="mt-10 overflow-hidden border border-[#dfe3e6] bg-white md:mt-12 lg:mt-14"
                    data-advantages
                >
                    {{-- Desktop / tablet tab layout --}}
                    <div class="hidden md:grid md:grid-cols-[42%_58%]">
                        <div class="border-r border-[#dfe3e6]" role="tablist" aria-label="Keunggulan Sekolah">
                            @foreach ($advantages as $index => $item)
                                <button
                                    type="button"
                                    class="advantage-tab flex min-h-[72px] w-full items-center border-b border-[#e8ebee] px-6 py-4 text-left text-[15px] font-medium leading-[1.55] text-site-muted transition duration-200 last:border-b-0 hover:bg-brand-green-300/10 hover:text-brand-green-700 lg:min-h-[82px] lg:px-8 lg:text-[17px]"
                                    data-advantage-tab
                                    data-index="{{ $index }}"
                                    role="tab"
                                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                >
                                    {{ $item['title'] }}
                                </button>
                            @endforeach
                        </div>

                        <div class="min-h-[360px] p-7 lg:min-h-[410px] lg:p-10">
                            @foreach ($advantages as $index => $item)
                                <div
                                    class="{{ $index === 0 ? '' : 'hidden' }}"
                                    data-advantage-panel
                                    data-index="{{ $index }}"
                                    role="tabpanel"
                                >
                                    <p class="text-[15px] leading-[2] text-site-muted lg:text-[17px] lg:leading-[2.05]">
                                        {{ $item['content'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Mobile accordion layout --}}
                    <div class="md:hidden">
                        @foreach ($advantages as $index => $item)
                            <div class="border-b border-[#dfe3e6] last:border-b-0">
                                <button
                                    type="button"
                                    class="advantage-mobile-trigger flex min-h-[62px] w-full items-center justify-between gap-4 px-4 py-4 text-left text-[16px] font-medium leading-[1.5] text-site-muted transition duration-200"
                                    data-advantage-mobile-trigger
                                    data-index="{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                >
                                    <span>{{ $item['title'] }}</span>
                                    <span class="text-[22px] leading-none text-brand-green-600" data-advantage-symbol>
                                        {{ $index === 0 ? '−' : '+' }}
                                    </span>
                                </button>

                                <div
                                    class="{{ $index === 0 ? '' : 'hidden' }} border-t border-[#edf0f2] px-4 py-5"
                                    data-advantage-mobile-panel
                                    data-index="{{ $index }}"
                                >
                                    <p class="text-[15px] leading-[1.9] text-site-muted">
                                        {{ $item['content'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

<section class="mt-14">
                <h2 class="text-center text-[30px] font-semibold tracking-[-0.035em] md:text-[36px]">Berita Sekolah</h2>

                <div class="mt-9 grid gap-6 md:grid-cols-3">
                    @foreach ($latestNews as $newsPost)
                        @php
                            $plainExcerpt = strip_tags($newsPost->excerpt ?? $newsPost->content ?? '');
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
                        />
                    @endforeach
                </div>
            </section>
        </div>
    </section>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-showcase-carousel]').forEach((carousel) => {
            const track = carousel.querySelector('[data-showcase-track]');
            const items = [...carousel.querySelectorAll('[data-showcase-item]')];
            const previous = carousel.querySelector('[data-showcase-prev]');
            const next = carousel.querySelector('[data-showcase-next]');

            const autoplayDelay = 5000;
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            let activeIndex = 0;
            let touchStartX = 0;
            let autoplayTimer = null;

            if (!track || items.length === 0) {
                return;
            }

            track.style.transition = reduceMotion
                ? 'none'
                : 'transform 850ms cubic-bezier(0.22, 1, 0.36, 1)';

            const visibleCount = () => {
                if (window.matchMedia('(min-width: 992px)').matches) {
                    return 3;
                }

                if (window.matchMedia('(min-width: 576px)').matches) {
                    return 2;
                }

                return 1;
            };

            const maxStartIndex = () => Math.max(0, items.length - visibleCount());

            const normalizeIndex = (index) => {
                const positions = maxStartIndex() + 1;
                return ((index % positions) + positions) % positions;
            };

            const update = () => {
                activeIndex = normalizeIndex(activeIndex);

                const offset = items[activeIndex]?.offsetLeft ?? 0;
                track.style.transform = `translateX(-${offset}px)`;

                const hoverCapable = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

                items.forEach((item, index) => {
                    const overlay = item.querySelector('[data-showcase-overlay]');
                    const active = index === activeIndex;

                    item.dataset.active = active ? 'true' : 'false';

                    if (!overlay) {
                        return;
                    }

                    if (hoverCapable) {
                        overlay.style.removeProperty('opacity');
                        return;
                    }

                    // Touch devices do not have reliable hover, so keep the
                    // description on the first visible card for each position.
                    overlay.style.opacity = active ? '1' : '0';
                });
            };

            const goTo = (index) => {
                activeIndex = normalizeIndex(index);
                update();
            };

            const stopAutoplay = () => {
                if (autoplayTimer !== null) {
                    window.clearInterval(autoplayTimer);
                    autoplayTimer = null;
                }
            };

            const startAutoplay = () => {
                stopAutoplay();

                if (document.hidden || maxStartIndex() === 0) {
                    return;
                }

                autoplayTimer = window.setInterval(() => {
                    goTo(activeIndex + 1);
                }, autoplayDelay);
            };

            const restartAutoplay = () => {
                stopAutoplay();
                startAutoplay();
            };

            previous?.addEventListener('click', () => {
                goTo(activeIndex - 1);
                restartAutoplay();
            });

            next?.addEventListener('click', () => {
                goTo(activeIndex + 1);
                restartAutoplay();
            });

            track.addEventListener(
                'touchstart',
                (event) => {
                    touchStartX = event.changedTouches[0].clientX;
                    stopAutoplay();
                },
                { passive: true },
            );

            track.addEventListener(
                'touchend',
                (event) => {
                    const distance = event.changedTouches[0].clientX - touchStartX;

                    if (Math.abs(distance) >= 50) {
                        goTo(distance < 0 ? activeIndex + 1 : activeIndex - 1);
                    }

                    startAutoplay();
                },
                { passive: true },
            );

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    stopAutoplay();
                    return;
                }

                startAutoplay();
            });

            window.addEventListener('resize', () => {
                update();
                restartAutoplay();
            });

            update();
            startAutoplay();
        });

        document.querySelectorAll('[data-advantages]').forEach((component) => {
            const tabs = [...component.querySelectorAll('[data-advantage-tab]')];
            const panels = [...component.querySelectorAll('[data-advantage-panel]')];
            const mobileTriggers = [...component.querySelectorAll('[data-advantage-mobile-trigger]')];
            const mobilePanels = [...component.querySelectorAll('[data-advantage-mobile-panel]')];

            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            let desktopActiveIndex = 0;

            const updateTabState = (index) => {
                tabs.forEach((tab, tabIndex) => {
                    const active = tabIndex === index;

                    tab.setAttribute('aria-selected', active ? 'true' : 'false');
                    tab.classList.toggle('bg-brand-green-300/10', active);
                    tab.classList.toggle('text-brand-green-700', active);
                    tab.classList.toggle('font-semibold', active);
                });
            };

            const setDesktopActive = async (index, animate = true) => {
                if (index === desktopActiveIndex && animate) {
                    return;
                }

                const currentPanel = panels[desktopActiveIndex];
                const nextPanel = panels[index];

                updateTabState(index);

                if (!nextPanel) {
                    return;
                }

                if (!animate || reduceMotion || !currentPanel) {
                    panels.forEach((panel, panelIndex) => {
                        panel.classList.toggle('hidden', panelIndex !== index);
                    });

                    desktopActiveIndex = index;
                    return;
                }

                currentPanel.getAnimations().forEach((animation) => animation.cancel());
                nextPanel.getAnimations().forEach((animation) => animation.cancel());

                const fadeOut = currentPanel.animate(
                    [
                        { opacity: 1, transform: 'translateY(0)' },
                        { opacity: 0, transform: 'translateY(-6px)' },
                    ],
                    {
                        duration: 170,
                        easing: 'ease-in',
                        fill: 'forwards',
                    },
                );

                try {
                    await fadeOut.finished;
                } catch {
                    // Rapid repeated clicks can cancel the current animation.
                }

                currentPanel.classList.add('hidden');
                fadeOut.cancel();

                nextPanel.classList.remove('hidden');

                const fadeIn = nextPanel.animate(
                    [
                        { opacity: 0, transform: 'translateY(8px)' },
                        { opacity: 1, transform: 'translateY(0)' },
                    ],
                    {
                        duration: 260,
                        easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                        fill: 'both',
                    },
                );

                try {
                    await fadeIn.finished;
                } catch {
                    // Normalize state below if animation is interrupted.
                }

                fadeIn.cancel();
                desktopActiveIndex = index;
            };

            const setTriggerState = (trigger, active) => {
                const symbol = trigger.querySelector('[data-advantage-symbol]');

                trigger.setAttribute('aria-expanded', active ? 'true' : 'false');
                trigger.classList.toggle('bg-brand-green-300/10', active);
                trigger.classList.toggle('text-brand-green-700', active);
                trigger.classList.toggle('font-semibold', active);

                if (symbol) {
                    symbol.textContent = active ? '−' : '+';
                }
            };

            const openMobilePanel = async (panel) => {
                if (!panel || !panel.classList.contains('hidden')) {
                    return;
                }

                panel.getAnimations().forEach((animation) => animation.cancel());
                panel.classList.remove('hidden');

                if (reduceMotion) {
                    return;
                }

                panel.style.overflow = 'hidden';
                const targetHeight = panel.scrollHeight;

                const animation = panel.animate(
                    [
                        {
                            height: '0px',
                            opacity: 0,
                            transform: 'translateY(-8px)',
                        },
                        {
                            height: `${targetHeight}px`,
                            opacity: 1,
                            transform: 'translateY(0)',
                        },
                    ],
                    {
                        duration: 340,
                        easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                    },
                );

                try {
                    await animation.finished;
                } catch {
                    // Interrupted animations are normalized below.
                }

                panel.style.removeProperty('overflow');
                panel.style.removeProperty('height');
                panel.style.removeProperty('opacity');
                panel.style.removeProperty('transform');
            };

            const closeMobilePanel = async (panel) => {
                if (!panel || panel.classList.contains('hidden')) {
                    return;
                }

                panel.getAnimations().forEach((animation) => animation.cancel());

                if (reduceMotion) {
                    panel.classList.add('hidden');
                    return;
                }

                panel.style.overflow = 'hidden';
                const startHeight = panel.getBoundingClientRect().height;

                const animation = panel.animate(
                    [
                        {
                            height: `${startHeight}px`,
                            opacity: 1,
                            transform: 'translateY(0)',
                        },
                        {
                            height: '0px',
                            opacity: 0,
                            transform: 'translateY(-8px)',
                        },
                    ],
                    {
                        duration: 280,
                        easing: 'cubic-bezier(0.4, 0, 1, 1)',
                    },
                );

                try {
                    await animation.finished;
                } catch {
                    // Interrupted animations are normalized below.
                }

                panel.classList.add('hidden');
                panel.style.removeProperty('overflow');
                panel.style.removeProperty('height');
                panel.style.removeProperty('opacity');
                panel.style.removeProperty('transform');
            };

            const setMobileActive = async (index) => {
                const tasks = [];

                mobileTriggers.forEach((trigger, triggerIndex) => {
                    const active = triggerIndex === index;
                    setTriggerState(trigger, active);

                    const panel = mobilePanels[triggerIndex];

                    if (active) {
                        tasks.push(openMobilePanel(panel));
                    } else {
                        tasks.push(closeMobilePanel(panel));
                    }
                });

                await Promise.all(tasks);
            };

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    void setDesktopActive(index);
                });
            });

            mobileTriggers.forEach((trigger, index) => {
                trigger.addEventListener('click', () => {
                    const alreadyOpen = trigger.getAttribute('aria-expanded') === 'true';

                    if (alreadyOpen) {
                        setTriggerState(trigger, false);
                        void closeMobilePanel(mobilePanels[index]);
                        return;
                    }

                    void setMobileActive(index);
                });
            });

            setDesktopActive(0, false);

            mobileTriggers.forEach((trigger, index) => {
                const active = index === 0;
                setTriggerState(trigger, active);
                mobilePanels[index]?.classList.toggle('hidden', !active);
            });
        });
    });
</script>
@endpush

@endsection

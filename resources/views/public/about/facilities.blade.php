@extends('layouts.public')

@section('title', 'Fasilitas — PAUD Harapan Mulia')
@section('meta_description', 'Lingkungan dan dokumentasi fasilitas PAUD Islam Terpadu Harapan Mulia.')

@section('content')
    {{--
        Facilities page: shared About page-hero (same as Visi & Misi).
        Large centred facility sections; 3-up desktop / single-card mobile carousel.
        Facility inventory and naming remain subject to school verification.
    --}}
    <x-site.page-hero title="Fasilitas" breadcrumb="Fasilitas" />

    @php
        $facilitySections = [
            [
                'title' => 'Ruang & Sarana Belajar',
                'description' => 'Dokumentasi berikut menampilkan lingkungan, sarana, dan area kegiatan yang digunakan dalam aktivitas PAUD Harapan Mulia. Nama serta inventaris fasilitas final tetap perlu diverifikasi pihak sekolah.',
                'items' => [
                    ['image' => 'images/paud/fasilitas-lingkungan.jpeg', 'title' => 'Lingkungan Belajar'],
                    ['image' => 'images/paud/fasilitas-aktivitas.jpeg', 'title' => 'Area Aktivitas'],
                    ['image' => 'images/paud/profile-sekolah.jpeg', 'title' => 'Dokumentasi Sekolah'],
                    ['image' => 'images/paud/visi-kegiatan.jpeg', 'title' => 'Area Kegiatan'],
                    ['image' => 'images/paud/hero-sekolah.jpeg', 'title' => 'Lingkungan Sekolah'],
                ],
            ],
            [
                'title' => 'Lingkungan & Aktivitas',
                'description' => 'Lingkungan sekolah dan kegiatan pembelajaran ditampilkan sebagai dokumentasi visual sambil menunggu data fasilitas resmi yang telah dikonfirmasi secara lengkap.',
                'items' => [
                    ['image' => 'images/paud/hero-sekolah.jpeg', 'title' => 'Kegiatan Bersama'],
                    ['image' => 'images/paud/visi-kegiatan.jpeg', 'title' => 'Aktivitas Luar Ruang'],
                    ['image' => 'images/paud/unit-tk.jpeg', 'title' => 'Kegiatan Islami'],
                    ['image' => 'images/paud/profile-sekolah.jpeg', 'title' => 'Dokumentasi Kegiatan'],
                    ['image' => 'images/paud/news-kegiatan.jpeg', 'title' => 'Aktivitas Siswa'],
                ],
            ],
        ];
    @endphp

    <section class="bg-white pb-16 pt-14 md:pb-20 md:pt-16 lg:pb-24 lg:pt-14">
        <div class="mx-auto w-full max-w-[1300px] px-5 sm:px-6 lg:px-0">
            <div class="space-y-16 md:space-y-20 lg:space-y-14">
                @foreach ($facilitySections as $sectionIndex => $section)
                    <section class="text-center" aria-labelledby="facility-section-{{ $sectionIndex }}">
                        <h3
                            id="facility-section-{{ $sectionIndex }}"
                            class="text-[30px] font-semibold leading-[1.15] tracking-[-0.045em] text-site-text md:text-[38px] lg:text-[47px]"
                        >
                            {{ $section['title'] }}
                        </h3>

                        <p class="mx-auto mt-5 max-w-[830px] text-[14px] leading-[2] text-site-muted md:text-[15px] lg:mt-4 lg:text-[15px] lg:leading-[1.9]">
                            {{ $section['description'] }}
                        </p>

                        <div class="relative mx-auto mt-9 max-w-[1140px] px-0 sm:px-12 lg:px-0" data-facility-carousel>
                            <button
                                type="button"
                                class="absolute left-2 top-1/2 z-20 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full border border-[#edf0f2] bg-[#f7f9fa] text-[21px] text-[#606775] shadow-[0_8px_20px_rgba(17,24,39,0.09)] transition duration-300 hover:-translate-x-0.5 hover:bg-white hover:shadow-[0_12px_28px_rgba(17,24,39,0.13)] sm:inline-flex lg:left-[-48px] lg:h-12 lg:w-12"
                                data-facility-prev
                                aria-label="Lihat fasilitas sebelumnya"
                            >
                                <span aria-hidden="true">←</span>
                            </button>

                            <div class="overflow-hidden rounded-[8px] sm:rounded-none" data-facility-viewport>
                                <div
                                    class="flex gap-5 transition-transform duration-500 ease-out lg:gap-7"
                                    data-facility-track
                                >
                                    @foreach ($section['items'] as $itemIndex => $item)
                                        <article
                                            class="group relative aspect-square w-full shrink-0 overflow-hidden rounded-[9px] bg-[#eef1f3] shadow-[0_8px_24px_rgba(17,24,39,0.07)] sm:w-[calc((100%_-_20px)/2)] lg:w-[calc((100%_-_56px)/3)]"
                                            data-facility-item
                                            tabindex="0"
                                            aria-label="{{ $item['title'] }} — fasilitas PAUD Harapan Mulia"
                                        >
                                            <img
                                                src="{{ asset($item['image']) }}"
                                                alt="{{ $item['title'] }} PAUD Harapan Mulia"
                                                class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-[1.035] group-focus:scale-[1.035]"
                                                decoding="async"
                                                @if ($sectionIndex > 0 || $itemIndex > 0) loading="lazy" @endif
                                            >

                                            <div
                                                class="absolute inset-0 flex items-center justify-center bg-gradient-to-b from-[#111827]/28 via-[#111827]/53 to-[#111827]/72 px-6 text-center opacity-0 transition-opacity duration-300 group-hover:opacity-100 group-focus:opacity-100 group-focus-within:opacity-100"
                                            >
                                                <div class="text-white">
                                                    <p class="text-[17px] font-semibold leading-tight md:text-[18px] lg:text-[20px]">
                                                        {{ $item['title'] }}
                                                    </p>
                                                    <p class="mt-2 text-[18px] font-medium italic leading-none text-white/95 md:text-[20px] lg:text-[23px]">
                                                        Fasilitas
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>

                            <button
                                type="button"
                                class="absolute right-2 top-1/2 z-20 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full border border-[#edf0f2] bg-[#f7f9fa] text-[21px] text-[#606775] shadow-[0_8px_20px_rgba(17,24,39,0.09)] transition duration-300 hover:translate-x-0.5 hover:bg-white hover:shadow-[0_12px_28px_rgba(17,24,39,0.13)] sm:inline-flex lg:right-[-48px] lg:h-12 lg:w-12"
                                data-facility-next
                                aria-label="Lihat fasilitas berikutnya"
                            >
                                <span aria-hidden="true">→</span>
                            </button>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (() => {
            const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const mobileMedia = window.matchMedia('(max-width: 575px)');

            document.querySelectorAll('[data-facility-carousel]').forEach((carousel) => {
                const track = carousel.querySelector('[data-facility-track]');
                const items = [...carousel.querySelectorAll('[data-facility-item]')];
                const previous = carousel.querySelector('[data-facility-prev]');
                const next = carousel.querySelector('[data-facility-next]');

                const MOBILE_AUTOPLAY_MS = 5200;
                const MOBILE_TRANSITION_MS = 950;
                const DEFAULT_TRANSITION_MS = 500;

                if (!track || items.length < 2) return;

                let index = 0;
                let startX = null;
                let autoplayTimer = null;
                let isTransitioning = false;

                const wait = (duration) => new Promise((resolve) => {
                    window.setTimeout(resolve, duration);
                });

                const isMobile = () => mobileMedia.matches;

                const visibleCount = () => {
                    if (window.matchMedia('(min-width: 992px)').matches) return 3;
                    if (window.matchMedia('(min-width: 576px)').matches) return 2;
                    return 1;
                };

                const gap = () => window.matchMedia('(min-width: 992px)').matches ? 28 : 20;

                const maxIndex = () => Math.max(0, items.length - visibleCount());

                const render = ({ animate = true } = {}) => {
                    index = Math.min(index, maxIndex());

                    const itemWidth = items[0].getBoundingClientRect().width;
                    const offset = index * (itemWidth + gap());
                    const duration = !animate || reducedMotion
                        ? 0
                        : (isMobile() ? MOBILE_TRANSITION_MS : DEFAULT_TRANSITION_MS);

                    track.style.transitionProperty = 'transform';
                    track.style.transitionDuration = `${duration}ms`;
                    track.style.transitionTimingFunction = isMobile()
                        ? 'cubic-bezier(0.22, 1, 0.36, 1)'
                        : 'ease-out';
                    track.style.transform = `translate3d(-${offset}px, 0, 0)`;
                };

                const stopAutoplay = () => {
                    if (autoplayTimer !== null) {
                        window.clearTimeout(autoplayTimer);
                        autoplayTimer = null;
                    }
                };

                const scheduleAutoplay = () => {
                    stopAutoplay();

                    // Match the homepage hero scheduling model: mobile autoplay keeps
                    // running while the tab is active. Reduced-motion only changes the
                    // transition style; it must not silently disable the slideshow.
                    if (!isMobile() || document.hidden || items.length < 2) {
                        return;
                    }

                    autoplayTimer = window.setTimeout(async () => {
                        autoplayTimer = null;
                        const target = index >= maxIndex() ? 0 : index + 1;

                        await transitionTo(target);
                        scheduleAutoplay();
                    }, MOBILE_AUTOPLAY_MS);
                };

                const transitionTo = async (targetIndex) => {
                    const limit = maxIndex();
                    const nextIndex = targetIndex < 0
                        ? limit
                        : targetIndex > limit
                            ? 0
                            : targetIndex;

                    if (nextIndex === index || isTransitioning) return;

                    // Tablet/desktop retain the existing horizontal carousel behaviour.
                    if (!isMobile()) {
                        index = nextIndex;
                        render();
                        return;
                    }

                    // Keep autoplay active for reduced-motion users, but remove the spatial
                    // animation. This mirrors the hero carousel's accessibility behaviour.
                    if (reducedMotion) {
                        const outgoing = items[index];

                        isTransitioning = true;

                        const fadeOut = outgoing.animate(
                            [
                                { opacity: 1 },
                                { opacity: 0.18 },
                            ],
                            {
                                duration: 320,
                                easing: 'ease-in-out',
                                fill: 'forwards',
                            },
                        );

                        try {
                            await fadeOut.finished;
                        } catch {
                            // Continue to the normalized final state below.
                        }

                        fadeOut.cancel();
                        index = nextIndex;
                        render({ animate: false });

                        const incoming = items[index];
                        const fadeIn = incoming.animate(
                            [
                                { opacity: 0.18 },
                                { opacity: 1 },
                            ],
                            {
                                duration: 480,
                                easing: 'ease-out',
                            },
                        );

                        try {
                            await fadeIn.finished;
                        } catch {
                            // Continue to the normalized final state below.
                        }

                        isTransitioning = false;
                        return;
                    }

                    isTransitioning = true;

                    const outgoing = items[index];
                    const incoming = items[nextIndex];
                    const isLoopJump = Math.abs(nextIndex - index) > 1;

                    if (isLoopJump) {
                        // Last -> first (or first -> last) uses a fade-through instead of
                        // travelling across every intermediate card. This mirrors the hero feel.
                        const outgoingAnimation = outgoing.animate(
                            [
                                { opacity: 1, transform: 'scale(1)' },
                                { opacity: 0.10, transform: 'scale(0.992)' },
                            ],
                            {
                                duration: 430,
                                easing: 'ease-in-out',
                                fill: 'forwards',
                            },
                        );

                        await wait(310);

                        index = nextIndex;
                        render({ animate: false });

                        const incomingAnimation = incoming.animate(
                            [
                                { opacity: 0.10, transform: 'scale(1.018)' },
                                { opacity: 1, transform: 'scale(1)' },
                            ],
                            {
                                duration: 760,
                                easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                                fill: 'forwards',
                            },
                        );

                        try {
                            await Promise.all([
                                outgoingAnimation.finished,
                                incomingAnimation.finished,
                            ]);
                        } catch {
                            // Normal cleanup below keeps the carousel in a valid final state.
                        }

                        outgoingAnimation.cancel();
                        incomingAnimation.cancel();
                    } else {
                        // Adjacent slides combine a gentle horizontal move with opacity + scale.
                        const outgoingAnimation = outgoing.animate(
                            [
                                { opacity: 1, transform: 'scale(1)' },
                                { opacity: 0.58, transform: 'scale(0.99)' },
                            ],
                            {
                                duration: MOBILE_TRANSITION_MS,
                                easing: 'ease-in-out',
                            },
                        );

                        const incomingAnimation = incoming.animate(
                            [
                                { opacity: 0.52, transform: 'scale(1.016)' },
                                { opacity: 1, transform: 'scale(1)' },
                            ],
                            {
                                duration: MOBILE_TRANSITION_MS,
                                easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                            },
                        );

                        index = nextIndex;
                        render();

                        try {
                            await Promise.all([
                                outgoingAnimation.finished,
                                incomingAnimation.finished,
                            ]);
                        } catch {
                            // Fast resize/navigation can interrupt Web Animations safely.
                        }
                    }

                    isTransitioning = false;
                };

                const navigate = async (targetIndex) => {
                    stopAutoplay();
                    await transitionTo(targetIndex);
                    scheduleAutoplay();
                };

                previous?.addEventListener('click', () => {
                    void navigate(index <= 0 ? maxIndex() : index - 1);
                });

                next?.addEventListener('click', () => {
                    void navigate(index >= maxIndex() ? 0 : index + 1);
                });

                carousel.addEventListener('touchstart', (event) => {
                    stopAutoplay();
                    startX = event.touches[0]?.clientX ?? null;
                }, { passive: true });

                carousel.addEventListener('touchend', (event) => {
                    if (startX === null) {
                        scheduleAutoplay();
                        return;
                    }

                    const endX = event.changedTouches[0]?.clientX ?? startX;
                    const distance = endX - startX;
                    startX = null;

                    if (Math.abs(distance) < 45) {
                        scheduleAutoplay();
                        return;
                    }

                    const target = distance < 0
                        ? (index >= maxIndex() ? 0 : index + 1)
                        : (index <= 0 ? maxIndex() : index - 1);

                    void navigate(target);
                }, { passive: true });

                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        stopAutoplay();
                        return;
                    }

                    scheduleAutoplay();
                });

                window.addEventListener('resize', () => {
                    isTransitioning = false;
                    render({ animate: false });
                    scheduleAutoplay();
                }, { passive: true });

                render({ animate: false });
                scheduleAutoplay();
            });
        })();
    </script>
@endpush

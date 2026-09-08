@extends('layouts.public')

@section('title', 'Fasilitas — PAUD Harapan Mulia')
@section('meta_description', 'Lingkungan dan dokumentasi fasilitas PAUD Islam Terpadu Harapan Mulia.')

@section('content')
    {{--
        Facilities page: shared About page-hero (same as Visi & Misi).
        Facility photo carousel, then editorial parenting-program blocks.
    --}}
    <x-site.page-hero title="Fasilitas" breadcrumb="Fasilitas" />

    @php
        $facilitySections = [
            [
                'title' => 'Ruang & Sarana Belajar',
                'items' => [
                    ['image' => 'images/facilities/tampak-depan-tk-harapan-mulia.jpeg', 'title' => 'Tampak Depan TK Harapan Mulia'],
                    ['image' => 'images/facilities/taman-bermain-kb.jpeg', 'title' => 'Taman Bermain KB'],
                    ['image' => 'images/facilities/kamar-mandi-kb.jpeg', 'title' => 'Kamar Mandi KB'],
                    ['image' => 'images/facilities/aula-kb.jpeg', 'title' => 'Aula KB'],
                ],
            ],
        ];

        $parentingPrograms = [
            [
                'title' => 'Kajian Sinergi Keluarga',
                'frequency' => '3 bulan sekali',
                'description' => 'Ruang belajar dan refleksi bagi orang tua untuk memperkuat sinergi keluarga dan sekolah dalam mendampingi tumbuh kembang anak.',
                'image' => 'images/program-parenting/kajian-sinergi-keluarga.jpeg',
                'alt' => 'Poster Program Kajian Sinergi Keluarga PAUD IT Harapan Mulia',
                'image_first_on_desktop' => true,
            ],
            [
                'title' => 'Gerakan Orang Tua Mengaji (GOM)',
                'frequency' => '2 pekan sekali',
                'description' => 'Kegiatan rutin orang tua untuk membangun kebiasaan membaca Al-Qur\'an, memperkuat keteladanan, dan menumbuhkan nilai kebaikan dalam keluarga.',
                'image' => 'images/program-parenting/gom-gerakan-orang-tua-mengaji.jpeg',
                'alt' => 'Poster Gerakan Orang Tua Mengaji PAUD IT Harapan Mulia',
                'image_first_on_desktop' => false,
            ],
            [
                'title' => 'Home Parenting',
                'frequency' => '1 bulan sekali',
                'description' => 'Program pendampingan yang mempertemukan sekolah dan orang tua dalam suasana yang lebih dekat untuk berdiskusi, berbagi pengalaman, dan memperkuat sinergi dalam mendampingi tumbuh kembang anak.',
                'image' => 'images/program-parenting/home-parenting.jpeg',
                'alt' => 'Kegiatan Home Parenting PAUD IT Harapan Mulia',
                'image_first_on_desktop' => true,
                'presentation' => 'photo',
            ],
        ];
    @endphp

    <section class="bg-white pb-16 pt-14 md:pb-20 md:pt-16 lg:pb-24 lg:pt-14">
        <div class="mx-auto w-full max-w-[1300px] px-5 sm:px-6 lg:px-0">
            <div class="space-y-16 md:space-y-20 lg:space-y-14">
                @foreach ($facilitySections as $sectionIndex => $section)
                    <section class="text-center" aria-labelledby="facility-section-{{ $sectionIndex }}">
                        <h2
                            id="facility-section-{{ $sectionIndex }}"
                            class="text-[30px] font-semibold leading-[1.15] tracking-[-0.045em] text-site-text md:text-[38px] lg:text-[47px]"
                        >
                            {{ $section['title'] }}
                        </h2>

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

                <section class="text-center" aria-labelledby="parenting-section">
                    <h2
                        id="parenting-section"
                        class="text-[30px] font-semibold leading-[1.15] tracking-[-0.045em] text-site-text md:text-[38px] lg:text-[47px]"
                    >
                        Program Parenting &amp; Kolaborasi Keluarga
                    </h2>

                    <p class="mx-auto mt-5 max-w-[830px] text-[14px] leading-[2] text-site-muted md:text-[15px] lg:mt-4 lg:text-[15px] lg:leading-[1.9]">
                        Harapan Mulia membangun sinergi antara sekolah dan keluarga melalui program pendampingan orang tua yang dilaksanakan secara berkala.
                    </p>

                    <div class="mx-auto mt-12 max-w-[1140px] space-y-16 text-left md:mt-14 md:space-y-20 lg:mt-16 lg:space-y-24">
                        @foreach ($parentingPrograms as $program)
                            @php
                                $isPhoto = ($program['presentation'] ?? 'poster') === 'photo';
                            @endphp
                            <article
                                class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16"
                                aria-labelledby="parenting-program-{{ $loop->index }}"
                            >
                                <div class="{{ $program['image_first_on_desktop'] ? '' : 'lg:order-2' }}">
                                    @if ($isPhoto)
                                        <div class="group overflow-hidden rounded-[9px] bg-[#eef1f3] shadow-[0_8px_24px_rgba(17,24,39,0.07)] transition duration-300 hover:shadow-[0_12px_28px_rgba(17,24,39,0.13)]">
                                            <img
                                                src="{{ asset($program['image']) }}"
                                                alt="{{ $program['alt'] }}"
                                                class="h-auto w-full object-cover transition duration-500 ease-out group-hover:scale-[1.02]"
                                                decoding="async"
                                                loading="lazy"
                                            >
                                        </div>
                                    @else
                                        <a
                                            href="{{ asset($program['image']) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="group mx-auto block w-[82%] rounded-[9px] border border-[#edf0f2] bg-[#f7f9fa] p-4 shadow-[0_8px_24px_rgba(17,24,39,0.07)] transition duration-300 hover:shadow-[0_12px_28px_rgba(17,24,39,0.13)] focus-visible:outline-brand-green-600 lg:w-full"
                                        >
                                            <img
                                                src="{{ asset($program['image']) }}"
                                                alt="{{ $program['alt'] }}"
                                                class="mx-auto h-auto w-full max-h-[28rem] object-contain lg:max-h-[36rem]"
                                                decoding="async"
                                                loading="lazy"
                                            >
                                        </a>
                                    @endif
                                </div>

                                <div class="{{ $program['image_first_on_desktop'] ? '' : 'lg:order-1' }}">
                                    <h3
                                        id="parenting-program-{{ $loop->index }}"
                                        class="text-[22px] font-semibold leading-tight tracking-[-0.03em] text-site-text md:text-[26px] lg:text-[28px]"
                                    >
                                        {{ $program['title'] }}
                                    </h3>

                                    <p class="mt-4">
                                        <span class="inline-flex rounded-full bg-brand-green-300/15 px-3 py-1 text-[11px] font-semibold tracking-[0.04em] text-brand-green-700 md:text-[12px]">
                                            {{ $program['frequency'] }}
                                        </span>
                                    </p>

                                    <p class="mt-5 max-w-[520px] text-[14px] leading-[2] text-site-muted md:text-[15px] lg:leading-[1.9]">
                                        {{ $program['description'] }}
                                    </p>

                                    @if (! $isPhoto)
                                        <a
                                            href="{{ asset($program['image']) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="mt-6 inline-flex items-center gap-2 text-[13px] font-semibold text-brand-green-700 transition duration-200 hover:text-brand-green-900 lg:text-[15px]"
                                        >
                                            Lihat Poster →
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
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

                    if (!isMobile() || document.hidden || items.length < 2 || reducedMotion) {
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

                    // Reduced-motion: autoplay stays off; prev/next/swipe jump without fade or scale.
                    if (reducedMotion) {
                        index = nextIndex;
                        render({ animate: false });
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

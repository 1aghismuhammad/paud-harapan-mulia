<footer class="mt-0 bg-brand-green-900 text-white">
    {{-- 
        Desktop reference target (1920px):
        - inner container: ~1120px
        - green area: ~528px
        - columns: ~360px / 280px / remaining
        - horizontal gap: ~95px
    --}}
    <div class="mx-auto grid w-full max-w-[1120px] gap-12 px-5 py-16 sm:px-6 md:grid-cols-3 lg:min-h-[528px] lg:grid-cols-[360px_280px_1fr] lg:gap-[95px] lg:px-0 lg:pt-[116px] lg:pb-[90px]">
        {{-- Kontak --}}
        <div>
            <h2 class="text-[15px] font-semibold lg:text-[16px]">
                Kontak
            </h2>

            <div class="mt-7 space-y-0 lg:mt-8">
                <a
                    href="https://wa.me/6289613624186"
                    class="flex items-center gap-5 border-b border-white/10 py-5 first:pt-0 hover:text-white lg:gap-6"
                >
                    <span class="inline-flex w-8 shrink-0 items-center justify-center text-brand-yellow-400">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.65" aria-hidden="true">
                            <path d="M8.5 4.5h7a3 3 0 0 1 3 3v4a3 3 0 0 1-3 3h-3.2L9 17v-2.5h-.5a3 3 0 0 1-3-3v-4a3 3 0 0 1 3-3Z"/>
                            <path d="M9 8h6M9 11h4"/>
                            <path d="M5.2 14.5c-.7.5-1.5 1.4-1.7 2.1-.4 1.4 2.1 3.9 3.5 3.5.7-.2 1.6-1 2.1-1.7"/>
                        </svg>
                    </span>

                    <span>
                        <small class="block text-[12px] leading-5 text-white/55 lg:text-[13px]">
                            Hubungi Kami
                        </small>
                        <span class="block text-[14px] leading-6 font-medium text-white lg:text-[15px]">
                            0896 1362 4186
                        </span>
                    </span>
                </a>

                <a
                    href="mailto:tkitharapanmulia063@gmail.com"
                    class="flex items-center gap-5 border-b border-white/10 py-5 hover:text-white lg:gap-6"
                >
                    <span class="inline-flex w-8 shrink-0 items-center justify-center text-brand-yellow-400">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.65" aria-hidden="true">
                            <path d="M3 6.5h18v12H3z"/>
                            <path d="m4 8 8 6 8-6"/>
                            <path d="m4 17 5.5-5M20 17l-5.5-5"/>
                        </svg>
                    </span>

                    <span class="min-w-0">
                        <small class="block text-[12px] leading-5 text-white/55 lg:text-[13px]">
                            Kirim Email
                        </small>
                        <span class="block break-all text-[14px] leading-6 font-medium text-white lg:text-[15px]">
                            tkitharapanmulia063@gmail.com
                        </span>
                    </span>
                </a>

                <div class="flex items-center gap-5 py-5 lg:gap-6">
                    <span class="inline-flex w-8 shrink-0 items-center justify-center text-brand-yellow-400">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.65" aria-hidden="true">
                            <path d="M12 21s6-5.1 6-11a6 6 0 1 0-12 0c0 5.9 6 11 6 11Z"/>
                            <circle cx="12" cy="10" r="2.2"/>
                            <path d="M17 17h3v4h-5.5"/>
                        </svg>
                    </span>

                    <span>
                        <small class="block text-[12px] leading-5 text-white/55 lg:text-[13px]">
                            Kunjungi Sekolah
                        </small>
                        <span class="block text-[14px] leading-7 font-medium text-white lg:text-[15px]">
                            Jl. Caren RT 01 RW 04, Ngawen, Blora
                        </span>
                    </span>
                </div>
            </div>
        </div>

        {{-- Link --}}
        <div>
            <h2 class="text-[15px] font-semibold lg:text-[16px]">
                Link
            </h2>

            <nav
                class="mt-7 grid gap-4 text-[14px] leading-6 text-white/65 lg:mt-8 lg:gap-[14px] lg:text-[15px]"
                aria-label="Navigasi footer"
            >
                <a href="{{ route('home') }}" class="transition hover:text-white">Beranda</a>
                <a href="{{ route('about.history') }}" class="transition hover:text-white">Sejarah</a>
                <a href="{{ route('about.vision-mission') }}" class="transition hover:text-white">Visi & Misi</a>
                <a href="{{ route('about.facilities') }}" class="transition hover:text-white">Fasilitas</a>
                <a href="{{ route('school.paud') }}" class="transition hover:text-white">PAUD</a>
                <a href="{{ route('school.tk') }}" class="transition hover:text-white">TK</a>
                <a href="{{ route('news.index') }}" class="transition hover:text-white">Berita</a>
            </nav>
        </div>

        {{-- Kata Perenungan --}}
        <div>
            <h2 class="text-[15px] font-semibold lg:text-[16px]">
                Kata Perenungan
            </h2>

            <blockquote class="mt-7 max-w-[320px] text-[14px] leading-7 text-white/65 lg:mt-8 lg:text-[15px] lg:leading-[1.9]">
                “Pendidikan adalah proses menumbuhkan kebiasaan baik, kemandirian, kreativitas, dan akhlak dalam lingkungan yang aman serta menyenangkan.”
            </blockquote>

            <p class="mt-4 text-[12px] leading-5 text-brand-yellow-400 lg:text-[13px]">
                — Preview copy, menunggu final sekolah
            </p>
        </div>
    </div>

    {{-- Copyright bar --}}
    <div class="relative bg-[#1c1e27]">
        <div class="mx-auto flex min-h-[72px] w-full max-w-[1120px] flex-col gap-5 px-5 py-5 text-[12px] text-white/65 sm:px-6 sm:flex-row sm:items-center sm:justify-between lg:min-h-[88px] lg:px-0 lg:py-7 lg:text-[15px]">
            <p>
                © {{ date('Y') }} PAUD Harapan Mulia
            </p>

            <div class="flex items-center gap-7 lg:gap-8" aria-label="Media sosial">
                <a href="https://www.facebook.com/profile.php?id=100015126961842" target="_blank" rel="noopener noreferrer" class="text-white transition hover:text-brand-yellow-400" aria-label="Facebook">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M13.5 8.4V6.7c0-.8.5-1 1-1h2V2.4c-.4-.1-1.8-.2-3.4-.2-3.3 0-5.6 2-5.6 5.8v3.2H4v4h3.5V22h4.2v-6.8h3.5l.6-4h-4.1V8.8c0-1.1.3-1.9 1.8-1.9Z"/>
                    </svg>
                </a>

                <a href="https://www.youtube.com/channel/UCxIpkGFNxzFJ-5bu67yEVbA" target="_blank" rel="noopener noreferrer" class="text-white transition hover:text-brand-yellow-400" aria-label="YouTube">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M21.6 7.2a2.7 2.7 0 0 0-1.9-1.9C18 4.8 12 4.8 12 4.8s-6 0-7.7.5a2.7 2.7 0 0 0-1.9 1.9A28 28 0 0 0 2 12a28 28 0 0 0 .4 4.8 2.7 2.7 0 0 0 1.9 1.9c1.7.5 7.7.5 7.7.5s6 0 7.7-.5a2.7 2.7 0 0 0 1.9-1.9A28 28 0 0 0 22 12a28 28 0 0 0-.4-4.8ZM10 15.3V8.7l5.7 3.3L10 15.3Z"/>
                    </svg>
                </a>

            </div>
        </div>

        {{-- Back to top, mengikuti reference --}}
        <button
            type="button"
            data-back-to-top
            class="absolute right-7 top-1/2 hidden h-11 w-11 -translate-y-1/2 items-center justify-center bg-white/15 text-white transition hover:bg-white/25 lg:inline-flex"
            aria-label="Kembali ke atas"
        >
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="8"/>
                <path d="m8.5 13 3.5-3.5 3.5 3.5M12 9.5V16"/>
            </svg>
        </button>
    </div>
</footer>

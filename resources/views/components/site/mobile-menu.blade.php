<div
    id="mobile-navigation"
    data-mobile-menu
    hidden
    class="fixed inset-0 z-[100] lg:hidden"
    role="dialog"
    aria-modal="true"
    aria-label="Navigasi mobile"
>
    <button
        type="button"
        data-mobile-menu-overlay
        class="absolute inset-0 bg-slate-950/55"
        aria-label="Tutup navigasi"
    ></button>

    <aside class="relative z-10 flex h-dvh w-[78%] max-w-[22rem] flex-col overflow-y-auto bg-white shadow-2xl">
        <div class="flex min-h-20 items-stretch border-b border-site-border">
            <a
                href="{{ route('home') }}"
                class="flex min-w-0 flex-1 items-center gap-2.5 px-6"
                aria-label="PAUD Harapan Mulia - Beranda"
            >
                <img
                    src="{{ asset('images/paud/logo-temporary.jpeg') }}"
                    alt="Identitas sementara PAUD Harapan Mulia"
                    class="h-11 w-16 object-contain object-left"
                >
                <span class="text-[10px] leading-4 font-semibold text-brand-green-900">
                    PAUD IT<br>Harapan Mulia
                </span>
            </a>

            <button
                type="button"
                data-mobile-menu-close
                class="inline-flex w-16 shrink-0 items-center justify-center bg-brand-green-700 text-white transition hover:bg-brand-green-900"
                aria-label="Tutup navigasi"
            >
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                    <circle cx="12" cy="12" r="8.5"/>
                    <path d="m9 9 6 6M15 9l-6 6"/>
                </svg>
            </button>
        </div>

        <nav class="px-7 py-3" aria-label="Navigasi mobile">
            <a
                href="{{ route('home') }}"
                class="block border-b border-site-border py-5 text-[16px] font-semibold transition {{ request()->routeIs('home') ? 'text-brand-green-700' : 'text-slate-800 hover:text-brand-green-700' }}"
            >
                Beranda
            </a>

            <div class="border-b border-site-border">
                <button
                    type="button"
                    data-mobile-submenu-toggle
                    aria-expanded="{{ request()->routeIs('about.*') ? 'true' : 'false' }}"
                    aria-controls="mobile-about-menu"
                    class="flex w-full items-center justify-between py-5 text-left text-[16px] font-semibold transition {{ request()->routeIs('about.*') ? 'text-brand-green-700' : 'text-slate-800 hover:text-brand-green-700' }}"
                >
                    <span>Tentang Kami</span>
                    <span class="relative h-4 w-4 shrink-0 text-slate-500" aria-hidden="true">
                        <span class="absolute top-1/2 left-0 h-px w-full -translate-y-1/2 bg-current"></span>
                        <span data-submenu-vertical class="absolute top-0 left-1/2 h-full w-px -translate-x-1/2 bg-current {{ request()->routeIs('about.*') ? 'hidden' : '' }}"></span>
                    </span>
                </button>

                <div id="mobile-about-menu" {{ request()->routeIs('about.*') ? '' : 'hidden' }} class="pb-4 pl-4">
                    <a href="{{ route('about.history') }}" class="block py-2.5 text-sm text-slate-500 transition hover:text-brand-green-700">Sejarah</a>
                    <a href="{{ route('about.vision-mission') }}" class="block py-2.5 text-sm text-slate-500 transition hover:text-brand-green-700">Visi & Misi</a>
                    <a href="{{ route('about.facilities') }}" class="block py-2.5 text-sm text-slate-500 transition hover:text-brand-green-700">Fasilitas</a>
                </div>
            </div>

            <div class="border-b border-site-border">
                <button
                    type="button"
                    data-mobile-submenu-toggle
                    aria-expanded="{{ request()->routeIs('school.*') ? 'true' : 'false' }}"
                    aria-controls="mobile-school-menu"
                    class="flex w-full items-center justify-between py-5 text-left text-[16px] font-semibold transition {{ request()->routeIs('school.*') ? 'text-brand-green-700' : 'text-slate-800 hover:text-brand-green-700' }}"
                >
                    <span>Sekolah Kami</span>
                    <span class="relative h-4 w-4 shrink-0 text-slate-500" aria-hidden="true">
                        <span class="absolute top-1/2 left-0 h-px w-full -translate-y-1/2 bg-current"></span>
                        <span data-submenu-vertical class="absolute top-0 left-1/2 h-full w-px -translate-x-1/2 bg-current {{ request()->routeIs('school.*') ? 'hidden' : '' }}"></span>
                    </span>
                </button>

                <div id="mobile-school-menu" {{ request()->routeIs('school.*') ? '' : 'hidden' }} class="pb-4 pl-4">
                    <a href="{{ route('school.paud') }}" class="block py-2.5 text-sm text-slate-500 transition hover:text-brand-green-700">PAUD</a>
                    <a href="{{ route('school.tk') }}" class="block py-2.5 text-sm text-slate-500 transition hover:text-brand-green-700">TK</a>
                </div>
            </div>

            <a
                href="{{ route('news.index') }}"
                class="block border-b border-site-border py-5 text-[16px] font-semibold transition {{ request()->routeIs('news.*') ? 'text-brand-green-700' : 'text-slate-800 hover:text-brand-green-700' }}"
            >
                Berita
            </a>
        </nav>
    </aside>
</div>

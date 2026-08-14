<div class="relative z-40 border-y border-[#ececef] bg-white shadow-[0_3px_14px_rgba(18,24,40,0.025)]">
    <div class="header-container flex min-h-[72px] items-center justify-between lg:min-h-[86px]">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 lg:hidden" aria-label="PAUD Harapan Mulia - Beranda">
            <img src="{{ asset('images/paud/logo-temporary.jpeg') }}" alt="Identitas sementara PAUD Harapan Mulia" class="h-11 w-16 object-contain object-left">
            <span class="text-[11px] leading-4 font-semibold text-brand-green-900">PAUD IT<br>Harapan Mulia</span>
        </a>

        <nav class="hidden items-center lg:flex" aria-label="Navigasi utama">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Beranda</a>

            <div class="group relative">
                <a href="{{ route('about.history') }}" class="nav-link {{ request()->routeIs('about.*') ? 'nav-link-active' : '' }}">
                    Tentang Kami
                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
                </a>
                <div class="dropdown-panel">
                    <a href="{{ route('about.history') }}" class="dropdown-item">Sejarah</a>
                    <a href="{{ route('about.vision-mission') }}" class="dropdown-item">Visi & Misi</a>
                    <a href="{{ route('about.facilities') }}" class="dropdown-item">Fasilitas</a>
                </div>
            </div>

            <div class="group relative">
                <a href="{{ route('school.paud') }}" class="nav-link {{ request()->routeIs('school.*') ? 'nav-link-active' : '' }}">
                    Sekolah Kami
                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
                </a>
                <div class="dropdown-panel">
                    <a href="{{ route('school.paud') }}" class="dropdown-item">PAUD</a>
                    <a href="{{ route('school.tk') }}" class="dropdown-item">TK</a>
                </div>
            </div>

            <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'nav-link-active' : '' }}">Berita</a>
        </nav>

        <button type="button" data-mobile-menu-toggle aria-expanded="false" aria-controls="mobile-navigation" class="inline-flex h-12 w-12 items-center justify-center text-site-text lg:hidden">
            <span class="sr-only">Buka navigasi</span>
            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>

    <x-site.mobile-menu />
</div>

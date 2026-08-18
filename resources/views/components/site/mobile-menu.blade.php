<div id="mobile-navigation" data-mobile-menu hidden class="fixed inset-0 z-[100] lg:hidden" role="dialog" aria-modal="true" aria-label="Navigasi mobile">
    <button type="button" data-mobile-menu-overlay class="absolute inset-0 bg-slate-950/55" aria-label="Tutup navigasi"></button>

    <aside class="relative z-10 flex h-dvh w-[82%] max-w-[22rem] flex-col overflow-y-auto bg-white shadow-2xl">
        <div class="flex min-h-20 items-stretch border-b border-site-border">
            <a href="{{ route('home') }}" class="flex min-w-0 flex-1 items-center gap-2.5 px-6">
                <img src="{{ asset('images/paud/logo-official.webp') }}" alt="Logo resmi PAUD IT Harapan Mulia" class="h-12 w-12 shrink-0 object-contain object-left">
                <span class="text-[10px] leading-4 font-semibold text-brand-green-900">PAUD IT<br>Harapan Mulia</span>
            </a>
            <button type="button" data-mobile-menu-close class="inline-flex w-16 items-center justify-center bg-brand-green-700 text-white" aria-label="Tutup navigasi">
                <span class="text-2xl">⊗</span>
            </button>
        </div>

        <nav class="px-7 py-3">
            <a href="{{ route('home') }}" class="block border-b border-site-border py-5 text-[16px] font-semibold {{ request()->routeIs('home') ? 'text-brand-green-700' : 'text-slate-800' }}">Beranda</a>

            <div class="border-b border-site-border">
                <button type="button" data-mobile-submenu-toggle aria-expanded="false" aria-controls="mobile-about-menu" class="flex w-full items-center justify-between py-5 text-left text-[16px] font-semibold text-slate-800">
                    <span>Tentang Kami</span><span data-submenu-symbol class="text-xl font-light text-slate-500">+</span>
                </button>
                <div id="mobile-about-menu" hidden class="pb-4 pl-4">
                    <a href="{{ route('about.history') }}" class="block py-2.5 text-sm text-slate-500">Sejarah</a>
                    <a href="{{ route('about.vision-mission') }}" class="block py-2.5 text-sm text-slate-500">Visi & Misi</a>
                    <a href="{{ route('about.facilities') }}" class="block py-2.5 text-sm text-slate-500">Fasilitas</a>
                </div>
            </div>

            <div class="border-b border-site-border">
                <button type="button" data-mobile-submenu-toggle aria-expanded="false" aria-controls="mobile-school-menu" class="flex w-full items-center justify-between py-5 text-left text-[16px] font-semibold text-slate-800">
                    <span>Sekolah Kami</span><span data-submenu-symbol class="text-xl font-light text-slate-500">+</span>
                </button>
                <div id="mobile-school-menu" hidden class="pb-4 pl-4">
                    <a href="{{ route('school.paud') }}" class="block py-2.5 text-sm text-slate-500">PAUD</a>
                    <a href="{{ route('school.tk') }}" class="block py-2.5 text-sm text-slate-500">TK</a>
                </div>
            </div>

            <a href="{{ route('news.index') }}" class="block border-b border-site-border py-5 text-[16px] font-semibold {{ request()->routeIs('news.*') ? 'text-brand-green-700' : 'text-slate-800' }}">Berita</a>
        </nav>
    </aside>
</div>

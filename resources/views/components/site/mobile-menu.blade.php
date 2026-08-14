<div data-mobile-menu hidden class="border-t border-site-border bg-white lg:hidden">
    <nav class="site-container py-3" aria-label="Navigasi mobile">
        <a href="{{ route('home') }}" class="block border-b border-site-border py-3 text-sm {{ request()->routeIs('home') ? 'font-semibold text-brand-green-700' : 'text-slate-600' }}">Beranda</a>

        <div class="border-b border-site-border">
            <button type="button" data-mobile-submenu-toggle aria-expanded="false" aria-controls="mobile-about-menu" class="flex w-full items-center justify-between py-3 text-left text-sm text-slate-600">
                <span>Tentang Kami</span>
                <svg data-chevron class="h-4 w-4 transition" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
            </button>
            <div id="mobile-about-menu" hidden class="pb-3 pl-4">
                <a href="{{ route('about.history') }}" class="block py-2 text-sm text-slate-500">Sejarah</a>
                <a href="{{ route('about.vision-mission') }}" class="block py-2 text-sm text-slate-500">Visi & Misi</a>
                <a href="{{ route('about.facilities') }}" class="block py-2 text-sm text-slate-500">Fasilitas</a>
            </div>
        </div>

        <div class="border-b border-site-border">
            <button type="button" data-mobile-submenu-toggle aria-expanded="false" aria-controls="mobile-school-menu" class="flex w-full items-center justify-between py-3 text-left text-sm text-slate-600">
                <span>Sekolah Kami</span>
                <svg data-chevron class="h-4 w-4 transition" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
            </button>
            <div id="mobile-school-menu" hidden class="pb-3 pl-4">
                <a href="{{ route('school.paud') }}" class="block py-2 text-sm text-slate-500">PAUD</a>
                <a href="{{ route('school.tk') }}" class="block py-2 text-sm text-slate-500">TK</a>
            </div>
        </div>

        <a href="{{ route('news.index') }}" class="block py-3 text-sm {{ request()->routeIs('news.*') ? 'font-semibold text-brand-green-700' : 'text-slate-600' }}">Berita</a>

        <div class="mt-4 rounded-lg bg-site-surface p-4 text-xs leading-6 text-site-muted">
            <div>WhatsApp: 0896 1362 4186</div>
            <div class="break-all">tkitharapanmulia063@gmail.com</div>
        </div>
    </nav>
</div>

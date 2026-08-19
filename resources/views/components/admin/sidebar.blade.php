<aside class="hidden min-h-screen border-r border-site-border bg-white lg:flex lg:flex-col">
    <div class="flex min-h-[92px] items-center border-b border-site-border px-6">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3" aria-label="Dashboard Admin PAUD IT Harapan Mulia">
            <img
                src="{{ asset('images/paud/logo-official.webp') }}"
                alt="Logo resmi PAUD IT Harapan Mulia"
                class="h-[58px] w-[58px] shrink-0 object-contain"
            >
            <span>
                <span class="block text-[10px] font-semibold uppercase tracking-[0.18em] text-brand-green-600">Admin CMS</span>
                <span class="mt-1 block text-[13px] font-semibold leading-[1.35] text-brand-green-950">PAUD IT<br>Harapan Mulia</span>
            </span>
        </a>
    </div>

    <nav class="flex-1 px-4 py-6" aria-label="Navigasi admin">
        <p class="px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#a1a5ad]">Utama</p>

        <div class="mt-3 space-y-1.5">
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex min-h-11 items-center gap-3 rounded-[10px] px-3.5 text-[13px] font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-green-900 text-white shadow-[0_8px_20px_rgba(41,105,62,0.16)]' : 'text-site-muted hover:bg-[#f3f7f2] hover:text-brand-green-950' }}"
            >
                <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 13h6V4H4v9Zm0 7h6v-5H4v5Zm10 0h6v-9h-6v9Zm0-16v5h6V4h-6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                </svg>
                Dashboard
            </a>
        </div>

        <p class="mt-8 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#a1a5ad]">Konten</p>
        <div class="mt-3 space-y-1.5">
            <div class="flex min-h-11 items-center gap-3 rounded-[10px] px-3.5 text-[13px] font-semibold text-[#a5a8ae]" aria-disabled="true">
                <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6 3.75h9.25L19 7.5v12.75H6V3.75Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                    <path d="M15 3.75V7.5h4M9 11h7M9 14.5h7M9 18h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                </svg>
                <span class="flex-1">Berita</span>
                <span class="rounded-full bg-[#eef1ee] px-2 py-1 text-[9px] font-semibold uppercase tracking-[0.08em] text-[#90949a]">Segera</span>
            </div>
        </div>
    </nav>

    <div class="border-t border-site-border p-4">
        <a
            href="{{ route('home') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex min-h-11 items-center gap-3 rounded-[10px] px-3.5 text-[13px] font-semibold text-site-muted transition hover:bg-[#f3f7f2] hover:text-brand-green-950"
        >
            <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M14 5h5v5M19 5l-7 7M10 7H5v12h12v-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Lihat Website
        </a>

        <form method="POST" action="{{ route('admin.logout') }}" class="mt-1.5">
            @csrf
            <button type="submit" class="flex min-h-11 w-full items-center gap-3 rounded-[10px] px-3.5 text-left text-[13px] font-semibold text-site-muted transition hover:bg-red-50 hover:text-red-700">
                <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M10 5H5v14h5M14 8l4 4-4 4M18 12H9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

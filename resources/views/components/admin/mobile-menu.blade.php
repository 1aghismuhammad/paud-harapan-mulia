<div
    id="admin-mobile-menu"
    data-admin-mobile-menu
    class="pointer-events-none fixed inset-0 z-50 opacity-0 transition-opacity duration-300 lg:hidden"
    aria-label="Menu admin mobile"
>
    <button
        type="button"
        data-admin-menu-close
        class="absolute inset-0 bg-[#111713]/55"
        aria-label="Tutup menu admin"
    ></button>

    <aside
        data-admin-mobile-panel
        class="relative flex h-full w-[min(86vw,320px)] -translate-x-full flex-col bg-white shadow-[24px_0_60px_rgba(17,24,39,0.18)] transition-transform duration-300 ease-out"
    >
        <div class="flex min-h-[88px] items-center justify-between gap-4 border-b border-site-border px-5">
            <a href="{{ route('admin.dashboard') }}" class="flex min-w-0 items-center gap-3" aria-label="Dashboard Admin PAUD IT Harapan Mulia">
                <img
                    src="{{ asset('images/paud/logo-official.webp') }}"
                    alt="Logo resmi PAUD IT Harapan Mulia"
                    class="h-[54px] w-[54px] shrink-0 object-contain"
                >
                <span class="min-w-0">
                    <span class="block text-[9px] font-semibold uppercase tracking-[0.16em] text-brand-green-600">Admin CMS</span>
                    <span class="mt-1 block truncate text-[13px] font-semibold text-brand-green-950">PAUD IT Harapan Mulia</span>
                </span>
            </a>

            <button
                type="button"
                data-admin-menu-close
                class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-[9px] border border-site-border text-site-text"
                aria-label="Tutup menu admin"
            >
                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-4 py-5" aria-label="Navigasi admin mobile">
            <p class="px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#a1a5ad]">Utama</p>
            <a href="{{ route('admin.dashboard') }}" class="mt-3 flex min-h-11 items-center gap-3 rounded-[10px] bg-brand-green-900 px-3.5 text-[13px] font-semibold text-white">
                <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 13h6V4H4v9Zm0 7h6v-5H4v5Zm10 0h6v-9h-6v9Zm0-16v5h6V4h-6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                </svg>
                Dashboard
            </a>

            <p class="mt-8 px-3 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#a1a5ad]">Konten</p>
            <div class="mt-3 flex min-h-11 items-center gap-3 rounded-[10px] px-3.5 text-[13px] font-semibold text-[#a5a8ae]" aria-disabled="true">
                <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6 3.75h9.25L19 7.5v12.75H6V3.75Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                    <path d="M15 3.75V7.5h4M9 11h7M9 14.5h7M9 18h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                </svg>
                <span class="flex-1">Berita</span>
                <span class="rounded-full bg-[#eef1ee] px-2 py-1 text-[9px] font-semibold uppercase tracking-[0.08em] text-[#90949a]">Segera</span>
            </div>
        </nav>

        <div class="border-t border-site-border p-4">
            <div class="mb-3 rounded-[12px] bg-[#f4f7f3] px-4 py-3">
                <p class="truncate text-[12px] font-semibold text-site-text">{{ auth()->user()->name }}</p>
                <p class="mt-1 truncate text-[10px] text-site-muted">{{ auth()->user()->email }}</p>
            </div>

            <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer" class="flex min-h-11 items-center gap-3 rounded-[10px] px-3.5 text-[13px] font-semibold text-site-muted">
                <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M14 5h5v5M19 5l-7 7M10 7H5v12h12v-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Lihat Website
            </a>

            <form method="POST" action="{{ route('admin.logout') }}" class="mt-1.5">
                @csrf
                <button type="submit" class="flex min-h-11 w-full items-center gap-3 rounded-[10px] px-3.5 text-left text-[13px] font-semibold text-red-700">
                    <svg class="h-[18px] w-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10 5H5v14h5M14 8l4 4-4 4M18 12H9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>
</div>

@props(['title' => 'Dashboard'])

<header class="sticky top-0 z-30 border-b border-site-border bg-white/95 backdrop-blur">
    <div class="flex min-h-[72px] items-center justify-between gap-4 px-5 sm:px-6 lg:min-h-[76px] lg:px-8 xl:px-10">
        <div class="flex min-w-0 items-center gap-3.5">
            <button
                type="button"
                data-admin-menu-open
                aria-controls="admin-mobile-menu"
                aria-expanded="false"
                class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-[10px] border border-site-border bg-white text-site-text transition hover:border-brand-green-600 hover:text-brand-green-950 lg:hidden"
                aria-label="Buka menu admin"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </button>

            <div class="min-w-0">
                <p class="truncate text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">Admin CMS</p>
                <h1 class="mt-0.5 truncate text-[18px] font-semibold text-site-text sm:text-[20px]">{{ $title }}</h1>
            </div>
        </div>

        <div class="flex min-w-0 items-center gap-3">
            <div class="hidden min-w-0 text-right sm:block">
                <p class="max-w-[220px] truncate text-[12px] font-semibold text-site-text">{{ auth()->user()->name }}</p>
                <p class="mt-0.5 max-w-[220px] truncate text-[10px] text-site-muted">{{ auth()->user()->email }}</p>
            </div>
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-green-900 text-[13px] font-semibold uppercase text-white" aria-hidden="true">
                {{ mb_substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>
    </div>
</header>

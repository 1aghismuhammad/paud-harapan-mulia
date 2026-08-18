<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard Admin | PAUD IT Harapan Mulia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f7f3]">
    <header class="border-b border-site-border bg-white">
        <div class="mx-auto flex min-h-[72px] w-full max-w-[1180px] items-center justify-between gap-4 px-5 sm:px-6 lg:px-0">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-brand-green-600">Admin CMS</p>
                <p class="mt-1 text-[16px] font-semibold text-site-text">PAUD IT Harapan Mulia</p>
            </div>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="rounded-[9px] border border-site-border bg-white px-4 py-2 text-[12px] font-semibold text-site-text transition hover:border-brand-green-600 hover:text-brand-green-900">
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <main class="mx-auto w-full max-w-[1180px] px-5 py-10 sm:px-6 lg:px-0 lg:py-14">
        <section class="rounded-[18px] border border-site-border bg-white p-6 shadow-[0_16px_40px_rgba(29,79,48,0.08)] sm:p-8">
            <p class="text-[12px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">Phase 3A</p>
            <h1 class="mt-2 text-[28px] font-semibold text-site-text sm:text-[34px]">Dashboard Admin</h1>
            <p class="mt-3 max-w-[680px] text-[14px] leading-7 text-site-muted">
                Authentication sudah aktif. Modul pengelolaan berita akan ditambahkan pada batch Phase 3 berikutnya.
            </p>
        </section>
    </main>
</body>
</html>

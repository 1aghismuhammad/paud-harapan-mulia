<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login Admin | PAUD IT Harapan Mulia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f7f3]">
    <main class="flex min-h-screen items-center justify-center px-5 py-10">
        <section class="w-full max-w-[430px] overflow-hidden rounded-[18px] border border-site-border bg-white shadow-[0_24px_60px_rgba(29,79,48,0.12)]">
            <div class="bg-brand-green-900 px-7 py-7 text-white">
                <p class="text-[12px] font-semibold uppercase tracking-[0.18em] text-white/70">Admin CMS</p>
                <h1 class="mt-2 text-[26px] font-semibold leading-tight">PAUD IT Harapan Mulia</h1>
                <p class="mt-2 text-[13px] leading-relaxed text-white/75">Masuk untuk mengelola konten website sekolah.</p>
            </div>

            <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5 px-7 py-8" novalidate>
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-[13px] font-semibold text-site-text">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="username"
                        required
                        autofocus
                        class="h-12 w-full rounded-[10px] border border-site-border bg-white px-4 text-[14px] text-site-text outline-none transition focus:border-brand-green-600 focus:ring-4 focus:ring-brand-green-600/10"
                        placeholder="admin@contoh.sch.id"
                    >
                    @error('email')
                        <p class="mt-2 text-[12px] font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-[13px] font-semibold text-site-text">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                        class="h-12 w-full rounded-[10px] border border-site-border bg-white px-4 text-[14px] text-site-text outline-none transition focus:border-brand-green-600 focus:ring-4 focus:ring-brand-green-600/10"
                        placeholder="Masukkan password"
                    >
                    @error('password')
                        <p class="mt-2 text-[12px] font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="flex h-12 w-full items-center justify-center rounded-[10px] bg-brand-green-900 px-5 text-[14px] font-semibold text-white transition duration-200 hover:bg-brand-green-950 focus-visible:outline-brand-orange-500">
                    Masuk ke Dashboard
                </button>

                <a href="{{ route('home') }}" class="block text-center text-[12px] font-medium text-site-muted transition hover:text-brand-green-900">
                    Kembali ke website
                </a>
            </form>
        </section>
    </main>
</body>
</html>

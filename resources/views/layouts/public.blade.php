<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('meta_description', 'Website resmi PAUD Islam Terpadu Harapan Mulia Ngawen, Blora.')">
        <meta name="theme-color" content="#29693E">

        <title>@yield('title', 'PAUD Harapan Mulia')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <script>
            document.documentElement.classList.add('js');

            window.addEventListener('load', () => {
                window.setTimeout(() => {
                    if (!document.documentElement.classList.contains('motion-ready')) {
                        document.documentElement.classList.remove('js');
                    }
                }, 500);
            });
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
    <body class="min-h-screen bg-white">
        <a href="#main-content" class="sr-only z-[100] bg-white px-4 py-2 focus:not-sr-only focus:fixed focus:top-4 focus:left-4">
            Lewati ke konten utama
        </a>

        <header>
            <x-site.topbar />
            <x-site.navbar />
        </header>

        <main id="main-content">
            @yield('content')
        </main>
        <x-site.footer />

        @stack('scripts')
    </body>
</html>

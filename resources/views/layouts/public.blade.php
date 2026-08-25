<!DOCTYPE html>
<html lang="id">
    <head>
        @php
            $seoTitle = trim($__env->yieldContent('title', 'PAUD Harapan Mulia'));
            $seoDescription = trim($__env->yieldContent('meta_description', 'Website resmi PAUD Islam Terpadu Harapan Mulia Ngawen, Blora.'));
            $seoCanonical = url()->current();
            $seoImage = asset('images/paud/logo-official.webp');
            $seoSiteName = 'PAUD IT Harapan Mulia';
            $seoOrganization = [
                '@context' => 'https://schema.org',
                '@type' => 'EducationalOrganization',
                'name' => 'PAUD Islam Terpadu Harapan Mulia',
                'alternateName' => $seoSiteName,
                'url' => url('/'),
                'logo' => $seoImage,
                'telephone' => '+6289613624186',
                'email' => 'tkitharapanmulia063@gmail.com',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Jl. Caren RT 01 RW 04',
                    'addressLocality' => 'Ngawen',
                    'addressRegion' => 'Blora',
                    'addressCountry' => 'ID',
                ],
            ];
        @endphp
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $seoDescription }}">
        <meta name="theme-color" content="#29693E">

        <title>{{ $seoTitle }}</title>
        <link rel="canonical" href="{{ $seoCanonical }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ $seoSiteName }}">
        <meta property="og:locale" content="id_ID">
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <meta property="og:url" content="{{ $seoCanonical }}">
        <meta property="og:image" content="{{ $seoImage }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seoTitle }}">
        <meta name="twitter:description" content="{{ $seoDescription }}">
        <meta name="twitter:image" content="{{ $seoImage }}">

        <script type="application/ld+json">{!! json_encode($seoOrganization, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>

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

        <script src="{{ asset('js/back-to-top.js') }}" defer></script>
        @stack('scripts')
    </body>
</html>

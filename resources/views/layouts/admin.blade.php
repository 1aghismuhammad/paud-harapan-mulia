<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php($pageTitle = trim($__env->yieldContent('title', 'Dashboard')))
    <title>{{ $pageTitle }} | PAUD IT Harapan Mulia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f7f3] text-site-text">
    <div class="min-h-screen lg:grid lg:grid-cols-[272px_minmax(0,1fr)]">
        <x-admin.sidebar />

        <div class="min-w-0">
            <x-admin.header :title="$pageTitle" />

            <main class="px-5 py-6 sm:px-6 md:py-8 lg:px-8 xl:px-10 xl:py-10">
                @yield('content')
            </main>
        </div>
    </div>

    <x-admin.mobile-menu />

    <script>
        (() => {
            const openButton = document.querySelector('[data-admin-menu-open]');
            const closeButtons = document.querySelectorAll('[data-admin-menu-close]');
            const drawer = document.querySelector('[data-admin-mobile-menu]');
            const panel = document.querySelector('[data-admin-mobile-panel]');

            if (!openButton || !drawer || !panel) {
                return;
            }

            const openMenu = () => {
                drawer.classList.remove('pointer-events-none', 'opacity-0');
                drawer.classList.add('opacity-100');
                panel.classList.remove('-translate-x-full');
                document.body.classList.add('overflow-hidden');
                openButton.setAttribute('aria-expanded', 'true');
            };

            const closeMenu = () => {
                drawer.classList.add('pointer-events-none', 'opacity-0');
                drawer.classList.remove('opacity-100');
                panel.classList.add('-translate-x-full');
                document.body.classList.remove('overflow-hidden');
                openButton.setAttribute('aria-expanded', 'false');
            };

            openButton.addEventListener('click', openMenu);
            closeButtons.forEach((button) => button.addEventListener('click', closeMenu));

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && openButton.getAttribute('aria-expanded') === 'true') {
                    closeMenu();
                    openButton.focus();
                }
            });
        })();
    </script>
</body>
</html>

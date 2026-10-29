<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? "Pondok Pesantren Tahfizh Baitul Qur'an Camba | Membina Generasi Qur'ani" }}</title>
    <meta name="description"
        content="{{ $description ?? "Pondok Pesantren Tahfizh Baitul Qur'an Camba. Program Tahfizh Al-Qur'an 30 Juz bersanad, pendidikan formal berijazah resmi negara (Wustha & Ulya), dan asrama islami 24 jam di Camba, Maros, Sulawesi Selatan." }}">

    <!-- Tailwind CSS CDN with custom config matching the design system -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'canvas': '#FAF7F0',
                        'canvas-light': '#FCF9F2',
                        'lime': '#D4FF00',
                        'wine': '#4A0E17',
                        'biscuit': '#E53935',
                        'biscuit-dark': '#C83D2D',
                        'charcoal': '#121212',
                        'slate-muted': '#555555'
                    },
                    fontFamily: {
                        'display': ['"Bricolage Grotesque"', 'Impact', 'sans-serif'],
                        'body': ['"Plus Jakarta Sans"', 'sans-serif'],
                        'label': ['"Space Grotesk"', 'sans-serif'],
                        'cursive': ['"Caveat"', 'cursive'],
                        'mono': ['"JetBrains Mono"', 'monospace']
                    }
                }
            }
        }
    </script>

    <!-- Design System CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/design-system.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    {{ $head ?? '' }}
</head>

<body class="bg-dot-matrix text-[#121212] font-body selection:bg-lime selection:text-[#121212]">
    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />
    <x-waitlist-modal />

    <!-- Interactive Scripts -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/motion.js') }}"></script>

    {{ $scripts ?? '' }}
</body>

</html>

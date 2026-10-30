<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? "Admin Portal | Pondok Pesantren Tahfizh Baitul Qur'an Camba" }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Chart.js for Clean Executive Visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tailwind CSS with Islamic Deep Green Executive Theme (Non-Brutalism) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'forest': {
                            50: '#F2F9F6',
                            100: '#E1F2EC',
                            200: '#C3E5D9',
                            300: '#97D1BE',
                            400: '#64B79E',
                            500: '#3D9A80',
                            600: '#2D7C66',
                            700: '#256353',
                            800: '#174D3F',
                            900: '#0B3B2C',
                            950: '#05241B',
                        },
                        'canvas': '#FAF7F0',
                        'charcoal': '#1E293B',
                    },
                    fontFamily: {
                        'sans': ['"Plus Jakarta Sans"', 'sans-serif'],
                        'display': ['"Plus Jakarta Sans"', 'sans-serif'],
                        'label': ['"Space Grotesk"', 'sans-serif'],
                    },
                    boxShadow: {
                        'subtle': '0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05)',
                        'card': '0 4px 6px -1px rgba(0, 0, 0, 0.04), 0 2px 4px -2px rgba(0, 0, 0, 0.04)',
                        'card-hover': '0 10px 15px -3px rgba(0, 0, 0, 0.06), 0 4px 6px -4px rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
        }

        /* Smooth scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 9999px;
        }

        /* Prevent Tailwind space-y-* from leaking margin-top into fixed overlays (drawers, modals, backdrops) */
        .space-y-8 > .fixed,
        .space-y-8 > [class*="fixed"] {
            margin-top: 0 !important;
        }

        /* Table Action Buttons: Guarantee strictly horizontal layout */
        .table-action-btn {
            display: inline-flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: center !important;
            white-space: nowrap !important;
            flex-shrink: 0 !important;
        }
        .table-action-btn svg {
            display: inline-block !important;
            flex-shrink: 0 !important;
            vertical-align: middle;
        }
        .table-action-btn span {
            white-space: nowrap !important;
            display: inline-block !important;
        }
    </style>

    {{ $head ?? '' }}
</head>

<body class="h-full text-slate-800 antialiased selection:bg-forest-100 selection:text-forest-900">

    <div class="min-h-screen bg-slate-50">
        <!-- Backdrop mobile overlay -->
        <div id="mobile-sidebar-backdrop" 
             onclick="toggleMobileSidebar()" 
             class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs hidden transition-opacity duration-300 lg:hidden"
             aria-hidden="true"></div>

        <!-- Sidebar Navigation (Dominan Hijau Tua Islami & Berwibawa) -->
        <aside id="main-sidebar" 
               class="fixed inset-y-0 left-0 z-50 lg:z-30 w-72 bg-gradient-to-b from-[#0B3B2C] via-[#072B20] to-[#041A13] text-white flex flex-col transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 shadow-2xl lg:shadow-none border-r border-[#174D3F]/40">
            
            <!-- Sidebar Header / Brand Identity -->
            <div class="h-20 px-6 flex items-center justify-between border-b border-white/10">
                <a href="{{ route('admin.pendaftaran.index') }}" class="flex items-center gap-3.5 group">
                    <div class="w-10 h-10 rounded-xl bg-white p-1.5 shadow-md flex items-center justify-center shrink-0 transition-transform group-hover:scale-105 ring-2 ring-emerald-400/20">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Baitul Qur'an Camba" class="w-full h-full object-contain">
                    </div>
                    <div class="leading-tight">
                        <span class="block font-bold text-base tracking-tight text-white group-hover:text-amber-300 transition-colors">
                            Baitul Qur'an
                        </span>
                        <span class="block text-xs font-medium text-emerald-200/80 tracking-wider uppercase">
                            Admin Portal
                        </span>
                    </div>
                </a>

                <!-- Close mobile drawer button -->
                <button type="button" 
                        onclick="toggleMobileSidebar()" 
                        class="p-2 -mr-2 text-white/70 hover:text-white rounded-lg hover:bg-white/10 lg:hidden focus:outline-hidden"
                        aria-label="Tutup Menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Pesantren Campus Info Pill -->
            <div class="px-5 pt-4 pb-1">
                <div class="px-3.5 py-2 rounded-xl bg-white/5 border border-white/10 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-semibold text-white/90">TA 2027/2028</span>
                    </div>
                    <span class="text-[11px] font-medium px-2 py-0.5 rounded-full bg-amber-400/20 text-amber-300 border border-amber-400/30">
                        PSB Aktif
                    </span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-4 space-y-6 overflow-y-auto sidebar-scroll">
                
                <!-- Group 1: Modul Utama -->
                <div>
                    <p class="px-3 text-[11px] font-bold uppercase tracking-wider text-emerald-200/50 mb-2">
                        Menu Utama
                    </p>
                    <ul class="space-y-1">
                        <!-- Manajemen Pendaftaran -->
                        <li>
                            <a href="{{ route('admin.pendaftaran.index') }}" 
                               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.pendaftaran.*') ? 'bg-white/15 text-white shadow-xs border-l-4 border-amber-400' : 'text-white/80 hover:bg-white/8 hover:text-white' }}">
                                <svg class="w-5 h-5 {{ request()->routeIs('admin.pendaftaran.*') ? 'text-amber-300' : 'text-emerald-200/70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                <span>Pendaftaran Santri</span>
                            </a>
                        </li>

                        <!-- Data Santri Aktif -->
                        <li>
                            <a href="{{ route('admin.santri.index') }}" 
                               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.santri.*') ? 'bg-white/15 text-white shadow-xs border-l-4 border-amber-400' : 'text-white/80 hover:bg-white/8 hover:text-white' }}">
                                <svg class="w-5 h-5 {{ request()->routeIs('admin.santri.*') ? 'text-amber-300' : 'text-emerald-200/70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <span>Data Santri</span>
                            </a>
                        </li>

                        <!-- Data Guru & Asatidz -->
                        <li>
                            <a href="{{ route('admin.guru.index') }}" 
                               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.guru.*') ? 'bg-white/15 text-white shadow-xs border-l-4 border-amber-400' : 'text-white/80 hover:bg-white/8 hover:text-white' }}">
                                <svg class="w-5 h-5 {{ request()->routeIs('admin.guru.*') ? 'text-amber-300' : 'text-emerald-200/70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <span>Dewan Asatidz</span>
                            </a>
                        </li>

                        <!-- Pengelolaan Galeri -->
                        <li>
                            <a href="{{ route('admin.gallery.index') }}" 
                               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.gallery.*') ? 'bg-white/15 text-white shadow-xs border-l-4 border-amber-400' : 'text-white/80 hover:bg-white/8 hover:text-white' }}">
                                <svg class="w-5 h-5 {{ request()->routeIs('admin.gallery.*') ? 'text-amber-300' : 'text-emerald-200/70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Galeri & Foto</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Group 2: Pintasan & Pengaturan -->
                <div>
                    <p class="px-3 text-[11px] font-bold uppercase tracking-wider text-emerald-200/50 mb-2">
                        Tautan Eksternal
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('home') }}" 
                               target="_blank" 
                               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-medium text-white/80 hover:bg-white/8 hover:text-white transition-all duration-150 group">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-200/70 group-hover:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    <span>Lihat Website Utama</span>
                                </div>
                                <svg class="w-4 h-4 text-white/40 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Sidebar User Profile Footer with Logout -->
            <div class="p-4 border-t border-white/10 bg-black/15">
                <div class="flex items-center justify-between gap-3 px-2 py-1.5">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-amber-400 to-amber-200 text-forest-950 font-black flex items-center justify-center text-sm shadow-md shrink-0">
                            {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-white truncate" title="{{ auth()->user()->name ?? 'Admin Pesantren' }}">
                                {{ auth()->user()->name ?? 'Ust. Farhan R., S.Pd.' }}
                            </p>
                            <p class="text-[11px] text-emerald-200/80 truncate flex items-center gap-1.5 mt-0.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>
                                Admin Pesantren
                            </p>
                        </div>
                    </div>
                    <button type="button" 
                            onclick="openLogoutModal()" 
                            title="Keluar / Logout" 
                            class="p-2 rounded-xl text-white/60 hover:text-rose-300 hover:bg-white/10 transition-colors focus:outline-hidden cursor-pointer"
                            aria-label="Keluar / Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="lg:pl-72 flex flex-col min-h-screen">
            
            <!-- Mobile-only compact top bar for hamburger menu -->
            <div class="lg:hidden sticky top-0 z-20 flex items-center justify-between h-14 px-4 bg-white/95 backdrop-blur-md border-b border-slate-200/80">
                <button type="button" 
                        onclick="toggleMobileSidebar()" 
                        class="p-2 -ml-2 text-slate-600 hover:text-slate-900 rounded-xl hover:bg-slate-100 focus:outline-hidden"
                        aria-label="Buka Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Baitul Qur'an Camba" class="w-7 h-7 object-contain">
                    <span class="font-bold text-sm text-slate-900">Admin Baitul Qur'an</span>
                </div>
                <button type="button" 
                        onclick="openLogoutModal()" 
                        title="Keluar / Logout" 
                        class="p-2 -mr-2 text-slate-500 hover:text-rose-600 rounded-xl hover:bg-rose-50 transition-colors focus:outline-hidden cursor-pointer"
                        aria-label="Keluar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </div>

            <!-- Main Content Body -->
            <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                <div class="max-w-7xl mx-auto space-y-8">
                    @if(session('success'))
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-xs" id="flash-success-alert">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <div>
                                    <span>{{ session('success') }}</span>
                                </div>
                            </div>
                            <button type="button" onclick="document.getElementById('flash-success-alert').remove()" class="text-emerald-700 hover:text-emerald-950 p-1 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    {{ $slot }}
                </div>
            </main>

            <!-- Clean Admin Footer -->
            <footer class="bg-white border-t border-slate-200/80 px-4 sm:px-6 lg:px-8 py-4 text-center sm:flex sm:justify-between sm:items-center text-xs text-slate-500">
                <p>
                    &copy; 2026 <span class="font-semibold text-slate-700">Pondok Pesantren Tahfizh Baitul Qur'an Camba</span>. Hak cipta dilindungi.
                </p>
                <div class="mt-2 sm:mt-0 flex justify-center gap-4 text-slate-400">
                    <span class="hover:text-slate-600 transition-colors">Sistem Informasi Pesantren v1.0</span>
                    <span>&bull;</span>
                    <span class="text-emerald-600 font-medium">Sistem Normal</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Konfirmasi Logout Kustom -->
    <div id="logoutConfirmModal" 
         class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4 select-none"
         onclick="closeLogoutModalOnBackdrop(event)"
         aria-modal="true" 
         role="dialog">
        <div class="bg-white rounded-3xl max-w-sm w-full p-6 sm:p-7 shadow-2xl border border-slate-100 text-center space-y-4 animate-in fade-in zoom-in-95 duration-200"
             onclick="event.stopPropagation()">
            
            <!-- Warning / Door Icon Badge -->
            <div class="w-14 h-14 rounded-2xl bg-rose-50 border border-rose-100 text-rose-600 mx-auto flex items-center justify-center shadow-xs">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </div>

            <!-- Header Titles -->
            <div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900">
                    Konfirmasi Keluar Sistem
                </h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Apakah Anda yakin ingin mengakhiri sesi administrasi ini?
                </p>
            </div>

            <!-- Active User Info Pill -->
            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-3 text-left">
                <div class="w-9 h-9 rounded-xl bg-forest-900 text-amber-300 font-bold flex items-center justify-center text-xs shrink-0">
                    {{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-bold text-slate-900 truncate">
                        {{ auth()->user()->name ?? 'Ust. Farhan R., S.Pd.' }}
                    </p>
                    <p class="text-[11px] text-slate-500 truncate">
                        {{ auth()->user()->email ?? 'admin@baitulquran.id' }}
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-3 pt-2">
                <button type="button" 
                        onclick="closeLogoutModal()" 
                        class="w-full py-2.5 px-4 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:text-slate-800 hover:bg-slate-100 transition cursor-pointer">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" id="globalLogoutForm" class="w-full">
                    @csrf
                    <button type="submit" 
                            class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-rose-600 to-rose-700 hover:from-rose-700 hover:to-rose-800 text-white text-xs font-bold shadow-md shadow-rose-900/20 hover:shadow-lg transition flex items-center justify-center gap-1.5 cursor-pointer">
                        <span>Ya, Keluar</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <!-- Toggle Drawer & Logout Modal Scripts -->
    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('main-sidebar');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }

        function openLogoutModal() {
            const modal = document.getElementById('logoutConfirmModal');
            if (modal) {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeLogoutModal() {
            const modal = document.getElementById('logoutConfirmModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }

        function closeLogoutModalOnBackdrop(event) {
            if (event.target.id === 'logoutConfirmModal') {
                closeLogoutModal();
            }
        }

        // Close logout modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLogoutModal();
            }
        });
    </script>

    {{ $scripts ?? '' }}
</body>

</html>

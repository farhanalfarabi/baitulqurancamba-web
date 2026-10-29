<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin Portal | Pondok Pesantren Tahfizh Baitul Qur'an Camba</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans, Space Grotesk & Amiri (Arabic) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS with Islamic Deep Green Executive Theme -->
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
                        'charcoal': '#1E293B',
                    },
                    fontFamily: {
                        'sans': ['"Plus Jakarta Sans"', 'sans-serif'],
                        'arabic': ['"Amiri"', 'serif'],
                        'label': ['"Space Grotesk"', 'sans-serif'],
                    },
                    boxShadow: {
                        'glow': '0 0 25px -5px rgba(45, 124, 102, 0.4)',
                        'card': '0 20px 40px -15px rgba(11, 59, 44, 0.08)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Subtle Islamic Geometric Star Background Pattern */
        .bg-islamic-pattern {
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1.5px, transparent 1.5px),
                              radial-gradient(rgba(245, 158, 11, 0.08) 1.5px, transparent 1.5px);
            background-size: 32px 32px;
            background-position: 0 0, 16px 16px;
        }

        /* Soft pulsing glow animation */
        @keyframes subtle-pulse {
            0%, 100% { opacity: 0.15; transform: scale(1); }
            50% { opacity: 0.25; transform: scale(1.05); }
        }
        .animate-subtle-pulse {
            animation: subtle-pulse 8s infinite ease-in-out;
        }
    </style>
</head>

<body class="min-h-screen text-slate-800 antialiased selection:bg-forest-100 selection:text-forest-900 bg-slate-50 flex flex-col justify-between">

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- LEFT SHOWCASE PANEL: Brand Atmosphere, Islamic Quote & Portal Identity (Desktop) -->
        <div class="hidden lg:flex lg:w-5/12 xl:w-1/2 relative bg-gradient-to-br from-[#0B3B2C] via-[#072B20] to-[#041A13] text-white flex-col justify-between p-10 xl:p-14 overflow-hidden border-r border-[#174D3F]/50">
            
            <!-- Subtle Pesantren Atmosphere Photo Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('assets/images/pondok/halaqah-tahfidz.jpg') }}" 
                     alt="Suasana Halaqah Baitul Qur'an Camba" 
                     class="w-full h-full object-cover opacity-20 mix-blend-luminosity filter blur-xs">
                <div class="absolute inset-0 bg-gradient-to-t from-[#041A13] via-[#0B3B2C]/90 to-[#072B20]/80"></div>
                <div class="absolute inset-0 bg-islamic-pattern"></div>
            </div>

            <!-- Ambient Glow Shapes -->
            <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-emerald-500/20 blur-3xl animate-subtle-pulse pointer-events-none"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full bg-amber-400/15 blur-3xl animate-subtle-pulse pointer-events-none" style="animation-delay: 3s;"></div>

            <!-- Top Left: Brand Header -->
            <div class="relative z-10 flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-white p-2.5 shadow-xl ring-2 ring-emerald-400/30 flex items-center justify-center shrink-0">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Baitul Qur'an Camba" class="w-full h-full object-contain">
                </div>
                <div>
                    <span class="inline-block text-[11px] font-bold tracking-widest uppercase text-amber-300 font-label">
                        Sistem Informasi Manajemen
                    </span>
                    <h2 class="text-xl font-bold tracking-tight text-white">
                        Baitul Qur'an Camba
                    </h2>
                    <p class="text-xs text-emerald-200/80">
                        Pondok Pesantren Tahfizh Al-Qur'an & Sains
                    </p>
                </div>
            </div>

            <!-- Center: Quranic Verse Card & Value Highlight -->
            <div class="relative z-10 my-auto py-10 space-y-8">
                
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs text-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span class="font-semibold">Portal Administrasi & Akademik Terpadu</span>
                </div>

                <!-- Arabic Calligraphy Quote Card -->
                <div class="relative rounded-2xl bg-white/[0.07] backdrop-blur-md border border-white/15 p-6 shadow-2xl">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-white/10">
                        <span class="text-xs font-label uppercase tracking-widest text-amber-300 font-bold flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Hadits Nabawi
                        </span>
                        <span class="text-[11px] text-white/60">Shahih Bukhari</span>
                    </div>

                    <!-- Arabic Text -->
                    <p class="font-arabic text-2xl xl:text-3xl text-amber-100 text-right leading-loose tracking-wide font-normal mb-3" dir="rtl">
                        خَيْرُكُمْ مَنْ تَعَلَّمَ الْقُرْآنَ وَعَلَّمَهُ
                    </p>

                    <!-- Translation -->
                    <p class="text-xs text-emerald-100/90 leading-relaxed italic">
                        "Sebaik-baik kalian adalah orang yang belajar Al-Qur'an dan yang mengajarkannya."
                    </p>
                </div>

                <!-- Feature Highlights -->
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-xs text-white/90">
                        <div class="w-6 h-6 rounded-lg bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0 border border-emerald-500/30 font-bold">
                            ✓
                        </div>
                        <span>Pengelolaan Pendaftaran Santri Baru (PSB) Real-time</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-white/90">
                        <div class="w-6 h-6 rounded-lg bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0 border border-emerald-500/30 font-bold">
                            ✓
                        </div>
                        <span>Database Santri Mukim, Wali, dan Mutaba'ah Hafalan</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-white/90">
                        <div class="w-6 h-6 rounded-lg bg-emerald-500/20 text-emerald-300 flex items-center justify-center shrink-0 border border-emerald-500/30 font-bold">
                            ✓
                        </div>
                        <span>Manajemen Dewan Asatidz, Galeri & Konten Website</span>
                    </div>
                </div>
            </div>

            <!-- Bottom Left: Security & Copyright Notice -->
            <div class="relative z-10 pt-6 border-t border-white/10 flex items-center justify-between text-xs text-white/60">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span>Enkripsi 256-Bit SSL Terproteksi</span>
                </div>
                <span>&copy; 2026 Baitul Qur'an Camba</span>
            </div>

        </div>

        <!-- RIGHT PANEL: Login Form Container -->
        <div class="flex-1 flex flex-col justify-between p-6 sm:p-10 lg:p-12 xl:p-16 bg-slate-50 relative">
            
            <!-- Top Bar: Mobile Brand & Back to Home Link -->
            <div class="flex items-center justify-between gap-4 pb-6">
                
                <!-- Mobile Brand (Visible only on smaller screens) -->
                <div class="flex items-center gap-3 lg:hidden">
                    <div class="w-10 h-10 rounded-xl bg-white p-1.5 shadow-md border border-slate-200 flex items-center justify-center shrink-0">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Baitul Qur'an Camba" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h2 class="text-sm font-bold text-slate-900 leading-tight">Baitul Qur'an Camba</h2>
                        <span class="text-[10px] text-emerald-700 font-medium">Admin Portal</span>
                    </div>
                </div>

                <!-- Spacer on Desktop -->
                <div class="hidden lg:block"></div>

                <!-- Back to Homepage Link -->
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 bg-white hover:text-forest-800 hover:bg-forest-50 border border-slate-200 transition-all duration-150 shadow-xs group">
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-forest-600 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Kembali ke Website Utama</span>
                </a>
            </div>

            <!-- Main Login Form Area -->
            <div class="max-w-md w-full mx-auto my-auto py-6 sm:py-8">
                
                <!-- Card Container -->
                <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-card border border-slate-200/80">
                    
                    <!-- Header Badges & Titles -->
                    <div class="mb-8">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-forest-50 border border-forest-200/60 text-forest-800 text-[11px] font-bold uppercase tracking-wider mb-3">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Portal Khusus Pengelola & Asatidz
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            Masuk ke Dashboard
                        </h1>
                        <p class="text-xs sm:text-sm text-slate-500 mt-2 leading-relaxed">
                            Silakan masukkan kredensial akun Anda untuk mengakses sistem manajemen pesantren.
                        </p>
                    </div>

                    <!-- Notification Alert (Session Status / Logout message) -->
                    @if (session('status'))
                        <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs flex items-start gap-3 animate-fade-in">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <p class="font-semibold">Informasi Sistem</p>
                                <p class="mt-0.5 text-emerald-800">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Error Alert -->
                    @if (session('error') || $errors->any())
                        <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-900 text-xs flex items-start gap-3">
                            <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <div>
                                <p class="font-semibold">Perhatian</p>
                                <ul class="mt-1 list-disc list-inside space-y-0.5 text-rose-800">
                                    @if(session('error'))
                                        <li>{{ session('error') }}</li>
                                    @endif
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="{{ route('login.post') }}" method="POST" class="space-y-5" id="loginForm">
                        @csrf

                        <!-- Email / Username Input Field -->
                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                                Email / Nama Pengguna <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/>
                                    </svg>
                                </span>
                                <input type="text" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', 'admin@baitulquran.id') }}" 
                                       required 
                                       autofocus
                                       placeholder="admin@baitulquran.id" 
                                       class="w-full pl-11 pr-4 py-3 bg-slate-50 hover:bg-slate-100/70 focus:bg-white text-sm text-slate-900 rounded-xl border {{ $errors->has('email') ? 'border-rose-400 focus:ring-rose-200' : 'border-slate-200 focus:border-forest-600 focus:ring-forest-100' }} focus:ring-4 transition-all outline-hidden font-medium">
                            </div>
                            @error('email')
                                <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Input Field -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                    Kata Sandi <span class="text-rose-500">*</span>
                                </label>
                                <button type="button" 
                                        onclick="showForgotPasswordInfo()" 
                                        class="text-xs font-semibold text-forest-700 hover:text-forest-900 transition-colors">
                                    Lupa Kata Sandi?
                                </button>
                            </div>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </span>
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       value="password"
                                       required 
                                       placeholder="••••••••" 
                                       class="w-full pl-11 pr-12 py-3 bg-slate-50 hover:bg-slate-100/70 focus:bg-white text-sm text-slate-900 rounded-xl border {{ $errors->has('password') ? 'border-rose-400 focus:ring-rose-200' : 'border-slate-200 focus:border-forest-600 focus:ring-forest-100' }} focus:ring-4 transition-all outline-hidden font-medium">
                                
                                <!-- Show / Hide Password Toggle Button -->
                                <button type="button" 
                                        id="togglePasswordBtn" 
                                        onclick="togglePasswordVisibility()" 
                                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-hidden"
                                        title="Tampilkan / Sembunyikan Kata Sandi">
                                    <!-- Eye Open Icon (default) -->
                                    <svg id="eyeIconOpen" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <!-- Eye Closed Icon -->
                                    <svg id="eyeIconClosed" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center gap-2.5 cursor-pointer select-none">
                                <input type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       checked
                                       class="w-4 h-4 rounded text-forest-700 border-slate-300 focus:ring-forest-500 transition cursor-pointer">
                                <span class="text-xs font-semibold text-slate-600">Ingat saya di perangkat ini</span>
                            </label>
                        </div>

                        <!-- Primary Submit Button -->
                        <div class="pt-2">
                            <button type="submit" 
                                    class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-[#0B3B2C] via-[#174D3F] to-[#256353] hover:from-[#174D3F] hover:to-[#2D7C66] text-white font-bold text-sm shadow-lg shadow-forest-900/20 hover:shadow-xl hover:shadow-forest-900/25 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 group cursor-pointer">
                                <span>Masuk ke Dashboard</span>
                                <svg class="w-4 h-4 text-emerald-300 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- UI Mode / Demo Quick Access Box -->
                    <div class="mt-8 pt-6 border-t border-slate-100">
                        <div class="rounded-2xl bg-amber-50/80 border border-amber-200/80 p-4 text-xs text-amber-900">
                            <div class="flex items-start gap-2.5">
                                <span class="text-amber-600 font-bold text-base leading-none">💡</span>
                                <div class="flex-1">
                                    <p class="font-bold text-amber-950">Pratinjau Antarmuka (UI Mode)</p>
                                    <p class="text-amber-800/90 mt-1 leading-relaxed">
                                        Kredensial simulasi default telah disiapkan:
                                    </p>
                                    <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-mono bg-white/80 p-2 rounded-lg border border-amber-200">
                                        <span class="text-slate-600">Email: <strong class="text-slate-900">admin@baitulquran.id</strong></span>
                                        <span class="text-slate-300">|</span>
                                        <span class="text-slate-600">Sandi: <strong class="text-slate-900">password</strong></span>
                                    </div>
                                    <p class="mt-2 text-[11px] text-amber-700">
                                        Klik langsung tombol <strong>Masuk ke Dashboard</strong> di atas untuk mencoba alur login.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Bottom Assistance Info -->
            <div class="pt-6 text-center text-xs text-slate-400">
                <p>
                    Butuh bantuan akses akun? Hubungi <a href="mailto:ponpestahfizhbaitulqurancamba@gmail.com" class="text-forest-700 font-medium hover:underline">Tim IT & Administrasi Pesantren</a>
                </p>
            </div>

        </div>

    </div>

    <!-- Forgot Password Modal Alert -->
    <div id="forgotPasswordModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-sm w-full p-6 sm:p-8 shadow-2xl border border-slate-100 text-center space-y-4">
            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 mx-auto flex items-center justify-center text-xl">
                🔑
            </div>
            <h3 class="text-lg font-bold text-slate-900">
                Pemulihan Kata Sandi
            </h3>
            <p class="text-xs text-slate-600 leading-relaxed">
                Untuk menjaga privasi dan keamanan data santri, reset kata sandi dikelola langsung oleh <strong>Superadmin Pesantren</strong>.
            </p>
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-700 text-left space-y-1">
                <p><strong>Hotline WhatsApp:</strong> 0821-2488-0061</p>
                <p><strong>Email:</strong> ponpestahfizhbaitulqurancamba@gmail.com</p>
            </div>
            <button type="button" 
                    onclick="hideForgotPasswordInfo()" 
                    class="w-full py-2.5 px-4 rounded-xl bg-slate-900 text-white font-semibold text-xs hover:bg-slate-800 transition">
                Mengerti & Tutup
            </button>
        </div>
    </div>

    <!-- Interactive Scripts: Password Visibility Toggle & Modal -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeIconOpen');
            const eyeClosed = document.getElementById('eyeIconClosed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }

        function showForgotPasswordInfo() {
            const modal = document.getElementById('forgotPasswordModal');
            modal.classList.remove('hidden');
        }

        function hideForgotPasswordInfo() {
            const modal = document.getElementById('forgotPasswordModal');
            modal.classList.add('hidden');
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideForgotPasswordInfo();
            }
        });
    </script>
</body>

</html>


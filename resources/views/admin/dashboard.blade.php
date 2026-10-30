<x-layouts.admin
    title="Dashboard Utama | Portal Admin Pondok Pesantren Baitul Qur'an Camba"
    breadcrumb="Dashboard"
    pageTitle="Ringkasan & Metrik Pesantren">

    <!-- 1. Welcome Banner Card (Dominan Hijau Tua Islami & Berwibawa) -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#0B3B2C] via-[#0F4735] to-[#165B44] text-white p-6 sm:p-8 shadow-sm border border-[#174D3F]/50">
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-amber-300 text-xs font-semibold backdrop-blur-xs mb-3 border border-white/10">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Tahun Ajaran 2027/2028 · Gelombang I
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                    Assalamu'alaikum, Ust. Farhan R., S.Pd.
                </h2>
                <p class="mt-2 text-sm text-white/85 leading-relaxed">
                    Selamat datang di Portal Pengurus <strong class="text-amber-200">Pondok Pesantren Tahfizh Baitul Qur'an Camba</strong>. Pantau pendaftaran santri baru, aktivitas akademik tahfizh, dan kurasi dokumentasi beranda dalam satu kendali terpadu.
                </p>
            </div>

            <!-- Quick Action Shortcut from Banner -->
            <div class="flex flex-wrap sm:flex-nowrap items-center gap-2.5 shrink-0">
                <a href="{{ route('admin.pendaftaran.index') }}" 
                   class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-forest-950 text-xs font-bold transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Verifikasi PSB ({{ $stats['pendaftar_pending'] ?? 3 }})</span>
                </a>
                <a href="{{ route('admin.guru.index') }}" 
                   class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold transition-all border border-white/15">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span>Dewan Asatidz</span>
                </a>
                <button type="button"
                        onclick="openUploadModal()"
                        class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold transition-all border border-white/15">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Upload Foto</span>
                </button>
            </div>
        </div>

        <!-- Subtle decorative geometric background pattern -->
        <div class="absolute -right-10 -bottom-10 w-72 h-72 rounded-full bg-emerald-400/10 pointer-events-none blur-2xl"></div>
        <div class="absolute right-48 top-0 w-52 h-52 rounded-full bg-amber-400/10 pointer-events-none blur-xl"></div>
    </div>

    <!-- 2. Primary KPI Stats (4 Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- Stat Card 1: Pendaftaran Calon Santri -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle hover:shadow-card transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    Pendaftar PSB
                </span>
                <div class="w-10 h-10 rounded-xl bg-forest-50 text-forest-900 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    {{ $stats['total_pendaftar'] ?? 6 }}
                </span>
                <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/60">Gel. I Aktif</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="inline-flex items-center gap-1.5 text-amber-700 font-semibold bg-amber-50 px-2 py-0.5 rounded-md">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                    {{ $stats['pendaftar_pending'] ?? 3 }} Perlu Verifikasi
                </span>
                <a href="{{ route('admin.pendaftaran.index') }}" class="text-forest-900 hover:text-emerald-800 font-bold hover:underline">
                    Periksa &rarr;
                </a>
            </div>
        </div>

        <!-- Stat Card 2: Santri Aktif -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle hover:shadow-card transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    Santri Mukim Aktif
                </span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    {{ $stats['santri_aktif'] ?? 148 }}
                </span>
                <span class="text-xs font-medium text-slate-500">santri mukim</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">
                <span class="font-semibold text-slate-700">{{ $stats['santri_mts'] ?? ($stats['santri_wustha'] ?? 84) }} MTs · {{ $stats['santri_ma'] ?? ($stats['santri_ulya'] ?? 64) }} MA</span>
                <a href="{{ route('admin.santri.index') }}" class="text-emerald-700 hover:text-emerald-900 font-bold hover:underline">
                    Buku Induk &rarr;
                </a>
            </div>
        </div>

        <!-- Stat Card 3: Dewan Asatidz -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle hover:shadow-card transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    Dewan Asatidz
                </span>
                <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    {{ $stats['dewan_guru'] ?? 18 }}
                </span>
                <span class="text-xs font-medium text-slate-500">asatidz mukim</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">
                <span>{{ $stats['guru_tahfizh'] ?? 8 }} Bersanad · {{ $stats['guru_formal'] ?? 10 }} Diniyah</span>
                <a href="{{ route('admin.guru.index') }}" class="text-teal-700 hover:text-teal-900 font-bold hover:underline">
                    Kelola &rarr;
                </a>
            </div>
        </div>

        <!-- Stat Card 4: Galeri Dokumentasi -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle hover:shadow-card transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    Galeri & Media
                </span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    {{ $stats['total_galeri'] ?? 32 }}
                </span>
                <span class="text-xs font-medium text-slate-500">foto terkurasi</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">
                <span class="text-emerald-700 font-semibold">{{ $stats['galeri_coverflow'] ?? 6 }} Aktif di 3D Beranda</span>
                <a href="{{ route('admin.gallery.index') }}" class="text-amber-700 hover:text-amber-900 font-bold hover:underline">
                    Atur &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- 3. Visual Charts & Analytics Row (Dominan Hijau Tua Islami) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- Left: Line Trend Chart (2 Cols) -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle flex flex-col justify-between">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-3">
                <div>
                    <h3 class="text-base font-bold text-slate-900">
                        Tren Pendaftaran Santri Baru (PSB)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Statistik calon santri yang mendaftar tiap bulan pada Gelombang I (2026/2027)
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-forest-50 text-forest-900 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-forest-900"></span>
                        MTs & MA
                    </span>
                    <span class="text-xs text-slate-400">|</span>
                    <span class="text-xs font-semibold text-slate-500">6 Bulan Terakhir</span>
                </div>
            </div>

            <!-- Canvas Container -->
            <div class="relative h-64 sm:h-72 w-full pt-4">
                <canvas id="registrationTrendChart"></canvas>
            </div>

            <div class="grid grid-cols-3 gap-4 pt-4 mt-2 border-t border-slate-100 text-center">
                <div>
                    <span class="block text-xs text-slate-400 font-medium">Puncak Masuk</span>
                    <span class="text-sm font-extrabold text-forest-900">14 Calon / Okt</span>
                </div>
                <div>
                    <span class="block text-xs text-slate-400 font-medium">Rata-rata Bulanan</span>
                    <span class="text-sm font-extrabold text-slate-800">9 Calon / bln</span>
                </div>
                <div>
                    <span class="block text-xs text-slate-400 font-medium">Tingkat Verifikasi</span>
                    <span class="text-sm font-extrabold text-emerald-600">83.3% Disetujui</span>
                </div>
            </div>
        </div>

        <!-- Right: Donut Chart Jenjang & Kapasitas (1 Col) -->
        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900">
                        Komposisi Santri Aktif
                    </h3>
                    <span class="text-xs font-semibold text-slate-400">148 Santri</span>
                </div>

                <!-- Doughnut Canvas -->
                <div class="relative h-48 w-full my-4 flex items-center justify-center">
                    <canvas id="jenjangDoughnutChart"></canvas>
                </div>

                <!-- Custom Legend Pills -->
                <div class="space-y-2 mt-2">
                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <span class="w-3 h-3 rounded-full bg-[#0B3B2C]"></span>
                            <span class="text-xs font-bold text-slate-800">Tingkat MTs</span>
                        </div>
                        <span class="text-xs font-extrabold text-slate-900">84 Santri (57%)</span>
                    </div>

                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                            <span class="text-xs font-bold text-slate-800">Tingkat MA</span>
                        </div>
                        <span class="text-xs font-extrabold text-slate-900">64 Santri (43%)</span>
                    </div>
                </div>
            </div>

            <!-- Mini Footnote -->
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Rasio Pembina / Santri:</span>
                <span class="font-bold text-forest-900">1 : 8.2 (Ideal)</span>
            </div>
        </div>

    </div>

    <!-- 4. Interactive Table Section: Pendaftaran Calon Santri & Filter Tabs -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- Left (2 Cols): Recent Registrations Table with Client Filter & Search -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200/80 shadow-subtle flex flex-col">
            
            <!-- Table Header with Search & Filter -->
            <div class="p-5 sm:p-6 border-b border-slate-100 space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="text-base font-bold text-slate-900">
                            Pendaftaran Calon Santri Terkini
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">
                            Klik tombol <strong>"Periksa"</strong> untuk membuka detail berkas dan verifikasi calon santri.
                        </p>
                    </div>

                    <!-- Instant Table Filter Input -->
                    <div class="relative w-full sm:w-64">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" 
                               id="tableSearchInput"
                               onkeyup="filterTableRows()"
                               placeholder="Cari nama, asal sekolah..." 
                               class="w-full pl-9 pr-3 py-1.5 text-xs bg-slate-50 hover:bg-slate-100 focus:bg-white text-slate-800 rounded-xl border border-slate-200 focus:border-forest-500 focus:ring-1 focus:ring-forest-200 transition-all outline-hidden">
                    </div>
                </div>

                <!-- Filter Category Tabs (Client-Side Instant Switching) -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs">
                    <button type="button" 
                            onclick="filterStatus('all', this)"
                            class="status-filter-btn active px-3 py-1.5 rounded-lg font-bold transition-all bg-[#0B3B2C] text-white shadow-xs">
                        Semua ({{ count($recentRegistrations) }})
                    </button>
                    <button type="button" 
                            onclick="filterStatus('pending', this)"
                            class="status-filter-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Menunggu Verifikasi ({{ $recentRegistrations->where('status', 'pending')->count() }})
                    </button>
                    <button type="button" 
                            onclick="filterStatus('terverifikasi', this)"
                            class="status-filter-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Terverifikasi ({{ $recentRegistrations->where('status', 'terverifikasi')->count() }})
                    </button>
                    <button type="button" 
                            onclick="filterStatus('diterima', this)"
                            class="status-filter-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Diterima ({{ $recentRegistrations->where('status', 'diterima')->count() }})
                    </button>
                    <button type="button" 
                            onclick="filterStatus('berkas_belum_lengkap', this)"
                            class="status-filter-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Berkas Belum Lengkap ({{ $recentRegistrations->where('status', 'berkas_belum_lengkap')->count() }})
                    </button>
                </div>
            </div>

            <!-- Table Body -->
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left border-collapse" id="pendaftaranTable">
                    <thead>
                        <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                            <th class="py-3 px-3 text-center w-10">No.</th>
                            <th class="py-3 px-4">No. Registrasi</th>
                            <th class="py-3 px-4">Calon Santri</th>
                            <th class="py-3 px-4">Jenjang</th>
                            <th class="py-3 px-4">Kontak Wali</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs" id="tableBody">
                        @forelse($recentRegistrations as $item)
                            <tr class="table-row-item hover:bg-slate-50/60 transition-colors" 
                                data-status="{{ $item->status }}"
                                data-search="{{ strtolower($item->nama_santri . ' ' . $item->asal_sekolah . ' ' . $item->registration_number) }}">
                                
                                <!-- No. Urut -->
                                <td class="py-3.5 px-3 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-700 font-bold text-xs">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <!-- No. Registrasi -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <span class="font-mono font-semibold text-slate-900 bg-slate-100 px-2 py-0.5 rounded text-[11px]">
                                        {{ $item->registration_number }}
                                    </span>
                                    <span class="block text-[11px] text-slate-400 mt-0.5">
                                        {{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}
                                    </span>
                                </td>

                                <!-- Nama Santri & Asal -->
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-1.5">
                                        <p class="font-bold text-slate-800">
                                            {{ $item->nama_santri }}
                                        </p>
                                        @if(strtolower($item->jenis_kelamin) === 'putri')
                                            <span class="inline-flex items-center px-1.5 py-0.2 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                                Putri
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-1.5 py-0.2 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                                Putra
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-[11px] text-slate-500 truncate max-w-[190px] mt-0.5">
                                        {{ $item->asal_sekolah }}
                                    </p>
                                </td>

                                <!-- Jenjang Pilihan -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    @if(str_contains(strtolower($item->jenjang), 'mts') || str_contains(strtolower($item->jenjang), 'wustha'))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                            MTs
                                        </span>
                                    @elseif(str_contains(strtolower($item->jenjang), 'ma') || str_contains(strtolower($item->jenjang), 'ulya'))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                            MA
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-teal-50 text-teal-800 border border-teal-200">
                                            {{ $item->jenjang }}
                                        </span>
                                    @endif
                                </td>

                                <!-- Kontak Wali -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    <span class="font-medium text-slate-700 block">
                                        {{ $item->nama_ayah }}
                                    </span>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_hp_ayah) }}" 
                                       target="_blank" 
                                       class="text-[11px] text-emerald-600 hover:text-emerald-700 hover:underline flex items-center gap-1 mt-0.5 font-medium">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                        </svg>
                                        <span>{{ $item->no_hp_ayah }}</span>
                                    </a>
                                </td>

                                <!-- Status Pill -->
                                <td class="py-3.5 px-4 whitespace-nowrap status-cell">
                                    @if($item->status === 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200/80">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($item->status === 'terverifikasi')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-800 border border-blue-200/80">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                            Terverifikasi
                                        </span>
                                    @elseif($item->status === 'diterima')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200/80">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Diterima
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-800 border border-rose-200/80">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                            Berkas Belum Lengkap
                                        </span>
                                    @endif
                                </td>

                                <!-- Aksi: Buka Slide-over Drawer -->
                                <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                    <button type="button" 
                                            onclick='openStudentDrawer(@json($item))'
                                            title="Periksa Berkas & Biodata Pendaftar"
                                            class="table-action-btn inline-flex flex-row items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-forest-900 bg-forest-50 border border-forest-200/60 hover:bg-[#0B3B2C] hover:text-white hover:border-[#0B3B2C] transition-all shadow-xs whitespace-nowrap shrink-0 cursor-pointer">
                                        <svg class="w-3.5 h-3.5 shrink-0 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span class="whitespace-nowrap">Periksa</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-8 text-slate-400">
                                    Belum ada data pendaftaran yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer summary -->
            <div class="p-4 bg-slate-50/50 border-t border-slate-100 rounded-b-2xl text-xs text-slate-500 flex items-center justify-between">
                <span id="filteredRowCount">Menampilkan 6 pendaftar gelombang aktif</span>
                <a href="{{ route('admin.pendaftaran.index') }}" class="font-bold text-forest-900 hover:underline">
                    Buka Halaman Lengkap &rarr;
                </a>
            </div>
        </div>

        <!-- Right (1 Col): Status Kuota Asrama & Feed Aktivitas -->
        <div class="space-y-6">
            
            <!-- Widget: Kapasitas & Asrama -->
            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-900">
                        Kapasitas Asrama & Kuota
                    </h3>
                    <span class="text-[11px] font-semibold px-2 py-0.5 rounded-full bg-slate-100 text-slate-700">
                        Kampus Camba
                    </span>
                </div>

                <!-- Progress Bar Asrama Putra -->
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-xs font-semibold mb-1.5">
                            <span class="text-slate-700">Hunian Asrama Santri</span>
                            <span class="text-forest-900 font-bold">{{ $stats['asrama_terisi'] ?? 151 }} / {{ $stats['asrama_total'] ?? 180 }} (84%)</span>
                        </div>
                        <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#0B3B2C] via-emerald-600 to-amber-500 rounded-full transition-all duration-500" style="width: 84%"></div>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1">
                            Sisa kuota kamar: <strong class="text-slate-700">29 tempat tidur</strong>
                        </p>
                    </div>

                    <div class="pt-3 border-t border-slate-100">
                        <div class="flex justify-between text-xs font-semibold mb-1.5">
                            <span class="text-slate-700">Capaian Tahfizh Rata-rata</span>
                            <span class="text-emerald-700 font-bold">15.2 Juz</span>
                        </div>
                        <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-600 rounded-full transition-all duration-500" style="width: 51%"></div>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1">
                            Target kelulusan: <strong class="text-slate-700">30 Juz Bersanad</strong>
                        </p>
                    </div>
                </div>

                <div class="mt-5 p-3 rounded-xl bg-amber-50/80 border border-amber-200/60 flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-amber-700 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-[11px] text-amber-900 leading-snug">
                        Pendaftaran Gelombang I tersisa <strong>29 calon santri</strong> lagi sebelum seleksi berkas ditutup.
                    </p>
                </div>
            </div>

            <!-- Widget: Aktivitas Terkini Pesantren (Live Activity Feed) -->
            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900">
                        Aktivitas Terkini
                    </h3>
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                </div>

                <div class="mt-4 space-y-3.5 text-xs">
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-slate-800 font-semibold leading-snug">
                                Tasmi' 5 Juz santri <span class="text-forest-900 font-bold">Fariq Al-Mubarak</span> dinyatakan Mutqin.
                            </p>
                            <span class="text-[10px] text-slate-400">12 menit yang lalu &bull; Ust. Syahrir</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-slate-800 font-semibold leading-snug">
                                Pendaftar baru <span class="text-slate-900 font-bold">Hamzah Asadullah</span> masuk via web.
                            </p>
                            <span class="text-[10px] text-slate-400">1 jam yang lalu &bull; Jenjang MTs</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-slate-800 font-semibold leading-snug">
                                Foto galeri coverflow baru diperbarui pada Slot #2.
                            </p>
                            <span class="text-[10px] text-slate-400">4 jam yang lalu &bull; Admin Humas</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget: Pintasan Aksi Cepat (4-Card Grid) -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle">
                <div class="flex items-center justify-between mb-3.5">
                    <h3 class="text-sm font-bold text-slate-900">
                        Pintasan Cepat
                    </h3>
                    <span class="text-[10px] font-semibold text-slate-400">Akses Cepat</span>
                </div>
                <div class="grid grid-cols-2 gap-2.5">
                    <a href="{{ route('admin.pendaftaran.index') }}" 
                       class="group p-3 rounded-xl bg-slate-50/80 hover:bg-emerald-50/80 border border-slate-200/80 hover:border-emerald-200 transition-all flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100/60 group-hover:bg-emerald-200/70 text-emerald-800 flex items-center justify-center mb-1.5 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-800 group-hover:text-emerald-900">Verifikasi PSB</span>
                        <span class="text-[10px] text-slate-400">Calon Santri</span>
                    </a>

                    <a href="{{ route('admin.santri.index') }}" 
                       class="group p-3 rounded-xl bg-slate-50/80 hover:bg-forest-50 border border-slate-200/80 hover:border-forest-200 transition-all flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-lg bg-forest-100/60 group-hover:bg-forest-200/70 text-forest-900 flex items-center justify-center mb-1.5 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-800 group-hover:text-forest-900">Data Santri</span>
                        <span class="text-[10px] text-slate-400">MTs & MA</span>
                    </a>

                    <a href="{{ route('admin.guru.index') }}" 
                       class="group p-3 rounded-xl bg-slate-50/80 hover:bg-teal-50 border border-slate-200/80 hover:border-teal-200 transition-all flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-lg bg-teal-100/60 group-hover:bg-teal-200/70 text-teal-800 flex items-center justify-center mb-1.5 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-800 group-hover:text-teal-900">Dewan Asatidz</span>
                        <span class="text-[10px] text-slate-400">Asatidz & Guru</span>
                    </a>

                    <button type="button" 
                            onclick="openUploadModal()"
                            class="group p-3 rounded-xl bg-slate-50/80 hover:bg-amber-50 border border-slate-200/80 hover:border-amber-200 transition-all flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-lg bg-amber-100/60 group-hover:bg-amber-200/70 text-amber-800 flex items-center justify-center mb-1.5 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-800 group-hover:text-amber-900">Upload Foto</span>
                        <span class="text-[10px] text-slate-400">Galeri Beranda</span>
                    </button>
                </div>
            </div>

        </div>

    </div>

    <!-- 5. Bottom Section: Live Showcase Galeri Beranda -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-3">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <h3 class="text-base font-bold text-slate-900">
                        Galeri Aktif di Beranda (3D Coverflow Showcase)
                    </h3>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Dokumentasi yang saat ini tampil di carousel 3D di halaman utama website pesantren.
                </p>
            </div>
            <button type="button" 
                    onclick="openUploadModal()"
                    class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-[#0B3B2C] hover:text-white text-slate-700 text-xs font-semibold transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Unggah Foto Baru</span>
            </button>
        </div>

        <!-- 4 Grid of Gallery Showcase Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-5">
            @foreach($homepageGalleries as $gallery)
                <div class="rounded-xl border border-slate-200/80 overflow-hidden bg-slate-50/50 hover:shadow-card transition-all group flex flex-col">
                    <div class="relative h-40 overflow-hidden bg-slate-200">
                        <img src="{{ asset($gallery['image']) }}" 
                             alt="{{ $gallery['title'] }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-2.5 right-2.5">
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-emerald-600 text-white backdrop-blur-xs shadow-xs">
                                {{ $gallery['status'] }}
                            </span>
                        </div>
                        <div class="absolute bottom-2.5 left-2.5">
                            <span class="px-2 py-0.5 text-[10px] font-semibold rounded-md bg-black/60 text-white backdrop-blur-xs">
                                {{ $gallery['category'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="text-xs font-bold text-slate-800 line-clamp-1 group-hover:text-forest-900 transition-colors">
                                {{ $gallery['title'] }}
                            </h4>
                            <p class="text-[11px] text-slate-400 mt-1">
                                Diperbarui: {{ $gallery['date'] }}
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-200/60 flex items-center justify-between text-[11px]">
                            <span class="text-slate-500 font-medium">Slot #{{ $loop->iteration }}</span>
                            <button type="button" 
                                    onclick="openUploadModal('{{ $gallery['title'] }}', {{ $loop->iteration }})"
                                    class="text-forest-900 hover:text-emerald-800 font-bold hover:underline">
                                Ganti Foto
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 6. SLIDE-OVER DRAWER: Detail Calon Santri (Interactive Modal UI) -->
    <div id="studentDrawerBackdrop" 
         onclick="closeStudentDrawer()"
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs hidden transition-opacity duration-300"
         aria-hidden="true"></div>

    <div id="studentDrawer" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-y-0 right-0 z-50 w-full max-w-xl bg-white shadow-2xl flex flex-col transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header (Dominan Hijau Tua) -->
        <div class="p-6 bg-gradient-to-r from-[#0B3B2C] via-[#0E4836] to-[#145742] text-white flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-white/10 text-amber-300 font-black text-lg flex items-center justify-center border border-white/20 overflow-hidden relative shrink-0" id="drawerAvatarWrapper">
                    <img id="drawerAvatarImg" src="" alt="Pas Foto" class="w-full h-full object-cover hidden">
                    <span id="drawerAvatar">FA</span>
                </div>
                <div>
                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-amber-400 text-forest-950 mb-0.5" id="drawerRegNumber">
                        PSB-2027-001
                    </span>
                    <h3 class="text-lg font-bold leading-tight" id="drawerStudentName">
                        Muhammad Fatih Azzam
                    </h3>
                </div>
            </div>
            <button type="button" 
                    onclick="closeStudentDrawer()" 
                    class="p-2 text-white/70 hover:text-white rounded-xl hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Drawer Content Body (Scrollable) -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6 text-xs text-slate-700">
            
            <!-- Status & Action Card -->
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                <div>
                    <span class="block text-[11px] text-slate-400 font-semibold uppercase">Status Saat Ini</span>
                    <div id="drawerStatusBadge" class="mt-1">
                        <!-- Injected via JS -->
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" 
                            id="btnVerifyAction"
                            onclick="updateStudentStatus('terverifikasi')"
                            class="px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Verifikasi</span>
                    </button>
                    <button type="button" 
                            id="btnAcceptAction"
                            onclick="updateStudentStatus('diterima')"
                            class="px-3 py-1.5 rounded-xl bg-[#0B3B2C] hover:bg-[#0E4836] text-white font-bold transition-all shadow-xs cursor-pointer">
                        Terima
                    </button>
                </div>
            </div>

            <!-- Timeline Tahapan Seleksi -->
            <div>
                <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] mb-3">
                    Alur Seleksi Masuk
                </h4>
                <div class="grid grid-cols-4 gap-2 text-center">
                    <div class="p-2.5 rounded-xl bg-emerald-50 border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block mb-1"></span>
                        <p class="font-bold text-emerald-800 text-[11px]">1. Daftar</p>
                        <span class="text-[9px] text-emerald-600">Selesai</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-amber-50 border border-amber-200" id="stepVerifyBox">
                        <span class="w-2 h-2 rounded-full bg-amber-500 inline-block mb-1"></span>
                        <p class="font-bold text-amber-800 text-[11px]">2. Berkas</p>
                        <span class="text-[9px] text-amber-600" id="stepVerifyText">Sedang Ditinjau</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="w-2 h-2 rounded-full bg-slate-300 inline-block mb-1"></span>
                        <p class="font-bold text-slate-600 text-[11px]">3. Tes Hafalan</p>
                        <span class="text-[9px] text-slate-400">Jadwal 15 Nov</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                        <span class="w-2 h-2 rounded-full bg-slate-300 inline-block mb-1"></span>
                        <p class="font-bold text-slate-600 text-[11px]">4. Pengumuman</p>
                        <span class="text-[9px] text-slate-400">Desember</span>
                    </div>
                </div>
            </div>

            <!-- Tab 1: Biodata Calon Santri -->
            <div class="space-y-3">
                <div class="flex items-center justify-between pb-1 border-b border-slate-100">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px]">
                        Biodata Calon Santri
                    </h4>
                    <span class="px-2.5 py-0.5 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800 text-[11px] font-bold" id="drawerAgeDisplayBadge">-</span>
                </div>
                <div class="bg-slate-50/60 p-4 rounded-xl border border-slate-100 space-y-3">
                    <div class="grid grid-cols-2 gap-3 pb-3 border-b border-slate-100">
                        <div>
                            <span class="text-slate-400 block text-[11px]">Jenjang Pilihan</span>
                            <strong class="text-slate-900 text-xs font-bold" id="drawerJenjang">-</strong>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[11px]">Tinggal Bersama</span>
                            <strong class="text-slate-900 text-xs" id="drawerLivingWith">-</strong>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pb-3 border-b border-slate-100">
                        <div>
                            <span class="text-slate-400 block text-[11px]">Tempat, Tgl Lahir</span>
                            <strong class="text-slate-900 text-xs" id="drawerBirth">-</strong>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[11px]">Usia / Umur</span>
                            <strong class="text-emerald-700 font-bold text-xs" id="drawerAgeText">-</strong>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[11px]">Nomor HP Santri</span>
                            <strong class="text-slate-900 text-xs font-mono" id="drawerStudentPhone">-</strong>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pb-3 border-b border-slate-100">
                        <div>
                            <span class="text-slate-400 block text-[11px]">Email Calon Santri</span>
                            <strong class="text-slate-900 text-xs font-mono" id="drawerEmail">-</strong>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[11px]">Asal Sekolah</span>
                            <strong class="text-slate-900 text-xs" id="drawerSchool">-</strong>
                        </div>
                    </div>

                    <div>
                        <span class="text-slate-400 block text-[11px]">Alamat Lengkap Domisili Sesuai KK</span>
                        <p class="text-slate-800 text-xs leading-relaxed mt-0.5" id="drawerAddress">-</p>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Orang Tua / Wali -->
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                    Data Orang Tua & Kontak
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <!-- Kartu Ayah -->
                    <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/80 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase text-emerald-800 tracking-wider">Ayah Kandung</span>
                            <strong class="text-slate-900 block text-xs mt-1" id="drawerFatherName">-</strong>
                            <p class="text-[11px] text-slate-500 mt-0.5">Pekerjaan: <span id="drawerFatherJob">-</span></p>
                            <p class="text-[11px] text-slate-500">Penghasilan: <span id="drawerFatherIncome" class="font-medium text-slate-700">-</span></p>
                            <p class="text-[11px] text-slate-500 mt-1 flex items-center justify-between pt-1 border-t border-slate-100">
                                <span>No. HP/WA:</span>
                                <strong class="font-semibold text-slate-900 font-mono text-[11px]" id="drawerFatherPhone">-</strong>
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-200/60">
                            <a id="drawerWaLink" href="#" target="_blank" class="w-full py-1.5 px-3 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold flex items-center justify-center gap-1.5 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                </svg>
                                <span>Hubungi WA Ayah</span>
                            </a>
                        </div>
                    </div>

                    <!-- Kartu Ibu -->
                    <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/80 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase text-teal-800 tracking-wider">Ibu Kandung</span>
                            <strong class="text-slate-900 block text-xs mt-1" id="drawerMotherName">-</strong>
                            <p class="text-[11px] text-slate-500 mt-0.5">Pekerjaan: <span id="drawerMotherJob">-</span></p>
                            <p class="text-[11px] text-slate-500">Penghasilan: <span id="drawerMotherIncome" class="font-medium text-slate-700">-</span></p>
                            <p class="text-[11px] text-slate-500 mt-1 flex items-center justify-between pt-1 border-t border-slate-100">
                                <span>No. HP/WA:</span>
                                <strong class="font-semibold text-slate-900 font-mono text-[11px]" id="drawerMotherPhone">-</strong>
                            </p>
                        </div>
                        <div class="mt-3 pt-2 border-t border-slate-200/60">
                            <a id="drawerMotherWaLink" href="#" target="_blank" class="w-full py-1.5 px-3 rounded-lg bg-teal-600 hover:bg-teal-700 text-white font-bold flex items-center justify-center gap-1.5 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                </svg>
                                <span>Hubungi WA Ibu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Kelengkapan Dokumen Berkas -->
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                    Berkas Pendaftaran Terunggah
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                    <!-- Pas Foto -->
                    <div class="p-3 rounded-xl border border-slate-200/80 bg-white flex items-center justify-between">
                        <div class="flex items-center gap-2 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="truncate">
                                <strong class="block text-slate-800 text-xs truncate">Pas Foto</strong>
                                <span class="text-[10px] text-emerald-600 font-semibold" id="drawerFotoStatus">Tersedia</span>
                            </div>
                        </div>
                        <a id="drawerFotoLink" href="#" target="_blank" class="text-forest-900 font-bold hover:underline shrink-0 text-xs ml-2">Lihat</a>
                    </div>

                    <!-- Kartu Keluarga -->
                    <div class="p-3 rounded-xl border border-slate-200/80 bg-white flex items-center justify-between">
                        <div class="flex items-center gap-2 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="truncate">
                                <strong class="block text-slate-800 text-xs truncate">Kartu Keluarga</strong>
                                <span class="text-[10px] text-emerald-600 font-semibold" id="drawerKkStatus">Tersedia</span>
                            </div>
                        </div>
                        <a id="drawerKkLink" href="#" target="_blank" class="text-forest-900 font-bold hover:underline shrink-0 text-xs ml-2">Lihat</a>
                    </div>

                    <!-- Buku Rapor -->
                    <div class="p-3 rounded-xl border border-slate-200/80 bg-white flex items-center justify-between">
                        <div class="flex items-center gap-2 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="truncate">
                                <strong class="block text-slate-800 text-xs truncate">Buku Rapor</strong>
                                <span class="text-[10px] text-emerald-600 font-semibold" id="drawerRaportStatus">Tersedia</span>
                            </div>
                        </div>
                        <a id="drawerRaportLink" href="#" target="_blank" class="text-forest-900 font-bold hover:underline shrink-0 text-xs ml-2">Lihat</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Drawer Footer -->
        <div class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
            <button type="button" 
                    onclick="closeStudentDrawer()"
                    class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                Tutup Panel
            </button>
            <button type="button" 
                    onclick="alert('Mencetak Lembar Verifikasi Calon Santri')"
                    class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C] transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                <span>Cetak Lembar Biodata</span>
            </button>
        </div>
    </div>

    <!-- 7. MODAL: Unggah Foto Galeri (Interactive Dropzone) -->
    <div id="uploadGalleryModal" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900" id="modalUploadTitle">Unggah Dokumentasi Galeri</h3>
                </div>
                <button type="button" onclick="closeUploadModal()" class="p-1.5 text-slate-400 hover:text-slate-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="py-5 space-y-4">
                <!-- Dropzone Area -->
                <div class="border-2 border-dashed border-slate-300 rounded-xl p-7 text-center hover:border-forest-500 hover:bg-forest-50/20 transition-all cursor-pointer bg-slate-50/50" onclick="document.getElementById('galleryFileInput').click()">
                    <input type="file" id="galleryFileInput" class="hidden" accept="image/*" onchange="previewUploadImage(event)">
                    <div id="dropzonePlaceholder">
                        <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="mt-2 text-xs font-bold text-slate-700">Tarik foto ke sini atau <span class="text-forest-900 underline">telusuri file</span></p>
                        <p class="mt-1 text-[11px] text-slate-400">JPG, PNG, atau WEBP hingga 5 MB</p>
                    </div>
                    <div id="dropzonePreview" class="hidden">
                        <img id="previewImg" src="" alt="Preview" class="h-32 mx-auto object-cover rounded-lg shadow-xs">
                        <p class="text-xs font-semibold text-emerald-600 mt-2">Foto siap diunggah</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Dokumentasi Kegiatan</label>
                        <input type="text" id="uploadPhotoTitle" placeholder="Contoh: Halaqah Tahfizh Fajar Santri MTs" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 focus:ring-1 focus:ring-forest-200">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori</label>
                            <select class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                                <option>Tahfizh 30 Juz</option>
                                <option>Kepemimpinan & Bahasa</option>
                                <option>Dirasah Islamiyah</option>
                                <option>Karakter & Disiplin</option>
                                <option>Fasilitas Kampus</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Target Penempatan</label>
                            <select id="uploadSlotTarget" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                                <option value="1">Slot #1 Beranda</option>
                                <option value="2">Slot #2 Beranda</option>
                                <option value="3">Slot #3 Beranda</option>
                                <option value="4">Slot #4 Beranda</option>
                                <option value="5">Slot #5 Beranda</option>
                                <option value="6">Slot #6 Beranda</option>
                                <option value="archive">Arsip Galeri Lengkap</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeUploadModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                <button type="button" onclick="saveUploadSuccess()" class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C] shadow-xs">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification In-Page (Dominan Hijau Tua) -->
    <div id="toastNotification" class="fixed bottom-6 right-6 z-50 bg-[#0B3B2C] text-white px-4 py-3 rounded-2xl shadow-2xl border border-emerald-500/30 flex items-center gap-3 transition-all duration-300 transform translate-y-24 opacity-0 pointer-events-none">
        <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <p class="text-xs font-semibold" id="toastMessage">Status berhasil diperbarui!</p>
    </div>

    <x-slot:scripts>
        <script>
            // ==========================================
            // 1. Chart.js Initializations (Hijau Tua Islami)
            // ==========================================
            document.addEventListener('DOMContentLoaded', function () {
                // Registration Line Trend Chart
                const trendCtx = document.getElementById('registrationTrendChart').getContext('2d');
                
                // Gradient Fill (Deep Forest Green to Soft Transparent)
                const greenGradient = trendCtx.createLinearGradient(0, 0, 0, 300);
                greenGradient.addColorStop(0, 'rgba(11, 59, 44, 0.35)');
                greenGradient.addColorStop(1, 'rgba(11, 59, 44, 0.00)');

                new Chart(trendCtx, {
                    type: 'line',
                    data: {
                        labels: ['Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober (Aktif)'],
                        datasets: [{
                            label: 'Pendaftar Santri Baru',
                            data: [4, 7, 11, 8, 12, 14],
                            borderColor: '#0B3B2C',
                            backgroundColor: greenGradient,
                            borderWidth: 3,
                            fill: true,
                            tension: 0.38,
                            pointBackgroundColor: '#FFFFFF',
                            pointBorderColor: '#0B3B2C',
                            pointBorderWidth: 2.5,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#07261C',
                                titleFont: { family: 'Plus Jakarta Sans', size: 12, weight: 'bold' },
                                bodyFont: { family: 'Plus Jakarta Sans', size: 12 },
                                padding: 10,
                                cornerRadius: 8,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return context.parsed.y + ' Calon Santri Mendaftar';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 20,
                                grid: { color: 'rgba(226, 232, 240, 0.6)' },
                                ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#94A3B8', stepSize: 5 }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#64748B' }
                            }
                        }
                    }
                });

                // Jenjang Donut Chart (Hijau Tua & Emas)
                const doughnutCtx = document.getElementById('jenjangDoughnutChart').getContext('2d');
                new Chart(doughnutCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['MTs (SMP)', 'MA (SMA)'],
                        datasets: [{
                            data: [84, 64],
                            backgroundColor: ['#0B3B2C', '#F59E0B'],
                            borderWidth: 3,
                            borderColor: '#FFFFFF',
                            hoverOffset: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '72%',
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#07261C',
                                titleFont: { family: 'Plus Jakarta Sans', size: 12 },
                                bodyFont: { family: 'Plus Jakarta Sans', size: 12 },
                                padding: 10,
                                cornerRadius: 8,
                                callbacks: {
                                    label: function(ctx) {
                                        return ' ' + ctx.label + ': ' + ctx.parsed + ' Santri';
                                    }
                                }
                            }
                        }
                    }
                });
            });

            // ==========================================
            // 2. Interactive Table Filtering & Search
            // ==========================================
            let currentFilter = 'all';

            function filterStatus(status, btnElement) {
                currentFilter = status;

                // Update active tab styling
                document.querySelectorAll('.status-filter-btn').forEach(btn => {
                    btn.classList.remove('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                    btn.classList.add('text-slate-600', 'font-semibold');
                });
                btnElement.classList.add('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                btnElement.classList.remove('text-slate-600');

                applyFilters();
            }

            function filterTableRows() {
                applyFilters();
            }

            function applyFilters() {
                const searchVal = document.getElementById('tableSearchInput').value.toLowerCase().trim();
                const rows = document.querySelectorAll('.table-row-item');
                let visibleCount = 0;

                rows.forEach(row => {
                    const status = row.getAttribute('data-status');
                    const searchData = row.getAttribute('data-search') || '';

                    const matchesStatus = (currentFilter === 'all' || status === currentFilter);
                    const matchesSearch = (!searchVal || searchData.includes(searchVal));

                    if (matchesStatus && matchesSearch) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                document.getElementById('filteredRowCount').innerText = 'Menampilkan ' + visibleCount + ' pendaftar';
            }

            // ==========================================
            // 3. Slide-Over Drawer: Student Detail
            // ==========================================
            let activeStudent = null;

            function resolveFileUrl(path) {
                if (!path || path === 'missing') return '';
                if (path.startsWith('http://') || path.startsWith('https://') || path.startsWith('/') || path.startsWith('data:')) {
                    return path;
                }
                return '/storage/' + path;
            }

            function openStudentDrawer(student) {
                activeStudent = student;
                
                // Set Data Fields
                document.getElementById('drawerRegNumber').innerText = student.registration_number || 'PSB-2027';
                document.getElementById('drawerStudentName').innerText = student.nama_santri;
                
                // Initials Fallback
                const names = (student.nama_santri || '').trim().split(/\s+/);
                const initials = names.length > 1 ? (names[0][0] + names[1][0]).toUpperCase() : (student.nama_santri ? student.nama_santri.substring(0, 2).toUpperCase() : 'PS');
                
                // Pas Foto di Header
                const fotoUrl = resolveFileUrl(student.pas_foto_path);
                const avatarImg = document.getElementById('drawerAvatarImg');
                const avatarText = document.getElementById('drawerAvatar');
                if (fotoUrl) {
                    avatarImg.src = fotoUrl;
                    avatarImg.classList.remove('hidden');
                    avatarText.classList.add('hidden');
                } else {
                    avatarImg.classList.add('hidden');
                    avatarText.classList.remove('hidden');
                    avatarText.innerText = initials;
                }

                document.getElementById('drawerJenjang').innerText = student.jenjang || '-';
                document.getElementById('drawerGender').innerText = student.jenis_kelamin || '-';
                document.getElementById('drawerLivingWith').innerText = student.tinggal_bersama || 'Orang Tua';

                // Birth & Age Display (Otomatis dari field umur atau tanggal lahir)
                let ageText = '-';
                let birthFormatted = '-';
                if (student.tanggal_lahir) {
                    const parts = student.tanggal_lahir.split('T')[0].split('-');
                    if (parts.length === 3) {
                        const birthYear = parseInt(parts[0], 10);
                        const birthMonth = parseInt(parts[1], 10) - 1;
                        const birthDay = parseInt(parts[2], 10);
                        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        birthFormatted = (student.tempat_lahir || '-') + ', ' + birthDay + ' ' + (months[birthMonth] || parts[1]) + ' ' + birthYear;
                    } else {
                        birthFormatted = (student.tempat_lahir || '-') + ', ' + student.tanggal_lahir;
                    }
                } else if (student.tempat_lahir) {
                    birthFormatted = student.tempat_lahir;
                }

                if (student.umur !== undefined && student.umur !== null && student.umur !== '') {
                    ageText = student.umur + ' Tahun';
                } else if (student.tanggal_lahir) {
                    const parts = student.tanggal_lahir.split('T')[0].split('-');
                    if (parts.length === 3) {
                        const birthYear = parseInt(parts[0], 10);
                        ageText = (new Date().getFullYear() - birthYear) + ' Tahun';
                    }
                }

                document.getElementById('drawerBirth').innerText = birthFormatted;
                document.getElementById('drawerAgeText').innerText = ageText;
                document.getElementById('drawerAgeDisplayBadge').innerText = ageText !== '-' ? ageText : 'Belum Ditentukan';
                document.getElementById('drawerStudentPhone').innerText = student.no_hp_santri || '-';
                document.getElementById('drawerEmail').innerText = student.email || '-';
                document.getElementById('drawerSchool').innerText = student.asal_sekolah || '-';
                document.getElementById('drawerAddress').innerText = student.alamat_lengkap || '-';

                // Parents
                document.getElementById('drawerFatherName').innerText = student.nama_ayah || '-';
                document.getElementById('drawerFatherJob').innerText = student.pekerjaan_ayah || '-';
                document.getElementById('drawerFatherIncome').innerText = student.penghasilan_ayah || '-';
                document.getElementById('drawerFatherPhone').innerText = student.no_hp_ayah || '-';

                document.getElementById('drawerMotherName').innerText = student.nama_ibu || '-';
                document.getElementById('drawerMotherJob').innerText = student.pekerjaan_ibu || '-';
                document.getElementById('drawerMotherIncome').innerText = student.penghasilan_ibu || '-';
                document.getElementById('drawerMotherPhone').innerText = student.no_hp_ibu || '-';
                
                const fatherPhone = student.no_hp_ayah ? student.no_hp_ayah.replace(/[^0-9]/g, '') : '628114422331';
                const motherPhone = student.no_hp_ibu ? student.no_hp_ibu.replace(/[^0-9]/g, '') : '';
                
                document.getElementById('drawerWaLink').href = 'https://wa.me/' + fatherPhone;
                if (motherPhone) {
                    document.getElementById('drawerMotherWaLink').href = 'https://wa.me/' + motherPhone;
                    document.getElementById('drawerMotherWaLink').classList.remove('hidden');
                } else {
                    document.getElementById('drawerMotherWaLink').classList.add('hidden');
                }

                // Berkas Dokumen Links (Pas Foto, KK, Raport)
                const fotoLink = document.getElementById('drawerFotoLink');
                const fotoStatus = document.getElementById('drawerFotoStatus');
                if (fotoUrl) {
                    fotoLink.href = fotoUrl;
                    fotoLink.classList.remove('pointer-events-none', 'opacity-40');
                    fotoStatus.innerText = 'Tersedia';
                    fotoStatus.className = 'text-[10px] text-emerald-600 font-semibold';
                } else {
                    fotoLink.href = '#';
                    fotoLink.classList.add('pointer-events-none', 'opacity-40');
                    fotoStatus.innerText = 'Belum Ada';
                    fotoStatus.className = 'text-[10px] text-slate-400 font-medium';
                }

                const kkUrl = resolveFileUrl(student.foto_kk_path);
                const kkLink = document.getElementById('drawerKkLink');
                const kkStatus = document.getElementById('drawerKkStatus');
                if (kkUrl) {
                    kkLink.href = kkUrl;
                    kkLink.classList.remove('pointer-events-none', 'opacity-40');
                    kkStatus.innerText = 'Tersedia';
                    kkStatus.className = 'text-[10px] text-emerald-600 font-semibold';
                } else {
                    kkLink.href = '#';
                    kkLink.classList.add('pointer-events-none', 'opacity-40');
                    kkStatus.innerText = 'Belum Ada';
                    kkStatus.className = 'text-[10px] text-slate-400 font-medium';
                }

                const raportUrl = resolveFileUrl(student.foto_raport_path);
                const raportLink = document.getElementById('drawerRaportLink');
                const raportStatus = document.getElementById('drawerRaportStatus');
                if (raportUrl) {
                    raportLink.href = raportUrl;
                    raportLink.classList.remove('pointer-events-none', 'opacity-40');
                    raportStatus.innerText = 'Tersedia';
                    raportStatus.className = 'text-[10px] text-emerald-600 font-semibold';
                } else {
                    raportLink.href = '#';
                    raportLink.classList.add('pointer-events-none', 'opacity-40');
                    raportStatus.innerText = 'Belum Ada';
                    raportStatus.className = 'text-[10px] text-slate-400 font-medium';
                }

                renderDrawerStatus(student.status);

                // Show Drawer
                const backdrop = document.getElementById('studentDrawerBackdrop');
                const drawer = document.getElementById('studentDrawer');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    drawer.classList.remove('translate-x-full');
                }, 10);
            }

            function closeStudentDrawer() {
                const backdrop = document.getElementById('studentDrawerBackdrop');
                const drawer = document.getElementById('studentDrawer');
                drawer.classList.add('translate-x-full');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }

            function renderDrawerStatus(status) {
                const container = document.getElementById('drawerStatusBadge');
                const verifyStepText = document.getElementById('stepVerifyText');
                const verifyStepBox = document.getElementById('stepVerifyBox');

                if (status === 'pending') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200"><span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>Menunggu Verifikasi</span>';
                    verifyStepText.innerText = 'Menunggu Verifikasi';
                    verifyStepBox.className = 'p-2.5 rounded-xl bg-amber-50 border border-amber-200';
                } else if (status === 'terverifikasi') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200"><span class="w-2 h-2 rounded-full bg-blue-500"></span>Terverifikasi</span>';
                    verifyStepText.innerText = 'Terverifikasi';
                    verifyStepBox.className = 'p-2.5 rounded-xl bg-blue-50 border border-blue-200';
                } else if (status === 'diterima') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>Diterima</span>';
                    verifyStepText.innerText = 'Lulus Seleksi';
                    verifyStepBox.className = 'p-2.5 rounded-xl bg-emerald-50 border border-emerald-200';
                } else {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200"><span class="w-2 h-2 rounded-full bg-rose-500"></span>Berkas Belum Lengkap</span>';
                    verifyStepText.innerText = 'Belum Lengkap';
                    verifyStepBox.className = 'p-2.5 rounded-xl bg-rose-50 border border-rose-200';
                }

                // Update Quick Status Buttons (Disable active status button)
                const btnVerify = document.getElementById('btnVerifyAction');
                const btnAccept = document.getElementById('btnAcceptAction');

                if (btnVerify) {
                    if (status === 'terverifikasi') {
                        btnVerify.disabled = true;
                        btnVerify.className = 'px-3 py-1.5 rounded-xl bg-slate-200 text-slate-400 font-semibold cursor-not-allowed flex items-center gap-1.5 border border-slate-300/80 shadow-none pointer-events-none';
                        btnVerify.title = 'Data santri ini sudah terverifikasi';
                    } else {
                        btnVerify.disabled = false;
                        btnVerify.className = 'px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-all shadow-xs flex items-center gap-1.5 cursor-pointer';
                        btnVerify.title = 'Tandai terverifikasi';
                    }
                }

                if (btnAccept) {
                    if (status === 'diterima') {
                        btnAccept.disabled = true;
                        btnAccept.className = 'px-3 py-1.5 rounded-xl bg-slate-200 text-slate-400 font-semibold cursor-not-allowed border border-slate-300/80 shadow-none pointer-events-none';
                        btnAccept.title = 'Santri ini sudah diterima';
                    } else {
                        btnAccept.disabled = false;
                        btnAccept.className = 'px-3 py-1.5 rounded-xl bg-[#0B3B2C] hover:bg-[#0E4836] text-white font-bold transition-all shadow-xs cursor-pointer';
                        btnAccept.title = 'Terima santri ini';
                    }
                }
            }

            function updateStudentStatus(newStatus) {
                if (!activeStudent || activeStudent.status === newStatus) return;
                activeStudent.status = newStatus;
                renderDrawerStatus(newStatus);

                // Update Table Row status visual
                const rows = document.querySelectorAll('.table-row-item');
                rows.forEach(r => {
                    if (r.getAttribute('data-search').includes(activeStudent.registration_number.toLowerCase())) {
                        r.setAttribute('data-status', newStatus);
                        const cell = r.querySelector('.status-cell');
                        if (newStatus === 'terverifikasi') {
                            cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-800 border border-blue-200/80"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Terverifikasi</span>';
                        } else if (newStatus === 'diterima') {
                            cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200/80"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Diterima</span>';
                        }
                    }
                });

                showToast('Status ' + activeStudent.nama_santri + ' diubah menjadi: ' + newStatus.toUpperCase());
            }

            // ==========================================
            // 4. Modal Upload Foto Galeri
            // ==========================================
            function openUploadModal(currentTitle = '', slot = null) {
                document.getElementById('uploadGalleryModal').classList.remove('hidden');
                if (currentTitle) {
                    document.getElementById('uploadPhotoTitle').value = currentTitle;
                    document.getElementById('modalUploadTitle').innerText = 'Ganti Foto Slot #' + slot;
                } else {
                    document.getElementById('uploadPhotoTitle').value = '';
                    document.getElementById('modalUploadTitle').innerText = 'Unggah Dokumentasi Galeri';
                }
                if (slot) {
                    document.getElementById('uploadSlotTarget').value = slot;
                }
            }

            function closeUploadModal() {
                document.getElementById('uploadGalleryModal').classList.add('hidden');
                document.getElementById('dropzonePreview').classList.add('hidden');
                document.getElementById('dropzonePlaceholder').classList.remove('hidden');
            }

            function previewUploadImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('previewImg').src = e.target.result;
                        document.getElementById('dropzonePlaceholder').classList.add('hidden');
                        document.getElementById('dropzonePreview').classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            }

            function saveUploadSuccess() {
                closeUploadModal();
                showToast('Foto galeri berhasil diperbarui & disinkronkan!');
            }

            // ==========================================
            // 5. Toast Notification
            // ==========================================
            function showToast(message) {
                const toast = document.getElementById('toastNotification');
                document.getElementById('toastMessage').innerText = message;
                toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                }, 3500);
            }
        </script>
    </x-slot:scripts>

</x-layouts.admin>

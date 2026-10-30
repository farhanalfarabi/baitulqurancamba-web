<x-layouts.admin
    title="Dewan Asatidz & Pengajar | Admin Baitul Qur'an Camba"
    breadcrumb="Dewan Asatidz"
    pageTitle="Database Dewan Asatidz & Tenaga Pendidik">

    <!-- 1. Top KPI Summary Cards (Clean & Dominan Hijau Tua Islami) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <!-- Total Asatidz & Pendidik -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Dewan Guru</span>
                <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block" id="kpiTotalGuru">{{ $stats['total_guru'] ?? $asatidz->count() }}</span>
                <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">
                    {{ $stats['guru_ikhwan'] ?? 0 }} Ustadz • {{ $stats['guru_akhwat'] ?? 0 }} Ustadzah
                </span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-forest-50 text-forest-900 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Pembina Tahfizh Bersanad -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Pembina Tahfizh</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1 block">{{ $stats['guru_tahfizh'] ?? 0 }}</span>
                <span class="text-[11px] text-emerald-600 font-semibold mt-0.5 block">Hafizh 30 Juz Bersanad</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
        </div>

        <!-- Tenaga Pendidik Formal -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Guru Formal & Sains</span>
                <span class="text-2xl sm:text-3xl font-black text-teal-800 mt-1 block">{{ $stats['guru_formal'] ?? 0 }}</span>
                <span class="text-[11px] text-teal-700 font-semibold mt-0.5 block">Wustha (SMP) & Ulya (SMA)</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
        </div>

        <!-- Asatidz Mukim (Asrama) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Asatidz Mukim</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600 mt-1 block">{{ $stats['asatidz_mukim'] ?? 0 }}</span>
                <span class="text-[11px] text-amber-700 font-semibold mt-0.5 block">Mendampingi Asrama 24 Jam</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
        </div>

    </div>

    <!-- 2. Clean Action, Filter & Search Toolbar -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle space-y-4">
        
        <!-- Header Row -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h2 class="text-base font-bold text-slate-900">
                        Dewan Asatidz, Mursyid Tahfizh & Tenaga Pengajar
                    </h2>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Database tenaga pendidik pesantren, bidang keilmuan, sanad hafalan, jadwal halaqah, dan tanggung jawab asrama.
                </p>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center gap-2.5">
                <button type="button" 
                        onclick="exportGuruCsv()"
                        class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 transition-all">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Ekspor Excel</span>
                </button>
                <button type="button" 
                        onclick="openAddGuruModal()"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Tambah Data Asatidz</span>
                </button>
            </div>
        </div>

        <!-- Filter & Search Controls Row -->
        <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            
            <div class="flex flex-wrap items-center gap-2">
                <!-- Gender Filter Pills -->
                <div class="inline-flex items-center p-1 bg-slate-100 rounded-xl text-xs">
                    <button type="button" 
                            onclick="filterGuruGender('all', this)"
                            class="guru-gender-btn px-3 py-1 rounded-lg font-bold transition-all bg-white text-slate-900 shadow-xs">
                        Semua
                    </button>
                    <button type="button" 
                            onclick="filterGuruGender('ustadz', this)"
                            class="guru-gender-btn px-3 py-1 rounded-lg font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Ustadz
                    </button>
                    <button type="button" 
                            onclick="filterGuruGender('ustadzah', this)"
                            class="guru-gender-btn px-3 py-1 rounded-lg font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Ustadzah
                    </button>
                </div>

                <!-- Status Kepegawaian Filter -->
                <select id="statusGuruSelect" onchange="applyGuruFilter()" class="px-3 py-1.5 text-xs rounded-xl border border-slate-200 bg-white text-slate-700 outline-hidden focus:border-forest-500 font-medium">
                    <option value="all">Semua Status</option>
                    <option value="mukim">Mukim (Tetap)</option>
                    <option value="tetap">Guru Tetap</option>
                    <option value="pengajar">Guru Pengajar</option>
                    <option value="tamu">Asatidz Tamu</option>
                </select>
            </div>

            <!-- Instant Search Box -->
            <div class="relative w-full sm:w-72">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" 
                       id="guruSearchInput" 
                       onkeyup="applyGuruFilter()" 
                       placeholder="Cari asatidz, tanggung jawab, bidang..." 
                       class="w-full pl-9 pr-3.5 py-1.5 text-xs bg-slate-50 hover:bg-slate-100 focus:bg-white text-slate-800 rounded-xl border border-slate-200 focus:border-forest-500 focus:ring-1 focus:ring-forest-200 transition-all outline-hidden">
            </div>

        </div>

    </div>

    <!-- 3. TABEL DATABASE DEWAN ASATIDZ (TABLE VIEW UTAMA) -->
    <div id="guruTableView" class="bg-white rounded-2xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="guruMainTable">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 text-center w-12">No.</th>
                        <th class="py-3.5 px-5 whitespace-nowrap">Nama Asatidz</th>
                        <th class="py-3.5 px-4">Jabatan & Bidang</th>
                        <th class="py-3.5 px-4">Spesialisasi & Almamater</th>
                        <th class="py-3.5 px-4">Tanggung Jawab</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($asatidz as $g)
                        @php
                            $isAkhwat = strtolower($g->jenis_kelamin) === 'ustadzah';
                        @endphp
                        <tr class="guru-table-row hover:bg-slate-50/60 transition-colors"
                            id="guru-row-{{ $g->id }}"
                            data-id="{{ $g->id }}"
                            data-gender="{{ $isAkhwat ? 'ustadzah' : 'ustadz' }}"
                            data-kategori="{{ strtolower($g->kategori) }}"
                            data-status="{{ strtolower($g->status_kepegawaian) }}"
                            data-search="{{ strtolower($g->nama . ' ' . $g->jabatan . ' ' . $g->spesialisasi . ' ' . $g->almamater . ' ' . $g->tanggung_jawab) }}">
                            
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                <span class="guru-table-index inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <td class="py-4 px-5 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-slate-900 text-sm whitespace-nowrap guru-row-name">
                                        {{ $g->nama }}
                                    </p>
                                    @if($isAkhwat)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200 shrink-0">
                                            Ustadzah
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200 shrink-0">
                                            Ustadz
                                        </span>
                                    @endif
                                </div>
                                <p class="text-[11px] text-slate-500 mt-0.5 whitespace-nowrap guru-row-email">
                                    {{ $g->email ?? '-' }}
                                </p>
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                <strong class="text-slate-900 text-xs block font-bold guru-row-jabatan">{{ $g->jabatan }}</strong>
                                <span class="text-[11px] text-slate-400 mt-0.5 block">{{ $g->kategori_label }}</span>
                            </td>

                            <td class="py-4 px-4">
                                <p class="text-slate-800 font-medium line-clamp-1 max-w-[220px] guru-row-spesialisasi">{{ $g->spesialisasi }}</p>
                                <span class="text-[11px] text-slate-400 mt-0.5 block truncate max-w-[200px] guru-row-almamater">{{ $g->almamater ?? '-' }}</span>
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-semibold text-[11px] guru-row-tanggung-jawab">
                                    {{ $g->tanggung_jawab ?? '-' }}
                                </span>
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200 guru-row-status">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    {{ $g->status_kepegawaian }}
                                </span>
                            </td>

                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (string)$g->no_hp) }}" 
                                       target="_blank"
                                       class="p-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white transition-all">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                        </svg>
                                    </a>
                                    <button type="button" 
                                            onclick='openGuruDrawer(@json($g))'
                                            class="table-action-btn inline-flex flex-row items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 border border-forest-200/60 hover:bg-[#0B3B2C] hover:text-white hover:border-[#0B3B2C] transition-all shadow-xs whitespace-nowrap shrink-0 cursor-pointer">
                                        <span class="whitespace-nowrap">Detail</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 text-slate-400">
                                Belum ada data asatidz yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Table Counter Footer -->
    <div class="mt-4 p-4 bg-white rounded-2xl border border-slate-200/80 shadow-subtle flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-500 gap-3">
        <span id="filteredGuruCount">Menampilkan total {{ $asatidz->count() }} Dewan Asatidz & Tenaga Pendidik</span>
        <div class="flex items-center gap-2">
            <span class="text-slate-400">Pondok Pesantren Tahfizh Baitul Qur'an Camba</span>
        </div>
    </div>

    <!-- 4. SLIDE-OVER DRAWER: PROFIL LENGKAP ASATIDZ (DETAIL & EDIT MODE) -->
    <div id="guruDrawerBackdrop" 
         onclick="closeGuruDrawer()"
         class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs hidden transition-opacity duration-300"
         aria-hidden="true"></div>

    <div id="guruDrawer" 
         class="fixed inset-y-0 right-0 z-50 w-full max-w-xl bg-white shadow-2xl flex flex-col transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header (Hijau Tua Islami) -->
        <div class="p-5 sm:p-6 bg-gradient-to-r from-[#0B3B2C] via-[#0E4836] to-[#145742] text-white space-y-4">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3.5 min-w-0">
                    <!-- Pas Foto Asatidz di Header (seperti di pendaftaran santri baru) -->
                    <div class="relative w-14 h-18 sm:w-16 sm:h-20 rounded-2xl overflow-hidden bg-white/10 border-2 border-amber-400/80 shadow-md shrink-0 flex items-center justify-center group"
                         title="Pas Foto Asatidz">
                        <img id="detailHeaderPhoto" 
                             src="" 
                             alt="Foto Asatidz" 
                             class="w-full h-full object-cover object-top hidden transition-transform duration-300 group-hover:scale-105"
                             onerror="onHeaderPhotoError()" />
                        <div id="detailAvatarFallback" class="text-amber-200/80 flex items-center justify-center w-full h-full bg-forest-900/60">
                            <svg class="w-8 h-8 text-amber-200/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="absolute bottom-0 inset-x-0 bg-black/60 backdrop-blur-2xs py-0.5 text-[9px] font-bold text-center text-amber-200 tracking-wider">
                            FOTO
                        </span>
                    </div>

                    <div class="min-w-0">
                        <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-white/20 text-white" id="detailGuruGenderBadge">
                                Ustadz
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-amber-400 text-forest-950 font-mono" id="detailGuruStatusBadge">
                                Mukim (Tetap)
                            </span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold leading-tight truncate" id="detailGuruName">
                            Ust. Syahrir, S.Pd.I, M.Ag.
                        </h3>
                        <p class="text-xs text-emerald-200/90 mt-0.5 truncate" id="detailGuruJabatanHeader">
                            Kepala Bidang Tahfizh
                        </p>
                    </div>
                </div>
                <button type="button" 
                        onclick="closeGuruDrawer()" 
                        class="p-2 text-white/70 hover:text-white rounded-xl hover:bg-white/10 transition-colors shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mode Switcher Tabs (Detail vs Edit) -->
            <div class="flex items-center bg-black/20 p-1 rounded-xl gap-1 text-xs font-semibold">
                <button type="button" 
                        id="tabDetailGuruBtn" 
                        onclick="switchGuruDrawerMode('detail')" 
                        class="flex-1 py-1.5 rounded-lg bg-white text-forest-950 font-bold shadow-xs transition-all text-center">
                    Detail Profil
                </button>
                <button type="button" 
                        id="tabEditGuruBtn" 
                        onclick="switchGuruDrawerMode('edit')" 
                        class="flex-1 py-1.5 rounded-lg text-white/80 hover:text-white transition-all text-center">
                    Edit Data Asatidz
                </button>
            </div>
        </div>

        <!-- Drawer Content Body -->
        <div class="flex-1 overflow-y-auto p-5 text-xs text-slate-700">
            
            <!-- VIEW MODE 1: DETAIL PROFIL LENGKAP -->
            <div id="guruDetailView" class="space-y-4">
                
                <!-- Panel Ringkasan Jabatan & Status -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Amanah Struktural Pondok</span>
                        <strong class="text-sm font-bold text-slate-900 block mt-0.5" id="detailGuruJabatan">-</strong>
                    </div>
                    <div class="text-right">
                        <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Status Kepegawaian</span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-900 border border-emerald-300 mt-0.5" id="detailGuruStatus">
                            Mukim (Tetap)
                        </span>
                    </div>
                </div>

                <!-- Seksi 1: Spesialisasi & Tanggung Jawab -->
                <div class="space-y-2">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100 flex items-center justify-between">
                        <span>1. Spesialisasi Keilmuan & Almamater</span>
                        <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-md" id="detailGuruKategoriLabel">Tahfizh Al-Qur'an</span>
                    </h4>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-3">
                        <div>
                            <span class="text-slate-400 block text-[11px]">Bidang Keahlian & Sanad Qira'at</span>
                            <strong class="text-slate-900 text-xs block mt-0.5 leading-relaxed" id="detailGuruSpesialisasi">-</strong>
                        </div>
                        <div class="pt-2.5 border-t border-slate-200/60">
                            <span class="text-slate-400 block text-[11px]">Almamater / Riwayat Pendidikan Tinggi / Ma'had</span>
                            <strong class="text-slate-900 text-xs block mt-0.5 leading-snug" id="detailGuruAlmamater">-</strong>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2.5 border-t border-slate-200/60">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tanggung Jawab / Kelas</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailGuruTanggungJawab">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tahun Pengabdian</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailGuruBergabung">-</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seksi 2: Kontak Resmi & Domisili -->
                <div class="space-y-2">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                        2. Kontak Resmi & Komunikasi Pesantren
                    </h4>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Nomor WhatsApp Resmi</span>
                                <strong class="text-slate-900 font-mono text-xs block mt-0.5" id="detailGuruPhone">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Email Pesantren</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 truncate" id="detailGuruEmail">-</strong>
                            </div>
                        </div>
                        <div class="pt-2.5 border-t border-slate-200/60">
                            <span class="text-slate-400 block text-[11px]">Alamat Domisili / Unit Asrama</span>
                            <p class="text-slate-800 text-xs mt-0.5" id="detailGuruAddress">-</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- VIEW MODE 2: FORM EDIT ASATIDZ -->
            <div id="guruEditView" class="hidden space-y-4">
                
                <div class="p-3 bg-amber-50 border border-amber-200/80 rounded-xl text-amber-900 text-xs font-medium">
                    Perubahan data asatidz akan langsung disimpan ke database pesantren.
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap & Gelar *</label>
                    <input type="text" id="editGuruNama" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-semibold">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Gender *</label>
                        <select id="editGuruGender" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            <option value="Ustadz">Ustadz</option>
                            <option value="Ustadzah">Ustadzah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Kategori Bidang *</label>
                        <select id="editGuruKategori" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            <option value="tahfizh">Tahfizh Al-Qur'an</option>
                            <option value="diniyah">Dirasah Islamiyah & Kitab</option>
                            <option value="formal">Pendidikan Formal & Sains</option>
                            <option value="pengasuhan">Tahfizh & Pengasuhan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Status Kepegawaian *</label>
                        <select id="editGuruStatus" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            <option value="Mukim (Tetap)">Mukim (Tetap)</option>
                            <option value="Guru Tetap">Guru Tetap</option>
                            <option value="Guru Pengajar">Guru Pengajar</option>
                            <option value="Asatidz Tamu">Asatidz Tamu</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Amanah / Jabatan *</label>
                        <input type="text" id="editGuruJabatan" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Tanggung Jawab *</label>
                        <input type="text" id="editGuruTanggungJawab" placeholder="misal: 3 Halaqah Fajar & Maghrib" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Spesialisasi & Sanad Keilmuan</label>
                    <textarea id="editGuruSpesialisasi" rows="2" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Almamater / Riwayat Kuliah</label>
                        <input type="text" id="editGuruAlmamater" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Tahun Bergabung</label>
                        <input type="number" id="editGuruTahunBergabung" min="1990" max="2035" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Resmi</label>
                        <input type="text" id="editGuruHp" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Email</label>
                        <input type="email" id="editGuruEmail" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Alamat Domisili / Kamar Asrama</label>
                    <input type="text" id="editGuruAlamat" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Ganti Pas Foto Asatidz (Opsional)</label>
                    <div class="flex items-start gap-3 p-3 bg-slate-50/80 rounded-xl border border-slate-200/80">
                        <!-- 3x4 Photo Preview Frame -->
                        <div class="relative w-16 h-20 rounded-xl overflow-hidden bg-white border border-slate-200 shadow-2xs shrink-0 flex items-center justify-center group"
                             title="Preview Pas Foto">
                            <img id="editGuruPhotoPreview" 
                                 src="" 
                                 alt="Foto Asatidz" 
                                 class="w-full h-full object-cover object-top hidden" />
                            <div id="editGuruPhotoPlaceholder" class="text-slate-400 flex flex-col items-center justify-center p-1 text-center">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-[9px] text-slate-400 font-medium">3×4</span>
                            </div>
                            <button type="button" 
                                    id="editGuruPhotoResetBtn"
                                    onclick="resetEditGuruPhoto()" 
                                    class="hidden absolute top-1 right-1 w-5 h-5 rounded-full bg-red-600 text-white flex items-center justify-center text-[10px] font-bold shadow-sm hover:bg-red-700 transition-colors" 
                                    title="Batalkan pilihan foto baru">
                                ✕
                            </button>
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <input type="file" 
                                   id="editGuruFotoInput" 
                                   accept="image/*" 
                                   onchange="previewEditGuruPhoto(this)"
                                   class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-200 rounded-xl p-1 bg-white cursor-pointer">
                            <p class="text-[10px] text-slate-400 mt-1.5 leading-tight">
                                Pilih gambar baru jika ingin memperbarui pas foto (JPG/PNG, rasio 3×4 formal, maks 5 MB).
                            </p>
                            <p id="editGuruPhotoSelectedInfo" class="hidden text-[10px] text-emerald-700 font-semibold mt-1"></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Drawer Footer -->
        <div class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between gap-2">
            
            <!-- Footer: Mode Detail -->
            <div id="footerDetailMode" class="w-full flex items-center justify-between">
                <button type="button" 
                        onclick="confirmDeleteGuru()"
                        class="px-3.5 py-2 rounded-xl text-xs font-semibold text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors flex items-center gap-1.5 border border-red-200">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span>Hapus Asatidz</span>
                </button>
                <div class="flex items-center gap-2">
                    <a id="detailGuruWaBtn" href="#" target="_blank"
                       class="px-3.5 py-2 rounded-xl text-xs font-bold bg-emerald-600 hover:bg-emerald-700 text-white transition-all flex items-center gap-1.5 shadow-xs">
                        <svg class="w-4 h-4 text-amber-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                        </svg>
                        <span>WhatsApp</span>
                    </a>
                    <button type="button" 
                            onclick="switchGuruDrawerMode('edit')"
                            class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C] transition-all flex items-center gap-1.5 shadow-xs">
                        <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span>Edit Data</span>
                    </button>
                </div>
            </div>

            <!-- Footer: Mode Edit -->
            <div id="footerEditMode" class="w-full hidden items-center justify-between">
                <button type="button" 
                        onclick="switchGuruDrawerMode('detail')"
                        class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                    Batal Edit
                </button>
                <button type="button" 
                        id="btnSaveGuruEdit"
                        onclick="saveEditedGuru()"
                        class="px-5 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C] transition-all flex items-center gap-2 shadow-xs">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Simpan Perubahan</span>
                </button>
            </div>

        </div>
    </div>

    <!-- 5. MODAL: TAMBAH ASATIDZ / PENDIDIK BARU -->
    <div id="addGuruModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl border border-slate-100 max-h-[92vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Input Data Dewan Asatidz / Pengajar Baru</h3>
                        <p class="text-[11px] text-slate-400">Masukkan identitas, bidang keilmuan, dan tanggung jawab asatidz</p>
                    </div>
                </div>
                <button type="button" onclick="closeAddGuruModal()" class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="py-4 space-y-4 text-xs">
                
                <!-- Kelompok 1: Identitas Asatidz -->
                <div>
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        1. Identitas Pokok Tenaga Pendidik
                    </h5>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap & Gelar *</label>
                        <input type="text" id="addGuruNama" placeholder="Contoh: Ust. Muhammad Zain, Lc., M.Ag." class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Panggilan / Gender *</label>
                            <select id="addGuruGender" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                                <option value="Ustadz">Ustadz (Ikhwan)</option>
                                <option value="Ustadzah">Ustadzah (Akhwat)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Kategori Bidang *</label>
                            <select id="addGuruKategori" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-semibold">
                                <option value="tahfizh">Tahfizh Al-Qur'an</option>
                                <option value="diniyah">Dirasah Islamiyah & Kitab</option>
                                <option value="formal">Pendidikan Formal & Sains</option>
                                <option value="pengasuhan">Tahfizh & Pengasuhan Asrama</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Status Kepegawaian *</label>
                            <select id="addGuruStatus" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-semibold">
                                <option value="Mukim (Tetap)">Mukim (Tetap)</option>
                                <option value="Guru Tetap">Guru Tetap</option>
                                <option value="Guru Pengajar">Guru Pengajar</option>
                                <option value="Asatidz Tamu">Asatidz Tamu</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 2: Keilmuan & Tanggung Jawab -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        2. Amanah Struktural, Keilmuan & Tanggung Jawab
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Amanah / Jabatan di Pondok *</label>
                            <input type="text" id="addGuruJabatan" placeholder="misal: Pembina Tahfizh & Pengasuh Asrama" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tanggung Jawab *</label>
                            <input type="text" id="addGuruTanggungJawab" placeholder="misal: 3 Halaqah Fajar & Maghrib" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="block font-semibold text-slate-700 mb-1">Spesialisasi / Sanad Qira'at / Bidang Studi</label>
                        <input type="text" id="addGuruSpesialisasi" placeholder="misal: Hafizh 30 Juz Bersanad Riwayat Hafs, Pengajar Matan Al-Jazariyah" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Almamater Perguruan Tinggi / Ma'had</label>
                            <input type="text" id="addGuruAlmamater" placeholder="misal: Universitas Al-Azhar Kairo / UIN Alauddin" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tahun Bergabung</label>
                            <input type="number" id="addGuruTahunBergabung" value="{{ date('Y') }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                    </div>
                </div>

                <!-- Kelompok 3: Kontak & Domisili -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        3. Kontak Resmi & Domisili
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Resmi</label>
                            <input type="text" id="addGuruHp" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Email</label>
                            <input type="email" id="addGuruEmail" placeholder="nama@baitulquran.sch.id" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="block font-semibold text-slate-700 mb-1">Alamat Domisili / Kamar Asrama Asatidz</label>
                        <input type="text" id="addGuruAlamat" placeholder="misal: Komp. Perumahan Asatidz Camba" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                    <div class="mt-3">
                        <label class="block font-semibold text-slate-700 mb-1">Upload Pas Foto Asatidz (Opsional)</label>
                        <div class="flex items-start gap-3 p-3 bg-slate-50/80 rounded-xl border border-slate-200/80">
                            <!-- 3x4 Photo Preview Frame -->
                            <div class="relative w-16 h-20 rounded-xl overflow-hidden bg-white border border-slate-200 shadow-2xs shrink-0 flex items-center justify-center group"
                                 title="Preview Pas Foto">
                                <img id="addGuruPhotoPreview" 
                                     src="" 
                                     alt="Preview Foto" 
                                     class="w-full h-full object-cover object-top hidden" />
                                <div id="addGuruPhotoPlaceholder" class="text-slate-400 flex flex-col items-center justify-center p-1 text-center">
                                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="text-[9px] text-slate-400 font-medium">3×4</span>
                                </div>
                                <button type="button" 
                                        id="addGuruPhotoClearBtn"
                                        onclick="clearAddGuruPhoto()" 
                                        class="hidden absolute top-1 right-1 w-5 h-5 rounded-full bg-red-600 text-white flex items-center justify-center text-[10px] font-bold shadow-sm hover:bg-red-700 transition-colors" 
                                        title="Batalkan pilihan foto">
                                    ✕
                                </button>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <input type="file" 
                                       id="addGuruFotoInput" 
                                       accept="image/*" 
                                       onchange="previewAddGuruPhoto(this)"
                                       class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 border border-slate-200 rounded-xl p-1 bg-white cursor-pointer">
                                <p class="text-[10px] text-slate-400 mt-1.5 leading-tight">
                                    Disarankan pas foto formal rasio 3×4 berlatar rapi (JPG/PNG, maks 5 MB).
                                </p>
                                <p id="addGuruPhotoSelectedInfo" class="hidden text-[10px] text-emerald-700 font-semibold mt-1"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeAddGuruModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                <button type="button" id="btnSaveManualGuru" onclick="saveManualGuru()" class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C]">Simpan Data Asatidz</button>
            </div>
        </div>
    </div>

    <!-- 6. MODAL: KONFIRMASI HAPUS ASATIDZ -->
    <div id="deleteGuruModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full p-5 shadow-2xl border border-slate-100 space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 text-sm">Hapus Data Asatidz?</h4>
                    <p class="text-xs text-slate-500 mt-0.5" id="deleteGuruNameText">Konfirmasi penghapusan data.</p>
                </div>
            </div>
            <p class="text-xs text-slate-600 leading-relaxed">
                Tindakan ini akan menghapus data tenaga pendidik dari database sistem secara permanen.
            </p>
            <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeDeleteGuruModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">
                    Batal
                </button>
                <button type="button" id="btnExecuteDeleteGuru" onclick="executeDeleteGuru()" class="px-4 py-2 rounded-xl text-xs font-bold bg-red-600 hover:bg-red-700 text-white">
                    Ya, Hapus Data
                </button>
            </div>
        </div>
    </div>

    <!-- 7. TOAST NOTIFICATION -->
    <div id="guruToast" class="fixed bottom-6 right-6 z-50 bg-[#0B3B2C] text-white px-4 py-3 rounded-2xl shadow-2xl border border-emerald-500/30 flex items-center gap-3 transition-all duration-300 transform translate-y-24 opacity-0 pointer-events-none">
        <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0" id="guruToastIcon">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <p class="text-xs font-semibold" id="guruToastMessage">Data Dewan Asatidz berhasil diperbarui!</p>
    </div>

    <x-slot:scripts>
        <script>
            // CSRF Token helper
            function getCsrfToken() {
                return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            }

            function resolveFileUrl(path) {
                if (!path || path === 'missing') return '';
                if (path.startsWith('http://') || path.startsWith('https://') || path.startsWith('/') || path.startsWith('data:')) {
                    return path;
                }
                return '/storage/' + path;
            }

            function onHeaderPhotoError() {
                const headerPhoto = document.getElementById('detailHeaderPhoto');
                const headerFallback = document.getElementById('detailAvatarFallback');
                if (headerPhoto) headerPhoto.classList.add('hidden');
                if (headerFallback) headerFallback.classList.remove('hidden');
            }

            // ====================================================
            // 1. Filtering & Search Logic (Client-Side Instant)
            // ====================================================
            let currentGuruGender = 'all';

            function filterGuruGender(genderKey, btnEl) {
                currentGuruGender = genderKey;

                document.querySelectorAll('.guru-gender-btn').forEach(b => {
                    b.classList.remove('bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
                    b.classList.add('text-slate-600', 'font-semibold');
                });
                btnEl.classList.add('bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
                btnEl.classList.remove('text-slate-600');

                applyGuruFilter();
            }

            function applyGuruFilter() {
                const searchKeyword = document.getElementById('guruSearchInput').value.toLowerCase().trim();
                const statusValue = document.getElementById('statusGuruSelect').value.toLowerCase();
                
                // Filter Table Rows
                const rows = document.querySelectorAll('.guru-table-row');
                let count = 0;
                let tableIndex = 1;

                rows.forEach(row => {
                    const rowGender = row.getAttribute('data-gender') || '';
                    const rowStatus = row.getAttribute('data-status') || '';
                    const searchData = row.getAttribute('data-search') || '';

                    const matchesGender = (currentGuruGender === 'all' || rowGender === currentGuruGender);
                    const matchesStatus = (statusValue === 'all' || rowStatus.includes(statusValue));
                    const matchesSearch = (!searchKeyword || searchData.includes(searchKeyword));

                    if (matchesGender && matchesStatus && matchesSearch) {
                        row.classList.remove('hidden');
                        const indexBadge = row.querySelector('.guru-table-index');
                        if (indexBadge) indexBadge.innerText = tableIndex++;
                        count++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                document.getElementById('filteredGuruCount').innerText = 'Menampilkan total ' + count + ' Dewan Asatidz & Tenaga Pendidik';
            }

            // ====================================================
            // 2. Slide-Over Detail & Edit Drawer
            // ====================================================
            let activeDetailGuru = null;

            function openGuruDrawer(guru) {
                activeDetailGuru = guru;
                const isAkhwat = (guru.jenis_kelamin || '').toLowerCase().includes('ustadzah');

                // Header Pas Foto (seperti di pendaftaran santri baru)
                const fotoUrl = resolveFileUrl(guru.foto_path);
                const headerPhoto = document.getElementById('detailHeaderPhoto');
                const fallbackEl = document.getElementById('detailAvatarFallback');

                if (headerPhoto) {
                    if (fotoUrl) {
                        headerPhoto.src = fotoUrl;
                        headerPhoto.classList.remove('hidden');
                        if (fallbackEl) fallbackEl.classList.add('hidden');
                    } else {
                        headerPhoto.classList.add('hidden');
                        if (fallbackEl) fallbackEl.classList.remove('hidden');
                    }
                }

                document.getElementById('detailGuruGenderBadge').innerText = isAkhwat ? 'Ustadzah' : 'Ustadz';
                document.getElementById('detailGuruStatusBadge').innerText = guru.status_kepegawaian || 'Mukim (Tetap)';
                document.getElementById('detailGuruName').innerText = guru.nama;
                document.getElementById('detailGuruJabatanHeader').innerText = guru.jabatan || '';

                // Jabatan & Status
                document.getElementById('detailGuruJabatan').innerText = guru.jabatan;
                document.getElementById('detailGuruStatus').innerText = guru.status_kepegawaian;
                document.getElementById('detailGuruKategoriLabel').innerText = guru.kategori_label || guru.kategori;

                // Akademik & Tanggung Jawab
                document.getElementById('detailGuruSpesialisasi').innerText = guru.spesialisasi || '-';
                document.getElementById('detailGuruAlmamater').innerText = guru.almamater || '-';
                document.getElementById('detailGuruTanggungJawab').innerText = guru.tanggung_jawab || '-';
                const tahun = guru.tahun_bergabung || 2020;
                document.getElementById('detailGuruBergabung').innerText = tahun + ' (Pengabdian ' + (2026 - tahun) + ' Tahun)';

                // Kontak
                document.getElementById('detailGuruPhone').innerText = guru.no_hp || '-';
                document.getElementById('detailGuruEmail').innerText = guru.email || '-';
                document.getElementById('detailGuruAddress').innerText = guru.alamat || '-';

                // WhatsApp Link
                const phoneOnly = guru.no_hp ? guru.no_hp.replace(/[^0-9]/g, '') : '6281234567801';
                const template = encodeURIComponent("Assalamu'alaikum " + guru.nama + ", kami dari Bagian Administrasi / Kesantrian Pondok Pesantren Tahfizh Baitul Qur'an Camba...");
                document.getElementById('detailGuruWaBtn').href = 'https://wa.me/' + phoneOnly + '?text=' + template;

                // Pre-fill Edit form
                document.getElementById('editGuruNama').value = guru.nama || '';
                document.getElementById('editGuruGender').value = guru.jenis_kelamin || 'Ustadz';
                document.getElementById('editGuruKategori').value = guru.kategori || 'tahfizh';
                document.getElementById('editGuruStatus').value = guru.status_kepegawaian || 'Mukim (Tetap)';
                document.getElementById('editGuruJabatan').value = guru.jabatan || '';
                document.getElementById('editGuruTanggungJawab').value = guru.tanggung_jawab || '';
                document.getElementById('editGuruSpesialisasi').value = guru.spesialisasi || '';
                document.getElementById('editGuruAlmamater').value = guru.almamater || '';
                document.getElementById('editGuruTahunBergabung').value = guru.tahun_bergabung || new Date().getFullYear();
                document.getElementById('editGuruHp').value = guru.no_hp || '';
                document.getElementById('editGuruEmail').value = guru.email || '';
                document.getElementById('editGuruAlamat').value = guru.alamat || '';

                // Reset file input & setup preview pas foto di Edit Mode
                const editPhotoPreview = document.getElementById('editGuruPhotoPreview');
                const editPhotoPlaceholder = document.getElementById('editGuruPhotoPlaceholder');
                const editPhotoResetBtn = document.getElementById('editGuruPhotoResetBtn');
                const editPhotoInfo = document.getElementById('editGuruPhotoSelectedInfo');
                const editPhotoInput = document.getElementById('editGuruFotoInput');
                if (editPhotoInput) editPhotoInput.value = '';
                if (editPhotoResetBtn) editPhotoResetBtn.classList.add('hidden');
                if (editPhotoInfo) {
                    editPhotoInfo.textContent = '';
                    editPhotoInfo.classList.add('hidden');
                }

                if (editPhotoPreview) {
                    if (fotoUrl) {
                        editPhotoPreview.src = fotoUrl;
                        editPhotoPreview.classList.remove('hidden');
                        if (editPhotoPlaceholder) editPhotoPlaceholder.classList.add('hidden');
                    } else {
                        editPhotoPreview.src = '';
                        editPhotoPreview.classList.add('hidden');
                        if (editPhotoPlaceholder) editPhotoPlaceholder.classList.remove('hidden');
                    }
                }

                // Default ke mode detail
                switchGuruDrawerMode('detail');

                const backdrop = document.getElementById('guruDrawerBackdrop');
                const drawer = document.getElementById('guruDrawer');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    drawer.classList.remove('translate-x-full');
                }, 10);
            }

            function closeGuruDrawer() {
                const backdrop = document.getElementById('guruDrawerBackdrop');
                const drawer = document.getElementById('guruDrawer');
                drawer.classList.add('translate-x-full');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }

            function switchGuruDrawerMode(mode) {
                const tabDetail = document.getElementById('tabDetailGuruBtn');
                const tabEdit = document.getElementById('tabEditGuruBtn');
                const viewDetail = document.getElementById('guruDetailView');
                const viewEdit = document.getElementById('guruEditView');
                const footerDetail = document.getElementById('footerDetailMode');
                const footerEdit = document.getElementById('footerEditMode');

                if (mode === 'detail') {
                    tabDetail.classList.add('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabDetail.classList.remove('text-white/80');
                    tabEdit.classList.remove('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabEdit.classList.add('text-white/80');

                    viewDetail.classList.remove('hidden');
                    viewEdit.classList.add('hidden');
                    footerDetail.classList.remove('hidden');
                    footerDetail.classList.add('flex');
                    footerEdit.classList.add('hidden');
                    footerEdit.classList.remove('flex');
                } else {
                    tabEdit.classList.add('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabEdit.classList.remove('text-white/80');
                    tabDetail.classList.remove('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabDetail.classList.add('text-white/80');

                    viewDetail.classList.add('hidden');
                    viewEdit.classList.remove('hidden');
                    footerDetail.classList.add('hidden');
                    footerDetail.classList.remove('flex');
                    footerEdit.classList.remove('hidden');
                    footerEdit.classList.add('flex');
                }
            }

            // Live Preview Pas Foto di Form Edit
            function previewEditGuruPhoto(input) {
                if (!input.files || !input.files[0]) return;
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('editGuruPhotoPreview');
                    const placeholder = document.getElementById('editGuruPhotoPlaceholder');
                    const resetBtn = document.getElementById('editGuruPhotoResetBtn');
                    const info = document.getElementById('editGuruPhotoSelectedInfo');
                    const headerPhoto = document.getElementById('detailHeaderPhoto');
                    const headerFallback = document.getElementById('detailAvatarFallback');

                    if (preview) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                    if (placeholder) placeholder.classList.add('hidden');
                    if (resetBtn) resetBtn.classList.remove('hidden');
                    if (info) {
                        info.textContent = 'Foto baru terpilih: ' + file.name + ' (' + (file.size / (1024 * 1024)).toFixed(2) + ' MB)';
                        info.classList.remove('hidden');
                    }

                    // Live update drawer header foto juga
                    if (headerPhoto) {
                        headerPhoto.src = e.target.result;
                        headerPhoto.classList.remove('hidden');
                    }
                    if (headerFallback) headerFallback.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }

            function resetEditGuruPhoto() {
                const input = document.getElementById('editGuruFotoInput');
                if (input) input.value = '';
                const resetBtn = document.getElementById('editGuruPhotoResetBtn');
                const info = document.getElementById('editGuruPhotoSelectedInfo');
                if (resetBtn) resetBtn.classList.add('hidden');
                if (info) {
                    info.textContent = '';
                    info.classList.add('hidden');
                }

                const origUrl = activeDetailGuru ? resolveFileUrl(activeDetailGuru.foto_path) : '';
                const preview = document.getElementById('editGuruPhotoPreview');
                const placeholder = document.getElementById('editGuruPhotoPlaceholder');
                const headerPhoto = document.getElementById('detailHeaderPhoto');
                const headerFallback = document.getElementById('detailAvatarFallback');

                if (origUrl) {
                    if (preview) {
                        preview.src = origUrl;
                        preview.classList.remove('hidden');
                    }
                    if (placeholder) placeholder.classList.add('hidden');
                    if (headerPhoto) {
                        headerPhoto.src = origUrl;
                        headerPhoto.classList.remove('hidden');
                    }
                    if (headerFallback) headerFallback.classList.add('hidden');
                } else {
                    if (preview) {
                        preview.src = '';
                        preview.classList.add('hidden');
                    }
                    if (placeholder) placeholder.classList.remove('hidden');
                    if (headerPhoto) {
                        headerPhoto.src = '';
                        headerPhoto.classList.add('hidden');
                    }
                    if (headerFallback) headerFallback.classList.remove('hidden');
                }
            }

            // ====================================================
            // 3. Save Edited Guru (Sync Backend via PUT)
            // ====================================================
            function saveEditedGuru() {
                if (!activeDetailGuru) return;

                const nama = document.getElementById('editGuruNama').value.trim();
                const jabatan = document.getElementById('editGuruJabatan').value.trim();
                const jenis_kelamin = document.getElementById('editGuruGender').value;
                const kategori = document.getElementById('editGuruKategori').value;
                const status_kepegawaian = document.getElementById('editGuruStatus').value;
                const tanggung_jawab = document.getElementById('editGuruTanggungJawab').value.trim();
                const spesialisasi = document.getElementById('editGuruSpesialisasi').value.trim();
                const almamater = document.getElementById('editGuruAlmamater').value.trim();
                const tahun_bergabung = document.getElementById('editGuruTahunBergabung').value;
                const no_hp = document.getElementById('editGuruHp').value.trim();
                const email = document.getElementById('editGuruEmail').value.trim();
                const alamat = document.getElementById('editGuruAlamat').value.trim();

                if (!nama || !jabatan) {
                    alert('Mohon lengkapi Nama Lengkap dan Amanah/Jabatan asatidz.');
                    return;
                }

                const btn = document.getElementById('btnSaveGuruEdit');
                btn.disabled = true;
                btn.innerText = 'Menyimpan...';

                const formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('nama', nama);
                formData.append('jenis_kelamin', jenis_kelamin);
                formData.append('kategori', kategori);
                formData.append('status_kepegawaian', status_kepegawaian);
                formData.append('jabatan', jabatan);
                formData.append('tanggung_jawab', tanggung_jawab);
                formData.append('spesialisasi', spesialisasi);
                formData.append('almamater', almamater);
                if (tahun_bergabung) formData.append('tahun_bergabung', parseInt(tahun_bergabung));
                formData.append('no_hp', no_hp);
                formData.append('email', email);
                formData.append('alamat', alamat);

                const fotoInput = document.getElementById('editGuruFotoInput');
                if (fotoInput && fotoInput.files && fotoInput.files[0]) {
                    formData.append('foto', fotoInput.files[0]);
                }

                fetch('/admin/guru/' + activeDetailGuru.id, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerHTML = `<svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Simpan Perubahan</span>`;

                    if (data.success && data.data) {
                        const updated = data.data;
                        activeDetailGuru = updated;

                        // Perbarui data di DOM baris tabel
                        const row = document.getElementById('guru-row-' + updated.id);
                        if (row) {
                            row.querySelector('.guru-row-name').innerText = updated.nama;
                            row.querySelector('.guru-row-email').innerText = updated.email || '-';
                            row.querySelector('.guru-row-jabatan').innerText = updated.jabatan;
                            row.querySelector('.guru-row-spesialisasi').innerText = updated.spesialisasi || '';
                            row.querySelector('.guru-row-almamater').innerText = updated.almamater || '-';
                            row.querySelector('.guru-row-tanggung-jawab').innerText = updated.tanggung_jawab || '-';
                            row.setAttribute('data-search', (updated.nama + ' ' + updated.jabatan + ' ' + (updated.spesialisasi || '') + ' ' + (updated.almamater || '') + ' ' + (updated.tanggung_jawab || '')).toLowerCase());
                            row.setAttribute('data-status', (updated.status_kepegawaian || '').toLowerCase());
                        }

                        // Re-render detail view drawer
                        openGuruDrawer(updated);
                        showGuruToast('Data asatidz ' + updated.nama + ' berhasil diperbarui!');
                    } else {
                        showGuruToast(data.message || 'Gagal menyimpan perubahan.', true);
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.innerHTML = `<span>Simpan Perubahan</span>`;
                    console.error('Error saving guru:', err);
                    showGuruToast('Terjadi kesalahan jaringan saat menyimpan data.', true);
                });
            }

            // ====================================================
            // 4. Delete Guru Functionality
            // ====================================================
            function confirmDeleteGuru() {
                if (!activeDetailGuru) return;
                document.getElementById('deleteGuruNameText').innerText = 'Apakah Anda yakin ingin menghapus data ' + activeDetailGuru.nama + '?';
                document.getElementById('deleteGuruModal').classList.remove('hidden');
            }

            function closeDeleteGuruModal() {
                document.getElementById('deleteGuruModal').classList.add('hidden');
            }

            function executeDeleteGuru() {
                if (!activeDetailGuru) return;

                const btn = document.getElementById('btnExecuteDeleteGuru');
                btn.disabled = true;
                btn.innerText = 'Menghapus...';

                fetch('/admin/guru/' + activeDetailGuru.id, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerText = 'Ya, Hapus Data';
                    closeDeleteGuruModal();
                    closeGuruDrawer();

                    if (data.success) {
                        // Hapus dari Table
                        const row = document.getElementById('guru-row-' + activeDetailGuru.id);
                        if (row) row.remove();

                        showGuruToast(data.message || 'Data asatidz berhasil dihapus.');
                        applyGuruFilter();
                    } else {
                        showGuruToast(data.message || 'Gagal menghapus data.', true);
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.innerText = 'Ya, Hapus Data';
                    console.error('Error deleting guru:', err);
                    showGuruToast('Terjadi kesalahan saat menghapus data.', true);
                });
            }

            // ====================================================
            // 5. Modal Add Asatidz (Sync Backend via POST)
            // ====================================================
            function previewAddGuruPhoto(input) {
                if (!input.files || !input.files[0]) return;
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('addGuruPhotoPreview');
                    const placeholder = document.getElementById('addGuruPhotoPlaceholder');
                    const clearBtn = document.getElementById('addGuruPhotoClearBtn');
                    const info = document.getElementById('addGuruPhotoSelectedInfo');

                    if (preview) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                    if (placeholder) placeholder.classList.add('hidden');
                    if (clearBtn) clearBtn.classList.remove('hidden');
                    if (info) {
                        info.textContent = 'Foto terpilih: ' + file.name + ' (' + (file.size / (1024 * 1024)).toFixed(2) + ' MB)';
                        info.classList.remove('hidden');
                    }
                };
                reader.readAsDataURL(file);
            }

            function clearAddGuruPhoto() {
                const input = document.getElementById('addGuruFotoInput');
                if (input) input.value = '';
                const preview = document.getElementById('addGuruPhotoPreview');
                const placeholder = document.getElementById('addGuruPhotoPlaceholder');
                const clearBtn = document.getElementById('addGuruPhotoClearBtn');
                const info = document.getElementById('addGuruPhotoSelectedInfo');

                if (preview) {
                    preview.src = '';
                    preview.classList.add('hidden');
                }
                if (placeholder) placeholder.classList.remove('hidden');
                if (clearBtn) clearBtn.classList.add('hidden');
                if (info) {
                    info.textContent = '';
                    info.classList.add('hidden');
                }
            }

            function openAddGuruModal() {
                clearAddGuruPhoto();
                document.getElementById('addGuruModal').classList.remove('hidden');
            }

            function closeAddGuruModal() {
                clearAddGuruPhoto();
                document.getElementById('addGuruModal').classList.add('hidden');
            }

            function saveManualGuru() {
                const nama = document.getElementById('addGuruNama').value.trim();
                const jenis_kelamin = document.getElementById('addGuruGender').value;
                const kategori = document.getElementById('addGuruKategori').value;
                const status_kepegawaian = document.getElementById('addGuruStatus').value;
                const jabatan = document.getElementById('addGuruJabatan').value.trim();
                const tanggung_jawab = document.getElementById('addGuruTanggungJawab').value.trim();
                const spesialisasi = document.getElementById('addGuruSpesialisasi').value.trim();
                const almamater = document.getElementById('addGuruAlmamater').value.trim();
                const tahun_bergabung = document.getElementById('addGuruTahunBergabung').value;
                const no_hp = document.getElementById('addGuruHp').value.trim();
                const email = document.getElementById('addGuruEmail').value.trim();
                const alamat = document.getElementById('addGuruAlamat').value.trim();

                if (!nama || !jabatan) {
                    alert('Mohon isi Nama Lengkap dan Amanah/Jabatan Asatidz.');
                    return;
                }

                const btn = document.getElementById('btnSaveManualGuru');
                btn.disabled = true;
                btn.innerText = 'Menyimpan...';

                const formData = new FormData();
                formData.append('nama', nama);
                formData.append('jenis_kelamin', jenis_kelamin);
                formData.append('kategori', kategori);
                formData.append('status_kepegawaian', status_kepegawaian);
                formData.append('jabatan', jabatan);
                formData.append('tanggung_jawab', tanggung_jawab);
                formData.append('spesialisasi', spesialisasi);
                formData.append('almamater', almamater);
                if (tahun_bergabung) formData.append('tahun_bergabung', parseInt(tahun_bergabung));
                formData.append('no_hp', no_hp);
                formData.append('email', email);
                formData.append('alamat', alamat);

                const fotoInput = document.getElementById('addGuruFotoInput');
                if (fotoInput && fotoInput.files && fotoInput.files[0]) {
                    formData.append('foto', fotoInput.files[0]);
                }

                fetch('/admin/guru', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerText = 'Simpan Data Asatidz';

                    if (data.success) {
                        closeAddGuruModal();
                        showGuruToast(data.message || 'Data asatidz baru berhasil ditambahkan!');
                        setTimeout(() => {
                            window.location.reload();
                        }, 800);
                    } else {
                        showGuruToast(data.message || 'Gagal menyimpan data pendidik.', true);
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.innerText = 'Simpan Data Asatidz';
                    console.error('Error saving new guru:', err);
                    showGuruToast('Terjadi kendala jaringan saat menyimpan.', true);
                });
            }

            // ====================================================
            // 6. Export CSV / Excel
            // ====================================================
            function exportGuruCsv() {
                const rows = document.querySelectorAll('.guru-table-row');
                if (!rows.length) {
                    showGuruToast('Tidak ada data untuk diekspor.', true);
                    return;
                }

                let csvContent = '\uFEFF'; // UTF-8 BOM
                csvContent += '"No","Nama Asatidz","Gender","Jabatan","Kategori","Tanggung Jawab","Almamater","Status","Email","No HP"\n';

                let idx = 1;
                rows.forEach(row => {
                    const name = row.querySelector('.guru-row-name')?.innerText.trim() || '';
                    const gender = (row.getAttribute('data-gender') || '').toUpperCase();
                    const jabatan = row.querySelector('.guru-row-jabatan')?.innerText.trim() || '';
                    const kategori = row.getAttribute('data-kategori') || '';
                    const tanggungJawab = row.querySelector('.guru-row-tanggung-jawab')?.innerText.trim() || '';
                    const almamater = row.querySelector('.guru-row-almamater')?.innerText.trim() || '';
                    const status = row.querySelector('.guru-row-status')?.innerText.trim() || '';
                    const email = row.querySelector('.guru-row-email')?.innerText.trim() || '';
                    
                    csvContent += `"${idx++}","${name}","${gender}","${jabatan}","${kategori}","${tanggungJawab}","${almamater}","${status}","${email}",""\n`;
                });

                const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.setAttribute('href', url);
                a.setAttribute('download', 'Dewan_Asatidz_Baitul_Quran_Camba_' + new Date().toISOString().slice(0, 10) + '.csv');
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                showGuruToast('Berhasil mengunduh rekap Excel / CSV Dewan Asatidz!');
            }

            function showGuruToast(message, isError = false) {
                const toast = document.getElementById('guruToast');
                const icon = document.getElementById('guruToastIcon');
                document.getElementById('guruToastMessage').innerText = message;
                
                if (isError) {
                    toast.classList.remove('bg-[#0B3B2C]', 'border-emerald-500/30');
                    toast.classList.add('bg-red-900', 'border-red-500/30');
                    icon.classList.remove('bg-emerald-500');
                    icon.classList.add('bg-red-500');
                } else {
                    toast.classList.add('bg-[#0B3B2C]', 'border-emerald-500/30');
                    toast.classList.remove('bg-red-900', 'border-red-500/30');
                    icon.classList.add('bg-emerald-50');
                    icon.classList.remove('bg-red-500');
                }

                toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                }, 3500);
            }
        </script>
    </x-slot:scripts>

</x-layouts.admin>

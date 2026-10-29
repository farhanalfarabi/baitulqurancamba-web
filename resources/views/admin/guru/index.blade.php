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
                <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block">{{ $stats['total_guru'] ?? $asatidz->count() }}</span>
                <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">
                    {{ $stats['guru_ikhwan'] ?? 13 }} Ustadz • {{ $stats['guru_akhwat'] ?? 5 }} Ustadzah
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
                <span class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1 block">{{ $stats['guru_tahfizh'] ?? 8 }}</span>
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
                <span class="text-2xl sm:text-3xl font-black text-teal-800 mt-1 block">{{ $stats['guru_formal'] ?? 10 }}</span>
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
                <span class="text-2xl sm:text-3xl font-black text-amber-600 mt-1 block">{{ $stats['asatidz_mukim'] ?? 14 }}</span>
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
                    Database tenaga pendidik pesantren, bidang keilmuan, sanad hafalan, jadwal halaqah, dan amanah asrama.
                </p>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center gap-2.5">
                <button type="button" 
                        onclick="showExportToast()"
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

            <!-- Instant Search Box & View Switcher -->
            <div class="flex items-center gap-2 w-full lg:w-auto">
                <div class="relative flex-1 lg:w-64">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="text" 
                           id="guruSearchInput"
                           onkeyup="applyGuruFilter()"
                           placeholder="Cari asatidz, bidang, almamater..." 
                           class="w-full pl-9 pr-3.5 py-1.5 text-xs bg-slate-50 hover:bg-slate-100 focus:bg-white text-slate-800 rounded-xl border border-slate-200 focus:border-forest-500 focus:ring-1 focus:ring-forest-200 transition-all outline-hidden">
                </div>

                <!-- Layout Toggle Buttons (Grid vs Tabel) -->
                <div class="inline-flex items-center p-1 bg-slate-100 rounded-xl text-xs shrink-0">
                    <button type="button" 
                            id="viewGridBtn"
                            onclick="switchGuruView('grid')"
                            title="Tampilan Grid Kartu"
                            class="p-1.5 rounded-lg bg-white text-slate-900 shadow-xs transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </button>
                    <button type="button" 
                            id="viewTableBtn"
                            onclick="switchGuruView('table')"
                            title="Tampilan Tabel List"
                            class="p-1.5 rounded-lg text-slate-500 hover:text-slate-900 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

        </div>

    </div>

    <!-- 3. TAMPILAN 1: GRID KARTU ASATIDZ (DEFAULT VIEW) -->
    <div id="guruGridView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($asatidz as $g)
            @php
                $isAkhwat = strtolower($g->jenis_kelamin) === 'ustadzah';
                $names = explode(' ', str_replace(['Ust. ', 'Ustadzah '], '', $g->nama));
                $initials = count($names) > 1 ? (substr($names[0], 0, 1) . substr($names[1], 0, 1)) : substr($names[0], 0, 2);
                $initials = strtoupper($initials);
            @endphp
            <div class="guru-card bg-white rounded-2xl p-5 border border-slate-200/80 shadow-subtle hover:shadow-card hover:border-slate-300 transition-all flex flex-col justify-between"
                 data-gender="{{ $isAkhwat ? 'ustadzah' : 'ustadz' }}"
                 data-kategori="{{ strtolower($g->kategori) }}"
                 data-status="{{ strtolower($g->status_kepegawaian) }}"
                 data-search="{{ strtolower($g->nama . ' ' . $g->nip . ' ' . $g->jabatan . ' ' . $g->spesialisasi . ' ' . $g->almamater) }}">
                
                <div>
                    <!-- Top Avatar & NIP Row -->
                    <div class="flex items-start justify-between gap-3 pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-2xl bg-[#0B3B2C] text-amber-300 flex items-center justify-center font-bold text-sm shrink-0 border border-emerald-800/40 shadow-xs">
                                {{ $initials }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <h3 class="font-bold text-slate-900 text-sm leading-snug truncate" title="{{ $g->nama }}">
                                        {{ $g->nama }}
                                    </h3>
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
                            </div>
                        </div>
                    </div>

                    <!-- Jabatan & Kategori Badge -->
                    <div class="mt-3.5 space-y-2">
                        <div>
                            <span class="text-xs font-bold text-[#0B3B2C] block">
                                {{ $g->jabatan }}
                            </span>
                            <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-2 leading-relaxed">
                                {{ $g->spesialisasi }}
                            </p>
                        </div>

                        <!-- Almamater & Sanad -->
                        <div class="p-2.5 rounded-xl bg-slate-50/70 border border-slate-100 space-y-1.5 text-[11px]">
                            <div class="flex items-start gap-1.5 text-slate-600">
                                <svg class="w-3.5 h-3.5 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                                <span class="truncate font-medium">{{ $g->almamater }}</span>
                            </div>
                            <div class="flex items-center justify-between pt-1 border-t border-slate-200/50 text-[10px]">
                                <span class="text-slate-400">Beban Tugas:</span>
                                <span class="font-bold text-slate-800">{{ $g->beban_tugas }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Card: Status & Actions -->
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        {{ $g->status_kepegawaian }}
                    </span>

                    <div class="flex items-center gap-1.5">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $g->no_hp) }}" 
                           target="_blank"
                           title="Hubungi WhatsApp Resmi"
                           class="w-7 h-7 rounded-lg bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white flex items-center justify-center transition-all">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                            </svg>
                        </a>
                        <button type="button" 
                                onclick='openGuruDrawer(@json($g))'
                                class="px-2.5 py-1 rounded-lg bg-forest-50 hover:bg-[#0B3B2C] text-forest-900 hover:text-white font-bold text-xs transition-all shadow-2xs">
                            Detail
                        </button>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full text-center py-12 text-slate-400 bg-white rounded-2xl border border-slate-200">
                Belum ada data asatidz yang tercatat.
            </div>
        @endforelse
    </div>

    <!-- 4. TAMPILAN 2: TABEL LIST ASATIDZ (ALTERNATIF VIEW) -->
    <div id="guruTableView" class="hidden bg-white rounded-2xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="guruMainTable">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 text-center w-12">No.</th>
                        <th class="py-3.5 px-5 whitespace-nowrap">Nama Asatidz</th>
                        <th class="py-3.5 px-4">Jabatan & Bidang</th>
                        <th class="py-3.5 px-4">Spesialisasi & Almamater</th>
                        <th class="py-3.5 px-4">Beban Tugas</th>
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
                            data-gender="{{ $isAkhwat ? 'ustadzah' : 'ustadz' }}"
                            data-kategori="{{ strtolower($g->kategori) }}"
                            data-status="{{ strtolower($g->status_kepegawaian) }}"
                            data-search="{{ strtolower($g->nama . ' ' . $g->nip . ' ' . $g->jabatan . ' ' . $g->spesialisasi . ' ' . $g->almamater) }}">
                            
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                <span class="guru-table-index inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <td class="py-4 px-5 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-slate-900 text-sm whitespace-nowrap">
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
                                <p class="text-[11px] text-slate-500 mt-0.5 whitespace-nowrap">
                                    {{ $g->email }}
                                </p>
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                <strong class="text-slate-900 text-xs block font-bold">{{ $g->jabatan }}</strong>
                                <span class="text-[11px] text-slate-400 mt-0.5 block">{{ $g->kategori_label }}</span>
                            </td>

                            <td class="py-4 px-4">
                                <p class="text-slate-800 font-medium line-clamp-1 max-w-[220px]">{{ $g->spesialisasi }}</p>
                                <span class="text-[11px] text-slate-400 mt-0.5 block truncate max-w-[200px]">{{ $g->almamater }}</span>
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-semibold text-[11px]">
                                    {{ $g->beban_tugas }}
                                </span>
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    {{ $g->status_kepegawaian }}
                                </span>
                            </td>

                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $g->no_hp) }}" 
                                       target="_blank"
                                       class="p-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white transition-all">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                        </svg>
                                    </a>
                                    <button type="button" 
                                            onclick='openGuruDrawer(@json($g))'
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 hover:bg-[#0B3B2C] hover:text-white transition-all shadow-2xs">
                                        <span>Detail</span>
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

    <!-- Table & Grid Counter Footer -->
    <div class="mt-4 p-4 bg-white rounded-2xl border border-slate-200/80 shadow-subtle flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-500 gap-3">
        <span id="filteredGuruCount">Menampilkan total {{ $asatidz->count() }} Dewan Asatidz & Tenaga Pendidik</span>
        <div class="flex items-center gap-2">
            <span class="text-slate-400">Pondok Pesantren Tahfizh Baitul Qur'an Camba</span>
        </div>
    </div>

    <!-- 5. SLIDE-OVER DRAWER: PROFIL LENGKAP ASATIDZ & AMANAH PESANTREN -->
    <div id="guruDrawerBackdrop" 
         onclick="closeGuruDrawer()"
         class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs hidden transition-opacity duration-300"
         aria-hidden="true"></div>

    <div id="guruDrawer" 
         class="fixed inset-y-0 right-0 z-50 w-full max-w-xl bg-white shadow-2xl flex flex-col transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header (Hijau Tua Islami) -->
        <div class="p-6 bg-gradient-to-r from-[#0B3B2C] via-[#0E4836] to-[#145742] text-white flex items-center justify-between">
            <div class="flex items-center gap-3.5">
                <div class="w-13 h-13 rounded-2xl bg-white/10 text-amber-300 font-black text-xl flex items-center justify-center border border-white/20 shadow-sm" id="detailGuruAvatar">
                    SF
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-amber-400 text-forest-950 font-mono" id="detailGuruNip">
                            AS-2018-001
                        </span>
                        <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-white/20 text-white" id="detailGuruGenderBadge">
                            Ustadz
                        </span>
                    </div>
                    <h3 class="text-lg font-bold leading-tight" id="detailGuruName">
                        Ust. Syahrir, S.Pd.I, M.Ag.
                    </h3>
                </div>
            </div>
            <button type="button" 
                    onclick="closeGuruDrawer()" 
                    class="p-2 text-white/70 hover:text-white rounded-xl hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Drawer Content Body (Data Profil Asatidz Lengkap) -->
        <div class="flex-1 overflow-y-auto p-5 space-y-4 text-xs text-slate-700">
            
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

            <!-- Seksi 1: Spesialisasi & Sanad Keilmuan -->
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
                            <span class="text-slate-400 block text-[11px]">Beban Halaqah / Kelas</span>
                            <strong class="text-slate-900 text-xs block mt-0.5" id="detailGuruBeban">-</strong>
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

            <!-- Seksi 3: Berkas Sertifikasi & Dokumen Asatidz -->
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100 flex items-center justify-between">
                    <span>3. Dokumen & Berkas Sertifikasi</span>
                    <span class="text-[11px] font-bold text-emerald-700">Tersertifikasi Resmi</span>
                </h4>
                <div class="grid grid-cols-2 gap-3">
                    <div class="p-3 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <strong class="block text-slate-800 text-xs">Ijazah / Sanad</strong>
                                <span class="text-[10px] text-emerald-600 font-semibold">Tersedia (PDF)</span>
                            </div>
                        </div>
                        <button type="button" onclick="alert('Membuka salinan berkas Sanad / Ijazah pendidik...')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Buka</button>
                    </div>

                    <div class="p-3 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <strong class="block text-slate-800 text-xs">SK Pengangkatan</strong>
                                <span class="text-[10px] text-emerald-600 font-semibold">Aktif 2026/2027</span>
                            </div>
                        </div>
                        <button type="button" onclick="alert('Membuka SK Pengangkatan Tenaga Pendidik...')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Buka</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Drawer Footer (Aksi Kontak & Surat Tugas) -->
        <div class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between gap-2">
            <button type="button" 
                    onclick="closeGuruDrawer()"
                    class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                Tutup Panel
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="printGuruSk()"
                        class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 transition-all flex items-center gap-1.5 shadow-2xs">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    <span>Cetak SK Tugas</span>
                </button>
                <a id="detailGuruWaBtn" href="#" target="_blank"
                   class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C] transition-all flex items-center gap-2 shadow-xs">
                    <svg class="w-4 h-4 text-amber-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                    </svg>
                    <span>Kirim Pesan WhatsApp</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 6. MODAL: TAMBAH ASATIDZ / PENDIDIK BARU -->
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
                        <p class="text-[11px] text-slate-400">Masukkan identitas, bidang keilmuan, sanad hafalan, dan kontak asatidz</p>
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

                <!-- Kelompok 2: Keilmuan & Beban Tugas -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        2. Amanah Struktural, Sanad & Beban Tugas
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Amanah / Jabatan di Pondok *</label>
                            <input type="text" id="addGuruJabatan" placeholder="misal: Pembina Tahfizh & Pengasuh Asrama" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Beban Tugas / Halaqah / Kelas</label>
                            <input type="text" id="addGuruBeban" placeholder="misal: 3 Halaqah Fajar & Maghrib" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="block font-semibold text-slate-700 mb-1">Spesialisasi / Sanad Qira'at / Bidang Studi</label>
                        <input type="text" id="addGuruSpesialisasi" placeholder="misal: Hafizh 30 Juz Bersanad Riwayat Hafs, Pengajar Matan Al-Jazariyah" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                    <div class="mt-3">
                        <label class="block font-semibold text-slate-700 mb-1">Almamater Perguruan Tinggi / Ma'had</label>
                        <input type="text" id="addGuruAlmamater" placeholder="misal: Universitas Al-Azhar Kairo / UIN Alauddin" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                    </div>
                </div>

                <!-- Kelompok 3: Kontak & Domisili -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        3. Kontak Resmi & Domisili
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Resmi *</label>
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
                </div>

            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeAddGuruModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                <button type="button" onclick="saveManualGuru()" class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C]">Simpan Data Asatidz</button>
            </div>
        </div>
    </div>

    <!-- 7. TOAST NOTIFICATION -->
    <div id="guruToast" class="fixed bottom-6 right-6 z-50 bg-[#0B3B2C] text-white px-4 py-3 rounded-2xl shadow-2xl border border-emerald-500/30 flex items-center gap-3 transition-all duration-300 transform translate-y-24 opacity-0 pointer-events-none">
        <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <p class="text-xs font-semibold" id="guruToastMessage">Data Dewan Asatidz berhasil diperbarui!</p>
    </div>

    <x-slot:scripts>
        <script>
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
                
                // Filter Grid Cards
                const cards = document.querySelectorAll('.guru-card');
                let count = 0;

                cards.forEach(card => {
                    const cardGender = card.getAttribute('data-gender') || '';
                    const cardStatus = card.getAttribute('data-status') || '';
                    const searchData = card.getAttribute('data-search') || '';

                    const matchesGender = (currentGuruGender === 'all' || cardGender === currentGuruGender);
                    const matchesStatus = (statusValue === 'all' || cardStatus.includes(statusValue));
                    const matchesSearch = (!searchKeyword || searchData.includes(searchKeyword));

                    if (matchesGender && matchesStatus && matchesSearch) {
                        card.classList.remove('hidden');
                        count++;
                    } else {
                        card.classList.add('hidden');
                    }
                });

                // Filter Table Rows
                const rows = document.querySelectorAll('.guru-table-row');
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
                    } else {
                        row.classList.add('hidden');
                    }
                });

                document.getElementById('filteredGuruCount').innerText = 'Menampilkan total ' + count + ' Dewan Asatidz & Tenaga Pendidik';
            }

            // ====================================================
            // 2. View Switcher (Grid vs Table)
            // ====================================================
            function switchGuruView(viewMode) {
                const gridView = document.getElementById('guruGridView');
                const tableView = document.getElementById('guruTableView');
                const gridBtn = document.getElementById('viewGridBtn');
                const tableBtn = document.getElementById('viewTableBtn');

                if (viewMode === 'grid') {
                    gridView.classList.remove('hidden');
                    tableView.classList.add('hidden');

                    gridBtn.classList.add('bg-white', 'text-slate-900', 'shadow-xs');
                    gridBtn.classList.remove('text-slate-500');
                    tableBtn.classList.remove('bg-white', 'text-slate-900', 'shadow-xs');
                    tableBtn.classList.add('text-slate-500');
                } else {
                    gridView.classList.add('hidden');
                    tableView.classList.remove('hidden');

                    tableBtn.classList.add('bg-white', 'text-slate-900', 'shadow-xs');
                    tableBtn.classList.remove('text-slate-500');
                    gridBtn.classList.remove('bg-white', 'text-slate-900', 'shadow-xs');
                    gridBtn.classList.add('text-slate-500');
                }
            }

            // ====================================================
            // 3. Slide-Over Detail Drawer
            // ====================================================
            let activeDetailGuru = null;

            function openGuruDrawer(guru) {
                activeDetailGuru = guru;
                const isAkhwat = (guru.jenis_kelamin || '').toLowerCase().includes('ustadzah');

                document.getElementById('detailGuruNip').innerText = guru.nip || '-';
                document.getElementById('detailGuruGenderBadge').innerText = isAkhwat ? 'Ustadzah' : 'Ustadz';
                document.getElementById('detailGuruName').innerText = guru.nama;
                
                // Initials
                const cleanName = guru.nama.replace(/Ust\.\s|Ustadzah\s/g, '');
                const names = cleanName.split(' ');
                const initials = names.length > 1 ? (names[0][0] + names[1][0]).toUpperCase() : names[0].substring(0, 2).toUpperCase();
                document.getElementById('detailGuruAvatar').innerText = initials;

                // Jabatan & Status
                document.getElementById('detailGuruJabatan').innerText = guru.jabatan;
                document.getElementById('detailGuruStatus').innerText = guru.status_kepegawaian;
                document.getElementById('detailGuruKategoriLabel').innerText = guru.kategori_label || guru.kategori;

                // Akademik & Sanad
                document.getElementById('detailGuruSpesialisasi').innerText = guru.spesialisasi;
                document.getElementById('detailGuruAlmamater').innerText = guru.almamater;
                document.getElementById('detailGuruBeban').innerText = guru.beban_tugas;
                document.getElementById('detailGuruBergabung').innerText = (guru.tahun_bergabung || 2020) + ' (Pengabdian ' + (2026 - (guru.tahun_bergabung || 2020)) + ' Tahun)';

                // Kontak
                document.getElementById('detailGuruPhone').innerText = guru.no_hp || '-';
                document.getElementById('detailGuruEmail').innerText = guru.email || '-';
                document.getElementById('detailGuruAddress').innerText = guru.alamat || '-';

                // WhatsApp Link
                const phoneOnly = guru.no_hp ? guru.no_hp.replace(/[^0-9]/g, '') : '6281234567801';
                const template = encodeURIComponent("Assalamu'alaikum " + guru.nama + ", kami dari Bagian Administrasi / Kesantrian Pondok Pesantren Tahfizh Baitul Qur'an Camba...");
                document.getElementById('detailGuruWaBtn').href = 'https://wa.me/' + phoneOnly + '?text=' + template;

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

            // ====================================================
            // 4. Modal Add Asatidz
            // ====================================================
            function openAddGuruModal() {
                document.getElementById('addGuruModal').classList.remove('hidden');
            }

            function closeAddGuruModal() {
                document.getElementById('addGuruModal').classList.add('hidden');
            }

            function saveManualGuru() {
                const nama = document.getElementById('addGuruNama').value.trim();
                const jabatan = document.getElementById('addGuruJabatan').value.trim();

                if (!nama) {
                    alert('Mohon isi Nama Lengkap Asatidz.');
                    return;
                }

                closeAddGuruModal();
                showGuruToast('Data pendidik ' + nama + ' berhasil ditambahkan ke database!');
            }

            function printGuruSk() {
                if (!activeDetailGuru) return;
                alert('Mencetak Surat Keputusan (SK) Tugas Mengajar Pesantren untuk: ' + activeDetailGuru.nama);
            }

            function showExportToast() {
                showGuruToast('Mempersiapkan data rekap Excel Dewan Asatidz...');
            }

            function showGuruToast(message) {
                const toast = document.getElementById('guruToast');
                document.getElementById('guruToastMessage').innerText = message;
                toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                }, 3500);
            }
        </script>
    </x-slot:scripts>

</x-layouts.admin>

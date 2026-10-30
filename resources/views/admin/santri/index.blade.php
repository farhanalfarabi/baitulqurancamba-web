<x-layouts.admin
    title="Data Santri Mukim | Admin Baitul Qur'an Camba"
    breadcrumb="Data Santri"
    pageTitle="Database Santri Mukim Aktif">

    <!-- 1. Top KPI Summary Cards (Clean & Dominan Hijau Tua Islami) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <!-- Total Santri -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Santri</span>
                <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block" id="kpiTotalSantri">{{ $santris->total() }}</span>
                <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">Database Induk Pondok</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-forest-50 text-forest-900 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Santri Putra (Ikhwan) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Santri Putra</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1 block" id="kpiTotalPutra">{{ $totalPutra }}</span>
                <span class="text-[11px] text-emerald-600 font-semibold mt-0.5 block">Asrama Putra Camba</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>

        <!-- Santri Putri (Akhwat) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Santri Putri</span>
                <span class="text-2xl sm:text-3xl font-black text-purple-700 mt-1 block" id="kpiTotalPutri">{{ $totalPutri }}</span>
                <span class="text-[11px] text-purple-600 font-semibold mt-0.5 block">Asrama Putri Kampus 2</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Santri Aktif & Status Keaktifan -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Santri Aktif</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1 block" id="kpiTotalAktif">{{ $totalAktif }}</span>
                <span class="text-[11px] text-slate-500 font-semibold mt-0.5 block">
                    {{ $totalIzin }} Izin • {{ $totalAlumni }} Alumni
                </span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- 2. Clean Action, Filter & Search Toolbar -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-subtle space-y-4">
        
        <!-- Header row -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h2 class="text-base font-bold text-slate-900">
                        Database Induk & Profil Santri Mukim
                    </h2>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Tabel ringkas data santri pondok. Klik <strong>"Detail"</strong> untuk melihat biodata lengkap, kartu induk santri, dan dokumen kesiswaan.
                </p>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center gap-2.5">
                <a href="{{ route('admin.santri.export') }}" 
                   title="Unduh Rekap Data Santri (CSV / Excel)"
                   class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 transition-all">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Ekspor Excel</span>
                </a>
                <button type="button" 
                        onclick="openManualAddModal()"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Tambah Santri Baru</span>
                </button>
            </div>
        </div>

        <!-- Filter & Search Controls Row -->
        <div class="pt-3 border-t border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-3">
            
            <div class="flex flex-wrap items-center gap-2">
                <!-- Gender Filter Pills -->
                <div class="inline-flex items-center p-1 bg-slate-100 rounded-xl text-xs">
                    <button type="button" 
                            onclick="filterGender('all', this)"
                            class="gender-filter-btn px-3 py-1 rounded-lg font-bold transition-all bg-white text-slate-900 shadow-xs">
                        Semua
                    </button>
                    <button type="button" 
                            onclick="filterGender('putra', this)"
                            class="gender-filter-btn px-3 py-1 rounded-lg font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Putra
                    </button>
                    <button type="button" 
                            onclick="filterGender('putri', this)"
                            class="gender-filter-btn px-3 py-1 rounded-lg font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Putri
                    </button>
                </div>

                <!-- Jenjang Filter Pills -->
                <div class="flex items-center gap-1 text-xs">
                    <button type="button" 
                            onclick="filterJenjang('all', this)"
                            class="jenjang-filter-btn active px-3 py-1.5 rounded-lg font-bold transition-all bg-[#0B3B2C] text-white shadow-xs">
                        Semua Jenjang
                    </button>
                    <button type="button" 
                            onclick="filterJenjang('mts', this)"
                            class="jenjang-filter-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        MTs
                    </button>
                    <button type="button" 
                            onclick="filterJenjang('ma', this)"
                            class="jenjang-filter-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        MA
                    </button>
                </div>

                <!-- Status Keaktifan Santri Filter Dropdown (Tanpa Mutasi, Cuti Jadi Izin) -->
                <select id="statusFilterSelect" onchange="applySantriFilter()" class="px-3 py-1.5 text-xs rounded-xl border border-slate-200 bg-white text-slate-700 outline-hidden focus:border-forest-500 font-medium">
                    <option value="all">Semua Status Keaktifan</option>
                    <option value="aktif">Aktif</option>
                    <option value="izin">Izin</option>
                    <option value="alumni">Alumni / Lulus</option>
                    <option value="keluar">Non-Aktif / Keluar</option>
                </select>
            </div>

            <!-- Instant Search Box -->
            <div class="relative w-full md:w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" 
                       id="santriSearchInput"
                       onkeyup="applySantriFilter()"
                       placeholder="Cari santri, no. reg/induk, wali..." 
                       class="w-full pl-9 pr-3.5 py-1.5 text-xs bg-slate-50 hover:bg-slate-100 focus:bg-white text-slate-800 rounded-xl border border-slate-200 focus:border-forest-500 focus:ring-1 focus:ring-forest-200 transition-all outline-hidden">
            </div>

        </div>

    </div>

    <!-- 3. Clean Table Card (Data Induk Santri Mukim) -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="santriMainTable">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 text-center w-12">No.</th>
                        <th class="py-3.5 px-5">Data Santri</th>
                        <th class="py-3.5 px-4">Jenjang</th>
                        <th class="py-3.5 px-4">Wali & Kontak</th>
                        <th class="py-3.5 px-4">Status Keaktifan</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs" id="santriTableBody">
                    @forelse($santris as $s)
                        @php
                            $isPutri = strtolower($s->jenis_kelamin) === 'putri';
                        @endphp
                        <tr class="santri-row hover:bg-slate-50/60 transition-colors"
                            id="santri-row-{{ $s->id }}"
                            data-id="{{ $s->id }}"
                            data-gender="{{ $isPutri ? 'putri' : 'putra' }}"
                            data-jenjang="{{ strtolower($s->jenjang) }}"
                            data-status="{{ $s->status_santri }}"
                            data-search="{{ strtolower($s->nama_santri . ' ' . $s->registration_number . ' ' . $s->asal_sekolah . ' ' . $s->nama_ayah . ' ' . $s->tempat_lahir) }}">
                            
                            <!-- 1. Nomor Urut (No.) -->
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                <span class="row-number-badge inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs">
                                    {{ ($santris->firstItem() ?? 1) + $loop->index }}
                                </span>
                            </td>

                            <!-- 2. Data Santri (Nama + Gender + No. Reg/Induk + Asal Sekolah) -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-slate-900 text-sm student-name-col">
                                        {{ $s->nama_santri }}
                                    </p>
                                    @if($isPutri)
                                        <span class="student-gender-badge inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                            Putri
                                        </span>
                                    @else
                                        <span class="student-gender-badge inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                            Putra
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center gap-2 text-[11px] text-slate-400 mt-0.5">
                                    <span class="font-mono text-slate-600 font-semibold student-reg-col">{{ $s->registration_number ?? '-' }}</span>
                                    <span>&bull;</span>
                                    <span class="student-school-col">{{ $s->asal_sekolah ?? '-' }}</span>
                                </div>
                            </td>

                            <!-- 3. Jenjang Pendidikan -->
                            <td class="py-4 px-4 whitespace-nowrap student-jenjang-col">
                                @if(str_contains(strtolower($s->jenjang), 'mts') || str_contains(strtolower($s->jenjang), 'wustha'))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        MTs
                                    </span>
                                @elseif(str_contains(strtolower($s->jenjang), 'ma') || str_contains(strtolower($s->jenjang), 'ulya'))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                        MA
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-800 border border-teal-200">
                                        {{ $s->jenjang }}
                                    </span>
                                @endif
                            </td>

                            <!-- 4. Wali & Kontak Cepat WhatsApp -->
                            <td class="py-4 px-4 whitespace-nowrap student-wali-col">
                                <p class="font-semibold text-slate-800 student-ayah-name">
                                    {{ $s->nama_ayah ?? '-' }}
                                </p>
                                @if($s->no_hp_ayah)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $s->no_hp_ayah) }}" 
                                       target="_blank" 
                                       class="student-ayah-wa inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600 hover:text-emerald-700 hover:underline mt-0.5">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                        </svg>
                                        <span class="student-ayah-phone">{{ $s->no_hp_ayah }}</span>
                                    </a>
                                @else
                                    <span class="text-[11px] text-slate-400">-</span>
                                @endif
                            </td>

                            <!-- 5. Status Keaktifan Santri (Aktif / Izin / Alumni / Keluar - Tanpa Mutasi) -->
                            <td class="py-4 px-4 whitespace-nowrap status-badge-cell">
                                @if($s->status_santri === 'aktif')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                @elseif($s->status_santri === 'izin')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Izin
                                    </span>
                                @elseif($s->status_santri === 'alumni')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                        Alumni / Lulus
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Non-Aktif / Keluar
                                    </span>
                                @endif
                            </td>

                            <!-- 6. Aksi (Detail & Edit Masuk ke Drawer) -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5 justify-end">
                                    <button type="button" 
                                            onclick='openSantriDrawer(@json($s), "detail")'
                                            title="Lihat Detail Kartu Induk Santri"
                                            class="btn-detail-santri table-action-btn inline-flex flex-row items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 border border-forest-200/60 hover:bg-[#0B3B2C] hover:text-white hover:border-[#0B3B2C] transition-all shadow-xs whitespace-nowrap shrink-0 cursor-pointer">
                                        <svg class="w-3.5 h-3.5 shrink-0 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span class="whitespace-nowrap">Detail</span>
                                    </button>
                                    <button type="button" 
                                            onclick='openSantriDrawer(@json($s), "edit")'
                                            title="Edit Data Santri di Drawer"
                                            class="btn-edit-santri table-action-btn inline-flex flex-row items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-forest-50 hover:text-forest-900 border border-slate-200/80 transition-all shadow-xs whitespace-nowrap shrink-0 cursor-pointer">
                                        <svg class="w-3.5 h-3.5 shrink-0 inline-block text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span class="whitespace-nowrap">Edit</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-slate-400">
                                Belum ada data santri mukim yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="p-4 bg-slate-50/50 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-500 gap-3">
            <span id="filteredSantriCount">Menampilkan total {{ $santris->count() }} dari {{ $santris->total() }} santri</span>
            @if($santris->hasPages())
                <div>
                    {{ $santris->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- 4. SLIDE-OVER DRAWER: PUSAT DATA LENGKAP SANTRI & KARTU INDUK -->
    <div id="santriDrawerBackdrop" 
         onclick="closeSantriDrawer()"
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs hidden transition-opacity duration-300"
         aria-hidden="true"></div>

    <div id="santriDrawer" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-y-0 right-0 z-50 w-full max-w-2xl sm:max-w-3xl bg-white shadow-2xl flex flex-col transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header (Hijau Tua Islami & Tab Mode Switcher) -->
        <div class="p-5 sm:p-6 bg-gradient-to-r from-[#0B3B2C] via-[#0E4836] to-[#145742] text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3.5 min-w-0">
                    <!-- Pas Foto Santri di Header -->
                    <div class="relative w-14 h-18 sm:w-16 sm:h-20 rounded-2xl overflow-hidden bg-white/10 border-2 border-amber-400/80 shadow-md shrink-0 flex items-center justify-center group cursor-pointer"
                         title="Pas Foto Santri (Klik untuk perbesar)"
                         onclick="openDocPreview('pas_foto')">
                        <img id="detailHeaderPhoto" 
                             src="" 
                             alt="Pas Foto Santri" 
                             class="w-full h-full object-cover object-top hidden transition-transform duration-300 group-hover:scale-105"
                             onerror="onHeaderPhotoError()" />
                        <div id="detailAvatarFallback" class="text-amber-300 font-black text-xl flex items-center justify-center w-full h-full bg-forest-900/60">
                            ST
                        </div>
                        <span class="absolute bottom-0 inset-x-0 bg-black/60 backdrop-blur-2xs py-0.5 text-[9px] font-bold text-center text-amber-200 tracking-wider">
                            3×4
                        </span>
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-amber-400 text-forest-950 font-mono" id="detailRegNumber">
                                STR-2025-001
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-white/20 text-white" id="detailGenderBadge">
                                Putra
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-emerald-400/25 text-emerald-200 border border-emerald-400/30" id="detailHeaderJenjang">
                                MTs
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-teal-400/25 text-teal-200 border border-teal-400/30" id="detailHeaderAge">
                                -
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold" id="detailHeaderStatus">
                                Aktif
                            </span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold leading-tight truncate text-white" id="detailStudentName">
                            Nama Santri
                        </h3>
                        <p class="text-[11px] text-white/70 truncate mt-0.5" id="detailHeaderAsalSekolah">
                            Asal Sekolah Santri
                        </p>
                    </div>
                </div>
                <button type="button" 
                        onclick="closeSantriDrawer()" 
                        class="p-2 text-white/70 hover:text-white rounded-xl hover:bg-white/10 transition-colors shrink-0 ml-2"
                        title="Tutup Panel">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mode Switcher Tabs (Detail Formulir vs Edit Data Santri) -->
            <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between">
                <div class="inline-flex p-1 bg-black/25 rounded-xl text-xs font-semibold backdrop-blur-xs">
                    <button type="button" 
                            id="tabSantriDetailBtn"
                            onclick="switchSantriDrawerMode('detail')"
                            class="px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all bg-white text-forest-950 font-bold shadow-xs">
                        <svg class="w-3.5 h-3.5 text-forest-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>Kartu Induk Santri</span>
                    </button>
                    <button type="button" 
                            id="tabSantriEditBtn"
                            onclick="switchSantriDrawerMode('edit')"
                            class="px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all text-white/80 hover:text-white font-medium">
                        <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span>Edit Data Santri</span>
                    </button>
                </div>
                <span id="santriDrawerModeBadge" class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 flex items-center gap-1">
                    <span id="santriDrawerModeDot" class="w-1.5 h-1.5 rounded-full bg-emerald-300"></span>
                    <span id="santriDrawerModeBadgeText">Mode Lihat</span>
                </span>
            </div>
        </div>

        <!-- Drawer Content Body (Detail & Edit Views) -->
        <div class="flex-1 overflow-y-auto p-5 text-xs text-slate-700">
            
            <!-- 1. TAMPILAN MODE LIHAT / FORMULIR LENGKAP -->
            <div id="santriDetailView" class="space-y-4">
                
                <!-- Quick Status Keaktifan Update Actions -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Status Keaktifan Santri</span>
                        <div id="detailStatusBadge" class="mt-0.5"></div>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <button type="button" 
                                id="btnQuickAktif"
                                onclick="changeDetailStatus('aktif')"
                                class="px-2.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-all shadow-xs flex items-center gap-1 text-[11px] cursor-pointer"
                                title="Set Status Santri Aktif">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Aktif</span>
                        </button>
                        <button type="button" 
                                id="btnQuickIzin"
                                onclick="changeDetailStatus('izin')"
                                class="px-2.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-bold transition-all shadow-xs text-[11px] cursor-pointer"
                                title="Set Status Izin">
                            Izin
                        </button>
                        <button type="button" 
                                id="btnQuickAlumni"
                                onclick="changeDetailStatus('alumni')"
                                class="px-2.5 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold transition-all shadow-xs text-[11px] cursor-pointer"
                                title="Set Status Alumni / Lulus">
                            Alumni
                        </button>
                        <button type="button" 
                                id="btnQuickKeluar"
                                onclick="changeDetailStatus('keluar')"
                                class="px-2.5 py-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 font-semibold border border-rose-200 transition-all text-[11px] cursor-pointer"
                                title="Set Non-Aktif / Keluar">
                            Keluar
                        </button>
                    </div>
                </div>

                <!-- Bagian 1: Data Pribadi Lengkap Santri -->
                <div class="space-y-2">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                        1. Biodata Pribadi Santri
                    </h4>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Jenjang Pendidikan</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailJenjang">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Status Tinggal</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailLivingWith">-</strong>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2.5 border-t border-slate-200/60">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tempat, Tgl Lahir & Usia</span>
                                <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                                    <strong class="text-slate-900 text-xs leading-snug" id="detailBirth">-</strong>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200" id="detailAgeDisplay">-</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Nomor HP Santri</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 font-mono" id="detailStudentPhone">-</strong>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2.5 border-t border-slate-200/60">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Email Santri</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 truncate" id="detailEmail">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Asal Sekolah</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 truncate" id="detailSchool">-</strong>
                            </div>
                        </div>
                        <div class="pt-2.5 border-t border-slate-200/60">
                            <span class="text-slate-400 block text-[11px]">Alamat Lengkap Domisili Sesuai KK</span>
                            <p class="text-slate-800 leading-relaxed text-xs mt-0.5" id="detailAddress">-</p>
                        </div>
                    </div>
                </div>

                <!-- Bagian 2: Data Keluarga & Kontak WhatsApp Lengkap (Ayah & Ibu) -->
                <div class="space-y-3">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                        2. Data Orang Tua / Wali & Kontak Cepat
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <!-- Kartu Data Ayah -->
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/80 flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase text-emerald-800 tracking-wider">Ayah Kandung</span>
                                <strong class="text-slate-900 block text-xs mt-1" id="detailFatherName">-</strong>
                                <p class="text-[11px] text-slate-500 mt-0.5">Pekerjaan: <span id="detailFatherJob">-</span></p>
                                <p class="text-[11px] text-slate-500">Penghasilan: <span id="detailFatherIncome" class="font-medium text-slate-700">-</span></p>
                                <p class="text-[11px] text-slate-500 mt-1 flex items-center justify-between pt-1 border-t border-slate-100">
                                    <span>No. HP/WA:</span>
                                    <strong class="font-semibold text-slate-900 font-mono text-[11px]" id="detailFatherPhone">-</strong>
                                </p>
                            </div>
                            <div class="mt-3 pt-2 border-t border-slate-200/60">
                                <a id="detailFatherWaBtn" href="#" target="_blank" class="w-full py-1.5 px-3 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold flex items-center justify-center gap-1.5 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                    </svg>
                                    <span>Hubungi WA Ayah</span>
                                </a>
                            </div>
                        </div>

                        <!-- Kartu Data Ibu -->
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/80 flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase text-teal-800 tracking-wider">Ibu Kandung</span>
                                <strong class="text-slate-900 block text-xs mt-1" id="detailMotherName">-</strong>
                                <p class="text-[11px] text-slate-500 mt-0.5">Pekerjaan: <span id="detailMotherJob">-</span></p>
                                <p class="text-[11px] text-slate-500">Penghasilan: <span id="detailMotherIncome" class="font-medium text-slate-700">-</span></p>
                                <p class="text-[11px] text-slate-500 mt-1 flex items-center justify-between pt-1 border-t border-slate-100">
                                    <span>No. HP/WA:</span>
                                    <strong class="font-semibold text-slate-900 font-mono text-[11px]" id="detailMotherPhone">-</strong>
                                </p>
                            </div>
                            <div class="mt-3 pt-2 border-t border-slate-200/60">
                                <a id="detailMotherWaBtn" href="#" target="_blank" class="w-full py-1.5 px-3 rounded-lg bg-teal-600 hover:bg-teal-700 text-white font-bold flex items-center justify-center gap-1.5 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                    </svg>
                                    <span>Hubungi WA Ibu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian 3: Dokumen Berkas yang Diunggah Langsung Diperlihatkan -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between pb-1 border-b border-slate-100">
                        <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px]">
                            3. Arsip Dokumen Berkas Kesiswaan
                        </h4>
                        <span class="text-[10px] text-slate-400">Klik gambar untuk zoom preview</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        
                        <!-- 1. Pas Foto 3x4 (Tampil Langsung) -->
                        <div class="p-3 rounded-xl bg-slate-50/80 border border-slate-200/80 flex flex-col justify-between group hover:border-emerald-300 transition-colors">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[10px] font-bold uppercase text-slate-600 tracking-wider">1. Pas Foto 3x4</span>
                                    <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800" id="detailStatusFoto">Ada</span>
                                </div>
                                <div class="relative w-full h-36 rounded-lg overflow-hidden bg-slate-200/70 border border-slate-300/80 flex items-center justify-center cursor-pointer group-hover:shadow-xs transition-shadow"
                                     onclick="openDocPreview('pas_foto')">
                                    <img id="detailImgPasFoto" src="" alt="Pas Foto" class="w-full h-full object-cover object-top hidden" onerror="onDocImgError(this, 'pas_foto')" />
                                    <div id="detailFallbackPasFoto" class="flex flex-col items-center justify-center p-2 text-center text-slate-400">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <span class="text-[10px] mt-1">Belum Terlampir</span>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-2 pointer-events-none">
                                        <span class="text-[10px] font-bold text-white flex items-center gap-1">
                                            <svg class="w-3 h-3 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                            Perbesar Foto
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between gap-1 text-[11px]">
                                <button type="button" 
                                        onclick="openDocPreview('pas_foto')"
                                        class="px-2.5 py-1 rounded-lg bg-forest-50 hover:bg-forest-100 text-forest-900 font-bold transition-colors">
                                    Pratinjau
                                </button>
                                <a id="detailPasFotoLink" 
                                   href="#" 
                                   target="_blank" 
                                   class="px-2 py-1 text-slate-500 hover:text-slate-800 font-medium transition-colors flex items-center gap-0.5">
                                    <span>Buka File</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        </div>

                        <!-- 2. Kartu Keluarga (Tampil Langsung) -->
                        <div class="p-3 rounded-xl bg-slate-50/80 border border-slate-200/80 flex flex-col justify-between group hover:border-emerald-300 transition-colors">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[10px] font-bold uppercase text-slate-600 tracking-wider">2. Kartu Keluarga</span>
                                    <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800" id="detailStatusKk">Ada</span>
                                </div>
                                <div class="relative w-full h-36 rounded-lg overflow-hidden bg-slate-200/70 border border-slate-300/80 flex items-center justify-center cursor-pointer group-hover:shadow-xs transition-shadow"
                                     onclick="openDocPreview('kk')">
                                    <img id="detailImgKk" src="" alt="Kartu Keluarga" class="w-full h-full object-cover hidden" onerror="onDocImgError(this, 'kk')" />
                                    <div id="detailPdfBoxKk" class="w-full h-full bg-slate-100 p-2 flex flex-col items-center justify-center text-center hidden">
                                        <svg class="w-8 h-8 text-rose-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"></path></svg>
                                        <span class="text-[10px] font-bold text-slate-700 mt-1">Dokumen PDF</span>
                                        <span class="text-[9px] text-slate-400">Klik untuk melihat</span>
                                    </div>
                                    <div id="detailFallbackKk" class="flex flex-col items-center justify-center p-2 text-center text-slate-400">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <span class="text-[10px] mt-1">Belum Terlampir</span>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-2 pointer-events-none">
                                        <span class="text-[10px] font-bold text-white flex items-center gap-1">
                                            <svg class="w-3 h-3 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                            Klik Pratinjau Dokumen
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between gap-1 text-[11px]">
                                <button type="button" 
                                        onclick="openDocPreview('kk')"
                                        class="px-2.5 py-1 rounded-lg bg-forest-50 hover:bg-forest-100 text-forest-900 font-bold transition-colors">
                                    Pratinjau
                                </button>
                                <a id="detailKkLink" 
                                   href="#" 
                                   target="_blank" 
                                   class="px-2 py-1 text-slate-500 hover:text-slate-800 font-medium transition-colors flex items-center gap-0.5">
                                    <span>Buka File</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        </div>

                        <!-- 3. Buku Raport (Tampil Langsung) -->
                        <div class="p-3 rounded-xl bg-slate-50/80 border border-slate-200/80 flex flex-col justify-between group hover:border-emerald-300 transition-colors">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[10px] font-bold uppercase text-slate-600 tracking-wider">3. Rapor / Transkrip</span>
                                    <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800" id="detailStatusRaport">Ada</span>
                                </div>
                                <div class="relative w-full h-36 rounded-lg overflow-hidden bg-slate-200/70 border border-slate-300/80 flex items-center justify-center cursor-pointer group-hover:shadow-xs transition-shadow"
                                     onclick="openDocPreview('raport')">
                                    <img id="detailImgRaport" src="" alt="Rapor" class="w-full h-full object-cover hidden" onerror="onDocImgError(this, 'raport')" />
                                    <div id="detailPdfBoxRaport" class="w-full h-full bg-slate-100 p-2 flex flex-col items-center justify-center text-center hidden">
                                        <svg class="w-8 h-8 text-rose-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"></path></svg>
                                        <span class="text-[10px] font-bold text-slate-700 mt-1">Dokumen PDF</span>
                                        <span class="text-[9px] text-slate-400">Klik untuk melihat</span>
                                    </div>
                                    <div id="detailFallbackRaport" class="flex flex-col items-center justify-center p-2 text-center text-slate-400">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <span class="text-[10px] mt-1">Belum Terlampir</span>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-2 pointer-events-none">
                                        <span class="text-[10px] font-bold text-white flex items-center gap-1">
                                            <svg class="w-3 h-3 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                            Klik Pratinjau Dokumen
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between gap-1 text-[11px]">
                                <button type="button" 
                                        onclick="openDocPreview('raport')"
                                        class="px-2.5 py-1 rounded-lg bg-forest-50 hover:bg-forest-100 text-forest-900 font-bold transition-colors">
                                    Pratinjau
                                </button>
                                <a id="detailRaportLink" 
                                   href="#" 
                                   target="_blank" 
                                   class="px-2 py-1 text-slate-500 hover:text-slate-800 font-medium transition-colors flex items-center gap-0.5">
                                    <span>Buka File</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 2. TAMPILAN MODE EDIT DATA SANTRI (FORM LENGKAP DI DALAM DRAWER) -->
            <div id="santriEditView" class="hidden space-y-4">
                
                <!-- Notice Header Edit Mode -->
                <div class="p-3.5 rounded-xl bg-amber-50/90 border border-amber-200/80 flex items-start gap-3 text-amber-950">
                    <div class="w-7 h-7 rounded-lg bg-amber-200/80 text-amber-800 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h5 class="text-xs font-bold text-amber-950">Edit Data Santri</h5>
                        <p class="text-[11px] text-amber-900/80 mt-0.5 leading-relaxed">
                            Perbarui identitas santri, jenjang pendidikan, status keaktifan, dan kontak orang tua. Klik <strong>Simpan Perubahan</strong> untuk memperbarui data langsung di drawer.
                        </p>
                    </div>
                </div>

                <!-- Kelompok 1: Status Keaktifan Santri & Jenjang (Tanpa Mutasi, Cuti Jadi Izin) -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>1. Status Keaktifan & Program</span>
                    </h5>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Status Keaktifan Santri *</label>
                            <select id="editSantriStatus" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-bold bg-white text-slate-900">
                                <option value="aktif">Aktif (Mukim di Pondok)</option>
                                <option value="izin">Izin (Sakit / Keperluan Keluarga)</option>
                                <option value="alumni">Alumni / Lulus</option>
                                <option value="keluar">Non-Aktif / Keluar</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Jenjang Pendidikan *</label>
                            <select id="editSantriJenjang" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold">
                                <option value="MTs">MTs (Madrasah Tsanawiyah)</option>
                                <option value="MA">MA (Madrasah Aliyah)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 2: Biodata Diri Santri -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>2. Biodata Santri</span>
                    </h5>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div class="sm:col-span-2">
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nama Lengkap Santri *</label>
                            <input type="text" id="editSantriNama" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold text-slate-900">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Jenis Kelamin *</label>
                            <select id="editSantriGender" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold">
                                <option value="Putra">Putra (Ikhwan)</option>
                                <option value="Putri">Putri (Akhwat)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tempat Lahir</label>
                            <input type="text" id="editSantriTempatLahir" placeholder="misal: Makassar / Maros" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tanggal Lahir</label>
                            <input type="date" id="editSantriTglLahir" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Email</label>
                            <input type="email" id="editSantriEmail" placeholder="santri@gmail.com" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nomor HP Santri</label>
                            <input type="text" id="editSantriNoHp" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Status Tinggal</label>
                            <select id="editSantriTinggalBersama" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                                <option value="Asrama Pondok">Asrama Pondok</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Wali">Wali</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Asal Sekolah Sebelumnya</label>
                            <input type="text" id="editSantriAsalSekolah" placeholder="Nama SD / SMP sebelumnya" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Alamat Lengkap Domisili Sesuai KK</label>
                        <textarea id="editSantriAlamat" rows="2" placeholder="Nama jalan, RT/RW, Dusun, Kelurahan, Kecamatan, Kabupaten..." class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white"></textarea>
                    </div>
                </div>

                <!-- Kelompok 3: Data Orang Tua / Wali -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-4">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>3. Data Orang Tua / Wali</span>
                    </h5>

                    <!-- Data Ayah -->
                    <div class="p-3 bg-white rounded-xl border border-slate-200/80 space-y-2.5">
                        <span class="text-[10px] font-bold uppercase text-emerald-800 tracking-wider block">Data Ayah Kandung</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nama Lengkap Ayah *</label>
                                <input type="text" id="editSantriNamaAyah" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">No. WhatsApp Ayah *</label>
                                <input type="text" id="editSantriHpAyah" placeholder="08xxxxxxxxxx" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Pekerjaan Ayah</label>
                                <input type="text" id="editSantriPekerjaanAyah" placeholder="misal: PNS / Wiraswasta" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Penghasilan Ayah</label>
                                <select id="editSantriPenghasilanAyah" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Kurang dari Rp 1.000.000">Kurang dari Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                                    <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                                    <option value="Rp 4.000.000 - Rp 5.000.000">Rp 4.000.000 - Rp 5.000.000</option>
                                    <option value="Rp 5.000.000 ke atas">Rp 5.000.000 ke atas</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="p-3 bg-white rounded-xl border border-slate-200/80 space-y-2.5">
                        <span class="text-[10px] font-bold uppercase text-teal-800 tracking-wider block">Data Ibu Kandung</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nama Lengkap Ibu</label>
                                <input type="text" id="editSantriNamaIbu" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">No. WhatsApp Ibu</label>
                                <input type="text" id="editSantriHpIbu" placeholder="08xxxxxxxxxx" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Pekerjaan Ibu</label>
                                <input type="text" id="editSantriPekerjaanIbu" placeholder="misal: Ibu Rumah Tangga / Guru" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Penghasilan Ibu</label>
                                <select id="editSantriPenghasilanIbu" class="w-full px-3 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                                    <option value="">-- Pilih Penghasilan --</option>
                                    <option value="Tidak Berpenghasilan">Tidak Berpenghasilan / IRT</option>
                                    <option value="Kurang dari Rp 1.000.000">Kurang dari Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                                    <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                                    <option value="Rp 4.000.000 - Rp 5.000.000">Rp 4.000.000 - Rp 5.000.000</option>
                                    <option value="Rp 5.000.000 ke atas">Rp 5.000.000 ke atas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 4: Berkas Dokumen Santri (Lihat & Edit) -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>4. Berkas Dokumen Santri (Ganti File Jika Diperlukan)</span>
                    </h5>

                    <div class="space-y-3 text-xs">
                        <!-- 1. Pas Foto 3x4 (Edit) -->
                        <div class="p-3 bg-white rounded-xl border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-12 rounded-lg bg-slate-100 border border-slate-300 flex items-center justify-center shrink-0 overflow-hidden">
                                    <img id="editThumbnailPasFoto" src="" alt="Thumbnail" class="w-full h-full object-cover hidden">
                                    <svg id="editFallbackIconPasFoto" class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs">Pas Foto Santri (3×4)</span>
                                    <span id="editFileNamePasFoto" class="text-[11px] text-slate-500 block">Belum ada file diunggah</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs cursor-pointer transition-colors flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                    <span>Ganti Foto</span>
                                    <input type="file" id="editFileInputPasFoto" accept="image/*" class="hidden" onchange="previewEditDocFile(this, 'pas_foto')">
                                </label>
                            </div>
                        </div>

                        <!-- 2. Kartu Keluarga (Edit) -->
                        <div class="p-3 bg-white rounded-xl border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-300 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs">Salinan Kartu Keluarga (KK)</span>
                                    <span id="editFileNameKk" class="text-[11px] text-slate-500 block">Belum ada file diunggah</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs cursor-pointer transition-colors flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                    <span>Ganti KK</span>
                                    <input type="file" id="editFileInputKk" accept="image/*,application/pdf" class="hidden" onchange="previewEditDocFile(this, 'kk')">
                                </label>
                            </div>
                        </div>

                        <!-- 3. Buku Rapor (Edit) -->
                        <div class="p-3 bg-white rounded-xl border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-300 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs">Transkrip Nilai / Rapor</span>
                                    <span id="editFileNameRaport" class="text-[11px] text-slate-500 block">Belum ada file diunggah</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs cursor-pointer transition-colors flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                    <span>Ganti Rapor</span>
                                    <input type="file" id="editFileInputRaport" accept="image/*,application/pdf" class="hidden" onchange="previewEditDocFile(this, 'raport')">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- 1. Drawer Footer: Mode Detail -->
        <div id="santriDetailFooter" class="p-4 sm:p-5 bg-slate-50 border-t border-slate-200/80 flex items-center justify-between gap-3">
            <button type="button" 
                    onclick="window.print()" 
                    class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                <span>Cetak / PDF</span>
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="closeSantriDrawer()" 
                        class="px-4 py-2 rounded-xl text-xs font-semibold bg-slate-200 hover:bg-slate-300 text-slate-700 transition-colors">
                    Tutup
                </button>
                <button type="button" 
                        onclick="switchSantriDrawerMode('edit')" 
                        class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit Data Santri</span>
                </button>
            </div>
        </div>

        <!-- 2. Drawer Footer: Mode Edit Data Santri -->
        <div id="santriEditFooter" class="hidden p-4 sm:p-5 bg-slate-50 border-t border-slate-200/80 flex items-center justify-between gap-3">
            <button type="button" 
                    id="btnDeleteSantriFromDrawer"
                    onclick="openDeleteModal()" 
                    class="px-3.5 py-2 rounded-xl text-xs font-bold bg-rose-50 border border-rose-200 text-rose-700 hover:bg-rose-100 transition-colors flex items-center gap-1.5 cursor-pointer">
                <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Hapus Santri</span>
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="switchSantriDrawerMode('detail')" 
                        class="px-4 py-2 rounded-xl text-xs font-semibold bg-slate-200 hover:bg-slate-300 text-slate-700 transition-colors">
                    Batal
                </button>
                <button type="button" 
                        id="btnSaveSantriEdit"
                        onclick="saveEditedSantri()" 
                        class="px-5 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span id="btnSaveSantriEditText">Simpan Perubahan</span>
                </button>
            </div>
        </div>

    </div>

    <!-- 5. MODAL: Pratinjau Dokumen Berkas Lengkap -->
    <div id="docPreviewModal" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-4xl max-h-[90vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-4 bg-[#0B3B2C] text-white flex items-center justify-between">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    <h4 class="font-bold text-sm truncate" id="docPreviewTitle">Pratinjau Dokumen Berkas</h4>
                </div>
                <div class="flex items-center gap-2">
                    <a id="docPreviewExternalLink" href="#" target="_blank" class="px-2.5 py-1 text-xs bg-white/10 hover:bg-white/20 text-white rounded-lg transition-colors flex items-center gap-1">
                        <span>Buka Tab Baru</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                    <button type="button" onclick="closeDocPreview()" class="p-1 text-white/70 hover:text-white rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
            <div class="flex-1 bg-slate-100 p-4 flex items-center justify-center overflow-auto min-h-[400px]">
                <img id="docPreviewImg" src="" alt="Pratinjau Gambar" class="max-w-full max-h-[75vh] object-contain rounded-lg shadow-sm hidden" />
                <iframe id="docPreviewFrame" src="" class="w-full h-[75vh] rounded-lg border border-slate-200 hidden bg-white"></iframe>
                <div id="docPreviewFallback" class="text-center p-8 hidden">
                    <svg class="w-16 h-16 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p class="text-sm font-semibold text-slate-600 mt-2">File Dokumen Belum Diunggah</p>
                    <p class="text-xs text-slate-400 mt-0.5">Santri belum mengunggah salinan berkas ini.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 6. MODAL: Input Santri Baru Manual (Offline / Walk-In) -->
    <div id="manualAddModal" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[92vh] flex flex-col shadow-2xl overflow-hidden border border-slate-200">
            <!-- Modal Header -->
            <div class="p-5 bg-gradient-to-r from-[#0B3B2C] to-[#145742] text-white flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-base">Tambah Santri Baru Manual</h3>
                    <p class="text-xs text-white/70 mt-0.5">Input langsung data santri pondok</p>
                </div>
                <button type="button" onclick="closeManualAddModal()" class="p-1.5 text-white/70 hover:text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Modal Form Body -->
            <form id="manualAddSantriForm" onsubmit="submitManualSantriForm(event)" class="flex-1 overflow-y-auto p-5 text-xs text-slate-700 space-y-4">
                
                <!-- Status Keaktifan & Jenjang -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>1. Status Keaktifan & Jenjang Pendidikan</span>
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Status Keaktifan Santri *</label>
                            <select id="modalAddStatus" name="status_santri" class="w-full px-3 py-2 rounded-xl border border-slate-200 font-bold bg-white outline-hidden focus:border-forest-500 text-xs">
                                <option value="aktif">Aktif (Mukim di Pondok)</option>
                                <option value="izin">Izin (Sakit / Pulang)</option>
                                <option value="alumni">Alumni / Lulus</option>
                                <option value="keluar">Non-Aktif / Keluar</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Jenjang Pendidikan *</label>
                            <select id="modalAddJenjang" name="jenjang" required class="w-full px-3 py-2 rounded-xl border border-slate-200 font-semibold bg-white outline-hidden focus:border-forest-500 text-xs">
                                <option value="MTs">MTs (Madrasah Tsanawiyah)</option>
                                <option value="MA">MA (Madrasah Aliyah)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Biodata Santri -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>2. Biodata Santri</span>
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div class="sm:col-span-2">
                            <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap Santri *</label>
                            <input type="text" name="nama_santri" required placeholder="Nama lengkap santri" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-semibold">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Jenis Kelamin *</label>
                            <select name="jenis_kelamin" required class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-semibold">
                                <option value="Putra">Putra (Ikhwan)</option>
                                <option value="Putri">Putri (Akhwat)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" placeholder="misal: Makassar" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Email</label>
                            <input type="email" name="email" placeholder="santri@gmail.com" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Nomor HP Santri</label>
                            <input type="text" name="no_hp_santri" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Status Tinggal</label>
                            <select name="tinggal_bersama" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                                <option value="Asrama Pondok">Asrama Pondok</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Wali">Wali</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" placeholder="Nama sekolah sebelumnya" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Alamat Lengkap Domisili Sesuai KK</label>
                        <textarea name="alamat_lengkap" rows="2" placeholder="Nama jalan, RT/RW, Dusun, Desa/Kelurahan..." class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs"></textarea>
                    </div>
                </div>

                <!-- Data Orang Tua / Wali -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>3. Data Orang Tua / Wali</span>
                    </h5>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Nama Ayah Kandung *</label>
                            <input type="text" name="nama_ayah" required placeholder="Nama lengkap ayah" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-semibold">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Ayah *</label>
                            <input type="text" name="no_hp_ayah" required placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" placeholder="misal: PNS / Wiraswasta" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Penghasilan Ayah</label>
                            <select name="penghasilan_ayah" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                                <option value="">-- Pilih Penghasilan --</option>
                                <option value="Kurang dari Rp 1.000.000">Kurang dari Rp 1.000.000</option>
                                <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                                <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                                <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                                <option value="Rp 4.000.000 - Rp 5.000.000">Rp 4.000.000 - Rp 5.000.000</option>
                                <option value="Rp 5.000.000 ke atas">Rp 5.000.000 ke atas</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 border-t border-slate-200/60">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Nama Ibu Kandung</label>
                            <input type="text" name="nama_ibu" placeholder="Nama lengkap ibu" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Ibu</label>
                            <input type="text" name="no_hp_ibu" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white outline-hidden focus:border-forest-500 text-xs font-mono">
                        </div>
                    </div>
                </div>

                <!-- Modal Footer Inside Form -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-2">
                    <button type="button" onclick="closeManualAddModal()" class="px-4 py-2 rounded-xl text-xs font-semibold bg-slate-200 hover:bg-slate-300 text-slate-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" id="btnSubmitManualSantri" class="px-5 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                        <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        <span id="btnSubmitManualSantriText">Simpan Data Santri</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 8. Modal: Konfirmasi Hapus Data Santri -->
    <div id="deleteConfirmModal" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md p-5 shadow-2xl border border-slate-200 space-y-4">
            <div class="flex items-start gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-sm text-slate-900">Konfirmasi Hapus Data Santri</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        Apakah Anda yakin ingin menghapus data santri <strong id="deleteSantriName" class="text-slate-800"></strong>? Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
            </div>
            <div class="pt-2 flex items-center justify-end gap-2">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors">
                    Batal
                </button>
                <button type="button" id="btnExecuteDeleteSantri" onclick="executeDeleteSantri()" class="px-4 py-2 rounded-xl text-xs font-bold bg-red-600 hover:bg-red-700 text-white transition-all shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span id="btnExecuteDeleteSantriText">Ya, Hapus Data</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 7. Toast Notification -->
    <div id="santriToast" class="fixed bottom-6 right-6 z-50 bg-[#0B3B2C] text-white px-4 py-3 rounded-2xl shadow-2xl border border-emerald-500/30 flex items-center gap-3 transition-all duration-300 transform translate-y-24 opacity-0 pointer-events-none">
        <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <p class="text-xs font-semibold" id="santriToastMessage">Data santri berhasil diperbarui!</p>
    </div>

    <x-slot:scripts>
        <script>
            // ====================================================
            // 1. Filtering & Search Logic (Client-Side Instant)
            // ====================================================
            let currentSelectedJenjang = 'all';
            let currentSelectedGender = 'all';

            function filterGender(genderKey, btnEl) {
                currentSelectedGender = genderKey;

                document.querySelectorAll('.gender-filter-btn').forEach(b => {
                    b.classList.remove('bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
                    b.classList.add('text-slate-600', 'font-semibold');
                });
                btnEl.classList.add('bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
                btnEl.classList.remove('text-slate-600');

                applySantriFilter();
            }

            function filterJenjang(jenjangKey, btnEl) {
                currentSelectedJenjang = jenjangKey;

                document.querySelectorAll('.jenjang-filter-btn').forEach(b => {
                    b.classList.remove('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                    b.classList.add('text-slate-600', 'font-semibold');
                });
                btnEl.classList.add('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                btnEl.classList.remove('text-slate-600');

                applySantriFilter();
            }

            function applySantriFilter() {
                const searchKeyword = document.getElementById('santriSearchInput').value.toLowerCase().trim();
                const statusValue = document.getElementById('statusFilterSelect').value;
                const rows = document.querySelectorAll('.santri-row');
                let count = 0;

                rows.forEach(row => {
                    const rowGender = row.getAttribute('data-gender') || '';
                    const rowJenjang = row.getAttribute('data-jenjang') || '';
                    const rowStatus = row.getAttribute('data-status') || '';
                    const searchData = row.getAttribute('data-search') || '';

                    const matchesGender = (currentSelectedGender === 'all' || rowGender === currentSelectedGender);
                    const matchesJenjang = (currentSelectedJenjang === 'all' || rowJenjang.includes(currentSelectedJenjang));
                    const matchesStatus = (statusValue === 'all' || rowStatus === statusValue);
                    const matchesSearch = (!searchKeyword || searchData.includes(searchKeyword));

                    if (matchesGender && matchesJenjang && matchesStatus && matchesSearch) {
                        row.classList.remove('hidden');
                        count++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                // Renumber the visible rows sequentially
                let visibleIndex = 1;
                rows.forEach(row => {
                    if (!row.classList.contains('hidden')) {
                        const badge = row.querySelector('.row-number-badge');
                        if (badge) {
                            badge.innerText = visibleIndex++;
                        }
                    }
                });

                document.getElementById('filteredSantriCount').innerText = 'Menampilkan ' + count + ' santri';
            }

            // ====================================================
            // 2. Slide-Over Detail & Edit Drawer
            // ====================================================
            let activeDetailSantri = null;
            let currentDrawerMode = 'detail';

            function escapeHtml(text) {
                if (!text) return '';
                return String(text)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            }

            function openSantriDrawer(santri, mode = 'detail') {
                activeDetailSantri = Object.assign({}, santri);

                // Render detail & edit forms
                renderSantriDetailView(activeDetailSantri);
                populateSantriEditForm(activeDetailSantri);

                // Switch to requested mode ('detail' or 'edit')
                switchSantriDrawerMode(mode);

                // Open drawer with smooth transition
                const backdrop = document.getElementById('santriDrawerBackdrop');
                const drawer = document.getElementById('santriDrawer');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    drawer.classList.remove('translate-x-full');
                }, 10);
            }

            function closeSantriDrawer() {
                const backdrop = document.getElementById('santriDrawerBackdrop');
                const drawer = document.getElementById('santriDrawer');
                drawer.classList.add('translate-x-full');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }

            function switchSantriDrawerMode(mode) {
                currentDrawerMode = mode;
                const tabDetail = document.getElementById('tabSantriDetailBtn');
                const tabEdit = document.getElementById('tabSantriEditBtn');
                const badge = document.getElementById('santriDrawerModeBadge');
                const badgeText = document.getElementById('santriDrawerModeBadgeText');
                const badgeDot = document.getElementById('santriDrawerModeDot');
                const detailView = document.getElementById('santriDetailView');
                const editView = document.getElementById('santriEditView');
                const detailFooter = document.getElementById('santriDetailFooter');
                const editFooter = document.getElementById('santriEditFooter');

                if (mode === 'edit') {
                    // Update tab buttons
                    tabDetail.classList.remove('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabDetail.classList.add('text-white/80', 'font-medium');
                    tabEdit.classList.add('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabEdit.classList.remove('text-white/80', 'font-medium');

                    // Badge text
                    badgeText.innerText = 'Mode Edit';
                    badge.className = 'text-[10px] font-bold px-2.5 py-1 rounded-full bg-amber-400/20 text-amber-200 border border-amber-400/30 flex items-center gap-1';
                    badgeDot.className = 'w-1.5 h-1.5 rounded-full bg-amber-300';

                    // Views
                    detailView.classList.add('hidden');
                    editView.classList.remove('hidden');

                    // Footers
                    detailFooter.classList.add('hidden');
                    editFooter.classList.remove('hidden');
                } else {
                    // Update tab buttons
                    tabEdit.classList.remove('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabEdit.classList.add('text-white/80', 'font-medium');
                    tabDetail.classList.add('bg-white', 'text-forest-950', 'font-bold', 'shadow-xs');
                    tabDetail.classList.remove('text-white/80', 'font-medium');

                    // Badge text
                    badgeText.innerText = 'Mode Lihat';
                    badge.className = 'text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 flex items-center gap-1';
                    badgeDot.className = 'w-1.5 h-1.5 rounded-full bg-emerald-300';

                    // Views
                    editView.classList.add('hidden');
                    detailView.classList.remove('hidden');

                    // Footers
                    editFooter.classList.add('hidden');
                    detailFooter.classList.remove('hidden');
                }
            }

            function getStatusBadgeHtml(status) {
                const s = (status || 'aktif').toLowerCase();
                if (s === 'aktif') {
                    return `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Aktif
                    </span>`;
                } else if (s === 'izin') {
                    return `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                        Izin
                    </span>`;
                } else if (s === 'alumni') {
                    return `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                        Alumni / Lulus
                    </span>`;
                } else {
                    return `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                        Non-Aktif / Keluar
                    </span>`;
                }
            }

            function renderSantriDetailStatusButtons(status) {
                const s = (status || 'aktif').toLowerCase();

                const btnAktif = document.getElementById('btnQuickAktif');
                const btnIzin = document.getElementById('btnQuickIzin');
                const btnAlumni = document.getElementById('btnQuickAlumni');
                const btnKeluar = document.getElementById('btnQuickKeluar');

                if (btnAktif) {
                    if (s === 'aktif') {
                        btnAktif.disabled = true;
                        btnAktif.className = 'px-2.5 py-1.5 rounded-lg bg-emerald-600/40 text-white/70 font-semibold cursor-not-allowed flex items-center gap-1 text-[11px] shadow-none pointer-events-none border border-emerald-500/20';
                        btnAktif.title = 'Santri ini sudah berstatus Aktif';
                    } else {
                        btnAktif.disabled = false;
                        btnAktif.className = 'px-2.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-all shadow-xs flex items-center gap-1 text-[11px] cursor-pointer';
                        btnAktif.title = 'Tandai sebagai Santri Aktif';
                    }
                }

                if (btnIzin) {
                    if (s === 'izin') {
                        btnIzin.disabled = true;
                        btnIzin.className = 'px-2.5 py-1.5 rounded-lg bg-amber-500/40 text-white/70 font-semibold cursor-not-allowed text-[11px] shadow-none pointer-events-none border border-amber-400/20';
                        btnIzin.title = 'Santri ini sedang berstatus Izin';
                    } else {
                        btnIzin.disabled = false;
                        btnIzin.className = 'px-2.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-bold transition-all shadow-xs text-[11px] cursor-pointer';
                        btnIzin.title = 'Tandai santri izin';
                    }
                }

                if (btnAlumni) {
                    if (s === 'alumni') {
                        btnAlumni.disabled = true;
                        btnAlumni.className = 'px-2.5 py-1.5 rounded-lg bg-blue-600/40 text-white/70 font-semibold cursor-not-allowed text-[11px] shadow-none pointer-events-none border border-blue-500/20';
                        btnAlumni.title = 'Santri ini sudah berstatus Alumni / Lulus';
                    } else {
                        btnAlumni.disabled = false;
                        btnAlumni.className = 'px-2.5 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold transition-all shadow-xs text-[11px] cursor-pointer';
                        btnAlumni.title = 'Tandai sebagai Alumni / Lulus';
                    }
                }

                if (btnKeluar) {
                    if (s === 'keluar') {
                        btnKeluar.disabled = true;
                        btnKeluar.className = 'px-2.5 py-1.5 rounded-lg bg-rose-50/50 text-rose-400 font-semibold border border-rose-100 cursor-not-allowed text-[11px] shadow-none pointer-events-none';
                        btnKeluar.title = 'Santri ini sudah berstatus Non-Aktif / Keluar';
                    } else {
                        btnKeluar.disabled = false;
                        btnKeluar.className = 'px-2.5 py-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 font-semibold border border-rose-200 transition-all text-[11px] cursor-pointer';
                        btnKeluar.title = 'Tandai Non-Aktif / Keluar';
                    }
                }
            }

            function renderSantriDetailView(santri) {
                // Header details
                document.getElementById('detailStudentName').innerText = santri.nama_santri || '-';
                document.getElementById('detailRegNumber').innerText = santri.registration_number || '-';
                document.getElementById('detailHeaderJenjang').innerText = santri.jenjang || '-';
                document.getElementById('detailHeaderAsalSekolah').innerText = santri.asal_sekolah || '-';
                document.getElementById('detailGenderBadge').innerText = (santri.jenis_kelamin || 'Putra') === 'Putri' ? 'Putri' : 'Putra';
                
                // Age calculation or fallback
                let ageDisplay = santri.umur ? santri.umur + ' Tahun' : '-';
                document.getElementById('detailHeaderAge').innerText = ageDisplay;
                document.getElementById('detailAgeDisplay').innerText = ageDisplay;

                // Status badge in header & detail
                const statusBadgeHtml = getStatusBadgeHtml(santri.status_santri);
                document.getElementById('detailHeaderStatus').innerHTML = statusBadgeHtml;
                document.getElementById('detailStatusBadge').innerHTML = statusBadgeHtml;

                // Update Quick Status Buttons State (Disable button jika sudah di status tersebut)
                renderSantriDetailStatusButtons(santri.status_santri);

                // Photo handling
                const photoImg = document.getElementById('detailHeaderPhoto');
                const photoFallback = document.getElementById('detailAvatarFallback');
                if (santri.pas_foto_path) {
                    const src = santri.pas_foto_path.startsWith('http') || santri.pas_foto_path.startsWith('/') 
                        ? santri.pas_foto_path 
                        : '/storage/' + santri.pas_foto_path;
                    photoImg.src = src;
                    photoImg.classList.remove('hidden');
                    photoFallback.classList.add('hidden');
                } else {
                    photoImg.classList.add('hidden');
                    photoFallback.classList.remove('hidden');
                    const initials = (santri.nama_santri || 'ST').split(' ').map(n => n[0]).slice(0, 2).join('').toUpperCase();
                    photoFallback.innerText = initials;
                }

                // Bagian 1: Data Pribadi Santri
                document.getElementById('detailJenjang').innerText = santri.jenjang || '-';
                document.getElementById('detailLivingWith').innerText = santri.tinggal_bersama || '-';
                const birthStr = (santri.tempat_lahir || '-') + (santri.tanggal_lahir ? ', ' + santri.tanggal_lahir.substring(0, 10) : '');
                document.getElementById('detailBirth').innerText = birthStr;
                document.getElementById('detailStudentPhone').innerText = santri.no_hp_santri || '-';
                document.getElementById('detailEmail').innerText = santri.email || '-';
                document.getElementById('detailSchool').innerText = santri.asal_sekolah || '-';
                document.getElementById('detailAddress').innerText = santri.alamat_lengkap || '-';

                // Bagian 2: Data Orang Tua
                document.getElementById('detailFatherName').innerText = santri.nama_ayah || '-';
                document.getElementById('detailFatherJob').innerText = santri.pekerjaan_ayah || '-';
                document.getElementById('detailFatherIncome').innerText = santri.penghasilan_ayah || '-';
                document.getElementById('detailFatherPhone').innerText = santri.no_hp_ayah || '-';
                const fatherWaClean = (santri.no_hp_ayah || '').replace(/[^0-9]/g, '');
                document.getElementById('detailFatherWaBtn').href = fatherWaClean ? 'https://wa.me/' + fatherWaClean : '#';

                document.getElementById('detailMotherName').innerText = santri.nama_ibu || '-';
                document.getElementById('detailMotherJob').innerText = santri.pekerjaan_ibu || '-';
                document.getElementById('detailMotherIncome').innerText = santri.penghasilan_ibu || '-';
                document.getElementById('detailMotherPhone').innerText = santri.no_hp_ibu || '-';
                const motherWaClean = (santri.no_hp_ibu || '').replace(/[^0-9]/g, '');
                document.getElementById('detailMotherWaBtn').href = motherWaClean ? 'https://wa.me/' + motherWaClean : '#';

                // Bagian 3: Dokumen Berkas
                setupDocView('pas_foto', santri.pas_foto_path);
                setupDocView('kk', santri.foto_kk_path);
                setupDocView('raport', santri.foto_raport_path);
            }

            function setupDocView(docType, filePath) {
                let imgEl, pdfEl, fallbackEl, linkEl, statusEl;
                if (docType === 'pas_foto') {
                    imgEl = document.getElementById('detailImgPasFoto');
                    fallbackEl = document.getElementById('detailFallbackPasFoto');
                    linkEl = document.getElementById('detailPasFotoLink');
                    statusEl = document.getElementById('detailStatusFoto');
                } else if (docType === 'kk') {
                    imgEl = document.getElementById('detailImgKk');
                    pdfEl = document.getElementById('detailPdfBoxKk');
                    fallbackEl = document.getElementById('detailFallbackKk');
                    linkEl = document.getElementById('detailKkLink');
                    statusEl = document.getElementById('detailStatusKk');
                } else {
                    imgEl = document.getElementById('detailImgRaport');
                    pdfEl = document.getElementById('detailPdfBoxRaport');
                    fallbackEl = document.getElementById('detailFallbackRaport');
                    linkEl = document.getElementById('detailRaportLink');
                    statusEl = document.getElementById('detailStatusRaport');
                }

                if (!filePath) {
                    if (imgEl) imgEl.classList.add('hidden');
                    if (pdfEl) pdfEl.classList.add('hidden');
                    if (fallbackEl) fallbackEl.classList.remove('hidden');
                    if (linkEl) {
                        linkEl.classList.add('pointer-events-none', 'opacity-40');
                        linkEl.href = '#';
                    }
                    if (statusEl) {
                        statusEl.innerText = 'Kosong';
                        statusEl.className = 'text-[10px] font-bold px-1.5 py-0.5 rounded bg-slate-100 text-slate-500';
                    }
                    return;
                }

                const url = filePath.startsWith('http') || filePath.startsWith('/') ? filePath : '/storage/' + filePath;
                const isPdf = filePath.toLowerCase().endsWith('.pdf');

                if (linkEl) {
                    linkEl.classList.remove('pointer-events-none', 'opacity-40');
                    linkEl.href = url;
                }
                if (statusEl) {
                    statusEl.innerText = isPdf ? 'PDF' : 'Gambar';
                    statusEl.className = 'text-[10px] font-bold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800';
                }

                if (isPdf) {
                    if (imgEl) imgEl.classList.add('hidden');
                    if (pdfEl) pdfEl.classList.remove('hidden');
                    if (fallbackEl) fallbackEl.classList.add('hidden');
                } else {
                    if (imgEl) {
                        imgEl.src = url;
                        imgEl.classList.remove('hidden');
                    }
                    if (pdfEl) pdfEl.classList.add('hidden');
                    if (fallbackEl) fallbackEl.classList.add('hidden');
                }
            }

            function onDocImgError(img, docType) {
                img.classList.add('hidden');
                if (docType === 'pas_foto') {
                    document.getElementById('detailFallbackPasFoto').classList.remove('hidden');
                } else if (docType === 'kk') {
                    document.getElementById('detailFallbackKk').classList.remove('hidden');
                } else {
                    document.getElementById('detailFallbackRaport').classList.remove('hidden');
                }
            }

            function onHeaderPhotoError() {
                document.getElementById('detailHeaderPhoto').classList.add('hidden');
                document.getElementById('detailAvatarFallback').classList.remove('hidden');
            }

            // ====================================================
            // 3. Edit Form Population & AJAX Save
            // ====================================================
            function populateSantriEditForm(santri) {
                document.getElementById('editSantriStatus').value = santri.status_santri || 'aktif';
                document.getElementById('editSantriJenjang').value = santri.jenjang || 'MTs';
                document.getElementById('editSantriNama').value = santri.nama_santri || '';
                document.getElementById('editSantriGender').value = santri.jenis_kelamin || 'Putra';
                document.getElementById('editSantriTempatLahir').value = santri.tempat_lahir || '';
                document.getElementById('editSantriTglLahir').value = santri.tanggal_lahir ? santri.tanggal_lahir.substring(0, 10) : '';
                document.getElementById('editSantriEmail').value = santri.email || '';
                document.getElementById('editSantriNoHp').value = santri.no_hp_santri || '';
                document.getElementById('editSantriTinggalBersama').value = santri.tinggal_bersama || 'Asrama Pondok';
                document.getElementById('editSantriAsalSekolah').value = santri.asal_sekolah || '';
                document.getElementById('editSantriAlamat').value = santri.alamat_lengkap || '';

                document.getElementById('editSantriNamaAyah').value = santri.nama_ayah || '';
                document.getElementById('editSantriHpAyah').value = santri.no_hp_ayah || '';
                document.getElementById('editSantriPekerjaanAyah').value = santri.pekerjaan_ayah || '';
                document.getElementById('editSantriPenghasilanAyah').value = santri.penghasilan_ayah || '';

                document.getElementById('editSantriNamaIbu').value = santri.nama_ibu || '';
                document.getElementById('editSantriHpIbu').value = santri.no_hp_ibu || '';
                document.getElementById('editSantriPekerjaanIbu').value = santri.pekerjaan_ibu || '';
                document.getElementById('editSantriPenghasilanIbu').value = santri.penghasilan_ibu || '';

                // Reset file inputs & labels
                document.getElementById('editFileInputPasFoto').value = '';
                document.getElementById('editFileInputKk').value = '';
                document.getElementById('editFileInputRaport').value = '';
                
                document.getElementById('editFileNamePasFoto').innerText = santri.pas_foto_path ? santri.pas_foto_path.split('/').pop() : 'Belum ada file diunggah';
                document.getElementById('editFileNameKk').innerText = santri.foto_kk_path ? santri.foto_kk_path.split('/').pop() : 'Belum ada file diunggah';
                document.getElementById('editFileNameRaport').innerText = santri.foto_raport_path ? santri.foto_raport_path.split('/').pop() : 'Belum ada file diunggah';

                const thumb = document.getElementById('editThumbnailPasFoto');
                const thumbIcon = document.getElementById('editFallbackIconPasFoto');
                if (santri.pas_foto_path && !santri.pas_foto_path.toLowerCase().endsWith('.pdf')) {
                    const url = santri.pas_foto_path.startsWith('http') || santri.pas_foto_path.startsWith('/') ? santri.pas_foto_path : '/storage/' + santri.pas_foto_path;
                    thumb.src = url;
                    thumb.classList.remove('hidden');
                    thumbIcon.classList.add('hidden');
                } else {
                    thumb.classList.add('hidden');
                    thumbIcon.classList.remove('hidden');
                }
            }

            function previewEditDocFile(input, docType) {
                if (!input.files || !input.files[0]) return;
                const file = input.files[0];
                if (docType === 'pas_foto') {
                    document.getElementById('editFileNamePasFoto').innerText = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const thumb = document.getElementById('editThumbnailPasFoto');
                            thumb.src = e.target.result;
                            thumb.classList.remove('hidden');
                            document.getElementById('editFallbackIconPasFoto').classList.add('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                } else if (docType === 'kk') {
                    document.getElementById('editFileNameKk').innerText = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
                } else {
                    document.getElementById('editFileNameRaport').innerText = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
                }
            }

            async function changeDetailStatus(newStatus) {
                if (!activeDetailSantri || !activeDetailSantri.id) return;
                if (activeDetailSantri.status_santri === newStatus) return;
                
                try {
                    const res = await fetch(`/admin/santri/${activeDetailSantri.id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            status_santri: newStatus
                        })
                    });

                    const data = await res.json();
                    if (data.success) {
                        activeDetailSantri.status_santri = newStatus;
                        updateTableRowData(activeDetailSantri);
                        renderSantriDetailView(activeDetailSantri);
                        document.getElementById('editSantriStatus').value = newStatus;
                        showToast(data.message || 'Status santri berhasil diperbarui!');
                    } else {
                        alert(data.message || 'Gagal mengubah status santri');
                    }
                } catch (e) {
                    console.error(e);
                    alert('Terjadi kesalahan koneksi saat memperbarui status santri.');
                }
            }

            async function saveEditedSantri() {
                if (!activeDetailSantri || !activeDetailSantri.id) return;

                const btn = document.getElementById('btnSaveSantriEdit');
                const btnText = document.getElementById('btnSaveSantriEditText');
                btn.disabled = true;
                btnText.innerText = 'Menyimpan...';

                const formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('status_santri', document.getElementById('editSantriStatus').value);
                formData.append('jenjang', document.getElementById('editSantriJenjang').value);
                formData.append('nama_santri', document.getElementById('editSantriNama').value);
                formData.append('jenis_kelamin', document.getElementById('editSantriGender').value);
                formData.append('tempat_lahir', document.getElementById('editSantriTempatLahir').value);
                formData.append('tanggal_lahir', document.getElementById('editSantriTglLahir').value);
                formData.append('email', document.getElementById('editSantriEmail').value);
                formData.append('no_hp_santri', document.getElementById('editSantriNoHp').value);
                formData.append('tinggal_bersama', document.getElementById('editSantriTinggalBersama').value);
                formData.append('asal_sekolah', document.getElementById('editSantriAsalSekolah').value);
                formData.append('alamat_lengkap', document.getElementById('editSantriAlamat').value);

                formData.append('nama_ayah', document.getElementById('editSantriNamaAyah').value);
                formData.append('no_hp_ayah', document.getElementById('editSantriHpAyah').value);
                formData.append('pekerjaan_ayah', document.getElementById('editSantriPekerjaanAyah').value);
                formData.append('penghasilan_ayah', document.getElementById('editSantriPenghasilanAyah').value);

                formData.append('nama_ibu', document.getElementById('editSantriNamaIbu').value);
                formData.append('no_hp_ibu', document.getElementById('editSantriHpIbu').value);
                formData.append('pekerjaan_ibu', document.getElementById('editSantriPekerjaanIbu').value);
                formData.append('penghasilan_ibu', document.getElementById('editSantriPenghasilanIbu').value);

                const pasFotoFile = document.getElementById('editFileInputPasFoto').files[0];
                if (pasFotoFile) formData.append('pas_foto', pasFotoFile);

                const kkFile = document.getElementById('editFileInputKk').files[0];
                if (kkFile) formData.append('foto_kk', kkFile);

                const raportFile = document.getElementById('editFileInputRaport').files[0];
                if (raportFile) formData.append('foto_raport', raportFile);

                try {
                    const res = await fetch(`/admin/santri/${activeDetailSantri.id}`, {
                        method: 'POST', // using POST with _method=PUT for multipart/form-data
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await res.json();
                    if (data.success && data.data) {
                        activeDetailSantri = Object.assign({}, data.data);
                        updateTableRowData(activeDetailSantri);
                        renderSantriDetailView(activeDetailSantri);
                        switchSantriDrawerMode('detail');
                        showToast(data.message || 'Data santri berhasil diperbarui!');
                    } else {
                        alert(data.message || 'Gagal menyimpan perubahan data santri');
                    }
                } catch (e) {
                    console.error(e);
                    alert('Terjadi kesalahan saat menyimpan data santri.');
                } finally {
                    btn.disabled = false;
                    btnText.innerText = 'Simpan Perubahan';
                }
            }

            function updateTableRowData(santri) {
                const row = document.getElementById(`santri-row-${santri.id}`);
                if (!row) return;

                const isPutri = (santri.jenis_kelamin || '').toLowerCase() === 'putri';
                row.setAttribute('data-gender', isPutri ? 'putri' : 'putra');
                row.setAttribute('data-jenjang', (santri.jenjang || '').toLowerCase());
                row.setAttribute('data-status', santri.status_santri || 'aktif');
                row.setAttribute('data-search', [
                    santri.nama_santri,
                    santri.registration_number,
                    santri.asal_sekolah,
                    santri.nama_ayah,
                    santri.tempat_lahir
                ].join(' ').toLowerCase());

                // Update text inside table cells
                const nameCol = row.querySelector('.student-name-col');
                if (nameCol) nameCol.innerText = santri.nama_santri || '';

                const genderBadge = row.querySelector('.student-gender-badge');
                if (genderBadge) {
                    genderBadge.innerText = isPutri ? 'Putri' : 'Putra';
                    genderBadge.className = `student-gender-badge inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold ${isPutri ? 'bg-purple-50 text-purple-700 border border-purple-200' : 'bg-emerald-50 text-emerald-800 border border-emerald-200'}`;
                }

                const schoolCol = row.querySelector('.student-school-col');
                if (schoolCol) schoolCol.innerText = santri.asal_sekolah || '-';

                const regCol = row.querySelector('.student-reg-col');
                if (regCol) regCol.innerText = santri.registration_number || '-';

                const jenjangCol = row.querySelector('.student-jenjang-col');
                if (jenjangCol) {
                    const j = (santri.jenjang || '').toLowerCase();
                    if (j.includes('mts') || j.includes('wustha')) {
                        jenjangCol.innerHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">MTs</span>`;
                    } else if (j.includes('ma') || j.includes('ulya')) {
                        jenjangCol.innerHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">MA</span>`;
                    } else {
                        jenjangCol.innerHTML = `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-800 border border-teal-200">${escapeHtml(santri.jenjang)}</span>`;
                    }
                }

                const ayahName = row.querySelector('.student-ayah-name');
                if (ayahName) ayahName.innerText = santri.nama_ayah || '-';

                const ayahPhone = row.querySelector('.student-ayah-phone');
                if (ayahPhone) ayahPhone.innerText = santri.no_hp_ayah || '';

                const ayahWa = row.querySelector('.student-ayah-wa');
                if (ayahWa && santri.no_hp_ayah) {
                    ayahWa.href = 'https://wa.me/' + santri.no_hp_ayah.replace(/[^0-9]/g, '');
                }

                const statusCell = row.querySelector('.status-badge-cell');
                if (statusCell) {
                    statusCell.innerHTML = getStatusBadgeHtml(santri.status_santri);
                }

                // Update detail & edit button payloads
                const detailBtn = row.querySelector('.btn-detail-santri');
                if (detailBtn) {
                    detailBtn.setAttribute('onclick', `openSantriDrawer(${JSON.stringify(santri)}, "detail")`);
                }
                const editBtn = row.querySelector('.btn-edit-santri');
                if (editBtn) {
                    editBtn.setAttribute('onclick', `openSantriDrawer(${JSON.stringify(santri)}, "edit")`);
                }
            }

            // ====================================================
            // 4. Modal Manual Add New Santri
            // ====================================================
            function openManualAddModal() {
                const modal = document.getElementById('manualAddModal');
                modal.classList.remove('hidden');
                document.getElementById('manualAddSantriForm').reset();
            }

            function closeManualAddModal() {
                document.getElementById('manualAddModal').classList.add('hidden');
            }

            async function submitManualSantriForm(e) {
                e.preventDefault();
                const form = document.getElementById('manualAddSantriForm');
                const btn = document.getElementById('btnSubmitManualSantri');
                const btnText = document.getElementById('btnSubmitManualSantriText');

                btn.disabled = true;
                btnText.innerText = 'Menyimpan...';

                const formData = new FormData(form);

                try {
                    const res = await fetch('{{ route("admin.santri.store") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await res.json();
                    if (data.success) {
                        closeManualAddModal();
                        showToast(data.message || 'Santri baru berhasil ditambahkan!');
                        setTimeout(() => {
                            window.location.reload();
                        }, 800);
                    } else {
                        alert(data.message || 'Gagal menambahkan santri.');
                    }
                } catch (err) {
                    console.error(err);
                    alert('Terjadi kesalahan koneksi saat menyimpan santri baru.');
                } finally {
                    btn.disabled = false;
                    btnText.innerText = 'Simpan Data Santri';
                }
            }

            // ====================================================
            // 5. Modal Delete Confirmation
            // ====================================================
            let santriToDeleteId = null;

            function openDeleteModal() {
                if (!activeDetailSantri || !activeDetailSantri.id) return;
                santriToDeleteId = activeDetailSantri.id;
                document.getElementById('deleteSantriName').innerText = activeDetailSantri.nama_santri || '';
                document.getElementById('deleteConfirmModal').classList.remove('hidden');
            }

            function closeDeleteModal() {
                santriToDeleteId = null;
                document.getElementById('deleteConfirmModal').classList.add('hidden');
            }

            async function executeDeleteSantri() {
                if (!santriToDeleteId) return;

                const btn = document.getElementById('btnExecuteDeleteSantri');
                const btnText = document.getElementById('btnExecuteDeleteSantriText');
                btn.disabled = true;
                btnText.innerText = 'Menghapus...';

                try {
                    const res = await fetch(`/admin/santri/${santriToDeleteId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    });

                    const data = await res.json();
                    if (data.success) {
                        closeDeleteModal();
                        closeSantriDrawer();
                        const row = document.getElementById(`santri-row-${santriToDeleteId}`);
                        if (row) row.remove();
                        showToast(data.message || 'Data santri berhasil dihapus.');
                        setTimeout(() => {
                            window.location.reload();
                        }, 800);
                    } else {
                        alert(data.message || 'Gagal menghapus data santri');
                    }
                } catch (e) {
                    console.error(e);
                    alert('Terjadi kesalahan saat menghapus data santri.');
                } finally {
                    btn.disabled = false;
                    btnText.innerText = 'Ya, Hapus Data';
                }
            }

            // ====================================================
            // 6. Modal Document Full Preview
            // ====================================================
            function openDocPreview(docType) {
                if (!activeDetailSantri) return;
                
                let filePath = null;
                let title = 'Dokumen Santri';

                if (docType === 'pas_foto') {
                    filePath = activeDetailSantri.pas_foto_path;
                    title = 'Pas Foto 3×4 - ' + (activeDetailSantri.nama_santri || '');
                } else if (docType === 'kk') {
                    filePath = activeDetailSantri.foto_kk_path;
                    title = 'Salinan Kartu Keluarga - ' + (activeDetailSantri.nama_santri || '');
                } else if (docType === 'raport') {
                    filePath = activeDetailSantri.foto_raport_path;
                    title = 'Transkrip Nilai / Rapor - ' + (activeDetailSantri.nama_santri || '');
                }

                document.getElementById('docPreviewTitle').innerText = title;
                const modal = document.getElementById('docPreviewModal');
                const imgEl = document.getElementById('docPreviewImg');
                const frameEl = document.getElementById('docPreviewFrame');
                const fallbackEl = document.getElementById('docPreviewFallback');
                const linkEl = document.getElementById('docPreviewExternalLink');

                if (!filePath) {
                    imgEl.classList.add('hidden');
                    frameEl.classList.add('hidden');
                    fallbackEl.classList.remove('hidden');
                    linkEl.classList.add('hidden');
                } else {
                    const url = filePath.startsWith('http') || filePath.startsWith('/') ? filePath : '/storage/' + filePath;
                    linkEl.classList.remove('hidden');
                    linkEl.href = url;
                    fallbackEl.classList.add('hidden');

                    if (filePath.toLowerCase().endsWith('.pdf')) {
                        imgEl.classList.add('hidden');
                        frameEl.classList.remove('hidden');
                        frameEl.src = url;
                    } else {
                        frameEl.classList.add('hidden');
                        imgEl.classList.remove('hidden');
                        imgEl.src = url;
                    }
                }

                modal.classList.remove('hidden');
            }

            function closeDocPreview() {
                const modal = document.getElementById('docPreviewModal');
                modal.classList.add('hidden');
                document.getElementById('docPreviewFrame').src = '';
                document.getElementById('docPreviewImg').src = '';
            }

            // ====================================================
            // 7. Toast Notification Utility
            // ====================================================
            function showToast(message) {
                const toast = document.getElementById('santriToast');
                document.getElementById('santriToastMessage').innerText = message;
                toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                }, 3500);
            }
        </script>
    </x-slot:scripts>
</x-layouts.admin>

<x-layouts.admin
    title="Manajemen Pendaftaran Santri Baru (PSB) | Admin Baitul Qur'an Camba"
    breadcrumb="Pendaftaran Santri"
    pageTitle="Daftar Calon Santri Baru (PSB 2027/2028)">

    <!-- 1. Top KPI Summary Cards (Clean & Dominan Hijau Tua Islami) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <!-- Total Pendaftar -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Pendaftar</span>
                <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block">{{ $pendaftarans->total() }}</span>
                <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">Gelombang I (2027/2028)</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-forest-50 text-forest-900 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Pendaftar Putra (Ikhwan) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Putra (Ikhwan)</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1 block">6</span>
                <span class="text-[11px] text-emerald-600 font-semibold mt-0.5 block">Asrama Putra Camba</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>

        <!-- Pendaftar Putri (Akhwat) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Putri (Akhwat)</span>
                <span class="text-2xl sm:text-3xl font-black text-purple-700 mt-1 block">2</span>
                <span class="text-[11px] text-purple-600 font-semibold mt-0.5 block">Asrama Putri Kampus 2</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Menunggu Verifikasi -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Menunggu Review</span>
                <span class="text-2xl sm:text-3xl font-black text-amber-600 mt-1 block">3</span>
                <span class="text-[11px] text-amber-700 font-semibold mt-0.5 block">Perlu Verifikasi Berkas</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                        Penerimaan Santri Baru (PSB) & Data Pendaftaran
                    </h2>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Tabel ringkas data calon santri. Klik <strong>"Detail"</strong> untuk melihat biodata lengkap, berkas, dan penilaian seleksi.
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
                        onclick="openManualAddModal()"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all shadow-xs">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Tambah Pendaftar</span>
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

                <!-- Status Filter Dropdown -->
                <select id="statusFilterSelect" onchange="applyRegistrationFilter()" class="px-3 py-1.5 text-xs rounded-xl border border-slate-200 bg-white text-slate-700 outline-hidden focus:border-forest-500 font-medium">
                    <option value="all">Semua Status</option>
                    <option value="pending">Menunggu Verifikasi</option>
                    <option value="terverifikasi">Terverifikasi</option>
                    <option value="diterima">Diterima</option>
                    <option value="berkas_belum_lengkap">Berkas Belum Lengkap</option>
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
                       id="pendaftaranSearchInput"
                       onkeyup="applyRegistrationFilter()"
                       placeholder="Cari nama, wali, no reg..." 
                       class="w-full pl-9 pr-3.5 py-1.5 text-xs bg-slate-50 hover:bg-slate-100 focus:bg-white text-slate-800 rounded-xl border border-slate-200 focus:border-forest-500 focus:ring-1 focus:ring-forest-200 transition-all outline-hidden">
            </div>

        </div>

    </div>

    <!-- 3. Clean Table Card (Hanya Data Esensial & Nyaman Dibaca) -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-subtle overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="pendaftaranMainTable">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 text-center w-12">No.</th>
                        <th class="py-3.5 px-5">Calon Santri</th>
                        <th class="py-3.5 px-4">Jenjang</th>
                        <th class="py-3.5 px-4">Wali & Kontak</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs" id="pendaftaranTableBody">
                    @forelse($pendaftarans as $p)
                        @php
                            $isPutri = strtolower($p->jenis_kelamin) === 'putri';
                        @endphp
                        <tr class="pendaftaran-row hover:bg-slate-50/60 transition-colors"
                            id="pendaftaran-row-{{ $p->id }}"
                            data-id="{{ $p->id }}"
                            data-gender="{{ $isPutri ? 'putri' : 'putra' }}"
                            data-jenjang="{{ strtolower($p->jenjang) }}"
                            data-status="{{ $p->status }}"
                            data-search="{{ strtolower($p->nama_santri . ' ' . $p->registration_number . ' ' . $p->asal_sekolah . ' ' . $p->nama_ayah . ' ' . $p->tempat_lahir) }}">
                            
                            <!-- 1. Nomor Urut (No.) -->
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                <span class="row-number-badge inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs">
                                    {{ ($pendaftarans->firstItem() ?? 1) + $loop->index }}
                                </span>
                            </td>

                            <!-- 2. Calon Santri (Nama + Gender + No. Reg) -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-slate-900 text-sm student-name-col">
                                        {{ $p->nama_santri }}
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
                                    <span class="font-mono text-slate-600 font-semibold student-reg-col">{{ $p->registration_number }}</span>
                                    <span>&bull;</span>
                                    <span class="student-school-col">{{ $p->asal_sekolah }}</span>
                                </div>
                            </td>

                            <!-- 3. Jenjang Pilihan -->
                            <td class="py-4 px-4 whitespace-nowrap student-jenjang-col">
                                @if(str_contains(strtolower($p->jenjang), 'mts') || str_contains(strtolower($p->jenjang), 'wustha'))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        MTs
                                    </span>
                                @elseif(str_contains(strtolower($p->jenjang), 'ma') || str_contains(strtolower($p->jenjang), 'ulya'))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                        MA
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-800 border border-teal-200">
                                        {{ $p->jenjang }}
                                    </span>
                                @endif
                            </td>

                            <!-- 4. Wali & Kontak Cepat -->
                            <td class="py-4 px-4 whitespace-nowrap student-wali-col">
                                <p class="font-semibold text-slate-800 student-ayah-name">
                                    {{ $p->nama_ayah }}
                                </p>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->no_hp_ayah) }}" 
                                   target="_blank" 
                                   class="student-ayah-wa inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600 hover:text-emerald-700 hover:underline mt-0.5">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                    </svg>
                                    <span class="student-ayah-phone">{{ $p->no_hp_ayah }}</span>
                                </a>
                            </td>

                            <!-- 5. Status Verifikasi -->
                            <td class="py-4 px-4 whitespace-nowrap status-badge-cell">
                                @if($p->status === 'pending')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Menunggu Verifikasi
                                    </span>
                                @elseif($p->status === 'terverifikasi')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                        Terverifikasi
                                    </span>
                                @elseif($p->status === 'diterima')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Diterima
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Berkas Belum Lengkap
                                    </span>
                                @endif
                            </td>

                            <!-- 6. Aksi (Detail & Edit Masuk ke Drawer) -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5 justify-end">
                                    <button type="button" 
                                            onclick='openPendaftaranDrawer(@json($p), "detail")'
                                            title="Buka Formulir Pendaftaran"
                                            class="btn-detail-pendaftaran inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 hover:bg-[#0B3B2C] hover:text-white transition-all shadow-2xs">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>Detail</span>
                                    </button>
                                    <button type="button" 
                                            onclick='openPendaftaranDrawer(@json($p), "edit")'
                                            title="Edit Data Pendaftar di Drawer"
                                            class="btn-edit-pendaftaran inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-forest-50 hover:text-forest-900 border border-slate-200/80 transition-all shadow-2xs">
                                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-slate-400">
                                Belum ada data calon santri yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="p-4 bg-slate-50/50 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-500 gap-3">
            <span id="filteredStudentCount">Menampilkan total {{ $pendaftarans->count() }} dari {{ $pendaftarans->total() }} calon santri</span>
            @if($pendaftarans->hasPages())
                <div>
                    {{ $pendaftarans->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- 4. SLIDE-OVER DRAWER: PUSAT DATA LENGKAP CALON SANTRI & SELEKSI -->
    <div id="pendaftaranDrawerBackdrop" 
         onclick="closePendaftaranDrawer()"
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs hidden transition-opacity duration-300"
         aria-hidden="true"></div>

    <div id="pendaftaranDrawer" 
         style="margin-top: 0 !important;"
         class="!mt-0 fixed inset-y-0 right-0 z-50 w-full max-w-2xl bg-white shadow-2xl flex flex-col transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header (Hijau Tua Islami & Tab Mode Switcher) -->
        <div class="p-5 sm:p-6 bg-gradient-to-r from-[#0B3B2C] via-[#0E4836] to-[#145742] text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-12 h-12 sm:w-13 sm:h-13 rounded-2xl bg-white/10 text-amber-300 font-black text-xl flex items-center justify-center border border-white/20 shadow-sm shrink-0" id="detailAvatar">
                        FA
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-amber-400 text-forest-950 font-mono" id="detailRegNumber">
                                PSB-2027-001
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-white/20 text-white" id="detailGenderBadge">
                                Putra (Ikhwan)
                            </span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold leading-tight truncate" id="detailStudentName">
                            Muhammad Fatih Azzam
                        </h3>
                    </div>
                </div>
                <button type="button" 
                        onclick="closePendaftaranDrawer()" 
                        class="p-2 text-white/70 hover:text-white rounded-xl hover:bg-white/10 transition-colors shrink-0 ml-2"
                        title="Tutup Panel">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mode Switcher Tabs (Detail Formulir vs Edit Data Pendaftar) -->
            <div class="mt-4 pt-3 border-t border-white/15 flex items-center justify-between gap-2">
                <div class="inline-flex p-1 bg-black/25 rounded-xl text-xs font-semibold backdrop-blur-xs">
                    <button type="button" 
                            id="tabPendaftaranDetailBtn"
                            onclick="switchPendaftaranDrawerMode('detail')"
                            class="px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all bg-white text-forest-950 font-bold shadow-xs">
                        <svg class="w-3.5 h-3.5 text-forest-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>Formulir Calon</span>
                    </button>
                    <button type="button" 
                            id="tabPendaftaranEditBtn"
                            onclick="switchPendaftaranDrawerMode('edit')"
                            class="px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all text-white/80 hover:text-white font-medium">
                        <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span>Edit Data Pendaftar</span>
                    </button>
                </div>
                <span id="pendaftaranDrawerModeBadge" class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 flex items-center gap-1">
                    <span id="pendaftaranDrawerModeDot" class="w-1.5 h-1.5 rounded-full bg-emerald-300"></span>
                    <span id="pendaftaranDrawerModeBadgeText">Mode Lihat</span>
                </span>
            </div>
        </div>

        <!-- Drawer Content Body (Detail & Edit Views) -->
        <div class="flex-1 overflow-y-auto p-5 text-xs text-slate-700">
            
            <!-- 1. TAMPILAN MODE LIHAT / FORMULIR LENGKAP -->
            <div id="pendaftaranDetailView" class="space-y-4">
                
                <!-- Status & Quick Status Update Actions -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Status Verifikasi</span>
                        <div id="detailStatusBadge" class="mt-0.5"></div>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <button type="button" 
                                onclick="changeDetailStatus('terverifikasi')"
                                class="px-2.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-all shadow-xs flex items-center gap-1 text-[11px]">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Verifikasi</span>
                        </button>
                        <button type="button" 
                                onclick="changeDetailStatus('diterima')"
                                class="px-2.5 py-1.5 rounded-lg bg-[#0B3B2C] hover:bg-[#07261C] text-white font-bold transition-all shadow-xs text-[11px]">
                            Terima
                        </button>
                        <button type="button" 
                                onclick="changeDetailStatus('berkas_belum_lengkap')"
                                class="px-2.5 py-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 font-semibold border border-rose-200 transition-all text-[11px]">
                            Pending
                        </button>
                    </div>
                </div>

                <!-- Bagian 1: Data Pribadi Lengkap Calon Santri (Dari Form) -->
                <div class="space-y-2">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                        1. Biodata Calon Santri Baru
                    </h4>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Jenjang Pilihan</span>
                                <strong class="text-slate-900 text-xs" id="detailJenjang">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tinggal Bersama</span>
                                <strong class="text-slate-900 text-xs" id="detailLivingWith">-</strong>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2.5 border-t border-slate-200/60">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tempat, Tgl Lahir & Usia</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 leading-snug" id="detailBirth">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Nomor HP Santri</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailStudentPhone">-</strong>
                            </div>
                        </div>
                        <div class="pt-2.5 border-t border-slate-200/60 grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Email Calon Santri</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 truncate" id="detailEmail">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Asal Sekolah</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailSchool">-</strong>
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
                        2. Data Orang Tua & WhatsApp Panitia
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

                <!-- Bagian 3: Dokumen Berkas yang Diunggah (KK & Rapor) -->
                <div class="space-y-3">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100 flex items-center justify-between">
                        <span>3. Berkas Dokumen Terunggah</span>
                        <span class="text-[11px] font-bold text-emerald-700" id="detailDocBadge">3/3 Berkas Lengkap</span>
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <!-- Pas Foto 3x4 -->
                        <div class="p-3 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <div class="w-9 h-9 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <strong class="block text-slate-800 text-xs truncate">Pas Foto (3x4)</strong>
                                    <span class="text-[10px] text-emerald-600 font-semibold" id="fotoStatusText">Tersedia (JPG)</span>
                                </div>
                            </div>
                            <button type="button" onclick="openDocPreview('Pas Foto Calon Santri (3x4)')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg shrink-0">Buka</button>
                        </div>

                        <!-- Kartu Keluarga -->
                        <div class="p-3 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <strong class="block text-slate-800 text-xs truncate">Kartu Keluarga</strong>
                                    <span class="text-[10px] text-emerald-600 font-semibold" id="kkStatusText">Tersedia (PDF)</span>
                                </div>
                            </div>
                            <button type="button" onclick="openDocPreview('Kartu Keluarga (KK)')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg shrink-0">Buka</button>
                        </div>

                        <!-- Buku Raport -->
                        <div class="p-3 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <div class="w-9 h-9 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <strong class="block text-slate-800 text-xs truncate">Buku Rapor</strong>
                                    <span class="text-[10px] text-emerald-600 font-semibold" id="raportStatusText">Tersedia (PDF)</span>
                                </div>
                            </div>
                            <button type="button" id="raportPreviewBtn" onclick="openDocPreview('Transkrip / Nilai Rapor')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg shrink-0">Buka</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 2. TAMPILAN MODE EDIT DATA PENDAFTAR (FORM LENGKAP DI DALAM DRAWER) -->
            <div id="pendaftaranEditView" class="hidden space-y-4">
                
                <!-- Notice Header Edit Mode -->
                <div class="p-3.5 rounded-xl bg-amber-50/90 border border-amber-200/80 flex items-start gap-3 text-amber-950">
                    <div class="w-7 h-7 rounded-lg bg-amber-200/80 text-amber-800 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h5 class="text-xs font-bold text-amber-950">Form Pengeditan Data Calon Santri</h5>
                        <p class="text-[11px] text-amber-900/80 mt-0.5 leading-relaxed">
                            Perbarui identitas calon santri, jenjang pilihan, status seleksi/verifikasi, dan kontak wali. Klik <strong>Simpan Perubahan</strong> untuk memperbarui data langsung di drawer.
                        </p>
                    </div>
                </div>

                <!-- Kelompok 1: Status Verifikasi & Jenjang Pilihan -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>1. Status Pendaftaran & Program</span>
                    </h5>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Status Verifikasi Seleksi *</label>
                            <select id="editPendaftaranStatus" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-bold bg-white text-slate-900">
                                <option value="pending">Menunggu Verifikasi</option>
                                <option value="terverifikasi">Terverifikasi (Lengkap)</option>
                                <option value="diterima">Diterima Sebagai Santri</option>
                                <option value="berkas_belum_lengkap">Berkas Belum Lengkap</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Jenjang Pendidikan *</label>
                            <select id="editPendaftaranJenjang" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold">
                                <option value="MTs">MTs (Madrasah Tsanawiyah)</option>
                                <option value="MA">MA (Madrasah Aliyah)</option>
                                <option value="Wustha (SMP)">Wustha (SMP)</option>
                                <option value="Ulya (SMA)">Ulya (SMA)</option>
                                <option value="Tahfizh Khusus">Tahfizh Khusus</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 2: Biodata Diri Calon Santri -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>2. Biodata Calon Santri Baru</span>
                    </h5>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div class="sm:col-span-2">
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nama Lengkap Santri *</label>
                            <input type="text" id="editPendaftaranNama" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold text-slate-900">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Jenis Kelamin *</label>
                            <select id="editPendaftaranGender" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold">
                                <option value="Putra">Putra (Ikhwan)</option>
                                <option value="Putri">Putri (Akhwat)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tempat Lahir</label>
                            <input type="text" id="editPendaftaranTempatLahir" placeholder="misal: Makassar / Maros" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tanggal Lahir</label>
                            <input type="date" id="editPendaftaranTglLahir" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nomor HP Santri</label>
                            <input type="text" id="editPendaftaranHp" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Status Tinggal Bersama</label>
                            <select id="editPendaftaranTinggal" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Kakek / Nenek">Kakek / Nenek</option>
                                <option value="Wali / Saudara">Wali / Saudara</option>
                                <option value="Asrama Pondok">Asrama Pondok</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Asal Sekolah SD/MI/SMP/MTs</label>
                        <input type="text" id="editPendaftaranAsalSekolah" placeholder="Nama sekolah asal" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Alamat Lengkap Sesuai KK</label>
                        <textarea id="editPendaftaranAlamat" rows="2" placeholder="Alamat domisili lengkap santri..." class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white resize-none"></textarea>
                    </div>
                </div>

                <!-- Kelompok 3: Data Orang Tua / Wali -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>3. Data Orang Tua / Wali & Kontak WhatsApp</span>
                    </h5>

                    <!-- Data Ayah -->
                    <div class="p-3 bg-white rounded-xl border border-slate-200/80 space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <h6 class="text-[11px] font-bold text-emerald-900 uppercase">Data Ayah Kandung</h6>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Nama Ayah *</label>
                                <input type="text" id="editPendaftaranAyah" placeholder="Nama ayah" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">No. WhatsApp Ayah *</label>
                                <input type="text" id="editPendaftaranHpAyah" placeholder="08xxxxxxxxxx" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Pekerjaan Ayah</label>
                                <input type="text" id="editPendaftaranJobAyah" placeholder="misal: Wiraswasta" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Penghasilan Ayah</label>
                                <select id="editPendaftaranIncomeAyah" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                                    <option value="< Rp 1.000.000">< Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                                    <option value="Rp 3.000.000 - Rp 5.000.000">Rp 3.000.000 - Rp 5.000.000</option>
                                    <option value="Rp 5.000.000 ke atas">Rp 5.000.000 ke atas</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="p-3 bg-white rounded-xl border border-slate-200/80 space-y-2.5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            <h6 class="text-[11px] font-bold text-teal-900 uppercase">Data Ibu Kandung</h6>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Nama Ibu</label>
                                <input type="text" id="editPendaftaranIbu" placeholder="Nama ibu" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">No. WhatsApp Ibu</label>
                                <input type="text" id="editPendaftaranHpIbu" placeholder="08xxxxxxxxxx" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Pekerjaan Ibu</label>
                                <input type="text" id="editPendaftaranJobIbu" placeholder="misal: Ibu Rumah Tangga / Guru" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Penghasilan Ibu</label>
                                <select id="editPendaftaranIncomeIbu" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                                    <option value="< Rp 1.000.000">< Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 2.000.000">Rp 1.000.000 - Rp 2.000.000</option>
                                    <option value="Rp 2.000.000 - Rp 3.000.000">Rp 2.000.000 - Rp 3.000.000</option>
                                    <option value="Rp 3.000.000 - Rp 4.000.000">Rp 3.000.000 - Rp 4.000.000</option>
                                    <option value="Rp 5.000.000 ke atas">Rp 5.000.000 ke atas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 4: Berkas Dokumen PSB -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center justify-between">
                        <span class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                            <span>4. Berkas Digital PSB</span>
                        </span>
                        <span class="text-[10px] text-emerald-700 font-semibold">Tersimpan di Cloud</span>
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3 rounded-xl border border-slate-200 bg-white space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-xs text-slate-800">Kartu Keluarga (KK)</span>
                                <span class="text-[10px] text-emerald-600 font-bold" id="editKkStatusText">PDF / Tersedia</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="openDocPreview('Kartu Keluarga (KK)')" class="px-2.5 py-1 text-[11px] font-semibold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Pratinjau</button>
                                <label class="px-2.5 py-1 text-[11px] font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg cursor-pointer">
                                    <span>Ganti Berkas</span>
                                    <input type="file" accept=".pdf,.jpg,.png" class="hidden" onchange="showPendaftaranToast('File KK baru siap diunggah')">
                                </label>
                            </div>
                        </div>
                        <div class="p-3 rounded-xl border border-slate-200 bg-white space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-xs text-slate-800">Buku Rapor</span>
                                <span class="text-[10px] text-emerald-600 font-bold" id="editRaportStatusText">PDF / Tersedia</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="openDocPreview('Transkrip / Nilai Rapor')" class="px-2.5 py-1 text-[11px] font-semibold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Pratinjau</button>
                                <label class="px-2.5 py-1 text-[11px] font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg cursor-pointer">
                                    <span>Ganti Berkas</span>
                                    <input type="file" accept=".pdf,.jpg,.png" class="hidden" onchange="showPendaftaranToast('File Rapor baru siap diunggah')">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- 1. Drawer Footer: Mode Detail -->
        <div id="pendaftaranDetailFooter" class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between gap-2">
            <button type="button" 
                    onclick="closePendaftaranDrawer()"
                    class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                Tutup Panel
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="switchPendaftaranDrawerMode('edit')"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold bg-amber-500 hover:bg-amber-600 text-white transition-all flex items-center gap-1.5 shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit Data</span>
                </button>
            </div>
        </div>

        <!-- 2. Drawer Footer: Mode Edit Data Pendaftar -->
        <div id="pendaftaranEditFooter" class="p-4 border-t border-slate-200 bg-slate-50 hidden flex items-center justify-between gap-2">
            <button type="button" 
                    onclick="switchPendaftaranDrawerMode('detail')"
                    class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                Kembali ke Pratinjau
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="closePendaftaranDrawer()"
                        class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition-all">
                    Batal
                </button>
                <button type="button" 
                        onclick="saveEditedPendaftaran()"
                        class="px-5 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] hover:bg-[#07261C] text-white transition-all flex items-center gap-2 shadow-xs">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 5. MODAL: Pratinjau Dokumen Berkas -->
    <div id="docPreviewModal" style="margin-top: 0 !important;" class="!mt-0 fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 text-slate-800">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h3 class="text-sm font-bold" id="docPreviewTitle">Pratinjau Dokumen</h3>
                </div>
                <button type="button" onclick="closeDocPreview()" class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="py-6">
                <div class="p-8 rounded-xl bg-slate-50 border-2 border-dashed border-slate-200 text-center space-y-3">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-white shadow-sm border border-slate-200 flex items-center justify-center text-3xl">
                        📄
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900" id="docPreviewDocName">Kartu Keluarga Resmi</h4>
                        <p class="text-xs text-slate-500 mt-1" id="docPreviewStudentName">Muhammad Fatih Azzam</p>
                    </div>
                    <div class="p-3 bg-emerald-50 rounded-lg text-emerald-800 text-[11px] font-semibold">
                        ✓ Berkas terverifikasi diunggah melalui formulir pendaftaran digital
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeDocPreview()" class="px-3.5 py-1.5 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Tutup</button>
                <button type="button" onclick="alert('Mengunduh salinan berkas PDF...'); closeDocPreview();" class="px-4 py-1.5 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C]">Unduh Berkas</button>
            </div>
        </div>
    </div>

    <!-- 6. MODAL: Input Pendaftar Baru Manual (Offline Walk-In) -->
    <div id="manualAddModal" style="margin-top: 0 !important;" class="!mt-0 fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-xl w-full p-6 shadow-2xl border border-slate-100 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">Input Pendaftaran Manual (Offline / Kantor)</h3>
                </div>
                <button type="button" onclick="closeManualAddModal()" class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="py-4 space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap Calon Santri *</label>
                    <input type="text" id="manualNama" placeholder="Contoh: Faris Al-Habsyi" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Jenis Kelamin *</label>
                        <select id="manualGender" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                            <option value="Putra">Putra (Ikhwan)</option>
                            <option value="Putri">Putri (Akhwat)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Jenjang Pilihan *</label>
                        <select id="manualJenjang" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                            <option>Wustha (SMP)</option>
                            <option>Ulya (SMA)</option>
                            <option>Tahfizh Khusus</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Tempat Lahir</label>
                        <input type="text" id="manualTempatLahir" placeholder="misal: Camba / Maros" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Tanggal Lahir</label>
                        <input type="date" id="manualTglLahir" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Nama Ayah *</label>
                        <input type="text" id="manualAyah" placeholder="Nama ayah kandung" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Ayah / Wali *</label>
                        <input type="text" id="manualHpAyah" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Asal Sekolah SD/MI/SMP</label>
                    <input type="text" id="manualAsalSekolah" placeholder="Nama sekolah asal" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500">
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeManualAddModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                <button type="button" onclick="saveManualStudent()" class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C]">Simpan Pendaftar</button>
            </div>
        </div>
    </div>

    <!-- 7. Toast Notification -->
    <div id="pendaftaranToast" class="fixed bottom-6 right-6 z-50 bg-[#0B3B2C] text-white px-4 py-3 rounded-2xl shadow-2xl border border-emerald-500/30 flex items-center gap-3 transition-all duration-300 transform translate-y-24 opacity-0 pointer-events-none">
        <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <p class="text-xs font-semibold" id="pendaftaranToastMessage">Status pendaftar berhasil diperbarui!</p>
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

                applyRegistrationFilter();
            }

            function filterJenjang(jenjangKey, btnEl) {
                currentSelectedJenjang = jenjangKey;

                document.querySelectorAll('.jenjang-filter-btn').forEach(b => {
                    b.classList.remove('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                    b.classList.add('text-slate-600', 'font-semibold');
                });
                btnEl.classList.add('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                btnEl.classList.remove('text-slate-600');

                applyRegistrationFilter();
            }

            function applyRegistrationFilter() {
                const searchKeyword = document.getElementById('pendaftaranSearchInput').value.toLowerCase().trim();
                const statusValue = document.getElementById('statusFilterSelect').value;
                const rows = document.querySelectorAll('.pendaftaran-row');
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

                document.getElementById('filteredStudentCount').innerText = 'Menampilkan ' + count + ' calon santri';
            }

            // ====================================================
            // 2. Slide-Over Detail & Edit Drawer
            // ====================================================
            let activeDetailStudent = null;
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

            function openPendaftaranDrawer(student, mode = 'detail') {
                activeDetailStudent = Object.assign({}, student);

                // Render detail & edit forms
                renderPendaftaranDetailView(activeDetailStudent);
                populatePendaftaranEditForm(activeDetailStudent);

                // Switch to requested mode ('detail' or 'edit')
                switchPendaftaranDrawerMode(mode);

                // Open drawer with smooth transition
                const backdrop = document.getElementById('pendaftaranDrawerBackdrop');
                const drawer = document.getElementById('pendaftaranDrawer');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    drawer.classList.remove('translate-x-full');
                }, 10);
            }

            function closePendaftaranDrawer() {
                const backdrop = document.getElementById('pendaftaranDrawerBackdrop');
                const drawer = document.getElementById('pendaftaranDrawer');
                drawer.classList.add('translate-x-full');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }

            function switchPendaftaranDrawerMode(mode) {
                currentDrawerMode = mode;
                const tabDetail = document.getElementById('tabPendaftaranDetailBtn');
                const tabEdit = document.getElementById('tabPendaftaranEditBtn');
                const badge = document.getElementById('pendaftaranDrawerModeBadge');
                const badgeText = document.getElementById('pendaftaranDrawerModeBadgeText');
                const badgeDot = document.getElementById('pendaftaranDrawerModeDot');
                const detailView = document.getElementById('pendaftaranDetailView');
                const editView = document.getElementById('pendaftaranEditView');
                const detailFooter = document.getElementById('pendaftaranDetailFooter');
                const editFooter = document.getElementById('pendaftaranEditFooter');

                if (mode === 'edit') {
                    // Tab styles
                    tabEdit.className = 'px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all bg-amber-400 text-forest-950 font-bold shadow-xs';
                    tabDetail.className = 'px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all text-white/80 hover:text-white font-medium';
                    
                    // Badge
                    badgeText.innerText = 'Mode Pengeditan';
                    badgeDot.className = 'w-1.5 h-1.5 rounded-full bg-amber-300 animate-pulse';
                    badge.className = 'text-[10px] font-bold px-2.5 py-1 rounded-full bg-amber-400/20 text-amber-200 border border-amber-400/30 flex items-center gap-1';

                    // Views
                    detailView.classList.add('hidden');
                    editView.classList.remove('hidden');
                    detailFooter.classList.add('hidden');
                    editFooter.classList.remove('hidden');

                    if (activeDetailStudent) {
                        populatePendaftaranEditForm(activeDetailStudent);
                    }
                } else {
                    // Tab styles
                    tabDetail.className = 'px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all bg-white text-forest-950 font-bold shadow-xs';
                    tabEdit.className = 'px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all text-white/80 hover:text-white font-medium';
                    
                    // Badge
                    badgeText.innerText = 'Mode Lihat';
                    badgeDot.className = 'w-1.5 h-1.5 rounded-full bg-emerald-300';
                    badge.className = 'text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 flex items-center gap-1';

                    // Views
                    editView.classList.add('hidden');
                    detailView.classList.remove('hidden');
                    editFooter.classList.add('hidden');
                    detailFooter.classList.remove('hidden');

                    if (activeDetailStudent) {
                        renderPendaftaranDetailView(activeDetailStudent);
                    }
                }
            }

            function renderPendaftaranDetailView(student) {
                const isPutri = (student.jenis_kelamin || '').toLowerCase().includes('putri');

                document.getElementById('detailRegNumber').innerText = student.registration_number || 'PSB-2027';
                document.getElementById('detailGenderBadge').innerText = isPutri ? 'Putri (Akhwat)' : 'Putra (Ikhwan)';
                document.getElementById('detailStudentName').innerText = student.nama_santri || '-';
                
                // Initials
                const names = (student.nama_santri || '').trim().split(/\s+/);
                const initials = names.length > 1 ? (names[0][0] + names[1][0]).toUpperCase() : (names[0] || 'SB').substring(0, 2).toUpperCase();
                document.getElementById('detailAvatar').innerText = initials;

                // Birth & Age
                let ageText = '12 Tahun';
                let birthFormatted = '-';
                if (student.tanggal_lahir) {
                    const parts = String(student.tanggal_lahir).split('T')[0].split('-');
                    if (parts.length === 3) {
                        const birthYear = parseInt(parts[0], 10);
                        const birthMonth = parseInt(parts[1], 10) - 1;
                        const birthDay = parseInt(parts[2], 10);
                        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        const monthName = months[birthMonth] || parts[1];
                        
                        const currentYear = 2026;
                        ageText = (currentYear - birthYear) + ' Tahun';
                        birthFormatted = (student.tempat_lahir || '-') + ', ' + birthDay + ' ' + monthName + ' ' + birthYear + ' (' + ageText + ')';
                    } else {
                        birthFormatted = (student.tempat_lahir || '-') + ', ' + student.tanggal_lahir;
                    }
                } else if (student.tempat_lahir) {
                    birthFormatted = student.tempat_lahir;
                }
                const ageEl = document.getElementById('detailAgeDisplay');
                if (ageEl) ageEl.innerText = ageText;
                document.getElementById('detailJenjang').innerText = student.jenjang || '-';
                document.getElementById('detailLivingWith').innerText = student.tinggal_bersama || 'Orang Tua';
                document.getElementById('detailBirth').innerText = birthFormatted;
                document.getElementById('detailStudentPhone').innerText = student.no_hp_santri || '-';
                if (document.getElementById('detailEmail')) {
                    document.getElementById('detailEmail').innerText = student.email || '-';
                }
                document.getElementById('detailSchool').innerText = student.asal_sekolah || '-';
                document.getElementById('detailAddress').innerText = student.alamat_lengkap || '-';

                // Parents
                document.getElementById('detailFatherName').innerText = student.nama_ayah || '-';
                document.getElementById('detailFatherJob').innerText = student.pekerjaan_ayah || '-';
                document.getElementById('detailFatherIncome').innerText = student.penghasilan_ayah || '-';
                document.getElementById('detailFatherPhone').innerText = student.no_hp_ayah || '-';

                document.getElementById('detailMotherName').innerText = student.nama_ibu || '-';
                document.getElementById('detailMotherJob').innerText = student.pekerjaan_ibu || '-';
                document.getElementById('detailMotherIncome').innerText = student.penghasilan_ibu || '-';
                document.getElementById('detailMotherPhone').innerText = student.no_hp_ibu || '-';

                // WhatsApp links with message template
                const fatherPhone = student.no_hp_ayah ? student.no_hp_ayah.replace(/[^0-9]/g, '') : '628114422331';
                const motherPhone = student.no_hp_ibu ? student.no_hp_ibu.replace(/[^0-9]/g, '') : '';

                const templateAyah = encodeURIComponent("Assalamu'alaikum Bpk. " + (student.nama_ayah || '') + ", Panitia PSB Baitul Qur'an Camba mengonfirmasi kelengkapan berkas pendaftaran ananda " + (student.nama_santri || '') + " (" + (student.registration_number || '') + ").");
                document.getElementById('detailFatherWaBtn').href = 'https://wa.me/' + fatherPhone + '?text=' + templateAyah;

                if (motherPhone) {
                    const templateIbu = encodeURIComponent("Assalamu'alaikum Ibu " + (student.nama_ibu || '') + ", Panitia PSB Baitul Qur'an Camba mengonfirmasi kelengkapan berkas ananda " + (student.nama_santri || '') + " (" + (student.registration_number || '') + ").");
                    document.getElementById('detailMotherWaBtn').href = 'https://wa.me/' + motherPhone + '?text=' + templateIbu;
                    document.getElementById('detailMotherWaBtn').classList.remove('hidden');
                } else {
                    document.getElementById('detailMotherWaBtn').classList.add('hidden');
                }

                // Document Status (Pas Foto, KK, Raport)
                const hasFoto = student.pas_foto_path && student.pas_foto_path !== 'missing';
                const hasKk = student.foto_kk_path && student.foto_kk_path !== 'missing';
                const hasRaport = student.foto_raport_path && student.foto_raport_path !== 'missing';

                if (document.getElementById('fotoStatusText')) {
                    document.getElementById('fotoStatusText').innerText = hasFoto ? 'Tersedia (JPG/PNG)' : 'Belum Ada';
                }
                document.getElementById('kkStatusText').innerText = hasKk ? 'Tersedia (PDF/Gambar)' : 'Belum Ada';
                document.getElementById('raportStatusText').innerText = hasRaport ? 'Tersedia (PDF/Gambar)' : 'Belum Diunggah';
                
                let docCount = (hasFoto ? 1 : 0) + (hasKk ? 1 : 0) + (hasRaport ? 1 : 0);
                if (docCount === 3) {
                    document.getElementById('detailDocBadge').innerText = '3/3 Berkas Lengkap';
                    document.getElementById('detailDocBadge').className = 'text-[11px] font-bold text-emerald-700';
                } else {
                    document.getElementById('detailDocBadge').innerText = docCount + '/3 Kurang Lengkap';
                    document.getElementById('detailDocBadge').className = 'text-[11px] font-bold text-rose-600';
                }

                renderPendaftaranDetailStatus(student.status);
            }

            function populatePendaftaranEditForm(student) {
                document.getElementById('editPendaftaranStatus').value = student.status || 'pending';

                // Jenjang dropdown match
                const jenjangVal = student.jenjang || 'Wustha (SMP)';
                const jenjangSelect = document.getElementById('editPendaftaranJenjang');
                let foundJenjang = false;
                for (let i = 0; i < jenjangSelect.options.length; i++) {
                    if (jenjangSelect.options[i].value.toLowerCase() === jenjangVal.toLowerCase() ||
                        jenjangVal.toLowerCase().includes(jenjangSelect.options[i].value.toLowerCase())) {
                        jenjangSelect.selectedIndex = i;
                        foundJenjang = true;
                        break;
                    }
                }
                if (!foundJenjang) {
                    jenjangSelect.value = 'Wustha (SMP)';
                }

                document.getElementById('editPendaftaranNama').value = student.nama_santri || '';
                const isPutri = (student.jenis_kelamin || '').toLowerCase().includes('putri');
                document.getElementById('editPendaftaranGender').value = isPutri ? 'Putri' : 'Putra';

                document.getElementById('editPendaftaranTempatLahir').value = student.tempat_lahir || '';
                document.getElementById('editPendaftaranTglLahir').value = student.tanggal_lahir ? String(student.tanggal_lahir).split('T')[0] : '';
                document.getElementById('editPendaftaranHp').value = student.no_hp_santri || '';
                document.getElementById('editPendaftaranTinggal').value = student.tinggal_bersama || 'Orang Tua';
                document.getElementById('editPendaftaranAsalSekolah').value = student.asal_sekolah || '';
                document.getElementById('editPendaftaranAlamat').value = student.alamat_lengkap || '';

                document.getElementById('editPendaftaranAyah').value = student.nama_ayah || '';
                document.getElementById('editPendaftaranHpAyah').value = student.no_hp_ayah || '';
                document.getElementById('editPendaftaranJobAyah').value = student.pekerjaan_ayah || '';
                if (student.penghasilan_ayah) {
                    document.getElementById('editPendaftaranIncomeAyah').value = student.penghasilan_ayah;
                }

                document.getElementById('editPendaftaranIbu').value = student.nama_ibu || '';
                document.getElementById('editPendaftaranHpIbu').value = student.no_hp_ibu || '';
                document.getElementById('editPendaftaranJobIbu').value = student.pekerjaan_ibu || '';
                if (student.penghasilan_ibu) {
                    document.getElementById('editPendaftaranIncomeIbu').value = student.penghasilan_ibu;
                }
            }

            function renderPendaftaranDetailStatus(status) {
                const container = document.getElementById('detailStatusBadge');
                if (status === 'pending') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200"><span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>Menunggu Verifikasi</span>';
                } else if (status === 'terverifikasi') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200"><span class="w-2 h-2 rounded-full bg-blue-500"></span>Terverifikasi</span>';
                } else if (status === 'diterima') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>Diterima</span>';
                } else {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200"><span class="w-2 h-2 rounded-full bg-rose-500"></span>Berkas Belum Lengkap</span>';
                }
            }

            function changeDetailStatus(newStatus) {
                if (!activeDetailStudent) return;
                activeDetailStudent.status = newStatus;
                renderPendaftaranDetailStatus(newStatus);
                const editStatusSelect = document.getElementById('editPendaftaranStatus');
                if (editStatusSelect) editStatusSelect.value = newStatus;

                // Update Table Row
                const rows = document.querySelectorAll('.pendaftaran-row');
                rows.forEach(r => {
                    if (r.getAttribute('data-search').includes(activeDetailStudent.registration_number.toLowerCase())) {
                        r.setAttribute('data-status', newStatus);
                        const cell = r.querySelector('.status-badge-cell');
                        if (newStatus === 'terverifikasi') {
                            cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Terverifikasi</span>';
                        } else if (newStatus === 'diterima') {
                            cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Diterima</span>';
                        } else if (newStatus === 'berkas_belum_lengkap') {
                            cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Berkas Belum Lengkap</span>';
                        } else if (newStatus === 'pending') {
                            cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200"><span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>Menunggu Verifikasi</span>';
                        }
                    }
                });

                // Server Sync via fetch PUT
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                if (token && activeDetailStudent.id) {
                    fetch('/admin/pendaftaran/' + activeDetailStudent.id, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ status: newStatus })
                    }).catch(err => console.log('Status update sync error:', err));
                }

                showPendaftaranToast('Status ' + activeDetailStudent.nama_santri + ' diubah: ' + newStatus.toUpperCase());
            }

            // ====================================================
            // 3. Save Edited Data (Directly Inside Drawer)
            // ====================================================
            function saveEditedPendaftaran() {
                if (!activeDetailStudent) return;

                const nama = document.getElementById('editPendaftaranNama').value.trim();
                if (!nama) {
                    alert('Mohon isi nama lengkap calon santri.');
                    return;
                }

                const gender = document.getElementById('editPendaftaranGender').value;
                const isPutri = gender.toLowerCase() === 'putri';
                const jenjang = document.getElementById('editPendaftaranJenjang').value;
                const status = document.getElementById('editPendaftaranStatus').value;
                const tempatLahir = document.getElementById('editPendaftaranTempatLahir').value.trim();
                const tglLahir = document.getElementById('editPendaftaranTglLahir').value;
                const asalSekolah = document.getElementById('editPendaftaranAsalSekolah').value.trim();
                const tinggalBersama = document.getElementById('editPendaftaranTinggal').value;
                const noHpSantri = document.getElementById('editPendaftaranHp').value.trim();
                const alamatLengkap = document.getElementById('editPendaftaranAlamat').value.trim();
                const namaAyah = document.getElementById('editPendaftaranAyah').value.trim();
                const noHpAyah = document.getElementById('editPendaftaranHpAyah').value.trim();
                const pekerjaanAyah = document.getElementById('editPendaftaranJobAyah').value.trim();
                const penghasilanAyah = document.getElementById('editPendaftaranIncomeAyah').value;
                const namaIbu = document.getElementById('editPendaftaranIbu').value.trim();
                const noHpIbu = document.getElementById('editPendaftaranHpIbu').value.trim();
                const pekerjaanIbu = document.getElementById('editPendaftaranJobIbu').value.trim();
                const penghasilanIbu = document.getElementById('editPendaftaranIncomeIbu').value;

                const updatedData = {
                    nama_santri: nama,
                    jenis_kelamin: gender,
                    jenjang: jenjang,
                    status: status,
                    tempat_lahir: tempatLahir,
                    tanggal_lahir: tglLahir,
                    asal_sekolah: asalSekolah,
                    tinggal_bersama: tinggalBersama,
                    no_hp_santri: noHpSantri,
                    alamat_lengkap: alamatLengkap,
                    nama_ayah: namaAyah,
                    no_hp_ayah: noHpAyah,
                    pekerjaan_ayah: pekerjaanAyah,
                    penghasilan_ayah: penghasilanAyah,
                    nama_ibu: namaIbu,
                    no_hp_ibu: noHpIbu,
                    pekerjaan_ibu: pekerjaanIbu,
                    penghasilan_ibu: penghasilanIbu,
                };

                // Merge into activeDetailStudent
                Object.assign(activeDetailStudent, updatedData);

                // Update Table Row
                const studentId = activeDetailStudent.id;
                let row = document.getElementById('pendaftaran-row-' + studentId);
                if (!row && activeDetailStudent.registration_number) {
                    row = document.querySelector(`tr[data-search*="${activeDetailStudent.registration_number.toLowerCase()}"]`);
                }

                if (row) {
                    row.setAttribute('data-gender', isPutri ? 'putri' : 'putra');
                    row.setAttribute('data-jenjang', jenjang.toLowerCase());
                    row.setAttribute('data-status', status);
                    row.setAttribute('data-search', (nama + ' ' + (activeDetailStudent.registration_number || '') + ' ' + asalSekolah + ' ' + namaAyah + ' ' + tempatLahir).toLowerCase());

                    // Update Name
                    const nameEl = row.querySelector('.student-name-col');
                    if (nameEl) nameEl.innerText = nama;

                    // Update Gender Badge
                    const genderBadge = row.querySelector('.student-gender-badge');
                    if (genderBadge) {
                        genderBadge.innerText = isPutri ? 'Putri' : 'Putra';
                        if (isPutri) {
                            genderBadge.className = 'student-gender-badge inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200';
                        } else {
                            genderBadge.className = 'student-gender-badge inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200';
                        }
                    }

                    // Update School
                    const schoolEl = row.querySelector('.student-school-col');
                    if (schoolEl) schoolEl.innerText = asalSekolah;

                    // Update Jenjang Cell
                    const jenjangCell = row.querySelector('.student-jenjang-col');
                    if (jenjangCell) {
                        if (jenjang.toLowerCase().includes('mts') || jenjang.toLowerCase().includes('wustha')) {
                            jenjangCell.innerHTML = '<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">MTs</span>';
                        } else if (jenjang.toLowerCase().includes('ma') || jenjang.toLowerCase().includes('ulya')) {
                            jenjangCell.innerHTML = '<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">MA</span>';
                        } else {
                            jenjangCell.innerHTML = '<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-800 border border-teal-200">' + jenjang + '</span>';
                        }
                    }

                    // Update Wali
                    const ayahNameEl = row.querySelector('.student-ayah-name');
                    if (ayahNameEl) ayahNameEl.innerText = namaAyah;
                    const ayahPhoneEl = row.querySelector('.student-ayah-phone');
                    if (ayahPhoneEl) ayahPhoneEl.innerText = noHpAyah;
                    const ayahWaLink = row.querySelector('.student-ayah-wa');
                    if (ayahWaLink) ayahWaLink.href = 'https://wa.me/' + noHpAyah.replace(/[^0-9]/g, '');

                    // Update Status
                    const statusCell = row.querySelector('.status-badge-cell');
                    if (statusCell) {
                        if (status === 'pending') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200"><span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>Menunggu Verifikasi</span>';
                        } else if (status === 'terverifikasi') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Terverifikasi</span>';
                        } else if (status === 'diterima') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Diterima</span>';
                        } else {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Berkas Belum Lengkap</span>';
                        }
                    }

                    // Update onclick buttons with updated student object
                    const copyOfStudent = JSON.parse(JSON.stringify(activeDetailStudent));
                    const btnEdit = row.querySelector('.btn-edit-pendaftaran');
                    if (btnEdit) {
                        btnEdit.onclick = function() { openPendaftaranDrawer(copyOfStudent, 'edit'); };
                    }
                    const btnDetail = row.querySelector('.btn-detail-pendaftaran');
                    if (btnDetail) {
                        btnDetail.onclick = function() { openPendaftaranDrawer(copyOfStudent, 'detail'); };
                    }
                }

                // Server Sync via fetch PUT
                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                if (token && studentId) {
                    fetch('/admin/pendaftaran/' + studentId, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify(updatedData)
                    }).then(res => res.json()).then(res => {
                        console.log('Update success:', res);
                    }).catch(err => {
                        console.log('Update offline/notice:', err);
                    });
                }

                // Refresh Detail View & Switch back to detail view
                renderPendaftaranDetailView(activeDetailStudent);
                switchPendaftaranDrawerMode('detail');

                applyRegistrationFilter();
                showPendaftaranToast('Data calon santri ' + nama + ' berhasil diperbarui di drawer!');
            }

            // ====================================================
            // 4. Document Preview Modal
            // ====================================================
            function openDocPreview(docType) {
                if (!activeDetailStudent) return;
                document.getElementById('docPreviewTitle').innerText = 'Pratinjau Berkas: ' + docType;
                document.getElementById('docPreviewDocName').innerText = docType;
                document.getElementById('docPreviewStudentName').innerText = 'Santri: ' + activeDetailStudent.nama_santri + ' (' + activeDetailStudent.registration_number + ')';
                document.getElementById('docPreviewModal').classList.remove('hidden');
            }

            function closeDocPreview() {
                document.getElementById('docPreviewModal').classList.add('hidden');
            }

            // ====================================================
            // 4. Manual Student Add Modal (Offline)
            // ====================================================
            function openManualAddModal() {
                document.getElementById('manualAddModal').classList.remove('hidden');
            }

            function closeManualAddModal() {
                document.getElementById('manualAddModal').classList.add('hidden');
            }

            function saveManualStudent() {
                const nama = document.getElementById('manualNama').value.trim();
                if (!nama) {
                    alert('Mohon isi nama lengkap calon santri.');
                    return;
                }
                closeManualAddModal();
                showPendaftaranToast('Data santri ' + nama + ' berhasil didaftarkan secara manual!');
            }

            function showExportToast() {
                showPendaftaranToast('Mempersiapkan data rekap Excel calon santri...');
            }

            function showPendaftaranToast(message) {
                const toast = document.getElementById('pendaftaranToast');
                document.getElementById('pendaftaranToastMessage').innerText = message;
                toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                }, 3500);
            }
        </script>
    </x-slot:scripts>

</x-layouts.admin>

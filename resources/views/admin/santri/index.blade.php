<x-layouts.admin
    title="Data Santri Mukim | Admin Baitul Qur'an Camba"
    breadcrumb="Data Santri"
    pageTitle="Database Santri Mukim Aktif">

    <!-- 1. Top KPI Summary Cards (Dominan Hijau Tua Islami & Elegan) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <!-- Total Santri -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Santri</span>
                <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block">{{ $stats['total_santri'] ?? $santris->count() }}</span>
                <span class="text-[11px] text-emerald-700 font-semibold mt-0.5 block">Database Induk Pondok</span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-forest-50 text-forest-900 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Santri Aktif Mukim (Breakdown Putra & Putri) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Santri Aktif</span>
                <span class="text-2xl sm:text-3xl font-black text-emerald-800 mt-1 block">{{ $stats['santri_aktif'] ?? 142 }}</span>
                <span class="text-[11px] text-emerald-600 font-semibold mt-0.5 block">
                    {{ $stats['santri_putra'] ?? 88 }} Putra • {{ $stats['santri_putri'] ?? 54 }} Putri
                </span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Distribusi Jenjang (Wustha & Ulya) -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Jenjang Formal</span>
                <span class="text-2xl sm:text-3xl font-black text-teal-800 mt-1 block">
                    {{ $stats['santri_wustha'] ?? 84 }} <span class="text-xs text-slate-400 font-normal">Wustha</span>
                </span>
                <span class="text-[11px] text-teal-700 font-semibold mt-0.5 block">
                    {{ $stats['santri_ulya'] ?? 58 }} Ulya • {{ $stats['santri_tahfizh_khusus'] ?? 6 }} Khusus
                </span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
        </div>

        <!-- Alumni / Cuti / Transisi -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-subtle flex items-center justify-between group hover:shadow-card transition-all">
            <div>
                <span class="block text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Alumni & Cuti</span>
                <span class="text-2xl sm:text-3xl font-black text-blue-700 mt-1 block">
                    {{ ($stats['santri_alumni'] ?? 4) + ($stats['santri_cuti'] ?? 1) + ($stats['santri_mutasi'] ?? 1) }}
                </span>
                <span class="text-[11px] text-blue-600 font-semibold mt-0.5 block">
                    {{ $stats['santri_alumni'] ?? 4 }} Alumni • {{ $stats['santri_cuti'] ?? 1 }} Cuti • {{ $stats['santri_mutasi'] ?? 1 }} Mutasi
                </span>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
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
                        Database Induk & Profil Santri Mukim
                    </h2>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">
                    Data kesiswaan lengkap santri pondok, wali santri, kamar asrama, capaian tahfizh, dan status santri. Klik <strong>"Detail"</strong> untuk melihat kartu induk.
                </p>
            </div>

            <!-- Action Buttons -->
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
                            class="santri-gender-btn px-3 py-1 rounded-lg font-bold transition-all bg-white text-slate-900 shadow-xs">
                        Semua
                    </button>
                    <button type="button" 
                            onclick="filterGender('putra', this)"
                            class="santri-gender-btn px-3 py-1 rounded-lg font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Putra
                    </button>
                    <button type="button" 
                            onclick="filterGender('putri', this)"
                            class="santri-gender-btn px-3 py-1 rounded-lg font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Putri
                    </button>
                </div>

                <!-- Jenjang Filter Pills -->
                <div class="flex items-center gap-1 text-xs">
                    <button type="button" 
                            onclick="filterJenjang('all', this)"
                            class="santri-jenjang-btn active px-3 py-1.5 rounded-lg font-bold transition-all bg-[#0B3B2C] text-white shadow-xs">
                        Semua Jenjang
                    </button>
                    <button type="button" 
                            onclick="filterJenjang('wustha', this)"
                            class="santri-jenjang-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Wustha (SMP)
                    </button>
                    <button type="button" 
                            onclick="filterJenjang('ulya', this)"
                            class="santri-jenjang-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Ulya (SMA)
                    </button>
                    <button type="button" 
                            onclick="filterJenjang('tahfizh', this)"
                            class="santri-jenjang-btn px-3 py-1.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-100 transition-all">
                        Tahfizh Khusus
                    </button>
                </div>

                <!-- Status Santri Filter Dropdown (Menggantikan Status Pendaftaran) -->
                <select id="statusSantriFilterSelect" onchange="applySantriFilter()" class="px-3 py-1.5 text-xs rounded-xl border border-slate-200 bg-white text-slate-700 outline-hidden focus:border-forest-500 font-medium">
                    <option value="all">Semua Status Santri</option>
                    <option value="aktif">Santri Aktif</option>
                    <option value="alumni">Alumni / Lulus</option>
                    <option value="cuti">Cuti / Sakit</option>
                    <option value="mutasi">Mutasi / Pindah</option>
                    <option value="keluar">Non-Aktif / Keluar</option>
                </select>
            </div>

            <!-- Instant Search Box -->
            <div class="relative w-full md:w-72">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" 
                       id="santriSearchInput"
                       onkeyup="applySantriFilter()"
                       placeholder="Cari santri, NIS, wali, asrama..." 
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
                        <th class="py-3.5 px-4">Jenjang & Kelas</th>
                        <th class="py-3.5 px-4">Wali & Kontak</th>
                        <th class="py-3.5 px-4">Status Santri</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs" id="santriTableBody">
                    @forelse($santris as $s)
                        @php
                            $isPutri = strtolower($s->jenis_kelamin) === 'putri';
                            $status = strtolower($s->status_santri ?? 'aktif');
                        @endphp
                        <tr class="santri-row hover:bg-slate-50/60 transition-colors"
                            data-id="{{ $s->id }}"
                            data-gender="{{ $isPutri ? 'putri' : 'putra' }}"
                            data-jenjang="{{ strtolower($s->jenjang) }}"
                            data-status="{{ $status }}"
                            data-search="{{ strtolower($s->nama_santri . ' ' . $s->nis . ' ' . ($s->nisn ?? '') . ' ' . ($s->kamar_asrama ?? '') . ' ' . ($s->asal_sekolah ?? '') . ' ' . ($s->nama_ayah ?? '') . ' ' . ($s->tempat_lahir ?? '')) }}">
                            
                            <!-- 1. Nomor Urut -->
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                <span class="santri-row-badge inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <!-- 2. Data Santri (Nama + Gender + Asal Sekolah, tanpa tanggal di bawah nama) -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-slate-900 text-sm">
                                        {{ $s->nama_santri }}
                                    </p>
                                    @if($isPutri)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                            Putri
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                            Putra
                                        </span>
                                    @endif
                                </div>
                                <p class="text-[11px] text-slate-500 mt-0.5 truncate max-w-[200px]">
                                    {{ $s->asal_sekolah }}
                                </p>
                            </td>

                            <!-- 3. Jenjang & Kelas (Tanpa Kamar) -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="flex items-center gap-1.5">
                                    @if(str_contains(strtolower($s->jenjang), 'wustha'))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                            Wustha
                                        </span>
                                    @elseif(str_contains(strtolower($s->jenjang), 'ulya'))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-teal-50 text-teal-800 border border-teal-200">
                                            Ulya
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                            Tahfizh Khusus
                                        </span>
                                    @endif
                                    <span class="font-semibold text-slate-700 text-xs">{{ $s->kelas }}</span>
                                </div>
                            </td>

                            <!-- 4. Wali & Kontak Cepat WhatsApp -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <p class="font-semibold text-slate-800">
                                    {{ $s->nama_ayah }}
                                </p>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $s->no_hp_ayah) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600 hover:text-emerald-700 hover:underline mt-0.5">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                    </svg>
                                    <span>{{ $s->no_hp_ayah }}</span>
                                </a>
                            </td>

                            <!-- 5. Status Santri (NO VERIFIKASI - STATUS SANTRI AKTIF/LULUS/CUTI/MUTASI/KELUAR) -->
                            <td class="py-4 px-4 whitespace-nowrap santri-status-cell">
                                @if($status === 'aktif')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                @elseif($status === 'alumni')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                        Alumni / Lulus
                                    </span>
                                @elseif($status === 'cuti')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Cuti / Sakit
                                    </span>
                                @elseif($status === 'mutasi')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-800 border border-purple-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                                        Mutasi / Pindah
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Non-Aktif / Keluar
                                    </span>
                                @endif
                            </td>

                            <!-- 6. Aksi (Detail Kartu Induk & Edit Masuk ke Drawer) -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center justify-end gap-1.5">
                                    <button type="button" 
                                            onclick='openSantriDrawer(@json($s), "detail")'
                                            title="Lihat Detail Kartu Induk Santri"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 hover:bg-[#0B3B2C] hover:text-white transition-all shadow-2xs">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>Detail</span>
                                    </button>
                                    <button type="button" 
                                            onclick='openSantriDrawer(@json($s), "edit")'
                                            title="Edit Data Santri di Drawer"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-amber-50 text-amber-900 border border-amber-200/80 hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all shadow-2xs">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                Belum ada data santri yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="p-4 bg-slate-50/50 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-500 gap-3">
            <span id="filteredSantriCount">Menampilkan total {{ $santris->count() }} santri di database pondok</span>
            <div class="flex items-center gap-2">
                <span class="text-slate-400">Database Santri Baitul Qur'an Camba &bull; TA 2026/2027</span>
            </div>
        </div>
    </div>

    <!-- 4. SLIDE-OVER DRAWER: PUSAT DATA LENGKAP SANTRI (BIODATA, ORANG TUA & STATUS KEAKTIFAN) -->
    <div id="santriDrawerBackdrop" 
         onclick="closeSantriDrawer()"
         class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs hidden transition-opacity duration-300"
         aria-hidden="true"></div>

    <div id="santriDrawer" 
         class="fixed inset-y-0 right-0 z-50 w-full max-w-2xl bg-white shadow-2xl flex flex-col transition-transform duration-300 ease-in-out translate-x-full">
        
        <!-- Drawer Header (Hijau Tua Islami & Tab Mode Edit) -->
        <div class="p-5 sm:p-6 bg-gradient-to-r from-[#0B3B2C] via-[#0E4836] to-[#145742] text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-12 h-12 sm:w-13 sm:h-13 rounded-2xl bg-white/10 text-amber-300 font-black text-xl flex items-center justify-center border border-white/20 shadow-sm shrink-0" id="detailSantriAvatar">
                        AD
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-amber-400 text-forest-950 font-mono" id="detailSantriNis">
                                2024.08.012
                            </span>
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold bg-white/20 text-white" id="detailSantriGenderBadge">
                                Putra (Ikhwan)
                            </span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold leading-tight truncate" id="detailSantriName">
                            Abdullah Dzaki M.
                        </h3>
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

            <!-- Mode Switcher Tabs (Detail vs Edit) -->
            <div class="mt-4 pt-3 border-t border-white/15 flex items-center justify-between gap-2">
                <div class="inline-flex p-1 bg-black/25 rounded-xl text-xs font-semibold backdrop-blur-xs">
                    <button type="button" 
                            id="tabSantriDetailBtn"
                            onclick="switchSantriDrawerMode('detail')"
                            class="px-3 sm:px-3.5 py-1.5 rounded-lg flex items-center gap-1.5 transition-all bg-white text-forest-950 font-bold shadow-xs">
                        <svg class="w-3.5 h-3.5 text-forest-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>Kartu Induk</span>
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
                <span id="drawerModeBadge" class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-400/20 text-emerald-200 border border-emerald-400/30 flex items-center gap-1">
                    <span id="drawerModeDot" class="w-1.5 h-1.5 rounded-full bg-emerald-300"></span>
                    <span id="drawerModeBadgeText">Mode Lihat</span>
                </span>
            </div>
        </div>

        <!-- Drawer Content Body (Data Lengkap Santri) -->
        <div class="flex-1 overflow-y-auto p-5 text-xs text-slate-700">
            
            <!-- 1. TAMPILAN MODE LIHAT / DETAIL KARTU INDUK -->
            <div id="santriDetailView" class="space-y-4">
                <!-- Panel Pengaturan Status Santri (Quick Update Status Keaktifan) -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2.5">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider">Status Keaktifan Santri</span>
                            <div id="detailSantriStatusBadge" class="mt-0.5"></div>
                        </div>
                        <span class="text-[11px] text-slate-400 italic">Pilih untuk memperbarui:</span>
                    </div>
                    
                    <!-- Quick Status Switch Buttons -->
                    <div class="grid grid-cols-5 gap-1.5 pt-2 border-t border-slate-200/60">
                        <button type="button" 
                                onclick="changeSantriStatus('aktif')"
                                title="Santri Aktif Belajar & Mukim"
                                class="px-2 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition-all text-center text-[10px]">
                            Aktif
                        </button>
                        <button type="button" 
                                onclick="changeSantriStatus('alumni')"
                                title="Telah Lulus / Khatam 30 Juz"
                                class="px-2 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold transition-all text-center text-[10px]">
                            Lulus
                        </button>
                        <button type="button" 
                                onclick="changeSantriStatus('cuti')"
                                title="Cuti / Izin Pulang Medis"
                                class="px-2 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-bold transition-all text-center text-[10px]">
                            Cuti
                        </button>
                        <button type="button" 
                                onclick="changeSantriStatus('mutasi')"
                                title="Pindah ke Sekolah / Pondok Lain"
                                class="px-2 py-1.5 rounded-lg bg-purple-600 hover:bg-purple-700 text-white font-bold transition-all text-center text-[10px]">
                            Mutasi
                        </button>
                        <button type="button" 
                                onclick="changeSantriStatus('keluar')"
                                title="Mengundurkan Diri / Berhenti"
                                class="px-2 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold transition-all text-center text-[10px]">
                            Keluar
                        </button>
                    </div>
                </div>

                <!-- Seksi 1: Data Kepesantrenan & Akademik -->
                <div class="space-y-2">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100 flex items-center justify-between">
                        <span>1. Data Akademik & Asrama Santri</span>
                        <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-md" id="detailSantriClassBadge">Kelas 8</span>
                    </h4>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Jenjang & Kelas</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailSantriJenjang">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Kamar Asrama Mukim</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailSantriAsrama">-</strong>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2.5 border-t border-slate-200/60">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Capaian Hafalan Mutqin</span>
                                <strong class="text-emerald-800 text-xs block mt-0.5 font-bold" id="detailSantriHafalan">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Pembina Halaqah Tahfizh</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailSantriHalaqah">-</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seksi 2: Biodata Santri Lengkap (Sama Persis dengan Form Pendaftaran) -->
                <div class="space-y-2">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                        2. Biodata Pribadi Santri
                    </h4>
                    <div class="bg-slate-50/70 p-3.5 rounded-xl border border-slate-100 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tempat, Tgl Lahir & Usia</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 leading-snug" id="detailSantriBirth">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Nomor HP Santri</span>
                                <strong class="text-slate-900 text-xs block mt-0.5 font-mono" id="detailSantriPhone">-</strong>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-2.5 border-t border-slate-200/60">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Asal Sekolah SD/MI/SMP</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailSantriSchool">-</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Status Tinggal</span>
                                <strong class="text-slate-900 text-xs block mt-0.5" id="detailSantriLivingWith">-</strong>
                            </div>
                        </div>
                        <div class="pt-2.5 border-t border-slate-200/60">
                            <span class="text-slate-400 block text-[11px]">Alamat Lengkap Domisili Sesuai KK</span>
                            <p class="text-slate-800 leading-relaxed text-xs mt-0.5" id="detailSantriAddress">-</p>
                        </div>
                    </div>
                </div>

                <!-- Seksi 3: Data Orang Tua / Wali & WhatsApp Cepat -->
                <div class="space-y-3">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100">
                        3. Data Orang Tua & WhatsApp Panitia Pondok
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <!-- Kartu Ayah -->
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/80 flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase text-emerald-800 tracking-wider">Ayah Kandung</span>
                                <strong class="text-slate-900 block text-xs mt-1" id="detailSantriFatherName">-</strong>
                                <p class="text-[11px] text-slate-500 mt-0.5">Pekerjaan: <span id="detailSantriFatherJob">-</span></p>
                                <p class="text-[11px] text-slate-500">Penghasilan: <span id="detailSantriFatherIncome" class="font-medium text-slate-700">-</span></p>
                                <p class="text-[11px] text-slate-500 mt-1 flex items-center justify-between pt-1 border-t border-slate-100">
                                    <span>No. HP/WA:</span>
                                    <strong class="font-semibold text-slate-900 font-mono text-[11px]" id="detailSantriFatherPhone">-</strong>
                                </p>
                            </div>
                            <div class="mt-3 pt-2 border-t border-slate-200/60">
                                <a id="detailSantriFatherWaBtn" href="#" target="_blank" class="w-full py-1.5 px-3 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold flex items-center justify-center gap-1.5 transition-colors">
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
                                <strong class="text-slate-900 block text-xs mt-1" id="detailSantriMotherName">-</strong>
                                <p class="text-[11px] text-slate-500 mt-0.5">Pekerjaan: <span id="detailSantriMotherJob">-</span></p>
                                <p class="text-[11px] text-slate-500">Penghasilan: <span id="detailSantriMotherIncome" class="font-medium text-slate-700">-</span></p>
                                <p class="text-[11px] text-slate-500 mt-1 flex items-center justify-between pt-1 border-t border-slate-100">
                                    <span>No. HP/WA:</span>
                                    <strong class="font-semibold text-slate-900 font-mono text-[11px]" id="detailSantriMotherPhone">-</strong>
                                </p>
                            </div>
                            <div class="mt-3 pt-2 border-t border-slate-200/60">
                                <a id="detailSantriMotherWaBtn" href="#" target="_blank" class="w-full py-1.5 px-3 rounded-lg bg-teal-600 hover:bg-teal-700 text-white font-bold flex items-center justify-center gap-1.5 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                    </svg>
                                    <span>Hubungi WA Ibu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seksi 4: Berkas Arsip Santri Terlampir (KK & Rapor/Ijazah) -->
                <div class="space-y-3">
                    <h4 class="font-bold text-slate-900 uppercase tracking-wider text-[11px] pb-1 border-b border-slate-100 flex items-center justify-between">
                        <span>4. Berkas Arsip Digital Kesiswaan</span>
                        <span class="text-[11px] font-bold text-emerald-700">Tersimpan di Cloud</span>
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
                                    <strong class="block text-slate-800 text-xs">Kartu Keluarga</strong>
                                    <span class="text-[10px] text-emerald-600 font-semibold">Tersedia (PDF)</span>
                                </div>
                            </div>
                            <button type="button" onclick="openDocPreview('Kartu Keluarga (KK)')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Buka</button>
                        </div>

                        <div class="p-3 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <div class="w-9 h-9 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <strong class="block text-slate-800 text-xs">Buku Rapor / Ijazah</strong>
                                    <span class="text-[10px] text-emerald-600 font-semibold">Tersedia (PDF)</span>
                                </div>
                            </div>
                            <button type="button" onclick="openDocPreview('Transkrip Rapor / Ijazah')" class="px-2.5 py-1 text-xs font-bold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Buka</button>
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
                        <h5 class="text-xs font-bold text-amber-950">Form Pengeditan Data Santri Mukim</h5>
                        <p class="text-[11px] text-amber-900/80 mt-0.5 leading-relaxed">
                            Ubah informasi identitas santri, status santri, kelas, kamar asrama, capaian hafalan, serta kontak orang tua. Klik <strong>Simpan Perubahan</strong> untuk memperbarui data langsung di drawer.
                        </p>
                    </div>
                </div>

                <!-- Kelompok 1: Identitas Pokok & Status -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>1. Identitas Pokok & Status Santri</span>
                    </h5>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">NIS (Nomor Induk) *</label>
                            <input type="text" id="editSantriNis" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 font-mono text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">NISN (Nasional)</label>
                            <input type="text" id="editSantriNisn" placeholder="00xxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 font-mono text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tahun Masuk</label>
                            <input type="number" id="editSantriTahunMasuk" placeholder="2024" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                    </div>

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

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Status Keaktifan Santri *</label>
                        <select id="editSantriStatus" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-bold bg-white text-slate-900">
                            <option value="aktif">Santri Aktif (Mukim di Pondok)</option>
                            <option value="alumni">Alumni / Lulus (Khatam Bersanad)</option>
                            <option value="cuti">Cuti / Sakit (Izin Medis)</option>
                            <option value="mutasi">Mutasi / Pindah Lembaga</option>
                            <option value="keluar">Non-Aktif / Mengundurkan Diri</option>
                        </select>
                    </div>
                </div>

                <!-- Kelompok 2: Jenjang, Kelas, Asrama & Capaian Hafalan -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>2. Jenjang, Kelas, Asrama & Tahfizh</span>
                    </h5>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Jenjang Pendidikan *</label>
                            <select id="editSantriJenjang" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-semibold">
                                <option value="Wustha (SMP)">Wustha (SMP)</option>
                                <option value="Ulya (SMA)">Ulya (SMA)</option>
                                <option value="Tahfizh Khusus">Tahfizh Khusus</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Kelas Rombel *</label>
                            <input type="text" id="editSantriKelas" placeholder="misal: Kelas 8" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Kamar Asrama Mukim</label>
                            <input type="text" id="editSantriAsrama" placeholder="misal: Kamar Umar bin Khattab" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Pembina Halaqah Tahfizh</label>
                            <input type="text" id="editSantriHalaqah" placeholder="misal: Ust. Syahrir, S.Pd.I" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Capaian Hafalan Mutqin</label>
                        <input type="text" id="editSantriHafalan" placeholder="misal: 18 Juz Mutqin / 30 Juz (Khatam Bersanad)" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-bold text-emerald-800">
                    </div>
                </div>

                <!-- Kelompok 3: Biodata Pribadi Santri -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>3. Biodata Pribadi Santri</span>
                    </h5>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tempat Lahir</label>
                            <input type="text" id="editSantriTempatLahir" placeholder="misal: Maros / Makassar" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Tanggal Lahir</label>
                            <input type="date" id="editSantriTglLahir" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Nomor HP Santri</label>
                            <input type="text" id="editSantriHp" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white font-mono">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Status Tinggal</label>
                            <input type="text" id="editSantriTinggal" placeholder="Asrama Pondok / Orang Tua" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Asal Sekolah SD/MI/SMP</label>
                        <input type="text" id="editSantriAsalSekolah" placeholder="Nama sekolah asal" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white">
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1 text-[11px]">Alamat Lengkap Sesuai KK</label>
                        <textarea id="editSantriAlamat" rows="2" placeholder="Alamat domisili lengkap santri..." class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs bg-white"></textarea>
                    </div>
                </div>

                <!-- Kelompok 4: Data Orang Tua / Wali -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                        <span>4. Data Orang Tua / Wali & Kontak WhatsApp</span>
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
                                <input type="text" id="editSantriAyah" placeholder="Nama ayah" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">No. WhatsApp Ayah *</label>
                                <input type="text" id="editSantriHpAyah" placeholder="08xxxxxxxxxx" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Pekerjaan Ayah</label>
                                <input type="text" id="editSantriJobAyah" placeholder="misal: Wiraswasta" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Penghasilan Ayah</label>
                                <input type="text" id="editSantriIncomeAyah" placeholder="misal: Rp 5.000.000 ke atas" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
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
                                <input type="text" id="editSantriIbu" placeholder="Nama ibu" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">No. WhatsApp Ibu</label>
                                <input type="text" id="editSantriHpIbu" placeholder="08xxxxxxxxxx" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-mono">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Pekerjaan Ibu</label>
                                <input type="text" id="editSantriJobIbu" placeholder="misal: Ibu Rumah Tangga / Guru" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                            <div>
                                <label class="block font-medium text-slate-600 mb-0.5 text-[10px]">Penghasilan Ibu</label>
                                <input type="text" id="editSantriIncomeIbu" placeholder="misal: Rp 3.000.000 - Rp 4.000.000" class="w-full px-2.5 py-1.5 rounded-lg border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 5: Berkas Digital Kesiswaan -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider text-forest-800 flex items-center justify-between">
                        <span class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-forest-600"></span>
                            <span>5. Berkas Digital Kesiswaan</span>
                        </span>
                        <span class="text-[10px] text-emerald-700 font-semibold">Tersimpan di Cloud</span>
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3 rounded-xl border border-slate-200 bg-white space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-xs text-slate-800">Kartu Keluarga (KK)</span>
                                <span class="text-[10px] text-emerald-600 font-bold">PDF / Tersedia</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="openDocPreview('Kartu Keluarga (KK)')" class="px-2.5 py-1 text-[11px] font-semibold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Pratinjau</button>
                                <label class="px-2.5 py-1 text-[11px] font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg cursor-pointer">
                                    <span>Ganti Berkas</span>
                                    <input type="file" accept=".pdf,.jpg,.png" class="hidden" onchange="showSantriToast('File KK baru siap diunggah')">
                                </label>
                            </div>
                        </div>
                        <div class="p-3 rounded-xl border border-slate-200 bg-white space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-xs text-slate-800">Transkrip / Rapor</span>
                                <span class="text-[10px] text-emerald-600 font-bold">PDF / Tersedia</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="openDocPreview('Transkrip Rapor / Ijazah')" class="px-2.5 py-1 text-[11px] font-semibold text-forest-900 bg-forest-50 hover:bg-forest-100 rounded-lg">Pratinjau</button>
                                <label class="px-2.5 py-1 text-[11px] font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg cursor-pointer">
                                    <span>Ganti Berkas</span>
                                    <input type="file" accept=".pdf,.jpg,.png" class="hidden" onchange="showSantriToast('File Raport baru siap diunggah')">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- 1. Drawer Footer: Mode Detail / Pratinjau -->
        <div id="santriDetailFooter" class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between gap-2">
            <button type="button" 
                    onclick="closeSantriDrawer()"
                    class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                Tutup Panel
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="printSantriBio()"
                        class="px-3 py-2 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 transition-all flex items-center gap-1.5 shadow-2xs">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Biodata</span>
                </button>
                <button type="button" 
                        onclick="switchSantriDrawerMode('edit')"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold bg-amber-500 hover:bg-amber-600 text-white transition-all flex items-center gap-1.5 shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit Data</span>
                </button>
                <button type="button" 
                        onclick="printSantriCard()"
                        class="px-3.5 sm:px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C] transition-all flex items-center gap-1.5 shadow-xs">
                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                    </svg>
                    <span>Cetak KTS</span>
                </button>
            </div>
        </div>

        <!-- 2. Drawer Footer: Mode Edit Data Santri -->
        <div id="santriEditFooter" class="p-4 border-t border-slate-200 bg-slate-50 hidden flex items-center justify-between gap-2">
            <button type="button" 
                    onclick="switchSantriDrawerMode('detail')"
                    class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                Kembali ke Pratinjau
            </button>
            <div class="flex items-center gap-2">
                <button type="button" 
                        onclick="closeSantriDrawer()"
                        class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition-all">
                    Batal
                </button>
                <button type="button" 
                        onclick="saveEditedSantri()"
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
    <div id="santriDocModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 text-slate-800">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h3 class="text-sm font-bold" id="santriDocTitle">Pratinjau Berkas Kesiswaan</h3>
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
                        <h4 class="text-sm font-bold text-slate-900" id="santriDocName">Kartu Keluarga Resmi</h4>
                        <p class="text-xs text-slate-500 mt-1" id="santriDocStudentName">Abdullah Dzaki M.</p>
                    </div>
                    <div class="p-3 bg-emerald-50 rounded-lg text-emerald-800 text-[11px] font-semibold">
                        ✓ Berkas arsip digital tersimpan aman dalam database kesiswaan santri mukim
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeDocPreview()" class="px-3.5 py-1.5 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Tutup</button>
                <button type="button" onclick="alert('Mengunduh salinan berkas PDF...'); closeDocPreview();" class="px-4 py-1.5 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C]">Unduh Berkas</button>
            </div>
        </div>
    </div>

    <!-- 6. MODAL: Input Santri Baru Manual (Form Lengkap) -->
    <div id="manualAddSantriModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl border border-slate-100 max-h-[92vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-forest-50 text-forest-900 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Input Data Santri Baru (Database Induk)</h3>
                        <p class="text-[11px] text-slate-400">Masukkan biodata santri, orang tua, kelas/asrama, dan status santri</p>
                    </div>
                </div>
                <button type="button" onclick="closeManualAddModal()" class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="py-4 space-y-4 text-xs">
                
                <!-- Kelompok 1: Identitas & Status Santri -->
                <div>
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        1. Identitas Pokok & Status Santri
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">NIS (Nomor Induk) *</label>
                            <input type="text" id="addSantriNis" placeholder="Contoh: 2026.08.055" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 font-mono text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap Santri *</label>
                            <input type="text" id="addSantriNama" placeholder="Nama lengkap santri" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Status Santri *</label>
                            <select id="addSantriStatus" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs font-semibold">
                                <option value="aktif">Aktif (Mukim)</option>
                                <option value="alumni">Alumni / Lulus</option>
                                <option value="cuti">Cuti / Sakit</option>
                                <option value="mutasi">Mutasi / Pindah</option>
                                <option value="keluar">Non-Aktif / Keluar</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kelompok 2: Jenjang, Kelas & Asrama -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        2. Jenjang, Kelas & Asrama
                    </h5>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Jenis Kelamin *</label>
                            <select id="addSantriGender" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                                <option value="Putra">Putra (Ikhwan)</option>
                                <option value="Putri">Putri (Akhwat)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Jenjang *</label>
                            <select id="addSantriJenjang" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                                <option>Wustha (SMP)</option>
                                <option>Ulya (SMA)</option>
                                <option>Tahfizh Khusus</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Kelas</label>
                            <input type="text" id="addSantriKelas" placeholder="misal: Kelas 7A" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Kamar Asrama</label>
                            <input type="text" id="addSantriAsrama" placeholder="Kamar Umar / Abu Bakar" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                </div>

                <!-- Kelompok 3: Biodata Santri (Sama seperti Form Pendaftaran) -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        3. Biodata Santri (Dari Pendaftaran)
                    </h5>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tempat Lahir</label>
                            <input type="text" id="addSantriTempatLahir" placeholder="misal: Maros / Makassar" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tanggal Lahir</label>
                            <input type="date" id="addSantriTglLahir" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Asal Sekolah SD/MI/SMP</label>
                            <input type="text" id="addSantriAsalSekolah" placeholder="Nama sekolah asal" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Tinggal Bersama</label>
                            <input type="text" id="addSantriTinggal" placeholder="Asrama Pondok / Orang Tua" value="Asrama Pondok" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="block font-semibold text-slate-700 mb-1">Alamat Lengkap Sesuai KK</label>
                        <textarea id="addSantriAlamat" rows="2" placeholder="Alamat domisili lengkap santri..." class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs"></textarea>
                    </div>
                </div>

                <!-- Kelompok 4: Data Orang Tua / Wali -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        4. Data Orang Tua / Wali
                    </h5>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Nama Ayah Kandung *</label>
                            <input type="text" id="addSantriAyah" placeholder="Nama ayah" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Ayah *</label>
                            <input type="text" id="addSantriHpAyah" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-3">
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">Nama Ibu Kandung</label>
                            <input type="text" id="addSantriIbu" placeholder="Nama ibu" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp Ibu</label>
                            <input type="text" id="addSantriHpIbu" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-200 outline-hidden focus:border-forest-500 text-xs">
                        </div>
                    </div>
                </div>

                <!-- Kelompok 5: Upload Berkas Dokumen (Sesuai Form Pendaftaran) -->
                <div class="pt-3 border-t border-slate-100">
                    <h5 class="font-bold text-slate-900 uppercase text-[10px] tracking-wider mb-2 text-forest-800">
                        5. Upload Berkas Dokumen (Sesuai Form Pendaftaran)
                    </h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <!-- 1. Salinan Kartu Keluarga (KK) -->
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">
                                Foto Kartu Keluarga (KK) <span class="text-rose-500 font-bold">*</span>
                            </label>
                            <p class="text-[10px] text-slate-400 mb-1.5">File JPG, PNG, atau PDF (Maks. 10 MB)</p>
                            
                            <div class="border-2 border-dashed border-slate-200 hover:border-forest-500 bg-slate-50/70 hover:bg-white rounded-xl p-4 text-center cursor-pointer transition-all relative group shadow-2xs"
                                 onclick="document.getElementById('addSantriFileKk').click()">
                                <input type="file" id="addSantriFileKk" accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="handleModalFileUpload(this, 'kk')">
                                
                                <div id="modalEmptyKk" class="space-y-1.5">
                                    <div class="w-9 h-9 mx-auto rounded-xl bg-white border border-slate-200 flex items-center justify-center text-lg shadow-2xs group-hover:scale-105 transition-transform">
                                        📄
                                    </div>
                                    <div>
                                        <span class="font-bold text-xs text-slate-800 block">Pilih / Seret Foto KK</span>
                                        <span class="text-[10px] text-slate-400">Format: JPG, PNG, atau PDF</span>
                                    </div>
                                </div>

                                <!-- Preview KK yang Terpilih -->
                                <div id="modalPreviewKk" class="hidden text-left bg-white p-2.5 rounded-lg border border-emerald-200 shadow-2xs flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2 min-w-0">
                                        <span class="text-emerald-600 text-lg">✅</span>
                                        <div class="min-w-0">
                                            <p class="font-bold text-xs text-slate-900 truncate" id="modalFileNameKk">kartu-keluarga.pdf</p>
                                            <p class="font-mono text-[10px] text-slate-400" id="modalFileSizeKk">2.4 MB</p>
                                        </div>
                                    </div>
                                    <button type="button" onclick="event.stopPropagation(); removeModalFile('kk')" class="text-xs text-rose-500 hover:text-rose-700 font-bold p-1 hover:bg-rose-50 rounded" title="Hapus berkas">✕</button>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Transkrip Nilai / Raport -->
                        <div>
                            <label class="block font-semibold text-slate-700 mb-1">
                                Foto Transkrip Nilai / Raport <span class="text-rose-500 font-bold">*</span>
                            </label>
                            <p class="text-[10px] text-slate-400 mb-1.5">File JPG, PNG, atau PDF (Maks. 10 MB)</p>
                            
                            <div class="border-2 border-dashed border-slate-200 hover:border-forest-500 bg-slate-50/70 hover:bg-white rounded-xl p-4 text-center cursor-pointer transition-all relative group shadow-2xs"
                                 onclick="document.getElementById('addSantriFileRaport').click()">
                                <input type="file" id="addSantriFileRaport" accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="handleModalFileUpload(this, 'raport')">
                                
                                <div id="modalEmptyRaport" class="space-y-1.5">
                                    <div class="w-9 h-9 mx-auto rounded-xl bg-white border border-slate-200 flex items-center justify-center text-lg shadow-2xs group-hover:scale-105 transition-transform">
                                        📊
                                    </div>
                                    <div>
                                        <span class="font-bold text-xs text-slate-800 block">Pilih / Seret Raport</span>
                                        <span class="text-[10px] text-slate-400">Format: JPG, PNG, atau PDF</span>
                                    </div>
                                </div>

                                <!-- Preview Raport yang Terpilih -->
                                <div id="modalPreviewRaport" class="hidden text-left bg-white p-2.5 rounded-lg border border-emerald-200 shadow-2xs flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2 min-w-0">
                                        <span class="text-emerald-600 text-lg">✅</span>
                                        <div class="min-w-0">
                                            <p class="font-bold text-xs text-slate-900 truncate" id="modalFileNameRaport">raport-santri.pdf</p>
                                            <p class="font-mono text-[10px] text-slate-400" id="modalFileSizeRaport">3.1 MB</p>
                                        </div>
                                    </div>
                                    <button type="button" onclick="event.stopPropagation(); removeModalFile('raport')" class="text-xs text-rose-500 hover:text-rose-700 font-bold p-1 hover:bg-rose-50 rounded" title="Hapus berkas">✕</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeManualAddModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                <button type="button" onclick="saveManualSantri()" class="px-4 py-2 rounded-xl text-xs font-bold bg-[#0B3B2C] text-white hover:bg-[#07261C]">Simpan Data Santri</button>
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
        <p class="text-xs font-semibold" id="santriToastMessage">Status santri berhasil diperbarui!</p>
    </div>

    <x-slot:scripts>
        <script>
            // ====================================================
            // 1. Filtering & Search Logic (Client-Side Instant)
            // ====================================================
            let currentSelectedSantriJenjang = 'all';
            let currentSelectedSantriGender = 'all';

            function filterGender(genderKey, btnEl) {
                currentSelectedSantriGender = genderKey;

                document.querySelectorAll('.santri-gender-btn').forEach(b => {
                    b.classList.remove('bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
                    b.classList.add('text-slate-600', 'font-semibold');
                });
                btnEl.classList.add('bg-white', 'text-slate-900', 'shadow-xs', 'font-bold');
                btnEl.classList.remove('text-slate-600');

                applySantriFilter();
            }

            function filterJenjang(jenjangKey, btnEl) {
                currentSelectedSantriJenjang = jenjangKey;

                document.querySelectorAll('.santri-jenjang-btn').forEach(b => {
                    b.classList.remove('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                    b.classList.add('text-slate-600', 'font-semibold');
                });
                btnEl.classList.add('bg-[#0B3B2C]', 'text-white', 'shadow-xs', 'font-bold');
                btnEl.classList.remove('text-slate-600');

                applySantriFilter();
            }

            function applySantriFilter() {
                const searchKeyword = document.getElementById('santriSearchInput').value.toLowerCase().trim();
                const statusValue = document.getElementById('statusSantriFilterSelect').value.toLowerCase();
                const rows = document.querySelectorAll('.santri-row');
                let count = 0;

                rows.forEach(row => {
                    const rowGender = row.getAttribute('data-gender') || '';
                    const rowJenjang = row.getAttribute('data-jenjang') || '';
                    const rowStatus = row.getAttribute('data-status') || '';
                    const searchData = row.getAttribute('data-search') || '';

                    const matchesGender = (currentSelectedSantriGender === 'all' || rowGender === currentSelectedSantriGender);
                    const matchesJenjang = (currentSelectedSantriJenjang === 'all' || rowJenjang.includes(currentSelectedSantriJenjang));
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
                        const badge = row.querySelector('.santri-row-badge');
                        if (badge) {
                            badge.innerText = visibleIndex++;
                        }
                    }
                });

                document.getElementById('filteredSantriCount').innerText = 'Menampilkan total ' + count + ' santri di database pondok';
            }

            // ====================================================
            // 2. Slide-Over Detail & Edit Drawer (Pusat Data Santri)
            // ====================================================
            let activeDetailSantri = null;
            let currentDrawerMode = 'detail';

            function escapeHtml(text) {
                if (text === null || text === undefined) return '';
                return String(text)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            }

            function openSantriDrawer(santri, mode = 'detail') {
                activeDetailSantri = Object.assign({}, santri);

                // Render views
                renderSantriDetailView(activeDetailSantri);
                populateSantriEditForm(activeDetailSantri);

                // Switch to requested mode (detail / edit)
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
                const badge = document.getElementById('drawerModeBadge');
                const badgeText = document.getElementById('drawerModeBadgeText');
                const badgeDot = document.getElementById('drawerModeDot');
                const detailView = document.getElementById('santriDetailView');
                const editView = document.getElementById('santriEditView');
                const detailFooter = document.getElementById('santriDetailFooter');
                const editFooter = document.getElementById('santriEditFooter');

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

                    if (activeDetailSantri) {
                        populateSantriEditForm(activeDetailSantri);
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

                    if (activeDetailSantri) {
                        renderSantriDetailView(activeDetailSantri);
                    }
                }
            }

            function renderSantriDetailView(santri) {
                const isPutri = (santri.jenis_kelamin || '').toLowerCase().includes('putri');

                // Header elements
                document.getElementById('detailSantriNis').innerText = santri.nis || '-';
                document.getElementById('detailSantriGenderBadge').innerText = isPutri ? 'Putri (Akhwat)' : 'Putra (Ikhwan)';
                document.getElementById('detailSantriName').innerText = santri.nama_santri || '-';
                
                // Initials
                const names = (santri.nama_santri || 'Santri').trim().split(/\s+/);
                const initials = names.length > 1 ? (names[0][0] + names[1][0]).toUpperCase() : names[0].substring(0, 2).toUpperCase();
                document.getElementById('detailSantriAvatar').innerText = initials;

                // Birth & Age
                let birthFormatted = '-';
                if (santri.tanggal_lahir) {
                    const parts = santri.tanggal_lahir.split('T')[0].split('-');
                    if (parts.length === 3) {
                        const birthYear = parseInt(parts[0], 10);
                        const birthMonth = parseInt(parts[1], 10) - 1;
                        const birthDay = parseInt(parts[2], 10);
                        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        const monthName = months[birthMonth] || parts[1];
                        
                        const currentYear = 2026;
                        const ageText = (currentYear - birthYear) + ' Tahun';
                        birthFormatted = (santri.tempat_lahir || '-') + ', ' + birthDay + ' ' + monthName + ' ' + birthYear + ' (' + ageText + ')';
                    } else {
                        birthFormatted = (santri.tempat_lahir || '-') + ', ' + santri.tanggal_lahir;
                    }
                } else if (santri.tempat_lahir) {
                    birthFormatted = santri.tempat_lahir;
                }

                // Akademik & Asrama
                document.getElementById('detailSantriClassBadge').innerText = santri.kelas || santri.jenjang || '-';
                document.getElementById('detailSantriJenjang').innerText = (santri.jenjang || 'Wustha (SMP)') + ' - ' + (santri.kelas || '-');
                document.getElementById('detailSantriAsrama').innerText = santri.kamar_asrama || 'Asrama Pondok Camba';
                document.getElementById('detailSantriHafalan').innerText = santri.capaian_hafalan || 'Sedang Berjalan';
                document.getElementById('detailSantriHalaqah').innerText = santri.halaqah_tahfizh || 'Dewan Asatidz';

                // Biodata Santri
                document.getElementById('detailSantriBirth').innerText = birthFormatted;
                document.getElementById('detailSantriPhone').innerText = santri.no_hp_santri || '-';
                document.getElementById('detailSantriSchool').innerText = santri.asal_sekolah || '-';
                document.getElementById('detailSantriLivingWith').innerText = santri.tinggal_bersama || 'Asrama Pondok';
                document.getElementById('detailSantriAddress').innerText = santri.alamat_lengkap || '-';

                // Parents
                document.getElementById('detailSantriFatherName').innerText = santri.nama_ayah || '-';
                document.getElementById('detailSantriFatherJob').innerText = santri.pekerjaan_ayah || '-';
                document.getElementById('detailSantriFatherIncome').innerText = santri.penghasilan_ayah || '-';
                document.getElementById('detailSantriFatherPhone').innerText = santri.no_hp_ayah || '-';

                document.getElementById('detailSantriMotherName').innerText = santri.nama_ibu || '-';
                document.getElementById('detailSantriMotherJob').innerText = santri.pekerjaan_ibu || '-';
                document.getElementById('detailSantriMotherIncome').innerText = santri.penghasilan_ibu || '-';
                document.getElementById('detailSantriMotherPhone').innerText = santri.no_hp_ibu || '-';

                // WhatsApp links with tailored Santri messages
                const fatherPhone = santri.no_hp_ayah ? santri.no_hp_ayah.replace(/[^0-9]/g, '') : '628114422331';
                const motherPhone = santri.no_hp_ibu ? santri.no_hp_ibu.replace(/[^0-9]/g, '') : '';

                const templateAyah = encodeURIComponent("Assalamu'alaikum Bpk. " + (santri.nama_ayah || '') + ", Pengurus Pondok Pesantren Tahfizh Baitul Qur'an Camba ingin menginformasikan perkembangan ananda " + (santri.nama_santri || '') + " (" + (santri.nis || '') + ").");
                document.getElementById('detailSantriFatherWaBtn').href = 'https://wa.me/' + fatherPhone + '?text=' + templateAyah;

                if (motherPhone) {
                    const templateIbu = encodeURIComponent("Assalamu'alaikum Ibu " + (santri.nama_ibu || '') + ", Pengurus Pondok Pesantren Tahfizh Baitul Qur'an Camba ingin menginformasikan perkembangan ananda " + (santri.nama_santri || '') + " (" + (santri.nis || '') + ").");
                    document.getElementById('detailSantriMotherWaBtn').href = 'https://wa.me/' + motherPhone + '?text=' + templateIbu;
                    document.getElementById('detailSantriMotherWaBtn').classList.remove('hidden');
                } else {
                    document.getElementById('detailSantriMotherWaBtn').classList.add('hidden');
                }

                renderSantriDetailStatusBadge(santri.status_santri || 'aktif');
            }

            function populateSantriEditForm(santri) {
                document.getElementById('editSantriNis').value = santri.nis || '';
                document.getElementById('editSantriNisn').value = santri.nisn || '';
                document.getElementById('editSantriTahunMasuk').value = santri.tahun_masuk || 2024;
                document.getElementById('editSantriNama').value = santri.nama_santri || '';
                document.getElementById('editSantriGender').value = (santri.jenis_kelamin && santri.jenis_kelamin.toLowerCase().includes('putri')) ? 'Putri' : 'Putra';
                document.getElementById('editSantriStatus').value = (santri.status_santri || 'aktif').toLowerCase();
                
                // Jenjang dropdown match
                const jenjangVal = santri.jenjang || 'Wustha (SMP)';
                const jenjangSelect = document.getElementById('editSantriJenjang');
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

                document.getElementById('editSantriKelas').value = santri.kelas || '';
                document.getElementById('editSantriAsrama').value = santri.kamar_asrama || '';
                document.getElementById('editSantriHafalan').value = santri.capaian_hafalan || '';
                document.getElementById('editSantriHalaqah').value = santri.halaqah_tahfizh || '';

                document.getElementById('editSantriTempatLahir').value = santri.tempat_lahir || '';
                document.getElementById('editSantriTglLahir').value = santri.tanggal_lahir ? santri.tanggal_lahir.split('T')[0] : '';
                document.getElementById('editSantriHp').value = santri.no_hp_santri || '';
                document.getElementById('editSantriAsalSekolah').value = santri.asal_sekolah || '';
                document.getElementById('editSantriTinggal').value = santri.tinggal_bersama || 'Asrama Pondok';
                document.getElementById('editSantriAlamat').value = santri.alamat_lengkap || '';

                document.getElementById('editSantriAyah').value = santri.nama_ayah || '';
                document.getElementById('editSantriHpAyah').value = santri.no_hp_ayah || '';
                document.getElementById('editSantriJobAyah').value = santri.pekerjaan_ayah || '';
                document.getElementById('editSantriIncomeAyah').value = santri.penghasilan_ayah || 'Rp 5.000.000 ke atas';

                document.getElementById('editSantriIbu').value = santri.nama_ibu || '';
                document.getElementById('editSantriHpIbu').value = santri.no_hp_ibu || '';
                document.getElementById('editSantriJobIbu').value = santri.pekerjaan_ibu || '';
                document.getElementById('editSantriIncomeIbu').value = santri.penghasilan_ibu || 'Rp 3.000.000 - Rp 4.000.000';
            }

            function saveEditedSantri() {
                if (!activeDetailSantri) return;

                const nama = document.getElementById('editSantriNama').value.trim();
                const nis = document.getElementById('editSantriNis').value.trim();

                if (!nama || !nis) {
                    alert('Mohon lengkapi Nama Santri dan NIS (Nomor Induk Santri).');
                    return;
                }

                const previousId = activeDetailSantri.id;
                const previousNis = activeDetailSantri.nis;

                // Update properties in memory
                activeDetailSantri.nama_santri = nama;
                activeDetailSantri.nis = nis;
                activeDetailSantri.nisn = document.getElementById('editSantriNisn').value.trim();
                activeDetailSantri.tahun_masuk = document.getElementById('editSantriTahunMasuk').value.trim();
                activeDetailSantri.jenis_kelamin = document.getElementById('editSantriGender').value;
                activeDetailSantri.status_santri = document.getElementById('editSantriStatus').value;
                activeDetailSantri.jenjang = document.getElementById('editSantriJenjang').value;
                activeDetailSantri.kelas = document.getElementById('editSantriKelas').value.trim();
                activeDetailSantri.kamar_asrama = document.getElementById('editSantriAsrama').value.trim();
                activeDetailSantri.capaian_hafalan = document.getElementById('editSantriHafalan').value.trim();
                activeDetailSantri.halaqah_tahfizh = document.getElementById('editSantriHalaqah').value.trim();
                activeDetailSantri.tempat_lahir = document.getElementById('editSantriTempatLahir').value.trim();
                activeDetailSantri.tanggal_lahir = document.getElementById('editSantriTglLahir').value;
                activeDetailSantri.no_hp_santri = document.getElementById('editSantriHp').value.trim();
                activeDetailSantri.asal_sekolah = document.getElementById('editSantriAsalSekolah').value.trim();
                activeDetailSantri.tinggal_bersama = document.getElementById('editSantriTinggal').value.trim();
                activeDetailSantri.alamat_lengkap = document.getElementById('editSantriAlamat').value.trim();
                activeDetailSantri.nama_ayah = document.getElementById('editSantriAyah').value.trim();
                activeDetailSantri.no_hp_ayah = document.getElementById('editSantriHpAyah').value.trim();
                activeDetailSantri.pekerjaan_ayah = document.getElementById('editSantriJobAyah').value.trim();
                activeDetailSantri.penghasilan_ayah = document.getElementById('editSantriIncomeAyah').value;
                activeDetailSantri.nama_ibu = document.getElementById('editSantriIbu').value.trim();
                activeDetailSantri.no_hp_ibu = document.getElementById('editSantriHpIbu').value.trim();
                activeDetailSantri.pekerjaan_ibu = document.getElementById('editSantriJobIbu').value.trim();
                activeDetailSantri.penghasilan_ibu = document.getElementById('editSantriIncomeIbu').value;

                const isPutri = activeDetailSantri.jenis_kelamin.toLowerCase().includes('putri');
                const genderKey = isPutri ? 'putri' : 'putra';
                const statusKey = activeDetailSantri.status_santri.toLowerCase();
                const jenjangKey = activeDetailSantri.jenjang.toLowerCase();

                // Find and update row
                let row = document.querySelector(`.santri-row[data-id="${previousId}"]`);
                if (!row && previousNis) {
                    const rows = document.querySelectorAll('.santri-row');
                    for (let r of rows) {
                        if ((r.getAttribute('data-search') || '').includes(previousNis.toLowerCase())) {
                            row = r;
                            break;
                        }
                    }
                }

                if (row) {
                    row.setAttribute('data-gender', genderKey);
                    row.setAttribute('data-jenjang', jenjangKey);
                    row.setAttribute('data-status', statusKey);
                    
                    const newSearch = (
                        activeDetailSantri.nama_santri + ' ' + 
                        activeDetailSantri.nis + ' ' + 
                        (activeDetailSantri.nisn || '') + ' ' + 
                        (activeDetailSantri.kamar_asrama || '') + ' ' + 
                        (activeDetailSantri.asal_sekolah || '') + ' ' + 
                        (activeDetailSantri.nama_ayah || '') + ' ' + 
                        (activeDetailSantri.tempat_lahir || '')
                    ).toLowerCase();
                    row.setAttribute('data-search', newSearch);

                    // Col 2: Data Santri
                    const nameCell = row.cells[1];
                    if (nameCell) {
                        const genderBadge = isPutri 
                            ? '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">Putri</span>'
                            : '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">Putra</span>';
                        
                        nameCell.innerHTML = `
                            <div class="flex items-center gap-2">
                                <p class="font-bold text-slate-900 text-sm">
                                    ${escapeHtml(activeDetailSantri.nama_santri)}
                                </p>
                                ${genderBadge}
                            </div>
                            <p class="text-[11px] text-slate-500 mt-0.5 truncate max-w-[200px]">
                                ${escapeHtml(activeDetailSantri.asal_sekolah || '-')}
                            </p>
                        `;
                    }

                    // Col 3: Jenjang & Kelas
                    const jenjangCell = row.cells[2];
                    if (jenjangCell) {
                        let jenjangBadge = '';
                        if (jenjangKey.includes('wustha')) {
                            jenjangBadge = '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">Wustha</span>';
                        } else if (jenjangKey.includes('ulya')) {
                            jenjangBadge = '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-teal-50 text-teal-800 border border-teal-200">Ulya</span>';
                        } else {
                            jenjangBadge = '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200">Tahfizh Khusus</span>';
                        }
                        jenjangCell.innerHTML = `
                            <div class="flex items-center gap-1.5">
                                ${jenjangBadge}
                                <span class="font-semibold text-slate-700 text-xs">${escapeHtml(activeDetailSantri.kelas || '-')}</span>
                            </div>
                        `;
                    }

                    // Col 4: Wali & WhatsApp
                    const waliCell = row.cells[3];
                    if (waliCell) {
                        const cleanWa = (activeDetailSantri.no_hp_ayah || '').replace(/[^0-9]/g, '');
                        waliCell.innerHTML = `
                            <p class="font-semibold text-slate-800">
                                ${escapeHtml(activeDetailSantri.nama_ayah || '-')}
                            </p>
                            <a href="https://wa.me/${cleanWa}" 
                               target="_blank" 
                               class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600 hover:text-emerald-700 hover:underline mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path>
                                </svg>
                                <span>${escapeHtml(activeDetailSantri.no_hp_ayah || '-')}</span>
                            </a>
                        `;
                    }

                    // Col 5: Status Santri Badge
                    const statusCell = row.querySelector('.santri-status-cell') || row.cells[4];
                    if (statusCell) {
                        if (statusKey === 'aktif') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Aktif</span>';
                        } else if (statusKey === 'alumni') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Alumni / Lulus</span>';
                        } else if (statusKey === 'cuti') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>Cuti / Sakit</span>';
                        } else if (statusKey === 'mutasi') {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-800 border border-purple-200"><span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>Mutasi / Pindah</span>';
                        } else {
                            statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Non-Aktif / Keluar</span>';
                        }
                    }

                    // Col 6: Aksi Buttons
                    const jsonEscaped = JSON.stringify(activeDetailSantri).replace(/'/g, "&#39;");
                    const actionCell = row.cells[5];
                    if (actionCell) {
                        actionCell.innerHTML = `
                            <div class="inline-flex items-center justify-end gap-1.5">
                                <button type="button" 
                                        onclick='openSantriDrawer(${jsonEscaped}, "detail")'
                                        title="Lihat Detail Kartu Induk Santri"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 hover:bg-[#0B3B2C] hover:text-white transition-all shadow-2xs">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <span>Detail</span>
                                </button>
                                <button type="button" 
                                        onclick='openSantriDrawer(${jsonEscaped}, "edit")'
                                        title="Edit Data Santri di Drawer"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-amber-50 text-amber-900 border border-amber-200/80 hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all shadow-2xs">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    <span>Edit</span>
                                </button>
                            </div>
                        `;
                    }
                }

                // Refresh Detail View & Switch back to detail view
                renderSantriDetailView(activeDetailSantri);
                switchSantriDrawerMode('detail');

                // Notification & Filters
                showSantriToast('Data santri ' + activeDetailSantri.nama_santri + ' (NIS: ' + activeDetailSantri.nis + ') berhasil diperbarui!');
                applySantriFilter();
            }

            function renderSantriDetailStatusBadge(status) {
                const container = document.getElementById('detailSantriStatusBadge');
                status = (status || 'aktif').toLowerCase();
                
                if (status === 'aktif') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-900 border border-emerald-300"><span class="w-2 h-2 rounded-full bg-emerald-600"></span>Santri Aktif Mukim</span>';
                } else if (status === 'alumni') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-900 border border-blue-300"><span class="w-2 h-2 rounded-full bg-blue-600"></span>Alumni / Lulus</span>';
                } else if (status === 'cuti') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-900 border border-amber-300"><span class="w-2 h-2 rounded-full bg-amber-600"></span>Cuti / Izin Sakit</span>';
                } else if (status === 'mutasi') {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-900 border border-purple-300"><span class="w-2 h-2 rounded-full bg-purple-600"></span>Mutasi / Pindah</span>';
                } else {
                    container.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-900 border border-rose-300"><span class="w-2 h-2 rounded-full bg-rose-600"></span>Non-Aktif / Keluar</span>';
                }
            }

            function changeSantriStatus(newStatus) {
                if (!activeDetailSantri) return;
                activeDetailSantri.status_santri = newStatus;
                
                // Keep edit form select in sync
                const editStatusSelect = document.getElementById('editSantriStatus');
                if (editStatusSelect) editStatusSelect.value = newStatus;

                renderSantriDetailStatusBadge(newStatus);

                // Update Table Row
                const rows = document.querySelectorAll('.santri-row');
                rows.forEach(r => {
                    const rowSearch = (r.getAttribute('data-search') || '').toLowerCase();
                    if (rowSearch.includes(activeDetailSantri.nis.toLowerCase())) {
                        r.setAttribute('data-status', newStatus);
                        const cell = r.querySelector('.santri-status-cell');
                        if (cell) {
                            if (newStatus === 'aktif') {
                                cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Aktif</span>';
                            } else if (newStatus === 'alumni') {
                                cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Alumni / Lulus</span>';
                            } else if (newStatus === 'cuti') {
                                cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>Cuti / Sakit</span>';
                            } else if (newStatus === 'mutasi') {
                                cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-800 border border-purple-200"><span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>Mutasi / Pindah</span>';
                            } else {
                                cell.innerHTML = '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Non-Aktif / Keluar</span>';
                            }
                        }

                        // Rebind action buttons with updated object
                        const jsonEscaped = JSON.stringify(activeDetailSantri).replace(/'/g, "&#39;");
                        const actionCell = r.cells[5];
                        if (actionCell) {
                            actionCell.innerHTML = `
                                <div class="inline-flex items-center justify-end gap-1.5">
                                    <button type="button" 
                                            onclick='openSantriDrawer(${jsonEscaped}, "detail")'
                                            title="Lihat Detail Kartu Induk Santri"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 hover:bg-[#0B3B2C] hover:text-white transition-all shadow-2xs">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>Detail</span>
                                    </button>
                                    <button type="button" 
                                            onclick='openSantriDrawer(${jsonEscaped}, "edit")'
                                            title="Edit Data Santri di Drawer"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-amber-50 text-amber-900 border border-amber-200/80 hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all shadow-2xs">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </button>
                                </div>
                            `;
                        }
                    }
                });

                showSantriToast('Status santri ' + activeDetailSantri.nama_santri + ' diubah menjadi: ' + newStatus.toUpperCase());
                applySantriFilter();
            }

            // ====================================================
            // 3. Document Preview Modal
            // ====================================================
            function openDocPreview(docType) {
                if (!activeDetailSantri) return;
                document.getElementById('santriDocTitle').innerText = 'Arsip Berkas: ' + docType;
                document.getElementById('santriDocName').innerText = docType;
                document.getElementById('santriDocStudentName').innerText = 'Santri: ' + activeDetailSantri.nama_santri + ' (' + activeDetailSantri.nis + ')';
                document.getElementById('santriDocModal').classList.remove('hidden');
            }

            function closeDocPreview() {
                document.getElementById('santriDocModal').classList.add('hidden');
            }

            // ====================================================
            // 4. Manual Santri Add Modal (Offline / Master Data)
            // ====================================================
            function openManualAddModal() {
                document.getElementById('manualAddSantriModal').classList.remove('hidden');
            }

            function closeManualAddModal() {
                document.getElementById('manualAddSantriModal').classList.add('hidden');
            }

            function handleModalFileUpload(input, type) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    const sizeFormatted = (file.size / (1024 * 1024)).toFixed(1) + ' MB';
                    
                    if (type === 'kk') {
                        document.getElementById('modalEmptyKk').classList.add('hidden');
                        document.getElementById('modalFileNameKk').innerText = file.name;
                        document.getElementById('modalFileSizeKk').innerText = sizeFormatted + ' • Siap diunggah';
                        document.getElementById('modalPreviewKk').classList.remove('hidden');
                    } else {
                        document.getElementById('modalEmptyRaport').classList.add('hidden');
                        document.getElementById('modalFileNameRaport').innerText = file.name;
                        document.getElementById('modalFileSizeRaport').innerText = sizeFormatted + ' • Siap diunggah';
                        document.getElementById('modalPreviewRaport').classList.remove('hidden');
                    }
                }
            }

            function removeModalFile(type) {
                if (type === 'kk') {
                    const input = document.getElementById('addSantriFileKk');
                    if (input) input.value = '';
                    document.getElementById('modalEmptyKk').classList.remove('hidden');
                    document.getElementById('modalPreviewKk').classList.add('hidden');
                } else {
                    const input = document.getElementById('addSantriFileRaport');
                    if (input) input.value = '';
                    document.getElementById('modalEmptyRaport').classList.remove('hidden');
                    document.getElementById('modalPreviewRaport').classList.add('hidden');
                }
            }

            function saveManualSantri() {
                const nama = document.getElementById('addSantriNama').value.trim();
                const nis = document.getElementById('addSantriNis').value.trim();
                const status = document.getElementById('addSantriStatus').value;

                if (!nama || !nis) {
                    alert('Mohon isi Nomor Induk Santri (NIS) dan Nama Lengkap santri.');
                    return;
                }

                const newId = Date.now();
                const newSantri = {
                    id: newId,
                    nis: nis,
                    nisn: '00' + Math.floor(10000000 + Math.random() * 90000000),
                    nama_santri: nama,
                    jenis_kelamin: document.getElementById('addSantriGender').value,
                    jenjang: document.getElementById('addSantriJenjang').value,
                    kelas: document.getElementById('addSantriKelas').value.trim() || 'Kelas 7',
                    kamar_asrama: document.getElementById('addSantriAsrama').value.trim() || 'Asrama Pondok Camba',
                    capaian_hafalan: 'Tahsin & Hafalan Awal',
                    halaqah_tahfizh: 'Dewan Asatidz',
                    tempat_lahir: document.getElementById('addSantriTempatLahir').value.trim() || 'Maros',
                    tanggal_lahir: document.getElementById('addSantriTglLahir').value || '2013-01-01',
                    alamat_lengkap: document.getElementById('addSantriAlamat').value.trim() || 'Kab. Maros, Sulawesi Selatan',
                    asal_sekolah: document.getElementById('addSantriAsalSekolah').value.trim() || 'SD/MI Asal',
                    no_hp_santri: '081234567800',
                    tinggal_bersama: document.getElementById('addSantriTinggal').value.trim() || 'Asrama Pondok',
                    nama_ayah: document.getElementById('addSantriAyah').value.trim() || 'Wali Santri',
                    no_hp_ayah: document.getElementById('addSantriHpAyah').value.trim() || '081234567890',
                    pekerjaan_ayah: 'Wiraswasta',
                    penghasilan_ayah: 'Rp 3.000.000 - Rp 4.000.000',
                    nama_ibu: document.getElementById('addSantriIbu').value.trim() || 'Ibu Santri',
                    no_hp_ibu: document.getElementById('addSantriHpIbu').value.trim() || '',
                    pekerjaan_ibu: 'Ibu Rumah Tangga',
                    penghasilan_ibu: 'Rp 1.000.000 - Rp 2.000.000',
                    status_santri: status,
                    tahun_masuk: 2026,
                };

                const tbody = document.getElementById('santriTableBody');
                const isPutri = newSantri.jenis_kelamin.toLowerCase().includes('putri');
                const genderKey = isPutri ? 'putri' : 'putra';
                const statusKey = status.toLowerCase();
                const jenjangKey = newSantri.jenjang.toLowerCase();
                const searchData = (newSantri.nama_santri + ' ' + newSantri.nis + ' ' + newSantri.kamar_asrama + ' ' + newSantri.asal_sekolah + ' ' + newSantri.nama_ayah).toLowerCase();

                let jenjangBadge = '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">Wustha</span>';
                if (jenjangKey.includes('ulya')) {
                    jenjangBadge = '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-teal-50 text-teal-800 border border-teal-200">Ulya</span>';
                } else if (jenjangKey.includes('tahfizh')) {
                    jenjangBadge = '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200">Tahfizh Khusus</span>';
                }

                const genderBadge = isPutri 
                    ? '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">Putri</span>'
                    : '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">Putra</span>';

                const jsonEscaped = JSON.stringify(newSantri).replace(/'/g, "&#39;");

                const tr = document.createElement('tr');
                tr.className = 'santri-row hover:bg-slate-50/60 transition-colors';
                tr.setAttribute('data-id', newId);
                tr.setAttribute('data-gender', genderKey);
                tr.setAttribute('data-jenjang', jenjangKey);
                tr.setAttribute('data-status', statusKey);
                tr.setAttribute('data-search', searchData);

                tr.innerHTML = `
                    <td class="py-4 px-4 text-center whitespace-nowrap">
                        <span class="santri-row-badge inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 font-bold text-xs">
                            +
                        </span>
                    </td>
                    <td class="py-4 px-5">
                        <div class="flex items-center gap-2">
                            <p class="font-bold text-slate-900 text-sm">${escapeHtml(newSantri.nama_santri)}</p>
                            ${genderBadge}
                        </div>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate max-w-[200px]">${escapeHtml(newSantri.asal_sekolah)}</p>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <div class="flex items-center gap-1.5">
                            ${jenjangBadge}
                            <span class="font-semibold text-slate-700 text-xs">${escapeHtml(newSantri.kelas)}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <p class="font-semibold text-slate-800">${escapeHtml(newSantri.nama_ayah)}</p>
                        <a href="https://wa.me/${newSantri.no_hp_ayah.replace(/[^0-9]/g, '')}" target="_blank" class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600 hover:text-emerald-700 hover:underline mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"></path></svg>
                            <span>${escapeHtml(newSantri.no_hp_ayah)}</span>
                        </a>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap santri-status-cell">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                    </td>
                    <td class="py-4 px-5 text-right whitespace-nowrap">
                        <div class="inline-flex items-center justify-end gap-1.5">
                            <button type="button" 
                                    onclick='openSantriDrawer(${jsonEscaped}, "detail")'
                                    title="Lihat Detail Kartu Induk Santri"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-forest-50 text-forest-900 hover:bg-[#0B3B2C] hover:text-white transition-all shadow-2xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span>Detail</span>
                            </button>
                            <button type="button" 
                                    onclick='openSantriDrawer(${jsonEscaped}, "edit")'
                                    title="Edit Data Santri di Drawer"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-amber-50 text-amber-900 border border-amber-200/80 hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all shadow-2xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span>Edit</span>
                            </button>
                        </div>
                    </td>
                `;

                tbody.prepend(tr);
                closeManualAddModal();
                applySantriFilter();
                showSantriToast('Santri ' + nama + ' (NIS: ' + nis + ') berhasil ditambahkan ke database!');
            }

            function printSantriCard() {
                if (!activeDetailSantri) return;
                alert('Mencetak Kartu Tanda Santri (KTS) resmi untuk: ' + activeDetailSantri.nama_santri + ' (' + activeDetailSantri.nis + ')');
            }

            function printSantriBio() {
                if (!activeDetailSantri) return;
                alert('Mencetak Lembar Biodata Induk Santri Mukim untuk: ' + activeDetailSantri.nama_santri);
            }

            function showExportToast() {
                showSantriToast('Mempersiapkan data rekap Excel santri mukim...');
            }

            function showSantriToast(message) {
                const toast = document.getElementById('santriToast');
                document.getElementById('santriToastMessage').innerText = message;
                toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
                }, 3500);
            }

            function printSantriCard() {
                if (!activeDetailSantri) return;
                alert('Mencetak Kartu Tanda Santri (KTS) resmi untuk: ' + activeDetailSantri.nama_santri + ' (' + activeDetailSantri.nis + ')');
            }

            function printSantriBio() {
                if (!activeDetailSantri) return;
                alert('Mencetak Lembar Biodata Induk Santri Mukim untuk: ' + activeDetailSantri.nama_santri);
            }

            function showExportToast() {
                showSantriToast('Mempersiapkan data rekap Excel santri mukim...');
            }

            function showSantriToast(message) {
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

<!-- Registration Form Page Component (Pendaftaran Santri Baru) -->
<!-- Styled to match Tactile Neo-Brutalist Design System with Cards matching Google Form fields -->

<section class="relative pt-6 sm:pt-10 pb-24 overflow-hidden bg-dot-matrix bg-[#FAF7F0]">

  <!-- Floating Decorative Stickers -->
  <div class="hidden xl:block absolute top-12 left-8 w-24 h-auto tilt-left opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-rocket.svg" alt="Dekorasi Roket" class="w-full h-auto drop-shadow-md">
  </div>
  <div class="hidden xl:block absolute top-20 right-10 w-28 h-auto tilt-right opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-gradcap.svg" alt="Dekorasi Toga" class="w-full h-auto drop-shadow-md">
  </div>
  <div class="hidden lg:block absolute top-[45%] left-6 w-20 h-auto tilt-right opacity-80 pointer-events-none z-10">
    <img src="/assets/images/sticker-lightning.svg" alt="Dekorasi Kilat" class="w-full h-auto drop-shadow-md">
  </div>
  <div class="hidden lg:block absolute bottom-48 right-8 w-24 h-auto tilt-left opacity-80 pointer-events-none z-10">
    <img src="/assets/images/sticker-trophy.svg" alt="Dekorasi Piala" class="w-full h-auto drop-shadow-md">
  </div>

  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <!-- Breadcrumb & Top Navigation Capsule -->
    <div class="flex flex-wrap items-center justify-between gap-2.5 mb-8">
      <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-3.5 sm:px-4 py-2 rounded-xl bg-white border-2 border-[#121212] brutal-shadow-sm font-label font-bold text-xs uppercase tracking-wider text-[#121212] hover:bg-lime transition-colors">
        <span>←</span>
        <span>Kembali ke Beranda</span>
      </a>

      <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 rounded-full bg-white border border-[#161616]/30 shadow-sm font-label font-bold text-[10px] sm:text-[11px] uppercase tracking-wider text-[#121212]">
        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
        <span>PSB 2027/2028</span>
      </div>
    </div>

    <!-- =========================================================================
         HEADER CARD: SALAM, INFORMASI RESMI & KONTAK PANITIA
         ========================================================================= -->
    <div class="rounded-3xl bg-white border-2 border-[#121212] brutal-shadow-lg p-5 sm:p-10 mb-10 relative overflow-hidden">
      <!-- Top Decorative Color Ribbon -->
      <div class="absolute top-0 left-0 right-0 h-3 bg-gradient-to-r from-lime via-[#E53935] to-[#4A0E17]"></div>

      <div class="text-center max-w-3xl mx-auto pt-2">
        <!-- Stamp Badge -->
        <div class="stamp-badge stamp-badge-red mb-4 text-[9px] sm:text-xs py-1 px-3 max-w-full text-center leading-normal">
          PENDAFTARAN RESMI · TAHUN AJARAN 2027/2028
        </div>

        <!-- Main Heading -->
        <h1 class="font-display font-black text-2xl sm:text-4xl lg:text-5xl text-[#121212] uppercase tracking-tight leading-[1.1] mb-4">
          FORMULIR PENDAFTARAN <br class="hidden sm:inline">
          <span class="inline-block mt-2 px-4 sm:px-5 py-1.5 sm:py-2 bg-[#121212] text-lime rounded-xl border-[2.5px] border-[#121212] brutal-shadow tilt-left transform text-xl sm:text-4xl lg:text-5xl">
            CALON SANTRI BARU
          </span>
        </h1>

        <!-- Islamic Greeting & Description -->
        <div class="space-y-3 font-body text-sm sm:text-base text-[#121212] font-medium leading-relaxed max-w-2xl mx-auto">
          <p class="font-bold text-base sm:text-lg text-[#4A0E17]">
            Assalamu’alaikum Warahmatullahi Wabarakatuh 🤲✨
          </p>
          <p class="text-slate-muted">
            Selamat datang para calon pejuang Al-Qur'an, khatib, pemimpin masa depan, dan mujahid di pendaftaran resmi <span class="font-bold text-[#121212]">Pondok Pesantren Tahfizh Baitul Qur'an Camba</span>.
          </p>
        </div>

        <!-- Hadits & Tagline Quote Box -->
        <div class="my-6 p-4 sm:p-5 rounded-2xl bg-[#FCF9F2] border-2 border-dashed border-[#161616]/30 flex flex-col sm:flex-row items-center gap-3 sm:gap-4 text-left">
          <div class="w-12 h-12 rounded-xl bg-lime border-2 border-[#121212] brutal-shadow-sm flex items-center justify-center text-2xl flex-shrink-0">
            📖
          </div>
          <div>
            <p class="font-cursive text-xl sm:text-2xl font-bold text-[#4A0E17] leading-tight">
              “Sebaik-baik kalian adalah yang mempelajari Al-Qur'an dan mengajarkannya.”
            </p>
            <p class="font-label text-[11px] sm:text-xs font-bold text-slate-muted uppercase tracking-wider mt-1">
              (HR. Bukhari) · Mari Bersama Mencetak Generasi Qur'ani yang Muhaffizh, Muballigh, Mujaahid! 🚀🕌
            </p>
          </div>
        </div>

        <!-- Official Instruction Notice -->
        <div class="p-4 rounded-xl bg-amber-50 border border-amber-300 text-left text-xs sm:text-sm font-body text-amber-950 font-medium flex items-start gap-3 mb-6">
          <span class="text-amber-700 text-base flex-shrink-0 mt-0.5">📌</span>
          <div class="space-y-1">
            <p class="font-bold">INFORMASI PENTING PENGISIAN FORMULIR:</p>
            <p>1. Formulir ini merupakan formulir digital resmi yang wajib diisi oleh seluruh calon santri baru untuk pendataan awal.</p>
            <p>2. Mohon untuk mengisi seluruh data dengan benar, teliti, dan jujur sesuai data dokumen kependudukan resmi.</p>
          </div>
        </div>

        <!-- Contact Hotline Cards (Ikhwan & Akhwat) -->
        <div class="pt-2">
          <p class="font-label font-bold text-xs uppercase tracking-wider text-slate-muted mb-3">
            Layanan Informasi & Kontak Panitia (HP / WhatsApp):
          </p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 max-w-xl mx-auto">
            <!-- Ikhwan Hotline Card -->
            <a href="https://wa.me/6282124880061?text=Assalamu'alaikum%20Panitia%20PSB%20Baitul%20Qur'an%20Camba,%20saya%20ingin%20bertanya%20seputar%20pendaftaran%20santri%20baru%20(Ikhwan)" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border-2 border-[#121212] brutal-shadow-sm hover:bg-lime transition-all duration-200 group text-left">
              <div class="w-11 h-11 rounded-xl bg-[#FAF7F0] border border-[#161616]/30 overflow-hidden flex items-center justify-center flex-shrink-0">
                <img src="/assets/images/ikhwan.png" alt="Panitia Ikhwan" class="w-full h-full object-cover">
              </div>
              <div class="flex-1 min-w-0">
                <span class="font-label font-bold text-[10px] uppercase tracking-wider text-[#CF2B09] block">Panitia Ikhwan (Putra)</span>
                <span class="font-display font-black text-sm text-[#121212] block truncate">0821-2488-0061</span>
              </div>
              <span class="w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-black shadow-sm group-hover:scale-110 transition-transform">
                💬
              </span>
            </a>

            <!-- Akhwat Hotline Card -->
            <a href="https://wa.me/6282195682105?text=Assalamu'alaikum%20Panitia%20PSB%20Baitul%20Qur'an%20Camba,%20saya%20ingin%20bertanya%20seputar%20pendaftaran%20santri%20baru%20(Akhwat)" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border-2 border-[#121212] brutal-shadow-sm hover:bg-lime transition-all duration-200 group text-left">
              <div class="w-11 h-11 rounded-xl bg-[#FAF7F0] border border-[#161616]/30 overflow-hidden flex items-center justify-center flex-shrink-0">
                <img src="/assets/images/akhwat.png" alt="Panitia Akhwat" class="w-full h-full object-cover">
              </div>
              <div class="flex-1 min-w-0">
                <span class="font-label font-bold text-[10px] uppercase tracking-wider text-[#CF2B09] block">Panitia Akhwat (Putri)</span>
                <span class="font-display font-black text-sm text-[#121212] block truncate">0821-9568-2105</span>
              </div>
              <span class="w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-black shadow-sm group-hover:scale-110 transition-transform">
                💬
              </span>
            </a>
          </div>
        </div>

      </div>
    </div>

    <!-- =========================================================================
         REGISTRATION FORM WRAPPER
         ========================================================================= -->
    <form id="form-pendaftaran-santri" class="space-y-8" onsubmit="event.preventDefault(); window.handleRegistrationSubmit();">

      <!-- =========================================================================
           CARD 1: DATA CALON SANTRI BARU
           ========================================================================= -->
      <div class="rounded-3xl bg-white border-2 border-[#121212] brutal-shadow-lg p-6 sm:p-10 relative">
        
        <!-- Header Section Pill -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-6 border-b-2 border-[#121212] mb-8">
          <div class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-xl bg-[#121212] text-lime font-mono font-black text-sm flex items-center justify-center brutal-shadow-sm">
              01
            </span>
            <div>
              <h2 class="font-display font-black text-xl sm:text-2xl uppercase tracking-tight text-[#121212]">
                Data Calon Santri Baru
              </h2>
              <p class="font-body text-xs text-slate-muted font-medium">
                Identitas pribadi, domisili, sekolah asal, dan unggah berkas kelengkapan.
              </p>
            </div>
          </div>
          <div class="stamp-badge stamp-badge-lime text-[10px]">
            Wajib Dilengkapi
          </div>
        </div>

        <div class="space-y-6">

          <!-- 1. Nama Lengkap -->
          <div>
            <label for="santri-nama" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
              Nama Lengkap Calon Santri <span class="text-[#E53935] font-black">*</span>
            </label>
            <input type="text" id="santri-nama" name="santri_nama" required placeholder="misal: Muhammad Al-Fatih"
                   class="w-full px-4 py-3 rounded-xl bg-[#FAF7F0] focus:bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
            <p class="font-body text-[11px] text-slate-muted mt-1.5">Tuliskan nama lengkap sesuai dengan Akta Kelahiran atau Kartu Keluarga.</p>
          </div>

          <!-- 2. Jenis Kelamin (Tactile Selection Cards) -->
          <div>
            <label class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
              Jenis Kelamin <span class="text-[#E53935] font-black">*</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Option Putra -->
              <label class="gender-card cursor-pointer relative block">
                <input type="radio" name="santri_gender" value="Putra" required class="peer sr-only" checked>
                <div class="p-4 rounded-2xl bg-[#FAF7F0] border-2 border-[#121212] brutal-shadow-sm peer-checked:bg-lime peer-checked:border-[#121212] peer-checked:brutal-shadow flex items-center gap-4 transition-all hover:bg-white">
                  <div class="w-12 h-12 rounded-xl bg-white border border-[#161616]/30 overflow-hidden flex items-center justify-center flex-shrink-0 shadow-sm">
                    <img src="/assets/images/ikhwan.png" alt="Putra" class="w-full h-full object-cover">
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-base uppercase tracking-tight text-[#121212] block">Putra</span>
                    <span class="font-body text-xs text-slate-muted block">Calon Santri Ikhwan</span>
                  </div>
                  <div class="w-6 h-6 rounded-full border-2 border-[#121212] bg-white flex items-center justify-center text-xs font-black">
                    <span class="check-indicator hidden">✓</span>
                  </div>
                </div>
              </label>

              <!-- Option Putri -->
              <label class="gender-card cursor-pointer relative block">
                <input type="radio" name="santri_gender" value="Putri" class="peer sr-only">
                <div class="p-4 rounded-2xl bg-[#FAF7F0] border-2 border-[#121212] brutal-shadow-sm peer-checked:bg-lime peer-checked:border-[#121212] peer-checked:brutal-shadow flex items-center gap-4 transition-all hover:bg-white">
                  <div class="w-12 h-12 rounded-xl bg-white border border-[#161616]/30 overflow-hidden flex items-center justify-center flex-shrink-0 shadow-sm">
                    <img src="/assets/images/akhwat.png" alt="Putri" class="w-full h-full object-cover">
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-base uppercase tracking-tight text-[#121212] block">Putri</span>
                    <span class="font-body text-xs text-slate-muted block">Calon Santri Akhwat</span>
                  </div>
                  <div class="w-6 h-6 rounded-full border-2 border-[#121212] bg-white flex items-center justify-center text-xs font-black">
                    <span class="check-indicator hidden">✓</span>
                  </div>
                </div>
              </label>
            </div>
          </div>

          <!-- 3. Tempat dan Tanggal Lahir -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="santri-tempat-lahir" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                Tempat Lahir <span class="text-[#E53935] font-black">*</span>
              </label>
              <input type="text" id="santri-tempat-lahir" name="santri_tempat_lahir" required placeholder="misal: Maros / Makassar / Camba"
                     class="w-full px-4 py-3 rounded-xl bg-[#FAF7F0] focus:bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
            </div>

            <div>
              <label for="santri-tanggal-lahir" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                Tanggal Lahir <span class="text-[#E53935] font-black">*</span>
              </label>
              <input type="date" id="santri-tanggal-lahir" name="santri_tanggal_lahir" required
                     class="w-full px-4 py-3 rounded-xl bg-[#FAF7F0] focus:bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
            </div>
          </div>

          <!-- 4. Alamat Lengkap -->
          <div>
            <label for="santri-alamat" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
              Alamat Lengkap <span class="text-[#E53935] font-black">*</span>
            </label>
            <textarea id="santri-alamat" name="santri_alamat" rows="3" required placeholder="Jalan, RT/RW, Dusun/Lingkungan, Desa/Kelurahan, Kecamatan, Kabupaten/Kota, Provinsi"
                      class="w-full px-4 py-3 rounded-xl bg-[#FAF7F0] focus:bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all"></textarea>
          </div>

          <!-- 5. Asal Sekolah -->
          <div>
            <label for="santri-asal-sekolah" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
              Asal Sekolah <span class="text-[#E53935] font-black">*</span>
            </label>
            <input type="text" id="santri-asal-sekolah" name="santri_asal_sekolah" required placeholder="misal: SD Negeri 1 Camba / MI Al-Qalam / SMP Negeri 2"
                   class="w-full px-4 py-3 rounded-xl bg-[#FAF7F0] focus:bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
            <p class="font-body text-[11px] text-slate-muted mt-1.5">Tulis nama lengkap sekolah dasar (SD/MI) atau madrasah sebelumnya.</p>
          </div>

          <!-- 6. Nomor HP Calon Santri (Jika ada) -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <label for="santri-hp" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212]">
                Nomor HP Calon Santri
              </label>
              <span class="px-2 py-0.5 rounded bg-gray-100 text-slate-muted font-label font-bold text-[10px] uppercase">
                Jika Ada (Opsional)
              </span>
            </div>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-4 flex items-center font-mono font-bold text-xs text-slate-muted">
                +62
              </span>
              <input type="tel" id="santri-hp" name="santri_hp" placeholder="812-3456-7890"
                     class="w-full pl-14 pr-4 py-3 rounded-xl bg-[#FAF7F0] focus:bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
            </div>
          </div>

          <!-- 7 & 8: Berkas Upload (Foto KK & Foto Transkrip / Raport) -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">

            <!-- 7. Foto Kartu Keluarga -->
            <div>
              <label class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-1.5">
                Foto Kartu Keluarga <span class="text-[#E53935] font-black">*</span>
              </label>
              <p class="font-body text-[11px] text-slate-muted mb-2.5">Upload 1 file yang didukung (JPG, PNG, PDF). Maks 10 MB.</p>
              
              <div id="dropzone-kk" class="file-dropzone border-2 border-dashed border-[#121212] bg-[#FAF7F0] hover:bg-white rounded-2xl p-5 text-center cursor-pointer transition-all brutal-shadow-sm relative group">
                <input type="file" id="file-kk" name="file_kk" accept=".jpg,.jpeg,.png,.pdf" class="hidden file-input" data-target="preview-kk" data-label="Kartu Keluarga">
                
                <div id="empty-kk" class="space-y-2">
                  <div class="w-12 h-12 mx-auto rounded-xl bg-white border border-[#161616]/30 flex items-center justify-center text-xl shadow-sm group-hover:scale-110 transition-transform">
                    📄
                  </div>
                  <div>
                    <span class="font-label font-bold text-xs text-[#121212] uppercase tracking-wider block">Pilih / Seret Foto KK</span>
                    <span class="font-body text-[11px] text-slate-muted">Format: JPG, PNG, atau PDF</span>
                  </div>
                </div>

                <!-- File Selected State Preview -->
                <div id="preview-kk" class="hidden text-left bg-white p-3 rounded-xl border border-[#121212] shadow-sm flex items-center justify-between gap-3">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="text-xl">✅</span>
                    <div class="min-w-0">
                      <p class="font-display font-black text-xs text-[#121212] truncate file-name">kk-santri.pdf</p>
                      <p class="font-mono text-[10px] text-slate-muted file-size">2.4 MB</p>
                    </div>
                  </div>
                  <button type="button" class="btn-remove-file text-xs text-[#E53935] font-black p-1 hover:bg-red-50 rounded" title="Hapus berkas">✕</button>
                </div>
              </div>
            </div>

            <!-- 8. Foto Transkrip Nilai atau Nilai Raport Akhir -->
            <div>
              <label class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-1.5">
                Foto Transkrip Nilai / Raport <span class="text-[#E53935] font-black">*</span>
              </label>
              <p class="font-body text-[11px] text-slate-muted mb-2.5">Upload 1 file yang didukung (JPG, PNG, PDF). Maks 10 MB.</p>
              
              <div id="dropzone-raport" class="file-dropzone border-2 border-dashed border-[#121212] bg-[#FAF7F0] hover:bg-white rounded-2xl p-5 text-center cursor-pointer transition-all brutal-shadow-sm relative group">
                <input type="file" id="file-raport" name="file_raport" accept=".jpg,.jpeg,.png,.pdf" class="hidden file-input" data-target="preview-raport" data-label="Transkrip Nilai / Raport">
                
                <div id="empty-raport" class="space-y-2">
                  <div class="w-12 h-12 mx-auto rounded-xl bg-white border border-[#161616]/30 flex items-center justify-center text-xl shadow-sm group-hover:scale-110 transition-transform">
                    📊
                  </div>
                  <div>
                    <span class="font-label font-bold text-xs text-[#121212] uppercase tracking-wider block">Pilih / Seret Raport</span>
                    <span class="font-body text-[11px] text-slate-muted">Format: JPG, PNG, atau PDF</span>
                  </div>
                </div>

                <!-- File Selected State Preview -->
                <div id="preview-raport" class="hidden text-left bg-white p-3 rounded-xl border border-[#121212] shadow-sm flex items-center justify-between gap-3">
                  <div class="flex items-center gap-2.5 min-w-0">
                    <span class="text-xl">✅</span>
                    <div class="min-w-0">
                      <p class="font-display font-black text-xs text-[#121212] truncate file-name">raport-akhir.pdf</p>
                      <p class="font-mono text-[10px] text-slate-muted file-size">3.1 MB</p>
                    </div>
                  </div>
                  <button type="button" class="btn-remove-file text-xs text-[#E53935] font-black p-1 hover:bg-red-50 rounded" title="Hapus berkas">✕</button>
                </div>
              </div>
            </div>

          </div>

          <!-- 9. Tinggal Bersama -->
          <div class="pt-2">
            <label class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
              Tinggal Bersama <span class="text-[#E53935] font-black">*</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Option Orang Tua -->
              <label class="living-card cursor-pointer relative block">
                <input type="radio" name="santri_tinggal_bersama" value="Orang Tua" required class="peer sr-only" checked>
                <div class="p-4 rounded-2xl bg-[#FAF7F0] border-2 border-[#121212] brutal-shadow-sm peer-checked:bg-lime peer-checked:border-[#121212] peer-checked:brutal-shadow flex items-center gap-3.5 transition-all hover:bg-white">
                  <div class="w-10 h-10 rounded-xl bg-white border border-[#161616]/30 flex items-center justify-center text-xl shadow-sm flex-shrink-0">
                    🏡
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-sm uppercase tracking-tight text-[#121212] block">Orang Tua</span>
                    <span class="font-body text-xs text-slate-muted block">Tinggal bersama Ayah dan Ibu</span>
                  </div>
                  <div class="w-5 h-5 rounded-full border-2 border-[#121212] bg-white flex items-center justify-center text-[10px] font-black">
                    <span class="check-indicator hidden">✓</span>
                  </div>
                </div>
              </label>

              <!-- Option Wali -->
              <label class="living-card cursor-pointer relative block">
                <input type="radio" name="santri_tinggal_bersama" value="Wali" class="peer sr-only">
                <div class="p-4 rounded-2xl bg-[#FAF7F0] border-2 border-[#121212] brutal-shadow-sm peer-checked:bg-lime peer-checked:border-[#121212] peer-checked:brutal-shadow flex items-center gap-3.5 transition-all hover:bg-white">
                  <div class="w-10 h-10 rounded-xl bg-white border border-[#161616]/30 flex items-center justify-center text-xl shadow-sm flex-shrink-0">
                    🤝
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-sm uppercase tracking-tight text-[#121212] block">Wali</span>
                    <span class="font-body text-xs text-slate-muted block">Tinggal bersama Kakek / Paman / Kerabat</span>
                  </div>
                  <div class="w-5 h-5 rounded-full border-2 border-[#121212] bg-white flex items-center justify-center text-[10px] font-black">
                    <span class="check-indicator hidden">✓</span>
                  </div>
                </div>
              </label>
            </div>
          </div>

        </div>
      </div>

      <!-- =========================================================================
           CARD 2: DATA KELUARGA (DATA AYAH & DATA IBU)
           ========================================================================= -->
      <div class="rounded-3xl bg-white border-2 border-[#121212] brutal-shadow-lg p-6 sm:p-10 relative">
        
        <!-- Header Section Pill -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-6 border-b-2 border-[#121212] mb-8">
          <div class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-xl bg-[#121212] text-lime font-mono font-black text-sm flex items-center justify-center brutal-shadow-sm">
              02
            </span>
            <div>
              <h2 class="font-display font-black text-xl sm:text-2xl uppercase tracking-tight text-[#121212]">
                Data Keluarga
              </h2>
              <p class="font-body text-xs text-slate-muted font-medium">
                Data kontak, pekerjaan, dan penghasilan orang tua calon santri.
              </p>
            </div>
          </div>
          <div class="stamp-badge stamp-badge-lime text-[10px]">
            Wajib Dilengkapi
          </div>
        </div>

        <div class="space-y-8">

          <!-- -----------------------------------------------------------------
               SUB-CARD: DATA AYAH
               ----------------------------------------------------------------- -->
          <div class="rounded-2xl bg-[#FCF9F2] border-2 border-[#161616]/30 p-5 sm:p-7 relative">
            <div class="flex items-center gap-2 mb-5">
              <span class="w-7 h-7 rounded-lg bg-[#4A0E17] text-white flex items-center justify-center text-sm shadow-sm">
                👨
              </span>
              <h3 class="font-display font-black text-lg uppercase tracking-tight text-[#121212]">
                Identitas Ayah Kandung
              </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              
              <!-- 10. Nama Ayah -->
              <div>
                <label for="ayah-nama" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Nama Ayah <span class="text-[#E53935] font-black">*</span>
                </label>
                <input type="text" id="ayah-nama" name="ayah_nama" required placeholder="misal: Abdullah Sakri"
                       class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
              </div>

              <!-- 11. Nomor HP/WA Ayah -->
              <div>
                <label for="ayah-hp" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Nomor HP/WA Ayah <span class="text-[#E53935] font-black">*</span>
                </label>
                <input type="tel" id="ayah-hp" name="ayah_hp" required placeholder="misal: 0821-xxxx-xxxx"
                       class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
                <p class="font-body text-[11px] text-slate-muted mt-1.5">Nomor WhatsApp aktif untuk koordinasi panitia penerimaan santri.</p>
              </div>

              <!-- 12. Pekerjaan Ayah -->
              <div>
                <label for="ayah-pekerjaan" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Pekerjaan Ayah <span class="text-[#E53935] font-black">*</span>
                </label>
                <input type="text" id="ayah-pekerjaan" name="ayah_pekerjaan" required placeholder="misal: Wiraswasta / PNS / Guru / Petani"
                       class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
              </div>

              <!-- 13. Penghasilan Ayah -->
              <div>
                <label for="ayah-penghasilan" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Penghasilan Ayah <span class="text-[#E53935] font-black">*</span>
                </label>
                <select id="ayah-penghasilan" name="ayah_penghasilan" required
                        class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
                  <option value="" disabled selected>Pilih rentang penghasilan per bulan</option>
                  <option value="1.000.000-2.000.000">Rp 1.000.000 – Rp 2.000.000</option>
                  <option value="2.000.000-3.000.000">Rp 2.000.000 – Rp 3.000.000</option>
                  <option value="3.000.000-4.000.000">Rp 3.000.000 – Rp 4.000.000</option>
                  <option value="4.000.000-5.000.000">Rp 4.000.000 – Rp 5.000.000</option>
                  <option value="5.000.000-keatas">Rp 5.000.000 ke atas</option>
                </select>
              </div>

            </div>
          </div>

          <!-- -----------------------------------------------------------------
               SUB-CARD: DATA IBU
               ----------------------------------------------------------------- -->
          <div class="rounded-2xl bg-[#FCF9F2] border-2 border-[#161616]/30 p-5 sm:p-7 relative">
            <div class="flex items-center gap-2 mb-5">
              <span class="w-7 h-7 rounded-lg bg-[#E53935] text-white flex items-center justify-center text-sm shadow-sm">
                👩
              </span>
              <h3 class="font-display font-black text-lg uppercase tracking-tight text-[#121212]">
                Identitas Ibu Kandung
              </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              
              <!-- 14. Nama Ibu -->
              <div>
                <label for="ibu-nama" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Nama Ibu <span class="text-[#E53935] font-black">*</span>
                </label>
                <input type="text" id="ibu-nama" name="ibu_nama" required placeholder="misal: Fatimah Az-Zahra"
                       class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
              </div>

              <!-- 15. Nomor HP/WA Ibu -->
              <div>
                <label for="ibu-hp" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Nomor HP/WA Ibu <span class="text-[#E53935] font-black">*</span>
                </label>
                <input type="tel" id="ibu-hp" name="ibu_hp" required placeholder="misal: 0821-xxxx-xxxx"
                       class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
                <p class="font-body text-[11px] text-slate-muted mt-1.5">Nomor WhatsApp aktif untuk konfirmasi & informasi santri.</p>
              </div>

              <!-- 16. Pekerjaan Ibu -->
              <div>
                <label for="ibu-pekerjaan" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Pekerjaan Ibu <span class="text-[#E53935] font-black">*</span>
                </label>
                <input type="text" id="ibu-pekerjaan" name="ibu_pekerjaan" required placeholder="misal: Ibu Rumah Tangga / PNS / Guru / Pedagang"
                       class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
              </div>

              <!-- 17. Penghasilan Ibu -->
              <div>
                <label for="ibu-penghasilan" class="block font-label font-bold text-xs uppercase tracking-wider text-[#121212] mb-2">
                  Penghasilan Ibu <span class="text-[#E53935] font-black">*</span>
                </label>
                <select id="ibu-penghasilan" name="ibu_penghasilan" required
                        class="w-full px-4 py-3 rounded-xl bg-white text-[#121212] border-2 border-[#121212] font-body text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-lime focus:border-[#121212] brutal-shadow-sm transition-all">
                  <option value="" disabled selected>Pilih rentang penghasilan per bulan</option>
                  <option value="1.000.000-2.000.000">Rp 1.000.000 – Rp 2.000.000</option>
                  <option value="2.000.000-3.000.000">Rp 2.000.000 – Rp 3.000.000</option>
                  <option value="3.000.000-4.000.000">Rp 3.000.000 – Rp 4.000.000</option>
                  <option value="4.000.000-5.000.000">Rp 4.000.000 – Rp 5.000.000</option>
                  <option value="5.000.000-keatas">Rp 5.000.000 ke atas</option>
                </select>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- =========================================================================
           CARD 3: PERNYATAAN, PERSETUJUAN & TOMBOL KIRIM (THEME ACCENT WINE CARD)
           ========================================================================= -->
      <div class="rounded-3xl bg-[#580D14] text-white border-2 border-[#121212] brutal-shadow-lg p-6 sm:p-10 relative overflow-hidden">
        
        <!-- Stamp Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-lime text-[#121212] font-label font-black text-xs uppercase tracking-widest shadow-md mb-4">
          KONFIRMASI AKHIR & PERNYATAAN
        </div>

        <h3 class="font-display font-black text-2xl sm:text-3xl uppercase tracking-tight text-white mb-4">
          Pernyataan Kebenaran Data Pendaftaran
        </h3>

        <!-- Statement Checkbox -->
        <label class="flex items-start gap-3.5 p-4 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/15 transition-colors cursor-pointer mb-8">
          <input type="checkbox" id="check-pernyataan" required
                 class="mt-1 w-5 h-5 rounded border-2 border-white bg-white text-lime focus:ring-lime cursor-pointer">
          <span class="font-body text-xs sm:text-sm text-white/90 leading-relaxed font-medium">
            Dengan ini saya menyatakan bahwa seluruh data calon santri dan orang tua yang diisikan dalam formulir pendaftaran ini adalah <strong class="text-lime font-bold">benar, sah, dan dapat dipertanggungjawabkan</strong>. Apabila di kemudian hari terdapat ketidaksesuaian data, saya bersedia menerima ketentuan yang berlaku di Pondok Pesantren Tahfizh Baitul Qur'an Camba.
          </span>
        </label>

        <!-- Signature Neo-Brutalist Double-Layer Button -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
          <div class="bg-white p-1 rounded-2xl shadow-xl flex-1 transition-transform hover:scale-[1.01] active:scale-[0.99]">
            <button type="submit" id="btn-submit-pendaftaran"
                    class="btn-tactile w-full bg-lime text-[#121212] border-2 border-[#161616] rounded-xl py-4 px-8 font-display font-black text-sm uppercase tracking-wider flex items-center justify-center gap-3 cursor-pointer">
              <span>KIRIM FORMULIR PENDAFTARAN</span>
              <!-- Scalloped Starburst Badge with White Arrow -->
              <svg class="w-6 h-6 flex-shrink-0 drop-shadow-sm" viewBox="0 0 40 40" fill="none">
                <path d="M 20 2 C 22.5 2, 24 4.5, 26 5 C 28 5.5, 30.5 4.5, 32 6 C 33.5 7.5, 32.5 10, 33 12 C 33.5 14, 36 15.5, 36 18 C 36 20.5, 34 22, 33.5 24 C 33 26, 34 28.5, 32.5 30 C 31 31.5, 28.5 30.5, 26.5 31 C 24.5 31.5, 23 34, 20.5 34 C 18 34, 16.5 31.5, 14.5 31 C 12.5 30.5, 10 31.5, 8.5 30 C 7 28.5, 8 26, 7.5 24 C 7 22, 5 20.5, 5 18 C 5 15.5, 7.5 14, 8 12 C 8.5 10, 7.5 7.5, 9 6 C 10.5 4.5, 13 5.5, 15 5 C 17 4.5, 18.5 2, 20 2 Z"
                      fill="#F8330B" stroke="#161616" stroke-width="2" stroke-linejoin="round"/>
                <path d="M 14 18 L 26 18 M 21 13 L 26 18 L 21 23" 
                      stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>

          <!-- Secondary Alternative Google Form Link -->
          <a href="https://forms.gle/dUHmyuv98pgXiPcS7" target="_blank" rel="noopener noreferrer"
             class="px-6 py-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/30 text-white font-label font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-2 transition-colors">
            <span>Buka di Google Form ↗</span>
          </a>
        </div>

        <p class="font-body text-xs text-white/70 mt-5 flex items-center gap-2">
          <span>🔒</span>
          <span>Data Anda terenkripsi aman dan hanya digunakan oleh tim panitia resmi PSB Baitul Qur'an Camba.</span>
        </p>

      </div>

    </form>

  </div>

  <!-- =========================================================================
       SUCCESS MODAL: TACTILE CELEBRATION & DATA SUMMARY
       ========================================================================= -->
  <div id="modal-success-pendaftaran" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="relative w-full max-w-lg rounded-3xl bg-[#FAF7F0] border-2 border-[#121212] brutal-shadow-xl p-6 sm:p-8 overflow-hidden modal-enter text-left">
      
      <!-- Close Button -->
      <button onclick="window.closeSuccessModal()" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-white text-[#121212] border-2 border-[#121212] brutal-shadow-sm flex items-center justify-center text-xs font-black hover:bg-lime transition-colors cursor-pointer">
        ✕
      </button>

      <!-- Badge & Celebration Icon -->
      <div class="flex items-center gap-3 mb-4">
        <div class="w-14 h-14 rounded-2xl bg-lime border-2 border-[#121212] brutal-shadow-sm flex items-center justify-center text-3xl flex-shrink-0">
          🎉
        </div>
        <div>
          <span class="stamp-badge stamp-badge-lime text-[10px]">PENDAFTARAN BERHASIL</span>
          <h3 class="font-display font-black text-2xl uppercase tracking-tight text-[#121212] mt-1">
            Alhamdulillah, Data Terkirim!
          </h3>
        </div>
      </div>

      <p class="font-body text-xs sm:text-sm text-slate-muted font-medium mb-5 leading-relaxed">
        Jazakumullah khairan. Formulir pendaftaran calon santri baru telah berhasil dicatat oleh sistem PSB Pesantren Tahfizh Baitul Qur'an Camba.
      </p>

      <!-- Summary Card -->
      <div class="rounded-2xl bg-white border-2 border-[#121212] p-4.5 mb-6 space-y-2.5 font-body text-xs sm:text-sm">
        <div class="flex justify-between py-1 border-b border-gray-100">
          <span class="text-slate-muted">Nama Calon Santri:</span>
          <strong id="summary-nama" class="font-bold text-[#121212]">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-100">
          <span class="text-slate-muted">Jenis Kelamin:</span>
          <strong id="summary-gender" class="font-bold text-[#121212]">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-100">
          <span class="text-slate-muted">TTL:</span>
          <strong id="summary-ttl" class="font-bold text-[#121212]">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-100">
          <span class="text-slate-muted">Asal Sekolah:</span>
          <strong id="summary-sekolah" class="font-bold text-[#121212]">-</strong>
        </div>
        <div class="flex justify-between py-1">
          <span class="text-slate-muted">Kontak Ayah / Ibu:</span>
          <strong id="summary-kontak" class="font-bold text-[#121212]">-</strong>
        </div>
      </div>

      <!-- Action Buttons in Modal -->
      <div class="space-y-3">
        <!-- Direct WhatsApp Confirmation Button -->
        <a id="btn-wa-confirm" href="#" target="_blank" rel="noopener noreferrer"
           class="w-full bg-white p-1 rounded-xl shadow-md flex items-center justify-center transition-transform hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
          <div class="w-full bg-emerald-500 text-white border-2 border-[#161616] rounded-lg py-3 flex items-center justify-center gap-2.5 font-display font-black text-xs uppercase tracking-wider">
            <span>💬 Konfirmasi via WhatsApp Panitia</span>
            <span class="text-xs">➔</span>
          </div>
        </a>

        <div class="flex gap-2">
          <button onclick="window.print()" class="flex-1 py-2.5 rounded-xl bg-white border-2 border-[#121212] brutal-shadow-sm font-label font-bold text-xs uppercase tracking-wider hover:bg-gray-100 transition-colors">
            🖨️ Cetak / Simpan
          </button>
          <a href="{{ url('/') }}" class="flex-1 py-2.5 text-center rounded-xl bg-lime border-2 border-[#121212] brutal-shadow-sm font-label font-bold text-xs uppercase tracking-wider hover:bg-lime/90 transition-colors">
            Kembali ke Beranda
          </a>
        </div>
      </div>

    </div>
  </div>

</section>

<!-- Client-side Script for Form Interactivity, File Dropzone & Validation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // File Dropzone Handling
  const dropzones = document.querySelectorAll('.file-dropzone');
  dropzones.forEach(zone => {
    const input = zone.querySelector('.file-input');
    const emptyState = zone.querySelector('[id^="empty-"]');
    const previewState = zone.querySelector('[id^="preview-"]');
    const removeBtn = zone.querySelector('.btn-remove-file');

    zone.addEventListener('click', (e) => {
      if (e.target.closest('.btn-remove-file')) return;
      input.click();
    });

    zone.addEventListener('dragover', (e) => {
      e.preventDefault();
      zone.classList.add('bg-lime/20', 'border-lime');
    });

    zone.addEventListener('dragleave', () => {
      zone.classList.remove('bg-lime/20', 'border-lime');
    });

    zone.addEventListener('drop', (e) => {
      e.preventDefault();
      zone.classList.remove('bg-lime/20', 'border-lime');
      if (e.dataTransfer.files.length) {
        input.files = e.dataTransfer.files;
        updatePreview(input, emptyState, previewState);
      }
    });

    input.addEventListener('change', () => {
      updatePreview(input, emptyState, previewState);
    });

    if (removeBtn) {
      removeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        input.value = '';
        emptyState.classList.remove('hidden');
        previewState.classList.add('hidden');
      });
    }
  });

  function updatePreview(input, emptyEl, previewEl) {
    if (input.files && input.files[0]) {
      const file = input.files[0];
      const nameEl = previewEl.querySelector('.file-name');
      const sizeEl = previewEl.querySelector('.file-size');
      if (nameEl) nameEl.textContent = file.name;
      if (sizeEl) sizeEl.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
      emptyEl.classList.add('hidden');
      previewEl.classList.remove('hidden');
    }
  }

  // Interactive Radio Checkmarks for Gender and Living Cards
  function updateRadioIndicators() {
    document.querySelectorAll('.gender-card, .living-card').forEach(card => {
      const radio = card.querySelector('input[type="radio"]');
      const check = card.querySelector('.check-indicator');
      if (radio && check) {
        check.classList.toggle('hidden', !radio.checked);
      }
    });
  }

  document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', updateRadioIndicators);
  });
  updateRadioIndicators();

  // Submission handler
  window.handleRegistrationSubmit = function() {
    const nama = document.getElementById('santri-nama').value;
    const gender = document.querySelector('input[name="santri_gender"]:checked')?.value || 'Putra';
    const tempat = document.getElementById('santri-tempat-lahir').value;
    const tanggal = document.getElementById('santri-tanggal-lahir').value;
    const sekolah = document.getElementById('santri-asal-sekolah').value;
    const kontakAyah = document.getElementById('ayah-hp').value;
    const kontakIbu = document.getElementById('ibu-hp').value;

    document.getElementById('summary-nama').textContent = nama;
    document.getElementById('summary-gender').textContent = gender;
    document.getElementById('summary-ttl').textContent = (tempat ? tempat + ', ' : '') + (tanggal || '-');
    document.getElementById('summary-sekolah').textContent = sekolah;
    document.getElementById('summary-kontak').textContent = kontakAyah || kontakIbu || '-';

    // WhatsApp Confirmation link
    const targetPhone = gender === 'Putri' ? '6282195682105' : '6282124880061';
    const waText = encodeURIComponent(
      `Assalamu'alaikum Warahmatullahi Wabarakatuh Panitia PSB Baitul Qur'an Camba.\n\n` +
      `Saya telah mengisi formulir digital pendaftaran calon santri baru di website:\n` +
      `• Nama: ${nama}\n` +
      `• Jenis Kelamin: ${gender}\n` +
      `• Asal Sekolah: ${sekolah}\n` +
      `• No. Kontak: ${kontakAyah || kontakIbu}\n\n` +
      `Mohon informasi tindak lanjut verifikasi berkas. Syukran wa jazakumullah khairan.`
    );
    document.getElementById('btn-wa-confirm').href = `https://wa.me/${targetPhone}?text=${waText}`;

    // Show modal
    const modal = document.getElementById('modal-success-pendaftaran');
    modal.classList.remove('hidden');
  };

  window.closeSuccessModal = function() {
    document.getElementById('modal-success-pendaftaran').classList.add('hidden');
  };
});
</script>

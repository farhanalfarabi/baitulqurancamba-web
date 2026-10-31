<!-- Registration Form Page Component (Pendaftaran Santri Baru) -->
<!-- Clean, Modern & Elegant Card Style matching Curriculum Program Cards (Smooth large rounded corners, soft diffuse shadows, clean borders, non-brutalist) -->

<section class="relative pt-6 sm:pt-10 pb-24 overflow-hidden bg-dot-matrix bg-[#FAF7F0]">

  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <!-- Breadcrumb & Status Pill -->
    <div class="flex flex-wrap items-center justify-between gap-3 mb-8">
      <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 shadow-sm font-label font-bold text-xs uppercase tracking-wider text-[#121212] hover:bg-gray-50 hover:border-gray-300 transition-all">
        <span>←</span>
        <span>Kembali ke Beranda</span>
      </a>

      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-emerald-200 shadow-sm font-label font-bold text-[11px] uppercase tracking-wider text-emerald-800">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        <span>Pendaftaran Online 2027/2028</span>
      </div>
    </div>

    <!-- =========================================================================
         HEADER CARD: SALAM, INFORMASI RESMI & KONTAK PANITIA
         Clean Card with Smooth Rounded Corners [32px] & Soft Layered Shadow
         ========================================================================= -->
    <div class="rounded-[28px] sm:rounded-[36px] bg-white border border-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.06)] p-6 sm:p-10 lg:p-12 mb-8 relative overflow-hidden">
      <!-- Subtle Top Color Accent Bar -->
      <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-[#CF2B09] via-[#E53935] to-[#7C1A06]"></div>

      <div class="text-center max-w-2xl mx-auto pt-2">
        <!-- Clean Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-50 text-[#CF2B09] border border-red-100 font-label font-bold text-[11px] uppercase tracking-wider mb-4">
          <span>Formulir Digital Resmi</span>
          <span class="text-gray-300">•</span>
          <span>Tahun Ajaran 2027/2028</span>
        </div>

        <!-- Main Heading -->
        <h1 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-[#121212] uppercase tracking-tight leading-tight mb-4">
          Formulir Pendaftaran <br>
          <span class="text-[#CF2B09]">Calon Santri Baru</span>
        </h1>

        <!-- Islamic Greeting & Welcome text -->
        <div class="space-y-3 font-body text-sm sm:text-base text-gray-700 leading-relaxed max-w-xl mx-auto">
          <p class="font-semibold text-[#7C1A06]">
            Assalamu’alaikum Warahmatullahi Wabarakatuh 🤲✨
          </p>
          <p class="text-gray-600 font-medium text-xs sm:text-sm">
            Selamat datang para calon pejuang Al-Qur'an, khatib, pemimpin masa depan, dan mujahid di pendaftaran resmi <strong class="text-gray-900">Pondok Pesantren Tahfizh Baitul Qur'an Camba</strong>.
          </p>
        </div>

        <!-- Hadits & Tagline Quote Box -->
        <div class="my-6 p-4 sm:p-5 rounded-2xl bg-stone-50 border border-stone-200/80 flex flex-col sm:flex-row items-center gap-3 sm:gap-4 text-left">
          <div class="w-11 h-11 rounded-xl bg-white border border-gray-200 shadow-sm flex items-center justify-center text-xl flex-shrink-0">
            📖
          </div>
          <div>
            <p class="font-cursive text-xl sm:text-2xl font-bold text-[#7C1A06] leading-snug">
              “Sebaik-baik kalian adalah yang mempelajari Al-Qur'an dan mengajarkannya.”
            </p>
            <p class="font-label text-[11px] font-semibold text-gray-500 uppercase tracking-wider mt-1">
              (HR. Bukhari) · Muhaffizh, Muballigh, Mujaahid 🕌
            </p>
          </div>
        </div>

        <!-- Official Instruction Notice -->
        <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200/80 text-left text-xs sm:text-sm font-body text-amber-950 font-medium flex items-start gap-3 mb-6">
          <span class="text-amber-600 text-base flex-shrink-0 mt-0.5">📌</span>
          <div class="space-y-1">
            <p class="font-bold text-amber-900">INFORMASI PENDAFTARAN:</p>
            <p class="text-amber-800/90 text-xs">1. Formulir ini merupakan formulir digital resmi yang wajib diisi oleh seluruh calon santri baru untuk pendataan awal.</p>
            <p class="text-amber-800/90 text-xs">2. Mohon mengisi seluruh data dengan benar, teliti, dan jujur sesuai dokumen kependudukan resmi.</p>
          </div>
        </div>

        <!-- Contact Hotline Cards (Ikhwan & Akhwat) -->
        <div class="pt-2">
          <p class="font-label font-bold text-xs uppercase tracking-wider text-gray-500 mb-3">
            Layanan Informasi & Kontak Panitia (HP / WhatsApp):
          </p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 max-w-xl mx-auto">
            <!-- Ikhwan Hotline Card -->
            <a href="https://wa.me/6282124880061?text=Assalamu'alaikum%20Panitia%20PSB%20Baitul%20Qur'an%20Camba,%20saya%20ingin%20bertanya%20seputar%20pendaftaran%20santri%20baru%20(Ikhwan)" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-gray-200 shadow-sm hover:shadow-md hover:border-emerald-300 transition-all duration-200 group text-left">
              <div class="w-11 h-11 rounded-xl bg-gray-50 border border-gray-150 overflow-hidden flex items-center justify-center flex-shrink-0">
                <img src="/assets/images/ikhwan.png" alt="Panitia Ikhwan" class="w-full h-full object-cover">
              </div>
              <div class="flex-1 min-w-0">
                <span class="font-label font-bold text-[10px] uppercase tracking-wider text-[#CF2B09] block">Panitia Ikhwan (Putra)</span>
                <span class="font-display font-black text-sm text-[#121212] block truncate">0821-2488-0061</span>
              </div>
              <span class="w-7 h-7 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center text-xs font-bold group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                💬
              </span>
            </a>

            <!-- Akhwat Hotline Card -->
            <a href="https://wa.me/6282195682105?text=Assalamu'alaikum%20Panitia%20PSB%20Baitul%20Qur'an%20Camba,%20saya%20ingin%20bertanya%20seputar%20pendaftaran%20santri%20baru%20(Akhwat)" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-gray-200 shadow-sm hover:shadow-md hover:border-emerald-300 transition-all duration-200 group text-left">
              <div class="w-11 h-11 rounded-xl bg-gray-50 border border-gray-150 overflow-hidden flex items-center justify-center flex-shrink-0">
                <img src="/assets/images/akhwat.png" alt="Panitia Akhwat" class="w-full h-full object-cover">
              </div>
              <div class="flex-1 min-w-0">
                <span class="font-label font-bold text-[10px] uppercase tracking-wider text-[#CF2B09] block">Panitia Akhwat (Putri)</span>
                <span class="font-display font-black text-sm text-[#121212] block truncate">0821-9568-2105</span>
              </div>
              <span class="w-7 h-7 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center text-xs font-bold group-hover:bg-emerald-500 group-hover:text-white transition-colors">
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
    <form id="form-pendaftaran-santri" action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="window.handleRegistrationSubmit(event);">
      @csrf

      <!-- =========================================================================
           CARD 1: DATA CALON SANTRI BARU
           Clean Surface with Rounded [32px] & Soft Layered Shadow
           ========================================================================= -->
      <div class="rounded-[28px] sm:rounded-[36px] bg-white border border-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.06)] p-6 sm:p-10 lg:p-12 relative">
        
        <!-- Section Header Lockup -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-6 border-b border-gray-100 mb-8">
          <div class="flex items-center gap-3.5">
            <span class="w-10 h-10 rounded-2xl bg-red-50 text-[#CF2B09] font-mono font-bold text-sm flex items-center justify-center border border-red-100">
              01
            </span>
            <div>
              <h2 class="font-display font-black text-xl sm:text-2xl uppercase tracking-tight text-[#121212]">
                Data Calon Santri Baru
              </h2>
              <p class="font-body text-xs text-gray-500 font-medium">
                Pilihan jenjang, identitas pribadi calon santri, domisili, sekolah asal, dan unggah berkas.
              </p>
            </div>
          </div>
          <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-[#CF2B09] font-label font-bold text-[10px] uppercase tracking-wider border border-red-100">
            Wajib Dilengkapi
          </span>
        </div>

        <div class="space-y-6">

          <!-- 0. Pilihan Jenjang Pendidikan (Wustho / Ulya) -->
          <div>
            <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
              Pilihan Jenjang Pendidikan <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Option Wustho -->
              <label class="jenjang-card cursor-pointer relative block">
                <input type="radio" name="jenjang" value="Wustho" required class="peer sr-only" checked>
                <div class="p-4 rounded-2xl bg-stone-50/70 border-2 border-transparent shadow-sm peer-checked:bg-white peer-checked:border-[#CF2B09] peer-checked:shadow-md flex items-center gap-4 transition-all hover:bg-stone-100/70">
                  <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-100 flex items-center justify-center flex-shrink-0 shadow-sm text-2xl">
                    📖
                  </div>
                  <div class="flex-1">
                    <div class="flex items-center gap-2">
                      <span class="font-display font-black text-base uppercase tracking-tight text-gray-900 block">Wustho</span>
                      <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-label font-bold text-[10px] uppercase">Setara SMP</span>
                    </div>
                    <span class="font-body text-xs text-gray-500 block mt-0.5">Pendidikan Kesetaraan / Tahfizh (Setara SMP)</span>
                  </div>
                  <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center text-xs font-bold text-[#CF2B09]">
                    <span class="check-indicator">✓</span>
                  </div>
                </div>
              </label>

              <!-- Option Ulya -->
              <label class="jenjang-card cursor-pointer relative block">
                <input type="radio" name="jenjang" value="Ulya" class="peer sr-only">
                <div class="p-4 rounded-2xl bg-stone-50/70 border-2 border-transparent shadow-sm peer-checked:bg-white peer-checked:border-[#CF2B09] peer-checked:shadow-md flex items-center gap-4 transition-all hover:bg-stone-100/70">
                  <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 border border-amber-100 flex items-center justify-center flex-shrink-0 shadow-sm text-2xl">
                    🎓
                  </div>
                  <div class="flex-1">
                    <div class="flex items-center gap-2">
                      <span class="font-display font-black text-base uppercase tracking-tight text-gray-900 block">Ulya</span>
                      <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 font-label font-bold text-[10px] uppercase">Setara SMA</span>
                    </div>
                    <span class="font-body text-xs text-gray-500 block mt-0.5">Pendidikan Kesetaraan / Tahfizh & Bahasa (Setara SMA)</span>
                  </div>
                  <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center text-xs font-bold text-[#CF2B09]">
                    <span class="check-indicator hidden">✓</span>
                  </div>
                </div>
              </label>
            </div>
            <p class="font-body text-[11px] text-gray-500 mt-2">Pilih jenjang pendidikan yang dituju calon santri (Wustho atau Ulya).</p>
          </div>

          <!-- 1. Nama Lengkap -->
          <div>
            <label for="santri-nama" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
              Nama Lengkap Calon Santri <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <input type="text" id="santri-nama" name="santri_nama" required placeholder="misal: Muhammad Al-Fatih"
                   class="w-full px-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
            <p class="font-body text-[11px] text-gray-500 mt-1.5">Tuliskan nama lengkap sesuai dengan Akta Kelahiran atau Kartu Keluarga.</p>
          </div>

          <!-- 2. Jenis Kelamin (Clean Radio Selection Cards) -->
          <div>
            <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
              Jenis Kelamin <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Option Putra -->
              <label class="gender-card cursor-pointer relative block">
                <input type="radio" name="santri_gender" value="Putra" required class="peer sr-only" checked>
                <div class="p-4 rounded-2xl bg-stone-50/70 border-2 border-transparent shadow-sm peer-checked:bg-white peer-checked:border-[#CF2B09] peer-checked:shadow-md flex items-center gap-4 transition-all hover:bg-stone-100/70">
                  <div class="w-12 h-12 rounded-xl bg-white border border-gray-150 overflow-hidden flex items-center justify-center flex-shrink-0 shadow-sm">
                    <img src="/assets/images/ikhwan.png" alt="Putra" class="w-full h-full object-cover">
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-base uppercase tracking-tight text-gray-900 block">Putra</span>
                    <span class="font-body text-xs text-gray-500 block">Calon Santri Ikhwan</span>
                  </div>
                  <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center text-xs font-bold text-[#CF2B09]">
                    <span class="check-indicator">✓</span>
                  </div>
                </div>
              </label>

              <!-- Option Putri -->
              <label class="gender-card cursor-pointer relative block">
                <input type="radio" name="santri_gender" value="Putri" class="peer sr-only">
                <div class="p-4 rounded-2xl bg-stone-50/70 border-2 border-transparent shadow-sm peer-checked:bg-white peer-checked:border-[#CF2B09] peer-checked:shadow-md flex items-center gap-4 transition-all hover:bg-stone-100/70">
                  <div class="w-12 h-12 rounded-xl bg-white border border-gray-150 overflow-hidden flex items-center justify-center flex-shrink-0 shadow-sm">
                    <img src="/assets/images/akhwat.png" alt="Putri" class="w-full h-full object-cover">
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-base uppercase tracking-tight text-gray-900 block">Putri</span>
                    <span class="font-body text-xs text-gray-500 block">Calon Santri Akhwat</span>
                  </div>
                  <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center text-xs font-bold text-[#CF2B09]">
                    <span class="check-indicator hidden">✓</span>
                  </div>
                </div>
              </label>
            </div>
          </div>

          <!-- 3. Tempat dan Tanggal Lahir -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="santri-tempat-lahir" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                Tempat Lahir <span class="text-[#CF2B09] font-bold">*</span>
              </label>
              <input type="text" id="santri-tempat-lahir" name="santri_tempat_lahir" required placeholder="misal: Maros / Makassar / Camba"
                     class="w-full px-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
            </div>

            <div>
              <label for="santri-tanggal-lahir" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                Tanggal Lahir <span class="text-[#CF2B09] font-bold">*</span>
              </label>
              <input type="date" id="santri-tanggal-lahir" name="santri_tanggal_lahir" required
                     class="w-full px-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
            </div>
          </div>

          <!-- 4. Alamat Lengkap -->
          <div>
            <label for="santri-alamat" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
              Alamat Lengkap <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <textarea id="santri-alamat" name="santri_alamat" rows="3" required placeholder="Jalan, RT/RW, Dusun/Lingkungan, Desa/Kelurahan, Kecamatan, Kabupaten/Kota, Provinsi"
                      class="w-full px-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm"></textarea>
          </div>

          <!-- 5. Asal Sekolah -->
          <div>
            <label for="santri-asal-sekolah" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
              Asal Sekolah <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <input type="text" id="santri-asal-sekolah" name="santri_asal_sekolah" required placeholder="misal: SD Negeri 1 Camba / MI Al-Qalam / SMP Negeri 2"
                   class="w-full px-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
            <p class="font-body text-[11px] text-gray-500 mt-1.5">Tulis nama lengkap sekolah dasar (SD/MI) atau madrasah sebelumnya.</p>
          </div>

          <!-- 6. Email Aktif & Nomor HP Calon Santri -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Email Aktif -->
            <div>
              <label for="santri-email" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                Email Aktif (Bukti Pendaftaran) <span class="text-[#CF2B09] font-bold">*</span>
              </label>
              <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-sm text-gray-400">
                  ✉️
                </span>
                <input type="email" id="santri-email" name="santri_email" required placeholder="misal: wali.santri@gmail.com"
                       class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
              </div>
              <p class="font-body text-[11px] text-gray-500 mt-1.5">Tanda terima resmi & nomor registrasi otomatis dikirimkan ke email ini.</p>
            </div>

            <!-- Nomor HP Santri (Opsional) -->
            <div>
              <div class="flex items-center justify-between mb-2">
                <label for="santri-hp" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700">
                  Nomor HP Santri
                </label>
                <span class="px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-500 font-label font-semibold text-[10px] uppercase">
                  Jika Ada (Opsional)
                </span>
              </div>
              <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center font-mono font-bold text-xs text-gray-400">
                  +62
                </span>
                <input type="tel" id="santri-hp" name="santri_hp" placeholder="812-3456-7890"
                       class="w-full pl-14 pr-4 py-3.5 rounded-2xl bg-stone-50/70 focus:bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
              </div>
              <p class="font-body text-[11px] text-gray-500 mt-1.5">Nomor HP aktif calon santri jika sudah memiliki smartphone pribadi.</p>
            </div>
          </div>

          <!-- 7, 8 & 9: Berkas Dokumen Upload (Pas Foto 3x4, Kartu Keluarga & Raport) -->
          <div class="pt-2">
            <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-1">
              Unggah Berkas Dokumen <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <p class="font-body text-[11px] text-gray-500 mb-4">Pastikan seluruh dokumen jelas terbaca untuk kelancaran verifikasi seleksi.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

              <!-- A. Pas Foto Santri (3x4) -->
              <div>
                <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-1.5">
                  Pas Foto Santri (3x4) <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <p class="font-body text-[11px] text-gray-500 mb-2.5">Foto formal wajah (JPG/PNG). Maks 5 MB.</p>
                
                <div id="dropzone-pas-foto" class="file-dropzone border-2 border-dashed border-gray-200 hover:border-[#CF2B09] bg-stone-50/60 hover:bg-white rounded-2xl p-5 text-center cursor-pointer transition-all shadow-sm relative group">
                  <input type="file" id="file-pas-foto" name="file_pas_foto" accept=".jpg,.jpeg,.png" class="hidden file-input" data-target="preview-pas-foto" data-label="Pas Foto Santri">
                  
                  <div id="empty-pas-foto" class="space-y-2">
                    <div class="w-11 h-11 mx-auto rounded-xl bg-white border border-gray-200 flex items-center justify-center text-xl shadow-sm group-hover:scale-105 transition-transform">
                      📸
                    </div>
                    <div>
                      <span class="font-label font-bold text-xs text-gray-800 uppercase tracking-wider block">Pilih Pas Foto</span>
                      <span class="font-body text-[11px] text-gray-400">Format: JPG atau PNG</span>
                    </div>
                  </div>

                  <!-- File Selected State Preview -->
                  <div id="preview-pas-foto" class="hidden text-left bg-white p-3 rounded-xl border border-emerald-300 shadow-sm flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                      <!-- 3x4 Pas Foto Live Thumbnail Preview -->
                      <div class="relative w-12 h-16 sm:w-14 sm:h-18 rounded-lg overflow-hidden bg-stone-100 border-2 border-amber-400/80 shadow-xs shrink-0 flex items-center justify-center">
                        <img class="file-img-preview w-full h-full object-cover object-top hidden" alt="Preview Pas Foto">
                        <span class="file-icon-preview text-xl">📸</span>
                      </div>
                      <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                          <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                          <p class="font-display font-black text-xs text-gray-900 truncate file-name">foto-santri.jpg</p>
                        </div>
                        <p class="font-mono text-[10px] text-gray-400 file-size mt-0.5">1.2 MB</p>
                        <span class="inline-block text-[9px] font-bold text-emerald-800 bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-200 mt-1">
                          Pas Foto Terpilih
                        </span>
                      </div>
                    </div>
                    <button type="button" class="btn-remove-file text-xs text-red-500 hover:text-red-700 font-bold p-1.5 hover:bg-red-50 rounded-lg transition-colors" title="Hapus / ganti berkas">✕</button>
                  </div>
                </div>
              </div>

              <!-- B. Foto Kartu Keluarga -->
              <div>
                <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-1.5">
                  Foto Kartu Keluarga <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <p class="font-body text-[11px] text-gray-500 mb-2.5">JPG, PNG, atau PDF. Maks 10 MB.</p>
                
                <div id="dropzone-kk" class="file-dropzone border-2 border-dashed border-gray-200 hover:border-[#CF2B09] bg-stone-50/60 hover:bg-white rounded-2xl p-5 text-center cursor-pointer transition-all shadow-sm relative group">
                  <input type="file" id="file-kk" name="file_kk" accept=".jpg,.jpeg,.png,.pdf" class="hidden file-input" data-target="preview-kk" data-label="Kartu Keluarga">
                  
                  <div id="empty-kk" class="space-y-2">
                    <div class="w-11 h-11 mx-auto rounded-xl bg-white border border-gray-200 flex items-center justify-center text-xl shadow-sm group-hover:scale-105 transition-transform">
                      📄
                    </div>
                    <div>
                      <span class="font-label font-bold text-xs text-gray-800 uppercase tracking-wider block">Pilih Foto KK</span>
                      <span class="font-body text-[11px] text-gray-400">Format: JPG, PNG, atau PDF</span>
                    </div>
                  </div>

                  <!-- File Selected State Preview -->
                  <div id="preview-kk" class="hidden text-left bg-white p-3 rounded-xl border border-emerald-300 shadow-sm flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                      <div class="relative w-12 h-14 rounded-lg overflow-hidden bg-stone-100 border border-slate-200 shadow-xs shrink-0 flex items-center justify-center">
                        <img class="file-img-preview w-full h-full object-contain p-0.5 hidden" alt="Preview KK">
                        <span class="file-icon-preview text-xl">📄</span>
                      </div>
                      <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                          <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                          <p class="font-display font-black text-xs text-gray-900 truncate file-name">kk-santri.pdf</p>
                        </div>
                        <p class="font-mono text-[10px] text-gray-400 file-size mt-0.5">2.4 MB</p>
                        <span class="inline-block text-[9px] font-bold text-emerald-800 bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-200 mt-1">
                          Berkas Terpilih
                        </span>
                      </div>
                    </div>
                    <button type="button" class="btn-remove-file text-xs text-red-500 hover:text-red-700 font-bold p-1.5 hover:bg-red-50 rounded-lg transition-colors" title="Hapus / ganti berkas">✕</button>
                  </div>
                </div>
              </div>

              <!-- C. Foto Transkrip Nilai atau Nilai Raport Akhir -->
              <div>
                <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-1.5">
                  Foto Transkrip / Raport <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <p class="font-body text-[11px] text-gray-500 mb-2.5">JPG, PNG, atau PDF. Maks 10 MB.</p>
                
                <div id="dropzone-raport" class="file-dropzone border-2 border-dashed border-gray-200 hover:border-[#CF2B09] bg-stone-50/60 hover:bg-white rounded-2xl p-5 text-center cursor-pointer transition-all shadow-sm relative group">
                  <input type="file" id="file-raport" name="file_raport" accept=".jpg,.jpeg,.png,.pdf" class="hidden file-input" data-target="preview-raport" data-label="Transkrip Nilai / Raport">
                  
                  <div id="empty-raport" class="space-y-2">
                    <div class="w-11 h-11 mx-auto rounded-xl bg-white border border-gray-200 flex items-center justify-center text-xl shadow-sm group-hover:scale-105 transition-transform">
                      📊
                    </div>
                    <div>
                      <span class="font-label font-bold text-xs text-gray-800 uppercase tracking-wider block">Pilih Raport</span>
                      <span class="font-body text-[11px] text-gray-400">Format: JPG, PNG, atau PDF</span>
                    </div>
                  </div>

                  <!-- File Selected State Preview -->
                  <div id="preview-raport" class="hidden text-left bg-white p-3 rounded-xl border border-emerald-300 shadow-sm flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                      <div class="relative w-12 h-14 rounded-lg overflow-hidden bg-stone-100 border border-slate-200 shadow-xs shrink-0 flex items-center justify-center">
                        <img class="file-img-preview w-full h-full object-contain p-0.5 hidden" alt="Preview Raport">
                        <span class="file-icon-preview text-xl">📊</span>
                      </div>
                      <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                          <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                          <p class="font-display font-black text-xs text-gray-900 truncate file-name">raport-akhir.pdf</p>
                        </div>
                        <p class="font-mono text-[10px] text-gray-400 file-size mt-0.5">3.1 MB</p>
                        <span class="inline-block text-[9px] font-bold text-emerald-800 bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-200 mt-1">
                          Berkas Terpilih
                        </span>
                      </div>
                    </div>
                    <button type="button" class="btn-remove-file text-xs text-red-500 hover:text-red-700 font-bold p-1.5 hover:bg-red-50 rounded-lg transition-colors" title="Hapus / ganti berkas">✕</button>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- 9. Tinggal Bersama -->
          <div class="pt-2">
            <label class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
              Tinggal Bersama <span class="text-[#CF2B09] font-bold">*</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Option Orang Tua -->
              <label class="living-card cursor-pointer relative block">
                <input type="radio" name="santri_tinggal_bersama" value="Orang Tua" required class="peer sr-only" checked>
                <div class="p-4 rounded-2xl bg-stone-50/70 border-2 border-transparent shadow-sm peer-checked:bg-white peer-checked:border-[#CF2B09] peer-checked:shadow-md flex items-center gap-3.5 transition-all hover:bg-stone-100/70">
                  <div class="w-10 h-10 rounded-xl bg-white border border-gray-150 flex items-center justify-center text-xl shadow-sm flex-shrink-0">
                    🏡
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-sm uppercase tracking-tight text-gray-900 block">Orang Tua</span>
                    <span class="font-body text-xs text-gray-500 block">Tinggal bersama Ayah dan Ibu</span>
                  </div>
                  <div class="w-5 h-5 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center text-[10px] font-bold text-[#CF2B09]">
                    <span class="check-indicator">✓</span>
                  </div>
                </div>
              </label>

              <!-- Option Wali -->
              <label class="living-card cursor-pointer relative block">
                <input type="radio" name="santri_tinggal_bersama" value="Wali" class="peer sr-only">
                <div class="p-4 rounded-2xl bg-stone-50/70 border-2 border-transparent shadow-sm peer-checked:bg-white peer-checked:border-[#CF2B09] peer-checked:shadow-md flex items-center gap-3.5 transition-all hover:bg-stone-100/70">
                  <div class="w-10 h-10 rounded-xl bg-white border border-gray-150 flex items-center justify-center text-xl shadow-sm flex-shrink-0">
                    🤝
                  </div>
                  <div class="flex-1">
                    <span class="font-display font-black text-sm uppercase tracking-tight text-gray-900 block">Wali</span>
                    <span class="font-body text-xs text-gray-500 block">Tinggal bersama Kakek / Paman / Wali</span>
                  </div>
                  <div class="w-5 h-5 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center text-[10px] font-bold text-[#CF2B09]">
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
           Clean Surface with Rounded [32px] & Soft Layered Shadow
           ========================================================================= -->
      <div class="rounded-[28px] sm:rounded-[36px] bg-white border border-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.06)] p-6 sm:p-10 lg:p-12 relative">
        
        <!-- Header Section Lockup -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-6 border-b border-gray-100 mb-8">
          <div class="flex items-center gap-3.5">
            <span class="w-10 h-10 rounded-2xl bg-red-50 text-[#CF2B09] font-mono font-bold text-sm flex items-center justify-center border border-red-100">
              02
            </span>
            <div>
              <h2 class="font-display font-black text-xl sm:text-2xl uppercase tracking-tight text-[#121212]">
                Data Keluarga
              </h2>
              <p class="font-body text-xs text-gray-500 font-medium">
                Kontak, pekerjaan, dan penghasilan orang tua calon santri.
              </p>
            </div>
          </div>
          <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-50 text-[#CF2B09] font-label font-bold text-[10px] uppercase tracking-wider border border-red-100">
            Wajib Dilengkapi
          </span>
        </div>

        <div class="space-y-8">

          <!-- -----------------------------------------------------------------
               SUB-CARD: DATA AYAH
               ----------------------------------------------------------------- -->
          <div class="rounded-2xl bg-stone-50/70 border border-stone-200/80 p-5 sm:p-7 relative">
            <div class="flex items-center gap-2.5 mb-5">
              <span class="w-8 h-8 rounded-xl bg-white border border-gray-200 shadow-sm text-gray-700 flex items-center justify-center text-sm">
                👨
              </span>
              <h3 class="font-display font-black text-lg uppercase tracking-tight text-[#121212]">
                Identitas Ayah Kandung
              </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              
              <!-- 10. Nama Ayah -->
              <div>
                <label for="ayah-nama" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Nama Ayah <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <input type="text" id="ayah-nama" name="ayah_nama" required placeholder="misal: Abdullah Sakri"
                       class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
              </div>

              <!-- 11. Nomor HP/WA Ayah -->
              <div>
                <label for="ayah-hp" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Nomor HP/WA Ayah <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <input type="tel" id="ayah-hp" name="ayah_hp" required placeholder="misal: 0821-xxxx-xxxx"
                       class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
                <p class="font-body text-[11px] text-gray-500 mt-1.5">Nomor WhatsApp aktif untuk koordinasi panitia penerimaan santri.</p>
              </div>

              <!-- 12. Pekerjaan Ayah -->
              <div>
                <label for="ayah-pekerjaan" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Pekerjaan Ayah <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <input type="text" id="ayah-pekerjaan" name="ayah_pekerjaan" required placeholder="misal: Wiraswasta / PNS / Guru / Petani"
                       class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
              </div>

              <!-- 13. Penghasilan Ayah -->
              <div>
                <label for="ayah-penghasilan" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Penghasilan Ayah <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <select id="ayah-penghasilan" name="ayah_penghasilan" required
                        class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
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
          <div class="rounded-2xl bg-stone-50/70 border border-stone-200/80 p-5 sm:p-7 relative">
            <div class="flex items-center gap-2.5 mb-5">
              <span class="w-8 h-8 rounded-xl bg-white border border-gray-200 shadow-sm text-gray-700 flex items-center justify-center text-sm">
                👩
              </span>
              <h3 class="font-display font-black text-lg uppercase tracking-tight text-[#121212]">
                Identitas Ibu Kandung
              </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              
              <!-- 14. Nama Ibu -->
              <div>
                <label for="ibu-nama" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Nama Ibu <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <input type="text" id="ibu-nama" name="ibu_nama" required placeholder="misal: Fatimah Az-Zahra"
                       class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
              </div>

              <!-- 15. Nomor HP/WA Ibu -->
              <div>
                <label for="ibu-hp" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Nomor HP/WA Ibu <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <input type="tel" id="ibu-hp" name="ibu_hp" required placeholder="misal: 0821-xxxx-xxxx"
                       class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
                <p class="font-body text-[11px] text-gray-500 mt-1.5">Nomor WhatsApp aktif untuk konfirmasi & informasi santri.</p>
              </div>

              <!-- 16. Pekerjaan Ibu -->
              <div>
                <label for="ibu-pekerjaan" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Pekerjaan Ibu <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <input type="text" id="ibu-pekerjaan" name="ibu_pekerjaan" required placeholder="misal: Ibu Rumah Tangga / PNS / Guru / Pedagang"
                       class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
              </div>

              <!-- 17. Penghasilan Ibu -->
              <div>
                <label for="ibu-penghasilan" class="block font-label font-bold text-xs uppercase tracking-wider text-gray-700 mb-2">
                  Penghasilan Ibu <span class="text-[#CF2B09] font-bold">*</span>
                </label>
                <select id="ibu-penghasilan" name="ibu_penghasilan" required
                        class="w-full px-4 py-3.5 rounded-2xl bg-white text-gray-900 border border-gray-200 font-body text-sm font-medium focus:outline-none focus:border-[#CF2B09] focus:ring-4 focus:ring-[#CF2B09]/10 transition-all shadow-sm">
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
           CARD 3: PERNYATAAN & TOMBOL KIRIM
           Clean Card with Deep Wine Tone & Soft Layered Shadow
           ========================================================================= -->
      <div class="rounded-[28px] sm:rounded-[36px] bg-[#7C1A06] text-white shadow-[0_24px_50px_-12px_rgba(0,0,0,0.35)] p-6 sm:p-10 lg:p-12 relative overflow-hidden">
        
        <!-- Clean Badge -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/15 text-white/95 font-label font-bold text-[11px] uppercase tracking-wider mb-4 border border-white/20">
          Konfirmasi Akhir & Pernyataan
        </div>

        <h3 class="font-display font-black text-2xl sm:text-3xl uppercase tracking-tight text-white mb-4">
          Pernyataan Kebenaran Data
        </h3>

        <!-- Statement Checkbox -->
        <label class="flex items-start gap-3.5 p-4 sm:p-5 rounded-2xl bg-white/10 border border-white/15 hover:bg-white/15 transition-colors cursor-pointer mb-8">
          <input type="checkbox" id="check-pernyataan" required
                 class="mt-1 w-5 h-5 rounded-md border-2 border-white/80 bg-white/20 text-[#CF2B09] focus:ring-0 cursor-pointer">
          <span class="font-body text-xs sm:text-sm text-white/90 leading-relaxed font-medium">
            Dengan ini saya menyatakan bahwa seluruh data calon santri dan orang tua yang diisikan dalam formulir pendaftaran ini adalah <strong class="text-white font-bold underline">benar, sah, dan dapat dipertanggungjawabkan</strong>. Apabila di kemudian hari terdapat ketidaksesuaian data, saya bersedia menerima ketentuan yang berlaku di Pondok Pesantren Tahfizh Baitul Qur'an Camba.
          </span>
        </label>

        <!-- Submit Button -->
        <button type="submit" id="btn-submit-pendaftaran"
                class="w-full bg-lime hover:bg-[#c4ed00] text-[#121212] font-display font-black text-sm uppercase tracking-wider py-4 px-8 rounded-2xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-3 cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed">
          <span id="btn-submit-text">Kirim Formulir Pendaftaran</span>
          <span id="btn-submit-icon" class="w-6 h-6 rounded-full bg-[#121212] text-white flex items-center justify-center text-xs font-black">➔</span>
        </button>

        <p class="font-body text-xs text-white/70 mt-5 flex items-center gap-2">
          <span>🔒</span>
          <span>Data terenkripsi aman dan langsung tersimpan ke sistem resmi PSB Baitul Qur'an Camba.</span>
        </p>

      </div>

    </form>

  </div>

  <!-- =========================================================================
       SUCCESS MODAL: CLEAN CELEBRATION & DATA SUMMARY
       ========================================================================= -->
  <div id="modal-success-pendaftaran" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
    <div class="relative w-full max-w-lg rounded-[32px] bg-white border border-gray-100 shadow-2xl p-6 sm:p-8 overflow-hidden modal-enter text-left">
      
      <!-- Close Button -->
      <button onclick="window.closeSuccessModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-gray-100 text-gray-500 hover:text-gray-900 hover:bg-gray-200 flex items-center justify-center text-xs font-bold transition-colors cursor-pointer">
        ✕
      </button>

      <!-- Badge & Celebration Icon -->
      <div class="flex items-center gap-3.5 mb-4">
        <div class="w-13 h-13 p-3 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center text-2xl flex-shrink-0">
          🎉
        </div>
        <div>
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-label font-bold text-[10px] uppercase tracking-wider border border-emerald-100">Pendaftaran Berhasil</span>
          <h3 class="font-display font-black text-2xl uppercase tracking-tight text-gray-900 mt-1">
            Alhamdulillah, Data Terkirim!
          </h3>
        </div>
      </div>

      <p class="font-body text-xs sm:text-sm text-gray-600 font-medium mb-3 leading-relaxed">
        Jazakumullah khairan. Formulir pendaftaran calon santri baru telah berhasil dicatat oleh sistem PSB Pesantren Tahfizh Baitul Qur'an Camba.
      </p>

      <!-- Email Confirmation Notice -->
      <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-900 font-medium mb-4 flex items-center gap-2">
        <span class="text-base">📧</span>
        <span>Surat tanda bukti pendaftaran resmi telah dikirim ke: <strong id="summary-email" class="text-emerald-950 font-bold underline">-</strong></span>
      </div>

      <!-- Official Registration Number Highlight Box -->
      <div class="p-3.5 rounded-2xl bg-amber-50/90 border border-amber-200 flex items-center justify-between gap-3 mb-4">
        <div>
          <span class="font-label font-bold text-[10px] uppercase tracking-wider text-amber-800 block">Nomor Registrasi Resmi:</span>
          <span id="summary-reg" class="font-mono font-black text-lg sm:text-xl text-amber-950 block">PSB-2027-XXX</span>
        </div>
        <button type="button" onclick="window.copyRegistrationNumber()" class="px-3 py-1.5 rounded-xl bg-white border border-amber-200 text-amber-900 text-xs font-bold hover:bg-amber-100 transition-colors shadow-2xs cursor-pointer">
          📋 Salin No.
        </button>
      </div>

      <!-- Summary Card -->
      <div class="rounded-2xl bg-stone-50 border border-stone-200/80 p-4 mb-6 space-y-2.5 font-body text-xs sm:text-sm">
        <div class="flex justify-between py-1 border-b border-gray-200/60">
          <span class="text-gray-500">Jenjang Pilihan:</span>
          <strong id="summary-jenjang" class="font-bold text-gray-900">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-200/60">
          <span class="text-gray-500">Nama Calon Santri:</span>
          <strong id="summary-nama" class="font-bold text-gray-900">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-200/60">
          <span class="text-gray-500">Jenis Kelamin:</span>
          <strong id="summary-gender" class="font-bold text-gray-900">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-200/60">
          <span class="text-gray-500">TTL:</span>
          <strong id="summary-ttl" class="font-bold text-gray-900">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-200/60">
          <span class="text-gray-500">Asal Sekolah:</span>
          <strong id="summary-sekolah" class="font-bold text-gray-900">-</strong>
        </div>
        <div class="flex justify-between py-1 border-b border-gray-200/60">
          <span class="text-gray-500">Email Terdaftar:</span>
          <strong id="summary-email-row" class="font-bold text-gray-900">-</strong>
        </div>
        <div class="flex justify-between py-1">
          <span class="text-gray-500">Kontak Ayah / Ibu:</span>
          <strong id="summary-kontak" class="font-bold text-gray-900">-</strong>
        </div>
      </div>

      <!-- Action Buttons in Modal -->
      <div class="mt-6">
        <a href="{{ url('/') }}"
           class="w-full py-4 text-center rounded-2xl bg-lime hover:bg-[#c4ed00] text-[#121212] font-display font-black text-xs uppercase tracking-wider transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer">
          <span>Kembali</span>
        </a>
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
      zone.classList.add('bg-stone-100', 'border-[#CF2B09]');
    });

    zone.addEventListener('dragleave', () => {
      zone.classList.remove('bg-stone-100', 'border-[#CF2B09]');
    });

    zone.addEventListener('drop', (e) => {
      e.preventDefault();
      zone.classList.remove('bg-stone-100', 'border-[#CF2B09]');
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
        const imgPreview = previewState.querySelector('.file-img-preview');
        const iconPreview = previewState.querySelector('.file-icon-preview');
        if (imgPreview) {
          imgPreview.src = '';
          imgPreview.classList.add('hidden');
        }
        if (iconPreview) {
          iconPreview.classList.remove('hidden');
        }
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
      const imgPreview = previewEl.querySelector('.file-img-preview');
      const iconPreview = previewEl.querySelector('.file-icon-preview');

      if (nameEl) nameEl.textContent = file.name;
      if (sizeEl) sizeEl.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';

      // Live Image Preview (FileReader)
      if (file.type && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          if (imgPreview) {
            imgPreview.src = e.target.result;
            imgPreview.classList.remove('hidden');
          }
          if (iconPreview) {
            iconPreview.classList.add('hidden');
          }
        };
        reader.readAsDataURL(file);
      } else {
        if (imgPreview) {
          imgPreview.src = '';
          imgPreview.classList.add('hidden');
        }
        if (iconPreview) {
          iconPreview.textContent = '📄';
          iconPreview.classList.remove('hidden');
        }
      }

      emptyEl.classList.add('hidden');
      previewEl.classList.remove('hidden');
    }
  }

  // Interactive Radio Checkmarks for Gender, Jenjang, and Living Cards
  function updateRadioIndicators() {
    document.querySelectorAll('.gender-card, .living-card, .jenjang-card').forEach(card => {
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

  // Async Submission handler with file upload & DB persistence
  window.handleRegistrationSubmit = async function(e) {
    if (e) e.preventDefault();

    const form = document.getElementById('form-pendaftaran-santri');
    const submitBtn = document.getElementById('btn-submit-pendaftaran');
    const submitText = document.getElementById('btn-submit-text');
    const submitIcon = document.getElementById('btn-submit-icon');

    // Basic validity check
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const filePasFoto = document.getElementById('file-pas-foto');
    const fileKk = document.getElementById('file-kk');
    const fileRaport = document.getElementById('file-raport');

    if (!filePasFoto.files || !filePasFoto.files.length) {
      alert('Mohon unggah Pas Foto santri (3x4) terlebih dahulu.');
      document.getElementById('dropzone-pas-foto').scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    if (!fileKk.files || !fileKk.files.length) {
      alert('Mohon unggah berkas Kartu Keluarga (KK) terlebih dahulu.');
      document.getElementById('dropzone-kk').scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    if (!fileRaport.files || !fileRaport.files.length) {
      alert('Mohon unggah berkas Transkrip Nilai / Raport terlebih dahulu.');
      document.getElementById('dropzone-raport').scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    const formData = new FormData(form);

    // Disable button & show spinner
    submitBtn.disabled = true;
    submitText.textContent = 'Menyimpan Data & Mengunggah Berkas...';
    submitIcon.innerHTML = '⏳';

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      });

      const result = await response.json();

      if (!response.ok || !result.success) {
        let errorMsg = result.message || 'Terjadi kesalahan saat menyimpan formulir.';
        if (result.errors) {
          const firstField = Object.keys(result.errors)[0];
          if (firstField && result.errors[firstField][0]) {
            errorMsg = result.errors[firstField][0];
          }
        }
        alert(errorMsg);
        return;
      }

      // Populate Success Modal
      const data = result.data || {};
      const regNumber = result.registration_number || '-';

      document.getElementById('summary-reg').textContent = regNumber;
      document.getElementById('summary-jenjang').textContent = data.jenjang ? ((data.jenjang === 'Wustho' || data.jenjang === 'Wustha' || data.jenjang === 'MTs') ? 'Wustho (Setara SMP)' : 'Ulya (Setara SMA)') : '-';
      document.getElementById('summary-nama').textContent = data.nama_santri || '-';
      document.getElementById('summary-gender').textContent = data.jenis_kelamin || '-';
      document.getElementById('summary-ttl').textContent = (data.tempat_lahir ? data.tempat_lahir + ', ' : '') + (data.tanggal_lahir || '-');
      document.getElementById('summary-sekolah').textContent = data.asal_sekolah || '-';
      document.getElementById('summary-email').textContent = data.email || '-';
      document.getElementById('summary-email-row').textContent = data.email || '-';
      document.getElementById('summary-kontak').textContent = data.no_hp_ayah || data.no_hp_ibu || '-';

      // Show modal
      const modal = document.getElementById('modal-success-pendaftaran');
      modal.classList.remove('hidden');

      // Reset form and file inputs
      form.reset();
      document.querySelectorAll('.file-dropzone').forEach(zone => {
        const input = zone.querySelector('.file-input');
        if (input) input.value = '';
        const emptyState = zone.querySelector('[id^="empty-"]');
        const previewState = zone.querySelector('[id^="preview-"]');
        const imgPreview = zone.querySelector('.file-img-preview');
        const iconPreview = zone.querySelector('.file-icon-preview');
        if (imgPreview) {
          imgPreview.src = '';
          imgPreview.classList.add('hidden');
        }
        if (iconPreview) iconPreview.classList.remove('hidden');
        if (emptyState) emptyState.classList.remove('hidden');
        if (previewState) previewState.classList.add('hidden');
      });
      updateRadioIndicators();

    } catch (err) {
      console.error(err);
      alert('Terjadi kendala jaringan saat mengirim formulir. Pastikan koneksi internet stabil dan coba kembali.');
    } finally {
      submitBtn.disabled = false;
      submitText.textContent = 'Kirim Formulir Pendaftaran';
      submitIcon.innerHTML = '➔';
    }
  };

  window.closeSuccessModal = function() {
    document.getElementById('modal-success-pendaftaran').classList.add('hidden');
  };

  window.copyRegistrationNumber = function() {
    const regText = document.getElementById('summary-reg').textContent;
    navigator.clipboard.writeText(regText).then(() => {
      alert('Nomor registrasi ' + regText + ' berhasil disalin ke clipboard!');
    }).catch(() => {
      prompt('Salin nomor registrasi berikut:', regText);
    });
  };
});
</script>

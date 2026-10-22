<!-- Footer Section Component: Admissions Callout & Footer Links -->
<footer id="footer" class="relative pt-32 sm:pt-40 pb-12 text-white overflow-hidden bg-[#FAF7F0]">
  
  <!-- Rotating Cloud Wave Background -->
  <div class="footer-wave-wrapper absolute inset-0 w-full h-full pointer-events-none -z-0 overflow-hidden">
    <img src="/assets/svg/footer-wave-shape.svg" alt="Footer Rotating Cloud Wave"
      class="footer-rotating-wave pointer-events-none select-none" aria-hidden="true">
  </div>


  <!-- Floating decorative stickers -->
  <div class="hidden lg:block absolute top-20 sm:top-24 left-12 w-28 h-auto tilt-left opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-van.svg" alt="Sunnah Equestrian Horse" class="w-full h-auto drop-shadow-lg">
  </div>
  <div class="hidden lg:block absolute top-24 sm:top-28 right-16 w-16 h-auto tilt-right opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-rocket.svg" alt="Sunnah Archery Bow & Arrow" class="w-full h-auto drop-shadow-lg">
  </div>
  <div class="hidden lg:block absolute bottom-36 left-20 w-16 h-auto tilt-right opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-megaphone.svg" alt="Mosque Minaret & Call to Prayer" class="w-full h-auto drop-shadow-lg">
  </div>

  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
    
    <!-- Heading -->
    <h2 class="font-display font-black text-4xl sm:text-7xl uppercase tracking-tight text-white mb-6">
      Penerimaan Santri <span class="font-cursive lowercase text-lime text-5xl sm:text-8xl font-bold inline-block transform -rotate-3">baru</span> Tahun Ajaran<br>
      <span class="inline-block mt-2 px-6 py-2 bg-[#121212] text-lime rounded-2xl border border-[#161616] tilt-right transform">
        2026 / 2027
      </span>
    </h2>

    <p class="font-body text-base sm:text-lg text-white/90 font-medium max-w-xl mx-auto mb-10">
      Daftarkan putra-putri Anda untuk mengikuti program hafalan 30 Juz Al-Qur'an dan pendidikan formal terakreditasi resmi di Camba, Maros, Sulawesi Selatan.
    </p>

    <!-- Admissions CTA Button Bar -->
    <div class="max-w-xl mx-auto flex flex-col sm:flex-row gap-2 items-center justify-center mb-16">
      <a href="https://forms.gle/dUHmyuv98pgXiPcS7" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto bg-lime text-[#121212] border-2 border-[#161616] rounded-xl sm:rounded-full px-8 py-3.5 font-display font-black text-xs sm:text-sm uppercase tracking-wider flex items-center justify-center gap-2.5 transition-transform hover:scale-[1.03] active:scale-[0.98] cursor-pointer shadow-lg flex-shrink-0">
        <span>DAFTAR SEKARANG</span>
        <span class="w-5 h-5 rounded-full bg-[#E53935] text-white flex items-center justify-center text-[10px] font-black">➔</span>
      </a>
    </div>

    <div id="footer-email-success" class="hidden max-w-md mx-auto p-4 rounded-2xl bg-lime text-[#121212] font-display font-bold text-base border-2 border-[#161616] shadow-xl mb-16">
      🎉 Terima kasih! Tim pendaftaran kami akan segera menghubungi Anda.
    </div>

    <!-- Divider Line -->
    <div class="border-t border-white/20 pt-12 mt-12 flex flex-col sm:flex-row items-center justify-between gap-6">
      
      <!-- Logo & Tagline -->
      <div class="text-left">
        <div class="flex items-center gap-2 mb-2">
          <img src="/assets/images/logo.png" alt="Logo BQC" class="h-8 w-auto">
          <span class="font-display font-black text-xl tracking-tight text-white uppercase">BAITUL QUR'AN CAMBA</span>
        </div>
        <p class="font-body text-xs text-white/70 max-w-md leading-relaxed">
          Jumpulu, Link. Mallisu, Kel. Cempaniga, Kec. Camba, Kab. Maros, Sulawesi Selatan, Indonesia
        </p>
        <p class="font-label text-[11px] text-lime font-bold mt-1">
          WhatsApp: 082124880061 · Email: ponpestahfizhbaitulqurancamba@gmail.com
        </p>
      </div>

      <!-- Copyright & Quick Links -->
      <div class="text-center sm:text-right text-xs text-white/70 font-label">
        <div class="flex flex-wrap items-center justify-center sm:justify-end gap-x-4 gap-y-1 mb-2 text-white/90 font-semibold">
          <a href="{{ url('/') }}#curriculum" class="hover:text-lime transition-colors">Program</a>
          <a href="{{ route('gallery') }}" class="hover:text-lime transition-colors">Galeri</a>
          <a href="{{ url('/') }}#about" class="hover:text-lime transition-colors">Tentang Kami</a>
          <a href="{{ url('/') }}#pricing" class="hover:text-lime transition-colors">Biaya Pendidikan</a>
          <a href="{{ url('/') }}#faq" class="hover:text-lime transition-colors">FAQ</a>
          <a href="{{ url('/') }}#location" class="hover:text-lime transition-colors">Location</a>
        </div>
        <p>© 2026 Baitul Qur'an Camba. Seluruh Hak Cipta Dilindungi.</p>
      </div>

    </div>

  </div>
</footer>


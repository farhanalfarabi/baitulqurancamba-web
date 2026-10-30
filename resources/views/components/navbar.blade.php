<!-- Navigation Bar Component -->
<header class="sticky top-0 z-50 bg-white transition-all">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 sm:py-2.5 flex items-center justify-between">

    <!-- Logo & Identity -->
    <a href="{{ url('/') }}" class="flex items-center gap-2.5 group focus:outline-none" aria-label="Baitul Qur'an Camba Home">
      <img src="/assets/images/logo.png" alt="Baitul Qur'an Camba Logo"
        class="h-8 sm:h-9 w-auto group-hover:scale-105 transition-transform">
      <div class="hidden sm:flex flex-col text-left">
        <span class="font-display font-black text-xs sm:text-sm leading-none text-[#121212] uppercase tracking-tight">
          BAITUL QUR'AN
        </span>
        <span class="font-label font-bold text-[9px] text-[#4A0E17] tracking-widest uppercase">
          PESANTREN TAHFIZH CAMBA
        </span>
      </div>
    </a>

    <!-- Button + Link Wrapper Capsule (Slim 46px Capsule with 56px Larger Overflowing Button) -->
    <div
      class="hidden lg:flex items-center bg-[#FAF7F0] border border-[#161616] rounded-xl pl-5 xl:pl-6 pr-0 h-[46px] shadow-[0_2px_8px_rgba(0,0,0,0.06)] relative overflow-visible">
      <nav class="flex items-center gap-4 xl:gap-5 font-body font-semibold text-xs lg:text-[13px] text-[#121212] pr-4 xl:pr-5 h-full">
        <a href="{{ url('/') }}#curriculum" class="roll-link">
          <span class="roll-link-inner">
            <span>Program</span>
            <span class="text-[#E53935]" aria-hidden="true">Program</span>
          </span>
        </a>
        <a href="{{ url('/') }}#achievements" class="roll-link">
          <span class="roll-link-inner">
            <span>Prestasi</span>
            <span class="text-[#E53935]" aria-hidden="true">Prestasi</span>
          </span>
        </a>
        <a href="{{ route('gallery') }}" class="roll-link">
          <span class="roll-link-inner">
            <span>Galeri</span>
            <span class="text-[#E53935]" aria-hidden="true">Galeri</span>
          </span>
        </a>
        <a href="{{ url('/') }}#about" class="roll-link">
          <span class="roll-link-inner">
            <span>Tentang Kami</span>
            <span class="text-[#E53935]" aria-hidden="true">Tentang Kami</span>
          </span>
        </a>
        {{-- <a href="{{ url('/') }}#pricing" class="roll-link">
          <span class="roll-link-inner">
            <span>Biaya Pendidikan</span>
            <span class="text-[#E53935]" aria-hidden="true">Biaya Pendidikan</span>
          </span>
        </a> --}}
        <a href="{{ url('/') }}#faq" class="roll-link">
          <span class="roll-link-inner">
            <span>FAQ</span>
            <span class="text-[#E53935]" aria-hidden="true">FAQ</span>
          </span>
        </a>
        <a href="{{ url('/') }}#location" class="roll-link">
          <span class="roll-link-inner">
            <span>Lokasi</span>
            <span class="text-[#E53935]" aria-hidden="true">Lokasi</span>
          </span>
        </a>

        <!-- WhatsApp / Hubungi Kami Link -->
        <a href="https://wa.me/6282124880061?text=Assalamu'alaikum%20Admin%20Baitul%20Qur'an%20Camba,%20saya%20ingin%20bertanya%20mengenai%20informasi%20pesantren"
          target="_blank" rel="noopener noreferrer"
          class="group flex items-center gap-1.5 text-emerald-600 hover:text-emerald-700 transition-colors"
          title="Hubungi Kami via WhatsApp">
          <svg class="w-3.5 h-3.5 fill-[#25D366] group-hover:scale-110 transition-transform flex-shrink-0" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
          </svg>
          <span class="roll-link">
            <span class="roll-link-inner group-hover:-translate-y-1/2">
              <span>Hubungi Kami</span>
              <span class="text-[#25D366]" aria-hidden="true">Hubungi Kami</span>
            </span>
          </span>
        </a>
      </nav>

      <!-- Signature Double-Layer Button (Larger than Capsule Container) -->
      <a href="{{ route('pendaftaran') }}"
        class="group bg-white p-1 rounded-xl h-[56px] -mr-1.5 shadow-[0_5px_16px_rgba(0,0,0,0.14)] inline-flex items-center transition-transform hover:scale-[1.03] active:scale-[0.98] cursor-pointer focus:outline-none flex-shrink-0 z-10">
        <div
          class="bg-lime text-[#121212] border-2 border-[#161616] rounded-[8px] h-full px-4 flex items-center gap-2.5 font-display font-black text-xs sm:text-[13px] uppercase tracking-wider">
          <span class="roll-link">
            <span class="roll-link-inner">
              <span>DAFTAR SEKARANG</span>
              <span class="text-[#121212]" aria-hidden="true">DAFTAR SEKARANG</span>
            </span>
          </span>
          <!-- Signature 12-point Scalloped Starburst Red Badge with Crisp White Arrow -->
          <svg class="w-6 h-6 flex-shrink-0 transition-transform duration-500 group-hover:rotate-[45deg] drop-shadow-sm" viewBox="0 0 40 40" fill="none">
            <path d="M 20 2 C 22.5 2, 24 4.5, 26 5 C 28 5.5, 30.5 4.5, 32 6 C 33.5 7.5, 32.5 10, 33 12 C 33.5 14, 36 15.5, 36 18 C 36 20.5, 34 22, 33.5 24 C 33 26, 34 28.5, 32.5 30 C 31 31.5, 28.5 30.5, 26.5 31 C 24.5 31.5, 23 34, 20.5 34 C 18 34, 16.5 31.5, 14.5 31 C 12.5 30.5, 10 31.5, 8.5 30 C 7 28.5, 8 26, 7.5 24 C 7 22, 5 20.5, 5 18 C 5 15.5, 7.5 14, 8 12 C 8.5 10, 7.5 7.5, 9 6 C 10.5 4.5, 13 5.5, 15 5 C 17 4.5, 18.5 2, 20 2 Z"
                  fill="#F8330B" stroke="#161616" stroke-width="2" stroke-linejoin="round"/>
            <path d="M 14 18 L 26 18 M 21 13 L 26 18 L 21 23" 
                  stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </a>
    </div>

    <!-- Mobile Menu Hamburger Button -->
    <button id="btn-mobile-menu" aria-label="Toggle navigation menu" aria-expanded="false"
      class="lg:hidden p-1.5 rounded-lg border border-[#161616] bg-white shadow-sm btn-tactile">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

  </div>

  <!-- Mobile Navigation Drawer -->
  <div id="mobile-nav" class="hidden lg:hidden border-t border-[#161616] bg-[#FAF7F0] px-6 py-6 space-y-4">
    <a href="{{ url('/') }}#curriculum" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>Program</span>
        <span class="text-[#E53935]" aria-hidden="true">Program</span>
      </span>
    </a>
    <a href="{{ url('/') }}#achievements" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>Prestasi</span>
        <span class="text-[#E53935]" aria-hidden="true">Prestasi</span>
      </span>
    </a>
    <a href="{{ route('gallery') }}" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>Galeri</span>
        <span class="text-[#E53935]" aria-hidden="true">Galeri</span>
      </span>
    </a>
    <a href="{{ url('/') }}#about" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>Tentang Kami</span>
        <span class="text-[#E53935]" aria-hidden="true">Tentang Kami</span>
      </span>
    </a>
    {{-- <a href="{{ url('/') }}#pricing" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>Biaya Pendidikan</span>
        <span class="text-[#E53935]" aria-hidden="true">Biaya Pendidikan</span>
      </span>
    </a> --}}
    <a href="{{ url('/') }}#faq" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>FAQ</span>
        <span class="text-[#E53935]" aria-hidden="true">FAQ</span>
      </span>
    </a>
    <a href="{{ url('/') }}#location" class="roll-link block font-body font-semibold text-base text-[#121212]">
      <span class="roll-link-inner">
        <span>Lokasi</span>
        <span class="text-[#E53935]" aria-hidden="true">Lokasi</span>
      </span>
    </a>

    <!-- Mobile WhatsApp / Hubungi Kami Link -->
    <a href="https://wa.me/6282124880061?text=Assalamu'alaikum%20Admin%20Baitul%20Qur'an%20Camba,%20saya%20ingin%20bertanya%20mengenai%20informasi%20pesantren"
      target="_blank" rel="noopener noreferrer"
      class="group flex items-center gap-2 font-body font-semibold text-base text-emerald-600 hover:text-emerald-700 transition-colors">
      <svg class="w-4 h-4 fill-[#25D366] flex-shrink-0" viewBox="0 0 24 24">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
      </svg>
      <span class="roll-link">
        <span class="roll-link-inner group-hover:-translate-y-1/2">
          <span>Hubungi Kami</span>
          <span class="text-[#25D366]" aria-hidden="true">Hubungi Kami</span>
        </span>
      </span>
    </a>

    <div class="pt-2">
      <a href="{{ route('pendaftaran') }}"
        class="group w-full bg-white p-1 rounded-xl shadow-sm flex items-center justify-center transition-transform hover:scale-[1.02] active:scale-[0.98] cursor-pointer focus:outline-none">
        <div
          class="w-full bg-lime text-[#121212] border-2 border-[#161616] rounded-lg px-4 py-2.5 flex items-center justify-center gap-2.5 font-display font-black text-xs uppercase tracking-wider">
          <span>DAFTAR SEKARANG</span>
          <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 40 40" fill="none">
            <path d="M 20 2 C 22.5 2, 24 4.5, 26 5 C 28 5.5, 30.5 4.5, 32 6 C 33.5 7.5, 32.5 10, 33 12 C 33.5 14, 36 15.5, 36 18 C 36 20.5, 34 22, 33.5 24 C 33 26, 34 28.5, 32.5 30 C 31 31.5, 28.5 30.5, 26.5 31 C 24.5 31.5, 23 34, 20.5 34 C 18 34, 16.5 31.5, 14.5 31 C 12.5 30.5, 10 31.5, 8.5 30 C 7 28.5, 8 26, 7.5 24 C 7 22, 5 20.5, 5 18 C 5 15.5, 7.5 14, 8 12 C 8.5 10, 7.5 7.5, 9 6 C 10.5 4.5, 13 5.5, 15 5 C 17 4.5, 18.5 2, 20 2 Z"
                  fill="#F8330B" stroke="#161616" stroke-width="2" stroke-linejoin="round"/>
            <path d="M 14 18 L 26 18 M 21 13 L 26 18 L 21 23" 
                  stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </a>
    </div>
  </div>
</header>
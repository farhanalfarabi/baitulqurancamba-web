<!-- Hero Section Component -->
<section class="relative pt-10 sm:pt-16 pb-4 sm:pb-6 overflow-hidden bg-white">

  <!-- Rotating Cloud Wave Background -->
  <div class="hero-wave-wrapper absolute inset-0 w-full h-full pointer-events-none -z-0 overflow-hidden">
    <!-- Giant Rotating Scalloped Wave Shape (100% Pure SVG with organic tapering curve) -->
    <img src="/assets/svg/wave-shape.svg" alt="Rotating Cloud Wave"
      class="hero-rotating-wave pointer-events-none select-none" aria-hidden="true">
  </div>

  <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center relative z-10">

    <!-- Top Pill Badge -->
    <div
      class="inline-flex items-center gap-2 pl-1.5 pr-3.5 sm:pr-4 py-1 rounded-full bg-[#121212] text-lime border-[2px] border-[#121212] brutal-shadow-sm mb-5 sm:mb-4">
      <img src="/assets/images/badge-scallop-trophy.svg" alt="Prestasi" class="w-5 h-5 sm:w-6 sm:h-6 flex-shrink-0">
      <span class="font-label font-bold text-[10px] sm:text-xs tracking-wider uppercase text-lime">
        PONDOK PESANTREN BAITUL QUR'AN
      </span>
    </div>

    <!-- Main Hero Title (3-Line Lockup) -->
    <div class="relative max-w-4xl mx-auto mb-6 sm:mb-4">
      <h1
        class="font-display font-black text-[2.5rem] sm:text-5xl lg:text-6xl xl:text-[66px] tracking-tight text-[#121212] uppercase leading-[1.05] sm:leading-[1.02] flex flex-col items-center justify-center gap-1.5 sm:gap-2">
        <!-- Line 1 -->
        <span class="block">MEMBINA GENERASI</span>

        <!-- Line 2: Mobile (PENGHAFAL al-qur'an) / Desktop (PENGHAFAL al-qur'an YANG) -->
        <span class="inline-flex items-center justify-center gap-x-2 sm:gap-x-3 lg:hidden">
          <span>PENGHAFAL</span>
          <span
            class="font-cursive italic font-bold lowercase text-[1.1em] sm:text-[1.2em] text-[#4A0E17] -rotate-3 inline-block">al-qur'an</span>
        </span>
        <span class="hidden lg:inline-flex items-center justify-center gap-x-3">
          <span>PENGHAFAL</span>
          <span
            class="font-cursive italic font-bold lowercase text-[1.2em] text-[#4A0E17] -rotate-3 inline-block">al-qur'an</span>
          <span>YANG</span>
        </span>

        <!-- Line 3: Mobile (YANG TANGGUH & BERAKHLAK) / Desktop (TANGGUH & BERAKHLAK) -->
        <span class="block lg:hidden">YANG TANGGUH & BERAKHLAK</span>
        <span class="hidden lg:block">TANGGUH & BERAKHLAK</span>
      </h1>
    </div>

    <!-- Hero Primary CTA: Signature Double-Layer Button -->
    <div class="flex justify-center mb-5 sm:mb-6">
      <a href="{{ route('pendaftaran') }}"
        class="hero-cta-btn group bg-white p-1 rounded-xl shadow-md inline-flex items-center transition-transform hover:scale-[1.02] active:scale-[0.98] cursor-pointer focus:outline-none">
        <div
          class="bg-lime text-[#121212] border-2 border-[#161616] rounded-lg px-6 py-2.5 sm:py-3 flex items-center gap-3 font-display font-black text-xs sm:text-sm uppercase tracking-wider">
          <span class="roll-link">
            <span class="roll-link-inner">
              <span>DAFTAR SEKARANG</span>
              <span class="text-[#121212]" aria-hidden="true">DAFTAR SEKARANG</span>
            </span>
          </span>
          <svg class="w-6 h-6 flex-shrink-0 transition-transform duration-500 group-hover:rotate-[45deg] drop-shadow-sm" viewBox="0 0 40 40" fill="none">
            <path d="M 20 2 C 22.5 2, 24 4.5, 26 5 C 28 5.5, 30.5 4.5, 32 6 C 33.5 7.5, 32.5 10, 33 12 C 33.5 14, 36 15.5, 36 18 C 36 20.5, 34 22, 33.5 24 C 33 26, 34 28.5, 32.5 30 C 31 31.5, 28.5 30.5, 26.5 31 C 24.5 31.5, 23 34, 20.5 34 C 18 34, 16.5 31.5, 14.5 31 C 12.5 30.5, 10 31.5, 8.5 30 C 7 28.5, 8 26, 7.5 24 C 7 22, 5 20.5, 5 18 C 5 15.5, 7.5 14, 8 12 C 8.5 10, 7.5 7.5, 9 6 C 10.5 4.5, 13 5.5, 15 5 C 17 4.5, 18.5 2, 20 2 Z"
                  fill="#F8330B" stroke="#161616" stroke-width="2" stroke-linejoin="round"/>
            <path d="M 14 18 L 26 18 M 21 13 L 26 18 L 21 23" 
                  stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </a>
    </div>

  </div>

  @php
    $heroCards = [
      [
        'image' => '/assets/images/pondok/halaqah-tahfidz.jpg',
        'alt' => "Hafalan Al-Qur'an 30 Juz",
        'title' => "Hafalan Al-Qur'an 30 juz bersanad",
        'theme' => 'cream',
      ],
      [
        'image' => '/assets/images/pondok/suasana-kelas.jpg',
        'alt' => "Pendidikan Formal Terakreditasi",
        'title' => "Pendidikan formal berijazah resmi negara",
        'theme' => 'cherry',
      ],
      [
        'image' => '/assets/images/pondok/pidato-3-bahasa.jpg',
        'alt' => "Pidato 3 Bahasa",
        'title' => "Pidato 3 bahasa Arab & Inggris",
        'theme' => 'cream',
      ],
      [
        'image' => '/assets/images/pondok/leadership.jpg',
        'alt' => "Kepemimpinan Islami",
        'title' => "Pembinaan karakter & kepemimpinan",
        'theme' => 'cherry',
      ],
      [
        'image' => '/assets/images/pondok/taklim-kitab-kuning.jpg',
        'alt' => "Taklim Kitab Kuning",
        'title' => "Kajian taklim kitab kuning klasik",
        'theme' => 'cream',
      ],
      [
        'image' => '/assets/images/pondok/eskul-futsal.jpg',
        'alt' => "Olahraga Santri",
        'title' => "Olahraga santri & ekstrakurikuler",
        'theme' => 'cherry',
      ],
    ];
  @endphp

  <!-- Mobile Hero Cards: Seamless Infinite Marquee (Tersusun Rapi, Infinite Loop Berjalan Terus) -->
  <div class="block lg:hidden relative w-full overflow-hidden py-2 sm:py-3 mt-16 sm:mt-20 select-none hero-mobile-marquee-container">
    <style>
      @keyframes heroMarqueeRight {
        0% {
          transform: translate3d(-50%, 0, 0);
        }
        100% {
          transform: translate3d(0%, 0, 0);
        }
      }

      @keyframes heroMarqueeLeft {
        0% {
          transform: translate3d(0%, 0, 0);
        }
        100% {
          transform: translate3d(-50%, 0, 0);
        }
      }

      .hero-marquee-track-right {
        display: flex;
        width: max-content;
        animation: heroMarqueeRight 24s linear infinite;
        will-change: transform;
      }

      .hero-marquee-track-left {
        display: flex;
        width: max-content;
        animation: heroMarqueeLeft 24s linear infinite;
        will-change: transform;
      }

      .hero-mobile-marquee-container:hover .hero-marquee-track-right,
      .hero-mobile-marquee-container:hover .hero-marquee-track-left,
      .hero-mobile-marquee-container:active .hero-marquee-track-right,
      .hero-mobile-marquee-container:active .hero-marquee-track-left {
        animation-play-state: paused;
      }

      @media (prefers-reduced-motion: reduce) {
        .hero-marquee-track-right,
        .hero-marquee-track-left {
          animation: none !important;
        }
        .hero-mobile-marquee-container {
          overflow-x: auto;
        }
      }
    </style>

    <!-- Left & Right Gradient Fade Edges -->
    <div class="pointer-events-none absolute left-0 top-0 h-full w-8 sm:w-16 z-20 bg-gradient-to-r from-[#FAF7F0] via-[#FAF7F0]/80 to-transparent"></div>
    <div class="pointer-events-none absolute right-0 top-0 h-full w-8 sm:w-16 z-20 bg-gradient-to-l from-[#FAF7F0] via-[#FAF7F0]/80 to-transparent"></div>

    <div class="hero-marquee-track-right py-2">
      <!-- Set A -->
      <div class="flex items-center gap-3.5 sm:gap-4 shrink-0 pr-3.5 sm:pr-4">
        @foreach ($heroCards as $card)
          @php
            $isCherry = $card['theme'] === 'cherry';
          @endphp
          <div class="relative flex-shrink-0 w-[145px] sm:w-[165px] select-none cursor-pointer">
            <div class="w-full rounded-2xl overflow-hidden {{ $isCherry ? 'bg-[#580D14] border-2 border-[#580D14] shadow-[0_6px_18px_rgba(88,13,20,0.18)]' : 'bg-[#FAF7F0] border-2 border-white shadow-[0_6px_18px_rgba(0,0,0,0.08)]' }} transition-transform duration-300 hover:scale-[1.02] active:scale-[0.98]">
              <!-- Photo -->
              <div class="h-[150px] sm:h-[170px] w-full {{ $isCherry ? 'bg-[#380810]' : 'bg-[#E5E0D5]' }} overflow-hidden relative">
                <img src="{{ $card['image'] }}" alt="{{ $card['alt'] }}"
                  class="w-full h-full object-cover pointer-events-none">
              </div>
              <!-- Scallop Cut & Footer -->
              <div class="relative -mt-3 sm:-mt-3.5 z-10 {{ $isCherry ? 'text-[#580D14] bg-[#580D14]' : 'text-[#FAF7F0] bg-[#FAF7F0]' }}">
                <svg viewBox="0 0 280 20" preserveAspectRatio="none" class="w-full h-3 sm:h-3.5 block -mb-[1px] fill-current">
                  <path
                    d="M 0,20 L 0,10 A 17.5 10 0 0,1 35,10 A 17.5 10 0 0,1 70,10 A 17.5 10 0 0,1 105,10 A 17.5 10 0 0,1 140,10 A 17.5 10 0 0,1 175,10 A 17.5 10 0 0,1 210,10 A 17.5 10 0 0,1 245,10 A 17.5 10 0 0,1 280,10 L 280,20 Z" />
                </svg>
                <div class="px-2.5 pt-0.5 pb-2.5 text-center min-h-[46px] flex items-center justify-center">
                  <p class="font-display font-bold text-[11px] sm:text-xs leading-snug {{ $isCherry ? 'text-[#FAF7F0]' : 'text-[#580D14]' }}">
                    {{ $card['title'] }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Set B (Duplicate for Seamless Infinite Marquee) -->
      <div class="flex items-center gap-3.5 sm:gap-4 shrink-0 pr-3.5 sm:pr-4" aria-hidden="true">
        @foreach ($heroCards as $card)
          @php
            $isCherry = $card['theme'] === 'cherry';
          @endphp
          <div class="relative flex-shrink-0 w-[145px] sm:w-[165px] select-none cursor-pointer">
            <div class="w-full rounded-2xl overflow-hidden {{ $isCherry ? 'bg-[#580D14] border-2 border-[#580D14] shadow-[0_6px_18px_rgba(88,13,20,0.18)]' : 'bg-[#FAF7F0] border-2 border-white shadow-[0_6px_18px_rgba(0,0,0,0.08)]' }} transition-transform duration-300 hover:scale-[1.02] active:scale-[0.98]">
              <!-- Photo -->
              <div class="h-[150px] sm:h-[170px] w-full {{ $isCherry ? 'bg-[#380810]' : 'bg-[#E5E0D5]' }} overflow-hidden relative">
                <img src="{{ $card['image'] }}" alt="{{ $card['alt'] }}"
                  class="w-full h-full object-cover pointer-events-none">
              </div>
              <!-- Scallop Cut & Footer -->
              <div class="relative -mt-3 sm:-mt-3.5 z-10 {{ $isCherry ? 'text-[#580D14] bg-[#580D14]' : 'text-[#FAF7F0] bg-[#FAF7F0]' }}">
                <svg viewBox="0 0 280 20" preserveAspectRatio="none" class="w-full h-3 sm:h-3.5 block -mb-[1px] fill-current">
                  <path
                    d="M 0,20 L 0,10 A 17.5 10 0 0,1 35,10 A 17.5 10 0 0,1 70,10 A 17.5 10 0 0,1 105,10 A 17.5 10 0 0,1 140,10 A 17.5 10 0 0,1 175,10 A 17.5 10 0 0,1 210,10 A 17.5 10 0 0,1 245,10 A 17.5 10 0 0,1 280,10 L 280,20 Z" />
                </svg>
                <div class="px-2.5 pt-0.5 pb-2.5 text-center min-h-[46px] flex items-center justify-center">
                  <p class="font-display font-bold text-[11px] sm:text-xs leading-snug {{ $isCherry ? 'text-[#FAF7F0]' : 'text-[#580D14]' }}">
                    {{ $card['title'] }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Desktop Hero Cards: 6 Tactile Cards (Cream & Cherry Alternating, Fanned -> Straightened on Scroll) -->
  <div class="hidden lg:block relative w-full max-w-[1380px] mx-auto px-4">
    <div id="hero-cards-track"
      class="hero-cards-track flex items-center justify-center py-4 sm:py-5 px-3 sm:px-4">
      @foreach ($heroCards as $index => $card)
        @php
          $cardNum = $index + 1;
          $isCherry = $card['theme'] === 'cherry';
          $zIndex = in_array($cardNum, [2, 4, 6]) ? 'z-20' : 'z-10';
        @endphp
        <!-- Card {{ $cardNum }} -->
        <div
          class="hero-card-fan hero-card-{{ $cardNum }} relative flex-shrink-0 w-[185px] xl:w-[195px] select-none {{ $zIndex }} cursor-pointer">
          <div
            class="hero-card-inner w-full rounded-2xl overflow-hidden {{ $isCherry ? 'bg-[#580D14] border-2 border-[#580D14] shadow-[0_8px_20px_rgba(0,0,0,0.15)]' : 'bg-[#FAF7F0] border-2 border-white shadow-[0_8px_20px_rgba(0,0,0,0.1)]' }}">
            <!-- Photo -->
            <div class="h-[190px] xl:h-[205px] w-full {{ $isCherry ? 'bg-[#380810]' : 'bg-[#E5E0D5]' }} overflow-hidden relative">
              <img src="{{ $card['image'] }}" alt="{{ $card['alt'] }}"
                class="w-full h-full object-cover pointer-events-none">
            </div>
            <!-- Scallop Cut & Footer -->
            <div class="relative -mt-3.5 z-10 {{ $isCherry ? 'text-[#580D14] bg-[#580D14]' : 'text-[#FAF7F0] bg-[#FAF7F0]' }}">
              <svg viewBox="0 0 280 20" preserveAspectRatio="none" class="w-full h-3.5 block -mb-[1px] fill-current">
                <path
                  d="M 0,20 L 0,10 A 17.5 10 0 0,1 35,10 A 17.5 10 0 0,1 70,10 A 17.5 10 0 0,1 105,10 A 17.5 10 0 0,1 140,10 A 17.5 10 0 0,1 175,10 A 17.5 10 0 0,1 210,10 A 17.5 10 0 0,1 245,10 A 17.5 10 0 0,1 280,10 L 280,20 Z" />
              </svg>
              <div class="px-2.5 pt-0.5 pb-2.5 text-center min-h-[46px] flex items-center justify-center">
                <p class="font-display font-bold text-xs leading-snug {{ $isCherry ? 'text-[#FAF7F0]' : 'text-[#580D14]' }}">
                  {{ $card['title'] }}
                </p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>
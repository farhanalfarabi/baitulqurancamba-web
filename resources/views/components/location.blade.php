<!-- Campus Location & Google Maps Section (Style 1: Tactile GPS Radar & Campus Navigator Console) -->
<section id="location" class="py-20 sm:py-28 bg-[#FAF7F0] bg-dot-matrix relative overflow-hidden">
  
  <!-- Decorative Floating Stickers -->
  <div class="hidden lg:block absolute top-12 left-10 w-24 h-auto tilt-left opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-van.svg" alt="Campus Travel Van Sticker" class="w-full h-auto drop-shadow-lg">
  </div>
  <div class="hidden lg:block absolute top-20 right-12 w-20 h-auto tilt-right opacity-90 pointer-events-none z-10">
    <img src="/assets/images/sticker-starburst.svg" alt="Compass Starburst Sticker" class="w-full h-auto drop-shadow-lg">
  </div>

  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">

    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
      <div class="stamp-badge stamp-badge-red mb-4 inline-block">
        CAMPUS RADAR & GPS NAVIGATION
      </div>
      <h2 class="font-display font-black text-4xl sm:text-6xl text-[#121212] uppercase tracking-tight leading-none">
        FIND OUR CAMPUS<br>
        <span class="inline-block mt-2 px-5 py-2 bg-[#121212] text-lime rounded-xl border-2 border-[#161616] tilt-right transform text-3xl sm:text-5xl">
          CAMBA, SOUTH SULAWESI
        </span>
      </h2>
      <p class="font-body text-base sm:text-lg text-[#555555] font-medium mt-6 leading-relaxed">
        Nestled in the pristine mountain highlands of Maros Regency. A serene, cool, and focused sanctuary dedicated to Tahfizh Al-Qur'an and character excellence.
      </p>
    </div>

    <!-- Retro GPS Navigator Console Window -->
    <div class="rounded-3xl bg-white border-[3px] border-[#121212] brutal-shadow-xl overflow-hidden">
      
      <!-- Top Console Header Bar -->
      <div class="bg-[#121212] text-white px-4 sm:px-6 py-3.5 flex flex-wrap items-center justify-between gap-3 border-b-[3px] border-[#121212]">
        
        <!-- Left: Window Controls & Live Signal -->
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-1.5" aria-hidden="true">
            <span class="w-3 h-3 rounded-full bg-[#E53935] inline-block border border-black/30"></span>
            <span class="w-3 h-3 rounded-full bg-amber-400 inline-block border border-black/30"></span>
            <span class="w-3 h-3 rounded-full bg-lime inline-block border border-black/30"></span>
          </div>

          <div class="h-4 w-[1px] bg-white/20 mx-1 hidden sm:block"></div>

          <!-- Pulsing Live Radar Indicator -->
          <div class="flex items-center gap-2">
            <span class="relative flex h-2.5 w-2.5">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-lime opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-lime"></span>
            </span>
            <span class="font-mono text-[11px] sm:text-xs uppercase tracking-wider text-lime font-bold">
              LIVE GPS RADAR
            </span>
          </div>
        </div>

        <!-- Center: Interactive Filter Modes (Normal / High Contrast / Night Radar) -->
        <div class="flex items-center gap-1.5 bg-[#1e1e1e] p-1 rounded-xl border border-white/10 text-[11px] font-label font-bold">
          <button type="button" id="map-mode-default" class="map-mode-btn px-2.5 py-1 rounded-lg bg-lime text-[#121212] transition-colors cursor-pointer" data-filter="none">
            Default
          </button>
          <button type="button" id="map-mode-vibrant" class="map-mode-btn px-2.5 py-1 rounded-lg text-white/80 hover:text-white transition-colors cursor-pointer" data-filter="contrast(1.15) saturate(1.25)">
            Vibrant
          </button>
          <button type="button" id="map-mode-night" class="map-mode-btn px-2.5 py-1 rounded-lg text-white/80 hover:text-white transition-colors cursor-pointer" data-filter="invert(90%) hue-rotate(180deg) contrast(1.15)">
            Night Radar
          </button>
        </div>

        <!-- Right: Monospace Coordinates Badge + Copy Action -->
        <div class="flex items-center gap-2">
          <button type="button" id="btn-copy-coordinates" class="font-mono text-[11px] sm:text-xs font-bold text-white bg-[#1e1e1e] hover:bg-[#2a2a2a] px-3 py-1.5 rounded-lg border border-white/20 transition-all flex items-center gap-2 cursor-pointer group" title="Click to copy coordinates">
            <span id="coords-text">LAT -4.91386° · LNG 119.84656°</span>
            <svg id="copy-icon" class="w-3.5 h-3.5 text-lime group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
            </svg>
            <span id="copy-success-badge" class="hidden text-lime font-label font-bold text-[10px] uppercase">COPIED!</span>
          </button>
        </div>

      </div>

      <!-- Map Viewport & Interactive HUD -->
      <div class="relative w-full h-[460px] sm:h-[560px] bg-[#E5E3DF] overflow-hidden">
        
        <!-- Google Maps Embed Iframe -->
        <iframe
          id="google-maps-frame"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.242982885935!2d119.84399227585507!3d-4.913859949791484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbe61712cc6b2f7%3A0xfce6c0fd433a7e6d!2sPondok%20Pesantren%20Tahfizh%20Baitul%20Qur'an%20Camba!5e0!3m2!1sen!2sid!4v1729567000000!5m2!1sen!2sid"
          width="100%"
          height="100%"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="Google Maps - Pondok Pesantren Tahfizh Baitul Qur'an Camba"
          class="w-full h-full min-h-[460px] sm:min-h-[560px] transition-all duration-500 ease-in-out"
        ></iframe>

        <!-- Floating Tactile HUD Card Overlay -->
        <div class="absolute bottom-4 left-4 right-4 sm:right-auto sm:left-6 sm:bottom-6 sm:max-w-md bg-white/95 backdrop-blur-md rounded-2xl border-2 border-[#121212] brutal-shadow-lg p-5 z-20 transition-all">
          
          <!-- Verified Pin Badge -->
          <div class="flex items-center justify-between gap-2 mb-3">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-[#121212] text-lime font-mono text-[10px] font-bold tracking-wider uppercase">
              <span>📍 VERIFIED CAMPUS PIN</span>
            </div>
            <div class="flex items-center gap-1 font-label text-xs font-bold text-[#121212]">
              <span class="text-amber-500">★★★★★</span>
              <span>5.0</span>
            </div>
          </div>

          <!-- Institution Name -->
          <h3 class="font-display font-black text-lg sm:text-xl text-[#121212] uppercase tracking-tight leading-snug mb-2">
            Pondok Pesantren Tahfizh Baitul Qur'an Camba
          </h3>

          <!-- Address -->
          <p class="font-body text-xs text-[#555555] leading-relaxed mb-4">
            Jumpulu, Link. Mallisu, Kel. Cempaniga, Kec. Camba, Kab. Maros, Sulawesi Selatan 90562, Indonesia
          </p>

          <!-- Transit Highlights Chips -->
          <div class="flex flex-wrap gap-1.5 mb-5 text-[11px] font-label font-bold text-[#121212]">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-[#FAF7F0] border border-[#121212]/20">
              ✈️ ~90 Mins from Hasanuddin Airport (UPG)
            </span>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-[#FAF7F0] border border-[#121212]/20">
              🛣️ Maros – Bone Highway Route
            </span>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
            
            <!-- Get Directions CTA -->
            <a
              href="https://www.google.com/maps/dir/?api=1&destination=-4.91386,119.8465672"
              target="_blank"
              rel="noopener noreferrer"
              class="btn-tactile flex-1 bg-lime text-[#121212] border-2 border-[#121212] rounded-xl px-4 py-2.5 font-display font-black text-xs uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer brutal-shadow-sm text-center"
            >
              <span>GET DIRECTIONS</span>
              <span class="text-xs">➔</span>
            </a>

            <!-- Open in Maps -->
            <a
              href="https://www.google.com/maps/place/Pondok+Pesantren+Tahfizh+Baitul+Qur'an+Camba/@-4.91386,119.8465672,17z"
              target="_blank"
              rel="noopener noreferrer"
              class="btn-tactile bg-white text-[#121212] border-2 border-[#121212] rounded-xl px-3.5 py-2.5 font-label font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 cursor-pointer brutal-shadow-sm"
              title="Open full Google Maps page"
            >
              <svg class="w-3.5 h-3.5 text-[#121212]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
              </svg>
              <span>OPEN MAPS</span>
            </a>

            <!-- Share Button -->
            <button
              type="button"
              id="btn-share-location"
              class="btn-tactile bg-[#FAF7F0] hover:bg-white text-[#121212] border-2 border-[#121212] rounded-xl px-3 py-2.5 font-label font-bold text-xs uppercase tracking-wider flex items-center justify-center cursor-pointer brutal-shadow-sm"
              title="Share or copy campus location link"
            >
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
              </svg>
            </button>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Coordinates Copied Toast Notification -->
  <div
    id="location-toast"
    class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 pointer-events-none transition-all duration-300 flex items-center gap-3 bg-[#121212] text-white px-5 py-3.5 rounded-2xl border-2 border-lime brutal-shadow-lg"
    role="alert"
  >
    <div class="w-6 h-6 rounded-full bg-lime text-[#121212] flex items-center justify-center font-black text-xs">
      ✓
    </div>
    <div class="text-xs font-label">
      <span class="font-bold text-lime block" id="toast-title">COPIED TO CLIPBOARD</span>
      <span class="text-white/80" id="toast-message">Campus coordinates copied successfully.</span>
    </div>
  </div>

</section>

<!-- Interactive Map Script -->
<script>
  (function () {
    const coordsString = "-4.91386, 119.8465672";
    const mapsShareUrl = "https://www.google.com/maps/place/Pondok+Pesantren+Tahfizh+Baitul+Qur'an+Camba/@-4.91386,119.8465672,17z";

    // Toast helper
    function showLocationToast(title, message) {
      const toast = document.getElementById('location-toast');
      const titleEl = document.getElementById('toast-title');
      const msgEl = document.getElementById('toast-message');
      if (!toast || !titleEl || !msgEl) return;

      titleEl.textContent = title;
      msgEl.textContent = message;
      toast.classList.remove('translate-y-24', 'opacity-0', 'pointer-events-none');

      clearTimeout(window._locationToastTimeout);
      window._locationToastTimeout = setTimeout(() => {
        toast.classList.add('translate-y-24', 'opacity-0', 'pointer-events-none');
      }, 3000);
    }

    // 1. Copy Coordinates
    const copyBtn = document.getElementById('btn-copy-coordinates');
    const copyBadge = document.getElementById('copy-success-badge');
    const coordsText = document.getElementById('coords-text');

    if (copyBtn) {
      copyBtn.addEventListener('click', async () => {
        try {
          await navigator.clipboard.writeText(coordsString);
          if (copyBadge) copyBadge.classList.remove('hidden');
          if (coordsText) coordsText.classList.add('hidden');

          showLocationToast("COORDINATES COPIED", coordsString);

          setTimeout(() => {
            if (copyBadge) copyBadge.classList.add('hidden');
            if (coordsText) coordsText.classList.remove('hidden');
          }, 2500);
        } catch (err) {
          showLocationToast("COORDINATES", coordsString);
        }
      });
    }

    // 2. Share Location
    const shareBtn = document.getElementById('btn-share-location');
    if (shareBtn) {
      shareBtn.addEventListener('click', async () => {
        if (navigator.share) {
          try {
            await navigator.share({
              title: "Pondok Pesantren Tahfizh Baitul Qur'an Camba",
              text: "Campus Location of Pondok Pesantren Tahfizh Baitul Qur'an Camba, Maros, South Sulawesi",
              url: mapsShareUrl
            });
          } catch (e) {
            // cancelled or unsupported
          }
        } else {
          try {
            await navigator.clipboard.writeText(mapsShareUrl);
            showLocationToast("LINK COPIED", "Google Maps location link copied to clipboard.");
          } catch (e) {
            window.open(mapsShareUrl, '_blank');
          }
        }
      });
    }

    // 3. Map View Filter Modes (Default, Vibrant, Night Radar)
    const modeButtons = document.querySelectorAll('.map-mode-btn');
    const mapFrame = document.getElementById('google-maps-frame');

    modeButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const filterVal = btn.getAttribute('data-filter') || 'none';
        
        // Update active button styling
        modeButtons.forEach(b => {
          b.classList.remove('bg-lime', 'text-[#121212]');
          b.classList.add('text-white/80');
        });
        btn.classList.add('bg-lime', 'text-[#121212]');
        btn.classList.remove('text-white/80');

        // Apply CSS filter smoothly to iframe
        if (mapFrame) {
          mapFrame.style.filter = filterVal;
        }
      });
    });
  })();
</script>

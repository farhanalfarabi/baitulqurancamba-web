<!-- Marquee Social Proof & Community Voices Section -->
<section id="community-buzz" class="py-16 sm:py-24 bg-[#FAF7F0] relative overflow-hidden border-b border-[#121212]/10">
  
  <style>
    @keyframes marqueeLeft {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }

    @keyframes marqueeRight {
      0% {
        transform: translateX(-50%);
      }
      100% {
        transform: translateX(0);
      }
    }

    .marquee-track-forward {
      display: flex;
      width: max-content;
      animation: marqueeLeft 38s linear infinite;
    }

    .marquee-track-reverse {
      display: flex;
      width: max-content;
      animation: marqueeRight 38s linear infinite;
    }

    .marquee-container:hover .marquee-track-forward,
    .marquee-container:hover .marquee-track-reverse {
      animation-play-state: paused;
    }
  </style>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-10 sm:mb-14">
    <!-- Stamp Badge -->
    <div class="stamp-badge stamp-badge-lime mb-3 tilt-left inline-block">
      SUARA & KISAH KOMUNITAS
    </div>
    <h2 class="font-display font-black text-3xl sm:text-5xl text-[#121212] uppercase tracking-tight">
      APA KATA MEREKA
    </h2>
    <p class="font-body text-sm sm:text-base text-slate-600 mt-2 max-w-xl mx-auto font-medium">
      Refleksi tulus dan pengalaman berkesan dari para orang tua, alumni, dan keluarga besar pesantren.
    </p>
  </div>

  <!-- Dual Marquee Streams -->
  <div class="marquee-container flex flex-col gap-6 relative isolation-isolate w-full overflow-hidden select-none">
    
    <!-- Left & Right Gradient Fade Edges -->
    <div class="pointer-events-none absolute left-0 top-0 h-full w-16 sm:w-32 z-20 bg-gradient-to-r from-[#FAF7F0] via-[#FAF7F0]/90 to-transparent"></div>
    <div class="pointer-events-none absolute right-0 top-0 h-full w-16 sm:w-32 z-20 bg-gradient-to-l from-[#FAF7F0] via-[#FAF7F0]/90 to-transparent"></div>

    <!-- Row 1 (Forward Direction) -->
    <div class="marquee-track-forward py-2">
      
      <!-- Track Set A -->
      <div class="flex items-center gap-5 shrink-0 pr-5">
        
        <!-- Card 1: Farhan R. (Using user's photo foto-aku.png) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <img class="w-12 h-12 rounded-full object-cover border-2 border-[#D4FF00] shadow-sm shrink-0" 
                 src="{{ asset('assets/images/foto/foto-aku.png') }}" 
                 alt="Farhan R." />
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Farhan R.</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Alumni 30 Juz • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Menyelesaikan 30 juz mutqin di Camba sambil menyelesaikan ijazah SMA formal memberi saya kedisiplinan yang nyata. Para asatidz selalu membimbing kami siang dan malam."
          </p>
        </div>

        <!-- Card 2: H. Imran Sulaiman (Parent) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#4A0E17] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              IS
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">H. Imran Sulaiman</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri Wustha • Makassar</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Awalnya kami khawatir melepas anak mondok di usia 12 tahun. Melihat adabnya yang santun, kebiasaannya yang rapi, dan mendengar lantunan Al-Qur'annya setiap pulang ke rumah membuat kami terharu."
          </p>
        </div>

        <!-- Card 3: Hj. Siti Nurhaliza (Parent) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#E53935] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              SN
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Hj. Siti Nurhaliza</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri Ulya • Maros</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Kombinasi ijazah formal terakreditasi negara dan tahfizh Al-Qur'an intensif memberikan bekal iman yang kokoh sekaligus jalan luas menuju perguruan tinggi bagi putra kami."
          </p>
        </div>

        <!-- Card 4: Ahmad Fauzan (Alumnus) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#D4FF00] text-[#121212] flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              AF
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ahmad Fauzan</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Alumni Angkatan 2024 • Mahasiswa</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Latihan muhadharah 3 bahasa (Arab, Inggris, dan Indonesia) setiap pekan melatih kepercayaan diri berbicara di depan umum yang sangat bermanfaat di dunia perkuliahan saat ini."
          </p>
        </div>

        <!-- Card 5: dr. H. Syamsuddin (Parent) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#161616] text-white flex items-center justify-center font-display font-black text-sm border-2 border-white/20 shrink-0">
              HS
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">dr. H. Syamsuddin</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri • Bone</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Udara pegunungan Camba yang sejuk serta lingkungan asrama yang bersih menciptakan suasana yang damai. Para santri dapat menghafal dengan nyaman tanpa distraksi."
          </p>
        </div>

        <!-- Card 6: Ustadz Ridwan, S.Pd.I -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#2A6B29] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              UR
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ustadz Ridwan, S.Pd.I</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Pembina Tahfizh • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Setiap santri mendapatkan bimbingan talaqqi harian secara individual. Menyaksikan para santri tumbuh menjadi penghafal Al-Qur'an yang berdedikasi dengan tajwid yang fasih adalah kebahagiaan tak ternilai."
          </p>
        </div>

      </div>

      <!-- Track Set B (Exact Duplicate for Seamless Infinite Loop - Zero Empty Space) -->
      <div class="flex items-center gap-5 shrink-0 pr-5" aria-hidden="true">
        
        <!-- Card 1 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <img class="w-12 h-12 rounded-full object-cover border-2 border-[#D4FF00] shadow-sm shrink-0" 
                 src="{{ asset('assets/images/foto/foto-aku.png') }}" 
                 alt="Farhan R." />
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Farhan R.</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Alumni 30 Juz • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Menyelesaikan 30 juz mutqin di Camba sambil menyelesaikan ijazah SMA formal memberi saya kedisiplinan yang nyata. Para asatidz selalu membimbing kami siang dan malam."
          </p>
        </div>

        <!-- Card 2 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#4A0E17] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              IS
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">H. Imran Sulaiman</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri Wustha • Makassar</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Awalnya kami khawatir melepas anak mondok di usia 12 tahun. Melihat adabnya yang santun, kebiasaannya yang rapi, dan mendengar lantunan Al-Qur'annya setiap pulang ke rumah membuat kami terharu."
          </p>
        </div>

        <!-- Card 3 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#E53935] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              SN
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Hj. Siti Nurhaliza</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri Ulya • Maros</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Kombinasi ijazah formal terakreditasi negara dan tahfizh Al-Qur'an intensif memberikan bekal iman yang kokoh sekaligus jalan luas menuju perguruan tinggi bagi putra kami."
          </p>
        </div>

        <!-- Card 4 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#D4FF00] text-[#121212] flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              AF
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ahmad Fauzan</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Alumni Angkatan 2024 • Mahasiswa</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Latihan muhadharah 3 bahasa (Arab, Inggris, dan Indonesia) setiap pekan melatih kepercayaan diri berbicara di depan umum yang sangat bermanfaat di dunia perkuliahan saat ini."
          </p>
        </div>

        <!-- Card 5 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#161616] text-white flex items-center justify-center font-display font-black text-sm border-2 border-white/20 shrink-0">
              HS
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">dr. H. Syamsuddin</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri • Bone</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Udara pegunungan Camba yang sejuk serta lingkungan asrama yang bersih menciptakan suasana yang damai. Para santri dapat menghafal dengan nyaman tanpa distraksi."
          </p>
        </div>

        <!-- Card 6 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#2A6B29] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              UR
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ustadz Ridwan, S.Pd.I</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Pembina Tahfizh • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Setiap santri mendapatkan bimbingan talaqqi harian secara individual. Menyaksikan para santri tumbuh menjadi penghafal Al-Qur'an yang berdedikasi dengan tajwid yang fasih adalah kebahagiaan tak ternilai."
          </p>
        </div>

      </div>

    </div>

    <!-- Row 2 (Reverse Direction) -->
    <div class="marquee-track-reverse py-2">
      
      <!-- Track Set A -->
      <div class="flex items-center gap-5 shrink-0 pr-5">
        
        <!-- Row 2 Card 1: Ibu Hj. Maryam (Parent) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#4A0E17] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              MH
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ibu Hj. Maryam</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali dari 2 Santri • Gowa</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Kedua putra saya menimba ilmu di Baitul Qur'an. Hal yang paling menyentuh hati kami adalah bagaimana mereka kini jauh lebih berbakti, sopan, dan perhatian kepada orang tua dan keluarga."
          </p>
        </div>

        <!-- Row 2 Card 2: Farhan R. (Using user's photo foto-aku.png) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <img class="w-12 h-12 rounded-full object-cover border-2 border-[#D4FF00] shadow-sm shrink-0" 
                 src="{{ asset('assets/images/foto/foto-aku.png') }}" 
                 alt="Farhan R." />
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Farhan R.</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Alumni & Pembina • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Dari halaqah tahfizh ba'da Shubuh hingga panahan dan futsal di sore hari, persaudaraan di sini sangat erat. Santri tidak hanya lulus sebagai hafizh, tetapi juga saudara seumur hidup."
          </p>
        </div>

        <!-- Row 2 Card 3: Ir. H. Bachtiar (Parent) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#161616] text-white flex items-center justify-center font-display font-black text-sm border-2 border-white/20 shrink-0">
              HB
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ir. H. Bachtiar</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri • Maros</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Perkembangan akademik yang transparan, laporan hafalan berkala, serta para asatidz yang komunikatif saat orang tua membutuhkan arahan. Manajemen pesantren yang sangat profesional."
          </p>
        </div>

        <!-- Row 2 Card 4: Muh. Alif Iwan (Medalist Santri) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#D4FF00] text-[#121212] flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              AI
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Muh. Alif Iwan</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Peraih 3 Medali Perak • Santri SMP</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Para pembina selalu mendukung dan memotivasi kami untuk berkompetisi di olimpiade nasional bidang bahasa Arab dan studi Islam, sembari tetap menjaga target hafalan 30 juz harian."
          </p>
        </div>

        <!-- Row 2 Card 5: Hj. Nurul Fadhilah (Parent) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#E53935] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              NF
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Hj. Nurul Fadhilah</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri Penerima Beasiswa • Makassar</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Program beasiswa penuh bagi dhuafa dan anak yatim memberikan martabat setara serta pendidikan berstandar tinggi bagi generasi penghafal Al-Qur'an berbakat."
          </p>
        </div>

        <!-- Row 2 Card 6: Ustadz H. Wahyuddin (Sanad Examiner) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#4A0E17] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              HW
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ustadz H. Wahyuddin</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Dewan Penguji Sanad • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Setiap lulusan wajib lulus ujian tasmi' yang ketat sebelum meraih sanad resmi. Kedisiplinan dan ketepatan tajwid yang dijaga di pondok ini benar-benar berkualitas tinggi."
          </p>
        </div>

      </div>

      <!-- Track Set B (Exact Duplicate for Seamless Infinite Loop - Zero Empty Space) -->
      <div class="flex items-center gap-5 shrink-0 pr-5" aria-hidden="true">
        
        <!-- Row 2 Card 1 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#4A0E17] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              MH
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ibu Hj. Maryam</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali dari 2 Santri • Gowa</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Kedua putra saya menimba ilmu di Baitul Qur'an. Hal yang paling menyentuh hati kami adalah bagaimana mereka kini jauh lebih berbakti, sopan, dan perhatian kepada orang tua dan keluarga."
          </p>
        </div>

        <!-- Row 2 Card 2 Duplicate (foto-aku.png) -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <img class="w-12 h-12 rounded-full object-cover border-2 border-[#D4FF00] shadow-sm shrink-0" 
                 src="{{ asset('assets/images/foto/foto-aku.png') }}" 
                 alt="Farhan R." />
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Farhan R.</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Alumni & Pembina • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Dari halaqah tahfizh ba'da Shubuh hingga panahan dan futsal di sore hari, persaudaraan di sini sangat erat. Santri tidak hanya lulus sebagai hafizh, tetapi juga saudara seumur hidup."
          </p>
        </div>

        <!-- Row 2 Card 3 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#161616] text-white flex items-center justify-center font-display font-black text-sm border-2 border-white/20 shrink-0">
              HB
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ir. H. Bachtiar</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri • Maros</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Perkembangan akademik yang transparan, laporan hafalan berkala, serta para asatidz yang komunikatif saat orang tua membutuhkan arahan. Manajemen pesantren yang sangat profesional."
          </p>
        </div>

        <!-- Row 2 Card 4 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#D4FF00] text-[#121212] flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              AI
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Muh. Alif Iwan</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Peraih 3 Medali Perak • Santri SMP</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Para pembina selalu mendukung dan memotivasi kami untuk berkompetisi di olimpiade nasional bidang bahasa Arab dan studi Islam, sembari tetap menjaga target hafalan 30 juz harian."
          </p>
        </div>

        <!-- Row 2 Card 5 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#E53935] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              NF
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Hj. Nurul Fadhilah</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Wali Santri Penerima Beasiswa • Makassar</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Program beasiswa penuh bagi dhuafa dan anak yatim memberikan martabat setara serta pendidikan berstandar tinggi bagi generasi penghafal Al-Qur'an berbakat."
          </p>
        </div>

        <!-- Row 2 Card 6 Duplicate -->
        <div class="p-5 rounded-2xl shadow-[0_4px_16px_rgba(0,0,0,0.06)] hover:shadow-xl transition-all duration-300 w-80 sm:w-88 shrink-0 bg-white border border-[#121212]/15 hover:-translate-y-1">
          <div class="flex items-center gap-3.5">
            <div class="w-12 h-12 rounded-full bg-[#2A6B29] text-white flex items-center justify-center font-display font-black text-sm border-2 border-[#161616] shrink-0">
              UR
            </div>
            <div class="flex flex-col text-left">
              <div class="flex items-center gap-1.5">
                <span class="font-display font-black text-sm text-[#121212]">Ustadz Ridwan, S.Pd.I</span>
                <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-[#161616] text-[#D4FF00] text-[9px] font-black">✓</span>
              </div>
              <span class="text-[11px] text-slate-500 font-label font-bold uppercase tracking-wider">Dewan Penguji Sanad • Camba</span>
            </div>
          </div>
          <p class="text-xs sm:text-[13px] pt-3.5 text-slate-700 text-left font-body leading-relaxed font-medium">
            "Setiap lulusan wajib lulus ujian tasmi' yang ketat sebelum meraih sanad resmi. Kedisiplinan dan ketepatan tajwid yang dijaga di pondok ini benar-benar berkualitas tinggi."
          </p>
        </div>

      </div>

    </div>

  </div>
</section>

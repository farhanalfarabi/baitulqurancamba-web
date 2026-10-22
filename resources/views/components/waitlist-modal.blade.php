<!-- Admissions Interactive Modal Dialog Component -->
<div id="waitlist-modal" class="fixed inset-0 z-50 hidden modal-overlay flex items-center justify-center p-4">
  <div class="relative w-full max-w-md rounded-3xl bg-[#FAF7F0] border-2 border-white/80 shadow-2xl p-6 sm:p-8 modal-enter">
    
    <!-- Close Button -->
    <button id="btn-close-modal" aria-label="Tutup dialog" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white text-[#121212] border border-[#161616]/20 shadow-sm flex items-center justify-center text-xs font-black hover:bg-gray-100 transition-colors cursor-pointer">
      ✕
    </button>

    <!-- Content State -->
    <div class="text-left mb-6">
      <div class="stamp-badge stamp-badge-red mb-2">Penerimaan Santri 2026/2027</div>
      <h3 class="font-display font-black text-2xl uppercase tracking-tight text-[#121212]">
        Pendaftaran Santri Baru
      </h3>
      <p class="font-body text-xs text-slate-muted font-medium mt-1">
        Formulir resmi pendaftaran calon santri jenjang Wustha, Ulya, atau Tahfizh Khusus.
      </p>
    </div>

    <div class="space-y-4">
      <p class="font-body text-xs sm:text-sm text-[#121212]/80 leading-relaxed font-medium">
        Pendaftaran calon santri baru kini terintegrasi langsung melalui Google Form resmi Pondok Pesantren Tahfizh Baitul Qur'an Camba.
      </p>

      <div class="pt-2">
        <a href="https://forms.gle/dUHmyuv98pgXiPcS7" target="_blank" rel="noopener noreferrer" class="w-full bg-white p-1 rounded-xl shadow-md flex items-center justify-center transition-transform hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
          <div class="w-full bg-lime text-[#121212] border-2 border-[#161616] rounded-lg py-3.5 flex items-center justify-center gap-2.5 font-display font-black text-xs sm:text-[13px] uppercase tracking-wider">
            <span>Buka Formulir di Google Form</span>
            <span class="w-5 h-5 rounded-full bg-[#E53935] text-white flex items-center justify-center text-[10px] font-black">➔</span>
          </div>
        </a>
      </div>
    </div>

    <!-- Success State -->
    <div id="waitlist-success" class="hidden text-center py-6 space-y-4">
      <div class="w-16 h-16 mx-auto rounded-2xl bg-lime border-2 border-[#161616] shadow-md flex items-center justify-center text-3xl">
        🎉
      </div>
      <h3 class="font-display font-black text-2xl uppercase tracking-tight text-[#121212]">
        Pendaftaran Berhasil Dikirim!
      </h3>
      <p class="font-body text-xs sm:text-sm text-slate-muted font-medium max-w-xs mx-auto leading-relaxed">
        Jazakumullah khairan. Data ananda telah kami terima. Tim sekretariat pendaftaran akan segera menghubungi nomor WhatsApp Anda.
      </p>
      <div class="pt-2">
        <button id="btn-reset-form" class="px-6 py-2.5 rounded-xl bg-white border border-[#161616]/30 shadow-sm font-label font-bold text-xs uppercase tracking-wider hover:bg-gray-50 transition-colors">
          Tutup & Kembali
        </button>
      </div>
    </div>

  </div>
</div>

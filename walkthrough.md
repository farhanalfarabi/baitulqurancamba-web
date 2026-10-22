# Walkthrough - Migrasi Website & Integrasi Link Google Form

## Ringkasan Perubahan
1. **Master Layout Blade**:
   - Dibuat di [`resources/views/components/layouts/app.blade.php`](file:///d:/Testing%20Claude%20code/pondok-camba/resources/views/components/layouts/app.blade.php) yang memuat konfigurasi Tailwind CSS, styling Tactile Neo-Brutalist (`design-system.css`), serta script interaktivitas (`main.js` & `motion.js`).
2. **16 Blade Components**:
   - Dikonversi dari HTML modular ke [`resources/views/components/`](file:///d:/Testing%20Claude%20code/pondok-camba/resources/views/components/):
     - `<x-navbar />`
     - `<x-hero />`
     - `<x-about />`
     - `<x-curriculum />`
     - `<x-prestasi />`
     - `<x-testimonials />`
     - `<x-marquee />`
     - `<x-coverflow />`
     - `<x-founder />`
     - `<x-pricing />`
     - `<x-partner />`
     - `<x-faq />`
     - `<x-interactive-laptop />`
     - `<x-waitlist-modal />`
     - `<x-gallery-content />`
     - `<x-footer />`
3. **Views Halaman**:
   - [`resources/views/home.blade.php`](file:///d:/Testing%20Claude%20code/pondok-camba/resources/views/home.blade.php): Landing page utama.
   - [`resources/views/gallery.blade.php`](file:///d:/Testing%20Claude%20code/pondok-camba/resources/views/gallery.blade.php): Halaman galeri dokumentasi santri.
4. **Routing**:
   - [`routes/web.php`](file:///d:/Testing%20Claude%20code/pondok-camba/routes/web.php): Didaftarkan route `/` (`home`) dan `/gallery` (`gallery`).
5. **Integrasi Link Pendaftaran (Google Form)**:
   - Target URL: `https://forms.gle/dUHmyuv98pgXiPcS7`
   - Semua tombol "Daftar Sekarang", "Daftar Santri Baru", dan CTA pendaftaran di Navbar, Hero, Kurikulum, Biaya (Pricing), Testimoni, Prestasi, Footer, dan Galeri kini langsung membuka Google Form di tab baru (`target="_blank"`).
   - Diperbarui juga fungsi `initWaitlistModal()` di [`public/assets/js/main.js`](file:///d:/Testing%20Claude%20code/pondok-camba/public/assets/js/main.js) agar setiap klik pada trigger pendaftaran otomatis membuka Google Form tersebut.
7. **Penyempurnaan Marquee (Zero-Gap Infinite Loop & Human Text)**:
   - File: [`resources/views/components/marquee.blade.php`](file:///d:/Testing%20Claude%20code/pondok-camba/resources/views/components/marquee.blade.php)
   - **Root Cause Kekosongan**: Sebelumnya container menggunakan `min-w-[200%]` dengan jumlah kartu yang terlalu sedikit (hanya 4 kartu unik dan 2 duplikat), sehingga terdapat area kosong lebih dari 2000px di layar lebar.
   - **Solusi**: Diimplementasikan arsitektur dual-track (`width: max-content`, Set A 6 kartu + Set B 6 kartu identik, animasi `translateX(-50%)`) sehingga kartu berputar terus-menerus tanpa ada celah kosong sama sekali.
   - **Teks Alami (Non-AI)**: Nama fiktif berbahasa Inggris AI diganti dengan persona autentik pesantren (Farhan R. Alumnus 30 Juz, wali santri Wustha/Ulya, alumni berprestasi, mentor tahfizh).
   - **Foto Profil**: Foto asli pengguna [`public/assets/images/foto/foto-aku.png`](file:///d:/Testing%20Claude%20code/pondok-camba/public/assets/images/foto/foto-aku.png) dipasang pada kartu testimoni Farhan R. (Alumnus 30 Juz & Mentor).

---

## Manual Verification Guide (Panduan Verifikasi Manual)

### 1. Memeriksa Server Lokal
Pastikan server Anda berjalan (saat ini aktif di port 8001):
```bash
php artisan serve --port=8001
```

### 2. Pengujian Tombol "Daftar Sekarang" pada Halaman Beranda (`/`)
- **Buka Browser**: Kunjungi `http://127.0.0.1:8001/`
- **Tombol di Navbar**:
  - Klik tombol hijau "DAFTAR SEKARANG" di navbar pojok kanan atas.
  - **Ekspektasi**: Browser langsung membuka tab baru mengarah ke Google Form resmi: `https://forms.gle/dUHmyuv98pgXiPcS7`.
- **Tombol di Hero Section**:
  - Klik tombol "DAFTAR SEKARANG" di bawah teks pembuka hero banner.
  - **Ekspektasi**: Browser membuka tab baru ke Google Form yang sama.
- **Tombol di Section Kurikulum**:
  - Scroll ke bagian "Kurikulum" dan klik tombol "DAFTAR SEKARANG" pada masing-masing kartu jenjang (Wustha, Ulya, Tahfizh).
  - **Ekspektasi**: Terbuka ke Google Form pendaftaran.
- **Tombol di Section Biaya Pendidikan (Pricing)**:
  - Scroll ke tabel biaya, klik tombol "Daftar Jenjang Wustha", "Daftar Jenjang Ulya", atau "Daftar Tahfizh Khusus".
  - **Ekspektasi**: Terbuka ke Google Form pendaftaran.
- **Tombol di Bagian Footer**:
  - Scroll ke bagian paling bawah (footer), klik tombol "DAFTAR SEKARANG".
  - **Ekspektasi**: Terbuka ke Google Form pendaftaran.

### 3. Pengujian Marquee Testimoni ("APA KATA MEREKA")
- **Buka Browser**: Kunjungi `http://127.0.0.1:8001/` lalu scroll ke bagian **"APA KATA MEREKA"** (di bawah section "Cerita & Kesan Wali Santri").
- **Pemeriksaan Bahasa Indonesia**:
  - Badge: "SUARA & KISAH KOMUNITAS"
  - Judul: "APA KATA MEREKA"
  - Subjudul: "Refleksi tulus dan pengalaman berkesan dari para orang tua, alumni, dan keluarga besar pesantren."
  - Seluruh kartu ulasan (wali santri, alumni, pembina) dan label profesi/peran kini menggunakan Bahasa Indonesia yang fasih dan alami.
- **Pemeriksaan Kontinuitas (Zero-Gap)**:
  - Perhatikan kartu berjalan dari kanan ke kiri pada baris 1 dan sebaliknya pada baris 2.
  - **Ekspektasi**: Tidak ada area kosong di sisi kanan maupun saat looping; kartu-kartu berputar menyambung secara kontinu dan mulus tanpa jeda kosong.
  - Hover kursor di atas kartu, pastikan animasi otomatis terhenti sementara agar nyaman dibaca.
- **Pemeriksaan Foto & Teks**:
  - Perhatikan kartu **Farhan R.**: Menggunakan foto asli Anda (`foto-aku.png`) dengan badge centang verifikasi dan ulasan kelulusan 30 juz serta ijazah SMA.

### 4. Pengujian Halaman Galeri (`/gallery`)
- **Buka Browser**: Kunjungi `http://127.0.0.1:8001/gallery` (atau klik menu "Galeri" di navbar).
- **Tombol di Bagian Bawah Galeri**:
  - Scroll ke banner bawah halaman galeri, klik tombol "DAFTAR SANTRI BARU".
  - **Ekspektasi**: Terbuka ke Google Form pendaftaran `https://forms.gle/dUHmyuv98pgXiPcS7`.

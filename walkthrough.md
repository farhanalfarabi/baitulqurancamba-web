# Manual Verification Guide (Panduan Pengujian Manual)

Dokumen ini berisi panduan pengujian manual langkah demi langkah untuk memverifikasi landing page desktop **KRACKERZ** yang telah dipecah menjadi arsitektur modular per komponen.

---

## 1. Arsitektur Komponen Baru

File [index.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/index.html) kini sangat ringkas (hanya ~60 baris kode) dan memanggil komponen-komponen terpisah yang tersimpan rapi di dalam folder [components/](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components):

| Nama Komponen | Lokasi File | Deskripsi |
| :--- | :--- | :--- |
| **Navbar** | [components/navbar.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/navbar.html) | Sticky navigation bar, logo, link menu, tombol Join Waitlist, dan mobile drawer |
| **Hero** | [components/hero.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/hero.html) | Display title, maskot biskuit, pill badge, CTA hero, dan 4 polaroid card |
| **About** | [components/about.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/about.html) | Billboard bus stop halte kota dan 2 kartu cekung biskuit (*cracker-bite*) |
| **Curriculum** | [components/curriculum.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/curriculum.html) | Folder tabs interaktif (*Scenario Based* vs *Win Work Prep*) |
| **Testimonials** | [components/testimonials.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/testimonials.html) | 4 circular scalloped quote card pada kanvas Vintage Wine |
| **Founder** | [components/founder.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/founder.html) | Profil Penny, stiker dialog, 4 metrik pencapaian, tabel penghargaan, dan logo |
| **Pricing** | [components/pricing.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/pricing.html) | Switcher bulanan/tahunan dan 3 paket langganan (*Free, Ready to Krack, Students*) |
| **Partner** | [components/partner.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/partner.html) | Banner kemitraan komunitas desainer dan recruiter |
| **FAQ** | [components/faq.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/faq.html) | Accordion tanya-jawab dengan maskot biskuit jempol |
| **Interactive Laptop** | [components/interactive-laptop.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/interactive-laptop.html) | Permukaan MacBook dengan 8 stiker vinil yang dapat digeser bebas (*drag & drop*) |
| **Footer** | [components/footer.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/footer.html) | Form input waitlist bawah, stiker melayang, dan footer bar copyright |
| **Waitlist Modal** | [components/waitlist-modal.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/waitlist-modal.html) | Modal dialog pop-up dengan input form nama, email, role, dan status sukses |

---

## 2. Cara Menjalankan & Memverifikasi

Website dapat dibuka langsung tanpa kompilasi rumit:
- **Cara 1 (Direct Double-Click)**: Buka [index.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/index.html) langsung di browser Anda. (Komponen akan dimuat seketika tanpa kendala CORS berkat registry otomatis di `assets/js/components.js`).
- **Cara 2 (Local Server via Terminal)**:
  ```powershell
  python -m http.server 3000
  ```
  Lalu akses `http://localhost:3000`.

---

## 3. Cara Mengubah Komponen
Jika Anda ingin mengedit bagian tertentu:
1. Buka file komponen yang bersangkutan di folder `components/` (misal: `components/pricing.html` atau `components/hero.html`).
2. Lakukan perubahan teks atau styling.
3. Jalankan perintah sinkronisasi cepat berikut di terminal:
   ```powershell
   node build.js
   ```
   *(Perintah ini akan memperbarui bundle cache komponen secara otomatis dalam 1 detik).*

---

## 4. Checklist Pengujian Fitur Interaktif
1. **Folder Tabs**: Klik tab *"Win Work Prep"* di section kurikulum; pastikan materi berganti seketika.
2. **Pricing Switcher**: Klik toggle switch *"Yearly (-20%)"*; pastikan harga berubah menjadi `$28/mo` dan `$12.99/mo`.
3. **FAQ Accordion**: Klik pertanyaan di FAQ; pastikan jawaban membuka dan ikon `+` berputar menjadi `×`.
4. **Draggable Laptop Stickers**: Drag & drop stiker maskot, mobil van, piala, dan petir di atas mockup laptop.
5. **Waitlist Modal**: Klik tombol *"Join Waitlist"* di mana pun; pastikan modal muncul, isi data, dan submit untuk melihat status sukses.

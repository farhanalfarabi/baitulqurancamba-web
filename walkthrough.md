# Manual Verification Guide (Panduan Pengujian Manual)

Dokumen ini berisi panduan pengujian manual langkah demi langkah untuk memverifikasi landing page desktop **KRACKERZ** yang telah dipecah menjadi arsitektur modular per komponen.

---

## 1. Arsitektur Komponen Baru

File [index.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/index.html) kini sangat ringkas (hanya ~60 baris kode) dan memanggil komponen-komponen terpisah yang tersimpan rapi di dalam folder [components/](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components):

| Nama Komponen | Lokasi File | Deskripsi |
| :--- | :--- | :--- |
| **Navbar** | [components/navbar.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/navbar.html) | Sticky navigation bar, logo, link menu, tombol Join Waitlist, dan mobile drawer |
| **Hero** | [components/hero.html](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/components/hero.html) | Display title, maskot biskuit, pill badge, CTA hero, dan 6 kartu lengkung bergelombang (scalloped wave ribbon) |
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

## 4. Checklist Pengujian Fitur Interaktif & Navbar Capsule
1. **Pill Navbar Capsule (Reference Image Match) & Rolling Text Animation**:
   - Periksa header di bagian atas halaman:
     - Di sisi kiri terdapat wordmark logo **KRACKERZ** dengan cookie biskuit merah `C`.
     - Di sisi kanan terdapat kapsul mengambang dengan latar krem `#FAF7F0`, border hitam solid, berisi link: `Features`, `Pricing`, `For partners`, `FAQ`, `Shop`.
     - Di ujung kanan kapsul terdapat tombol Electric Lime `#D4FF00` bertuliskan **JOIN WAITLIST** dengan badge bintang rosette merah berpanah putih (`badge-scallop-arrow.svg`).
   - **Uji Efek Hover Teks Berputar (Rolling Text Effect)**:
     - Arahkan kursor (*hover*) ke masing-masing item menu (`Features`, `Pricing`, `For partners`, `FAQ`, `Shop`).
     - Perhatikan teks awal berwarna hitam akan bergeser naik ke atas (*slide up* keluar viewport wadah), dan secara simultan teks duplikat berwarna merah aksen biskuit (`#E53935`) naik dari bawah menggantikan posisinya secara mulus (*slot machine cylinder roll*).
     - Gerakkan kursor keluar (*unhover*) untuk melihat animasi berputar kembali ke posisi awal.
   - **Uji Hover Tombol "JOIN WAITLIST" (Stationary Button + Rolling Text + Rotating Scallop Border)**:
     - Arahkan kursor (*hover*) ke tombol **JOIN WAITLIST**.
     - **Ekspektasi Fisik**: Tombol itu sendiri **TIDAK BERGERAK** (tetap diam kokoh di tempat tanpa bergeser).
     - **Ekspektasi Teks**: Teks label *"JOIN WAITLIST"* berputar meluncur ke atas (*rolling text*).
     - **Ekspektasi Ikon**: Lingkaran rosette/bintang biskuit merah di sisi kanan tombol berputar mulus 360° (*spinning border*), sementara panah putih di tengahnya tetap tegak menunjuk ke depan (*stationary arrow*).
     - Gerakkan kursor keluar (*unhover*) untuk melihat border kembali berputar ke posisi semula secara halus.
   - Klik link `Features`, `Pricing`, `For partners`, `FAQ`, `Shop` untuk memverifikasi smooth scrolling ke masing-masing section.
2. **Hero Section (Title Lockup, Mascot C, & Scalloped Wave Cards Match)**:
   - **Proporsi Pas 1 Layar Penuh (100vh Viewport Fit)**:
     - Ukuran judul, jarak spasi, maskot, tombol, dan tinggi 6 kartu telah diskalakan secara kompak dan proporsional (total tinggi ~730px termasuk navbar).
     - Seluruh elemen Hero Section muat utuh dalam 1 layar tanpa terpotong di berbagai resolusi layar desktop / laptop (1080p, 1440p, MacBook 13/14").
   - **Top Pill Badge**:
     - Di sisi kiri pill hitam terdapat rosette gerigi bunga berwarna Electric Lime (`#D4FF00`) dengan ikon piala garis hitam (`badge-scallop-trophy.svg`).
     - Teks label: *"WORLD'S FIRST SALES COURSE FOR DESIGNERS"* dalam warna Electric Lime.
   - **Hero Title 3-Line Lockup (Persis Gambar Referensi)**:
     - **Line 1**: `FOR THE STUFF` (font display hitam tebal).
     - **Line 2**: `[Mascot C] THEY don't TEACH`
       - Di sisi kiri kata `THEY`, terdapat maskot biskuit berbentuk huruf "C" merah bergerigi dengan mata kartun, alis tebal garang, dan kumis gentleman hitam (`mascot-cracker-c.svg`).
       - Kata `don't` bergaya tulisan sambung miring (*editorial italic script*) hitam yang anggun dan kontras.
     - **Line 3**: `IN DESIGN SCHOOLS` (font display hitam tebal).
     - Di belakang judul terdapat kontur gelombang biskuit organik yang lembut (*subtle biscuit wave*).
   - **Hero Primary CTA Button**:
     - Tombol kapsul berwarna Electric Lime bertuliskan *"JOIN WAITLIST"*.
     - Di ujung kanan tombol terdapat rosette biskuit merah dengan panah putih (`badge-scallop-arrow.svg`).
   - **Tampilan Tata Letak Kartu (Fanned Ribbon Stack)**:
     - Terdapat 6 kartu yang membentang horizontal secara berirama dan saling bertumpukan sedikit (*overlapping fan*).
     - Masing-masing kartu memiliki kemiringan ritmis naik-turun dan miring kiri-kanan (`-rotate-[4.5deg]`, `rotate-[1.5deg]`, `-rotate-[1deg]`, `rotate-[2.5deg]`, `-rotate-[2.5deg]`, `rotate-[3.5deg]`).
   - **Anatomi Kartu & Efek Potongan Gerigi Biskuit (Scalloped Bite Edge)**:
     - Bagian atas kartu: Foto desainer/kreatif memenuhi bagian atas kartu hingga sudut melengkung tanpa celah padding putih (*full bleed*).
     - Garis pemisah antara foto dan teks footer: Berbentuk **lengkungan gerigi setengah lingkaran berulang (scalloped arches)** yang melengkung rapi ke atas foto menyerupai tepian biskuit / tiket voucher.
     - Bagian footer teks: Bersatu tanpa celah dengan scalloped divider tersebut.
   - **Skema Warna Bergantian (Alternating Colors)**:
     - Card 1, 3, 5: Footer berlatar **Ivory Cream** (`#FAF7F0`) dengan teks warna **Vintage Wine** (`#4A0E17`).
     - Card 2, 4, 6: Footer berlatar **Vintage Wine** (`#4A0E17`) dengan teks warna **Pure White** (`#FFFFFF`).
   - **Copy Teks Pure English (100% Sesuai Gambar)**:
     - Card 1: *"Getting ready for my next interview"*
     - Card 2: *"Uplifting my design portfolio"*
     - Card 3: *"Cold outreaching without cringing"*
     - Card 4: *"Connecting with other designers"*
     - Card 5: *"Selling my work, not just making it"*
     - Card 6: *"Refining my personal brand"*
   - **Uji Efek Hover Rotational Physics (Berputar Beberapa Derajat)**:
     - Arahkan kursor (*hover*) ke salah satu kartu (misal Card 1 atau Card 4).
     - **Ekspektasi Visual**: Kartu tersebut **TIDAK naik ke atas** (posisi vertikal tetap stabil), melainkan **berputar beberapa derajat** secara elastis dan hidup (*tactile spring rotation* dengan kurva cubic-bezier).
       - Card yang miring ke kiri (Card 1, 3, 5) akan berputar ke arah kanan (`+5deg`).
       - Card yang miring ke kanan (Card 2, 4, 6) akan berputar ke arah kiri (`-5deg`).
       - Kartu sedikit membesar (`scale: 1.03`), otomatis naik ke lapisan layer paling atas (`z-index: 50`), dan bayangan bertambah tegas (`box-shadow: 6px 14px 0px #121212`).
     - Gerakkan kursor keluar (*unhover*); kartu akan berputar kembali ke sudut kemiringan awalnya secara mulus.
   - **Uji Responsivitas Mobile / Tablet**:
     - Perkecil lebar layar browser ke ukuran smartphone atau buka di mode responsive.
     - Kartu dapat digeser secara horizontal (*horizontal swipe*) dengan mulus tanpa scrollbar yang mengganggu (`no-scrollbar`), dan otomatis berhenti rapi di tengah kartu (*snap center*).
3. **Folder Tabs**: Klik tab *"Win Work Prep"* di section kurikulum; pastikan materi berganti seketika.
4. **Pricing Switcher**: Klik toggle switch *"Yearly (-20%)"*; pastikan harga berubah menjadi `$28/mo` dan `$12.99/mo`.
5. **FAQ Accordion**: Klik pertanyaan di FAQ; pastikan jawaban membuka dan ikon `+` berputar menjadi `×`.
6. **Draggable Laptop Stickers**: Drag & drop stiker maskot, mobil van, piala, dan petir di atas mockup laptop.
7. **Waitlist Modal**: Klik tombol *"JOIN WAITLIST"* pada navbar atau tombol CTA lainnya; pastikan modal muncul, isi data, dan submit untuk melihat status sukses.

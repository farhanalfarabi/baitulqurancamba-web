# Walkthrough: Standardisasi Tombol Double-Layer & Overhaul Semua Kartu (Krackerz Style 1:1)

Seluruh komponen kartu (*cards*) dan tombol aksi utama (*CTA buttons*) pada website modern di `d:\Testing Claude code\pondok-baitulquran-camba` kini telah dirombak secara komprehensif mengikuti arsitektur visual asli dari **[https://krackerz.com](https://krackerz.com)**.

Garis batas hitam tebal (*heavy black outlines 2.5px-3px*) dan bayangan brutal kaku (*offset black brutal shadows*) yang sebelumnya dominan telah dibersihkan dan digantikan dengan estetika **Soft Tactile Pop** Krackerz yang sesungguhnya: sudut membulat modern (`rounded-2xl` s/d `rounded-3xl`), bayangan elevasi bertingkat lembut (*layered soft elevation*), bingkai foto putih tebal 8px, dan palet warna solid (*Cream, Cherry Wine, Vermilion, Orange-Red*).

---

## 1. Ringkasan Standardisasi Tombol & Kartu pada Seluruh Komponen

| Komponen | Penyesuaian Tombol "Daftar Sekarang" | Penyesuaian Kartu (*Cards*) Mengikuti Krackerz |
| :--- | :--- | :--- |
| **Navbar** (`components/navbar.html`) | **`Button + Link Wrapper` Krackerz**: Tombol CTA menyatu rapi dalam kapsul bersama menu navigasi. Menggunakan **Double-Layer Button** (wadah putih + tombol neon lime + lingkaran panah merah). | Header navbar kini menggunakan **Solid Pure White (`#FFFFFF` / `bg-white`)**, mengalir mulus dan menyatu sempurna dengan latar belakang awan SVG putih (`#FFFFFF`) tanpa garis/titik krem di atasnya. |
| **Hero Section** (`components/hero.html`) | Tombol pill hijau lama digantikan dengan **Signature Krackerz Double-Layer Button** berlatar putih dengan tombol neon lime dan badge panah merah. | **Continuous Smooth Scroll Interpolation**: Ke-6 kartu dirombak dari snap biner kasar menjadi animasi uncurl super halus via `requestAnimationFrame` + LERP damping. Kartu bertransisi mulus dari fanned ke straightened row, dengan hover lift independen via `.hero-card-inner`. |
| **About** (`components/about.html`) | Tombol CTA diubah ke **Double-Layer Button** Krackerz (*Daftar Santri Baru ➔*). | Dihilangkan bentuk gigitan kartun (*bite-corner*) hitam. Digantikan dengan **2 Kartu Panel Solid** (**Vermilion Red** `#CF2B09` dan **Cherry Wine** `#580D14`) dengan bingkai billboard putih pekat 8px. |
| **Kurikulum** (`components/curriculum.html`) | Tombol ganda **Double-Layer Button** Krackerz (*REGISTER NOW ➔*). | **Krackerz Sticky Stacking Cards on Scroll (1:1 Asli)**: Dirombak dari tab klik statis menjadi 3 kartu tumpuk bergulir (*sticky stacking*). Awalnya hanya muncul Tab 1; saat discroll ke bawah, Kartu 2 meluncur dari bawah dan menumpuk di atas Kartu 1 sehingga Tab 1 & Tab 2 berdampingan; discroll lagi, Kartu 3 menumpuk sehingga ke-3 tab menyatu rapi. |
| **Testimoni** (`components/testimonials.html`) | Tombol CTA ganda Krackerz (*Bergabung Bersama Kami ➔*). | **OVERHAUL**: Dari lingkaran bulat lama menjadi **Kartu Tiket/Postcard Miring Krackerz** (`rotate(-2deg)` s/d `rotate(2deg)`) dalam palet hangat `#F95534`, `#CF2B09`, `#7C1A06` dengan kutipan teks besar dan tag wali/santri. |
| **Pricing** (`components/pricing.html`) | Kartu utama (Jenjang Ulya) dilengkapi tombol ganda **Double-Layer Button** Krackerz. | Dihilangkan border hitam 3px. Tier 1 & 3 (*Secondary*) menggunakan **kartu putih bersih `#FFFFFF`** bersudut 24px dengan bayangan lembut; Tier 2 (*Primary*) menggunakan **kartu Cherry Wine `#580D14` mewah** berstempel *Paling Diminati*. |
| **Founder** (`components/founder.html`) | Standar visual bersih Krackerz. | Foto pengasuh dibebaskan dari kurungan kotak hitam 3px (kini berbingkai putih bersih); 4 kartu metrik mengadopsi warna solid `#CF2B09` dan `#580D14` dengan bayangan lembut; tabel struktur pimpinan menjadi kartu putih minimalis. |
| **Partner** (`components/partner.html`) | Tombol CTA ganda Krackerz (*Sinergi Bersama Kami ➔*). | Banner panel warna anggur gelap `#580D14` elegan dengan bayangan `shadow-2xl` tanpa outline hitam 3px. |
| **FAQ Accordion** (`components/faq.html`) | Ikon plus `+` yang berputar halus saat diklik. | Tiap item pertanyaan dirombak menjadi **kartu putih bersih `#FFFFFF`** bersudut 16px dengan bayangan lembut dan teks elegan, tanpa border hitam 2.5px. |
| **Modal Pendaftaran** (`components/waitlist-modal.html`) | Tombol kirim formulir menggunakan **Double-Layer Button** Krackerz. | Dialog modal putih-krem modern berbayang `shadow-2xl` dengan input teks bergaris halus. |
| **Footer** (`components/footer.html`) | Form input pendaftaran dirancang dalam **kapsul putih elegan** dengan tombol double-layer di dalamnya. | Section CTA penutup berlatar `#580D14` dengan stiker melayang dan tipografi besar. |

---

## 2. Panduan Pengujian Manual (Manual Verification Guide)

Ikuti langkah-langkah berikut untuk memverifikasi secara mandiri hasil pembaruan tombol dan kartu di web browser:

### Langkah 1: Akses Server Lokal
Buka terminal PowerShell pada direktori proyek `d:\Testing Claude code\pondok-baitulquran-camba`:
```powershell
npx serve .
# Atau dengan python
python -m http.server 3000
```
Buka browser pada alamat lokal (misalnya `http://localhost:3000`).

---

### Langkah 2: Verifikasi Navigasi Bar (Navbar Putih Bersih & Signature Krackerz Double-Layer Button)
1. **Latar Belakang Navbar Putih Murni (`#FFFFFF`)**:
   - Header navbar menggunakan latar belakang putih solid (`bg-white` / `#FFFFFF`), menyatu mulus dan bersih dengan latar belakang SVG awan putih (`krackerz-wave-shape.svg`).
2. **Kapsul Navigasi Kanan & Tombol REGISTER NOW (Ukuran Tombol Lebih Besar dari Kapsul)**:
   - Kapsul nav `Button + Link Wrapper` dirancang ramping dengan tinggi `h-[46px]` dan `overflow: visible`.
   - **Tombol REGISTER NOW (Signature Double-Layer Pop-Out)**:
     - **Dimensi Lebih Besar**: Tombol memiliki tinggi `h-[56px]` (10px lebih tinggi dari kapsul), sehingga secara visual **menembus dan meluap (*overflows*)** 5px ke atas garis atas kapsul, 5px ke bawah garis bawah kapsul, serta menggantung 6px ke kanan (`-mr-1.5`).
     - **Wadah Luar**: Kartu putih solid dengan sudut membulat 12px dan bayangan jatuh lembut berlapis (`shadow-[0_5px_16px_rgba(0,0,0,0.14)]`) yang memberikan efek melayang (*floating*) nyata di atas kapsul.
     - **Tombol Dalam**: Berwarna hijau neon lime (`#D4FF00` / `#C8FF2E`) dengan border hitam solid 2px `#161616` dan sudut membulat 8px.
     - **Tipografi**: Font tebal display hitam pekat (`font-display font-black uppercase tracking-wider`) dengan efek teks bergulir (*rolling text*) saat di-hover.
     - **Badge Panah**: **12-Point Scalloped Starburst Red Badge** berwarna merah oranye api Krackerz (`#F8330B`) dengan outline hitam 2px dan panah putih tajam (`➔`) yang berputar halus saat tombol diarahkan kursor (*hover*).
3. **Hero Section Top & CTA Button**:
   - Bagian atas hero dan wave wrapper memiliki latar putih murni (`#FFFFFF`) tanpa garis dot krem.
   - Tombol utama hero juga mengadopsi styling double-layer identik dengan scalloped starburst arrow badge.

---

### Langkah 3: Verifikasi 6 Kartu Hero (Continuous Smooth Scroll Interpolation & Tactile Hover)
1. **Posisi Awal di Paling Atas Halaman (`scrollY = 0`)**:
   - Ke-6 kartu tertumpuk mengipas (*playful fanned stack*) dengan sudut rotasi dinamis (`-6°`, `-4°`, `-2°`, `+2°`, `+4°`, `+6°`), tinggi vertikal bergelombang (`translateY` hingga 24px - 26px), serta saling bertumpuk lembut (*negative overlap*).
   - Kartu bergantian warna secara elegan: **Kartu 1, 3, 5 (Krem `#FAF7F0` teks merah tua)** dan **Kartu 2, 4, 6 (Cherry Wine `#580D14` teks krem)** dengan sudut membulat 16px dan bayangan lembut natural tanpa garis hitam kaku.
2. **Pengujian Gulir Halus Perlahan (Slow Continuous Scrubbing)**:
   - Gulir mouse wheel atau trackpad ke bawah secara perlahan dari 0px hingga ~200px.
   - **Ekspektasi Kelancaran Visual**:
     - Animasi **TIDAK melompat seketika (*no abrupt snapping/pop-in*)**.
     - Setiap pixel guliran Anda menggerakkan rotasi sudut, pergeseran vertikal, dan jarak antar-kartu secara proporsional dan presisi mengikuti posisi scroll.
     - Mesin animasi menggunakan **Continuous LERP Interpolation** (faktor redaman 0.18 via `requestAnimationFrame`), sehingga gerakan terasa sangat organik, empuk, dan luwes seperti benda fisik berbobot (*spring physics*).
     - Pada kedalaman gulir ~200px, ke-6 kartu telah membuka lurus sempurna (*100% straightened*) dengan sudut `0°`, ketinggian rata, dan jarak celah (*gap*) seimbang 20px (16px pada tablet, 12px pada ponsel).
3. **Pengujian Gulir Cepat & Kembali ke Atas (Fast Scroll & Reverse Scrubbing)**:
   - Putar roda mouse ke bawah dengan cepat: perhatikan kartu meluncur melurus dengan mulus tanpa jeda atau sentakan layout reflow.
   - Gulir kembali ke atas halaman (`scrollY` menuju 0): ke-6 kartu kembali mengipas (*fanned stack*) secara halus dan simetris ke posisi awal.
4. **Pengujian Interaksi Arahkan Kursor (Hover Interaction)**:
   - Arahkan kursor (*hover*) ke salah satu kartu, baik saat kartu sedang mengipas di atas maupun setelah melurus di bawah.
   - **Ekspektasi Hover**:
     - Kartu yang diarahkan langsung melonjak naik (`translateY(-8px) scale(1.03)`) dengan bayangan jatuh lembut yang dalam (`shadow-[0_16px_32px_rgba(0,0,0,0.18)]`) dan memprioritaskan lapisan paling atas (`z-index: 50`).
     - Efek hover ditangani secara ortogonal oleh wadah terpisah (`.hero-card-inner`), sehingga **sama sekali tidak bertabrakan (*zero conflict*)** dengan transformasi rotasi scroll pada wadah luar (`.hero-card-fan`).

---

### Langkah 4: Verifikasi Bagian Tentang Kami & Kurikulum (Scroll-Stacking Sticky Cards)
1. **About**:
   - Foto billboard masjid memiliki bingkai putih tebal pekat 8px.
   - 2 kartu di bawahnya tampil dalam warna solid pekat (**Vermilion Red** dan **Cherry Wine**) tanpa sudut terpotong kartun hitam.
   - Tombol di bawahnya menggunakan double-layer button Krackerz.
2. **Kurikulum (Alur Stacking Kartu Berdasarkan Scroll - 1:1 Krackerz Original & Tinggi Kartu Seragam)**:
   - **Tinggi Seragam Semua Kartu (Uniform Height Matching)**:
     - Ketiga kartu (**Kartu 1: Tahfizh**, **Kartu 2: Sekolah**, dan **Kartu 3: Asrama**) kini memiliki **tinggi luar yang sama persis** (`height: 600px` pada layar desktop/laptop).
     - Judul di ketiga kartu diseragamkan ke format display chunky 3-baris (`text-4xl sm:text-5xl lg:text-6xl leading-[1.05]`):
       - Kartu 1: `TAHFIZH <br> & SANAD <br> 30 JUZ`
       - Kartu 2: `SEKOLAH <br> FORMAL & <br> KARAKTER`
       - Kartu 3: `KEHIDUPAN <br> SANTRI & <br> ASRAMA`
     - Kolom kiri menggunakan `h-full flex flex-col justify-between`, sehingga tombol **`REGISTER NOW ➔`** di ketiga kartu terkunci di posisi vertikal bawah yang sejajar dan presisi.
     - Kolom kanan menggunakan `flex items-center justify-center` untuk menempatkan bingkai foto 4:3 tepat di tengah secara vertikal.
     - **Hasil Stacking Saat Scroll**: Ketika Kartu 2 menumpuk di atas Kartu 1, bagian bawah Kartu 2 menutup badan Kartu 1 secara sempurna (*100% congruent, no bottom peek/spill*). Begitu pula saat Kartu 3 menumpuk di atas Kartu 2.
   - **Bentuk & Sisi Kiri Kartu 1 (Menyatu Mulus 1:1 Gambar Referensi 2 Krackerz)**:
     - Garis vertikal tepi kiri Tab 1 dan tepi kiri badan kartu kini **100% rata, lurus, dan menyatu sempurna (*seamless flush vertical line*)**:
       - Sudut atas Tab 1 melengkung halus (`rounded-tl-[24px]`).
       - Tepi kiri Tab 1 turun lurus vertikal ke bawah, dan langsung mengalir mulus ke tepi kiri badan kartu tanpa adanya lekukan bahu membulat (*no rounded shoulder*), tanpa celah (*no notch/gap*), dan tanpa tonjolan (*no overhang/step*).
       - Badan kartu diset `border-top-left-radius: 0 !important;` sehingga menempel rapat dan solid dengan Tab 1.
       - Teks tab menggunakan Title Case bersih: **`Tahfizh & Sanad`** dengan ikon vektor buku Al-Qur'an putih rapi di sebelah kirinya.
       - Poin kurikulum menggunakan ikon bintang 8-titik putih (*asterisk* `✱`) Krackerz.
   - **Kondisi Awal (Saat Masuk ke Section Kurikulum)**:
     - Hanya **Kartu 1 (Tahfizh & Sanad)** yang aktif di layar.
     - Di pojok kiri atas, Tab 1 (**`Tahfizh & Sanad`** berlatar merah cerah `#CF2B09`) menyatu utuh dengan sisi kiri kartu. Area kanan tab bersih dan kosong.
     - Tombol aksi di dalam kartu bertuliskan **`REGISTER NOW ➔`** (Bahasa Inggris murni).
   - **Gulir ke Bawah (Kartu 2 Meluncur dari Bawah & Menumpuk)**:
     - Putar roda mouse ke bawah secara perlahan.
     - Perhatikan **Kartu 2 (Sekolah Formal & Karakter)** meluncur naik dari bawah (*slides up from bottom*) dan menutupi badan Kartu 1 dengan presisi tinggi yang sama persis.
     - Ketika Kartu 2 terkunci di posisi atas (*sticky*):
       - Tepi kiri kartu tetap rata dan solid tanpa lekukan aneh di bawah Tab 1.
       - Tab 2 (**`Sekolah`** berwarna merah bata `#A52207`) kini muncul tepat di samping Tab 1 dan menyatu ke badan Kartu 2.
       - Di layar kini tampak **DUA TAB berdampingan** tanpa tabrakan teks atau ikon.
   - **Gulir Lebih Lanjut (Kartu 3 Meluncur dari Bawah)**:
     - Gulir mouse lebih jauh ke bawah.
     - **Kartu 3 (Kehidupan Santri & Asrama)** meluncur naik dari bawah dan menutupi badan Kartu 2 dengan ukuran tinggi yang sama persis.
     - Ketika Kartu 3 terkunci di posisi atas (*sticky*):
       - Tab 1 dan Tab 2 tetap terlihat utuh berdampingan.
       - Tab 3 (**`Asrama`** berwarna merah anggur pekat `#7C1A06`) kini muncul tepat di samping Tab 2 dengan stiker van hijau Krackerz.
       - Di layar kini tampak **KETIGA TAB bersanding rapi** membentuk folder berundak yang simetris, lega, dan elegan, dengan garis kiri yang selalu rata dan solid serta bagian bawah kartu yang selalu menumpuk rata!
   - **Uji Navigasi Klik Tab**:
     - Saat berada di Kartu 3, klik Tab 1 atau Tab 2: halaman akan secara mulus bergulir (*smooth scroll*) kembali ke posisi kartu yang bersangkutan.
     - Gulir balik ke atas: kartu akan meluncur turun kembali secara alami mengungkap kartu di baliknya.

---

### Langkah 5: Verifikasi Rombakan Kartu Testimoni (Postcard/Ticket Style)
1. Gulir ke section **Kisah Santri & Keluarga Besar**:
   - Perhatikan bahwa kartu **BUKAN lagi lingkaran bulat**, melainkan **kartu tiket/pos persegi panjang yang miring santai** (`-rotate-2` dan `rotate-2`).
   - Warna kartu hangat cerah: oranye-merah `#F95534`, vermilion `#CF2B09`, dan wine `#7C1A06`.
   - Tiap kartu memuat tanda kutip besar, teks ulasan mendalam, serta kotak identitas wali/santri di bagian bawahnya.
   - Tombol penutup section menggunakan double-layer button Krackerz.

---

### Langkah 6: Verifikasi Kartu Biaya Pendidikan (Pricing Tiers)
1. Periksa tata letak 3 kartu paket:
   - **Kartu Kiri (Wustha)** & **Kartu Kanan (Tahfizh Sanad)**: Berlatar **putih bersih `#FFFFFF`** dengan bayangan lembut tanpa garis hitam 3px.
   - **Kartu Tengah (Ulya - Utama)**: Berlatar **merah wine mewah `#580D14`**, terangkat sedikit ke atas, berstempel *Paling Diminati*, dan dilengkapi tombol double-layer Krackerz di dalamnya.
2. Uji switcher **Bulanan** vs **Tahunan (-20%)**; angka biaya beralih secara dinamis.

---

### Langkah 7: Verifikasi Kartu FAQ & Pimpinan Pondok
1. **Founder / Pimpinan**:
   - Foto pengasuh tampil bersih dalam bingkai putih tanpa kotak bergaris hitam kaku.
   - 4 kartu angka metrik berlatar solid merah dan wine dengan bayangan lembut.
   - Tabel struktur pimpinan berupa kartu putih bersih minimalis.
2. **FAQ Accordion**:
   - Tiap baris pertanyaan berupa kartu putih bersih berbayang lembut tanpa border hitam tebal.
   - Klik pertanyaan; jawaban terbuka mulus dan ikon `+` berputar menjadi `×`.

---

### Langkah 8: Verifikasi Background Awan Berputar pada Footer (Rotating Cloud Wave #580D14 Sesuai Hero Section)
1. **Background Awan Berputar Sesuai Hero Section (Rotating Cloud Wave #580D14)**:
   - Gulir ke bagian paling bawah halaman web hingga mencapai section **Footer / Penerimaan Santri Baru**.
   - Perhatikan latar belakang dan batas atas footer:
     - **Bentuk & Mekanisme Serupa Hero Section**: Menggunakan file vektor organik lingkaran awan (`footer-wave-shape.svg`) berdimensi raksasa yang identik dengan Hero Section (`krackerz-wave-shape.svg`).
     - **Animasi Berputar Halus (Continuous Rotation)**: Awan marun (`#580D14`) **berputar secara kontinu dan anggun** (`animation: krackerzWaveRotate 68s linear infinite;`), menciptakan efek gelombang ombak awan dinamis (*rolling organic wave*) pada batas transisi antara kanvas krem `#FAF7F0` dan footer marun `#580D14`.
     - **Bebas Garis Datar / Tanpa Potongan Sisi (Zero Shelves / Pure Single Wave Layer)**: Tidak ada garis datar atau div tambahan (`.footer-solid-base` ditiadakan). Berkat diameter raksasa proporsional (`width: 210%`, `min-width: 2000px`), kontur awan melengkung alami dan menutup seluruh badan footer secara solid tanpa bocor di bagian bawah maupun samping.
     - **Stiker Melayang & Tipografi**: Seluruh konten footer (judul *Penerimaan Santri Baru*, form input pendaftaran, stiker van, roket, pengeras suara, logo, dan tautan footer) berada pada `relative z-10` di atas lapisan awan yang berputar.
2. **Formulir Pendaftaran & Tombol Kapsul Footer (Pure English UI)**:
   - Periksa tombol pendaftaran di dalam form kapsul: bertuliskan murni **`REGISTER NOW ➔`**.
   - Periksa placeholder input: bertuliskan murni **`Enter parent's email or WhatsApp...`**.
   - Masukkan nomor WhatsApp atau email lalu submit; pesan sukses tampil dalam bahasa Inggris murni: **`🎉 Thank you! Our admissions team will contact you shortly.`**.
3. **Modal Pendaftaran (Waitlist Modal)**:
   - Klik tombol **`REGISTER NOW`** di navbar atau kartu; modal pendaftaran muncul dengan tampilan modern bersih dan tombol kirim double-layer Krackerz.
   - Isi form, pilih jenjang, lalu kirim; periksa pesan konfirmasi sukses.

---

### Langkah 9: Verifikasi Halaman Galeri Foto Kolase Acak per Tahun (Scattered Photo Wall by Year)
1. **Navigasi ke Halaman Galeri**:
   - Klik menu **`Gallery`** pada Navbar atas (atau buka langsung `http://localhost:3000/gallery.html`).
   - Perhatikan teks navigasi **`Gallery`** di navbar menyala aktif (merah `#CF2B09`).
   - Logo pondok di kiri atas dapat diklik kapan saja untuk kembali ke `index.html`.
2. **Tata Letak Kolase Masonry Rapat & Variasi Tinggi Alami (Tight Masonry "Dempetan" & Varied Heights)**:
   - Perhatikan susunan kartu foto di setiap seksi tahun:
     - **Tersusun Rapat ("Dempetan")**: Menggunakan sistem multi-kolom CSS Masonry (`columns-2 sm:columns-3 md:columns-4 lg:columns-5 gap-2.5 sm:gap-3`) dengan jarak antar-foto yang rapat dan presisi (`mb-2.5 sm:mb-3`), sehingga tidak ada celah baris kosong yang canggung.
     - **Variasi Tinggi Berbeda ("Ada Panjang Ada Pendek")**: Foto-foto mempertahankan rasio aspek alaminya masing-masing (`w-full h-auto`):
       - Foto vertikal/portrait (seperti *futsal*, *leadership bootcamp*, dan *upacara*) tampil memanjang dan tinggi.
       - Foto panorama (seperti *gazebo taman*, *asrama*, *masjid*, dan *pidato 3 bahasa*) tampil melebar dan lebih ramping/pendek.
       - Foto 4:3 dan 16:9 tampil dengan ketinggian proporsional di antara keduanya.
     - **Murni Foto Saja (Zero Text / No Title & No Desc)**: Kartu foto bersih tanpa judul kartu, tanpa teks deskripsi, dan tanpa footer keterangan.
     - **Bingkai Putih Taktil**: Tiap foto dibingkai kartu putih bersih (`p-1.5 sm:p-2 bg-white rounded-xl sm:rounded-2xl border-2 border-[#161616] brutal-shadow-sm`).
     - **Efek Hover Taktil**: Arahkan kursor (*hover*) ke salah satu foto: foto akan membesar halus (`scale-[1.03]`), naik ke lapisan teratas (`z-20`), dan memancarkan bayangan lembut yang dalam (`shadow-2xl`).
3. **Pengelompokan & Filter Berdasarkan Tahun (Grouped by Year: 2026, 2025, 2024)**:
   - Galeri terbagi rapi ke dalam seksi per tahun dengan pita header khas Krackerz:
     - **Year 2026**: 10 foto momentum santri Tahun Ajaran 2025/2026 (halaqah tahfizh, kelas, futsal, masjid, pidato 3 bahasa, gazebo, asrama putri, rumah tamu).
     - **Year 2025**: 10 foto momentum santri Tahun Ajaran 2024/2025 (muraja'ah sanad, sepak takraw, forum kepemimpinan, asrama santri, tarbiyah, voli).
     - **Year 2024**: 10 foto momentum santri Tahun Ajaran 2023/2024 (upacara bendera, takraw persahabatan, outbound pramuka, kelas, bengkel dakwah, UKS).
   - **Uji Tab Filter Tahun (Year Filter Tabs)**:
     - Klik tab **`Year 2026 (10)`**: Hanya seksi tahun 2026 yang tampil di layar dengan animasi halus.
     - Klik tab **`Year 2025 (10)`**: Hanya seksi tahun 2025 yang tampil di layar.
     - Klik tab **`Year 2024 (10)`**: Hanya seksi tahun 2024 yang tampil di layar.
     - Klik tab **`All Years (30)`**: Seluruh 30 foto dari ketiga tahun kembali tampil lengkap secara berurutan.
4. **Uji Modal Lightbox Layar Penuh (Pure Large Photo Lightbox)**:
   - Klik salah satu foto:
     - Modal Lightbox fullscreen terbuka dengan latar belakang gelap *backdrop-blur*.
     - Foto beresolusi tinggi tampil jernih dan lega di dalam bingkai putih tebal.
     - Bar atas menampilkan badge tahun (misal: `2026`), nomor urut foto (`X / 30`), dan tombol tutup `✕`.
   - **Uji Navigasi Foto**:
     - Klik tombol panah **`›`** di kanan atau tekan tombol panah kanan (`→`) pada keyboard: Foto berganti maju.
     - Klik tombol panah **`‹`** di kiri atau tekan tombol panah kiri (`←`) pada keyboard: Foto berganti mundur.
     - Tekan tombol **`Escape`** (`Esc`) atau klik tombol **`✕`** atau klik latar gelap di luar foto: Modal langsung tertutup seketika.
5. **Billboard Ajakan Kunjungan & Footer Awan Berputar**:
   - Di bagian bawah, terdapat billboard marun `#580D14` dengan tombol **`SCHEDULE CAMPUS VISIT ➔`** yang membuka modal pendaftaran santri baru.
   - Bagian paling dasar menampilkan komponen Footer dengan latar belakang ombak awan berputar marun `#580D14` (*krackerz rotating cloud wave*).

---

## 3. Pembaruan Konten: Penataan Terbuka Visi-Misi & 9 Pilar Kurikulum (Tanpa Slide)

Sesuai arahan, seluruh konten resmi dari `https://baitulqurancamba.com` kini ditampilkan **semuanya secara terbuka, statis, dan estetik (Open Tactile Grid)**, tanpa sistem geser bertumpuk (*sticky scroll stacking / slide-slide*):

### A. Visi & Misi Resmi Pesantren (`components/about.html`)
1. **Kartu Visi Utama (Generasi 3M - Cherry Wine `#580D14`)**:
   - Menampilkan kutipan visi resmi: *"Mewujudkan Generasi Qur'ani yang Muhaffizh, Muballigh, & Mujaahid"*.
   - Rincian 3 pilar utama:
     - **Muhaffizh** (`30 JUZ MUTQIN & SANAD`): Target hafalan 30 juz mutqin dengan bimbingan talaqqi sanad bersambung.
     - **Muballigh** (`TRILINGUAL PREACHING`): Melatih santri cakap berdakwah dan berpidato dalam 3 bahasa (Arab, Inggris, Indonesia).
     - **Mujaahid** (`DISCIPLINE & LEADERSHIP`): Membentuk santri berakhlak disiplin, mandiri di asrama 24 jam, dan berjiwa pemimpin.
2. **Empat Butir Misi Resmi (Grid 4 Kartu Taktil Putih Bersih)**:
   - **Misi 01 (`QUR'ANIC MASTERY`)**: Mencetak generasi penghafal Al-Qur'an yang tangguh dan memiliki niat besar untuk membumikan Al-Qur'an.
   - **Misi 02 (`DA'WAH EMPOWERMENT`)**: Melaksanakan kegiatan pembinaan yang mendorong dan membantu santri dalam mengembangkan keterampilan dakwah internal dan eksternal.
   - **Misi 03 (`RELIGIOUS DISCIPLINE`)**: Menumbuhkan sikap kedisiplinan santri dalam menjalankan syariat Islam dengan membentuk lingkungan asrama religius.
   - **Misi 04 (`TALENT & POTENTIAL`)**: Mengembangkan potensi santri melalui kegiatan islami, pelatihan, dan bimbingan kepemimpinan sesuai minat dan bakat individu.

### B. Sembilan Pilar Kurikulum & 3 Program Terbuka (`components/curriculum.html`)
Efek geser/tumpuk (*slide-slide scroll*) telah dihilangkan sepenuhnya, digantikan dengan penyajian visual yang terbuka dan langsung terlihat:
1. **Sembilan Pilar Kurikulum Program (Grid 3x3 Terbuka)**:
   - **01. Tahfizh, Tahsin, Tajwid** (`QUR'AN CORE`)
   - **02. Pelatihan Muballigh** (`DA'WAH CADRE`)
   - **03. Manajemen Dakwah** (`ORGANIZATIONAL SKILLS`)
   - **04. Pengembangan Karakter** (`CHARACTER & ADAB`)
   - **05. Sanadisasi Qur'an & Hadits** (`SANAD TRANSMISSION`)
   - **06. Leadership (Kepemimpinan)** (`LEADERSHIP`)
   - **07. Pidato Arab & Inggris** (`TRILINGUAL ORATORY`)
   - **08. Dirosah Islamiyah** (`CLASSICAL SCHOLARSHIP`)
   - **09. Kurikulum Pemerintah** (`OFFICIAL STATE DIPLOMA`)
2. **Tiga Program Unggulan Pesantren (Grid 3 Kartu Berdampingan)**:
   - **Kartu 1 (Tahfizh & Sanad 30 Juz - `#CF2B09`)**: Foto halaqah talaqqi, bimbingan hafalan 30 juz, sanad bersambung, dan tombol daftar.
   - **Kartu 2 (Sekolah Formal & Karakter - `#A52207`)**: Foto kelas & pidato 3 bahasa, ijazah resmi negara SMP/SMA, dan pembinaan karakter.
   - **Kartu 3 (Kehidupan Santri & Asrama - `#580D14`)**: Foto ekstrakurikuler santri, asrama 24 jam bebas gawai, dan olahraga mandiri.

---

## 4. Panduan Pengujian Manual (Manual Verification Guide)

Ikuti langkah-langkah berikut untuk memverifikasi secara mandiri di web browser:

### Langkah 1: Jalankan Web Server Lokal
Jalankan perintah berikut di terminal:
```powershell
npx serve .
# Atau
python -m http.server 3000
```
Buka browser pada `http://localhost:3000`.

### Langkah 2: Verifikasi Bagian Visi & Misi (`#about`)
1. Gulir ke seksi **About** (`#about`).
2. Periksa **Kartu Visi Generasi 3M** (`#580D14`):
   - Kutipan: *"Mewujudkan Generasi Qur'ani yang Muhaffizh, Muballigh, & Mujaahid"*.
   - 3 sub-kartu taktil: `1. Muhaffizh`, `2. Muballigh`, `3. Mujaahid`.
3. Periksa **4 Kartu Misi Resmi**:
   - Grid 4 kartu putih (`01` s/d `04`) dengan teks misi resmi lengkap dan efek elevasi saat di-hover.

### Langkah 3: Verifikasi Seksi Kurikulum Bebas Slide (`#curriculum`)
1. Gulir ke seksi **Kurikulum** (`#curriculum`).
2. Perhatikan bagian pertama: **Sembilan Pilar Kurikulum Program** tampil terbuka dalam grid 3x3 (Pilar 01 s/d 09) dengan nomor taktil, judul, dan deskripsi.
3. Perhatikan bagian kedua tepat di bawahnya: **3 Program Unggulan Pesantren** tampil berdampingan dalam 3 kartu warna solid (`#CF2B09`, `#A52207`, `#580D14`) lengkap dengan foto berbingkai putih, poin keunggulan, dan tombol pendaftaran.
4. Pastikan **TIDAK ADA LAGI efek kartu bertumpuk/bergeser (*no sticky slides*)**, sehingga seluruh konten dapat langsung dibaca dengan mudah dan nyaman tanpa scroll yang membingungkan.







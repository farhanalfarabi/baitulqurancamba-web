# Walkthrough: Standardisasi Tombol Double-Layer & Overhaul Semua Kartu (Krackerz Style 1:1)

Seluruh komponen kartu (*cards*) dan tombol aksi utama (*CTA buttons*) pada website modern di `d:\Testing Claude code\pondok-baitulquran-camba` kini telah dirombak secara komprehensif mengikuti arsitektur visual asli dari **[https://krackerz.com](https://krackerz.com)**.

Garis batas hitam tebal (*heavy black outlines 2.5px-3px*) dan bayangan brutal kaku (*offset black brutal shadows*) yang sebelumnya dominan telah dibersihkan dan digantikan dengan estetika **Soft Tactile Pop** Krackerz yang sesungguhnya: sudut membulat modern (`rounded-2xl` s/d `rounded-3xl`), bayangan elevasi bertingkat lembut (*layered soft elevation*), bingkai foto putih tebal 8px, dan palet warna solid (*Cream, Cherry Wine, Vermilion, Orange-Red*).

---

## 1. Ringkasan Standardisasi Tombol & Kartu pada Seluruh Komponen

| Komponen | Penyesuaian Tombol "Daftar Sekarang" | Penyesuaian Kartu (*Cards*) Mengikuti Krackerz |
| :--- | :--- | :--- |
| **Navbar** (`components/navbar.html`) | **`Button + Link Wrapper` Krackerz**: Tombol CTA menyatu rapi dalam kapsul bersama menu navigasi. Menggunakan **Double-Layer Button** (wadah putih + tombol neon lime + lingkaran panah merah). | Header navbar kini menggunakan **Solid Pure White (`#FFFFFF` / `bg-white`)**, mengalir mulus dan menyatu sempurna dengan latar belakang awan SVG putih (`#FFFFFF`) tanpa garis/titik krem di atasnya. |
| **Hero Section** (`components/hero.html`) | Tombol pill hijau lama digantikan dengan **Signature Krackerz Double-Layer Button** berlatar putih dengan tombol neon lime dan badge panah merah. | **Continuous Smooth Scroll Interpolation**: Ke-6 kartu dirombak dari snap biner kasar menjadi animasi uncurl super halus via `requestAnimationFrame` + LERP damping. Kartu bertransisi mulus dari fanned ke straightened row, dengan hover lift independen via `.hero-card-inner`. |
| **About** (`components/about.html`) | Tombol CTA diubah ke **Double-Layer Button** Krackerz (*Daftar Santri Baru ➔*). | Dihilangkan bentuk gigitan kartun (*bite-corner*) hitam. Digantikan dengan **2 Kartu Panel Solid** (**Vermilion Red** `#CF2B09` dan **Cherry Wine** `#580D14`) dengan bingkai billboard putih pekat 8px berlatar foto kedisiplinan upacara santri ([`upacara-2.jpg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/pondok/upacara-2.jpg)). |
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

### Langkah 3: Verifikasi 6 Kartu Hero (Fanned Organic Stack & Pure Rotation Hover)
1. **Tata Letak Awal di Paling Atas Halaman (`scrollY = 0`)**:
   - Ke-6 kartu tertata secara organik dan mengipas (*organic fanned & staggered stack* - "tidak rapi" sesuai estetika asli Krackerz):
     - **Kartu 1**: Rotasi `-6°`, offset vertikal `+24px`, overlap `0px`.
     - **Kartu 2**: Rotasi `-4°`, offset vertikal `0px`, overlap `-14px` (berwarna Cherry Wine `#580D14`).
     - **Kartu 3**: Rotasi `-2°`, offset vertikal `+10px`, overlap `-14px`.
     - **Kartu 4**: Rotasi `+2°`, offset vertikal `0px`, overlap `-14px` (berwarna Cherry Wine `#580D14`).
     - **Kartu 5**: Rotasi `+4°`, offset vertikal `+26px`, overlap `-14px`.
     - **Kartu 6**: Rotasi `+6°`, offset vertikal `0px`, overlap `-14px` (berwarna Cherry Wine `#580D14`).
   - Tampilan ini sengaja asimetris, bergelombang, dan berlapis seperti tangan yang memegang kartu remi terbuka.
2. **Pengujian Gulir Halus Perlahan (Continuous Scrubbing)**:
   - Gulir mouse wheel atau trackpad perlahan dari 0px hingga ~200px:
     - Kartu melurus secara mulus (*smoothly straightens out*) dengan peredaman LERP dan celah (*gap*) seimbang tanpa hentakan kasar.
   - Gulir kembali ke posisi paling atas: kartu kembali mengipas (*fanned stack*) ke formasi awal yang bergelombang.
3. **Pengujian Interaksi Arahkan Kursor (Pure Rotation Hover - Tidak Naik, Tidak Membesar)**:
   - Arahkan kursor (*hover*) pada salah satu kartu (misalnya Kartu 1 atau Kartu 2):
     - **Tidak Naik & Tidak Membesar**: Ukuran kartu tetap `scale(1)` dan tidak melompat ke atas (`translateY` tetap `0px`).
     - **Berputar Beberapa Derajat**: Kartu secara jelas berputar/bergoyang beberapa derajat (misal Kartu 2 berputar `+8°`, Kartu 1 berputar `-7°`) sehingga seluruh bagian kartu bergerak berpindah posisi sudutnya dari posisi awalnya.
     - **Lapisan & Bayangan**: Kartu yang di-hover otomatis naik ke lapisan teratas (`z-index: 50 !important;`) dan memancarkan bayangan lembut yang lebih dalam (`box-shadow: 0 20px 40px -4px rgba(0,0,0,0.24)`).
     - Saat kursor dijauhkan (*unhover*), kartu berayun halus kembali ke sudut awalnya.

---

### Langkah 4: Verifikasi Elemen Miring / Angled Badges & Containers (Neo-Brutalist Tilted Elements)
1. **Container Hitam pada Bagian About (`components/about.html`)**:
   - Gulir ke section **Institutional Identity & Vision** / **Faith, Character & Al-Qur'an**.
   - Perhatikan container hitam bertuliskan teks neon lime **`Pondok Pesantren Tahfizh Camba, Maros`**.
   - **Ekspektasi**: Container hitam ini sekarang tampak **agak miring (*noticeably tilted* `+3°`)**, tidak datar/lurus horizontal lagi, memberikan nuansa dinamis dan tactile yang kuat.
2. **Elemen Miring Lainnya di Seluruh Halaman**:
   - **Curriculum**: Badge judul `Masa Depan Santri` miring `-3°` (`tilt-left`).
   - **Pricing**: Badge judul `Investasi Pendidikan` miring `-3°` (`tilt-left`).
   - **FAQ**: Badge judul `Pertanyaan Santri` miring `-3°` (`tilt-left`).
   - **Founder**: Badge pimpinan `Pondok` miring `+3°` (`tilt-right`).
   - **Interactive Laptop**: Badge `Santri` dan stiker-stiker aktivitas santri memiliki rotasi miring awal (`tilt-left` / `tilt-right`).
   - **Footer**: Badge `2025 / 2026 Dibuka` miring `+3°` (`tilt-right`).
   - **Gallery**: Banner-banner judul aktivitas berotasi dinamis `±3°` (`tilt-left` / `tilt-right`).
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

### Langkah 5: Verifikasi Section Prestasi Santri (Juara Lomba Nasional & Tasmi' Hafalan 10–15 Juz)
1. **Navigasi ke Section Prestasi / Student Excellence (`#achievements`)**:
   - Gulir ke bawah tepat setelah section **Kurikulum Terpadu**, atau klik menu **`Honors`** pada navbar atas.
   - **Header**:
     - Stamp badge: `HONOR ROLL & STUDENT ACCOLADES`.
     - Judul: `STUDENT EXCELLENCE & HONORS` dengan container hitam miring (`tilt-right`) bertuliskan teks neon lime.
     - Cursive script subtitle: `national olympiad champions & mutqin tasmi' hafalan`.
2. **Periksa 4 Kartu Mini-Statistik**:
   - `9+ Medals` (National Olympiad), `38+ Juz` (One-Sitting Tasmi'), `Jayyid Jiddan` (Very Good Grade), `Sanad Talaqqi` (Authentic Lineage).
3. **Uji Filter Tab Kategori (Filter Switcher)**:
   - **Tab Default: `All Accolades (6)`**: Ke-6 kartu tampil secara lengkap (3 juara lomba & 3 setoran tasmi').
   - **Klik Tab `🏆 National Champions (3)`**:
     - Kartu setoran tasmi' menghilang halus (*smooth fade-out*).
     - Hanya 3 kartu juara olimpiade yang aktif: **Zjilzian Amarung** (2 Emas 1 Perak), **Ibrahim Abdurrahman** (1 Emas 2 Perak), dan **Muh. Alif Iwan** (3 Perak SMP).
   - **Klik Tab `📖 Qur'anic Tasmi' 10–15 Juz (3)`**:
     - Kartu juara olimpiade berganti menjadi 3 kartu capaian tasmi': **Abbas** (15 Juz), **Muh. Fiqih** (13 Juz), dan **Zjilzian Amarung** (10 Juz).
   - **Klik Kembali `All Accolades (6)`**: Seluruh 6 kartu kembali tampil secara serentak.
4. **Uji Fitur Pembesaran Poster (*Lightbox Modal Zoom*)**:
   - Klik kartu apa saja (atau klik tombol **`Enlarge ➔`** di pojok kanan bawah kartu).
   - **Ekspektasi Lightbox**:
     - Layar menggelap dengan backdrop blur transparan (`backdrop-blur-md`).
     - Muncul modal popup berbingkai putih tebal dengan poster resolusi penuh (`juara (1).webp`, `tasmi (2).webp`, dsb.) yang sangat tajam dan jelas dibaca.
     - Di bawah poster terdapat judul nama santri dan keterangan lengkap capaian medali / juz hafalan.
   - **Menutup Modal**:
     - Klik tombol silang **`✕`** di pojok kanan atas modal, atau klik area di luar modal (backdrop), atau tekan tombol **`ESC`** pada keyboard: modal tertutup kembali dengan animasi memudar halus.

---

### Langkah 6: Verifikasi Rombakan Kartu Testimoni (Postcard/Ticket Style)
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

### Langkah 7: Verifikasi Overhaul Section Pimpinan Pondok (1:1 Krackerz "MEET PENNY" Layout) & FAQ
1. **Section Pimpinan & Pengasuh (`#leadership`)**:
   - Gulir ke section **Pimpinan & Pengasuh Pondok**:
   - **Header Lockup (`MEET [LEADERSHIP ✓]`)**:
     - Teks chunky display hitam **`MEET`** berdampingan dengan wadah hitam miring (`tilt-right`) bertuliskan teks neon lime **`LEADERSHIP`**.
     - Di sudut kanan atas wadah terdapat badge lingkaran hijau cerah dengan tanda centang putih tajam (**`✓`**).
     - Subtitle font cursive oranye-merah: **`the mentors & asatidz behind our pesantren`**.
   - **Kolom Kiri (Scalloped Stamp Biscuit Photo Frame & Badges)**:
     - **Balon Kata (*Speech Bubble*)**: Di bagian atas foto terdapat kapsul putih melayang dengan pointer segitiga ke bawah bertuliskan **`Now tell us about yourself`**.
     - **Bingkai Foto Biskuit Scalloped**: Foto potret pimpinan tampil di dalam bingkai bergelombang biskuit (*scalloped cookie stamp shape*) dengan latar belakang peach lembut `#ffdecc`, outline hitam tegas 2.5px, dan bayangan jatuh lembut yang dalam (*deep elevation shadow*).
     - **Stiker Megafon Lime**: Di sudut kanan bawah foto terdapat badge rosette bergelombang warna hijau neon lime dengan ikon megafon hitam Krackerz.
   - **Kolom Kanan (4 Kartu Bitten Stats, Tabel Akreditasi & Strip Logo)**:
     - **4 Kartu Metrik Baris Tunggal dengan Gigitan Sudut Kanan Bawah (*Bitten Corner Notch*)**:
       - Ke-4 kartu berjejer rapi dalam 1 baris di layar desktop.
       - Setiap kartu memiliki potongan sudut melingkar (*circular cracker-bite notch*) di pojok kanan bawahnya (`.bite-corner-br`).
       - Warna kartu bergradasi hangat: Merah Vermilion (`#CF2B09`), Merah Karat (`#A52207`), Merah Anggur Gelap (`#7C1A06`), dan Cherry Wine (`#4A0E17`).
       - Metrik angka display besar: **`8+`**, **`30`**, **`150+`**, dan **`14+`** dengan teks deskripsi informatif.
     - **Tabel 4 Baris Akreditasi & Prestasi Resmi**:
       - 4 baris elegan dengan garis pemisah tipis (*clean dividers*):
         - `Ministry of Religious Affairs` | `Official Pesantren Tahfizh Operational Permit` | `2016`
         - `Ministry of Education` | `Accredited Formal Wustha (SMP) & Ulya (SMA)` | `2018`
         - `Authentic Qur'anic Sanad` | `Hafs 'an 'Ashim via Thariq Asy-Syathibiyyah` | `Mutqin`
         - `Indonesian Ulema Council (MUI)` | `Trilingual Preaching & Da'wah Leadership` | `Active`
       - Tiap baris memiliki efek interaktif halus saat kursor diarahkan (*hover tint*).
     - **Strip Logo / Legalitas Resmi di Bagian Bawah**:
       - Label: `Experience & credentials from:` diikuti 5 badge hitam berkilau: `KEMENAG RI`, `KEMENDIKBUD`, `MUI SULSEL`, `SANAD TAHFIZH`, dan `MAROS REGENCY`.
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

### Langkah 4: Verifikasi Animasi Hover Kartu Diputar Beberapa Derajat (Pure Card Rotation on Hover)
1. **Posisi Awal Kartu Sejajar Tegak Lurus (*Straight Resting Position*)**:
   - Buka `http://localhost:3000/index.html` pada bagian Hero Section.
   - Perhatikan seluruh 6 kartu santri berada dalam posisi **tegak lurus, rapi, dan sejajar rata** (`0deg`), persis seperti kartu sebelah kiri (*Card 5*) pada gambar referensi Anda.
2. **Uji Efek Hover Kartu Diputar (Card Rotates on Hover)**:
   - **Hover pada Kartu 2 atau Kartu 6 (Kartu Marun `#580D14`)**:
     - **Ekspektasi**: Kartu **TIDAK naik membesar** (tanpa scale, tanpa translateY tinggi), melainkan **diputar miring ke kanan sebesar ~7°** (`rotate(7deg)`).
     - Seluruh bagian tepi dan sudut kartu bergerak pindah dari posisi awalnya, persis seperti kartu marun sebelah kanan pada gambar referensi screenshot Anda!
     - Kartu di sebelahnya tetap tegak lurus, menghasilkan kontras visual yang presisi.
     - Kartu yang di-hover naik ke lapisan teratas (`z-50`) dengan bayangan jatuh lembut yang dalam (`box-shadow: 0 20px 40px -4px rgba(0,0,0,0.22)`).
   - **Hover pada Kartu 1, 3, atau 5 (Kartu Krem `#FAF7F0`)**:
     - **Ekspektasi**: Kartu diputar miring ke kiri sebesar `-6°` s/d `-6.5°` (`rotate(-6deg)` / `rotate(-6.5deg)`), memberikan ritme ayunan bergantian yang dinamis dan estetik.
3. **Uji Transisi Keluar (*Unhover*)**:
   - Geser kursor keluar dari kartu:
     - **Ekspektasi**: Kartu berputar kembali secara mulus (*spring transition*) ke posisi awalnya yang tegak lurus (`0deg`) tanpa sentakan atau jitter.

---

## 5. Lokalisasi Bahasa Indonesia Penuh (Full Indonesian Translation)

Seluruh teks antarmuka dan konten di seluruh website telah diubah menjadi **Bahasa Indonesia murni dan alami** tanpa ada lagi istilah bahasa Inggris yang tercampur:

### Ringkasan Perubahan Bahasa per Komponen:
1. **Navbar (`components/navbar.html`)**:
   - `Programs` ➔ `Program`
   - `Honors` ➔ `Prestasi`
   - `Gallery` ➔ `Galeri`
   - `About Us` ➔ `Tentang Kami`
   - `Tuition & Fees` ➔ `Biaya Pendidikan`
   - `REGISTER NOW` ➔ `DAFTAR SEKARANG`
2. **Hero Section (`components/hero.html`)**:
   - Tombol CTA utama: `REGISTER NOW` ➔ `DAFTAR SEKARANG`
3. **About Section (`components/about.html`)**:
   - `Institutional Identity & Vision` ➔ `Identitas & Visi Pesantren`
   - `Faith, Character & Al-Qur'an` ➔ `Iman, Karakter & Al-Qur'an`
   - `ESTABLISHED 2016` ➔ `BERDIRI SEJAK 2016`
   - `Official Institutional Vision` ➔ `Visi Resmi Pesantren`
   - `TRILINGUAL PREACHING` ➔ `DAKWAH 3 BAHASA`
   - `DISCIPLINE & LEADERSHIP` ➔ `DISIPLIN & KEPEMIMPINAN`
   - `Strategic Roadmap` ➔ `Arah Strategis Pesantren`
   - `4 Core Missions` ➔ `4 Misi Utama`
   - `QUR'ANIC MASTERY` ➔ `PENGUASAAN AL-QUR'AN`
   - `DA'WAH EMPOWERMENT` ➔ `PENGEMBANGAN DAKWAH`
   - `RELIGIOUS DISCIPLINE` ➔ `KEDISIPLINAN SYARIAT`
   - `TALENT & POTENTIAL` ➔ `MINAT & POTENSI`
   - `Enroll New Student` ➔ `Daftar Santri Baru`
4. **Kurikulum (`components/curriculum.html`)**:
   - `Academic Excellence & Curriculum` ➔ `Keunggulan Akademik & Kurikulum`
   - `9 Core Educational Pillars` ➔ `9 Pilar Pendidikan Pesantren`
   - Badge Pilar 1 s/d 9: `INTI AL-QUR'AN`, `KADER DAKWAH`, `KETERAMPILAN ORGANISASI`, `KARAKTER & ADAB`, `SANAD QIRA'AH`, `KEPEMIMPINAN`, `ORASI 3 BAHASA`, `KITAB KUNING`, `IJAZAH RESMI NEGARA`
   - `Core Learning Tracks` ➔ `Jalur Pembelajaran Unggulan`
   - Tab Sticky Stacking: `Formal School` ➔ `Sekolah Formal`, `Boarding Life` ➔ `Asrama Santri`
   - Seluruh tombol CTA: `REGISTER NOW` / `Enroll New Student` ➔ `DAFTAR SEKARANG` / `Daftar Santri Baru`
5. **Prestasi (`components/prestasi.html`)**:
   - `Honor Roll & Student Accolades` ➔ `Prestasi & Penghargaan Santri`
   - `Student Excellence & Honors` ➔ `Prestasi & Kebanggaan Santri`
   - Subtitle & deskripsi: `juara olimpiade nasional & tasmi' hafalan mutqin` (Bahasa Indonesia)
   - Metrik: `9+ Medali (Olimpiade Nasional)`, `38+ Juz (Tasmi' Sekali Duduk)`, `Predikat Amat Baik`, `Bersambung Sanad`
   - Filter tabs: `Semua Prestasi (6)`, `🏆 Juara Nasional (3)`, `📖 Tasmi' 10–15 Juz (3)`
   - Badge kartu & jenjang: `🏆 2 EMAS & 1 PERAK`, `🏆 1 EMAS & 2 PERAK`, `🥈 3 MEDALI PERAK`, `Kelas XII`
   - Tombol interaksi: `Lihat Poster Lengkap`, `Perbesar`, `Daftar Santri Baru`
6. **Pimpinan & Pengasuh (`components/founder.html`)**:
   - `MEET LEADERSHIP` ➔ `PROFIL PENGASUH`
   - `the mentors & asatidz behind our pesantren` ➔ `pimpinan & asatidz pembina pondok pesantren`
   - Gelembung percakapan: `Now tell us about yourself` ➔ `Membina santri sepenuh hati`
   - Kartu metrik: `tahun membina pendidikan formal & islami`, `juz kurikulum talaqqi bersanad`, `santri aktif & alumni hafizh`, `asatidz & pembina bersertifikat`
   - Tabel legalitas: `Kementerian Agama RI`, `Kementerian Pendidikan`, `Sanad Al-Qur'an Mu'tabar`, `Majelis Ulama Indonesia (MUI)`, `Aktif`
   - Strip kredensial: `Legalitas & Kemitraan Resmi:`, `KAB. MAROS`
7. **Footer (`components/footer.html`)**:
   - Form placeholder: `Masukkan email atau nomor WhatsApp wali santri...`
   - Tombol submit: `DAFTAR SEKARANG`
   - Pesan sukses: `🎉 Terima kasih! Tim pendaftaran kami akan segera menghubungi Anda.`
   - Menu navigasi & hak cipta: `Program`, `Galeri`, `Tentang Kami`, `Biaya Pendidikan`, `FAQ`, `© 2026 Baitul Qur'an Camba. Seluruh Hak Cipta Dilindungi.`
8. **Galeri (`gallery.html` & `components/gallery-content.html`)**:
   - Title tag: `<title>Galeri Santri & Kampus | ...</title>`
   - Pill badge: `ARSIP KEHIDUPAN SANTRI & KAMPUS · KOLEKSI FOTO`
   - Filter tahun: `Semua Tahun (30)`, `Tahun 2026 (10)`, `Tahun 2025 (10)`, `Tahun 2024 (10)`
   - Label section: `TAHUN AJARAN ... · 10 FOTO`
   - Billboard CTA: `KUNJUNGAN KAMPUS`, `JADWALKAN KUNJUNGAN KAMPUS`

---

### Panduan Pengujian Manual Lokalisasi Bahasa (Manual Verification Guide):
1. **Buka Halaman Utama (`index.html`)**:
   - Periksa header navigasi: Pastikan teks menu bertuliskan `Program`, `Prestasi`, `Galeri`, `Tentang Kami`, `Biaya Pendidikan`, `FAQ` dan tombol bertuliskan `DAFTAR SEKARANG`.
   - Periksa tombol hero: Pastikan tombol bertuliskan `DAFTAR SEKARANG`.
   - Gulir ke seksi About: Pastikan badge bertuliskan `Identitas & Visi Pesantren`, `BERDIRI SEJAK 2016`, `DAKWAH 3 BAHASA`, `DISIPLIN & KEPEMIMPINAN`, `4 Misi Utama`, `PENGUASAAN AL-QUR'AN`, dan tombol `Daftar Santri Baru`.
   - Gulir ke seksi Kurikulum: Pastikan badge pilar berbahasa Indonesia (`INTI AL-QUR'AN`, `KADER DAKWAH`, `KETERAMPILAN ORGANISASI`, dsb.), tab folder bertuliskan `Tahfizh & Sanad`, `Sekolah Formal`, `Asrama Santri`, dan tombol `DAFTAR SEKARANG`.
   - Gulir ke seksi Prestasi: Pastikan kartu metrik (`9+ Medali`, `38+ Juz`, `Tasmi' Sekali Duduk`, `Predikat Amat Baik`), filter tab (`Semua Prestasi`, `Juara Nasional`, `Tasmi' 10–15 Juz`), tag kartu (`2 EMAS & 1 PERAK`, `Kelas XII`), dan tombol `Perbesar` / `Lihat Poster Lengkap`.
   - Gulir ke seksi Profil Pengasuh: Pastikan judul `PROFIL PENGASUH`, percakapan `Membina santri sepenuh hati`, 4 kartu metrik, serta tabel legalitas Kementerian Agama & Pendidikan dalam Bahasa Indonesia.
   - Gulir ke Footer: Pastikan placeholder input formulir bertuliskan `Masukkan email atau nomor WhatsApp wali santri...`, tombol `DAFTAR SEKARANG`, dan tautan footer dalam Bahasa Indonesia.
2. **Buka Halaman Galeri (`gallery.html`)**:
   - Periksa tab filter tahun: `Semua Tahun`, `Tahun 2026`, `Tahun 2025`, `Tahun 2024`.
   - Periksa judul section: `TAHUN AJARAN 2025 / 2026 · 10 FOTO`.
   - Periksa tombol billboard kunjungan: `JADWALKAN KUNJUNGAN KAMPUS`.

---

## 3. Pembaruan Kartu Testimoni: Krackerz 24-Point Scalloped Rosette Cards (`components/testimonials.html`)

Sesuai permintaan dan gambar referensi dari user (seksi `"YOU'RE not ALONE ⚡"` pada Krackerz), kartu testimoni pada seksi **Cerita & Kesan Wali Santri** telah dirombak total dari kartu persegi membulat standar menjadi **Kartu Roset Bergigi 24 Titik (24-Point Scalloped Rosette Cards)** yang saling bertumpuk (*horizontal overlapping cascade*) dengan latar belakang gelap artistik Krackerz:

### Fitur Desain & Visual:
1. **Bentuk Geometri Kartu Roset Bergigi 24 Titik**:
   - Bentuk roset/biskuit bergerigi melengkung 24 lekukan diekstraksi secara presisi 1:1 dari SVG mask asli Krackerz dan diimplementasikan via CSS mask `data:image/svg+xml` di `.scallop-card-mask` tanpa dependensi eksternal atau masalah CORS.
   - Rasio aspek 1:1 berbentuk roset melingkar berdimensi `w-[300px] h-[300px]` pada layar ponsel hingga `w-[390px] h-[390px]` pada layar desktop lebar.
2. **Palet Warna Hangat Bergradasi (Warm Terracotta / Rust Palette)**:
   - **Kartu 1 (Hj. Nurhayati)**: Warna *Bright Orange-Red* (`#F95534`), kemiringan `rotate(-11deg)`, lapisan `z-10`.
   - **Kartu 2 (Drs. H. Syamsuddin)**: Warna *Vermilion Red* (`#CF2B09`), kemiringan `rotate(8deg)`, lapisan `z-20`.
   - **Kartu 3 (Ahmad Fauzan)**: Warna *Burnt Brick Red* (`#A52207`), kemiringan `rotate(-10deg)`, lapisan `z-30`.
   - **Kartu 4 (Umm Maryam)**: Warna *Deep Wine Burgundy* (`#7C1A06`), kemiringan `rotate(12deg)`, lapisan `z-40`.
3. **Efek Menggantung & Ayunan Bandul Saat Di-Hover (*Hanging Pendulum Sway Effect*)**:
   - Kartu dirancang dengan mekanika fisika seperti plang/lencana yang digantung dari titik poros atas tengah (`transform-origin: 50% 14px`).
   - Di bagian atas tengah kartu terdapat lubang pin penggantung (*eyelet pin hole*) dekoratif yang memperkuat ilusi fisik gantungan.
   - Saat kursor diarahkan ke salah satu kartu (*hover*):
     - Kartu otomatis melayang ke lapisan teratas (`z-index: 50`).
     - Kartu mengayun ke kiri dan kanan secara halus dan berirama (*pendulum swing*) mengikuti kurva harmonik `@keyframes hangingSwing` (`-7deg` ke `+7deg` dengan durasi 2.2s `cubic-bezier(0.445, 0.05, 0.55, 0.95)`).
     - Bayangan jatuh (*drop-shadow*) meluas dramatis (`drop-shadow(0 26px 36px rgba(0,0,0,0.72))`) memberikan efek kedalaman realistis saat kartu berayun.
     - Saat kursor dijauhkan (*mouse leave*), kartu kembali tenang secara mulus (*smooth deceleration*).
4. **Tipografi & Elemen Detail 1:1**:
   - Ikon tanda kutip pembuka ganda (`”`) berwarna *Dark Burgundy* (`#580D14`) di kiri atas.
   - Teks kutipan testimoni putih bersih dengan leading nyaman.
   - Nama penutur dengan huruf display tebal kapital (*Bold Display All-Caps*).
   - Label peran dan kota dengan titik pemisah burgundy bulat (*Parent • Makassar*, *Alumni • 30 Juz Hafizh*).
5. **Latar Belakang & Header**:
   - Foto para santri berprestasi Baitul Qur'an Camba (`assets/images/hero-bqc.png`) dengan overlay gradien anggur gelap `#1E0508` yang dramatis dan elegan, berpadu sempurna dengan figur para santri yang berdiri di belakang judul "YOU'RE not ALONE".
   - Header tipografi ikonik Krackerz: `YOU'RE not ALONE` dengan teks `"not"` tulisan tangan miring bersambung (*font-cursive lowercase*) dan stiker kilat neon lime (`assets/images/sticker-lightning.svg`).
   - Tombol CTA ganda Krackerz di bawah kartu: `JOIN WAITLIST ➔` yang langsung memicu modal pendaftaran santri baru.

---

### Panduan Pengujian Manual Kartu Testimoni (Manual Verification Guide):
1. **Jalankan Web Server Lokal**:
   ```powershell
   npx serve .
   ```
   Buka URL di browser (misal `http://localhost:3000` atau `http://localhost:5000`).
2. **Navigasi ke Seksi Testimoni**:
   - Gulir ke bawah halaman hingga menemukan seksi dengan judul besar **YOU'RE not ALONE** dan badge hijau lime **Cerita & Kesan Wali Santri**.
3. **Verifikasi Visual Bentuk Kartu & Lubang Gantungan**:
   - Pastikan kartu berbentuk **roset/stempel bergerigi bulat (24-point scalloped cookie)**.
   - Perhatikan lubang/pin gantungan kecil di bagian atas tengah setiap kartu yang menandai titik tumpuan ayunan.
   - Pastikan warna keempat kartu mengalir indah dari kiri ke kanan: *Bright Orange-Red* (`#F95534`) ➔ *Vermilion* (`#CF2B09`) ➔ *Burnt Red* (`#A52207`) ➔ *Deep Wine* (`#7C1A06`).
   - Pastikan keempat kartu saling bertumpuk sebagian secara miring (`-11°`, `+8°`, `-10°`, `+12°`).
4. **Verifikasi Efek Ayunan Menggantung (*Hanging Swing on Hover*)**:
   - Arahkan kursor (*hover*) ke salah satu kartu (misal Kartu 1 Hj. Nurhayati atau Kartu 2 Drs. H. Syamsuddin).
   - **Ekspektasi**:
     - Kartu langsung naik ke lapisan paling depan (`z-index: 50`) tanpa tertutup kartu lain.
     - Bagian atas kartu tetap bertengger di tempatnya, sementara bagian bawah kartu **berayun ke kiri dan ke kanan secara halus dan natural (*pendulum swing*)** layaknya plang/papan yang digantung dari tali di bagian atas.
     - Bayangan kartu ikut mengembang lembut ke bawah.
   - Jauhkan kursor dari kartu: kartu akan berhenti mengayun dan kembali ke posisi awalnya secara mulus.
5. **Verifikasi Responsivitas Mobile & Tablet**:
   - Buka DevTools (`F12`), pilih mode perangkat bergerak (misal iPhone / iPad / Android).
   - Ekspektasi: Deretan kartu dapat digeser/di-swipe secara horizontal (*smooth horizontal scroll*) dengan nyaman tanpa merusak tata letak halaman.
6. **Verifikasi Tombol CTA**:
   - Klik tombol **JOIN WAITLIST ➔** di bagian bawah seksi testimoni.
   - Ekspektasi: Modal formulir pendaftaran santri baru (*waitlist modal*) akan terbuka seketika.

---

## 🎨 Redesain 10 Aset Maskot & Stiker Kustom Tematik Pondok Pesantren Baitul Qur'an Camba (BQC)

Sebagai tindak lanjut dari permintaan user untuk mendesain ulang seluruh 10 aset stiker dan maskot agar **tidak lagi menggunakan aset bawaan template Krackerz** dan menjadi **100% otentik, unik, dan identik dengan Pondok Pesantren Tahfizh Baitul Qur'an Camba (BQC)**, seluruh file SVG di direktori [`assets/images/`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/) telah dirombak total.

### 📋 Ringkasan Transformasi 10 Aset Vektor (SVG)

| No | File Asset | Transformasi dari Bawaan Lama | Desain Baru Otentik Pesantren BQC | Dimensi ViewBox |
|---|---|---|---|---|
| 1 | [`mascot-cracker.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/mascot-cracker.svg) | Biskuit cracker bulat berkacamata hitam & kumis | **Santri Cilik Hafizh BQC**: Maskot santri muda ramah berkopiah hitam (peci nasional) beraksen pin bintang emas, baju koko putih berkerah shanghai hijau, mengapit mushaf Al-Qur'an bersampul hijau-emas bertali pembatas merah, serta pose mengacungkan jempol penuh semangat. | `0 0 200 240` |
| 2 | [`mascot-cracker-c.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/mascot-cracker-c.svg) | Biskuit berlekuk huruf C generik | **Maskot Huruf "C" (Camba) Pesantren**: Huruf C tebal (*chunky vermilion*) yang mengenakan peci hitam miring bergaris neon lime di ujung atasnya, dengan ornamen bulan sabit dan bintang emas di rongga huruf, serta mata kartun ceria. | `0 0 160 170` |
| 3 | [`sticker-gradcap.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-gradcap.svg) | Topi toga wisuda sederhana | **Wisuda Santri & Ijazah Sanad**: Topi toga sarjana dipadukan dengan gulungan ijazah/sanad Al-Qur'an klasik (*rolled parchment diploma*) yang diikat pita merah tua berstempel segel bintang emas. | `0 0 100 90` |
| 4 | [`sticker-lightning.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-lightning.svg) | Poligon kilat kuning polos satu lapis | **Energetic Tahfizh Spark**: Kilat Neo-Brutalist Electric Lime bergradasi garis aksen merah vermilion dan kilau putih tajam, dikelilingi percikan bintang cahaya (*Nur Al-Qur'an*). | `0 0 100 120` |
| 5 | [`sticker-megaphone.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-megaphone.svg) | Megafon generik warna polos | **Megafon Syiar & Muhadharah 3 Bahasa**: Pengeras suara orasi dakwah bergaris merah bertuliskan **BQC** di badannya, dilengkapi gelombang suara orasi merdu dan bintang syiar. | `0 0 90 80` |
| 6 | [`sticker-rocket.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-rocket.svg) | Roket kartun dasar sederhana | **Roket Prestasi & Cita-Cita Santri**: Roket peluncur kemajuan santri dengan jendela kabin bergambar lambang bulan sabit & bintang emas, sayap aerodinamis merah, serta semburan api bertingkat. | `0 0 90 90` |
| 7 | [`sticker-soda.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-soda.svg) | Cup soda cepat saji berhuruf "K" (*Krakerz*) | **Tumbler Minum Santri / Botol Zam-zam BQC**: Botol minum stainless santri ramah lingkungan bertutup ulir dengan pengait pegangan, emblem tetesan air murni, dan cap tegas bertuliskan **BQC**. | `0 0 80 110` |
| 8 | [`sticker-starburst.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-starburst.svg) | Lencana bergerigi berteks *"BITE LEARN REPEAT"* | **Lencana Badge "30 JUZ MUTQIN SANAD"**: Lencana tactile starburst 16 titik berlatar Electric Lime dengan lingkaran stempel putih-merah dan teks tipografi tegas: `30 JUZ`, `MUTQIN`, `SANAD`. | `0 0 100 100` |
| 9 | [`sticker-trophy.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-trophy.svg) | Piala satu warna generik | **Piala Juara MTQ & Sains BQC**: Piala kejuaraan emas berukir ornamen bintang 8 sudut (*Rub el Hizb*) islami di bagian muka, dan plat nama bertuliskan **BQC** pada pedestal hitamnya. | `0 0 100 100` |
| 10 | [`sticker-van.svg`](file:///d:/Testing%20Claude%20code/pondok-baitulquran-camba/assets/images/sticker-van.svg) | Mobil van bertuliskan *"KRAKERZ"* | **Mobil Operasional Pesantren BQC Camba**: Minibus operasional pondok berwana putih & neon lime dengan rak bagasi atap (*roof rack*), garis merah di samping bertuliskan **"BQC CAMBA"** beserta logo bulan sabit, kaca berrefleksi, dan velg sporty. | `0 0 160 100` |

---

## 🧪 Manual Verification Guide (Panduan Pengujian Manual)

Untuk memverifikasi tampilan aset-aset baru ini di antarmuka web, ikuti panduan langkah demi langkah berikut:

### 1. Menjalankan Server Lokal
Pastikan server lokal berjalan di folder root:
```powershell
npx serve . -p 3000
# atau
python -m http.server 3000
```
Buka browser pada alamat `http://localhost:3000`.

### 2. Memeriksa Stiker di Seksi Kurikulum & Stacking Cards (`#curriculum`)
- Gulir ke seksi **Kurikulum Terpadu Masa Depan Santri**:
  - Pada **Kartu 1 (Tahfizh & Sanad 30 Juz - Merah `#CF2B09`)**:
    - Perhatikan stiker di bagian bawah bingkai foto: kini menampilkan lencana **`30 JUZ / MUTQIN / SANAD`** menggantikan teks lama "Bite Learn Repeat".
  - Pada **Kartu 2 (Sekolah Formal - Merah Bata `#A52207`)**:
    - Perhatikan stiker di bawah foto eskul/formal: menampilkan **Piala MTQ BQC** dengan ukiran bintang 8 sudut (*Rub el Hizb*) dan plat nama **BQC**.
  - Pada **Kartu 3 (Pelatihan Muballigh & Bahasa - Marun `#7C1A06`)**:
    - Perhatikan stiker mobil di bawah foto kegiatan santri: kini menampilkan **Mobil Operasional BQC CAMBA** dengan tulisan resmi **`BQC CAMBA`** menggantikan tulisan lama "Krakerz".

### 3. Memeriksa Stiker di Interactive Laptop Showcase (`#interactive-laptop`)
- Gulir ke seksi laptop interaktif:
  - Periksa deretan stiker taktil yang menghiasi bodi laptop:
    - Stiker **Mobil Operasional BQC CAMBA** (sudah bebas dari teks Krakerz).
    - Stiker **Piala MTQ & Prestasi BQC**.
    - Stiker **Badge 30 JUZ MUTQIN SANAD**.
    - Stiker **Petir Semangat Tahfizh** (*Tahfizh Energy Spark*).
    - Stiker **Tumbler Minum Santri BQC** (sudah bebas dari cup soda dan huruf "K").
    - Stiker **Wisuda & Sanad Diploma** (topi toga dengan gulungan ijazah bersanad).

### 4. Memeriksa Stiker di Galeri Santri & Footer (`#gallery`, `#footer`)
- Gulir ke seksi **Galeri Kehidupan Kampus & Footer**:
  - Periksa stiker dekoratif mengambang (*floating stickers*):
    - Stiker **Megafon Syiar BQC** dengan gelombang suara dakwah.
    - Stiker **Roket Prestasi Santri** dengan jendela berlogo bulan sabit & bintang.
    - Stiker **Mobil Operasional BQC Camba**.

### 5. Memeriksa Maskot Utama di Folder Assets
- Buka langsung file maskot di tab browser baru untuk melihat detail vektor resolusi tinggi:
  - `http://localhost:3000/assets/images/mascot-cracker.svg`
    - Verifikasi: Karakter Santri Cilik Hafizh BQC tersenyum ramah memakai peci hitam, baju koko putih berkerah shanghai, memegang mushaf Al-Qur'an hijau, dan mengacungkan jempol.
  - `http://localhost:3000/assets/images/mascot-cracker-c.svg`
    - Verifikasi: Huruf "C" (Camba) berpeci hitam dengan ornamen bulan bintang di dalamnya.




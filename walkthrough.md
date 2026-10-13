# Walkthrough: Standardisasi Tombol Double-Layer & Overhaul Semua Kartu (Krackerz Style 1:1)

Seluruh komponen kartu (*cards*) dan tombol aksi utama (*CTA buttons*) pada website modern di `d:\Testing Claude code\pondok-baitulquran-camba` kini telah dirombak secara komprehensif mengikuti arsitektur visual asli dari **[https://krackerz.com](https://krackerz.com)**.

Garis batas hitam tebal (*heavy black outlines 2.5px-3px*) dan bayangan brutal kaku (*offset black brutal shadows*) yang sebelumnya dominan telah dibersihkan dan digantikan dengan estetika **Soft Tactile Pop** Krackerz yang sesungguhnya: sudut membulat modern (`rounded-2xl` s/d `rounded-3xl`), bayangan elevasi bertingkat lembut (*layered soft elevation*), bingkai foto putih tebal 8px, dan palet warna solid (*Cream, Cherry Wine, Vermilion, Orange-Red*).

---

## 1. Ringkasan Standardisasi Tombol & Kartu pada Seluruh Komponen

| Komponen | Penyesuaian Tombol "Daftar Sekarang" | Penyesuaian Kartu (*Cards*) Mengikuti Krackerz |
| :--- | :--- | :--- |
| **Navbar** (`components/navbar.html`) | **`Button + Link Wrapper` Krackerz**: Tombol CTA menyatu rapi dalam kapsul bersama menu navigasi. Menggunakan **Double-Layer Button** (wadah putih + tombol neon lime + lingkaran panah merah). | Header navbar kini menggunakan **Solid Pure White (`#FFFFFF` / `bg-white`)**, mengalir mulus dan menyatu sempurna dengan latar belakang awan SVG putih (`#FFFFFF`) tanpa garis/titik krem di atasnya. |
| **Hero Section** (`components/hero.html`) | Tombol pill hijau lama digantikan dengan **Signature Krackerz Double-Layer Button** berlatar putih dengan tombol neon lime dan badge panah merah. | Area atas hero dan pembungkus gelombang awan kini berlatar putih murni (`#FFFFFF`), menyambung mulus dengan awan SVG dan navbar, sementara transisi krem (`#FAF7F0`) hanya muncul di bawah pada area kartu. |
| **About** (`components/about.html`) | Tombol CTA diubah ke **Double-Layer Button** Krackerz (*Daftar Santri Baru ➔*). | Dihilangkan bentuk gigitan kartun (*bite-corner*) hitam. Digantikan dengan **2 Kartu Panel Solid** (**Vermilion Red** `#CF2B09` dan **Cherry Wine** `#580D14`) dengan bingkai billboard putih pekat 8px. |
| **Kurikulum** (`components/curriculum.html`) | Tombol ganda pada tiap tab kurikulum. | **3 Tab Folder Asimetris SVG Otentik** (`#CF2B09`, `#A52207`, `#7C1A06`), badan kartu tanpa outline hitam menyatu dinamis mengikuti tab aktif, foto berbingkai putih 8px, dan stiker mobil van hijau Krackerz. |
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

### Langkah 2: Verifikasi Navigasi Bar (Navbar Putih Bersih, Kompak & Tombol Double-Layer)
1. **Latar Belakang Navbar Putih Murni (`#FFFFFF`) & Proporsi Kompak**:
   - Header navbar menggunakan latar belakang putih solid (`bg-white` / `#FFFFFF`) dengan padding vertikal lebih ramping (`py-2 sm:py-2.5`), menyatu mulus dengan latar belakang SVG awan putih (`krackerz-wave-shape.svg`).
2. **Kapsul Navigasi Kanan (Lebih Ramping & Proporsional)**:
   - Kapsul nav kanan `Button + Link Wrapper` berukuran lebih kompak (`pl-4 pr-1 py-1`) dengan jarak link yang pas (`gap-4 lg:gap-5`, `text-xs`) sehingga tidak memanjang berlebihan.
   - Tombol **DAFTAR SEKARANG**: berukuran mini-tactile presisi (`px-3 py-1.5`, `text-[11px]`, panah merah `w-4 h-4`) yang serasi dan proporsional.
   - Arahkan kursor (*hover*): teks bergulir (*rolling text*) tetap aktif dan halus.
3. **Hero Section Top**:
   - Bagian atas hero dan wave wrapper memiliki latar putih murni (`#FFFFFF`) sehingga gelombang awan SVG berputar secara seamless tanpa patahan warna di bagian atas.
   - Di bawah judul 3 baris, tombol utama hero **DAFTAR SEKARANG** tetap tampil dengan skala hero yang mantap.

---

### Langkah 3: Verifikasi 6 Kartu Hero (Cream & Cherry Soft Tactile)
1. Periksa ke-6 kartu di bawah tombol hero:
   - Tidak ada lagi garis hitam tebal 3px dan tidak ada bayangan hitam offset kaku.
   - Kartu bergantian warna secara elegan: **Kartu 1, 3, 5 (Krem `#FAF7F0` teks merah tua)** dan **Kartu 2, 4, 6 (Cherry Wine `#580D14` teks krem)**.
   - Sudut membulat 16px dengan bayangan lembut natural.
2. Gulir (*scroll*) halaman ke bawah: ke-6 kartu melurus secara halus dari posisi mengipas (*fanned*) menjadi satu baris horizontal rapi.

---

### Langkah 4: Verifikasi Bagian Tentang Kami & Kurikulum
1. **About**:
   - Foto billboard masjid memiliki bingkai putih tebal pekat 8px.
   - 2 kartu di bawahnya tampil dalam warna solid pekat (**Vermilion Red** dan **Cherry Wine**) tanpa sudut terpotong kartun hitam.
   - Tombol di bawahnya menggunakan double-layer button Krackerz.
2. **Kurikulum**:
   - Tab 1, 2, dan 3 berpotongan trapesium mulus.
   - Saat tab diklik, warna badan kartu berganti seketika (`#CF2B09`, `#A52207`, `#7C1A06`) dan menampilkan foto berbingkai putih 8px dengan stiker mobil van hijau Krackerz pada Tab 3.

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

### Langkah 8: Verifikasi Formulir Pendaftaran Modal & Footer
1. Klik tombol **DAFTAR SEKARANG** di manapun pada halaman:
   - Modal pendaftaran muncul dengan tampilan modern bersih dan tombol kirim double-layer Krackerz.
   - Isi nama, WhatsApp, pilih jenjang, lalu kirim; periksa pesan konfirmasi sukses.
2. Periksa form di footer: input bar berbentuk kapsul putih dengan tombol double-layer di dalamnya.

# Walkthrough: Penerapan Penuh Bahasa Indonesia & Integrasi Konten Pondok Pesantren Baitul Qur'an Camba

Seluruh konten dan teks antarmuka (*UI copy*) pada website modern di `d:\Testing Claude code\pondok-baitulquran-camba` kini telah sepenuhnya menggunakan **Bahasa Indonesia yang baik, benar, dan natural**. Konten otentik dari web lama di `D:\Testing Claude code\baitulqurancamba` (identitas resmi, visi-misi, pimpinan pondok & pengasuh, kurikulum tahfizh 30 juz bersanad & sekolah formal, biaya pendidikan dalam Rupiah, ulasan wali santri, FAQ, dan form pendaftaran) telah menyatu dengan estetika **Neo-Brutalist Krackerz**.

---

## 1. Ringkasan Pembaruan Bahasa Indonesia pada Seluruh Komponen

| Komponen | Penyesuaian Bahasa Indonesia | Detail Konten |
| :--- | :--- | :--- |
| **Header / Metadata** (`index.html`) | Judul & meta deskripsi dalam Bahasa Indonesia | `lang="id"`, Judul: *"Pondok Pesantren Tahfizh Baitul Qur'an Camba \| Membina Generasi Qur'ani"*. |
| **Navbar** (`components/navbar.html`) | Subtitle & Menu navigasi | Identitas: *"BAITUL QUR'AN · PESANTREN TAHFIZH CAMBA"*. Menu: `Program`, `Tentang Kami`, `Biaya Pendidikan`, `Kehidupan Santri`, `FAQ`. Tombol CTA: `DAFTAR SEKARANG`. |
| **Hero Section** (`components/hero.html`) | Badge, Judul 3-Baris, CTA, 6 Kartu Santri | Badge: *"PONDOK PESANTREN TAHFIZH & FORMAL SEJAK 2016"*. Judul: `MEMBINA GENERASI` / `PENGHAFAL al-qur'an YANG` / `TANGGUH & BERAKHLAK`. CTA: `DAFTAR SEKARANG`. 6 Kartu: Tahfizh 30 Juz bersanad, Pendidikan formal berijazah resmi negara, Pidato 3 bahasa Arab & Inggris, Pembinaan karakter & kepemimpinan, Kajian taklim kitab kuning klasik, Olahraga santri & ekstrakurikuler. |
| **About** (`components/about.html`) | Header, Poster Kampus, Visi-Misi | Header: *"Ilmu, Akhlak & Al-Qur'an - Tumbuh Bersama di Camba, Maros"*. Poster: *"BERDIRI SEJAK 2016 · SULAWESI SELATAN - Pondok Pencetak Generasi penghafal al-qur'an"*. 2 Kartu: Visi & Misi dan Pendidikan Terpadu. CTA: `Daftar Santri Baru ➔`. |
| **Kurikulum** (`components/curriculum.html`) | 3 Tab Folder Asimetris Krackerz (1:1 Replikasi) | **Tab 1**: `📖 Tahfizh & Sanad 30 Juz` (#CF2B09 vermilion red). **Tab 2**: `🏆 Sekolah Formal & Karakter` (#A52207 rust red). **Tab 3**: `👥 Kehidupan Santri & Asrama` (#7C1A06 wine rust - replika 1:1 tab Community Krackerz). Tata letak 2-kolom horizontal: Kolom kiri dengan judul tebal Bricolage, 3 butir asterik bulat 6-kelopak putih, tombol ganda (wadah putih + tombol neon lime + lingkaran panah merah). Kolom kanan bingkai foto dengan border putih pekat 8px/10px serta stiker die-cut di bagian bawah (bintang sertifikasi, piala, dan mobil van hijau Krackerz). |
| **Pimpinan & Pengasuh** (`components/founder.html`) | Roster Pengurus & Metrik Pondok | Header: *"Pimpinan & Pengasuh Pondok - mengabdi membina santri"*. 4 Metrik: `2016` (Tahun Berdiri), `100+` (Alumni Santri), `30` (Juz Target Sanad), `10+` (Asatidz & Pembina). Roster: Ardiansyah, S.Pd. (Pimpinan Umum), Muhammad Abdurrahman (Asrama Ikhwan), Aisyah Abdurrahman (Asrama Akhwat), Ridwan, S.Pd.I (Kepala Ulya), Sumarni, S.Pd. (Kepala Wustha). |
| **Biaya Pendidikan** (`components/pricing.html`) | Switcher & 3 Pilihan Jenjang dalam Rupiah | Switcher: `Bulanan` vs `Tahunan (-20%)`. Jenjang Wustha (Rp 350rb/bln), Jenjang Ulya (Rp 450rb/bln - Pilihan Utama), Tahfizh Khusus Sanad (Rp 250rb/bln & beasiswa yatim/dhuafa). |
| **Kemitraan** (`components/partner.html`) | Banner Sinergi Umat | Header: *"untuk Para Donatur, Lembaga Dakwah & Sinergi Umat"*. Tombol: `Sinergi Bersama Kami ➔`. |
| **Testimoni** (`components/testimonials.html`) | 4 Review Wali Santri & Alumni | Hj. Nurhayati (Makassar), Drs. H. Syamsuddin (Maros), Ahmad Fauzan (Alumni Hafizh 30 Juz), Umm Maryam (Bone). Tombol: `Bergabung Bersama Kami ➔`. |
| **FAQ Accordion** (`components/faq.html`) | 5 Tanya Jawab Pendaftaran | Syarat penerimaan santri baru, legalitas ijazah resmi negara, asrama 24 jam, pembiasaan bahasa asing, dan jadwal sambang orang tua. |
| **Pusat Belajar Santri** (`components/interactive-laptop.html`) | Interaktif Stiker Laptop | Petunjuk: *"🎯 Geser stiker untuk menjelajahi aktivitas santri"*. Stiker BQC, Mobil operasional pondok, Piala prestasi, 30 Juz Tahfizh & Sanad, Topi wisuda. |
| **Footer & Modal Pendaftaran** (`components/footer.html`, `components/waitlist-modal.html`) | Form & Konfirmasi Sukses | Alamat resmi di Jumpulu, Kel. Cempaniga, Kec. Camba, Kab. Maros. Form pendaftaran: Nama lengkap santri, WhatsApp/Email wali, Pilihan jenjang pendidikan (Wustha, Ulya, Tahfizh Khusus). Pesan sukses konfirmasi pendaftaran. |

---

## 2. Panduan Pengujian Manual (Manual Verification Guide)

Ikuti langkah-langkah berikut untuk menguji dan memverifikasi seluruh antarmuka Bahasa Indonesia secara langsung di web browser:

### Langkah 1: Akses Website
Jalankan live preview / local server pada direktori `d:\Testing Claude code\pondok-baitulquran-camba`:
```powershell
# Jalankan web server lokal
npx serve .
# Atau dengan python
python -m http.server 3000
```
Buka browser pada alamat URL lokal yang muncul (misalnya `http://localhost:3000`).

---

### Langkah 2: Verifikasi Navigasi Bar (Navbar)
1. Periksa teks identitas di kiri atas: pastikan tertulis **BAITUL QUR'AN · PESANTREN TAHFIZH CAMBA**.
2. Periksa menu tengah: pastikan tertulis **Program**, **Tentang Kami**, **Biaya Pendidikan**, **Kehidupan Santri**, dan **FAQ**.
3. Arahkan kursor (*hover*) ke masing-masing menu untuk memastikan efek rolling text merah berjalan mulus.
4. Periksa tombol CTA kapsul: pastikan tertulis **DAFTAR SEKARANG** dengan animasi border bergerigi berputar.
5. Klik menu atau tombol CTA; verifikasi halaman berpindah atau memunculkan formulir pendaftaran.

---

### Langkah 3: Verifikasi Hero Section & Kartu Aktivitas
1. **Pill Badge**: Pastikan teks badge atas bertuliskan **PONDOK PESANTREN TAHFIZH & FORMAL SEJAK 2016**.
2. **Judul 3-Baris**:
   - Baris 1: `MEMBINA GENERASI`
   - Baris 2: `PENGHAFAL` + `al-qur'an` (font miring melengkung) + `YANG` (tanpa ikon logo)
   - Baris 3: `TANGGUH & BERAKHLAK`
3. **Tombol CTA Hero**: Bertuliskan **DAFTAR SEKARANG**.
4. **Animasi Latar Awan**: Pastikan bentuk awan putih berputar (*rotating wave*) dengan mulus di belakang teks tanpa garis potongan horizontal di kiri-kanannya.
5. **Kartu Aktivitas Santri**:
   - Dalam posisi atas, kartu tersusun mengipas (*fanned stack*).
   - Teks label kartu: *Hafalan Al-Qur'an 30 juz bersanad*, *Pendidikan formal berijazah resmi negara*, *Pidato 3 bahasa Arab & Inggris*, *Pembinaan karakter & kepemimpinan*, *Kajian taklim kitab kuning klasik*, *Olahraga santri & ekstrakurikuler*.
   - Gulir (*scroll*) halaman ke bawah 50px-100px: pastikan ke-6 kartu secara halus melurus menjadi **satu baris horizontal rapi dan simetris**.

---

### Langkah 4: Verifikasi Bagian Tentang Kami & Visi-Misi
1. **Billboard Foto**: Menampilkan Masjid Baitul Qur'an Camba dengan poster hitam berteks:
   - `BERDIRI SEJAK 2016 · SULAWESI SELATAN`
   - `Pondok Pencetak Generasi penghafal al-qur'an`
   - `CAMBA · MAROS · SULAWESI SELATAN`
2. **Dua Kartu Bite-Corner**:
   - Kartu Merah: **Visi & misi** pembinaan penghafal Al-Qur'an tangguh, berakhlak mulia, dan cakap berdakwah.
   - Kartu Wine: **Pendidikan terpadu** asrama 24 jam bebas gawai dan ijazah resmi negara.
3. **Tombol CTA**: Bertuliskan **Daftar Santri Baru ➔**.

---

### Langkah 5: Verifikasi Folder Card Kurikulum (1:1 Krackerz Style)
1. **Cek Geometri Tab Asimetris SVG**:
   - Perhatikan tab atas: 3 tab trapesium bersambung saling bertumpuk mulus tanpa celah (`tab-1.svg`, `tab-2.svg`, `tab-3.svg`).
   - Warna tab berjenjang (*stepped palette*): Tab 1 `#CF2B09` (vermilion), Tab 2 `#A52207` (rust red), Tab 3 `#7C1A06` (dark rust/wine).
2. **Uji Klik & Perubahan Warna Dinamis**:
   - **Tab Default (Tab 1)**: Bertuliskan `📖 Tahfizh & Sanad 30 Juz`. Latar badan kartu berwarna merah cerah `#CF2B09` menyatu sempurna dengan Tab 1 (`rounded-tl-none`).
   - **Klik Tab 2 (`🏆 Sekolah Formal & Karakter`)**: Perhatikan warna badan kartu seketika berganti menjadi `#A52207`, Tab 2 menjadi aktif (opacity 100%, z-index terangkat), dan panel berganti mulus ke materi sekolah formal & pidato 3 bahasa.
   - **Klik Tab 3 (`👥 Kehidupan Santri & Asrama`)**: Perhatikan warna badan kartu seketika berganti menjadi `#7C1A06` (persis 1:1 dengan screenshot tab *COMMUNITY* Krackerz), Tab 3 aktif, dan panel menampilkan foto asrama/olahraga dengan stiker mobil van hijau Krackerz (`sticker-van.svg`).
3. **Cek Tata Letak 2-Kolom Horizontal**:
   - **Kolom Kiri**: Judul besar font Bricolage tebal (`font-black uppercase`), 3 butir daftar dengan ikon bunga/asterik 6-kelopak putih murni Krackerz (`✱`), dan tombol lapis ganda (wadah putih berbayang halus + tombol neon lime bergaris batas hitam + lingkaran panah merah `➔`).
   - **Kolom Kanan**: Foto berukuran besar dengan bingkai putih pekat tebal 8px/10px (`border-[8px] sm:border-[10px] border-white shadow-2xl rounded-2xl sm:rounded-3xl`) serta stiker die-cut yang tumpang tindih (*overlap*) di tepi bawah bingkai.
4. **Cek Tombol & Modal**:
   - Klik tombol **Daftar Santri Baru ➔** di dalam kartu; pastikan modal pendaftaran santri baru terbuka seketika.

---

### Langkah 6: Verifikasi Pimpinan & Pengasuh Pondok
1. Periksa foto Mudir/Pimpinan Pondok (`ikhwan.png`) dengan stiker ucapan: *Membina dengan hikmah & keikhlasan*.
2. Periksa 4 kartu metrik:
   - `2016` (Tahun Berdiri di Camba, Maros)
   - `100+` (Alumni Santri Hafizh Tersebar)
   - `30` (Juz Target Sanad Al-Qur'an)
   - `10+` (Asatidz & Pembina Berdedikasi)
3. Periksa tabel struktur pimpinan: Ardiansyah, S.Pd., Muhammad Abdurrahman, Aisyah Abdurrahman, Ridwan, S.Pd.I, dan Sumarni, S.Pd.
4. Periksa lencana legalitas: `KEMENAG RI`, `DIKNAS`, `IJAZAH RESMI`, `SANAD BERSAMBUNG`, `KAB. MAROS`.

---

### Langkah 7: Verifikasi Biaya Pendidikan & Switcher
1. Judul: **Investasi Pendidikan Generasi Qur'ani**.
2. Uji toggle switch antara **Bulanan** dan **Tahunan (-20%)**:
   - Pada mode **Bulanan**: Jenjang Ulya menampilkan `Rp 450rb / Bulan`, Tahfizh Sanad menampilkan `Rp 250rb / Bulan`.
   - Klik switch ke **Tahunan**: Jenjang Ulya otomatis berubah menjadi `Rp 360rb / BULAN (BAYAR TAHUNAN)` dan Tahfizh Sanad menjadi `Rp 200rb / BULAN (BAYAR TAHUNAN)`.
3. Seluruh fitur kartu mencantumkan asrama 24 jam, makan 3x sehari, dan opsi beasiswa dhuafa/yatim.

---

### Langkah 8: Verifikasi FAQ (Tanya & Jawab)
1. Klik pertanyaan FAQ nomor 1 (*Bagaimana syarat pendaftaran santri baru?*).
2. Pastikan accordion terbuka secara halus, ikon `+` berputar menjadi `×`, dan jawaban Bahasa Indonesia tampil informatif.
3. Uji pertanyaan lainnya (legalitas ijazah, asrama 24 jam, bahasa asing, dan jam kunjungan wali).

---

### Langkah 9: Verifikasi Laptop Interaktif (Pusat Belajar Santri)
1. Periksa judul: **Pusat Belajar Santri - sarana belajar & kehidupan santri**.
2. Klik dan seret (*drag & drop*) stiker-stiker aktivitas: lambang BQC, stiker mobil operasional pondok, piala, lencana 30 Juz, topi wisuda, dll.
3. Pastikan stiker dapat dipindahkan bebas ke posisi manapun di atas permukaan laptop mockup.

---

### Langkah 10: Verifikasi Footer & Pengiriman Formulir Pendaftaran
1. **Form Footer**:
   - Masukkan kontak pada input *"Masukkan email atau WhatsApp wali santri"*.
   - Klik tombol **Daftar Sekarang ➔**.
   - Pastikan muncul pesan sukses: *"🎉 Terima kasih! Panitia pendaftaran santri baru akan segera menghubungi Anda."*
2. **Modal Dialog Pendaftaran**:
   - Klik tombol **DAFTAR SEKARANG** di navbar atau tombol CTA manapun.
   - Periksa judul modal: **Pendaftaran Santri Baru**.
   - Input nama santri, kontak orang tua/wali, dan pilih opsi jenjang (*Jenjang Wustha, Jenjang Ulya, Program Khusus Tahfizh 30 Juz, atau Jalur Beasiswa Tahfizh Yatim/Dhuafa*).
   - Klik **Kirim Pendaftaran ➔**.
   - Pastikan status berganti ke tampilan sukses: *"Pendaftaran Berhasil Dikirim! Alhamdulillah! Kami telah menerima data pendaftaran untuk kontak..."*.
3. **Tautan Kontak**:
   - Tombol **WhatsApp** mengarah ke `https://wa.me/6282124880061`.
   - Tombol **Instagram** mengarah ke `@baitulqurancambaofficial`.

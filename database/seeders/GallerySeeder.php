<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photos2026 = [
            ['image_path' => '/assets/images/pondok/halaqah-tahfidz.jpg', 'caption' => 'Halaqah Tahfizh Pagi'],
            ['image_path' => '/assets/images/pondok/gazebo.jpg', 'caption' => 'Gazebo Belajar Asri'],
            ['image_path' => '/assets/images/pondok/eskul-futsal.jpg', 'caption' => 'Eskul Futsal Santri'],
            ['image_path' => '/assets/images/pondok/pidato-3-bahasa.jpg', 'caption' => 'Latihan Pidato Tiga Bahasa'],
            ['image_path' => '/assets/images/pondok/masjid.jpg', 'caption' => 'Ujian Tasmi Al-Quran'],
            ['image_path' => '/assets/images/pondok/suasana-kelas.jpg', 'caption' => 'Suasana Belajar Formal'],
            ['image_path' => '/assets/images/pondok/leadership-3.jpg', 'caption' => 'Bootcamp Kepemimpinan Santri'],
            ['image_path' => '/assets/images/pondok/taklim-kitab-kuning-2.jpg', 'caption' => 'Taklim Kitab Kuning Turats'],
            ['image_path' => '/assets/images/akhwat.png', 'caption' => 'Kajian Santriwati'],
            ['image_path' => '/assets/images/pondok/rumah-tamu.jpg', 'caption' => 'Rumah Tamu Wali Santri'],
            ['image_path' => '/assets/images/prestasi/juara (1).webp', 'caption' => 'Prestasi Santri Juara 1'],
            ['image_path' => '/assets/images/prestasi/tasmi (1).webp', 'caption' => 'Sertifikasi Tasmi 30 Juz'],
        ];

        $photos2025 = [
            ['image_path' => '/assets/images/pondok/halaqah-tahfidz-2.jpg', 'caption' => 'Murajaah Sore di Masjid'],
            ['image_path' => '/assets/images/pondok/asrama.jpg', 'caption' => 'Gedung Asrama Santri'],
            ['image_path' => '/assets/images/pondok/leadership.jpg', 'caption' => 'Kaderisasi Pemimpin Ummat'],
            ['image_path' => '/assets/images/pondok/tarbiah.jpg', 'caption' => 'Bimbingan Tarbiyah Rohani'],
            ['image_path' => '/assets/images/pondok/eskul-takraw.jpg', 'caption' => 'Laga Sepak Takraw'],
            ['image_path' => '/assets/images/pondok/taklim-kitab-kuning.jpg', 'caption' => 'Kajian Fiqih & Hadits'],
            ['image_path' => '/assets/images/pondok/suasana-kelas-2.jpg', 'caption' => 'Diskusi Interaktif Santri'],
            ['image_path' => '/assets/images/pondok/eskul-volly.jpg', 'caption' => 'Olahraga Bola Voli'],
            ['image_path' => '/assets/images/pondok/kantor.jpg', 'caption' => 'Kantor Administrasi Pondok'],
            ['image_path' => '/assets/images/pondok/masjid-2.jpg', 'caption' => 'Panorama Masjid Kampus'],
            ['image_path' => '/assets/images/prestasi/juara (2).webp', 'caption' => 'Juara MHQ Tingkat Kabupaten'],
            ['image_path' => '/assets/images/prestasi/tasmi (2).webp', 'caption' => 'Tasmi Bil Ghaib Sekali Duduk'],
        ];

        $photos2024 = [
            ['image_path' => '/assets/images/pondok/upacara.jpg', 'caption' => 'Upacara Hari Santri Nasional'],
            ['image_path' => '/assets/images/pondok/kelas.jpg', 'caption' => 'Ruang Kelas Nyaman Berbasis IT'],
            ['image_path' => '/assets/images/pondok/leadership-2.jpg', 'caption' => 'Forum Musyawarah Organisasi Santri'],
            ['image_path' => '/assets/images/pondok/tarbiah-2.jpg', 'caption' => 'Tarbiyah & Muhadharah Pekanan'],
            ['image_path' => '/assets/images/pondok/eskul-keterampilan-dakwah.jpg', 'caption' => 'Pelatihan Da\'i Muda'],
            ['image_path' => '/assets/images/pondok/eskul-takraw-2.jpg', 'caption' => 'Latihan Olahraga Sunnah'],
            ['image_path' => '/assets/images/pondok/uks.jpg', 'caption' => 'Pos Kesehatan Pesantren (UKS)'],
            ['image_path' => '/assets/images/pondok/taklim-kitab-kuning-3.jpg', 'caption' => 'Halaqah Ba\'da Subuh'],
            ['image_path' => '/assets/images/pondok/upacara-2.jpg', 'caption' => 'Peringatan Hari Kemerdekaan'],
            ['image_path' => '/assets/images/pondok/rumah-tamu-2.jpg', 'caption' => 'Area Kunjungan Keluarga'],
            ['image_path' => '/assets/images/pondok/toilet.jpg', 'caption' => 'Fasilitas Sanitasi Bersih'],
            ['image_path' => '/assets/images/prestasi/juara (3).webp', 'caption' => 'Penghargaan Musabaqah Tilawatil Quran'],
        ];

        $order = 1;
        foreach ($photos2026 as $item) {
            Gallery::firstOrCreate(
                ['image_path' => $item['image_path']],
                [
                    'year' => 2026,
                    'caption' => $item['caption'],
                    'sort_order' => $order++,
                ]
            );
        }

        foreach ($photos2025 as $item) {
            Gallery::firstOrCreate(
                ['image_path' => $item['image_path']],
                [
                    'year' => 2025,
                    'caption' => $item['caption'],
                    'sort_order' => $order++,
                ]
            );
        }

        foreach ($photos2024 as $item) {
            Gallery::firstOrCreate(
                ['image_path' => $item['image_path']],
                [
                    'year' => 2024,
                    'caption' => $item['caption'],
                    'sort_order' => $order++,
                ]
            );
        }
    }
}

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
            '/assets/images/pondok/halaqah-tahfidz.jpg',
            '/assets/images/pondok/gazebo.jpg',
            '/assets/images/pondok/eskul-futsal.jpg',
            '/assets/images/pondok/pidato-3-bahasa.jpg',
            '/assets/images/pondok/masjid.jpg',
            '/assets/images/pondok/suasana-kelas.jpg',
            '/assets/images/pondok/leadership-3.jpg',
            '/assets/images/pondok/taklim-kitab-kuning-2.jpg',
            '/assets/images/akhwat.png',
            '/assets/images/pondok/rumah-tamu.jpg',
            '/assets/images/prestasi/juara (1).webp',
            '/assets/images/prestasi/tasmi (1).webp',
        ];

        $photos2025 = [
            '/assets/images/pondok/halaqah-tahfidz-2.jpg',
            '/assets/images/pondok/asrama.jpg',
            '/assets/images/pondok/leadership.jpg',
            '/assets/images/pondok/tarbiah.jpg',
            '/assets/images/pondok/eskul-takraw.jpg',
            '/assets/images/pondok/taklim-kitab-kuning.jpg',
            '/assets/images/pondok/suasana-kelas-2.jpg',
            '/assets/images/pondok/eskul-volly.jpg',
            '/assets/images/pondok/kantor.jpg',
            '/assets/images/pondok/masjid-2.jpg',
            '/assets/images/prestasi/juara (2).webp',
            '/assets/images/prestasi/tasmi (2).webp',
        ];

        $photos2024 = [
            '/assets/images/pondok/upacara.jpg',
            '/assets/images/pondok/kelas.jpg',
            '/assets/images/pondok/leadership-2.jpg',
            '/assets/images/pondok/tarbiah-2.jpg',
            '/assets/images/pondok/eskul-keterampilan-dakwah.jpg',
            '/assets/images/pondok/eskul-takraw-2.jpg',
            '/assets/images/pondok/uks.jpg',
            '/assets/images/pondok/taklim-kitab-kuning-3.jpg',
            '/assets/images/pondok/upacara-2.jpg',
            '/assets/images/pondok/rumah-tamu-2.jpg',
            '/assets/images/pondok/toilet.jpg',
            '/assets/images/prestasi/juara (3).webp',
        ];

        $order = 1;
        foreach ($photos2026 as $path) {
            Gallery::firstOrCreate(
                ['image_path' => $path],
                [
                    'year' => 2026,
                    'sort_order' => $order++,
                ]
            );
        }

        foreach ($photos2025 as $path) {
            Gallery::firstOrCreate(
                ['image_path' => $path],
                [
                    'year' => 2025,
                    'sort_order' => $order++,
                ]
            );
        }

        foreach ($photos2024 as $path) {
            Gallery::firstOrCreate(
                ['image_path' => $path],
                [
                    'year' => 2024,
                    'sort_order' => $order++,
                ]
            );
        }
    }
}

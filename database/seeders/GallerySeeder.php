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
            '/assets/images/pondok/halaqah-tahfidz.webp',
            '/assets/images/pondok/gazebo.jpg',
            '/assets/images/pondok/eskul-futsal.webp',
            '/assets/images/pondok/pidato-3-bahasa.webp',
            '/assets/images/pondok/masjid.webp',
            '/assets/images/pondok/suasana-kelas.webp',
            '/assets/images/prestasi/juara (1).webp',
            '/assets/images/prestasi/tasmi (1).webp',
        ];

        $photos2025 = [
            '/assets/images/pondok/asrama.jpg',
            '/assets/images/pondok/leadership.webp',
            '/assets/images/pondok/taklim-kitab-kuning.webp',
            '/assets/images/prestasi/juara (2).webp',
            '/assets/images/prestasi/tasmi (2).webp',
        ];

        $photos2024 = [
            '/assets/images/pondok/upacara.jpg',
            '/assets/images/pondok/upacara-2.jpg',
            '/assets/images/prestasi/juara (3).webp',
            '/assets/images/prestasi/tasmi (3).webp',
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

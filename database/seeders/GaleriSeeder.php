<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeris = [
            [
                'judul' => 'Panen Padi Organik',
                'gambar' => 'banner.jpg'
            ],
            [
                'judul' => 'Kegiatan Pelatihan Petani',
                'gambar' => 'blog1.jpg'
            ],
            [
                'judul' => 'Hasil Pertanian Berkualitas',
                'gambar' => 'blog2.jpg'
            ],
            [
                'judul' => 'Proses Pembuatan Pupuk Organik',
                'gambar' => 'blog3.jpg'
            ],
            [
                'judul' => 'Kunjungan Lapangan',
                'gambar' => 'blog4.jpg'
            ]
        ];

        foreach ($galeris as $galeri) {
            Galeri::create($galeri);
        }
    }
}

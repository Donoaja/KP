<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'judul' => 'Selamat Datang di Krida Tani',
                'deskripsi' => 'Solusi pertanian organik, sehat, dan ramah lingkungan untuk masa depan Indonesia.',
                'gambar' => 'banner.jpg',
                'urutan' => 1,
                'link' => '/produk'
            ],
            [
                'judul' => 'Produk Pertanian Berkualitas',
                'deskripsi' => 'Temukan berbagai produk pertanian organik terbaik untuk kebutuhan budidaya Anda.',
                'gambar' => '',
                'urutan' => 2,
                'link' => '/produk'
            ],
            [
                'judul' => 'Pelatihan Pertanian Modern',
                'deskripsi' => 'Ikuti pelatihan pertanian modern dan dapatkan pengetahuan terbaru dalam dunia pertanian.',
                'gambar' => '',
                'urutan' => 3,
                'link' => '/blog'
            ]
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}

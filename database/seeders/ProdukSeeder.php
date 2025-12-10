<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produks = [
            [
                'nama' => 'Bibit Padi Unggul',
                'deskripsi' => 'Bibit padi berkualitas tinggi dengan hasil panen yang melimpah dan tahan terhadap hama penyakit.',
                'harga' => 150000,
                'gambar' => 'produk1.jpg'
            ],
            [
                'nama' => 'Pupuk Organik Premium',
                'deskripsi' => 'Pupuk organik alami untuk meningkatkan kesuburan tanah dan pertumbuhan tanaman yang optimal.',
                'harga' => 75000,
                'gambar' => 'produk2.jpg'
            ],
            [
                'nama' => 'Alat Pertanian Modern',
                'deskripsi' => 'Peralatan pertanian modern untuk efisiensi kerja dan hasil panen yang lebih baik.',
                'harga' => 500000,
                'gambar' => 'produk3.jpg'
            ],
            [
                'nama' => 'Benih Sayuran Organik',
                'deskripsi' => 'Benih sayuran organik berkualitas tinggi untuk budidaya sayuran sehat dan segar.',
                'harga' => 25000,
                'gambar' => 'produk4.jpg'
            ],
            [
                'nama' => 'Pestisida Alami',
                'deskripsi' => 'Pestisida alami ramah lingkungan untuk mengendalikan hama tanpa merusak ekosistem.',
                'harga' => 100000,
                'gambar' => 'produk1.jpg'
            ]
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}

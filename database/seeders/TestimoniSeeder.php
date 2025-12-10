<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        $testimonis = [
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Petani Padi',
                'isi' => 'Produk pupuk organik dari Krida Tani sangat berkualitas. Hasil panen saya meningkat 30% setelah menggunakan pupuk organik mereka.',
                'foto' => 'thumb.jpg'
            ],
            [
                'nama' => 'Siti Rahayu',
                'jabatan' => 'Petani Sayuran',
                'isi' => 'Bibit sayuran organik yang saya beli di Krida Tani tumbuh dengan sangat baik. Tanaman sehat dan hasilnya melimpah.',
                'foto' => 'thumb.jpg'
            ],
            [
                'nama' => 'Ahmad Wijaya',
                'jabatan' => 'Kelompok Tani',
                'isi' => 'Pelatihan yang diberikan sangat bermanfaat. Kami belajar teknik pertanian modern yang ramah lingkungan dan hasilnya luar biasa.',
                'foto' => 'thumb.jpg'
            ],
            [
                'nama' => 'Maya Sari',
                'jabatan' => 'Petani Organik',
                'isi' => 'Krida Tani membantu saya beralih ke pertanian organik. Sekarang hasil panen lebih sehat dan ramah lingkungan.',
                'foto' => 'thumb.jpg'
            ],
            [
                'nama' => 'Rudi Hartono',
                'jabatan' => 'Petani Berpengalaman',
                'isi' => 'Alat pertanian modern dari Krida Tani sangat membantu meningkatkan efisiensi kerja. Kualitas produk dan layanan sangat memuaskan.',
                'foto' => 'thumb.jpg'
            ]
        ];

        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }
    }
}

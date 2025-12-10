<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'judul' => 'Tips Budidaya Padi Organik',
                'isi' => 'Panduan lengkap untuk budidaya padi organik yang menghasilkan panen melimpah dan ramah lingkungan. Pelajari teknik-teknik modern yang telah terbukti efektif.',
                'penulis' => 'Bang Dono',
                'gambar' => ''
            ],
            [
                'judul' => 'Manfaat Pupuk Organik untuk Tanaman',
                'isi' => 'Mengapa pupuk organik lebih baik daripada pupuk kimia? Temukan jawabannya dan pelajari cara membuat pupuk organik sendiri di rumah.',
                'penulis' => 'Bang Dono',
                'gambar' => ''
            ],
            [
                'judul' => 'Teknologi Pertanian Modern',
                'isi' => 'Eksplorasi teknologi terbaru dalam dunia pertanian yang dapat meningkatkan produktivitas dan efisiensi kerja petani.',
                'penulis' => 'Bang Dono',
                'gambar' => ''
            ],
            [
                'judul' => 'Cara Mengatasi Hama Tanaman Secara Alami',
                'isi' => 'Solusi ramah lingkungan untuk mengatasi masalah hama tanaman tanpa menggunakan pestisida kimia yang berbahaya.',
                'penulis' => 'Bang Dono',
                'gambar' => ''
            ],
            [
                'judul' => 'Panduan Menanam Sayuran Organik',
                'isi' => 'Langkah-langkah praktis untuk menanam sayuran organik di pekarangan rumah dengan hasil yang memuaskan.',
                'penulis' => 'Bang Dono',
                'gambar' => ''
            ]
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}

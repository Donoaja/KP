<style>
    .wrapper-card-blog {
      overflow: hidden;
      height: 180px;
    }
  
    .img-card-blog {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
  
    .card.shadow-sm:hover .img-card-blog {
      transform: scale(1.1);
    }
  
    .card.shadow-sm {
      border-radius: 12px;
      transition: box-shadow 0.3s ease;
    }
  
    .card.shadow-sm:hover {
      box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
    }
  
    h4 {
      font-weight: 700;
      color: #198754;
    }
  
    p.lead {
      color: #555;
      margin-bottom: 40px;
    }
  
    .btn-success {
      border-radius: 50px;
      padding: 10px 30px;
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.3s ease;
    }
  
    .btn-success:hover {
      background-color: #145c32;
      box-shadow: 0 6px 15px rgba(20, 92, 50, 0.6);
      transform: scale(1.05);
    }
  </style>
@extends('home.layouts.wrapper')

@php
$breadcrumbs = [
    ['title' => 'Artikel', 'url' => '/blog']
];
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
  <div class="text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-2 tracking-tight">Blog & Artikel</h2>
    <p class="text-lg text-gray-600">Dapatkan informasi, tips, dan berita terbaru seputar pertanian organik.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    @forelse(($blogs ?? []) as $blog)
      <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 overflow-hidden group">
        <div class="relative overflow-hidden">
          <img src="{{ $blog->gambar ? asset('storage/'.$blog->gambar) : asset('img/blog1.jpg') }}" alt="{{ $blog->judul }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-primary mb-2 group-hover:text-darkgreen transition">{{ $blog->judul }}</h3>
          <p class="text-gray-600 text-sm mb-4">{{ Str::limit($blog->isi, 120) }}</p>
          <div class="flex items-center justify-between">
            <span class="text-xs text-gray-500">{{ $blog->created_at->format('d M Y') }}</span>
            <a href="/blog/{{ $blog->id }}" class="inline-flex items-center text-primary font-semibold hover:text-darkgreen transition">
              Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
            </a>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-full text-center text-gray-500 py-10">Belum ada artikel yang tersedia.</div>
    @endforelse
  </div>

  @if(method_exists(($blogs ?? null), 'links'))
    <div class="flex justify-center mt-8">
      {!! $blogs->links() !!}
    </div>
  @endif
</div>
@endsection
  
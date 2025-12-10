@extends('home.layouts.wrapper')

@php
$breadcrumbs = [
    ['title' => 'Galeri', 'url' => '/galeri']
];
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
  <div class="text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-2 tracking-tight">Galeri Dokumentasi</h2>
    <p class="text-lg text-gray-600">Dokumentasi kegiatan dan hasil pertanian terbaik kami.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse(($galeris ?? []) as $galeri)
      <a href="/galeri/{{ $galeri->id }}" class="relative group overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 block">
        <div class="aspect-square overflow-hidden">
          <img src="{{ $galeri->gambar ? asset('storage/'.$galeri->gambar) : asset('img/thumb.jpg') }}" 
               alt="Galeri" 
               class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
          <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white text-center">
            <i class="fas fa-search-plus text-3xl mb-2"></i>
            <p class="text-sm font-semibold">Lihat Detail</p>
          </div>
        </div>
        @if($galeri->judul)
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
            <h3 class="text-white font-semibold text-sm">{{ $galeri->judul }}</h3>
          </div>
        @endif
      </a>
    @empty
      <div class="col-span-full text-center text-gray-500 py-10">
        <i class="fas fa-images text-4xl mb-4 text-gray-300"></i>
        <p>Belum ada galeri yang tersedia.</p>
      </div>
    @endforelse
  </div>

  @if(method_exists(($galeris ?? null), 'links'))
    <div class="flex justify-center mt-8">
      {!! $galeris->links() !!}
    </div>
  @endif
</div>
@endsection

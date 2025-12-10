@extends('home.layouts.wrapper')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
  <a href="/galeri" class="inline-flex items-center text-primary hover:text-darkgreen mb-6"><i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri</a>

  <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
    <img src="{{ $galeri->gambar ? asset('storage/'.$galeri->gambar) : asset('img/thumb.jpg') }}" alt="{{ $galeri->judul ?? 'Galeri' }}" class="w-full max-h-[70vh] object-cover">
    <div class="p-6">
      @if($galeri->judul)
        <h1 class="text-2xl font-extrabold text-primary mb-2">{{ $galeri->judul }}</h1>
      @endif
      @if($galeri->deskripsi)
        <p class="text-gray-700">{{ $galeri->deskripsi }}</p>
      @endif
      <p class="text-xs text-gray-500 mt-3">Diupload: {{ $galeri->created_at?->format('d M Y') }}</p>
    </div>
  </div>
</div>
@endsection



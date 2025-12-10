@extends('home.layouts.wrapper')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
  <a href="/blog" class="inline-flex items-center text-primary hover:text-darkgreen mb-6"><i class="fas fa-arrow-left mr-2"></i> Kembali ke Blog</a>

  <article class="bg-white rounded-2xl shadow-xl overflow-hidden">
    @if($blog->gambar)
      <img src="{{ asset('storage/'.$blog->gambar) }}" alt="{{ $blog->judul }}" class="w-full h-72 object-cover">
    @endif
    <div class="p-8">
      <h1 class="text-3xl font-extrabold text-primary mb-2">{{ $blog->judul }}</h1>
      <div class="text-sm text-gray-500 mb-6">Ditulis oleh {{ $blog->penulis }} • {{ $blog->created_at?->format('d M Y') }}</div>
      <div class="prose max-w-none text-gray-800 leading-relaxed">{!! nl2br(e($blog->isi)) !!}</div>
    </div>
  </article>
</div>
@endsection



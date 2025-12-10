@extends('home.layouts.wrapper')

@php
$breadcrumbs = [
    ['title' => 'Produk', 'url' => '/produk']
];
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
  <div class="text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-2 tracking-tight">Produk Lengkap Perusahaan</h2>
    <p class="text-lg text-gray-600">Lihat semua produk unggulan yang kami tawarkan untuk kebutuhan pertanian Anda.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @forelse(($produks ?? []) as $produk)
      <div class="relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center p-6 border group overflow-hidden">
        <div class="absolute top-4 right-4 z-10">
          @if(isset($produk->harga))
            <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">Rp {{ number_format($produk->harga,0,',','.') }}</span>
          @endif
        </div>
        <div class="w-full h-48 flex items-center justify-center mb-4 overflow-hidden rounded-xl bg-gray-100 border group-hover:ring-4 group-hover:ring-primary/20 transition">
          <img src="{{ $produk->gambar ? asset('storage/'.$produk->gambar) : asset('img/produk1.jpg') }}" alt="{{ $produk->nama }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300">
        </div>
        <div class="text-center w-full flex-1 flex flex-col">
          <h3 class="text-lg font-extrabold text-primary mb-1 group-hover:text-darkgreen transition">{{ $produk->nama }}</h3>
          @if($produk->deskripsi)
            <p class="text-gray-600 text-sm mb-2">{{ Str::limit($produk->deskripsi, 100) }}</p>
          @endif
        </div>
        <a href="/produk/{{ $produk->id }}" class="mt-3 inline-block bg-gradient-to-r from-primary to-accent text-white px-6 py-2 rounded-full font-semibold shadow hover:from-darkgreen hover:to-primary transition-all duration-200">Lihat Detail</a>
      </div>
    @empty
      <div class="col-span-full text-center text-gray-500 py-10">Belum ada produk yang tersedia.</div>
    @endforelse
  </div>

  @if(method_exists(($produks ?? null), 'links'))
    <div class="flex justify-center mt-8">
      {!! $produks->links() !!}
    </div>
  @endif
</div>
@endsection
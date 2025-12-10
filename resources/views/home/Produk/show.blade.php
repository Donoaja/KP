@extends('home.layouts.wrapper')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
  <a href="/produk" class="inline-flex items-center text-primary hover:text-darkgreen mb-6"><i class="fas fa-arrow-left mr-2"></i> Kembali ke Produk</a>

  <div class="bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-0">
    <div class="p-0">
      <img src="{{ $produk->gambar ? asset('storage/'.$produk->gambar) : asset('img/produk1.jpg') }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover">
    </div>
    <div class="p-8">
      <h1 class="text-3xl font-extrabold text-primary mb-3">{{ $produk->nama }}</h1>
      @if(isset($produk->harga))
        <p class="text-2xl font-bold text-green-600 mb-4">Rp {{ number_format($produk->harga,0,',','.') }}</p>
      @endif
      @if($produk->deskripsi)
        <div class="prose max-w-none text-gray-700 leading-relaxed">{!! nl2br(e($produk->deskripsi)) !!}</div>
      @endif
      <div class="mt-6 grid grid-cols-2 gap-4 text-sm text-gray-600">
        @if(isset($produk->stok))
          <div><span class="font-semibold text-gray-800">Stok:</span> {{ $produk->stok }}</div>
        @endif
        <div><span class="font-semibold text-gray-800">Diperbarui:</span> {{ $produk->updated_at?->format('d M Y') }}</div>
      </div>
    </div>
  </div>
</div>
@endsection



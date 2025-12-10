@extends('home.layouts.wrapper')

@php
$breadcrumbs = [
    ['title' => 'Tentang Kami', 'url' => '/about']
];
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
  <div class="text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-2 tracking-tight">Tentang Kami</h2>
    <p class="text-lg text-gray-600">Mengenal lebih dekat tentang perusahaan dan visi misi kami.</p>
  </div>

  <div class="flex flex-col md:flex-row items-center gap-8 mb-12">
    <div class="flex-1">
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-primary mb-2">{{ $about->nama ?? 'Krida Tani' }}</h3>
        <p class="text-gray-700 mb-2"><b>Tahun Berdiri:</b> {{ $about->tahun_berdiri ?? '-' }}</p>
        <p class="text-gray-700 mb-2"><b>Alamat:</b> {{ $about->alamat ?? '-' }}</p>
        <p class="text-gray-700 mb-2"><b>Email:</b> {{ $about->email ?? '-' }}</p>
        <p class="text-gray-700 mb-2"><b>Telepon:</b> {{ $about->telepon ?? '-' }}</p>
      </div>
    </div>
    <div class="flex-1">
      <img src="{{ asset('img/tentang.jpg') }}" alt="Profil Perusahaan" class="rounded-xl shadow-md w-full object-cover">
    </div>
  </div>

  <div class="bg-white rounded-xl shadow p-8">
    <h3 class="text-2xl font-bold text-primary mb-4">Profil Perusahaan</h3>
    <p class="text-gray-700 leading-relaxed">{{ $about->tentang ?? 'Profil perusahaan belum diisi.' }}</p>
  </div>
</div>
@endsection
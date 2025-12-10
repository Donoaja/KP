@extends('home.layouts.wrapper')

@php
$breadcrumbs = [
    ['title' => 'Kontak', 'url' => '/contact']
];
@endphp

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
  <div class="text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-2 tracking-tight">Hubungi Kami</h2>
    <p class="text-lg text-gray-600">Ada pertanyaan? Silakan hubungi kami melalui form di bawah ini.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Contact Form -->
    <div class="bg-white rounded-xl shadow p-8">
      <h3 class="text-xl font-bold text-primary mb-4">Kirim Pesan</h3>
      @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
      @endif
      @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
          <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="space-y-4" action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div>
          <input name="nama" value="{{ old('nama') }}" type="text" placeholder="Nama Lengkap" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div>
          <input name="email" value="{{ old('email') }}" type="email" placeholder="Email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div>
          <input name="subjek" value="{{ old('subjek') }}" type="text" placeholder="Subjek" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div>
          <textarea name="isi" placeholder="Pesan" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">{{ old('isi') }}</textarea>
        </div>
        <button type="submit" class="w-full bg-primary text-white font-semibold px-8 py-3 rounded-full shadow hover:bg-secondary transition">Kirim Pesan</button>
      </form>
    </div>

    <!-- Contact Info -->
    <div class="bg-white rounded-xl shadow p-8">
      <h3 class="text-xl font-bold text-primary mb-4">Informasi Kontak</h3>
      <div class="space-y-4">
        <div class="flex items-center">
          <i class="fas fa-map-marker-alt text-primary mr-3"></i>
          <span class="text-gray-700">Di jalan Raya  Maos Adipala, Kaliandri, Kecamatan Adipala, Kabupaten Cilacap, Jawa Tengah</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-phone text-primary mr-3"></i>
          <span class="text-gray-700">+62 123 456 7890</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-envelope text-primary mr-3"></i>
          <span class="text-gray-700">info@kridatani.com</span>
        </div>
        <div class="flex items-center">
          <i class="fab fa-whatsapp text-primary mr-3"></i>
          <a href="https://wa.me/6281234567890" target="_blank" class="text-gray-700 hover:text-primary">WhatsApp Kami</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
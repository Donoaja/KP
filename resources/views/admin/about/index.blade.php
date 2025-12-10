@extends('admin.layouts.layout')
@section('page_title', 'Profil Perusahaan')
@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-primary">Profil Perusahaan</h3>
        @if(!$profil)
            <a href="{{ route('about.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-secondary transition">
                <i class="fas fa-plus mr-2"></i> Tambah Profil
            </a>
        @endif
    </div>
    @if($profil)
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <div class="flex items-center mb-4">
            <div class="w-16 h-16 rounded-full bg-lightgreen flex items-center justify-center mr-4">
                <i class="fas fa-building text-3xl text-primary"></i>
            </div>
            <div>
                <h4 class="text-xl font-semibold text-gray-800">{{ $profil->nama }}</h4>
                <p class="text-sm text-gray-500">Berdiri sejak {{ $profil->tahun_berdiri }}</p>
            </div>
        </div>
        <div class="mb-4">
            <p class="text-gray-700 mb-2"><span class="font-semibold">Alamat:</span> {{ $profil->alamat }}</p>
            <p class="text-gray-700 mb-2"><span class="font-semibold">Email:</span> {{ $profil->email }}</p>
            <p class="text-gray-700 mb-2"><span class="font-semibold">Telepon:</span> {{ $profil->telepon }}</p>
        </div>
        <div class="mb-4">
            <h5 class="font-semibold text-gray-800 mb-1">Tentang Perusahaan</h5>
            <p class="text-gray-600">{{ $profil->tentang }}</p>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('about.edit', $profil->id) }}" class="inline-flex items-center px-4 py-2 bg-accent text-white rounded-lg shadow hover:bg-secondary transition">
                <i class="fas fa-edit mr-2"></i> Edit Profil
            </a>
        </div>
    </div>
    @else
    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center justify-center">
        <i class="fas fa-building text-4xl text-gray-300 mb-2"></i>
        <p class="text-gray-500 mb-4">Belum ada data profil perusahaan.</p>
        <a href="{{ route('about.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-secondary transition">
            <i class="fas fa-plus mr-2"></i> Tambah Profil
        </a>
    </div>
    @endif
</div>
@endsection

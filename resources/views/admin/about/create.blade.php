@extends('admin.layouts.layout')
@section('page_title', isset($profil) ? 'Edit Profil Perusahaan' : 'Tambah Profil Perusahaan')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">{{ isset($profil) ? 'Edit Profil Perusahaan' : 'Tambah Profil Perusahaan' }}</h2>
        <form action="{{ isset($profil) ? route('about.update', $profil->id) : route('about.store') }}" method="POST">
            @csrf
            @if(isset($profil))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Perusahaan</label>
                <input type="text" name="nama" value="{{ old('nama', $profil->nama ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Tahun Berdiri</label>
                <input type="number" name="tahun_berdiri" value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" min="1900" max="{{ date('Y') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $profil->alamat ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $profil->email ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $profil->telepon ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Tentang Perusahaan</label>
                <textarea name="tentang" rows="4" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>{{ old('tentang', $profil->tentang ?? '') }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('about.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-secondary">{{ isset($profil) ? 'Update' : 'Simpan' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

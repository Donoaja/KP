@extends('admin.layouts.layout')
@section('page_title', 'Edit Banner')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">Edit Banner</h2>
        <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $banner->judul) }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30">{{ old('deskripsi', $banner->deskripsi) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Link (opsional)</label>
                <input type="text" name="link" value="{{ old('link', $banner->link) }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Urutan (angka, opsional)</label>
                <input type="number" name="urutan" value="{{ old('urutan', $banner->urutan) }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" min="0">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                <input type="file" name="gambar" accept="image/*" class="block w-full text-sm text-gray-500 border border-black/70 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-secondary focus:border-primary" />
                @error('gambar')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @if($banner->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$banner->gambar) }}" alt="Gambar" class="w-32 h-16 object-cover rounded shadow">
                    </div>
                @endif
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('banner.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-secondary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

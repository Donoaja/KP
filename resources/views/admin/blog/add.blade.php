@extends('admin.layouts.layout')
@section('page_title', isset($blog) ? 'Edit Artikel' : 'Tambah Artikel')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">{{ isset($blog) ? 'Edit Artikel' : 'Tambah Artikel' }}</h2>
        <form action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($blog))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul', $blog->judul ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Isi Artikel</label>
                <textarea name="isi" rows="6" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>{{ old('isi', $blog->isi ?? '') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis', $blog->penulis ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar Artikel</label>
                <input type="file" name="gambar" accept="image/*" class="block w-full text-sm text-gray-500 border border-black/70 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-secondary focus:border-primary" />
                @if(isset($blog) && $blog->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$blog->gambar) }}" alt="Gambar" class="w-32 h-32 object-cover rounded shadow">
                    </div>
                @endif
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('blog.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-secondary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

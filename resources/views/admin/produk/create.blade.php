@extends('admin.layouts.layout')
@section('page_title', 'Tambah Produk')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">Tambah Produk</h2>
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
                <input type="text" name="nama" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30"></textarea>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Harga</label>
                    <input type="number" name="harga" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" min="0" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Stok</label>
                    <input type="number" name="stok" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" min="0" required>
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar Produk</label>
                <input type="file" name="gambar" accept="image/*" class="block w-full text-sm text-gray-500 border border-black/70 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-secondary focus:border-primary" />
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('produk.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-secondary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

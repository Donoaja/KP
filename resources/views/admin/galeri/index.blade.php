@extends('admin.layouts.layout')
@section('page_title', 'Daftar Galeri')
@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-primary">Daftar Galeri</h3>
        <a href="{{ route('galeri.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-secondary transition">
            <i class="fas fa-plus mr-2"></i> Tambah Galeri
        </a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-xl shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($galeris as $galeri)
            <div class="bg-gray-50 rounded-lg shadow p-4 flex flex-col">
                <img src="{{ asset('storage/'.$galeri->gambar) }}" alt="Gambar" class="w-full h-48 object-cover rounded mb-4">
                <h4 class="font-bold text-lg text-primary mb-2">{{ $galeri->judul }}</h4>
                <p class="text-gray-600 flex-1">{{ $galeri->deskripsi }}</p>
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('galeri.edit', $galeri->id) }}" class="inline-flex items-center px-3 py-1 bg-accent text-white rounded hover:bg-secondary transition"><i class="fas fa-edit mr-1"></i> Edit</a>
                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus galeri ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"><i class="fas fa-trash mr-1"></i> Hapus</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 text-gray-400">Belum ada data galeri.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection

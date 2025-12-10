@extends('admin.layouts.layout')
@section('page_title', 'Daftar Banner')
@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-primary">Daftar Banner</h3>
        <a href="{{ route('banner.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-secondary transition">
            <i class="fas fa-plus mr-2"></i> Tambah Banner
        </a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-xl shadow p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">#</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Gambar</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Judul</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Deskripsi</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Link</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Urutan</th>
                        <th class="px-4 py-2 text-center text-xs font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $banner)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/'.$banner->gambar) }}" alt="Gambar" class="w-24 h-12 object-cover rounded shadow">
                        </td>
                        <td class="px-4 py-2 font-medium">{{ $banner->judul }}</td>
                        <td class="px-4 py-2">{{ $banner->deskripsi }}</td>
                        <td class="px-4 py-2">{{ $banner->link }}</td>
                        <td class="px-4 py-2">{{ $banner->urutan }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('banner.edit', $banner->id) }}" class="inline-flex items-center px-3 py-1 bg-accent text-white rounded hover:bg-secondary transition mr-2"><i class="fas fa-edit mr-1"></i> Edit</a>
                            <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus banner ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"><i class="fas fa-trash mr-1"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 text-gray-400">Belum ada data banner.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

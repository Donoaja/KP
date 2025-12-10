@extends('admin.layouts.layout')
@section('page_title', 'Daftar Produk')
@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-primary">Daftar Produk</h3>
        <a href="{{ route('produk.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-secondary transition">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
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
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Harga</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Stok</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Gambar</th>
                        <th class="px-4 py-2 text-center text-xs font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $produk)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 font-medium">{{ $produk->nama }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($produk->harga,0,',','.') }}</td>
                        <td class="px-4 py-2">{{ $produk->stok }}</td>
                        <td class="px-4 py-2">
                            @if($produk->gambar)
                                <img src="{{ asset('storage/'.$produk->gambar) }}" alt="Gambar" class="w-16 h-16 object-cover rounded shadow">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('produk.edit', $produk->id) }}" class="inline-flex items-center px-3 py-1 bg-accent text-white rounded hover:bg-secondary transition mr-2"><i class="fas fa-edit mr-1"></i> Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"><i class="fas fa-trash mr-1"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-8 text-gray-400">Belum ada data produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.layout')
@section('page_title', 'Pesan Masuk')
@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-primary">Pesan Masuk</h3>
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
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Email</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Subjek</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Isi Pesan</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Tanggal</th>
                        <th class="px-4 py-2 text-center text-xs font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesans as $pesan)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 font-medium">{{ $pesan->nama }}</td>
                        <td class="px-4 py-2">{{ $pesan->email }}</td>
                        <td class="px-4 py-2">{{ $pesan->subjek }}</td>
                        <td class="px-4 py-2">{{ $pesan->isi }}</td>
                        <td class="px-4 py-2">{{ $pesan->created_at->format('d M Y H:i') }}</td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"><i class="fas fa-trash mr-1"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 text-gray-400">Belum ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

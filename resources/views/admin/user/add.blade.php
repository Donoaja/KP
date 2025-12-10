@extends('admin.layouts.layout')
@section('page_title', isset($user) ? 'Edit User' : 'Tambah User')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-2xl font-bold text-primary mb-6">{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h2>
        <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" placeholder="contoh@email.com" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Kata Sandi{{ isset($user) ? ' (isi jika ingin mengubah)' : '' }}</label>
                <input type="password" name="password" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" placeholder="Minimal 6 karakter" {{ isset($user) ? '' : 'required' }}>
            </div>
            @if(isset($user))
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Ulangi Kata Sandi (jika diubah)</label>
                <input type="password" name="re_password" class="form-input w-full rounded-lg border border-black/70 focus:border-primary focus:ring focus:ring-primary/30" placeholder="Ulangi kata sandi">
            </div>
            @endif
            <div class="flex justify-end gap-2">
                <a href="{{ route('user.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-secondary">{{ isset($user) ? 'Update' : 'Simpan' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

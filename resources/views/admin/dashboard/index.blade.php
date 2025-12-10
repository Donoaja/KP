@extends('admin.layouts.layout')
@section('page_title', 'Dashboard')
@section('content')
<div class="max-w-7xl mx-auto">
    <h2 class="text-2xl font-bold text-primary mb-6">Dashboard</h2>
    <!-- Statistik Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <i class="fas fa-seedling text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('produks') ? \App\Models\Produk::count() : 0 }}</div>
            <div class="text-xs text-gray-500">Produk</div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <i class="fas fa-newspaper text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('blogs') ? \App\Models\Blog::count() : 0 }}</div>
            <div class="text-xs text-gray-500">Artikel</div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <i class="fas fa-images text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('galeris') ? \App\Models\Galeri::count() : 0 }}</div>
            <div class="text-xs text-gray-500">Galeri</div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <i class="fas fa-image text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('banners') ? \App\Models\Banner::count() : 0 }}</div>
            <div class="text-xs text-gray-500">Banner</div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <i class="fas fa-comment-alt text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('testimonis') ? \App\Models\Testimoni::count() : 0 }}</div>
            <div class="text-xs text-gray-500">Testimoni</div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <i class="fas fa-envelope text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('pesans') ? \App\Models\Pesan::count() : 0 }}</div>
            <div class="text-xs text-gray-500">Pesan Masuk</div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center col-span-2 md:col-span-3 lg:col-span-6">
            <i class="fas fa-users-cog text-2xl text-primary mb-2"></i>
            <div class="text-lg font-bold">{{ \Illuminate\Support\Facades\Schema::hasTable('users') ? \App\Models\User::count() : 0 }}</div>
            <div class="text-xs text-gray-500">User</div>
        </div>
    </div>
</div>
@endsection



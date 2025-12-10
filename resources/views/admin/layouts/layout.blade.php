<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Krida Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2e7d32',
                        secondary: '#388e3c',
                        accent: '#4caf50',
                        darkgreen: '#1b5e20',
                        lightgreen: '#a5d6a7',
                        soil: '#795548',
                        wheat: '#f5deb3'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body {
                @apply bg-gray-50 font-poppins text-gray-700 min-h-screen;
            }
            .sidebar {
                @apply bg-darkgreen;
                background: #1b5e20 !important;
            }
            .sidebar-item {
                @apply text-white;
            }
            .sidebar-item:hover {
                background: rgba(255, 255, 255, 0.08);
            }
            .sidebar-item.active {
                @apply bg-white bg-opacity-20 text-white font-semibold;
            }
            .leaf-pattern {
                background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%232e7d32' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            }
            .card {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s ease;
            }
            .card:hover {
                transform: translateY(-5px);
            }
            .notification-dot {
                @apply absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold shadow;
            }
            .page-title {
                @apply text-2xl font-bold text-darkgreen mb-6 pb-2 border-b border-gray-200;
            }
            .content-container {
                @apply bg-white rounded-xl shadow-sm p-6;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 font-poppins text-gray-700">
<div class="flex flex-col md:flex-row min-h-screen">
    <!-- Sidebar -->
    <div class="sidebar w-full md:w-64 flex-shrink-0 text-white flex flex-col leaf-pattern">
        <!-- Logo -->
        <div class="p-4 md:p-6 flex items-center justify-center border-b border-green-800">
            <div class="bg-white p-2 rounded-lg mr-3">
                <i class="fas fa-leaf text-2xl text-primary"></i>
            </div>
            <h1 class="text-xl font-bold">Krida Tani</h1>
        </div>
        <!-- Menu Navigasi -->
        <div class="flex-1 py-4 overflow-y-auto">
            <ul class="space-y-1 px-3">
                <li>
                    <a href="/admin/dashboard" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-tachometer-alt w-6 mr-3 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/about" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-building w-6 mr-3 text-center"></i>
                        <span>Profil Perusahaan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/produk" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-seedling w-6 mr-3 text-center"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/blog" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-newspaper w-6 mr-3 text-center"></i>
                        <span>Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/galeri" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-images w-6 mr-3 text-center"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/banner" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-image w-6 mr-3 text-center"></i>
                        <span>Banner</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/testimoni" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-comment-alt w-6 mr-3 text-center"></i>
                        <span>Testimoni</span>
                    </a>
                </li>
                @php
                    $pesanCount = \App\Models\Pesan::count();
                @endphp
                <li>
                    <a href="{{ route('pesan.index') }}" class="relative flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-700 transition">
                        <i class="fas fa-envelope text-white"></i>
                        <span class="text-white font-medium">Pesan Masuk</span>
                        @if($pesanCount > 0)
                            <span class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">{{ $pesanCount }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="/admin/user" class="sidebar-item flex items-center p-3 rounded-lg relative">
                        <i class="fas fa-users-cog w-6 mr-3 text-center"></i>
                        <span>User Management</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar Footer (branding removed as requested) -->
        <div class="p-4 border-t border-green-800 text-center text-sm text-green-200">
            <!-- Footer text removed -->
        </div>
    </div>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 px-4 md:px-6 py-4 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800" id="page-title">Dashboard</h2>
                <p class="text-sm text-gray-600">Selamat datang kembali, Admin Krida Tani</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative group">
                    <div class="flex items-center cursor-pointer" onclick="document.getElementById('profileDropdown').classList.toggle('hidden')">
                        <span class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold text-lg">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</span>
                        <div class="ml-3 hidden md:block">
                            <p class="text-sm font-medium text-gray-800 group-hover:underline">{{ auth()->user()->name }}</p>

                        </div>
                        <svg class="w-4 h-4 ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                    <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 border border-gray-100">
                        <a href="{{ route('user.edit', auth()->id()) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profil</a>
                        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- Content Area -->
        <main class="flex-1 p-4 md:p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</div>
<script>
    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('profileDropdown');
        if (!dropdown) return;
        if (!e.target.closest('.group')) {
            dropdown.classList.add('hidden');
        }
    });
</script>
</body>
</html>

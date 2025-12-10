<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Krida Tani</title>
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
                @apply bg-gradient-to-br from-primary/10 to-accent/5 font-poppins;
            }
            .login-container {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }
            .input-field:focus {
                box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3);
            }
            .leaf-pattern {
                background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%232e7d32' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="login-container w-full max-w-md bg-white rounded-xl overflow-hidden leaf-pattern">
        <!-- Header dengan gradient hijau -->
        <div class="bg-gradient-to-r from-primary to-secondary p-6 text-center">
            <div class="flex justify-center mb-4">
                <div class="bg-white p-3 rounded-full">
                    <i class="fas fa-leaf text-4xl text-primary"></i>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-white">KRIDA TANI</h1>
            <p class="text-lightgreen mt-1">Solusi Pupuk Berkualitas untuk Pertanian Indonesia</p>
        </div>
        <!-- Form Login -->
        <div class="px-8 py-8">
            <h2 class="text-2xl font-bold text-center text-darkgreen mb-8">Masuk ke Akun Anda</h2>
            @if (session('status'))
                <div class="mb-4 text-green-700 bg-green-100 rounded px-4 py-2 text-center text-sm">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 text-red-700 bg-red-100 rounded px-4 py-2 text-center text-sm">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Input -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="input-field pl-10 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                            placeholder="email@contoh.com"
                            value="{{ old('email') }}"
                            required autofocus>
                    </div>
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="input-field pl-10 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent"
                            placeholder="••••••••"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye-slash text-gray-400 cursor-pointer hover:text-gray-600" id="togglePassword"></i>
                        </div>
                    </div>
                </div>
                <!-- Remember & Forgot -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                    </div>
                </div>
                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-primary to-secondary hover:from-darkgreen hover:to-primary text-white py-3 px-4 rounded-lg font-semibold transition duration-300 transform hover:scale-[1.02] shadow-md">
                    Masuk
                </button>
            </form>
        </div>
        <!-- Footer -->
        <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-200">
            <p class="text-xs text-gray-500">
                &copy; 2023 Krida Tani. Hak Cipta Dilindungi. Pupuk Berkualitas, Hasil Melimpah.
            </p>
        </div>
    </div>
    <script>
        // Toggle password visibility
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('togglePassword');
            if (toggle) {
                toggle.addEventListener('click', function() {
                    const passwordInput = document.getElementById('password');
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>
</body>
</html>

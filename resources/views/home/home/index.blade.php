@extends('home.layouts.wrapper')
@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary to-accent py-16">
    @php $hasBanners = isset($banners) && $banners->count(); @endphp
    <div class="max-w-6xl mx-auto px-4">
        @if($hasBanners)
        <div class="relative" id="hero-carousel">
            <div class="relative overflow-hidden rounded-2xl shadow-lg" data-role="slides">
                @foreach($banners as $idx => $bn)
                <div class="flex flex-col md:flex-row items-center gap-10 transition-opacity duration-500 {{ $idx === 0 ? '' : 'hidden' }}" data-index="{{ $idx }}">
                    <div class="flex-1 text-center md:text-left py-8 pl-8 md:pl-16">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $bn->judul }}</h1>
                        <p class="text-lg text-green-100 mb-6">{{ $bn->deskripsi }}</p>
                        @if($bn->link)
                        <a href="{{ $bn->link }}" class="inline-block bg-wheat text-primary font-semibold px-8 py-3 rounded-full shadow hover:bg-white transition">Pelajari</a>
                        @endif
                    </div>
                    <div class="flex-1 flex justify-center">
                        <img src="{{ asset('storage/'.$bn->gambar) }}" alt="Gambar Banner" class="rounded-2xl w-full max-w-md object-cover">
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" aria-label="Sebelumnya" class="absolute -left-6 top-1/2 -translate-y-1/2 text-white hover:text-wheat w-12 h-12 flex items-center justify-center z-10" data-action="prev">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            <button type="button" aria-label="Berikutnya" class="absolute -right-6 top-1/2 -translate-y-1/2 text-white hover:text-wheat w-12 h-12 flex items-center justify-center z-10" data-action="next">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M9 6l6 6-6 6"/>
                </svg>
            </button>
            <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2" data-role="dots">
                @foreach($banners as $idx => $bn)
                <button type="button" class="w-2.5 h-2.5 rounded-full {{ $idx === 0 ? 'bg-white' : 'bg-white/50' }}" data-go="{{ $idx }}"></button>
                @endforeach
            </div>
        </div>
        @else
        <div class="flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Selamat Datang di <span class="text-wheat">Krida Tani</span></h1>
                <p class="text-lg text-green-100 mb-6">{{ $about->deskripsi ?? 'Solusi pertanian organik, sehat, dan ramah lingkungan untuk masa depan Indonesia.' }}</p>
                <a href="#produk" class="inline-block bg-wheat text-primary font-semibold px-8 py-3 rounded-full shadow hover:bg-white transition">Lihat Produk</a>
            </div>
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('img/banner.jpg') }}" alt="Banner" class="rounded-2xl shadow-lg w-full max-w-md object-cover">
            </div>
        </div>
        @endif
    </div>
    @if($hasBanners)
    <script>
    (() => {
        const root = document.getElementById('hero-carousel');
        if (!root) return;
        const slides = Array.from(root.querySelectorAll('[data-index]'));
        const dots = Array.from(root.querySelectorAll('[data-go]'));
        let i = 0;
        const show = (n) => {
            i = (n + slides.length) % slides.length;
            slides.forEach((el, idx) => {
                if (idx === i) { el.classList.remove('hidden'); }
                else { el.classList.add('hidden'); }
            });
            dots.forEach((d, idx) => {
                d.classList.toggle('bg-white', idx === i);
                d.classList.toggle('bg-white/50', idx !== i);
            });
        };
        root.querySelector('[data-action="prev"]').addEventListener('click', () => show(i - 1));
        root.querySelector('[data-action="next"]').addEventListener('click', () => show(i + 1));
        dots.forEach(d => d.addEventListener('click', () => show(parseInt(d.getAttribute('data-go')))));
        let t = setInterval(() => show(i + 1), 5000);
        root.addEventListener('mouseenter', () => clearInterval(t));
        root.addEventListener('mouseleave', () => { t = setInterval(() => show(i + 1), 5000); });
    })();
    </script>
    @endif
</section>

<!-- About Section -->
<section class="py-16 bg-white" id="about">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary mb-2">Profil Perusahaan</h2>
            <p class="text-gray-600">{{ $about->tentang ?? 'Profil perusahaan belum diisi.' }}</p>
        </div>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="flex-1">
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-xl font-bold text-primary mb-2">{{ $about->nama ?? '-' }}</h3>
                    <p class="text-gray-700 mb-2"><b>Tahun Berdiri:</b> {{ $about->tahun_berdiri ?? '-' }}</p>
                    <p class="text-gray-700 mb-2"><b>Alamat:</b> {{ $about->alamat ?? '-' }}</p>
                    <p class="text-gray-700 mb-2"><b>Email:</b> {{ $about->email ?? '-' }}</p>
                    <p class="text-gray-700 mb-2"><b>Telepon:</b> {{ $about->telepon ?? '-' }}</p>
                </div>
            </div>
            <div class="flex-1">
                <img src="{{ asset('img/tentang.jpg') }}" alt="Profil Perusahaan" class="rounded-xl shadow-md w-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Produk Section -->
<section class="py-16 bg-gray-50" id="produk">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary mb-2">Produk Unggulan</h2>
            <p class="text-gray-600">Kami menyediakan berbagai macam pupuk dan produk pertanian organik terbaik.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($produks as $produk)
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center hover:scale-105 transition">
                <img src="{{ $produk->gambar ? asset('storage/'.$produk->gambar) : asset('img/produk1.jpg') }}" alt="{{ $produk->nama }}" class="w-40 h-40 object-cover rounded mb-4 shadow">
                <h3 class="text-lg font-bold text-primary mb-2">{{ $produk->nama }}</h3>
                <p class="text-gray-600 text-center">{{ $produk->deskripsi }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/produk" class="inline-block bg-primary text-white font-semibold px-8 py-3 rounded-full shadow hover:bg-secondary transition">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-16 bg-white" id="blog">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary mb-2">Blog & Artikel</h2>
            <p class="text-gray-600">Dapatkan informasi, tips, dan berita terbaru seputar pertanian organik.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($blogs as $blog)
            <div class="bg-gray-50 rounded-xl shadow p-4 flex flex-col hover:scale-105 transition">
                <img src="{{ $blog->gambar ? asset('storage/'.$blog->gambar) : asset('img/thumb.jpg') }}" alt="{{ $blog->judul }}" class="w-full h-32 object-cover rounded-lg mb-3">
                <a href="/blog/{{ $blog->id }}" class="text-lg font-bold text-primary hover:underline mb-1">{{ $blog->judul }}</a>
                <p class="text-gray-600 text-sm">{{ Str::limit($blog->isi, 80) }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/blog" class="inline-block bg-primary text-white font-semibold px-8 py-3 rounded-full shadow hover:bg-secondary transition">Lihat Semua Artikel</a>
        </div>
    </div>
</section>

<!-- Galeri Section -->
<section class="py-16 bg-white" id="galeri">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary mb-2">Galeri</h2>
            <p class="text-gray-600">Dokumentasi kegiatan dan hasil pertanian terbaik kami.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($galeris as $galeri)
            <div>
                <img src="{{ $galeri->gambar ? asset('storage/'.$galeri->gambar) : asset('img/thumb.jpg') }}" alt="Galeri" class="rounded-xl shadow w-full h-40 object-cover">
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimoni Section -->
<section class="py-16 bg-gray-50" id="testimoni">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary mb-2">Testimoni</h2>
            <p class="text-gray-600">Apa kata pelanggan tentang produk dan layanan kami.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonis as $testi)
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <div class="flex items-center mb-4">
                    <img src="{{ $testi->foto ? asset('storage/'.$testi->foto) : asset('img/thumb.jpg') }}" alt="{{ $testi->nama }}" class="w-14 h-14 object-cover rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-primary">{{ $testi->nama }}</h4>
                        <p class="text-xs text-gray-500">{{ $testi->jabatan }}</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">"{{ $testi->isi }}"</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section class="py-16 bg-white" id="kontak">
    <div class="max-w-3xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary mb-2">Hubungi Kami</h2>
            <p class="text-gray-600">Ada pertanyaan? Silakan hubungi kami melalui form di bawah ini.</p>
        </div>
        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-center">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="bg-white rounded-xl shadow p-8 flex flex-col gap-4" action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <input name="nama" value="{{ old('nama') }}" type="text" placeholder="Nama" class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
            <input name="email" value="{{ old('email') }}" type="email" placeholder="Email" class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
            <input name="subjek" value="{{ old('subjek') }}" type="text" placeholder="Subjek" class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">
            <textarea name="isi" placeholder="Pesan" rows="4" class="border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary">{{ old('isi') }}</textarea>
            <button type="submit" class="bg-primary text-white font-semibold px-8 py-3 rounded-full shadow hover:bg-secondary transition">Kirim Pesan</button>
        </form>
        <div class="text-center mt-6">
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline"><i class="fab fa-whatsapp"></i> WhatsApp Kami</a>
        </div>
    </div>
</section>
@endsection

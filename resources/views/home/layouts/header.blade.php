<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <div class="bg-primary p-2 rounded-lg mr-3">
                <i class="fas fa-leaf text-white text-2xl"></i>
            </div>
            <h1 class="text-xl font-bold text-darkgreen">Krida Tani</h1>
        </div>
        <nav class="hidden md:block">
            <ul class="flex space-x-8 items-center">
                <li>
                    <a href="/" class="transition-all duration-200 {{ Request::is('/') ? 'text-primary font-semibold bg-primary/10 px-4 py-2 rounded-full' : 'text-gray-600 hover:text-primary hover:bg-gray-100 px-4 py-2 rounded-full' }}">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>
                </li>
                <li>
                    <a href="/about" class="transition-all duration-200 {{ Request::is('about') ? 'text-primary font-semibold bg-primary/10 px-4 py-2 rounded-full' : 'text-gray-600 hover:text-primary hover:bg-gray-100 px-4 py-2 rounded-full' }}">
                        <i class="fas fa-info-circle mr-2"></i>Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="/produk" class="transition-all duration-200 {{ Request::is('produk') ? 'text-primary font-semibold bg-primary/10 px-4 py-2 rounded-full' : 'text-gray-600 hover:text-primary hover:bg-gray-100 px-4 py-2 rounded-full' }}">
                        <i class="fas fa-seedling mr-2"></i>Produk
                    </a>
                </li>
                <li>
                    <a href="/blog" class="transition-all duration-200 {{ Request::is('blog') ? 'text-primary font-semibold bg-primary/10 px-4 py-2 rounded-full' : 'text-gray-600 hover:text-primary hover:bg-gray-100 px-4 py-2 rounded-full' }}">
                        <i class="fas fa-newspaper mr-2"></i>Artikel
                    </a>
                </li>
                <li>
                    <a href="/galeri" class="transition-all duration-200 {{ Request::is('galeri') ? 'text-primary font-semibold bg-primary/10 px-4 py-2 rounded-full' : 'text-gray-600 hover:text-primary hover:bg-gray-100 px-4 py-2 rounded-full' }}">
                        <i class="fas fa-images mr-2"></i>Galeri
                    </a>
                </li>
                <li>
                    <a href="/contact" class="transition-all duration-200 {{ Request::is('contact') ? 'text-primary font-semibold bg-primary/10 px-4 py-2 rounded-full' : 'text-gray-600 hover:text-primary hover:bg-gray-100 px-4 py-2 rounded-full' }}">
                        <i class="fas fa-envelope mr-2"></i>Kontak
                    </a>
                </li>
            </ul>
        </nav>
        <button class="md:hidden text-gray-600" id="mobile-menu-button">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>
    
    <!-- Mobile Menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-4 py-2 bg-gray-50 border-t">
            <ul class="space-y-2">
                <li>
                    <a href="/" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ Request::is('/') ? 'text-primary font-semibold bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-100' }}">
                        <i class="fas fa-home mr-3"></i>Beranda
                    </a>
                </li>
                <li>
                    <a href="/about" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ Request::is('about') ? 'text-primary font-semibold bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-100' }}">
                        <i class="fas fa-info-circle mr-3"></i>Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="/produk" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ Request::is('produk') ? 'text-primary font-semibold bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-100' }}">
                        <i class="fas fa-seedling mr-3"></i>Produk
                    </a>
                </li>
                <li>
                    <a href="/blog" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ Request::is('blog') ? 'text-primary font-semibold bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-100' }}">
                        <i class="fas fa-newspaper mr-3"></i>Artikel
                    </a>
                </li>
                <li>
                    <a href="/galeri" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ Request::is('galeri') ? 'text-primary font-semibold bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-100' }}">
                        <i class="fas fa-images mr-3"></i>Galeri
                    </a>
                </li>
                <li>
                    <a href="/contact" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ Request::is('contact') ? 'text-primary font-semibold bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-100' }}">
                        <i class="fas fa-envelope mr-3"></i>Kontak
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            const icon = mobileMenuButton.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars text-2xl';
            } else {
                icon.className = 'fas fa-times text-2xl';
            }
        });
    }
});
</script>

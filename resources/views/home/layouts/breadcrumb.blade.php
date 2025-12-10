@if(isset($breadcrumbs) && count($breadcrumbs) > 1)
<nav class="bg-gray-50 py-4">
    <div class="max-w-7xl mx-auto px-4">
        <ol class="flex items-center space-x-2 text-sm">
            <li>
                <a href="/" class="text-gray-500 hover:text-primary transition">
                    <i class="fas fa-home mr-1"></i>Beranda
                </a>
            </li>
            @foreach($breadcrumbs as $breadcrumb)
                <li class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                    @if($loop->last)
                        <span class="text-primary font-semibold">{{ $breadcrumb['title'] }}</span>
                    @else
                        <a href="{{ $breadcrumb['url'] }}" class="text-gray-500 hover:text-primary transition">
                            {{ $breadcrumb['title'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
@endif

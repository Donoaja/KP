<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Blog;
use App\Models\Galeri;
use App\Models\Testimoni;
use App\Models\About;
use App\Models\Banner;
use App\Models\Pesan;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->take(4)->get();
        $blogs = Blog::latest()->take(4)->get();
        $galeris = Galeri::latest()->take(4)->get();
        $testimonis = Testimoni::latest()->take(3)->get();
        $about = About::first();
        $banners = Banner::orderBy('urutan')->get();
        return view('home.home.index', compact('produks', 'blogs', 'galeris', 'testimonis', 'about', 'banners'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'isi' => 'required|string|min:5',
        ]);

        try {
            Pesan::create($validated);
            return back()->with('success', 'Pesan berhasil dikirim. Terima kasih!');
        } catch (\Exception $e) {
            Log::error('Contact submit error: ' . $e->getMessage(), [
                'exception' => $e,
                'input' => $request->all(),
            ]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi atau hubungi admin.']);
        }
    }
}

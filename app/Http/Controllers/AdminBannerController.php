<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBannerController extends Controller
{
    public function index() {
        $banners = Banner::orderBy('urutan')->get();
        return view('admin.banner.index', compact('banners'));
    }
    public function create() {
        return view('admin.banner.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'link' => 'nullable|url',
            'urutan' => 'nullable|integer|min:0',
        ], [
            'gambar.required' => 'Gambar wajib diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar tidak didukung. Gunakan jpg, jpeg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 4MB.',
        ]);
        if (!isset($data['urutan']) || $data['urutan'] === null) {
            $data['urutan'] = (int) (Banner::max('urutan') ?? 0) + 1;
        }
        $uploadedFile = $request->file('gambar');
        $originalName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $uploadedFile->getClientOriginalExtension();
        $slugBase = Str::slug(Str::limit($originalName, 50, ''));
        $uniqueName = $slugBase . '-' . uniqid() . '.' . $extension;
        $data['gambar'] = $uploadedFile->storeAs('banner', $uniqueName, 'public');
        Banner::create($data);
        return redirect()->route('banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }
    public function edit($id) {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }
    public function update(Request $request, $id) {
        $banner = Banner::findOrFail($id);
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'link' => 'nullable|url',
            'urutan' => 'nullable|integer|min:0',
        ], [
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar tidak didukung. Gunakan jpg, jpeg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 4MB.',
        ]);
        if ($request->hasFile('gambar')) {
            if ($banner->gambar) {
                Storage::disk('public')->delete($banner->gambar);
            }
            $uploadedFile = $request->file('gambar');
            $originalName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $uploadedFile->getClientOriginalExtension();
            $slugBase = Str::slug(Str::limit($originalName, 50, ''));
            $uniqueName = $slugBase . '-' . uniqid() . '.' . $extension;
            $data['gambar'] = $uploadedFile->storeAs('banner', $uniqueName, 'public');
        }
        $banner->update($data);
        return redirect()->route('banner.index')->with('success', 'Banner berhasil diupdate.');
    }
    public function destroy($id) {
        $banner = Banner::findOrFail($id);
        if ($banner->gambar) Storage::disk('public')->delete($banner->gambar);
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}

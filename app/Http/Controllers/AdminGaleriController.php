<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }
    public function create() {
        return view('admin.galeri.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        Galeri::create($data);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }
    public function edit($id) {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }
    public function update(Request $request, $id) {
        $galeri = Galeri::findOrFail($id);
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            if ($galeri->gambar) Storage::disk('public')->delete($galeri->gambar);
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }
        $galeri->update($data);
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diupdate.');
    }
    public function destroy($id) {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar) Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}

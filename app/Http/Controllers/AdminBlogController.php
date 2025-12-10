<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function index() {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }
    public function create() {
        return view('admin.blog.add');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('blog', 'public');
        }
        Blog::create($data);
        return redirect()->route('blog.index')->with('success', 'Artikel berhasil ditambahkan.');
    }
    public function show($id) { /* Detail blog */ }
    public function edit($id) {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.add', compact('blog'));
    }
    public function update(Request $request, $id) {
        $blog = Blog::findOrFail($id);
        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            if ($blog->gambar) Storage::disk('public')->delete($blog->gambar);
            $data['gambar'] = $request->file('gambar')->store('blog', 'public');
        }
        $blog->update($data);
        return redirect()->route('blog.index')->with('success', 'Artikel berhasil diupdate.');
    }
    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        if ($blog->gambar) Storage::disk('public')->delete($blog->gambar);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Artikel berhasil dihapus.');
    }
}

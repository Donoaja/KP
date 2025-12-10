<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AdminAboutController extends Controller
{
    public function index() {
        $profil = About::first();
        return view('admin.about.index', compact('profil'));
    }
    public function create() {
        return view('admin.about.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'tahun_berdiri' => 'required|integer|min:1900|max:' . date('Y'),
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'tentang' => 'required',
        ]);
        if (About::count() > 0) {
            $about = About::first();
            $about->update($data);
        } else {
            About::create($data);
        }
        return redirect()->route('about.index')->with('success', 'Profil perusahaan berhasil disimpan.');
    }
    public function show($id) {
        $profil = About::findOrFail($id);
        return view('admin.about.show', compact('profil'));
    }
    public function edit($id) {
        $profil = About::findOrFail($id);
        return view('admin.about.create', compact('profil'));
    }
    public function update(Request $request, $id) {
        $data = $request->validate([
            'nama' => 'required',
            'tahun_berdiri' => 'required|integer|min:1900|max:' . date('Y'),
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'tentang' => 'required',
        ]);
        $profil = About::findOrFail($id);
        $profil->update($data);
        return redirect()->route('about.index')->with('success', 'Profil perusahaan berhasil diupdate.');
    }
    public function destroy($id) {
        $profil = About::findOrFail($id);
        $profil->delete();
        return redirect()->route('about.index')->with('success', 'Profil perusahaan berhasil dihapus.');
    }
}

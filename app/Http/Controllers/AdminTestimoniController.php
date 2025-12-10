<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;

class AdminTestimoniController extends Controller
{
    public function index() {
        $testimonis = Testimoni::orderBy('urutan')->get();
        return view('admin.testimoni.index', compact('testimonis'));
    }
    public function create() {
        return view('admin.testimoni.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jabatan' => 'nullable',
            'urutan' => 'nullable|integer',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('testimoni', 'public');
        }
        Testimoni::create($data);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }
    public function edit($id) {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }
    public function update(Request $request, $id) {
        $testimoni = Testimoni::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jabatan' => 'nullable',
            'urutan' => 'nullable|integer',
        ]);
        if ($request->hasFile('foto')) {
            if ($testimoni->foto) Storage::disk('public')->delete($testimoni->foto);
            $data['foto'] = $request->file('foto')->store('testimoni', 'public');
        }
        $testimoni->update($data);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diupdate.');
    }
    public function destroy($id) {
        $testimoni = Testimoni::findOrFail($id);
        if ($testimoni->foto) Storage::disk('public')->delete($testimoni->foto);
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class AdminPesanController extends Controller
{
    public function index() {
        $pesans = Pesan::latest()->get();
        return view('admin.pesan.index', compact('pesans'));
    }
    public function create() { return view('admin.pesan.add'); }
    public function store(Request $request) { /* Simpan data pesan */ }
    public function show($id) { /* Detail pesan */ }
    public function edit($id) { return view('admin.pesan.add'); }
    public function update(Request $request, $id) { /* Update pesan */ }
    public function destroy($id) {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();
        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}

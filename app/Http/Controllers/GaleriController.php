<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        return view('admin.galeri', [
            'title'       => 'Daftar Galeri',
            'galeri'      => Galeri::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'keterangan'        => 'required|max:255',
            'input_by'          => 'required',
            'foto'              => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        $attr['foto'] = $request->file('foto')->store('img');
        Galeri::create($attr);

        return redirect()->back()->with('message', 'Galeri berhasil ditambah');
    }

    public function destroy($id)
    {
        $galeri = Galeri::where('id', $id)->firstOrFail();
        Storage::delete($galeri->foto);

        $galeri->delete();

        return redirect()->back()->with('message', 'Galeri berhasil dihapus');
    }
}

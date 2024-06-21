<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SambutanKepalaSekolah;
use Illuminate\Support\Facades\Storage;

class SambutanKepalaSekolahController extends Controller
{
    public function index()
    {
        return view('admin.sambutan', [
            'title'       => 'Sambutan Kepala Sekolah',
            'sambutan'    => SambutanKepalaSekolah::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $sambutan = SambutanKepalaSekolah::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'kepala_sekolah'    => 'required|max:255',
            'desc'              => 'required',
            'foto'              => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        if ($request->file('foto')) {
            Storage::delete($sambutan->foto);
            $attr['foto'] = $request->file('foto')->store('img');
        } else {
            $attr['foto'] = $sambutan->foto;
        }

        $sambutan->update($attr);

        return redirect()->back()->with('message', 'Sambutan berhasil diubah');
    }
}

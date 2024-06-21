<?php

namespace App\Http\Controllers;

use App\Models\FasilitasSingkat;
use Illuminate\Http\Request;

class FasilitasSingkatController extends Controller
{
    public function index()
    {
        return view('admin.fasilitas', [
            'title'       => 'Fasilitas Singkat',
            'fasilitas'   => FasilitasSingkat::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $fasilitas = FasilitasSingkat::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'keterangan'        => 'required|max:255',
            'total'             => 'required|numeric',
        ]);

        $fasilitas->update($attr);

        return redirect()->back()->with('message', 'Fasilitas berhasil diubah');
    }
}

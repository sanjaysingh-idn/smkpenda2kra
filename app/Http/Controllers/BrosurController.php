<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrosurController extends Controller
{
    public function index()
    {
        return view('admin.brosur', [
            'title'       => 'Daftar Brosur',
            'brosur'      => Brosur::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_brosur'       => 'required|max:255',
            'input_by'          => 'required',
            'foto'              => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf|max:2048',
        ]);

        $attr['foto'] = $request->file('foto')->store('brosur');

        Brosur::create($attr);

        return redirect()->back()->with('message', 'Brosur berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $brosur = Brosur::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'nama_brosur'       => 'required|max:255',
            'input_by'          => 'required',
            'foto'              => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf|max:2048',
        ]);

        if ($request->file('foto')) {
            Storage::delete($brosur->foto);
            $attr['foto'] = $request->file('foto')->store('brosur');
        } else {
            $attr['foto'] = $brosur->foto;
        }

        $brosur->update($attr);

        return redirect()->back()->with('message', 'Brosur berhasil diubah');
    }

    public function destroy($id)
    {
        $brosur = Brosur::where('id', $id)->firstOrFail();
        Storage::delete($brosur->foto);

        $brosur->delete();

        return redirect()->back()->with('message', 'Brosur berhasil dihapus');
    }
}

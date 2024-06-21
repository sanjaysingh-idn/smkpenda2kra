<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataGuruController extends Controller
{
    public function index()
    {
        return view('admin.guru.index', [
            'title'       => 'Daftar Guru',
            'guru'        => DataGuru::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_guru'      => 'required|max:255',
            'tempat_lahir'   => 'required|max:255',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required|max:255',
            'jabatan'        => 'required|max:255',
            'mata_pelajaran' => 'required|max:255',
            'status'         => 'required|max:255',
            'foto'           => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf|max:2048',
        ]);

        $attr['foto'] = $request->file('foto')->store('guru');

        DataGuru::create($attr);

        return redirect()->back()->with('message', 'Data Guru berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $dataGuru = DataGuru::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'nama_guru'      => 'required|max:255',
            'tempat_lahir'   => 'required|max:255',
            'tanggal_lahir'  => 'required',
            'alamat'         => 'required|max:255',
            'jabatan'        => 'required|max:255',
            'mata_pelajaran' => 'required|max:255',
            'status'         => 'required|max:255',
            'foto'           => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf|max:2048',
        ]);

        if ($request->file('foto')) {
            Storage::delete($dataGuru->foto);
            $attr['foto'] = $request->file('foto')->store('guru');
        } else {
            $attr['foto'] = $dataGuru->foto;
        }

        $dataGuru->update($attr);

        return redirect()->back()->with('message', 'Data Guru berhasil diubah');
    }

    public function destroy($id)
    {
        $dataGuru = DataGuru::where('id', $id)->firstOrFail();
        Storage::delete($dataGuru->foto);

        $dataGuru->delete();

        return redirect()->back()->with('message', 'Data Guru berhasil dihapus');
    }
}

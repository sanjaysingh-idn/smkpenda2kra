<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataSiswaController extends Controller
{
    public function index()
    {
        return view('admin.siswa', [
            'title'    => 'Data Siswa',
            'siswa'    => DataSiswa::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $dataSiswa = DataSiswa::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'content'       => 'required',
        ]);

        $attr['author'] = Auth::user()->name;

        $dataSiswa->update($attr);

        return redirect()->back()->with('message', 'Data Siswa berhasil diubah');
    }

    public function addGrafik(Request $request)
    {
        $dataSiswa = DataSiswa::where('id', 1)->firstOrFail();
        $attr = $request->validate([
            'grafik' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf|max:2048',
        ]);

        $attr['grafik'] = $request->file('grafik')->store('grafik');

        $dataSiswa->update($attr);

        return redirect()->back()->with('message', 'Grafik Siswa berhasil ditambah');
    }

    public function deleteGrafik($id)
    {
        $dataSiswa = DataSiswa::where('id', $id)->firstOrFail();

        // Delete the grafik file from storage
        Storage::delete($dataSiswa->grafik);

        // Set the grafik field to null
        $dataSiswa->grafik = null;
        $dataSiswa->save();

        return redirect()->back()->with('message', 'Grafik berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $status = ['menunggu', 'diterima', 'ditolak'];
        return view('admin.ppdb.index', [
            'title'     => 'Daftar PPDB',
            'ppdb'      => Pendaftaran::all(),
            'status'    => $status,
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama'          => 'required|max:255',
            'nisn'          => 'required|max:15|unique:pendaftarans,nisn,',
            'email'         => 'required|max:255|email',
            'jurusan'       => 'required',
            'asal_sekolah'  => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'penghasilan_ortu' => 'required',
            'nama_ayah'     => 'required',
            'nama_ibu'      => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat'        => 'required|max:255',
            'no_telp'       => 'required|numeric',
            'no_telp_ortu'  => 'required|numeric',
            'nisn'          => 'required|numeric',
            'nik'           => 'required|numeric',
            'pas_foto'      => 'required|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        $attr['pas_foto']   = $request->file('pas_foto')->store('pendaftar');

        $pendaftaran = Pendaftaran::create($attr);

        $user = Auth::user();
        $user->id_ppdb = $pendaftaran->id;
        $user->save();

        return redirect()->back()->with('message', 'Pendaftaran Siswa berhasil');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::where('id', $id)->firstOrFail();
        Storage::delete($pendaftaran->pas_foto);

        $pendaftaran->delete();

        return redirect()->back()->with('message', 'Pendaftaran berhasil dihapus');
    }

    // public function show($id)
    // {
    //     $pendaftaran = Pendaftaran::findOrFail($id);

    //     return view('admin.ppdb.show', [
    //         'title'       => 'Detail Pendaftaran',
    //         'pendaftaran' => $pendaftaran,
    //     ]);
    // }


    public function status(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $status = $request->status;

        $pendaftaran->status  = $status;

        $pendaftaran->save();
        return redirect()->back()->with('message', 'Status Pendaftaran berhasil diubah');
    }
}

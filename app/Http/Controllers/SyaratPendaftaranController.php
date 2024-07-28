<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyaratPendaftaran;
use Illuminate\Support\Facades\Auth;

class SyaratPendaftaranController extends Controller
{
    public function index()
    {
        $status = ['dibuka', 'ditutup'];

        return view('admin.syarat', [
            'title'     => 'Syarat Pendaftaran Calon (PPDB)',
            'syarat'    => SyaratPendaftaran::firstOrFail(),
            'status'    => $status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $syarat = SyaratPendaftaran::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'content'      => 'required',
        ]);

        $attr['author'] = Auth::user()->name;
        $attr['status'] = $request->status;

        $syarat->update($attr);

        return redirect()->back()->with('message', 'Syarat Pendaftaran berhasil diubah');
    }
}

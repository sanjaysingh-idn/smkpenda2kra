<?php

namespace App\Http\Controllers;

use App\Models\ProgramImages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use Illuminate\Support\Facades\Storage;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        return view('admin.programKeahlian.index', [
            'title'     => 'Program Keahlian',
            'proke'     => ProgramKeahlian::all(),
        ]);
    }

    public function create()
    {
        return view('admin.programKeahlian.create', [
            'title'     => 'Program Keahlian',
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_program'      => 'required|max:255|unique:program_keahlians,nama_program,',
            'desc'              => 'required',
            'singkatan'         => 'required|max:6',
            'foto_utama'        => 'required|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        $attr['foto_utama'] = $request->file('foto_utama')->store('program_keahlian');
        $attr['slug']       = Str::slug($request->nama_program);

        ProgramKeahlian::create($attr);

        return redirect()->route('admin.program-keahlian.index')->with('message', 'Program Keahlian berhasil ditambah');
    }

    public function show(ProgramKeahlian $programKeahlian)
    {
        return view('admin.programKeahlian.show', compact('programKeahlian'));
    }

    public function edit($id)
    {
        $programKeahlian = ProgramKeahlian::findOrFail($id);
        return view('admin.programKeahlian.edit', [
            'title'     => 'Program Keahlian',
            'program'   => $programKeahlian,
        ]);
    }

    public function update(Request $request, $id)
    {
        $programKeahlian = ProgramKeahlian::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'nama_program'      => 'required|max:255|unique:program_keahlians,nama_program,' . $programKeahlian->id,
            'desc'              => 'required',
            'singkatan'         => 'required|max:6',
            'foto_utama'        => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        $attr['slug'] = Str::slug($request->nama_program);

        if ($request->file('foto_utama')) {
            Storage::delete($programKeahlian->foto_utama);
            $attr['foto_utama'] = $request->file('foto_utama')->store('program-keahlian');
        } else {
            $attr['foto_utama'] = $programKeahlian->foto_utama;
        }

        $programKeahlian->update($attr);

        return redirect()->back()->with('message', 'Program Keahlian berhasil diubah');
    }

    public function destroy(ProgramKeahlian $programKeahlian)
    {
        Storage::delete($programKeahlian->foto_utama);

        $programKeahlian->delete();

        return redirect()->back()->with('message', 'Program Keahlian berhasil dihapus');
    }
}

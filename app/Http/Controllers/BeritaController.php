<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

setlocale(LC_TIME, 'id_ID');

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita.index', [
            'title'     => 'Berita',
            'berita'    => Berita::all(),
        ]);
    }

    public function create()
    {
        return view('admin.berita.create', [
            'title'     => 'Tambah Berita',
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'judul'       => 'required|max:255|unique:beritas,judul,',
            'content'     => 'required',
            'foto'        => 'required|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        $attr['foto']       = $request->file('foto')->store('berita');
        $attr['slug']       = Str::slug($request->judul);
        $attr['author']     = Auth::user()->name;

        Berita::create($attr);

        return redirect()->route('admin.berita.index')->with('message', 'Berita berhasil ditambah');
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function publish($id)
    {
        $berita = Berita::findOrFail($id);
        $status = 'publish';
        $published_at = Carbon::now();

        $berita->status         = $status;
        $berita->published_at   = $published_at;

        $berita->save();
        return redirect()->back()->with('message', 'Berita berhasil diubah');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', [
            'title'    => $berita->judul,
            'berita'   => $berita,
        ]);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::where('id', $id)->firstOrFail();
        $attr = $request->validate([
            'judul'       => 'required|max:255|unique:beritas,judul,' . $berita->id,
            'content'     => 'required',
            'foto'        => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        $attr['slug']       = Str::slug($request->judul);
        $attr['author']     = Auth::user()->name;

        if ($request->file('foto')) {
            Storage::delete($berita->foto);
            $attr['foto'] = $request->file('foto')->store('berita');
        } else {
            $attr['foto'] = $berita->foto;
        }

        $berita->update($attr);

        return redirect()->back()->with('message', 'Berita berhasil diubah');
    }

    public function destroy($id)
    {
        $berita = Berita::where('id', $id)->firstOrFail();
        Storage::delete($berita->foto);

        $berita->delete();

        return redirect()->back()->with('message', 'Berita berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil', [
            'title'     => 'Profil',
            'profil'    => Profil::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'title'          => 'required|max:255|unique:profils,title',
            'desc'           => 'required',
        ]);

        $attr['input_by']   = Auth::user()->name;
        $attr['slug']       = Str::slug($attr['title']);

        Profil::create($attr);

        return back()->with('message', 'Data berhasil ditambah');
    }

    public function show($slug)
    {
        $profil = Profil::where('slug', $slug)->firstOrFail();

        return view('home.profil', [
            'title'     => 'Profil | ' . $profil->title,
            'profil'    =>  $profil,
        ]);
    }

    public function edit(Profil $profil)
    {
        //
    }

    public function update(Request $request, Profil $profil)
    {
        $attr = $request->validate([
            'title'          => 'required|max:255|unique:profils,title,' . $profil->id,
            'desc'           => 'required',
        ]);

        $attr['input_by']   = Auth::user()->name;
        $attr['slug']       = Str::slug($attr['title']);

        $profil->update($attr);

        return back()->with('message', 'Data berhasil diubah');
    }

    public function destroy(Profil $profil)
    {
        Profil::destroy($profil->id);
        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}

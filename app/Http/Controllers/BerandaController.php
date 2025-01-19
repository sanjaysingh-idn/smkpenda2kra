<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Brosur;
use App\Models\Galeri;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\DataGuru;
use App\Models\DataSiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\FasilitasSingkat;
use App\Models\SyaratPendaftaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SambutanKepalaSekolah;

class BerandaController extends Controller
{
    public function index()
    {
        return view('home.beranda', [
            'title'     => 'SMK Penda 2 Karanganyar',
            'profils'   =>  Profil::all(),
            'programs'  =>  ProgramKeahlian::all(),
            'slider'    =>  Slider::all(),
            'sambutan'  =>  SambutanKepalaSekolah::firstOrFail(),
            'fasilitas' =>  FasilitasSingkat::all(),
        ]);
    }

    public function show_profil($slug)
    {
        $profil = Profil::where('slug', $slug)->firstOrFail();

        return view('home.profil', [
            'title'         => 'Profil | ' . $profil->title,
            'breadcrumb'    => $profil->title,
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'profil'        => $profil,
            'slider'    =>  Slider::all(),
        ]);
    }
    public function show_program($slug)
    {
        $program = ProgramKeahlian::where('slug', $slug)->firstOrFail();

        return view('home.program', [
            'title'         => 'Program Keahlian | ' . $program->nama_program,
            'breadcrumb'    => $program->nama_program,
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'program'       => $program,
            'slider'        =>  Slider::all(),
        ]);
    }

    public function show_guru()
    {
        return view('home.guru', [
            'title'         => 'Data Guru',
            'breadcrumb'    => 'Data Guru',
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'guru'          => DataGuru::all(),
            'slider'    =>  Slider::all(),
        ]);
    }

    public function show_siswa()
    {
        return view('home.siswa', [
            'title'         => 'Data siswa',
            'breadcrumb'    => 'Data siswa',
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'siswa'         => DataSiswa::firstOrFail(),
            'slider'    =>  Slider::all(),
        ]);
    }

    public function show_galeri()
    {
        return view('home.galeri', [
            'title'         => 'Galeri',
            'breadcrumb'    => 'Galeri',
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'galeri'        => Galeri::all(),
            'brosur'        => Brosur::all(),
            'slider'    =>  Slider::all(),
        ]);
    }

    public function show_berita()
    {
        $berita = Berita::where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home.berita', [
            'title'         => 'Berita',
            'breadcrumb'    => 'Berita',
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'berita'        => $berita,
            'brosur'        => Brosur::all(),
            'slider'    =>  Slider::all(),
        ]);
    }

    public function show_berita_detail($slug)
    {
        // dd($slug);
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('home.berita_detail', [
            'title'         => 'Berita | ' . $berita->judul,
            'breadcrumb'    => 'Berita',
            'profils'       => Profil::all(),
            'programs'      => ProgramKeahlian::all(),
            'berita'        => $berita,
            'brosur'        => Brosur::all(),
            'slider'    =>  Slider::all(),
        ]);
    }

    public function show_pendaftaran()
    {
        if (Auth::check()) {
            $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
            $penghasilan_ortu = ['Rp. 1.000.000 - Rp. 2.000.000', 'Rp. 2.000.000 - Rp. 3.000.000', 'Rp. 3.000.000 - Rp. 4.000.000', 'Rp. 4.000.000 - Rp. 5.000.000', '> Rp. 5.000.000'];

            return view('home.pendaftaran', [
                'title'             => 'Pendaftaran Siswa (PPDB)',
                'breadcrumb'        => 'Pendaftaran Siswa (PPDB)',
                'profils'           =>  Profil::all(),
                'programs'          =>  ProgramKeahlian::all(),
                'sambutan'          =>  SambutanKepalaSekolah::firstOrFail(),
                'syarat'            =>  SyaratPendaftaran::firstOrFail(),
                'fasilitas'         =>  FasilitasSingkat::all(),
                'brosur'            =>  Brosur::all(),
                'agama'             =>  $agama,
                'penghasilan_ortu'  =>  $penghasilan_ortu,
            ]);
        } else {
            return view('home.daftar', [
                'title'             => 'Pendaftaran Siswa (PPDB)',
                'breadcrumb'        => 'Pendaftaran Siswa (PPDB)',
                'profils'           =>  Profil::all(),
                'programs'          =>  ProgramKeahlian::all(),
                'sambutan'          =>  SambutanKepalaSekolah::firstOrFail(),
                'syarat'            =>  SyaratPendaftaran::firstOrFail(),
                'fasilitas'         =>  FasilitasSingkat::all(),
                'brosur'            =>  Brosur::all(),
            ]);
        }
    }

    public function panel_siswa($id)
    {
        $siswa = User::findOrFail($id);

        $pendaftaran = DB::table('pendaftarans')
            ->where('id', $siswa->id_ppdb)
            ->first();

        return view('home.panel_siswa', [
            'title'             => 'Halaman Panel Siswa',
            'breadcrumb'        => 'Halaman Panel Siswa',
            'siswa'             => $siswa,
            'pendaftaran'       => $pendaftaran,
            'profils'           =>  Profil::all(),
            'programs'          =>  ProgramKeahlian::all(),
            'sambutan'          =>  SambutanKepalaSekolah::firstOrFail(),
            'syarat'            =>  SyaratPendaftaran::firstOrFail(),
            'fasilitas'         =>  FasilitasSingkat::all(),
            'brosur'            =>  Brosur::all(),
        ]);
    }
}

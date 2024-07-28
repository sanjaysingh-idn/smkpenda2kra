<?php

namespace App\Http\Controllers;

use App\Models\FasilitasSingkat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index', [
            'title'       => 'SMK Penda 2 Karanganyar',
            'fasilitas'   => FasilitasSingkat::all(),
        ]);
    }
}

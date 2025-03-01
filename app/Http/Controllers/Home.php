<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{

    function home()
    {
        return view('user.home');
    }

    function tentang_kami()
    {
        return view('user.tentang_kami');
    }

    function pencapaian()
    {
        return view('user.pencapaian');
    }

    function kontak()
    {
        return view('user.kontak');
    }
}
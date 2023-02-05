<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function dashboard ()
    {
        return view('pages/index');
    }
    public function dataAset ()
    {
        return view('pages/dataAset/index');
    }

    public function pustaka ()
    {
        return view('pages/pustaka/index');
    }

    public function laporan ()
    {
        return view('pages/laporan/index');
    }

    public function pengaturan ()
    {
        return view('pages.pengaturan.index');
    }
}
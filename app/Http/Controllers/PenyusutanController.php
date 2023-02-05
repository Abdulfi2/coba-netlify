<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class PenyusutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori')
                    ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                    ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                    ->where('penyusutan', 'ya')->paginate(5);

        return view ('pages/dataAset/penyusutan/index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran', 'satker.name_satker')
                    ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                    ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                    ->join('anggaran', 'asset.id_kategori', '=', 'anggaran.id')
                    ->join('satker', 'asset.id_satker', '=', 'satker.id')
                    ->where('asset.id', $id)->first();
        
        return view('pages/dataAset/penyusutan/showPenyusutan', compact('data'));
    }
}

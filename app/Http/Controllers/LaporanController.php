<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use PDF;
// use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran', 'satker.name_satker')
                    ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                    ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                    ->join('anggaran', 'asset.id_anggaran', '=', 'anggaran.id')
                    ->join('satker', 'asset.id_satker', '=', 'satker.id')
                    ->where('penyusutan', 'ya')->paginate(10);
        
        // mengarahkan user kehalaman laporan
        return view('pages/laporan/laporanAset/index', compact('data'));
    }
    
    public function generatePDF()
    {
        $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran', 'satker.name_satker')
                        ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                        ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                        ->join('anggaran', 'asset.id_anggaran', '=', 'anggaran.id')
                        ->join('satker', 'asset.id_satker', '=', 'satker.id')
                        ->where('penyusutan', 'ya')->paginate(10);
  
        // $konten = [
        //     'title' => 'Laporan Data Asset Yayasan Zakat Sukses',
        //     'date' => date('m/d/Y'),
        //     'users' => $data
        // ]; 
            
        // $pdf = PDF::loadview('pages/laporan/laporanAset/pdfLaporan', ['data' => $data]);
     
        // return $pdf->download('Laporan-Aset.pdf', compact('data'));
        return view('pages/laporan/laporanAset/pdfLaporan', compact('data'));
    }
}

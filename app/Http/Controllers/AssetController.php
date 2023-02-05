<?php

namespace App\Http\Controllers;

use App\Exports\AssetExport;
use App\Imports\AssetImport;
use App\Models\Anggaran;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Penghapusan;
use App\Models\Satker;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->has('search')) {
            $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran')
                        ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                        ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                        ->join('anggaran', 'asset.id_anggaran', '=', 'anggaran.id')
                        ->where('name_aset', 'like', '%' . $request->search . '%')->paginate(10);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/aset')->with('error', 'Data Asset tidak ditemukan');
            }
        } else {
            $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran')
            ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
            ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
            ->join('anggaran', 'asset.id_anggaran', '=', 'anggaran.id')->paginate(10);
        }
        return view('pages/dataAset/dashboardAset/index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kondisi = ['Baik','Rusak','Renovasi', 'Dipinjam'];
        $penyusutan = ['ya','no'];
        // mengambil data jenis, kategori, anggaran, dan satker
        $data = [
            'jenis' => Jenis::pluck('name_jenis', 'id'),
            'kategori' => Kategori::pluck('name_kategori', 'id'),
            'anggaran' => Anggaran::pluck('name_anggaran', 'id'),
            'satker' => Satker::pluck('name_satker', 'id'),
            'kondisi' => $kondisi,
            'penyusutan' => $penyusutan,
          ];
        // mengarahkan user kehalaman index di folder tambah aset
        return view('pages/dataAset/dashboardAset/CreateAset')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name_aset' => 'required',
            'id_jenis' => 'required|exists:jenis,id',
            'id_kategori' => 'required|exists:kategori,id',
            'id_anggaran' => 'required|exists:anggaran,id',
            'kondisi' => 'required|in:Baik,Rusak,Renovasi,Dipinjam',
            'tgl_terima' => 'required|date',
            'nilai_aset' => 'required|numeric',
            'id_satker' => 'required|exists:satker,id',
            'batas_pemakaian' => 'required|integer',
            'penyusutan' => 'required|in:ya,no',
            'lokasi_aset' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|image|max:1024'
        ],[
            'name_aset.required' => 'Nama Aset tidak boleh kosong',
            'id_jenis.exists' => 'Jenis Aset tidak boleh kosong',
            'id_kategori.exists' => 'Kategori Aset tidak boleh kosong',
            'id_anggaran.exists' => 'Anggaran Aset tidak boleh kosong',
            'kondisi.required' => 'Kondisi Aset tidak boleh kosong',
            'tgl_terima.required' => 'Tanggal Penerimaan belum dimasukkan',
            'nilai_aset.required' => 'Nilai Aset masih kosong silahkan diisi dahulu',
            'id_satker.exists' => 'Satuan kerja belum dipilih',
            'batas_pemakaian.required' => 'Batas Pemakainnya masih kosong nih',
            'penyusutan.required' => 'Penyusutan belum dipilih',
            'lokasi_aset.required' => 'Lokasi aset masih kosong',
        ]);

        $kode = [
            'id_satker' => $request->input('id_satker'),
            'tgl_terima' => $request->input('tgl_terima'),
            'batas_pemakaian' => $request->input('batas_pemakaian')
        ];        
        $kode_satker = Satker::find($request->input('id_satker'))->kode_satker;
        $kode_kategori = Kategori::find($request->input('id_kategori'))->kode_kategori;

        $kode_asset = $kode_satker . '-' . $kode_kategori . '-' . $kode['id_satker'] . '-' . date('Ymd', strtotime($kode['tgl_terima'])) . '-' . $kode['batas_pemakaian'];

        // menambah data baru ke database

        if ($request->hasFile('foto')) { 
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_name = date('ymdhis') . '.' . $foto_ekstensi;
            $path = $foto_file->storeAs('uploads', $foto_name);
        } else {
            $path = '';
        }
        

        $data = [
            'kode_aset' => $kode_asset,
            'name_aset' => $request->input('name_aset'),
            'id_jenis' => $request->input('id_jenis'),
            'id_kategori' => $request->input('id_kategori'),
            'id_anggaran' => $request->input('id_anggaran'),
            'kondisi' => $request->input('kondisi'),
            'tgl_terima' => $request->input('tgl_terima'),
            'nilai_aset' => $request->input('nilai_aset'),  
            'id_satker' => $request->input('id_satker'),
            'batas_pemakaian' => $request->input('batas_pemakaian'),
            'penyusutan' => $request->input('penyusutan'),
            'lokasi_aset' => $request->input('lokasi_aset'),
            'ket_aset' => $request->input('ket_aset'),
            'foto' => $path
        ];

        Asset::create($data);

        return redirect('/aset')->with('Sukses', 'Data Aset berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran', 'satker.name_satker')
                        ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                        ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                        ->join('anggaran', 'asset.id_anggaran', '=', 'anggaran.id')
                        ->join('satker', 'asset.id_satker', '=', 'satker.id')
                        ->where('asset.id', $id)->first();

        return view('pages.dataAset.dashboardAset.showAset', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengambil data aset sesuai id
        $data = Asset::select('asset.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran', 'satker.name_satker')
                        ->join('jenis', 'asset.id_jenis', '=', 'jenis.id')
                        ->join('kategori', 'asset.id_kategori', '=', 'kategori.id')
                        ->join('anggaran', 'asset.id_anggaran', '=', 'anggaran.id')
                        ->join('satker', 'asset.id_satker', '=', 'satker.id')
                        ->find($id);
        $j = Jenis::pluck('name_jenis', 'id');
        $k = Kategori::pluck('name_kategori', 'id');
        $a = Anggaran::pluck('name_anggaran', 'id');
        $s = Satker::pluck('name_satker', 'id');

        return view('pages.dataAset.dashboardAset.editAset', compact('data', 'j', 'k', 'a', 's'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $request->validate([
            'name_aset' => 'required',
            'id_jenis' => 'required|exists:jenis,id',
            'id_kategori' => 'required|exists:kategori,id',
            'id_anggaran' => 'required|exists:anggaran,id',
            'kondisi' => 'required|in:Baik,Rusak,Renovasi,Dipinjam',
            'tgl_terima' => 'required|date',
            'nilai_aset' => 'required|numeric',
            'id_satker' => 'required|exists:satker,id',
            'batas_pemakaian' => 'required|integer',
            'penyusutan' => 'required|in:ya,no',
            'lokasi_aset' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|image|max:1024'
        ],[
            'name_aset.required' => 'Nama Aset tidak boleh kosong',
            'id_jenis.exists' => 'Jenis Aset tidak boleh kosong',
            'id_kategori.exists' => 'Kategori Aset tidak boleh kosong',
            'id_anggaran.exists' => 'Anggaran Aset tidak boleh kosong',
            'kondisi.required' => 'Kondisi Aset tidak boleh kosong',
            'tgl_terima.required' => 'Tanggal Penerimaan belum dimasukkan',
            'nilai_aset.required' => 'Nilai Aset masih kosong silahkan diisi dahulu',
            'id_satker.exists' => 'Satuan kerja belum dipilih',
            'batas_pemakaian.required' => 'Batas Pemakainnya masih kosong nih',
            'penyusutan.required' => 'Penyusutan belum dipilih',
            'lokasi_aset.required' => 'Lokasi aset masih kosong',
        ]);

        $kode = [
            'id_satker' => $request->input('id_satker'),
            'tgl_terima' => $request->input('tgl_terima'),
            'batas_pemakaian' => $request->input('batas_pemakaian')
        ];        
        $kode_satker = Satker::find($request->input('id_satker'))->kode_satker;
        $kode_kategori = Kategori::find($request->input('id_kategori'))->kode_kategori;

        $kode_asset = $kode_satker . '-' . $kode_kategori . '-' . $kode['id_satker'] . '-' . date('Ymd', strtotime($kode['tgl_terima'])) . '-' . $kode['batas_pemakaian'];

        // menambah data baru ke database

        if ($request->hasFile('foto')) { 
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_name = date('ymdhis') . '.' . $foto_ekstensi;
            $path = $foto_file->storeAs('uploads', $foto_name);
        } else {
            $path = '';
        }
        

        $data = [
            'kode_aset' => $kode_asset,
            'name_aset' => $request->input('name_aset'),
            'id_jenis' => $request->input('id_jenis'),
            'id_kategori' => $request->input('id_kategori'),
            'id_anggaran' => $request->input('id_anggaran'),
            'kondisi' => $request->input('kondisi'),
            'tgl_terima' => $request->input('tgl_terima'),
            'nilai_aset' => $request->input('nilai_aset'),  
            'id_satker' => $request->input('id_satker'),
            'batas_pemakaian' => $request->input('batas_pemakaian'),
            'penyusutan' => $request->input('penyusutan'),
            'lokasi_aset' => $request->input('lokasi_aset'),
            'ket_aset' => $request->input('ket_aset'),
            'foto' => $path
        ];

        Asset::where('id', $id)->update($data);

        return redirect('/aset')->with('Sukses', 'Data Aset berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mencari data aset berdasarkan id
        $asset = Asset::find($id);

        // menghapus data aset
        $asset->delete();

        // Menyimpan data asset yang dihapus ke tabel penghapusan
        Penghapusan::create($asset->toArray());

        // mengarahkan user kembali ke halaman sebelumnya setelah menghapus data, dan memberikan pesan sukses menghapus data
        return redirect('/aset')->with('Sukses','Data Aset berhasil dihapus');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assetexport() {
        return Excel::download(new AssetExport, 'Asset-SIMASET.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assetimport(Request $request) {

        if ($file = $request->file('file')) {
            
        $namafile = $file->getClientOriginalName();
        $file->move('DataAset', $namafile);

        Excel::import(new AssetImport, public_path('/DataAset/'.$namafile));
        return redirect('/aset')->with('Sukses', 'Data aset berhasil diimport');
        } else {
            return redirect('/aset')->with('Failed', 'Data aset kosong, tidak ada import file yang berhasil diimport!');
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sampleimport() {
        return Excel::download(new AssetExport, 'Sample.xlsx');
    }
}

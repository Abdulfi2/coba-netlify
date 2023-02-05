<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Penghapusan;
use Illuminate\Http\Request;


class PenghapusanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Penghapusan::select('penghapusan.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran')
                ->join('jenis', 'penghapusan.id_jenis', '=', 'jenis.id')
                ->join('kategori', 'penghapusan.id_kategori', '=', 'kategori.id')
                ->join('anggaran', 'penghapusan.id_anggaran', '=', 'anggaran.id')
                ->where('name_aset', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/remove')->with('error', 'Data penghapusan tidak ditemukan');
            } 
        } else {
            $data = Penghapusan::select('penghapusan.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran')
                ->join('jenis', 'penghapusan.id_jenis', '=', 'jenis.id')
                ->join('kategori', 'penghapusan.id_kategori', '=', 'kategori.id')
                ->join('anggaran', 'penghapusan.id_anggaran', '=', 'anggaran.id')->paginate(5);
        }

        return view('pages/dataAset/penghapusan/index', compact('data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penghapusan::select('penghapusan.*', 'jenis.name_jenis', 'kategori.name_kategori', 'anggaran.name_anggaran', 'satker.name_satker')
                        ->join('jenis', 'penghapusan.id_jenis', '=', 'jenis.id')
                        ->join('kategori', 'penghapusan.id_kategori', '=', 'kategori.id')
                        ->join('anggaran', 'penghapusan.id_anggaran', '=', 'anggaran.id')
                        ->join('satker', 'penghapusan.id_satker', '=', 'satker.id')
                        ->where('penghapusan.id', $id)->first();

        return view('pages/dataAset/penghapusan/showPenghapusan', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mencari data aset berdasarkan id dan menghapusnya
        Penghapusan::where('id' , $id)->delete();
        // mengarahkan user kembali ke halaman sebelumnya setelah menghapus data, dan memberikan pesan sukses menghapus data
        return redirect('/remove')->with('Sukses','Data berhasil dihapus');
    }

    // public function restore($id)
    // {
    //     // mencari data aset berdasarkan id
    //     $remove = Penghapusan::find($id);

    //     // menghapus data aset
    //     $remove->delete();

    //     // Menyimpan data asset yang dihapus ke tabel penghapusan
    //     Asset::create($remove->toArray());

    //     // mengarahkan user kembali ke halaman sebelumnya setelah menghapus data, dan memberikan pesan sukses menghapus data
    //     return redirect('/remove')->with('Sukses','Data Aset berhasil direstore');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // kondisi untuk metode search
        if ($request->has('search')) {
            $data = Satker::where('name_satker', 'Like', '%' . $request->search . '%')
            ->orWhere('kode_satker', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty('name_satker')) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/satker')->with('error', 'Data satuan kerja tidak ditemukan');
            }
        } else {
            $data = Satker::paginate(5);
        }

        // mengarahkan user kehalaman satuan kerja index
        return view('pages/pengaturan/satker/index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //mengarahkan user ke halaman tambah data satuan kerja
        return view('pages/pengaturan/satker/createSatker');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validasi data satuan kerja
        $request->validate([
            'name_satker' => 'required|string',
            'kode_satker' => 'required|string'
        ],[
            'name_satker.required' => 'Nama satuan kerja tidak boleh kosong',
            'kode_satker.required' => 'Kode satuan kerja tidak boleh kosong'
        ]);

        // menambah data satuan kerja baru ke database
        $data = [
            'name_satker' => $request->input('name_satker'),
            'kode_satker' => $request->input('kode_satker')
        ];

        // menambah data satuan kerja dengan fungsi create
        Satker::create($data);

        // mengarahkan user ke halaman sebelumnya dan memberikan pesan sukses menambahkan data
        return redirect('/satker')->with('Sukses', 'Data satuan kerja berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // mengambil data satuan kerja untuk menampilkan detailnya sesuai id
        $data = Satker::where('id', $id)->first();
        // mengarahkan user kehalaman detail satuan kerja
        return view('pages/pengaturan/satker/showSatker', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // mengambil data satuan kerja untuk di edit sesuai id yang dipilih
        $data = Satker::where('id', $id)->first();
        // mengarahkan user kehalaman edit satuan kerja
        return view('pages/pengaturan/satker/editSatker', compact('data'));

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

        //validasi data satuan kerja yang akan di update
        $request->validate([
            'name_satker' => 'required|string',
            'kode_satker' => 'required|string'
        ],[
            'name_satker.required' => 'Nama satuan kerja tidak boleh kosong',
            'kode_satker.required' => 'Kode satuan kerja tidak boleh kosong'
        ]);
        
        // menambah data yang di update ke database
        $data = [
            'name_satker' => $request->input('name_satker'),
            'kode_satker' => $request->input('kode_satker')
        ];

        // melakukan update data sesuai id satuan kerja
        Satker::where('id', $id)->update($data);

        // mengarahkan user kehalaman sebelumnya dan memberikan pesan sukses mengupdate data
        return redirect('/satker')->with('Sukses', 'Data satuan kerja berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data sesuai id yang dipilih
        Satker::where('id', $id)->delete();
        return redirect('satker')->with('Sukses', 'Data satuan kerja berhasil dihapus');
    }
}

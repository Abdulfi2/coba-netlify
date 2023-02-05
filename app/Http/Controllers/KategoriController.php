<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kategori::where('name_kategori', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/kategori')->with('error', 'Data Kategori tidak ditemukan');
            }
        } else {
            $data = Kategori::paginate(5);
        }
        return view('pages/pustaka/kategori/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengarahkan user ke halaman tambah data kategori
        return view('pages/pustaka/kategori/createKategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data yang akan di update
        $request->validate([
            'name_kategori' => 'required|string',
            'kode_kategori' => 'required|string'
        ],[
            'name_kategori.required' => 'Nama Kategori tidak boleh kosong',
            'kode_kategori.required' => 'Kode Kategori tidak boleh kosong'
        ]);
      
        // Menyimpan data user baru ke database
        $data = [
            'name_kategori' => $request->input('name_kategori'),
            'kode_kategori' => $request->input('kode_kategori')
        ];
        // menambahkan data kategori
        Kategori::create($data);

        // mengarahkan user kembali ke halaman sebelumnya setelah menambah data, dan memberikan pesan sukses menambah data
        return redirect('/kategori')->with('Sukses', 'Data kategori berhasil dsitambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // variabel data, akan menampilkan data yang akan diproses berdasarkan id data
        $data = Kategori::where('id', $id)->first();
        // Menampilkan halaman Detail Kategori kepada admin
        return view('pages/pustaka/kategori/showKategori')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // variabel data, akan menampilkan data yang akan di edit berdasarkan id data
        $data = Kategori::where('id', $id)->first();
        // mengarahkan user ke halaman edit kategori
        return view('pages/pustaka/kategori/editKategori', compact('data'));
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
        // validasi data yang akan di update
        $request->validate([
            'name_kategori' => 'required|string',
            'kode_kategori' => 'required|string'
        ],[
            'name_kategori.required' => 'Nama Kategori tidak boleh kosong',
            'kode_kategori.required' => 'Kode Kategori tidak boleh kosong'
        ]);

        // // Menyimpan data kategori ke database
        $data = [
            'name_kategori' => $request->input('name_kategori'),
            'kode_kategori' => $request->input('kode_kategori'),
        ];
        // melakukan update data berdasarkan id yang dipilih dari data
        Kategori::where('id', $id)->update($data);

        // mengarahkan user kembali ke halaman sebelumnya setelah mengupdate data, dan memberikan pesan sukses mengupdate data
        return redirect('/kategori')->with('Sukses', 'Data kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mencari kategori berdasarkan id dan menghapusnya
        Kategori::where('id' , $id)->delete();
        // mengarahkan user kembali ke halaman sebelumnya setelah menghapus data, dan memberikan pesan sukses menghapus data
        return redirect('/kategori')->with('Sukses','Data kategori berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Anggaran::where('name_anggaran', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/sumber-dana')->with('error', 'Data Sumber Dana tidak ditemukan');
            }
        } else {
            $data = Anggaran::paginate(5);
        }
        return view('pages/pustaka/anggaran/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/pustaka/anggaran/createAnggaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'name_anggaran' => 'required|string',
            'kode_anggaran' => 'required|string'
        ],[
            'name_anggaran.required' => 'Nama Sumber Dana tidak boleh kosong',
            'kode_anggaran.required' => 'Kode Sumber Dana tidak boleh kosong'
        ]);
      
        // Menyimpan data sumber dana baru ke database
        $data = [
            'name_anggaran' => $request->input('name_anggaran'),
            'kode_anggaran' => $request->input('kode_anggaran'),
        ];
        // menambah data anggaran
        Anggaran::create($data);


        return redirect('/sumber-dana')->with('Sukses', 'Data Sumber Dana berhasil dsitambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = Anggaran::where('id', $id)->first();
        // Menampilkan halaman detail anggaran kepada user
        return view('pages/pustaka/anggaran/showAnggaran', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Anggaran::where('id', $id)->first();
        // Menampilkan halaman edit anggaran kepada user
        return view('pages/pustaka/anggaran/editAnggaran', compact('data'));
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
        // validasi data anggaran
        $request->validate([
            'name_anggaran' => 'required|string',
            'kode_anggaran' => 'required|string',
        ],[
            'name_anggaran.required' => 'Nama Sumber Dana tidak boleh kosong',
            'kode_anggaran.required' => 'Kode Sumber Dana tidak boleh kosong'
        ]);
      
        // Menyimpan data sumber dana ke database
        $data = [
            'name_anggaran' => $request->input('name_anggaran'),
            'kode_anggaran' => $request->input('kode_anggaran'),
        ];
        // melakukan update data sumber dana berdasarkan id yang dipilih
        Anggaran::where('id', $id)->update($data);

        // mengarahkan user kembali ke halaman sebelumnya setelah mengupdate data, dan memberikan pesan sukses update data
        return redirect('/sumber-dana')->with('Sukses', 'Data anggaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mencari data sumber dana berdasarkan id dan menghapusnya
        Anggaran::where('id' , $id)->delete();
        // mengarahkan user kembali ke halaman sebelumnya setelah menghapus data, dan memberikan pesan sukses menghapus data
        return redirect('/sumber-dana')->with('Sukses','Data Anggaran berhasil dihapus');
    }
}

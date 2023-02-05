<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Jenis::where('name_jenis', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/jenis')->with('error', 'Data Jenis tidak ditemukan');
            }
        } else {
            $data = Jenis::paginate(5);
        }
        return view('pages/pustaka/jenis/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan halaman create Jenis kepada user
        return view('pages/pustaka/jenis/createJenis');
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
            'name_jenis' => 'required|string',
            'kode_jenis' => 'required|string'
        ], [
            'name_jenis.required' => 'Nama Jenis tidak boleh kosong',
            'kode_jenis.required' => 'Kode Jenis tidak boleh kosong'
        ]);

        // menambah data jenis ke database
        $data = [
            'name_jenis' => $request->input('name_jenis'),
            'kode_jenis' => $request->input('kode_jenis')
        ];

        // Menambah data baru dan menjalankan variabel data
        Jenis::create($data);

        // mmengarahkan users ke url jenis dan memberi pesan sukses
        return redirect('/jenis')->with('Sukses', 'Data jenis berhasil ditambahkan');
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
        $data = Jenis::where('id', $id)->first();
        // Menampilkan halaman Detail Jenis kepada user
        return view('pages/pustaka/jenis/showJenis', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // variabel data, akan menampilkan data yang akan diproses berdasarkan id data
        $data = Jenis::where('id', $id)->first();
        // Menampilkan halaman Edit Jenis kepada user
        return view('pages/pustaka/jenis/editJenis', compact('data'));
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
        // validasi data
        $request->validate([
            'name_jenis' => 'required|string',
            'kode_jenis' => 'required|string'
        ], [
            'name_jenis.required' => 'Nama Jenis tidak boleh kosong',
            'kode_jenis.required' => 'Kode Jenis tidak boleh kosong'
        ]);

        // menambah data jenis ke database
        $data = [
            'name_jenis' => $request->input('name_jenis'),
            'kode_jenis' => $request->input('kode_jenis')
        ];

        // Menambah data baru dan menjalankan variabel data
        Jenis::where('id', $id)->update($data);

        // mmengarahkan users ke url jenis dan memberi pesan sukses
        return redirect('/jenis')->with('Sukses', 'Data jenis berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mencari jenis berdasarkan id dan menghapusnya
        Jenis::where('id', $id)->delete();

        // mengarahkan user kembali ke halaman sebelumnya setelah menghapus data, dan memberikan pesan sukses menghapus data
        return redirect('/jenis')->with('Sukses', 'Data jenis berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $data = Role::where('name_role', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/role')->with('error', 'Data Role tidak ditemukan');
            }
        } else {
            $data = Role::paginate(5);
        }
        return view('pages/pengaturan/role/index', compact('data'));
    
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // mengarahkan user ke helaman tambah role (create role)
        return view('pages/pengaturan/role/createRole');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validasi data role
        $request->validate([
            'name_role' => 'required|string',
            'kode_role' => 'required|string'
        ],[
            'name_role.required' => 'Nama role tidak boleh kosong',
            'kode_role.required' => 'Kode role tidak boleh kosong'
        ]);

        // menambah data role baru ke database
        $data = [
            'name_role' => $request->input('name_role'),
            'kode_role' => $request->input('kode_role')
        ];

        // menambah data role baru
        Role::create($data);

        // mengarahkan user dengan redirect ke halaman index, dan memberikan pesan sukses menambahkan data baru
        return redirect('/role')->with('Sukses', 'Data role berhasil ditambahkan');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // mengambil salah satu data role sesuai id
        $data =  Role::where('id', $id)->first();
        // mengarahkan user ke halaman detail role 
        return view('pages/pengaturan/role/showRole', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // mengambil data role sesuai id untuk diedit
        $data = Role::where('id', $id)->first();
        // mengarahkan user kehalaman edit role
        return view('pages/pengaturan/role/editRole', compact('data'));

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
            'name_role' => 'required|string',
            'kode_role' => 'required|string'
        ],[
            'name_role.required' => 'Nama Role tidak boleh kosong',
            'kode_role.required' => 'Kode Role tidak boleh kosong'
        ]);

        // menambah data yang akan diedit ke database
        $data = [
            'name_role' => $request->input('name_role'),
            'kode_role' => $request->input('kode_role')
        ];

        // melakukan update data role sesuai id yang dipilih
        Role::where('id', $id)->update($data);

        // mengarahkan user kehalaman sebelumnya dan memberikan pesan sukses update data
        return redirect('/role')->with('Sukses', 'Data role berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect('/role')->with('Sukses', 'Data role berhasil dihapus');
    }
}

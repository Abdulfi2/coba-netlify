<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = User::select('user.*', 'roles.name')
                        ->join('roles', 'user.role_id', '=', 'roles.id')
                        ->where('name_full', 'like', '%' . $request->search . '%')->paginate(5);
            if ($data->isEmpty()) {
                // Tampilkan pesan data tidak ditemukan
                return redirect('/users')->with('error', 'Data User tidak ditemukan');
            }
        } else {
            $data = User::select('user.*', 'roles.name')
                        ->join('roles', 'user.role_id', '=', 'roles.id')
                        ->paginate(5);
        }

        return view('pages/pengaturan/users/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('pages/pengaturan/users/createUsers', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Request
        $request->validate([
            'name_full' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|unique:user',
            'password' => 'required|string',
            'role_id' => 'required|exists:roles,id',
        ], [
            'name_full.required' => 'Nama Lengkap tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'role_id.exists' => 'Role Harus dipilih'
        ]);

        // Menyimpan data user baru ke database
        $data = [
            'name_full' => $request->input('name_full'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ];
        User::create($data);

        return redirect('/users')->with('Sukses', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::select('user.*', 'roles.name')
                    ->join('roles', 'user.role_id', '=', 'roles.id')
                    ->find($id);
        
        // menampilkan halaman detail user
        return view('/pages/pengaturan/users/showUsers',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::select('user.*', 'roles.name')
                    ->join('roles', 'user.role_id', '=', 'roles.id')
                    ->find($id);
        $roles = Role::pluck('name', 'id');

        // menampilkan halaman edit users
        return view('pages/pengaturan/users/editUsers', compact('data','roles'));
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
        $request->validate([
            'name_full' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|unique:user,email,' . $id,
            'password' => 'required|string',
            'role_id' => 'required|exists:roles,id'
        ], [
            'name_full.required' => 'Nama Lengkap tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'role_id.exists' => 'Role Harus dipilih'
        ]);

        // Menyimpan data user baru ke database
        $data = [
            'name_full' => $request->input('name_full'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ];
        User::where('id', $id)->update($data);

        // redirect User ke halaman awal
        return redirect('/users')->with('Sukses', 'Data user berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/users')->with('Sukses', 'Data kategori berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use App\Models\M_Data_Pegawai;
use App\Models\M_Data_Pengguna;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class Data_pengguna extends Controller
{
    function index()
    {
        $data_pengguna = M_Data_Pengguna::all();
        // dd($data_pengguna);

        return view('admin.data_pengguna', compact('data_pengguna'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'level' => 'required',
            'nik' => 'required',

        ]);


        $data_pengguna = M_Data_Pengguna::create([

            'username' => $request->username,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'level' => $request->level,

        ]);
        

        M_Data_Pegawai::create([

            'nama' => $request->username,
            'nik' => $request->nik,
            'jabatan' => 'Pegawai',
            'email' => $request->email,
            'user_id' => $data_pengguna->id,
        ]);

        return redirect('data-pengguna')->with('success', 'Data berhasil ditambahkan.');
    }


    public function update(Request $request, $id_pengguna)
    {
        $request->validate([
            'username' => '',
            'password' => '',
            'email' => '',

        ]);

        $data_pengguna = M_Data_Pengguna::findOrFail($id_pengguna);
        $data_pengguna->update([

            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
        ]);
        return redirect('data-pengguna/')->with('success', 'Data berhasil diedit.');
    }



    public function pengguna_destroy($id)
    {
        $data_pengguna = M_Data_Pengguna::find($id);

        if ($data_pengguna) {
            $data_pengguna->delete();
            return redirect('/data-pengguna')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('/data-pengguna')->with('error', 'Data tidak ditemukan.');
        }
    }
}
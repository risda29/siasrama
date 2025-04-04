<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Santri;
use App\Models\M_Data_Pengguna;

class Data_santri extends Controller
{
    function index()
    {
        $data_santri = M_Data_Santri::all();

        return view('admin.data_santri', compact('data_santri'));
    }


    public function store(Request $request)
    {

        $nisn = $request->input('nisn');

        M_Data_Pengguna::create([
            'id' => $nisn,
            'username' => $request->input('nm_santri'),
            'email' => $request->input('email'),
            'password' => password_hash($request->email, PASSWORD_DEFAULT),
            'level' => 'Santri',
        ]);

        $request->validate([
            'nm_santri' => 'required',
            'nisn' => 'required',
            'email' => 'required',
        ]);


        M_Data_Santri::create([

            'nm_santri' => $request->nm_santri,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ibu' => $request->nama_ibu,
            'nhp_ibu' => $request->nhp_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nhp_ayah' => $request->nhp_ayah,
            'nama_wali' => $request->nama_wali,
            'nhp_wali' => $request->nhp_wali,
            'email' => $request->email,
            'user_id' => $request->nisn,
        ]);


        return redirect('data-santri')->with('success', 'Data berhasil ditambahkan.');
    }


    // Fungsi untuk memperbarui data
    public function update(Request $request, $id_santri)
    {
        // Validasi data input
        $request->validate([
            'nm_santri' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'alamat' => '',
            'nama_ibu' => '',
            'nhp_ibu' => '',
            'nama_ayah' => '',
            'nhp_ayah' => '',
            'nama_wali' => '',
            'nhp_wali' => '',
        ]);

        // Cari data santri berdasarkan ID
        $data_santri = M_Data_Santri::findOrFail($id_santri);

        // Update data santri
        $data_santri->update([
            'nm_santri' => $request->nm_santri,
            'tempat_lahir' => $request->tempat_lahir,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ibu' => $request->nama_ibu,
            'nhp_ibu' => $request->nhp_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nhp_ayah' => $request->nhp_ayah,
            'nama_wali' => $request->nama_wali,
            'nhp_wali' => $request->nhp_wali,
        ]);

        // Redirect dengan pesan sukses
        return redirect('data-santri')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id_santri)
    {
        $data_santri = M_Data_Santri::find($id_santri);

        if ($data_santri) {
            $data_santri->delete();
            return redirect('data-santri')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('data-santri')->with('error', 'Data tidak ditemukan.');
        }
    }
}

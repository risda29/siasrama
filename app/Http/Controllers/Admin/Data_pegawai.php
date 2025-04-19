<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Pegawai;


class Data_pegawai extends Controller
{
    function index()
    {
        $data_pegawai = M_Data_Pegawai::all();

        return view('admin.data_pegawai',compact('data_pegawai'));
    }


    // public function store(Request $request)
    // {
    //     $nik = $request->input('nik');

    //     M_Data_Pengguna::create([
    //         'id' => $nik,
    //         'username' => $request->input('nama'),
    //         'email' => $request->input('email'),
    //         'password' => password_hash($request->email, PASSWORD_DEFAULT),
    //         'level' => 'Kepala',
    //     ]);

    //     $request->validate([
    //         'nm_santri' => 'required',
    //         'nisn' => 'required',
    //         'email' => 'required',
    //     ]);


    //     $request->validate([
    //         'nama' => 'required',
    //         'nik' => 'required',
    //         'no_hp' => 'required',
    //         'alamat' => 'required',
    //         'jabatan' => 'required',
           
    //     ]);

    //     M_Data_Pegawai::create([
            
    //         'nama' =>$request->nama,
    //         'nik' =>$request->nik,
    //         'no_hp' =>$request->no_hp,
    //         'alamat' =>$request->alamat,
    //         'jabatan' =>$request->jabatan,
    //     ]);
    //     return redirect('data-pegawai')->with('success', 'Data berhasil ditambahkan.');

    // }


public function update(Request $request, $id_pegawai){
    $request->validate([
        'nama' => 'required',
        'nik' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'jabatan' => 'required',
       
    ]);

    $data_pegawai = M_Data_Pegawai::findOrFail($id_pegawai);
    $data_pegawai->update([
        
        'nama' =>$request->nama,
        'nik' =>$request->nik,
        'no_hp' =>$request->no_hp,
        'alamat' =>$request->alamat,
        'jabatan' =>$request->jabatan,
    ]);
    return redirect('data-pegawai')->with('success', 'Data berhasil diedit.');
}




    public function pegawai_destroy($id_pegawai)
    {
        $data_pegawai = M_Data_Pegawai::find($id_pegawai);
    
        if ($data_pegawai) {
            $data_pegawai->delete();
            return redirect('data-pegawai')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('data-pegawai')->with('error', 'Data tidak ditemukan.');
        }
    }
    


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Ruangan;
use App\Models\M_Data_Pegawai;


class Data_ruangan extends Controller
{
    function index()
    {
        $data_pegawai = M_Data_Pegawai::all();
        $data_ruangan = M_Data_Ruangan::all();

        return view('admin.data_ruangan', compact('data_ruangan', 'data_pegawai'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nm_ruangan' => 'required',
            'pegawai_id' => 'required',

        ]);

        M_Data_Ruangan::create([

            'nm_ruangan' => $request->nm_ruangan,
            'pegawai_id' => $request->pegawai_id,
        ]);
        return redirect('data-ruangan')->with('success', 'Data berhasil ditambahkan.');
    }


    public function update(Request $request, $id_ruangan)
    {
        $request->validate([
            'nm_ruangan' => 'required',
            'nm_pembimbing' => 'required',

        ]);

        $data_ruangan = M_Data_Ruangan::findOrFail($id_ruangan);
        $data_ruangan->update([

            'nm_ruangan' => $request->nm_ruangan,
            'nm_pembimbing' => $request->nm_pembimbing,
        ]);
        return redirect('data-ruangan')->with('success', 'Data berhasil ditambahkan.');
    }




    public function ruangan_destroy($id_ruangan)
    {
        $data_ruangan = M_Data_Ruangan::find($id_ruangan);

        if ($data_ruangan) {
            $data_ruangan->delete();
            return redirect('data-ruangan')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('data-ruangan')->with('error', 'Data tidak ditemukan.');
        }
    }
}

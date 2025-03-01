<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Profile;


class Data_profile extends Controller
{
    function index()
    {
        $data_profile = M_Data_Profile::all();

        return view('admin.data_profile',compact('data_profile'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);
    

        if ($request->hasFile(key: 'gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Simpan file di folder 'public/uploads'
    

            M_Data_Profile::create([
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename,
            ]);
    
            return redirect('data-profile')->with('success', 'Data berhasil ditambahkan.');
        }
    
        return redirect('data-profile')->with('error', 'Gagal mengunggah gambar.');
    }
    


    public function update(Request $request, $id_profile) {
        $request->validate([
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data_profile = M_Data_Profile::findOrFail($id_profile);
        $data_profile->deskripsi = $request->deskripsi;
    
        if ($request->hasFile('gambar')) {
            if ($data_profile->gambar && file_exists(public_path('uploads/' . $data_profile->gambar))) {
                unlink(public_path('uploads/' . $data_profile->gambar));
            }
    
            // Simpan gambar baru
            $file = $request->file('gambar');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $nama_file);
    
            $data_profile->gambar = $nama_file;
        }
    
        $data_profile->save();
    
        return redirect('data-profile')->with('success', 'Data berhasil diperbarui.');
    }
    



    public function profile_destroy($id_profile)
    {
         $data_profile  = M_Data_Profile::find($id_profile);
    
        if ( $data_profile ) {
             $data_profile ->delete();
            return redirect('data-profile')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('data-profile')->with('error', 'Data tidak ditemukan.');
        }
    }
    


}

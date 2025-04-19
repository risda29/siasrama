<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Santri;
use App\Models\M_Data_Tagihan;

class Data_tagihan_santri extends Controller
{
    public function index()
    {
        // $user = auth()->user();

        // if ($user->level === 'Santri') {
     
        //     $data_tagihan = M_Data_Tagihan::where('santri_id', $user->id)->get();
        // } else {
        //     $data_tagihan = M_Data_Tagihan::all();
        // }

        // // Kirim data ke view
        // return view('santri.data_tagihan_santri', compact('data_tagihan'));

        $user = auth()->user();

        if ($user->level === 'Santri') {
            // Cari santri ID berdasarkan user_id
            $santri = M_Data_Santri::where('user_id', $user->id)->first();
    
            // Kalau santri ditemukan, ambil data tagihannya
            if ($santri) {
                $data_tagihan = M_Data_Tagihan::where('santri_id', $santri->id_santri)->get();
            } else {
                $data_tagihan = collect(); // Kosongkan jika tidak ketemu
            }
    
            return view('santri.data_tagihan_santri', compact('data_tagihan'));
    
        } else {
            // Untuk admin atau kepala yayasan
            $data_tagihan = M_Data_Tagihan::all();
            $data_santri = M_Data_Santri::all();
    
            return view('admin.data_tagihan_admin', compact('data_tagihan', 'data_santri'));
    }

}
}


<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\M_Data_Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Tagihan;

class Data_tagihan_santri extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->level === 'Santri') {
     
            $data_tagihan = M_Data_Tagihan::where('santri_id', $user->id)->get();
        } else {
            $data_tagihan = M_Data_Tagihan::all();
        }

        // Kirim data ke view
        return view('santri.data_tagihan_santri', compact('data_tagihan', 'data_santri'));
    }
}


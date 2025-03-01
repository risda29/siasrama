<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\M_Data_Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Tagihan;


class Data_tagihan extends Controller
{
    public function index()
    {
        $data_tagihan = M_Data_Tagihan::all();
        $data_santri = M_Data_Santri::select('id_santri', 'nm_santri')->get(); // Ambil hanya kolom yang dibutuhkan
    
        return view('admin.data_tagihan', compact('data_tagihan', 'data_santri'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'bulan' => 'required',
        'tahun' => 'required',
        'jumlah' => 'required|numeric',
    ]);

    // Ambil semua santri dari database
    $santriList = M_Data_Santri::all();

    foreach ($santriList as $santri) {
        M_Data_Tagihan::create([
            'santri_id' => $santri->id_santri,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah,
            'tgl_jatuh_tempo' => $request->tahun . '-' . $request->bulan . '-10',
            'status' => 'belum_bayar', // Default status
        ]);
    }

    return redirect('data-tagihan')->with('success', 'Tagihan untuk semua santri berhasil ditambahkan.');
}



public function update(Request $request, $id_tagihan)
{
    // Validasi data yang dikirim dari form
    $request->validate([
        'bulan' => 'required',
        'tahun' => 'required|numeric',
        'santri_id' => 'required|exists:m_data_santri,id_santri',
        'jumlah' => 'required|numeric',
        'tgl_jatuh_tempo' => 'required|date',
    ]);

    // Cari tagihan berdasarkan ID
    $tagihan = M_Data_Tagihan::findOrFail($id_tagihan);

    // Update data tagihan
    $tagihan->update([
        'santri_id' => $request->santri_id,
        'bulan' => $request->bulan,
        'tahun' => $request->tahun,
        'jumlah' => $request->jumlah,
        'tgl_jatuh_tempo' => $request->tgl_jatuh_tempo,
    ]);

    return redirect('data-tagihan')->with('success', 'Data tagihan berhasil diperbarui.');
}





    public function tagihan_destroy($id_tagihan)
    {
       
    }
    


}
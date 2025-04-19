<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Tagihan extends Model
{
    use HasFactory;

    protected $table = 'data_tagihan';
    protected $primaryKey = 'id_tagihan';

    protected $fillable = [
        'santri_id',
        'bulan',
        'tahun',
        'jumlah',
        'status',
        'tgl_jatuh_tempo',
    ];

    public $timestamps = false;

    public function santri()
{
    return $this->belongsTo(M_Data_Santri::class, 'santri_id', 'id_santri');
}

}
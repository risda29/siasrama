<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Santri extends Model
{
    use HasFactory;

    protected $table = 'data_santri';
    protected $primaryKey = 'id_santri';
    protected $fillable = ['nm_santri', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'nama_ibu', 'nhp_ibu', 'nama_ayah', 'nhp_ayah', 'nama_wali', 'nhp_wali','email','nisn','user_id','ruangan_id',];

    public $timestamps = false;
}
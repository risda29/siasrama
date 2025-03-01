<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Pegawai extends Model
{
    use HasFactory;

    protected $table = 'data_pegawai';

    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['nama','nik','no_hp','alamat','jabatan', 'email', 'user_id'];

    public $timestamps = false;
}
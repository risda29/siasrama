<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Data_Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Sesuai tabel kamu tadi
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'username',
        'password',
        'email',
        'level',
        'pegawai_id',
        'santri_id',
    ];

    public $timestamps = false; // Kalau tabel gak ada created_at dan updated_at
}
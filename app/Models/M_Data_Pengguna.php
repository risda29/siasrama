<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Pengguna extends Model
{
    use HasFactory;

    protected $table = 'users';
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

    public $timestamps = false;
}
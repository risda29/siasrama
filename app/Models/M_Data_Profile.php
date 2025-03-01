<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Profile extends Model
{
    use HasFactory;

    protected $table = 'data_profile';
    protected $primaryKey= 'id_profile';

    protected $fillable = ['deskripsi','gambar'];

    public $timestamps = false;
}

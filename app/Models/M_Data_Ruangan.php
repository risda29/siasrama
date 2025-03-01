<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Ruangan extends Model
{
    use HasFactory;

    protected $table = 'data_ruangan';
    protected $primaryKey= 'id_ruangan';

    protected $fillable = ['nm_ruangan','nm_pembimbing'];

    public $timestamps = false;
}

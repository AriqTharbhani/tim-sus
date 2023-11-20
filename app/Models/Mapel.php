<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'ringkasan_mapel',
        'tingkatan_kelas'
    ];

}

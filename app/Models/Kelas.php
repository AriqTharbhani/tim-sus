<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\Handler\RedisPubSubHandler;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = [
        'kode_kelas',
        'tingkatan_kelas',
        'nama_kelas',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }
}

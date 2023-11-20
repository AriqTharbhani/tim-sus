<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    
    protected $fillable = [
        'user_id',
        'kelas_id',
        'nis',
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'nomor_hp',
        'nama_ayah',
        'nama_ibu',
        'status'
    ];
    protected $dates = ['tanggal_lahir'];

    public function user()
{
    return $this->belongsTo(User::class, 'id');
}

    public function kelas()
{
    return $this->belongsTo(Kelas::class, 'kelas_id');
}

}

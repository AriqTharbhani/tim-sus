<?php

namespace App\Models;

use App\Http\Controllers\admin\MapelController;
use App\Http\Controllers\admin\PersentaseNilaiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseNilai extends Model
{
    protected $table = 'persentase_nilai';

    protected $fillable = ['mapel_id', 'harian', 'pts', 'pas', 'pat'];

    public function mapel()
    {
        return $this->belongsTo(MapelController::class, 'id');
    }

    public function PersentaseNilai()
    {
        return $this->hasMany(PersentaseNilaiController::class, 'mapel_id');
    }
}

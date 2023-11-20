<?php

namespace App\Http\Controllers;

use App\Charts\StudentChart;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin(StudentChart $chart)
    {
        $jumlah_user = User::count();
        $jumlah_guru = Guru::count();
        $jumlah_siswa = Siswa::count();
        $jumlah_mapel = Mapel::count();
        $jumlah_kelas = Kelas::count();
        $sekolah = 'SMKN 11 BANDUNG';

        return view('dashboard.admin', [
            'jumlah_user' => $jumlah_user,
            'jumlah_guru' => $jumlah_guru,
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah_mapel' => $jumlah_mapel,
            'jumlah_kelas' => $jumlah_kelas,
            'sekolah' => $sekolah,
            'chart' => $chart,
        ]);
    }    

    public function indexGuru()
    {
        $sekolah = 'SMKN 11 Bandung';

        $user = auth()->user();
        $guru = $user->guru; 

    return view('dashboard.guru', [
        'sekolah' => $sekolah,
        'nip' => $guru->nip,
        'nama_lengkap' => $guru->nama_lengkap,
    ]);
    }

    public function indexSiswa()
{
    $sekolah = 'SMKN 11 Bandung';

    // Anggap Anda memiliki pengguna yang sudah login dan setiap pengguna terkait dengan catatan siswa
    $user = auth()->user();
    $siswa = $user->siswa; // Anggap hubungan satu-satu antara User dan Siswa

    return view('dashboard.siswa', [
        'sekolah' => $sekolah,
        'nis' => $siswa->nis,
        'nama_lengkap' => $siswa->nama_lengkap,
    ]);
}
}
<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;

class RedirectController extends Controller
{
    public function cek() {
        // Dapatkan status pengguna
        $status = auth()->user()->status;

        // Periksa status pengguna
        if ($status == 1) {
            // Status aktif, arahkan sesuai peran
            $role = auth()->user()->role;
            switch ($role) {
                case 1:
                    return redirect('/admin');
                case 2:
                    return redirect('/guru');
                case 3:
                    return redirect('/siswa');
                default:
                    return redirect('/unauthorized');
            }
        } else {
            // Status non-aktif, arahkan ke halaman login
            return redirect('/');
        }
    }
}
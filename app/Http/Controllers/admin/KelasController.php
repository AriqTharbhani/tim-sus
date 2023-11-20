<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function indexKelas()
{
    $title = 'Data kelas';
    $title_menu = 'Menu Data kelas';
    $data_kelas =  Kelas::orderBy('nama_kelas', 'ASC')->Simplepaginate(5);
    
    return view('admin.kelas.index', compact('title', 'title_menu', 'data_kelas'));
}

public function storeKelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required',
            'tingkatan_kelas' => 'required',
            'nama_kelas' => 'required|min:2|max:50',
            
        ]);
        if ($validator->fails()) {
            return redirect()->route('kelas.index')->withErrors($validator)->withInput();  
        } else {
            $kelas = new Kelas([
                'kode_kelas' => $request->kode_kelas,
                'tingkatan_kelas' => $request->tingkatan_kelas,
                'nama_kelas' => $request->nama_kelas,
               
            ]);
            $kelas->save();
            return redirect()->route('kelas.index')->with('success', 'Berhasil menambahkan data');
        }
    }
}

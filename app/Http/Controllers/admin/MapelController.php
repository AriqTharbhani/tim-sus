<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function indexMapel()
    {
        $title = 'Data Mapel';
        $title_menu = 'Menu Data Mapel';
        $data_mapel = Mapel::orderBy('nama_mapel', 'ASC')->Simplepaginate(5);
    
        return view('admin.mapel.index', compact('title', 'title_menu', 'data_mapel'));
    }

    public function storeMapel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required|min:3|max:255',
            'ringkasan_mapel' => 'required|min:2|max:50',
            'tingkatan_kelas' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('mapel.index')->withErrors($validator)->withInput();  
        } else {
            $mapel = new Mapel([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
                'ringkasan_mapel' => $request->ringkasan_mapel,
                'tingkatan_kelas' => $request->tingkatan_kelas,
            ]);
            $mapel->save();
            return redirect()->route('mapel.index')->with('success', 'Berhasil menambahkan data');
        }
    }

    public function updateMapel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required',
            'ringkasan_mapel' => 'required|min:2|max:50',
            'tingkatan_kelas' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('mapel.index')->withErrors($validator)->withInput(); 
        } else {
            Mapel::where('kode_mapel', $request->kode_mapel)
                ->update([
                    'ringkasan_mapel' => $request->ringkasan_mapel,
                    'tingkatan_kelas' => $request->tingkatan_kelas,
                ]);

            return back()->with('toast_success', 'Mata Pelajaran berhasil diupdate');
        }
    }
}

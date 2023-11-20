<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TapelController extends Controller
{
    public function indexTapel()
    {
    $title = 'Data Tapel';
    $title_menu = 'Menu Data Tahun Pelajaran';
    $data_tapel = Tapel::all();
    return view('admin.tapel.index', compact('title','title_menu','data_tapel'));
    }

    public function storeTapel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_pelajaran' => 'required|min:9|max:9',
            'semester' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('tapel.index')->withErrors($validator)->withInput();  
        } else {
            $tapel = new Tapel([
                'tahun_pelajaran' => $request->tahun_pelajaran,
                'semester' => $request->semester,
            ]);
            $tapel->save();
            Siswa::where('status', 1)->update(['kelas_id' => null]);
            return redirect()->route('tapel.index')->with('success', 'Berhasil menambahkan data');
        }
    }
}

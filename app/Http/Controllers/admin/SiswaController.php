<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function indexSiswa()
    {   
        $title = 'Data Siswa';
        $title_menu = 'Menu Data Siswa';
        $data_siswa = Siswa::orderBy('nis', 'ASC')->Simplepaginate(5);
        $data_kelas = Kelas::all();
        return view('admin.siswa.index', compact('title','title_menu','data_siswa','data_kelas'));
    }
    
    public function storeSiswa(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
            'nis' => 'required|numeric|digits_between:1,10|unique:siswa',
            'nisn' => 'nullable|numeric|digits:10',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'nullable|numeric|digits_between:11,13|unique:siswa',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('siswa.index')->withErrors($validator)->withInput();  
        } else {
            try {
                $user = new User([
                    'username' => ($request->username),
                    'password' => bcrypt('123456'),
                    'role' => 3,
                    'status' => true
                ]);
                $user->save();
            } catch (\Throwable $th) {
                return back('/siswa');
            }

            $siswa = new Siswa([
                'user_id' => $user->id,
                'kelas_id' => $request->kelas_id,
                'nis' => $request->nis,
                'nisn' => Siswa::pluck('nisn')->first(),
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'status' => 1,
            ]);
            $siswa->save();
            return redirect()->route('siswa.index')->with('success', 'Berhasil menambahkan data');
        }


}

    public function updateSiswa(Request $request, $id)
    {   
        $siswa = Siswa::findorfail($id);

        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:100',
            'jenis_kelamin' => 'required',
            'nis' => 'required|numeric|digits_between:1,10|unique:siswa,nis,' . $siswa->id,
            'nisn' => 'nullable|numeric|digits:10|unique:siswa,nisn',
            'tempat_lahir' => 'required|min:3|max:50',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required|min:3|max:255',
            'nomor_hp' => 'nullable|numeric|digits_between:11,13|unique:siswa,nomor_hp,' . $siswa->id,
            'nama_ayah' => 'required|min:3|max:100',
            'nama_ibu' => 'required|min:3|max:100',
        
        ]);
        if ($validator->fails()) {
            return redirect()->route('user.index')->withErrors($validator)->withInput();  
        } else {
            $data_siswa = [
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
        
            ];
            $siswa->update($data_siswa);
            return redirect()->route('siswa.index')->with('success', 'Berhasil menambahkan data');
        }
    }

    public function destroySiswa($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa');
    }

}

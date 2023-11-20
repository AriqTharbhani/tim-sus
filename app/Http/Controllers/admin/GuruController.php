<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function indexGuru()
    {
    $title = 'Data Guru';
    $title_menu = 'Menu Data Guru';
    $data_guru = Guru::orderBy('nama_lengkap', 'ASC')->Simplepaginate(5);

    return view('admin.guru.index', compact('title', 'title_menu', 'data_guru'));
    }

    public function storeGuru(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:100|unique:guru',
            'username' => 'required',
            'nip' => 'nullable|digits:18|unique:guru',
            'nuptk' => 'nullable|digits:16|unique:guru',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required|min:4|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->route('guru.index')->withErrors($validator)->withInput();  
        } else {
            try {
                $user = new User([
                    'username' => ($request->username),
                    'password' => bcrypt('123456'),
                    'role' => 2,
                    'status' => true
                ]);
                $user->save();
            } catch (\Throwable $th) {
                return back();
            }

            $guru = new Guru([
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'nip' => $request->nip,
                'nuptk' => $request->nuptk,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'status' => 1,
            ]);
            $guru->save();
            return redirect()->route('guru.index')->with('success', 'Berhasil menambahkan data');
        }
    }

    public function updateGuru(Request $request, $id)
    {
        $guru = Guru::findorfail($id);
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:100|unique:guru',
            'nip' => 'nullable|digits:18|unique:guru,nip,'. $guru->id,
            'nuptk' => 'nullable|digits:16',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required|min:4|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->route('guru.index')->withErrors($validator)->withInput();  
        } else {
            $guru = Guru::findorfail($id);
            $data_guru = [
                'nama_lengkap' => $request->nama_lengkap,
                'nip' => $request->nip,
                'nuptk' => $request->nuptk,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                
            ];

            if (!$guru->update($data_guru)) {
                dd($guru->getError());
            }
            return redirect()->route('guru.index')->with('success', 'Berhasil menambahkan data');
        }
    }
}



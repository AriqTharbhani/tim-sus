<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function indexUser()
    {
        $title = 'Data User';
        $title_menu = 'Menu Data User';
        $user = User::orderBy('role', 'ASC')->Simplepaginate(5);
        return view('admin.user.index', compact('title','title_menu','user'));
    }

    public function storeUser(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama_lengkap' => 'required|min:3|max:100',
        'username' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'email' => 'required|email|min:5|max:100|unique:admin',
        'nomor_hp' => 'required|numeric|digits_between:11,13|unique:admin',
    ]);

    if ($validator->fails()) {
        return redirect()->route('user.index')->withErrors($validator)->withInput();  
    } else {
        $user = new User([
            'username' => ($request->username),
            'password' => bcrypt('123456'),
            'role' => 1,
            'status' => true
        ]);
        $user->save();

        $admin = new Admin([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'status' => 1,
        ]);
        $admin->save();
        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data');
    }
}
        public function updateUser(Request $request, $id)
    {
        $user = User::findorfail($id);
        if (is_null($request->password)) {
            $data = [
                'status' => $request->status
            ];
        } else {
            $data = [
                'password' => bcrypt($request->password),
                'status' => $request->status
            ];
        }
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data');
    }

    
}
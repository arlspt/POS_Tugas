<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index($userId, $nameUser) {
    //     return view('user.index', [
    //         "id" => $userId,
    //         "name" => $nameUser
    //     ]);
    // }


    // Tambah data user dengan Eloquement Model
    /*$data = [
            'level_id' => 3,
            'user_id' => 4,
            'username' => 'customer-1',
            'nama' => 'pelanggan',
            'password' => Hash::make('12345'),
        ];
        UserModel::insert($data);*/

    // Modifikasi
    // $data = [
    //     'nama' => 'Pelanggaran Pertama'
    // ];
    // UserModel::where('username', 'customer-1')->update($data); // Update data user

    // Modifikasi Joobshet Pertemuan 4 - Praktikunm 1
    // $data = [
    //     'user_id' => 5, // agar user_id pada table terisi semua
    //     'level_id' => 2,
    //     'username' => 'manager_tiga',
    //     'nama' => 'Manager 3',
    //     'password' => Hash::make('12345'),
    // ];
    // UserModel::create($data);

    // Coba akses model UserModel
    /*$user = UserModel::findOr(20, ['username', 'nama'], function () {
            abort(404);
        }); // Ambil semua data dari tabel m_user
        return view('level/index', ['data' => $user]);*/

    // Praktikum 2.2
    // $user = UserModel::where('username', 'manager9')->findOrFail();
    // return view('level/index', ['data' => $user]);
    // Praktikum 2.3
    // $user = UserModel::where('level_id', 2)->count();
    // return view('level/index', ['data' => $user]);

    // $user = UserModel::firstOrNew(
    //     [
    //         'username' => 'manager33',
    //         'nama' => 'Manager Tiga Tiga',
    //     ],
    // );
    //$user->save();


    // Praktikum 2.5

    //     [
    //         'username' => 'manager11',
    //         'nama' => 'Manager11',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );

    // $user->username = 'manager12';

    // $user->save(); //save

    // $user->wasChanged(); //true
    // $user->wasChanged('username'); //true
    // $user->wasChanged(['username', 'level_id']); //false
    // $user->wasChanged('nama'); //false
    // //$user->wasChanged(['nama', 'username']); //true

    // dd($user->wasChanged(['nama', 'username'])); //true

    // $user->isClean(); //false
    // $user->isClean('username'); //false
    // $user->isClean('nama'); //true
    // $user->isClean(['nama', 'username']); //false

    // $user->isDirty(); //false
    // $user->isClean(); //true

    public function index()
    {
        $user = UserModel::with('level')->get();
        return view('level/index', ['data' => $user]);
    }
    public function tambah()
    {
        return view('level.user_tambah');
    }
    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return view('level.user_tambah');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('level.user_ubah', ['data' => $user]);
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return view('level.user_tambah');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
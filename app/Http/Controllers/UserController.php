<?php

namespace App\Http\Controllers;

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

    public function index()
    {
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
        $data = [
            'user_id' => 5, // agar user_id pada table terisi semua
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345'),
        ];
        UserModel::create($data);

        // Coba akses model UserModel
        $user = UserModel::all(); // Ambil semua data dari tabel m_user
        return view('level/index', ['data' => $user]);
    }
}

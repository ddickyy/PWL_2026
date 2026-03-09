<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($id, $name)
    {
        return view('user.profile', compact('id', 'name'));
    }

    public function index()
    {

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22', // Kondisi untuk mencari data
        //         'nama' => 'Manager Dua Dua', // Data yang akan dibuat jika data tidak ditemukan
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );
        

        $user = UserModel::firstOrNew(
            [
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ]
        );
        $user->save();
        return view('user', ['data' => $user]);

        // // Tambah data pengguna baru dengan Eloquent ORM
        // $data = [
        //     'nama' => 'Pelanggan Pertama'
        // ];
        // UserModel::where('username', 'customer-1')->update($data); // Menambahkan data pengguna baru ke tabel m_user


        // $data= [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);

        // Mengambil semua data pengguna
        // $user = UserModel::all(); // Mengambil semua data pengguna dari tabel m_user
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 2)->count();
        // // Mengambil data pengguna dengan ID 1 dari tabel m_user
        // return view('user', ['data' => $user]);
    }
}

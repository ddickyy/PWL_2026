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
        // // Tambah data pengguna baru dengan Eloquent ORM
        // $data = [
        //     'nama' => 'Pelanggan Pertama'
        // ];
        // UserModel::where('username', 'customer-1')->update($data); // Menambahkan data pengguna baru ke tabel m_user


        $data= [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345'),
        ];
        UserModel::create($data);

        // Mengambil semua data pengguna
        $user = UserModel::all(); // Mengambil semua data pengguna dari tabel m_user
        return view('user', ['data' => $user]);
    }
}

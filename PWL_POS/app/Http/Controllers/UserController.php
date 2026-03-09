<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function profile($id, $name)
    {
        return view('user.profile', compact('id', 'name'));
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager22', // Kondisi untuk mencari data
    //         'nama' => 'Manager Dua Dua', // Data yang akan dibuat jika data tidak ditemukan
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );


    // $user = UserModel::firstOrNew(
    //     [
    //         'username' => 'manager33',
    //         'nama' => 'Manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]
    // );
    // $user->save();

    // $user = UserModel::create([
    //     'username' => 'manager44',
    //     'nama' => 'Manager44',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2
    // ]);

    // $user -> username = 'manager45';
    // $user -> isDirty(); // Memeriksa apakah ada perubahan pada atribut model
    // $user -> isDirty('username'); // Memeriksa apakah atribut 'username' telah diubah
    // $user -> isDirty('nama'); // Memeriksa apakah atribut 'nama' telah diubah
    // $user -> isDirty('nama', 'username'); // Memeriksa apakah atribut 'nama' atau 'username' telah diubah

    // $user -> isClean(); // false
    // $user -> isClean('username'); // false
    // $user -> isClean('nama'); // true
    // $user -> isClean('nama', 'username'); // false

    // $user -> save(); // Menyimpan perubahan pada model ke database

    // $user -> isDirty(); // false
    // $user -> isClean(); // true
    // dd($user->isDirty());

    // $user = UserModel::create([
    //     'username' => 'manager11',
    //     'nama' => 'Manager11',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2
    // ]);

    // $user -> username = 'manager12';

    // $user -> save(); // Menyimpan perubahan pada model ke database

    // $user -> wasChanged(); // true
    // $user -> wasChanged('username'); // Memeriksa apakah atribut 'username' telah diubah
    // $user -> wasChanged(['username','level_id']); // Memeriksa apakah atribut 'nama' telah diubah
    // $user -> wasChanged('nama'); // Memeriksa apakah atribut 'nama' telah diubah
    // $user -> wasChanged(['nama', 'username']); // true
    // dd($user->wasChanged(['nama', 'username']));// true

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

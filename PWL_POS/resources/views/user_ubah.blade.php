<html>
<title>Ubah User</title>

<body>
    <h1>Form Ubah Data User</h1>
    <a href="{{ url('/user') }}">Kembali</a>
    <br><br>

    <form method="post" action="{{ url('/user/ubah_simpan/' . $data->user_id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label>Username:</label>
        <input type="text" name="username" value="{{ $data->username }}" placeholder="Masukkan Username">
        <br>
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $data->nama }}" placeholder="Masukkan Nama">
        <br>
        <label>Password:</label>
        <input type="password" name="password" value="{{ $data->password }}" placeholder="Masukkan Password">
        <br>
        <label>Level ID:</label>
        <input type="text" name="level_id" value="{{ $data->level_id }}" placeholder="Masukkan ID Level">
        <br><br>
        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html>
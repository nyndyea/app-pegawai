<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE POSITIONS</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <h1 class="mb-4">Tambah Jabatan</h1>

            <form action="{{ route('positions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan"
                        placeholder="Masukkan nama jabatan" required>
                </div>
                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" id="gaji_pokok"
                        placeholder="Masukkan gaji pokok" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    @endsection


</body>

</html>
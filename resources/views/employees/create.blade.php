<!DOCTYPE html>
<html>

<head>
    <title>Form Input Pegawai</title>
</head>

<body>
    @extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Pegawai Baru</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">Departemen</label>
            <select name="department_id" class="form-select" required>
                <option value="">-- Pilih Departemen --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->nama_departemen }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="position_id" class="form-label">Jabatan</label>
            <select name="position_id" class="form-select" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

</body>
</html>
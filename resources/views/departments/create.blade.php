<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE DEPARTMENTS</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Tambah Departemen Baru</h2>

    {{-- Tombol kembali --}}
    <div class="mb-3">
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Waduh!</strong> Ada kesalahan nih saat mengisi form 😥<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah departemen --}}
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_departemen" class="form-label">Nama Departemen</label>
            <input type="text" name="nama_departemen" id="nama_departemen"
                   value="{{ old('nama_departemen') }}"
                   class="form-control @error('nama_departemen') is-invalid @enderror"
                   placeholder="Masukkan nama departemen...">

            @error('nama_departemen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection

</body>
</html>
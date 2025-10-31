?<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX DEPARTMENTS</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Jabatan</h1>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" value="{{ $position->nama_jabatan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
    
</body>
</html>
<!DOCTYPE html>
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
    <h2 class="mb-4 text-center">Daftar Departemen</h2>

    {{-- Tombol tambah departemen --}}
    <div class="mb-3 text-end">
        <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Tambah Departemen</a>
    </div>

    {{-- Notifikasi sukses --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    {{-- Tabel daftar departemen --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $department->nama_departemen }}</td>
                    <td class="text-center">
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus departemen ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada departemen yang terdaftar 💨</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $departments->links() }}
    </div>
</div>
@endsection

    
    
</body>
</html>
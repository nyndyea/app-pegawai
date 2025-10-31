<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX POSITIONS</title>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Daftar Jabatan') {{-- Menambahkan Title --}}

    @section('content')
        <div class="container mt-5">
            <h2 class="mb-4">Daftar Jabatan</h2> {{-- Diubah dari h1 ke h2 --}}
<div class="text-end">
            <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">+ Tambah Jabatan</a>
</div>

            @if(session('success'))
                {{-- Alert dibuat konsisten (dismissible) --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Ditambahkan div.table-responsive --}}
            <div class="table-responsive">
                {{-- Mengganti table-striped menjadi table-hover --}}
                <table class="table table-bordered table-hover">
                    <thead class="table-dark"> {{-- Menambahkan class table-dark --}}
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($positions as $index => $position)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $position->id }}</td>
                                <td>{{ $position->nama_jabatan }}</td>
                                <td>
                                    <a href="{{ route('positions.edit', $position->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    {{-- Mengganti style="..." menjadi class="d-inline" --}}
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada jabatan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Menambahkan link Paginasi, asumsi $positions di-paginate di Controller --}}
            <div class="d-flex justify-content-center">
                @if (method_exists($positions, 'links'))
                    {{ $positions->links() }}
                @endif
            </div>

        </div>
    @endsection


</body>

</html>
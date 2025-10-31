<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    @extends('layouts.app')

@section('title', 'Daftar Pegawai') {{-- Menambahkan Judul Halaman --}}

@section('content')
    {{-- MODIFIKASI: Tambahkan class 'mt-5' agar margin atasnya sama --}}
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Pegawai</h2> {{-- mb-4 agar konsisten --}}
        
        <div class="text-end">
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">+ Tambah Pegawai</a>
        </div>

        {{-- MODIFIKASI: Tambahkan alert sukses yang bisa ditutup --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- MODIFIKASI: Bungkus tabel agar responsive --}}
        <div class="table-responsive">
            {{-- MODIFIKASI: Ganti table-striped menjadi table-hover --}}
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        {{-- 
                          Menggunakan $page dari paginator untuk nomor urut.
                          Jika $employees tidak di-paginate, ganti ini kembali ke $index + 1
                          dan hapus $employees->links() di bawah.
                        --}}
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- 
                      MODIFIKASI: Menggunakan paginator's firstItem() untuk penomoran
                      Ini mengasumsikan Anda menggunakan ->paginate() di Controller
                    --}}
                    @forelse ($employees as $index => $employee)
                        <tr>
                            <td>{{ $employees->firstItem() + $index }}</td>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            {{-- Gunakan null-safe operator (??) untuk relasi --}}
                            <td>{{ $employee->department->nama_departemen ?? '-' }}</td>
                            <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                {{-- MODIFIKASI: Ganti 'style' dengan class 'd-inline' --}}
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus pegawai ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data pegawai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MODIFIKASI: Tambahkan link Paginasi --}}
        <div class="d-flex justify-content-center">
            {{ $employees->links() }}
        </div>

    </div>
@endsection


</body>

</html>
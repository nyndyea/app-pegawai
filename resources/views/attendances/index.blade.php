<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX DEPARTMENTS</title>
</head>
<body>
    @extends('layouts.app')
    @section('title', 'Daftar Absensi')
    @section('content')
        <div class="container mt-5">
            <h2 class="mb-4">Daftar Absensi</h2>
<div class="text-end">
            <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">+ Tambah Absensi</a>
</div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $index => $attendance)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $attendance->employee->nama_lengkap ?? '-' }}</td>
                            <td>{{ $attendance->tanggal }}</td>
                            <td>{{ $attendance->status_absensi }}</td>
                            <td>{{ $attendance->jam_masuk ?? '-' }}</td>
                            <td>{{ $attendance->jam_keluar ?? '-' }}</td>
                            <td>
                                <a href="{{ route('attendances.edit', $attendance->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $attendances->links() }}
        </div>
    @endsection




</body>

</html>
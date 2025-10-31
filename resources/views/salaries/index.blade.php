<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX SALARIES</title>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Daftar Gaji Pegawai')

    @section('content')
        <div class="container mt-5">
            <h2 class="mb-4">Daftar Gaji Pegawai</h2>
            <div class="text-end">
                <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">+ Tambah Data Gaji</a>

            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Periode</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total Gaji (Net)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $salary)
                            <tr>
                                <td>{{ $salary->employee->nama_lengkap ?? 'Pegawai Dihapus' }}</td>
                                <td>{{ $salary->bulan }} {{ $salary->tahun }}</td>
                                {{-- Format angka sebagai mata uang Indonesia --}}
                                <td>Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                                <td>Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                                <td>Rp {{ number_format($salary->potongan, 2, ',', '.') }}</td>
                                <td><strong>Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</strong></td>
                                <td>
                                    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data gaji ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data gaji.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Link Paginasi --}}
            <div class="d-flex justify-content-center">
                {{ $salaries->links() }}
            </div>

        </div>
    @endsection


</body>

</html>
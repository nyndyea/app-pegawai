<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT ATTENDANCE</title>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Edit Absensi')

    @section('content')
        <div class="container mt-5">
            <h2 class="mb-4">Edit Absensi</h2>

            <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="employee_id" class="form-label">Pegawai</label>
                    <select name="employee_id" id="employee_id" class="form-select" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $employee->id == $attendance->employee_id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $attendance->tanggal }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="status_absensi" class="form-label">Status Kehadiran</label>
                    <select name="status_absensi" id="status_absensi" class="form-select" required>
                        <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jam_masuk" class="form-label">Jam Masuk</label>
                    <input type="time" name="jam_masuk" id="jam_masuk" class="form-control"
                        value="{{ $attendance->jam_masuk }}">
                </div>

                <div class="mb-3">
                    <label for="jam_keluar" class="form-label">Jam Keluar</label>
                    <input type="time" name="jam_keluar" id="jam_keluar" class="form-control"
                        value="{{ $attendance->jam_keluar }}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    @endsection

</body>

</html>
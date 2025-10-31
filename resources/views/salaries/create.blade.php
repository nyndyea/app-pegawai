<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE SALARIES</title>
</head>

<body>
    @extends('layouts.app')

@section('title', 'Tambah Data Gaji')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Gaji Baru</h2>

    {{-- Menampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf

        <div class="row">
            {{-- Kolom Kiri --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Pegawai</label>
                    <select name="employee_id" id="employee_id" class="form-select @error('employee_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Pegawai --</option>
                        {{-- Asumsi $employees dikirim dari SalaryController@create --}}
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-7 mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select name="bulan" id="bulan" class="form-select @error('bulan') is-invalid @enderror" required>
                            <option value="">-- Pilih Bulan --</option>
                            @php $bulanLama = old('bulan'); @endphp
                            <option value="Januari" {{ $bulanLama == 'Januari' ? 'selected' : '' }}>Januari</option>
                            <option value="Februari" {{ $bulanLama == 'Februari' ? 'selected' : '' }}>Februari</option>
                            <option value="Maret" {{ $bulanLama == 'Maret' ? 'selected' : '' }}>Maret</option>
                            <option value="April" {{ $bulanLama == 'April' ? 'selected' : '' }}>April</option>
                            <option value="Mei" {{ $bulanLama == 'Mei' ? 'selected' : '' }}>Mei</option>
                            <option value="Juni" {{ $bulanLama == 'Juni' ? 'selected' : '' }}>Juni</option>
                            <option value="Juli" {{ $bulanLama == 'Juli' ? 'selected' : '' }}>Juli</option>
                            <option value="Agustus" {{ $bulanLama == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                            <option value="September" {{ $bulanLama == 'September' ? 'selected' : '' }}>September</option>
                            <option value="Oktober" {{ $bulanLama == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                            <option value="November" {{ $bulanLama == 'November' ? 'selected' : '' }}>November</option>
                            <option value="Desember" {{ $bulanLama == 'Desember' ? 'selected' : '' }}>Desember</option>
                        </select>
                         @error('bulan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        {{-- Mengisi tahun sekarang sebagai default --}}
                        <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" 
                               value="{{ old('tahun', date('Y')) }}" placeholder="Contoh: 2025" required>
                         @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" 
                               value="{{ old('gaji_pokok', 0) }}" placeholder="Contoh: 5000000" step="0.01" required>
                    </div>
                    @error('gaji_pokok') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan (Opsional)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="tunjangan" id="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" 
                               value="{{ old('tunjangan', 0) }}" placeholder="Contoh: 500000" step="0.01">
                    </div>
                     @error('tunjangan') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan (Opsional)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="potongan" id="potongan" class="form-control @error('potongan') is-invalid @enderror" 
                               value="{{ old('potongan', 0) }}" placeholder="Contoh: 100000" step="0.01">
                    </div>
                    @error('potongan') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="total_gaji" class="form-label">Total Gaji (Net)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        {{-- MODIFIKASI: Tambahkan 'readonly' --}}
                        <input type="number" name="total_gaji" id="total_gaji" class="form-control @error('total_gaji') is-invalid @enderror" 
                               value="{{ old('total_gaji', 0) }}" placeholder="Akan terisi otomatis" step="0.01" required readonly>
                    </div>
                    <small class="form-text text-muted">Total Gaji akan dihitung otomatis.</small>
                    @error('total_gaji') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
    // Menjalankan script setelah halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Ambil elemen-elemen input
        const gajiPokokEl = document.getElementById('gaji_pokok');
        const tunjanganEl = document.getElementById('tunjangan');
        const potonganEl = document.getElementById('potongan');
        const totalGajiEl = document.getElementById('total_gaji');

        // 2. Buat fungsi untuk menghitung
        function hitungTotalGaji() {
            // Ambil nilai, ubah ke angka. Jika kosong/NaN, anggap 0
            const gajiPokok = parseFloat(gajiPokokEl.value) || 0;
            const tunjangan = parseFloat(tunjanganEl.value) || 0;
            const potongan = parseFloat(potonganEl.value) || 0;

            // 3. Lakukan perhitungan
            const total = gajiPokok + tunjangan - potongan;

            // 4. Masukkan hasil ke input total_gaji
            // .toFixed(2) untuk 2 angka di belakang koma (uang)
            totalGajiEl.value = total.toFixed(2);
        }

        // 5. Panggil fungsi 'hitungTotalGaji' setiap kali ada input
        gajiPokokEl.addEventListener('input', hitungTotalGaji);
        tunjanganEl.addEventListener('input', hitungTotalGaji);
        potonganEl.addEventListener('input', hitungTotalGaji);

        // 6. Panggil juga saat halaman pertama kali dimuat (untuk 'old' value)
        hitungTotalGaji();

    });
</script>
@endsection


</body>

</html>
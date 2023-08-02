@extends('layouts.main')

@section('container')
    <h1>Laporan Per Hari</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nama menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jumlah</th>
                <th>Total</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @php
                $totalPendapatan = 0; // Inisialisasi total pendapatan
                $prevNama = null; // Inisialisasi variabel untuk menyimpan nama sebelumnya
            @endphp

            @foreach($laporan as $index => $item)
                @if ($prevNama === null || $item->nama !== $prevNama) <!-- Tambahkan kondisi untuk membandingkan nama -->
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $stokMenu[$item->nama]}}</td>
                        <td>{{ $totalJumlahPerMenuTanggal[$item->nama] }}</td> <!-- Tampilkan jumlah per menu -->
                        <td>{{ $totalPerMenuTanggal[$item->nama] }}</td>
                    </tr>
                @endif

                @php
                    $prevNama = $item->nama; // Simpan nama saat ini sebagai nama sebelumnya untuk iterasi selanjutnya
                    $totalPendapatan += $item->total; // Tambahkan total pendapatan
                @endphp
            @endforeach
        </tbody>
    </table>
    <div class="total-pendapatan">
        <h2>Total Pendapatan: {{ $totalPendapatan }}</h2>
    </div>
@endsection

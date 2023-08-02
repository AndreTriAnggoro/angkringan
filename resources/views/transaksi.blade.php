@extends('layouts.main')

@section('container')

<h1 class="text-center mb-4 mt-4 overflow-y-auto">Transaksi</h1>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">Waktu Pemesanan</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">Total Keseluruhan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $groupedData)
                @php
                    $firstTransaction = $groupedData->first();
                @endphp
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $firstTransaction->created_at }}</td>
                    <td>{{ $firstTransaction->no_meja }}</td>
                    <td>{{ $firstTransaction->total_keseluruhan }}</td>
                    <td>
                        <a href="{{ route('print.nota', $firstTransaction->created_at) }}" target="_blank" class="btn btn-primary">Print Nota</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
</div>
@endsection

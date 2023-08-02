@extends('layouts.main2')

@section('container')

<h1 class="text-center mb-4 mt-4">Laporan</h1>

<form action="/laporan/generate/owner" method="post">
    @csrf
    <div class="form-group">
        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" name="created_at" id="tanggal" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Generate Laporan</button>
</form>


@endsection
@extends('layouts.main')

@section('container')
<h1 class="text-center mb-5">edit menu</h1>
    <div class="row justify-content-center">
        <div class="col-8">
        <div class="card">
            <div class="card-body">
            <form action="/updatedata/{{ $data->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama menu</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $data->nama }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror  
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ $data->harga }}">
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ $data->stok }}">
                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="gambar">
                </div>
                <div class="mb-3">
                    <label for="current-gambar" class="form-label">Gambar Saat Ini</label>
                    <img src="{{ asset('gambarmenu/' . $data->gambar) }}" alt="Gambar Saat Ini" width="200">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>
        </div>
        
    </div>

</div>

@endsection
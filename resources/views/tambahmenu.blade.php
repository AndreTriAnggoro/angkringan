@extends('layouts.main')

@section('container')
<h1 class="text-center mb-5">tambah menu</h1>



    <div class="row justify-content-center">
        <div class="col-8">
        <div class="card">
            <div class="card-body">
            <form action="insertmenu" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama menu</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" required value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror   
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" required value="{{ old('gambar') }}">
                    @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror   
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">harga</label>
                    <input type="integer" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" required value="{{ old('harga') }}">
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">stok</label>
                    <input type="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" required value="{{ old('stok') }}">
                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        </div>
    

</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('a[data-confirm]').click(function(event) {
            event.preventDefault();
            var message = $(this).data('confirm');
            if (confirm(message)) {
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>

@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4 mt-4">Data Menu</h1>

    <a href="/tambahmenu" class="btn btn-success mb-3" role="button">Tambah</a>
    
    <div class="row">
        @foreach ($data as $row)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('gambarmenu/'. $row->gambar) }}" class="card-img-top" alt="Gambar Menu" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->nama }}</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Harga</td>
                                    <td>{{ $row->harga }}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>{{ $row->stok }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="/delete/{{ $row->id }}" class="btn btn-danger mr-2" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info ml-2">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

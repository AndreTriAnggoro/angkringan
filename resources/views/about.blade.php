<style>
    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px !important;
        height: 520px;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        background-color: white;
        display: none;
        z-index: 9999;
    }
    .card {
        position: relative;
        z-index: 1;
        pointer-events: auto; /* Tambahkan baris ini */
    }
    .menu-card {
    position: relative;
    z-index: 1;
    }
</style>

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
<script>
    $(document).ready(function() {
        @if ($errors->has('Pesanan melebihi stok'))
            var errorMessage = '{{ $errors->first('Pesanan melebihi stok') }}';
            alert('Error: ' + errorMessage);
        @endif
    });
</script>
<script>
    // Fungsi untuk menghapus item dari keranjang
    function hapusItem(index) {
        $.ajax({
            url: '/delete-keranjang/' + index,
            type: 'DELETE',
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    }
</script>
<script>
    function hitungTotal() {
        var jumlah = document.getElementById("jumlah").value;
        var isValidNumber = /^\d+$/.test(jumlah);

        if (!isValidNumber) {
            alert("Jumlah harus berupa angka.");
            document.getElementById("jumlah").value = "";
        }

        var jumlah = parseInt(document.getElementById("jumlah").value);
        var harga = parseFloat(document.getElementById("harga").value);
        var total = jumlah * harga;
        var inputTotal = document.getElementById("total");
        inputTotal.value = isNaN(total) ? "" : total;
    }
    function showPopup() {
        var popup = document.getElementById("popup");
        var namaMenu = event.target.getAttribute("data-nama");
        var harga = event.target.getAttribute("data-harga");
        var inputHarga = document.getElementById("harga");
        var inputNama = document.getElementById("nama");
        var inputTotal = document.getElementById("total");

        inputNama.value = namaMenu;
        inputHarga.value = harga;
        inputTotal.value = "";
        popup.style.display = "block";
    }

    function hidePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
    }

    function updateJumlah(row) {
    var jumlah = parseInt(row.querySelector('.input-jumlah').value);
    row.querySelector('input[name="jumlah[]"]').value = jumlah;
    var harga = parseFloat(row.querySelector('.cell-harga input').value);
    var total = jumlah * harga;
    row.querySelector('.cell-total span').textContent = total.toFixed(2);
    row.querySelector('.cell-total input').value = total.toFixed(2);
    hitungTotalKeseluruhan();
}
    function updateNomeja(row) {
    var no_meja = parseInt(row.querySelector('.input-no_meja').value);
    row.querySelector('input[name="no_meja[]"]').value = no_meja;
}

function tambahKeKeranjang() {
    var nama = document.getElementById("nama").value;
    var harga = parseFloat(document.getElementById("harga").value);
    var jumlah = parseInt(document.getElementById("jumlah").value);
    var total = parseFloat((jumlah * harga).toFixed(2));
    var no_meja = parseInt(document.getElementById("no_meja").value);

    // Buat elemen baru untuk menampilkan item di keranjang
    var row = document.createElement("tr");
    row.innerHTML = `
        <td>
            <input type="hidden" name="nama[]" value="${nama}">
            ${nama}
        </td>
        <td>
            <input type="hidden" name="jumlah[]" value="${jumlah}">
            <input type="number" class="input-jumlah" value="${jumlah}" min="1" oninput="updateJumlah(this.parentNode.parentNode)">
        </td>
        <td class="cell-harga">
            <input type="hidden" name="harga[]" value="${harga}">
            ${harga}
        </td>
        <td class="cell-total">
            <input type="hidden" name="total[]" value="${total}">
            <span>${total.toFixed(2)}</span>
        </td>
        <td>
            <input type="hidden" name="no_meja[]" value="${no_meja}">
            <input type="integer" class="input-no_meja" value="${no_meja}" oninput="updateNomeja(this.parentNode.parentNode)">
        </td>
    `;

    // Tambahkan row ke dalam tbody keranjang-items
    document.getElementById("keranjang-items").appendChild(row);

    // Hitung total keseluruhan
    hitungTotalKeseluruhan();

    // Kosongkan input jumlah dan total
    document.getElementById("jumlah").value = "";
    document.getElementById("total").value = "";
    document.getElementById("no_meja").value = "";

    // Sembunyikan popup
    hidePopup();

    // Tampilkan keranjang
    document.getElementById("keranjang").style.display = "block";
}

function hitungTotalKeseluruhan() {
    var totalKeseluruhan = 0;
    var rows = document.getElementById("keranjang-items").getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        var jumlah = parseInt(rows[i].querySelector('.input-jumlah').value);
        var harga = parseFloat(rows[i].querySelector('.cell-harga input').value);
        var total = jumlah * harga;
        totalKeseluruhan += total;
    }

    // Tampilkan total keseluruhan
    document.getElementById("total-keseluruhan").textContent = totalKeseluruhan.toFixed(2);
}


</script>

@extends('layouts.main')

@section('container')


<h1 class="text-center mb-4 mt-4">Data Menu</h1>
    <div class="row">
    <div id="popup" class="popup">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">nama menu</label>
                                    <input type="text" name="nama" class="form-control" id="nama" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">harga</label>
                                    <input type="decimal" name="harga" class="form-control" id="harga" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">jumlah</label>
                                    <input type="decimal" name="jumlah" class="form-control" id="jumlah" required min="1" oninput="hitungTotal()">
                                </div>
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="decimal" name="total" class="form-control" id="total" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="no_meja" class="form-label">No. Meja</label>
                                    <input type="text" name="no_meja[]" class="form-control" id="no_meja" required>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="tambahKeKeranjang()">Oke</button>
                                <!-- <button type="submit" class="btn btn-primary" >Oke</button> -->
                                <button type="button" class="btn btn-danger" onclick="hidePopup()" >cancel</button>
                            </form>
                            </div>
        @foreach ($data as $row)
        <div class="col-md-4 mb-3">
                <div class="card menu-card">
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
                        <button onclick="showPopup(event)" class="btn btn-success" data-nama="{{ $row->nama }}" data-harga="{{ $row->harga }}" data-total="{{ $row->total }}">Pesan</button>
                            
                            <!-- <div id="popup" class="popup">
                                <img src="{{ asset('gambarmenu/'. $row->gambar) }}" alt="" style="width:60px">
                                <p> Jumlah </p>
                                <input type="number" name="jumlahpesan">
                                <button onclick="hidePopup()">Batal</button>
                                <button onclick="hidePopup()">Pesan</button> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="/simpan-keranjang" method="post" enctype="multipart/form-data">
            @csrf
                    <div id="keranjang" style="display: none;">
                <h2>Keranjang</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">nama</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">harga</th>
                            <th scope="col">total</th>
                            <th scope="col">no_meja</th>
                        </tr>
                    </thead>
                    <tbody id="keranjang-items">
                    @foreach ($keranjang as $index => $item)
                        <tr>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['jumlah'] }}</td>
                            <td>{{ $item['harga'] }}</td>
                            <td>{{ $item['total'] }}</td>
                            <td>{{ $item['no_meja'] }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total Keseluruhan</td>
                            <td id="total-keseluruhan"></td>
                        </tr>
                    </tfoot>
                </table>
                <button type="submit" class="btn btn-primary" >Oke</button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
    </div>
<style>
  .owner {
    margin-top: 30px;
    margin-left: 780px;
  }
  .isi {
    margin-top: 7px;
    border-radius: 10px;
    height: 100vh;
    background-color: rgb(211, 211, 211);
  }
  .isiisi {
  display: flex;
  height: 100vh;
  flex-direction: column;
  align-items: center;
  
  margin-top: 30px;
  border-radius: 10px;
  background-color: rgb(227, 227, 227);
}
.isiisi h2 {
  margin-top: 50px;
}



  .judul {
    margin-top: 30px;
    display: flex;
    align-items: center;
    background-color: #d3d3d3;
    height: 33px;
    border-radius: 5px;
  }
  .judul .dashboard {
    margin-left: 5px;
  }
  .daftar-menu {
    margin-top: 20px;
    width: 100%;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
  }

  th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  /* CSS for the other elements */
  .isiisi {
    padding: 30px;
    text-align: center;
  }

  .isiisi h2 {
    margin-bottom: 20px;
    color: #333;
  }

  ul {
    margin-bottom: 10px;
    color: #555;
  }
  .proses-btn {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .proses-btn:hover {
    background-color: #45a049;
  }
  .sedang-diproses {
  background-color: yellow;
  color: black;
}

.sedang-diproses:hover {
  background-color: #2180cf;
}
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const prosesBtns = document.querySelectorAll(".proses-btn");

    prosesBtns.forEach((btn) => {
      btn.addEventListener("click", function() {
        if (btn.classList.contains("sedang-diproses")) {
          btn.classList.remove("sedang-diproses");
          btn.style.backgroundColor = "#4CAF50";
          btn.innerText = "Proses";
        } else {
          btn.classList.add("sedang-diproses");
          btn.style.backgroundColor = "#2180cf";
          btn.innerText = "Selesai";
        }
      });
    });
  });
</script>

@extends('layouts.main3')

@section('container')
<style>
  /* Your existing CSS styles here */
</style>

<div class="judul"></div>
<div class="isiisi">
    <h2>Selamat Datang</h2>


    <div class="daftar-menu">
      <div class="item">
        <table>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jumlah</th>
              <th>No Meja</th>
              <th>Harga</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($keranjangs as $keranjang)
            <tr>
              <td>{{ $keranjang->nama }}</td>
              <td>{{ $keranjang->jumlah }}</td>
              <td>{{ $keranjang->no_meja }}</td>
              <td>{{ $keranjang->harga }}</td>
              <td>{{ $keranjang->total }}</td>
              <td>
                <button class="proses-btn">Proses</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

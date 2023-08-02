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
</style>

@extends('layouts.main2')

@section('container')
  <h5 class="owner"><i class="bi bi-person-circle"></i> Owner</h5>
  <div class="judul">
  <h6 class="dashboard"> <i class="bi bi-grid-1x2-fill"></i> Dashboard</h6>
  </div>
    <div class="isiisi">
      <h2>Selamat Datang</h2>
      <h6>Di Sistem Informasi Angkringan</h6>
      <h6>Semoga Hari Anda Menyenangkan</h6>
    </div>
@endsection

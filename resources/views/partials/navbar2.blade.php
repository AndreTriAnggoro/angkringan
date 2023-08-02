<style>
  body {
    margin: 0;
    padding: 0;
  }
  
  .navbar {
    position: fixed;    
    flex-direction: column;
    flex: 0 0 250px;
    margin-left: -125px;
    border-radius: 10px;
    height: 150vh; /* Mengatur tinggi menu/navbar agar mencakup tinggi halaman */
    background-color: #800080; /* Mengatur warna latar belakang menu/navbar */
    width: 270px;
}

.navbar-brand {
    margin-bottom: 1rem;
    color: white;
    position: relative;
    border-bottom: 1px solid white;
    width: 100%;
    text-align: center; 
  }

.nav-link.active {
  background-color: orange;
  width: 220px;
  height: 60px;
  display: flex;
    align-items: center;
    border-radius: 5px;
}

.navbar-nav {
  flex-direction: column;
}
.nav-item {
  height: 70px;
  font-size: 20px;
}

.nav-item i {
  margin-right: 5px;
}

.navbar-collapse {
  padding-top: 1rem;
}

.container {
  display: flex;
}
.navbar-nav .nav-link {
    color: white; /* Mengatur warna teks pada menu */
  }

  .navbar-nav .nav-link:hover {
    background-color: #660066; /* Warna ungu yang lebih tua pada menu saat dihover */
    height: 60px;
    display: flex;
    align-items: center;  
    border-radius: 5px;
  }
</style>

<nav class="navbar navbar-expand-lg">
  <div class="container flex-column">
    <a class="navbar-brand mt-3" href="#"><i class="bi bi-grid-1x2"></i> NgangkringYuh</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-column">
        <li class="nav-item">
        <a class="nav-link {{ Request::is('owner') ? 'active' : '' }}" href="/owner"> <i class="bi bi-border-all"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('laporanowner') ? 'active' : '' }}" href="/laporanowner"><i class="bi bi-journals"></i>Laporan</a>
        </li>
        <ul class="navbar-nav flex-column">
          @auth
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link btn btn-link"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          @endauth
        </ul>

      <!-- <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>
                Login</a>
            </li> -->
      </ul>
    </div>
  </div>
</nav>
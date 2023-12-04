<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setiawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @livewireStyles
    @livewireScripts
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    @stack('styleku')
  </head>
  <body>
    <main id="isi konten" class="vh-100 position-relative p-0" style="overflow-x: hidden">
      <nav class="navbar bg-body-white navbar-expand-lg">
        <div class="container-fluid px-0">
          <a class="navbar-brand" href="#"><i class="bi bi-webcam"></i> Presensi App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-start align-items-center flex-grow-1 pe-3 nav-underline">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('dashboard') }}"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="{{ url('profil') }}"><i class="bi bi-person-bounding-box"></i> Profil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('jabatan*') ? 'active' : '' }}" href="{{ url('jabatan') }}"><i class="bi bi-diagram-2"></i> Jabatan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('karyawan*') ? 'active' : '' }}" href="{{ url('karyawan') }}"><i class="bi bi-people"></i> Karyawan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('absensi*') ? 'active' : '' }}" href="{{ url('absensi') }}">
                    <i class="bi bi-calendar"></i> Riwayat Absensi</a>
                </li>
  
              </ul>
              <div id="profil" class="d-flex gap-2">
                <img src="{{ asset('image/'.Auth::user()->foto_profil) }}" class="img-thumbnail" style="width: 40px; border-radius:50%; aspect-ratio:1/1" >
                <div class="dropdown me-3">
                  <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('logout') }}" class="ms-2" method="post">
                          @csrf
                          <button type="submit" class="btn btn-danger"><i class="bi-power"></i> Logout</button>
                        </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      {{ $slot }}
      {{-- <a href="" class="btn btn-lg btn-primary bg-gradient rounded-circle shadow position-absolute end-0 bottom-0 me-4 mb-4">
        <i class="bi-camera"></i>
      </a> --}}
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
      new DataTable('#tabelku');
    </script>
    @stack('scriptku')
  </body>
</html>
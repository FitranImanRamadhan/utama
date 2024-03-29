<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="icon" href="{{asset('assets/images/logos/logo2.png')}}" type="image/png">
    <style>
      .dropdown-item:hover {
    background-color: #5D87FF;
    color: white; /* Untuk mengubah warna teks menjadi putih saat di sorot */
}

.search-input {
    max-width: 200px; /* Ubah nilai lebar sesuai keinginan */
}

.custom-btn {
  width: 120px; /* Atur lebar sesuai kebutuhan */
  /*Tambahkan properti lain jika diperlukan*/
}

    </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between bg-primary">
                <a href="./index.html" class="text-nowrap logo-img">
                  <img src="{{asset('assets/images/logos/logo2.png')}}" width="180" alt="" />
                </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Tabel Data</span>
            </li>
            
<br>
          <div class="sidebar-item"">
            <button type="button" class="btn btn-danger dropdown-toggle custom-btn" data-bs-toggle="dropdown" aria-expanded="false">
              Master
            </button>
              <ul class="dropdown-menu">
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-file-description"></i>
                    </span>
                    <span class="hide-menu">Data User</span>
                  </a>
                </li>
                @endif
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('positions.index') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-typography"></i>
                    </span>
                    <span class="hide-menu">Data Jabatan</span>
                  </a>
                </li>
                @endif
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('departements.index') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-typography"></i>
                    </span>
                    <span class="hide-menu">Data departement</span>
                  </a>
                </li>
                @endif
              </ul>
            </div>

            <br>
            <div class="sidebar-item"">
            <button type="button" class="btn btn-primary dropdown-toggle custom-btn" data-bs-toggle="dropdown" aria-expanded="false">
              Transaksi
            </button>
              <ul class="dropdown-menu">
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('absensis.index') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-file-description"></i>
                    </span>
                    <span class="hide-menu">Absensi</span>
                  </a>
                </li>
                @endif
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link" aria-expanded="false">
                    <span>
                      <i class="ti ti-typography"></i>
                    </span>
                    <span class="hide-menu">Gaji</span>
                  </a>
                </li>
                @endif
              </ul>
            </div>

            <br>

            <div class="sidebar-item"">
            <button type="button" class="btn btn-success dropdown-toggle custom-btn" data-bs-toggle="dropdown" aria-expanded="false">
              Laporan
            </button>
              <ul class="dropdown-menu">
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('laporan-absensi') }}" aria-expanded="false">
                    <span>
                      <i class="ti ti-file-description"></i>
                    </span>
                    <span class="hide-menu">Laporan Absensi</span>
                  </a>
                </li>
                @endif
                @if(Auth()->user()->level == "1")
                <li class="sidebar-item">
                  <a class="sidebar-link"  aria-expanded="false">
                    <span>
                      <i class="ti ti-typography"></i>
                    </span>
                    <span class="hide-menu">Laporan Gaji</span>
                  </a>
                </li>
                @endif
              </ul>
            </div>

            <br>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('jadwals.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Jadwal Karyawan</span>
              </a>
            </li>



            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('change.password') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Ganti Password</span>
              </a>
            </li>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
        <div class="body-wrapper">
          <!--  Header Start -->
          <header class="app-header shadow-lg bg-primary">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <!-- ... (elemen-elemen lain jika ada) ... -->
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-between">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ asset('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="{{ route('profile') }}" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">My Profile</p>
              </a>
              <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>
          </div>
        </li>
        <li class="nav-item pt-2">
          @auth
            <p class="text-light">{{ Auth::user()->name }}</p>
          @endauth
        </li>
      </ul>
    </div>
  </nav>
</header>
          <!--  Header End -->
          <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">@yield('title')</h1>
                    @yield('content')
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Memuat jQuery versi 3.6.0 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> <!-- Memuat DataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> <!-- Memuat jQuery UI -->
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js')}}"></script>
<script src="{{ asset('assets/js/dashboard.js')}}"></script>
@yield('js')

  
</body>

</html>
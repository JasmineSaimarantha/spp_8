<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free-6.0.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion bg-warning" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">spp</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('beranda')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            @if (auth()->user()->role=="admin")
            <li class="nav-item">
                <a class="nav-link" href="{{route('siswa')}}">
                    <i class="fa-solid fa-users"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('petugas')}}">
                    <i class="fa-solid fa-users-gear"></i>
                    <span>Petugas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('kelas')}}">
                    <i class="fa-solid fa-school"></i>
                    <span>Kelas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('spp')}}">
                    <i class="fa-solid fa-money-bill"></i>
                    <span>Spp</span></a>
            </li>

                {{-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                        aria-expanded="true" aria-controls="collapseFive">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <span>Tunggakan</span>
                    </a>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Utilities:</h6>
                            <a class="collapse-item" href="{{route('tunggakan')}}">Insert Spp</a>
                        </div>
                    </div>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{route('pembayaran')}}">
                        <i class="fa-solid fa-receipt"></i>
                        <span>Pembayaran</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('history')}}">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span>History Pembayaran</span></a>
                </li>
            @endif

            @if (auth()->user()->role=="petugas")
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    <span>Tunggakan</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Utilities:</h6>
                        <a class="collapse-item" href="{{route('spp')}}">Insert Spp</a>
                    </div>
                </div>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="{{route('pembayaran')}}">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Pembayaran</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('history')}}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>History Pembayaran</span></a>
            </li>
            @endif

            @if (auth()->user()->role=="siswa")
            <li class="nav-item">
                <a class="nav-link" href="{{route('history-siswa', auth()->user()->id)}}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>History Pembayaran</span></a>
            </li>
            @endif

            <!-- Divider -->
            <!--<hr class="sidebar-divider">-->

            <!-- Heading -->
            <!--<div class="sidebar-heading">
                ---------
            </div>-->

            <!-- Nav Item - Pages Collapse Menu -->
            <!--<li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="{{route('login')}}">Login</a>
                        <a class="collapse-item" href="{{route('logout')}}">Logout</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item active" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>-->

            <!-- Nav Item - Charts -->
            <!--<li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">
                    <i class="fa-solid fa-face-smile"></i>
                    <span>Login</span></a>
            </li>-->

            <!-- Nav Item - Tables -->
            <!--<li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="fa-solid fa-face-meh"></i>
                    <span>Logout</span></a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
    </div>
    <section>
        @yield('content1')
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>
</body>
</html>

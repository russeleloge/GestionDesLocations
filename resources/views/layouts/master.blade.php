<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gestionDesLocations</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    @livewireStyles

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->

        <x-topnav />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <center><span class="brand-text font-weight-bold" style="font-size:1.3em"><b>Just do it ✔</b></span></center>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/pers.jpg ') }}" class="img-size-50 mr-3 img-circle"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{userFullName()}}</a>
                    </div>
                </div>

                <x-menu />
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield("contenu")
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <x-sidebar />
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            {{-- <div class="float-right d-none d-sm-inline">
                Anything you want
            </div> --}}
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <span class="text-primary">NJIEGOM TCHOGA Eloge Russel</a></strong> Tous les droits reservés.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ mix('js/app.js') }}"></script>


    @livewireScripts

</body>

</html>

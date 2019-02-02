<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url('assets/admin') ?>/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url('assets/admin') ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url('assets/admin') ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('assets/admin') ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet"
        media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url('assets/admin') ?>/css/theme.css" rel="stylesheet" media="all">

    <!-- data tabel css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- data tabel -->

    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}

    <meta name="base_url_controller" content="{{ current_url() }}">
    <meta name="base_url" content="{{ base_url() }}">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <?php //$this->load->view('navigasi_mobile'); ?>

                @include('navigasi_mobile')
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <strong>Admin</strong>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">


                    <?php //$this->load->view('navigasi_web'); ?>

                    @include('navigasi_web')
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php //$this->load->view('header'); ?>

            @include('header')

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                @yield('content')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url('assets/admin') ?>/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('assets/admin') ?>/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('assets/admin') ?>/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url('assets/admin') ?>/js/main.js"></script>
    <script src="<?php echo base_url('assets/admin') ?>/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            var a = ".navbar__list .has-sub a[href='" + $("meta[name='base_url_controller']").attr(
                'content').replace("index.php/", '') + "']";

            $(a).parents(".has-sub").addClass('active');
        });
    </script>


    @yield('js')

</body>

</html>
<!-- end document-->
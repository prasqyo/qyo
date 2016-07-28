<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Koperasi DKB </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assetdata/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assetdata/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assetdata/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url();?>assetdata/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url();?>assetdata/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assetdata/build/css/custom.min.css" rel="stylesheet">
     <!-- PNotify -->
    <link href="<?php echo base_url();?>assetdata/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assetdata/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assetdata/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assetdata/vendors/jquery/dist/jquery.min.js"></script>
    <!-- PNotify -->
    <script src="<?php echo base_url();?>assetdata/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url();?>assetdata/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url();?>assetdata/vendors/pnotify/dist/pnotify.nonblock.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><img src="<?php echo base_url();?>assetdata/images/logo2.png" alt="" width="34" height="34"> <span>Koperasi DKB</span></a>
            </div>

            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>index.php/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-edit"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/anggota">Anggota</a></li>
                      <li><a href="<?php echo base_url();?>index.php/unit_kerja">Unit Kerja</a></li>
                      <li><a href="<?php echo base_url();?>index.php/jabatan">Jabatan</a></li>
                      <li><a href="<?php echo base_url();?>index.php/cicilan">Cicilan</a></li>
                      <li><a href="<?php echo base_url();?>index.php/pengurus">Pengurus</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file"></i> Simpanan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/simpananwajib">Simpanan Wajib</a></li>
                      <li><a href="<?php echo base_url();?>index.php/simpananpokok">Simpanan Pokok</a></li>
                      <li><a href="<?php echo base_url();?>index.php/simpanansukarela">Simpanan Sukarela</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url();?>index.php/pinjaman"><i class="fa fa-clipboard"></i> Pinjaman</a></li>
                  <li><a href="<?php echo base_url();?>index.php/angsuran"><i class="fa fa-money"></i> Angsuran pinjaman</a></li>
                  <li><a><i class="fa fa-briefcase"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/lapsimpanan">Laporan Simpanan Anggota</a></li>
                      <li><a href="#">Laporan Piutang Anggota</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gears"></i> Pengaturan User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>index.php/user">User</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="<?php echo base_url();?>index.php/login/logout">
                    <i class="fa fa-power-off"></i> Keluar
                  </a>
                </li>
                <li class="">
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>assetdata/images/user.png" alt="">Administrator
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>KOPKAR DKB KAPUS</title>

		<!-- CSS -->
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/fonts/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/css/animate.min.css" rel="stylesheet">

		<!-- Custom styling plus plugins -->
		<link href="<?php echo base_url();?>asset/css/custom.css" rel="stylesheet">
		<link href="<?php echo base_url();?>asset/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>asset/css/icheck/flat/green.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>asset/css/floatexamples.css" rel="stylesheet" type="text/css" />

		<script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/nprogress.js"></script>
  
		<!-- Datatable -->
		<link href="<?php echo base_url();?>asset/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>asset/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>asset/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>asset/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>asset/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- colorpicker -->
		<link href="<?php echo base_url();?>asset/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
		
		<link href="<?php echo base_url();?>asset/css/datepicker3.css" rel="stylesheet">
		
		<!-- Datepicker -->
		<script type="text/javascript" src="<?php echo base_url(); ?>asset2/datetimepicker_css.js"></script>
		
		<!-- Alert -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/dist/sweetalert.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/dist/sweetalert.min.js"></script>
	
		<!-- /CSS -->
	</head>


	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="<?php echo base_url();?>index.php/dashboard" class="site_title"><img src="<?php echo base_url();?>asset/images/logo-31.png" style="margin-left:-15px;"></a>
						</div>
						<div class="clearfix"></div>
						<br />
						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<ul class="nav side-menu">
									<li class="active"><a href="<?php echo base_url();?>index.php/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>

									<?php if($this->session->userdata('Level')== "1") { ?>

									<li><a><i class="fa fa-edit"></i>Master Data <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">
											<?php if($this->session->userdata('Level')== "1" || $this->session->userdata('Level')== "2") { ?>
											<li><a href="<?php echo base_url(); ?>index.php/anggota">Anggota</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/jenis_simpanan">Jenis Simpanan</a></li>
											<?php } ?>
											<li><a href="<?php echo base_url(); ?>index.php/unit_kerja">Unit Kerja</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/jabatan">Jabatan</a></li>
										</ul>
									</li>

									<?php } ?>
									<?php if($this->session->userdata('Level')== "1" || $this->session->userdata('Level')== "2"){?>
									<li><a href="<?php echo base_url(); ?>index.php/simpanan"><i class="fa fa-file-text-o"></i> Simpanan</a></li>
									<?php } ?>
									<?php if($this->session->userdata('Level')== "1" || $this->session->userdata('Level')== "2"){?>
									<li><a href="<?php echo base_url(); ?>index.php/pinjaman"><i class="fa fa-clipboard"></i> Pinjaman</a></li>
									<?php } ?>
									<?php if($this->session->userdata('Level')== "1" || $this->session->userdata('Level')== "2"){?>
									<li><a href="<?php echo base_url(); ?>index.php/angsuran"><i class="fa fa-money"></i> Angsuran Pinjaman</a></li>
									<?php } ?>
									<?php if($this->session->userdata('Level')== "1" || $this->session->userdata('Level')== "2" || $this->session->userdata('Level')== "3"){?>
									<li><a><i class="fa fa-briefcase"></i>Laporan <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">
											<li><a href="<?php echo base_url(); ?>index.php/lap_simpanan">Laporan Simpanan Anggota</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/lap_piutang">Laporan Piutang Anggota</a></li>
										</ul>
									</li>
									<?php } ?>
									<?php if($this->session->userdata('Level')== "1") { ?>
									<li><a><i class="fa fa-gears"></i>Settings <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">
											<li><a href="<?php echo base_url(); ?>index.php/pengurus">Pengurus</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/user">User</a></li>
										</ul>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<!-- /sidebar menu -->
					</div>
				</div>
				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<nav class="" role="navigation">
							<div class="nav toggle">
							  <a id="menu_toggle"><i class="fa fa-th-large"></i></a>
							</div>
							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="<?php echo base_url(); ?>index.php/login/logout">
										<i class="fa fa-power-off" style="color:#E7E7E7;"></i><label style="color:#E7E7E7; margin-left:10px;">Logout</label>
									</a>
								</li>
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<img src="<?php echo base_url();?>asset/images/aa.png" alt=""><label style="color:#E7E7E7;"><?php echo $this->session->userdata('Nama_Lengkap');?></label>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->
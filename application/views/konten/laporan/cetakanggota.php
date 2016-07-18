<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetdata/admin2/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assetdata/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetdata/admin2/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <img src="<?php echo base_url();?>assetdata/images/logo2.png" alt="" width="24" height="24"> Koperasi DKB.
              <small class="pull-right">Date: <?php date_default_timezone_set('Asia/Jakarta');
      $getdatetime = date('m/d/Y'); echo $getdatetime; ?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>No Anggota</label>
              <p class="lead">ANG-001</p>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label>NIK</label>
              <p class="lead">201543501315</p>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label>Nama Anggota</label>
              <p class="lead">Gunawan puspo prajoko</p>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label>Tempat, Tanggal Lahir</label>
              <p class="lead">Jakarta, 21/05/1997</p>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <p class="lead">Pria</p>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Bergabung</label>
              <p class="lead">21/05/1997</p>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label>Unit Kerja</label>
              <p class="lead">Galangan I</p>
            </div><!-- /.form-group -->
            <div class="form-group">
              <label>Alamat Rumah</label>
              <p class="lead">Jalan condet batu ampar RT015/002 No 70 Kel. Batu Ampar Kec. Kramatjati Jakarta Timur</p>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div>

      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assetdata/admin2/dist/js/app.min.js"></script>
  </body>
</html>

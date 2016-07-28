<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Koperasi DKB | Cetak Daftar Simpanan <?php echo $jenissimpanan;?></title>
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
              <img src="<?php echo base_url();?>assetdata/images/logo2.png" alt="" width="24" height="24">  Koperasi DKB
              <small class="pull-right">Date: <?php date_default_timezone_set('Asia/Jakarta');
      $getdatetime = date('m/d/Y'); echo $getdatetime; ?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <p class="lead">Daftar Transaksi Simpanan <?php echo $jenissimpanan." ".$bulan." ".$tahun;?></p>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-12 invoice-col">
          <table>
            <tr>
              <td width="180">Jumlah Simpanan</td>
              <td width="40" class="text-center">:</td>
              <td width="200"><?php echo $jumlah; ?></td>
            </tr>
          </table>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <br/>
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Nomer Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Total Simpanan</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $no = 0;
                foreach ($detailsimpanan as $fetchdata) {
                $no++;
              ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $fetchdata['kode_transaksi'];?></td>
                  <td><?php echo $fetchdata['No_Anggota'];?></td>
                  <td>
                  <?php
                  $a = $fetchdata['No_Anggota'];
                  $getnama = $this->global_model->find_by('anggota', array('No_Anggota' => $a));
                  echo $getnama['Nama_Anggota'];
                  ?>
                  </td>
                  <td>
                  <?php
                  $a = "simpansukarela";
                  if($jenissimpanan=="wajib"){
                    $a = "simpanwajib";
                  }else if($jenissimpanan=="pokok"){
                    $a = "simpanpokok";
                  }

                  $sqljumlah = "select sum(nominal) as jumlah from ".$a." where Bulan='".$bulan."' and Tahun='".$tahun."' and No_Anggota='".$fetchdata['No_Anggota']."'";
                  $checkjumlah = $this->db->query($sqljumlah);
                  $row = $checkjumlah->row();
                  echo $row->jumlah;
                  ?>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
          </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assetdata/admin2/dist/js/app.min.js"></script>
  </body>
</html>

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/simpanansukarela">Simpanan Sukarela</a> <small>Detail simpanan sukarela</small></h3>
              </div>

              <div class="title_right">
                <div class="form-group pull-right">
                  <div class="input-group">
                    <a href="<?php echo base_url();?>index.php/simpanansukarela/cetak/<?php echo $this->uri->segment(3);?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h2><img src="<?php echo base_url();?>assetdata/images/logo2.png" alt="" width="24" height="24"> Detail Transaksi</h2>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-5 invoice-col">
                          <table width="100%">
                            <tr>
                              <td width="50">Nomer Anggota</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100"><?php echo $noanggota; ?></td>
                            </tr>
                            <tr>
                              <td width="50">NIK</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100"><?php echo $nik; ?></td>
                            </tr>
                            <tr>
                              <td width="50">Nama Anggota</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100"><?php echo $namaanggota; ?></td>
                            </tr>
                            <tr>
                              <td width="50">Unit Kerja</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100"><?php echo $unit; ?></td>
                            </tr>
                            <tr>
                              <td width="50">Jenis Simpanan</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100">Simpanan sukarela</td>
                            </tr>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <br />

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
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
                                <td><?php echo $fetchdata['nominal'];?></td>
                                <td><?php echo $fetchdata['tanggal_transaksi']." ".$fetchdata['waktu'];?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </section>

                  </div>
                </div>
              </div>
            </div>

          </div>
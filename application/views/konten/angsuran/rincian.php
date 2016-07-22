          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/angsuran/detail/<?php echo $noanggota;?>">Angsuran Pinjaman</a> <small>Detail angsuran pinjam</small></h3>
              </div>

              <div class="title_right">
                <div class="form-group pull-right">
                  <div class="input-group">
                    <a href="<?php echo base_url();?>index.php/angsuran/cetak/<?php echo $this->uri->segment(3);?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
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
                              <td width="50">Jenis Transaksi</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100">Angsuran pinjam</td>
                            </tr>
                            <tr>
                              <td width="50">Kode Angsuran</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100"><?php echo $kodeangsuran; ?></td>
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
                                <th>Nominal pinjaman</th>
                                <th>Jangka Waktu</th>
                                <th>Cicilan Perbulan</th>
                                <th>Tanggal Angsuran</th>
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
                                <td>
                                <?php
                                $a = $fetchdata['kode_cicilan'];
                                $check = $this->global_model->find_by('cicilan', array('kode_cicilan' => $a));
                                echo $check['nominal'];
                                ?>
                                </td>
                                <td>
                                <?php
                                  $a = $fetchdata['kode_cicilan'];
                                  $check = $this->global_model->find_by('cicilan', array('kode_cicilan' => $a));
                                  echo $check['jangka_waktu']." Tahun";
                                ?>
                                </td>
                                <td><?php echo $fetchdata['nominal'];?></td>
                                <td><?php echo $fetchdata['tanggal_angsuran'];?></td>
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
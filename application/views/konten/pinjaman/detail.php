          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/pinjaman">Pinjaman</a> <small>Detail pinjaman</small></h3>
              </div>

              <div class="title_right">
                <div class="form-group pull-right">
                  <div class="input-group">
                  <?php if($this->session->userdata('Level')=="4"){ ?>
                    <a href="<?php echo base_url();?>index.php/pinjaman/cetak/<?php echo $this->session->userdata('No_Anggota');?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                  <?php }else {?>  
                    <a href="<?php echo base_url();?>index.php/pinjaman/cetak/<?php echo $this->uri->segment(3);?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                  <?php } ?>
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
                              <td width="50">Jenis Transaksi</td>
                              <td width="20" class="text-center">:</td>
                              <td width="100">Pinjaman</td>
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
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Nominal pinjaman</th>
                                <th>Jangka Waktu</th>
                                <th>Cicilan Perbulan</th>
                                <th>Telah Angsur/Banyak Angsuran</th>
                                <th>Status</th>
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
                                <td>
                                <?php
                                  $a = $fetchdata['kode_cicilan'];
                                  $check = $this->global_model->find_by('cicilan', array('kode_cicilan' => $a));
                                  echo $check['nominal_cicilan'];
                                ?>
                                </td>
                                <td>
                                <?php 
                                $getjumlah = count($this->global_model->query("select *from angsuran_pinjam where kode_transaksi='".$fetchdata['kode_transaksi']."' and No_Anggota='".$noanggota."'"));
                                echo $getjumlah."/".$fetchdata['banyak_cicilan'] ?>
                                </td>
                                <td><?php echo $fetchdata['status'] ?></td>
                                <td><?php echo $fetchdata['tanggal_transaksi'];?></td>
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
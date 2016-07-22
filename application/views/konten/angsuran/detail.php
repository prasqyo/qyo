          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/angsuran">Angsuran pinjaman</a> <small>Detail pinjaman</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <section class="content invoice">
                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Transaksi Pinjam</th>
                                <th>Nominal pinjaman</th>
                                <th>Jangka Waktu</th>
                                <th>Cicilan Perbulan</th>
                                <th>Telah Angsur/Banyak Angsuran</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $no = 0;
                              foreach ($detailsimpanan as $fetchdata) {
                              $no++;
                              ?>
                              <tr class="record">
                                <td><?php echo $no;?></td>
                                <td id="kode"><?php echo $fetchdata['kode_transaksi'];?></td>
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
                                <td class="text-center">
                                  <button class="angsuranbutton btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Lakukan Angsuran"><span class="glyphicon glyphicon-pencil"></span></button>
                                  <a href="<?php echo base_url();?>index.php/angsuran/rincian/<?php echo $fetchdata['kode_transaksi'];?>" class="btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Lihat Rincian"><span class="glyphicon glyphicon-eye-open"></span></a>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </section>

                    <div class="modal fade" id="angsurantransaksi">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Angsuran</h4>
                          </div>
                          <form method="post" id="editform">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Kode Pinjaman</label>
                              <input type="text" class="form-control" id="kodetransaksiedit" disabled="">
                            </div>
                            <div class="form-group">
                              <label>Nominal Pinjaman</label>
                              <input type="text" class="form-control" id="nominalpinjamanedit" disabled="">
                            </div>
                            <div class="form-group">
                              <label>Nominal Cicilan Perbulan</label>
                              <input type="text" class="form-control" id="nominalperbulanedit" disabled="">
                            </div>
                            <div class="form-group">
                              <label>Tanggal Transaksi Pinjaman</label>
                              <input type="text" class="form-control" id="tanggaltransaksiedit" disabled="">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                          </div>
                          </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                  </div>
                </div>
              </div>
            </div>

          </div>


<?php
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexangsurandetail"){
echo "<script type='text/javascript'>";
  echo "$(document).ready(function() {";
    echo "new PNotify({";
      echo "title: 'Informasi !',";
      echo "text: '".$this->session->flashdata('messagetext')."',";
      echo "type: '".$this->session->flashdata('messagemode')."',";
      echo "styling: 'bootstrap3'";
    echo "});";
  echo "});";
echo "</script>";
}
?>

<script type="text/javascript">
    $(".angsuranbutton").click(function(event) {
        var record = $(this).parents('.record');

        $.getJSON('<?php echo base_url(); ?>index.php/angsuran/tampilan/'+record.find('#kode').html(), function(data) {
        $("#kodetransaksiedit").val(data.kode_transaksi);
        $("#nominalpinjamanedit").val(data.nominal);
        $("#nominalperbulanedit").val(data.nominal_cicilan);
        $("#tanggaltransaksiedit").val(data.tanggal_transaksi);
        $("#editform").attr("action", "<?php echo base_url(); ?>index.php/angsuran/tambahangsuran/"+record.find('#kode').html());
    });

        $('#angsurantransaksi').modal('show');
    
    });
</script>          
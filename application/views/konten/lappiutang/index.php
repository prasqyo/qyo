          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/pengurus">Laporan Piutang</a> <small>Form Laporan Piutang</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>index.php/lappiutang/cetak">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Anggota</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" name="noanggota" required>
                            <option value="all">Semua</option>
                            <?php foreach ($anggota as $fetchanggota) { ?>
                            <option value="<?php echo $fetchanggota['No_Anggota']; ?>"><?php echo $fetchanggota['No_Anggota']." - ".$fetchanggota['Nama_Anggota']; ?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periode</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select class="form-control" name="bulan">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" placeholder="Tahun" name="tahun">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-primary" name="lihat" value="Lihat Laporan">
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            
          </div>

<?php
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexlappiutang"){
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
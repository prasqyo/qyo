          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/anggota">Keanggotan</a> <small>Tambah anggota koperasi</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="POST" action="">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIK</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="NIK" required="required" onkeypress="return isNumberKey(event)" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Nama_Anggota" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Tempat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="Tanggal_Lahir" class="form-control" data-inputmask="'mask': '99/99/9999'" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="Jenis_Kelamin" value="Pria" checked=""> &nbsp; Pria &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="Jenis_Kelamin" value="Wanita"> Wanita
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Kerja</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="ID_Unit" tabindex="-1" required>
                            <option></option>
                            <?php
                              foreach ($unitkerja as $loadaja) {
                            ?>
                            <option value="<?php echo $loadaja['ID_Unit'];?>"><?php echo $loadaja['Unit_Kerja'];?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Simpanan Sukarela</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="simpansukarela" tabindex="-1" required>
                            <option value="iya">Iya</option>
                            <option value="tidak">Tidak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="Alamat_Rumah" rows="3" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="reset" class="btn btn-primary" value="Batal">
                          <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?php
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "tambahanggota"){
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
  function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
  }
</script>

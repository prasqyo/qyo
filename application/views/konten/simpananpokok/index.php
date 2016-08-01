          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/simpananpokok">Simpanan pokok</a> <small>List simpanan pokok</small></h3>
              </div>

              <div class="title_right">
                <div class="form-group pull-right">
                  <div class="input-group">
                    <a href="<?php echo base_url();?>index.php/simpananpokok/cetak" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                    <?php if($this->session->userdata('Level')=="1" || $this->session->userdata('Level')=="3"){ ?>
                    <button class="pengaturanbutton btn btn-success"><i class="fa fa-pencil"></i> Edit nominal simpanan</button>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table <?php if($this->session->userdata('Level')=="1" || $this->session->userdata('Level')=="3"){ ?>id="datatable"<?php }?> class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Kode Transaksi</th>
                          <th>Nomer Anggota</th>
                          <th>Nama Anggota</th>
                          <th>Nominal</th>
                          <th>Tanggal Transaksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($simpanpokok as $fetchdata) {
                        ?>
                        <tr>
                          <td><?php echo $fetchdata['kode_transaksi'];?></td>
                          <td><?php echo $fetchdata['No_Anggota'];?></td>
                          <td>
                          <?php
                            $d = $fetchdata['No_Anggota'];
                            $checkd = $this->global_model->find_by('anggota', array('No_Anggota' => $d));
                            echo $checkd['Nama_Anggota'];
                          ?>
                          </td>
                          <td><?php echo $fetchdata['nominal']; ?></td>
                          <td>
                          <?php
                            $d = $fetchdata['No_Anggota'];
                            $checkd = $this->db->query("select *from simpanpokok where No_Anggota='".$d."' order by kode_transaksi desc limit 1");
                            $row = $checkd->row();

                            echo $row->tanggal_transaksi;
                          ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="pengaturan">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit nominal simpanan</h4>
                    </div>
                    <form method="post" action="<?php echo base_url();?>index.php/simpananpokok/setting">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="simpan_pokok" class="form-control" id="nominalsimpananedit" required>
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

<?php
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexsimpanpokok"){
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

</script>
<script type="text/javascript">
    $(".pengaturanbutton").click(function(event) {
        $.getJSON('<?php echo base_url(); ?>index.php/simpananpokok/editnominal', function(data) {
        $("#nominalsimpananedit").val(data.simpan_pokok);
    });

        $('#pengaturan').modal('show');
    
    });
</script>
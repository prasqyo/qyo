          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/simpanansukarela">Simpanan Sukarela</a> <small>List simpanan sukarela</small></h3>
              </div>

              <div class="title_right">
                <div class="form-group pull-right">
                  <div class="input-group">
                    <button class="tambahbutton btn btn-primary" onclick="openmodal('tambah')"><i class="fa fa-plus"></i> Tambah data</button>
                    <button class="btn btn-danger" onclick="openmodal('hapus')"><i class="fa fa-trash"></i> Hapus data</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <form method="post" id="myform" action="<?php echo base_url();?>index.php/simpanansukarela/hapus">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20"><input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked"></th>
                          <th>Nomer Anggota</th>
                          <th>Nama Anggota</th>
                          <th>Terakhir melakukan transaksi</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($simpansukarela as $fetchdata) {
                        ?>
                        <tr class="record">
                          <td><input type="checkbox" name="check[]" value="<?php echo $fetchdata['No_Anggota'];?>"></td>
                          <td id="kode"><?php echo $fetchdata['No_Anggota'];?></td>
                          <td>
                          <?php
                            $d = $fetchdata['No_Anggota'];
                            $checkd = $this->global_model->find_by('anggota', array('No_Anggota' => $d));
                            echo $checkd['Nama_Anggota'];
                          ?>
                          </td>
                          <td>
                          <?php
                            $d = $fetchdata['No_Anggota'];
                            $checkd = $this->db->query("select *from simpansukarela where No_Anggota='".$d."' order by kode_transaksi desc limit 1");
                            $row = $checkd->row();

                            echo $row->tanggal_transaksi." ".$row->waktu;
                          ?>
                          </td>
                          <td class="text-center">
                            <a href="<?php echo base_url();?>index.php/simpanansukarela/detail/<?php echo $fetchdata['No_Anggota']; ?>" class="btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Lihat Rincian"><span class="glyphicon glyphicon-eye-open"></span></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="hapus">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apa anda yakin ingin menghapus data tersebut?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="submit" form="myform" class="btn btn-danger">Hapus</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" id="tambah">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <form method="post" action="<?php echo base_url();?>index.php/simpanansukarela/tambah">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>No Anggota</label>
                        <select class="select2_single form-control" name="No_Anggota" tabindex="-1" style="width:100%;" required>
                            <option></option>
                            <?php
                              foreach ($anggota as $loadanggota) {
                            ?>
                            <option value="<?php echo $loadanggota['No_Anggota'];?>"><?php echo $loadanggota['No_Anggota']." - ".$loadanggota['Nama_Anggota'];?></option>
                            <?php }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control" id="nominaltambah" required>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="text" name="tanggal_transaksi" class="date-picker form-control" id="birthday" required>
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
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexsimpansukarela"){
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
function openmodal(id){
  $('#'+id).modal('show');
}
</script>
<script type="text/javascript">
  $(".tambahbutton").click(function(event) {
      $("nominal").val('');
      $("#birthday").val('');
  });
</script>
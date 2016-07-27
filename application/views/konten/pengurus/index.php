          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/pengurus">Pengurus</a> <small>List pengurus</small></h3>
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
                    <form method="post" id="myform" action="<?php echo base_url();?>index.php/pengurus/hapus">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20"><input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked"></th>
                          <th>Kode pengurus</th>
                          <th>Nama pengurus</th>
                          <th>Jabatan</th>
                          <th>Tanggal Mulai Menjabat</th>
                          <th>Status</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($pengurus as $fetchdata) {
                        ?>
                        <tr class="record">
                          <td><input type="checkbox" name="check[]" value="<?php echo $fetchdata['ID_Pengurus'];?>"></td>
                          <td id="kode"><?php echo $fetchdata['ID_Pengurus'];?></td>
                          <td><?php echo $fetchdata['Nama_Pengurus'];?></td>
                          <td>
                          <?php
                          $a = $fetchdata['Kode_Jabatan'];
                          $check = $this->global_model->find_by('jabatan', array('Kode_Jabatan' => $a));
                          echo $check['Jabatan'];?>
                          </td>
                          <td><?php echo $fetchdata['Tanggal_Mulai_Jabat'];?></td>
                          <td><?php echo $fetchdata['Status'];?></td>
                          <td class="text-center">
                            <button type="button" class="editbutton btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button>
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
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <form method="post" action="<?php echo base_url();?>index.php/pengurus/tambah">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama pengurus</label>
                            <input type="text" name="Nama_Pengurus" class="form-control" id="namapengurus" required>
                          </div>
                          <div class="form-group">
                            <label>Jabatan</label>
                            <select name="Kode_Jabatan" class="form-control" required>
                              <option></option>
                              <?php foreach ($jabatan as $fetchjabatan) {?>
                              <option value="<?php echo $fetchjabatan['Kode_Jabatan']; ?>"><?php echo $fetchjabatan['Jabatan']; ?></option>
                              <?php }?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Mulai Menjabat</label>
                            <input type="text" name="Tanggal_Mulai_Jabat" class="tanggal date-picker form-control" id="birthday" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Periode</label>
                            <input type="text" name="Periode" class="form-control" id="periodepengurus" required>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="Status" required>
                              <option></option>
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="Alamat" class="form-control" id="alamatpengurus">
                          </div>
                        </div>
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

            <div class="modal fade" id="edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <form method="post" id="editform">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama pengurus</label>
                            <input type="text" name="Nama_Pengurus" class="form-control" id="namapengurusedit" required>
                          </div>
                          <div class="form-group">
                            <label>Jabatan</label>
                            <select name="Kode_Jabatan" class="form-control" id="jabatanpengurusedit" required>
                              <option></option>
                              <?php foreach ($jabatan as $fetchjabatan) {?>
                              <option value="<?php echo $fetchjabatan['Kode_Jabatan']; ?>"><?php echo $fetchjabatan['Jabatan']; ?></option>
                              <?php }?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Mulai Menjabat</label>
                            <input type="text" name="Tanggal_Mulai_Jabat" class="date-picker form-control" id="birthday1" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Periode</label>
                            <input type="text" name="Periode" class="form-control" id="periodepengurusedit" required>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="Status" id="statuspengurusedit" required>
                              <option></option>
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="Alamat" class="form-control" id="alamatpengurusedit">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <input type="submit" class="btn btn-primary" name="simpan" value="Edit">
                    </div>
                    </form>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

          </div>

<?php
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexpengurus"){
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
    $(".editbutton").click(function(event) {
        var record = $(this).parents('.record');

        $.getJSON('<?php echo base_url(); ?>index.php/pengurus/tampil/'+record.find('#kode').html(), function(data) {
        $("#namapengurusedit").val(data.Nama_Pengurus);
        $("#jabatanpengurusedit").val(data.Kode_Jabatan);
        $("#birthday1").val(data.Tanggal_Mulai_Jabat);
        $("#periodepengurusedit").val(data.Periode);
        $("#statuspengurusedit").val(data.Status);
        $("#alamatpengurusedit").val(data.Alamat);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/pengurus/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#namapengurus").val('');
        $("#periodepengurus").val('');
        $("#alamatpengurus").val('');
        $(".tanggal").val('');
    });
</script>
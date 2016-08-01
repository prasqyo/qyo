          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/cicilan">Cicilan</a> <small>List cicilan</small></h3>
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
                    <form method="post" id="myform" action="<?php echo base_url();?>index.php/cicilan/hapus">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20"><input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked"></th>
                          <th>Kode Cicilan</th>
                          <th>Nominal Cicilan</th>
                          <th>Jangka Waktu</th>
                          <th>Nominal Perbulan</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($cicilan as $fetchdata) {
                        ?>
                        <tr class="record">
                          <td><input type="checkbox" name="check[]" value="<?php echo $fetchdata['kode_cicilan'];?>"></td>
                          <td id="kode"><?php echo $fetchdata['kode_cicilan'];?></td>
                          <td><?php echo $fetchdata['nominal'];?></td>
                          <td><?php echo $fetchdata['jangka_waktu']." Tahun";?></td>
                          <td><?php echo $fetchdata['nominal_cicilan'];?></td>
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
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <form method="post" action="<?php echo base_url();?>index.php/cicilan/tambah">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control" id="nominaltambah" required>
                      </div>
                      <div class="form-group">
                        <label>Jangka Waktu (Tahun)</label>
                        <select class="form-control" name="jangka_waktu">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nominal Perbulan</label>
                        <input type="text" name="nominal_cicilan" class="form-control" id="nominalperbulantambah" required>
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
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <form method="post" id="editform">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control" id="nominaledit" required>
                      </div>
                      <div class="form-group">
                        <label>Jangka Waktu (Tahun)</label>
                        <select class="form-control" name="jangka_waktu" id="jangkawaktuedit" >
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nominal Perbulan</label>
                        <input type="text" name="nominal_cicilan" class="form-control" id="nominalperbulanedit" required>
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
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexcicilan"){
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

        $.getJSON('<?php echo base_url(); ?>index.php/cicilan/tampil/'+record.find('#kode').html(), function(data) {
        $("#nominaledit").val(data.nominal);
        $("#jangkawaktuedit").val(data.jangka_waktu);
        $("#nominalperbulanedit").val(data.nominal_cicilan);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/cicilan/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#nominaltambah").val('');
        $("#nominalperbulantambah").val('');
    });
</script>
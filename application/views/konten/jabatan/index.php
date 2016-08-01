          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/jabatan">Jabatan</a> <small>List jabatan</small></h3>
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
                    <form method="post" id="myform" action="<?php echo base_url();?>index.php/jabatan/hapus">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20"><input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked"></th>
                          <th>Kode Jabatan</th>
                          <th>Nama Jabatan</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($jabatan as $fetchdata) {
                        ?>
                        <tr class="record">
                          <td><input type="checkbox" name="check[]" value="<?php echo $fetchdata['Kode_Jabatan'];?>"></td>
                          <td id="kode"><?php echo $fetchdata['Kode_Jabatan'];?></td>
                          <td><?php echo $fetchdata['Jabatan'];?></td>
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
                    <form method="post" action="<?php echo base_url();?>index.php/jabatan/tambah">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" name="Jabatan" class="form-control" id="namatambah" required>
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
                        <label>Jabatan</label>
                        <input type="text" name="Jabatan" class="form-control" id="namaedit" required>
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
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexjabatan"){
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

        $.getJSON('<?php echo base_url(); ?>index.php/jabatan/tampil/'+record.find('#kode').html(), function(data) {
        $("#namaedit").val(data.Jabatan);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/jabatan/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#namatambah").val('');
    });
</script>
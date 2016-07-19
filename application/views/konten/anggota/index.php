          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><a href="<?php echo base_url();?>index.php/anggota">Keanggotan</a> <small>List anggota koperasi</small></h3>
              </div>

              <div class="title_right">
                <div class="form-group pull-right">
                  <div class="input-group">
                    <a href="<?php echo base_url();?>index.php/anggota/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                    <form method="post" id="myform" action="<?php echo base_url();?>index.php/anggota/hapus">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20"><input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked"></th>
                          <th>Kode Anggota</th>
                          <th>NIK</th>
                          <th>Nama Anggota</th>
                          <th>Unit Kerja</th>
                          <th>Tanggal Bergabung</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($anggota as $fetchdata) {
                        ?>
                        <tr class="record">
                          <td><input type="checkbox" name="check[]" value="<?php echo $fetchdata['No_Anggota'];?>"></td>
                          <td id="kode"><?php echo $fetchdata['No_Anggota'];?></td>
                          <td><?php echo $fetchdata['NIK'];?></td>
                          <td><?php echo $fetchdata['Nama_Anggota'];?></td>
                          <td>-</td>
                          <td>
                          <?php
                            $get = $fetchdata['Tanggal_Masuk_Anggota'];
                            list($tahun,$bulan,$tanggal) = explode('-', $get);
                            $a = $tanggal."/".$bulan."/".$tahun;
                            echo $a;
                          ?>
                          </td>
                          <td class="text-center">
                            <button type="button" class="viewbutton btn btn-success btn-xs" data-placement="top" data-toggle="tooltip" title="View"><span class="glyphicon glyphicon-eye-open"></span></button>
                            <a href="<?php echo base_url();?>index.php/anggota/edit/<?php echo $fetchdata['No_Anggota'];?>" class="btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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

            <div class="modal fade" id="view">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">View Data</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>No Anggota</label>
                              <input type="text" class="form-control" disabled="" id="noview">
                          </div>
                          <div class="form-group">
                              <label>NIK</label>
                              <input type="text" class="form-control" disabled="" id="nikview">
                          </div>
                          <div class="form-group">
                              <label>Nama Anggota</label>
                              <input type="text" class="form-control" disabled="" id="namaview">
                          </div>
                          <div class="form-group">
                              <label>Tempat</label>
                              <input type="text" class="form-control" disabled="" id="tempatview">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input type="text" class="form-control" disabled="" id="tanggallahirview">
                          </div>
                          <div class="form-group">
                              <label>Tanggal Masuk Anggota</label>
                              <input type="text" class="form-control" disabled="" id="tanggalmasukview">
                          </div>
                          <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <input type="text" class="form-control" disabled="" id="jeniskelaminview">
                          </div>
                          <div class="form-group">
                              <label>Unit Kerja</label>
                              <input type="text" class="form-control" disabled="" id="unitkerjaview">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <a id="link" target="_blank" class="btn btn-primary">Cetak</a>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

          </div>

<?php
if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexanggota"){
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
    $(".viewbutton").click(function(event) {
        var record = $(this).parents('.record');

        $.getJSON('<?php echo base_url(); ?>index.php/anggota/tampil/'+record.find('#kode').html(), function(data) {
        $("#noview").val(data.No_Anggota);
        $("#nikview").val(data.NIK);
        $("#namaview").val(data.Nama_Anggota);
        $("#tempatview").val(data.Tempat);
        $("#tanggallahirview").val(data.Tanggal_Lahir);
        $("#tanggalmasukview").val(data.Tanggal_Masuk_Anggota);
        $("#jeniskelaminview").val(data.Jenis_Kelamin);
        $("#unitkerjaview").val(data.Unit_Kerja);
        $("#link").attr("href", "<?php echo base_url(); ?>index.php/anggota/cetak/"+record.find('#kode').html());
    });

        $('#view').modal('show');
    
    });

</script>    
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h2><i class="fa fa-users"></i>&nbsp;&nbsp;Pengurus</h2>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3 style="float:left;">List Data Pengurus Koperasi</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/pengurus/tambah"><button type="button" class="btn btn-default"><i class="fa fa-plus-circle" style="margin-right:10px;"></i>Tambah Data Pengurus</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/pengurus/hapus">
						<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">#</th>
									<th class="column-title">ID Pengurus</th>
									<th class="column-title">Nama Pengurus</th>
									<th class="column-title">Jabatan</th>
									<th class="column-title no-link last"><span class="nobr">Action</span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$No=1;
									foreach ($pengurus as $ambilpengurus){
								?>
								<tr class="even pointer record" data-id="<?php echo $ambilpengurus['ID_Pengurus'];?>">
									<td class="a-center"><?php echo $No;?></td>
									<td class=" "><?php echo $ambilpengurus['ID_Pengurus'];?></td>
									<td class=" "><?php echo $ambilpengurus['Nama_Pengurus'];?> </td>
									<td class=" ">
												<?php 
													$jb = $ambilpengurus['Kode_Jabatan'];
													$jabatan = $this->global_model->find_by('jabatan', array('Kode_Jabatan' => $jb));
													echo $jabatan['Jabatan'];
												?> 
									</td>
									<td class=" last">
										<button type="button" class="editbutton btn btn-success btn-xs">Update</button>
										<button class="btndelete btn btn-danger btn-xs">Delete</button>
									</td>
								</tr>		
								<?php $No++; } ?>	
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('button.btndelete').on('click', function (e) 
	{
	    e.preventDefault();
	    var id = $(this).closest('tr').data('id');
	    window.location.href = '<?php echo base_url();?>index.php/pengurus/hapus/'+id;
	});
	$('button.editbutton').on('click', function (e) 
	{
	    e.preventDefault();
	    var id = $(this).closest('tr').data('id');
	    window.location.href = '<?php echo base_url();?>index.php/pengurus/tampil/'+id;
	});
</script>
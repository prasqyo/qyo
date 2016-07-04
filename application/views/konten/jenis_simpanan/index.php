<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h2><i class="fa fa-tasks"></i>&nbsp;&nbsp;Jenis Simpanan</h2>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3 style="float:left;">List Jenis Simpanan</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url();?>index.php/jenis_simpanan/tambah"><button type="button" class="btn btn-default"><i class="fa fa-plus-circle" style="margin-right:10px;"></i>Tambah Jenis Simpanan</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/jenissimpanan/hapus">
						<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">#</th>
									<th class="column-title">Kode Jenis Simpanan</th>
									<th class="column-title">Jenis Simpanan</th>
									<th class="column-title no-link last" style="text-align:center;"><span class="nobr">Action</span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$No=1;
									foreach ($jenissimpanan as $ambiljenissimpanan){
								?>
								<tr class="even pointer record" data-id="<?php echo $ambiljenissimpanan['Kode_Jenis_Simpanan'];?>">
									<td><?php echo $No;?></td>
									<td><?php echo $ambiljenissimpanan['Kode_Jenis_Simpanan'];?></td>
									<td><?php echo $ambiljenissimpanan['Jenis_Simpanan'];?> </td>
									<td style="text-align:center;">
										<button type="submit" class="detailbutton btn btn-primary btn-xs">View Anggota</button>
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
	    window.location.href = '<?php echo base_url();?>index.php/jenis_simpanan/hapus/'+id;
	});

	$('button.editbutton').on('click', function (e) 
	{
	    e.preventDefault();
	    var id = $(this).closest('tr').data('id');
	    window.location.href = '<?php echo base_url();?>index.php/jenis_simpanan/tampil/'+id;
	});
	
	$('button.detailbutton').on('click', function (e) 
	{
	    e.preventDefault();
	    var id = $(this).closest('tr').data('id');
	    window.location.href = '<?php echo base_url();?>index.php/jenis_simpanan/detail/'+id;
	});
</script>
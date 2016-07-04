<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h2><i class="fa fa-qrcode"></i>&nbsp;&nbsp;Unit Kerja</h2>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3 style="float:left;">List Unit Kerja</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/unit_kerja/tambah"><button type="button" class="btn btn-default"><i class="fa fa-plus-circle" style="margin-right:10px;"></i>Tambah Unit Kerja</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/unit_kerja/hapus">
						<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">#</th>
									<th class="column-title">ID Unit</th>
									<th class="column-title">Unit Kerja</th>
									<th class="column-title no-link last"><span class="nobr">Action</span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$No=1;
									foreach ($unitkerja as $ambilunitkerja){
								?>
								<tr class="btndelete even pointer record" data-id="<?php echo $ambilunitkerja['ID_Unit'];?>">
									<td class="a-center"><?php echo $No;?></td>
									<td id="kode" class=" "><?php echo $ambilunitkerja['ID_Unit'];?></td>
									<td><?php echo $ambilunitkerja['Unit_Kerja'];?> </td>
									<td>
										<button type="button" class="detailbutton btn btn-primary btn-xs">View Anggota</button>
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
	    window.location.href = '<?php echo base_url();?>index.php/unit_kerja/hapus/'+id;
	});
	$('button.editbutton').on('click', function (e) 
	{
	    e.preventDefault();
	    var id = $(this).closest('tr').data('id');
	    window.location.href = '<?php echo base_url();?>index.php/unit_kerja/tampil/'+id;
	});
	$('button.detailbutton').on('click', function (e) {
		e.preventDefault();
		var id = $(this).closest('tr').data('id');
		window.location.href = '<?php echo base_url();?>index.php/unit_kerja/detail/'+id;
	});
</script>
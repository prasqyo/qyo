<!-- page content -->
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h2><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Keanggotaan</h2>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3 style="float:left;">List Anggota Koperasi</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/anggota/tambah"><button type="button" class="btn btn-default"><i class="fa fa-plus-circle" style="margin-right:10px;"></i>Tambah Anggota</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/anggota/hapus">
						<table id="datatable" class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">#</th>
									<th class="column-title">No. Anggota</th>
									<th class="column-title">NIK</th>
									<th class="column-title">Nama Anggota </th>
									<th class="column-title">Tanggal Masuk Anggota </th>
									<th class="column-title no-link last" style="text-align:center;"><span class="nobr">Action</span></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$No=1;
									foreach ($anggota as $ambilanggota){
								?>
								<tr class="even pointer record" data-id="<?php echo $ambilanggota['No_Anggota'];?>">
									<td class="a-center"><?php echo $No;?></td>
									<td class=" "><?php echo $ambilanggota['No_Anggota'];?></td>
									<td class=" "><?php echo $ambilanggota['NIK'];?> </td>
									<td class=" "><?php echo $ambilanggota['Nama_Anggota'];?></td>
									<td class=" "><?php echo $ambilanggota['Tanggal_Masuk_Anggota'];?></td>
									<td class="last" style="text-align:center;">
										<button type="button" class="detailbutton btn btn-primary btn-xs">View</button>
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
	$(document).ready(function(){
		$('button.btndelete').on('click', function (e) 
		{
			swal
			({
				title: "Are you sure?",   
				text: "You will not be able to recover this imaginary file!",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Yes, delete it!",   
				closeOnConfirm: false
			},
			function()
			{   
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
				
			});
			e.preventDefault();
			var id = $(this).closest('tr').data('id');
			window.location.href = '<?php echo base_url();?>index.php/anggota/hapus/'+id;
			return false;
		});
	});
	
	$('button.editbutton').on('click', function (e) 
	{
		e.preventDefault();
		var id = $(this).closest('tr').data('id');
		window.location.href = '<?php echo base_url();?>index.php/anggota/tampil/'+id;

	});
	
	$('button.detailbutton').on('click', function (e) {
		e.preventDefault();
		var id = $(this).closest('tr').data('id');
		window.location.href = '<?php echo base_url();?>index.php/anggota/detail/'+id;
	});
</script>
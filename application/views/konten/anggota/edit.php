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
					<h3 style="float:left;">Form Anggota</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/anggota"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/anggota/edit/<?php echo $anggota['No_Anggota'];?>" class="form-horizontal form-label-left input_mask" id="edit_anggota">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">No Anggota</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="No_Anggota" value="<?php echo $anggota['No_Anggota'];?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">NIK</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="NIK" value="<?php echo $anggota['NIK'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Nama Anggota</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Nama_Anggota" value="<?php echo $anggota['Nama_Anggota'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tempat</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Tempat" value="<?php echo $anggota['Tempat'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tanggal Lahir</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" value="<?php echo $anggota['Tanggal_Lahir'];?>">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tanggal Masuk</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Tanggal_Masuk_Anggota" id="tanggal" value="<?php echo $anggota['Tanggal_Masuk_Anggota'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Jenis Kelamin</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<p>
											<input type="radio" class="flat" name="Jenis_Kelamin" value="Pria" checked="" <?php if($anggota['Jenis_Kelamin'] == "Pria") { echo "checked"; }  ?> required /> Pria &nbsp;&nbsp;
											<input type="radio" class="flat" name="Jenis_Kelamin" value="Wanita" <?php if($anggota['Jenis_Kelamin'] == "Wanita") { echo "checked"; }  ?>/> Wanita
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Unit Kerja</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control" name="ID_Unit">
											<option>--Pilih Unit Kerja--</option>
											<?php
												foreach($unitkerja as $ambilunitkerja) {
											?>
											<option value="<?php echo $ambilunitkerja['ID_Unit'];?>" <?php if($anggota['ID_Unit'] == $ambilunitkerja['ID_Unit']){ echo "selected"; } ?>>
												<?php echo $ambilunitkerja['Unit_Kerja'];?>
											</option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Alamat</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<textarea required="required" class="form-control" name="Alamat_Rumah" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"><?php echo $anggota['Alamat_Rumah'];?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
									<button type="reset" class="btn btn-primary">Cancel</button>
									<input type="submit" class="btn btn-success" name="editdata" value="Update">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#edit_anggota').on('submit',function(e) 
		{  
			$.ajax({
				data:$(this).serialize(),
				type:'POST',
				success:function(data)
				{
					console.log(data);
					swal
					({
						title: "Update Berhasil",
						text: "Data Berhasil Di Update!!",
						timer: 2000,
						showConfirmButton: false
					});
					e.preventDefault();
					window.location.href = '<?php echo base_url();?>index.php/anggota';
				}
			});
		});
	});
</script>
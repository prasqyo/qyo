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
					<form method="post" class="form-horizontal form-label-left input_mask" id="anggota">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">No Anggota</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="No_Anggota" id="No_Anggota" value="<?php echo $noauto; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">NIK</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="NIK" id="NIK" required="required">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Nama Anggota</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Nama_Anggota" id="Nama_Anggota" required="required">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tempat</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Tempat" id="Tempat" required="required">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tanggal Lahir</label>
									<div class="col-md-8 col-sm-8 col-xs-12 xdisplay_inputx form-group has-feedback">
										<a href="javascript:NewCssCal('Tanggal_Lahir','yyyymmdd')">
											<input type="text" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" required>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tanggal Masuk</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<a href="javascript:NewCssCal('Tanggal_Masuk_Anggota','yyyymmdd')">
											<input type="text" class="form-control" name="Tanggal_Masuk_Anggota" id="Tanggal_Masuk_Anggota" required>
										</a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Jenis Kelamin</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<p>
											<input type="radio" class="flat" name="Jenis_Kelamin" id="Jenis_Kelamin" value="Pria" checked="" required /> Pria &nbsp;&nbsp;
											<input type="radio" class="flat" name="Jenis_Kelamin" id="Jenis_Kelamin" value="Wanita" /> Wanita
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
															
											<option value="<?php echo $ambilunitkerja['ID_Unit'];?>">
												<?php echo $ambilunitkerja['Unit_Kerja'];?>
											</option>
													
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Alamat</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<textarea id="Alamat_Rumah" required="required" class="form-control" name="Alamat_Rumah" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
									<button type="reset" class="btn btn-primary">Cancel</button>
									<input type="submit" class="btn btn-success" name="simpandata" value="Submit">
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
		$('#anggota').on('submit',function(e) 
		{  
			$.ajax({
				data:$(this).serialize(),
				type:'POST',
				success:function(data)
				{
					console.log(data);
					swal({
						title:"Penyimpanan Berhasil", 
						text: "Data Berhasil Disimpan",
						timer : 2000,
						showConfirmButton: false
						});
					e.preventDefault();
					window.location.href = '<?php echo base_url();?>index.php/anggota';
				}
			});
		});
	});
</script>
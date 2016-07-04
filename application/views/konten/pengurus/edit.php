<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Pengurus</h3>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Edit Data Pengurus</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/pengurus"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/pengurus/edit/<?php echo $pengurus['ID_Pengurus'];?>" class="form-horizontal form-label-left input_mask">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">ID Pengurus</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="ID_Pengurus" value="<?php echo $pengurus['ID_Pengurus'];?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Nama Pengurus</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Nama_Pengurus" value="<?php echo $pengurus['Nama_Pengurus'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Jabatan</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" name="Kode_Jabatan">
											<option>--Pilih Jabatan--</option>
											<?php
												foreach($jabatan as $ambiljabatan) {
											?>				
											<option value="<?php echo $ambiljabatan['Kode_Jabatan'];?>" <?php if($pengurus['Kode_Jabatan'] == $ambiljabatan['Kode_Jabatan']){ echo "selected"; } ?>>
												<?php echo $ambiljabatan['Jabatan'];?>
											</option>				
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Tanggal Mulai Jabat</label>
									<div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
										<input type="text" class="form-control" name="Tanggal_Mulai_Jabat" id="Tanggal_Mulai_Jabat" value="<?php echo $pengurus['Tanggal_Mulai_Jabat'];?>">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Periode</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Periode" id="Periode" value="<?php echo $pengurus['Periode'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Status</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<p>
											<input type="radio" class="flat" name="Status" id="Status" value="Aktif" checked="" required /> Aktif
											<input type="radio" class="flat" name="Status" id="Status" value="Tidak Aktif" /> Tidak Aktif
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Alamat</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<textarea id="Alamat" class="form-control" name="Alamat" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"><?php echo $pengurus['Alamat'];?></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
										<button type="submit" class="btn btn-primary">Cancel</button>
										<input type="submit" class="btn btn-success" name="editdata" value="Edit">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

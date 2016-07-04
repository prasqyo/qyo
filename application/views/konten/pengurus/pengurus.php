<script type="text/javascript" src="<?php echo base_url(); ?>asset2/datetimepicker_css.js"></script>
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
					<h3 style="float:left;">Form Tambah Pengurus</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/pengurus"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo base_url();?>index.php/pengurus/tambah">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">ID Pengurus</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="ID_Pengurus" value="<?php echo $kodepengurus; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Nama Pengurus</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Nama_Pengurus">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Jabatan</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control" name="Kode_Jabatan">
											<option>--Pilih Jabatan--</option>
											<?php
												foreach($jabatan as $ambiljabatan) {
											?>					
											<option value="<?php echo $ambiljabatan['Kode_Jabatan'];?>">
												<?php echo $ambiljabatan['Jabatan'];?>
											</option>				
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Tanggal Mulai Jabat</label>
									<div class="col-md-8 col-sm-8 col-xs-12 xdisplay_inputx form-group has-feedback">
										<a href="javascript:NewCssCal('Tanggal_Mulai_Jabat','yyyymmdd')">
											<input type="text" class="form-control" name="Tanggal_Mulai_Jabat" id="Tanggal_Mulai_Jabat" required>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Periode</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control" name="Periode">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Status</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<p>
											<input type="radio" class="flat" name="Status" id="Status" value="Aktif" checked="" required /> Aktif
											<input type="radio" class="flat" name="Status" id="Status" value="Tidak Aktif" /> Tidak Aktif
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 col-sm-4 col-xs-12">Alamat</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<textarea id="Alamat" class="form-control" name="Alamat" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
										<button type="submit" class="btn btn-primary">Cancel</button>
										<input type="submit" class="btn btn-success" name="simpandata" value="Submit">
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
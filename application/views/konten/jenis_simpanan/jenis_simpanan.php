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
					<h3 style="float:left;">Form Jenis Simpanan</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url();?>index.php/jenis_simpanan"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo base_url();?>index.php/jenis_simpanan/tambah">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-5 col-sm-5 col-xs-12">Kode Jenis Simpanan</label>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<input type="text" class="form-control" name="Kode_Jenis_Simpanan" value="<?php echo $kodejenis;?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-5 col-sm-5 col-xs-12">Nama Simpanan</label>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<input type="text" class="form-control" name="Jenis_Simpanan" required="required">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-5 col-sm-5 col-xs-12">Nominal</label>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<input type="int" class="form-control" name="Nominal" required="required">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Keterangan</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<textarea id="Alamat_Rumah" required="required" class="form-control" name="Alamat_Rumah" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"></textarea>
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
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
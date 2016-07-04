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
					<h3 style="float:left;">Form Tambah Unit Kerja</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/unit_kerja"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo base_url();?>index.php/unit_kerja/tambah">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="col-md-3 col-sm-3 col-xs-12">ID Unit</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="ID_Unit" value="<?php echo $id_unit; ?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Unit Kerja</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="Unit_Kerja">
											</div>
										</div>
										<div class="ln_solid"></div>
											<div class="form-group">
											  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
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
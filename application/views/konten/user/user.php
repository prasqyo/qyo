<div class="right_col" role="main">
				<div class="page-title">
					<div class="title_left">
						<h3>User</h3>
					</div>
				</div>
				<div class="row">
					<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Form Tambah User</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a href="<?php echo base_url(); ?>index.php/user"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo base_url();?>index.php/user/tambah">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Username</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="Username">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="Nama_Lengkap">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Password</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="password" class="form-control" name="Password">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Level</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<p>
													<input type="radio" class="flat" name="Level" id="Level" value="1" checked="" required /> Admin
													<input type="radio" class="flat" name="Level" id="Level" value="2" style="margin-left:10px;" /> Pengurus
													<input type="radio" class="flat" name="Level" id="Level" value="3" style="margin-left:10px;" /> Ketua
												</p>
											</div>
										</div>
										<div class="ln_solid"></div>
											<div class="form-group">
											  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
												<button type="submit" class="btn btn-primary">Cancel</button>
												<input type="submit" class="btn btn-success" name="simpandata" value="Simpan">
											  </div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
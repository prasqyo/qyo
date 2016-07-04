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
								<h2>Form Edit User</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a href="<?php echo base_url(); ?>index.php/user"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<form method="post" action="<?php echo base_url();?>index.php/user/edit/<?php echo $user['Id'];?>"class="form-horizontal form-label-left input_mask" method="post" action="<?php echo base_url();?>index.php/jabatan/tambah">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">ID User</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="Id" value="<?php echo $user['Id'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Username</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="Username" value="<?php echo $user['Username'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Password</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="Password" value="<?php echo $user['Password'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-sm-3 col-xs-12">Level</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<p>
													<input type="radio" class="flat" name="Level" value="Admin" checked="" <?php if($user['Level'] == "Admin") { echo "checked"; }  ?> required /> Admin
													<input type="radio" class="flat" name="Level" value="Pengurus" <?php if($user['Level'] == "Pengurus") { echo "checked"; }  ?>/> Pengurus
													<input type="radio" class="flat" name="Level" value="Ketua" <?php if($user['Level'] == "Ketua") { echo "checked"; }  ?>/> Ketua
												</p>
											</div>
										</div>
										<div class="ln_solid"></div>
											<div class="form-group">
											  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
												<button type="reset" class="btn btn-primary">Cancel</button>
												<input type="submit" class="btn btn-success" name="editdata" value="Edit">
											  </div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

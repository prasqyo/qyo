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
					<h3 style="float:left;">View Keanggotaan</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><button type="button" onclick="window.print();" class="btn btn-default" style="margin-top:5px;"><i class="fa fa-print" style="margin-right:10px;"></i>Print</button></li>
						<li><a href="<?php echo base_url();?>index.php/anggota"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo base_url();?>index.php/anggota/detail/<?php echo $anggota['No_Anggota'];?>">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">No Anggota</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12" name="No_Anggota"><?php echo $anggota['No_Anggota'];?></label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">NIK</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12" name="NIK"><?php echo $anggota['NIK'];?></label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Nama Anggota</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12" name="Nama_Anggota"><?php echo $anggota['Nama_Anggota'];?></label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Tempat</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12" name="Tempat"><?php echo $anggota['Tempat'];?></label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Tanggal Lahir</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12" name="Tanggal_Lahir"><?php echo $anggota['Tanggal_Lahir'];?></label>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Tanggal Masuk Anggota</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12" name="Tanggal_Masuk_Anggota"><?php echo $anggota['Tanggal_Masuk_Anggota'];?></label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Jenis Kelamin</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12"><?php echo $anggota['Jenis_Kelamin'];?></label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Unit Kerja</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12">
											<?php 
												$uk = $anggota['ID_Unit'];
												$unit_kerja = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $uk));
												echo $unit_kerja['Unit_Kerja'];
											?> 
										</label>
									</div>
								</div>
								<div class="form-group" style="padding-bottom:10px;">
									<label class="col-md-6 col-sm-6 col-xs-12">Alamat</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="col-md-12 col-sm-12 col-xs-12"><?php echo $anggota['Alamat_Rumah'];?></label>
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
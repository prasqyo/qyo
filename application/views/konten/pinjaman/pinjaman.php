<script type="text/javascript" src="<?php echo base_url(); ?>asset2/datetimepicker_css.js"></script>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Transaksi Pinjaman</h3>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Transaksi Pinjaman</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/pinjaman"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/pinjaman/tambah" class="form-horizontal form-label-left input_mask">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Kode Transaksi Peminjaman</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Kode_Pinjaman_Header" id="Kode_Pinjaman_Header" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">No. Anggota</label>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<input type="text" class="form-control" name="No_Anggota" id="No_Anggota">
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12">
										<button type="reset" class="btn btn-primary">Cari</button>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Total Peminjaman</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Total_Pinjaman" id="Total_Pinjaman">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Tanggal Transaksi</label>
									<div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
										<a href="javascript:NewCssCal('Tgl_Pinjam','yyyymmdd')">
											<input type="text" class="form-control" name="Tgl_Pinjam" id="Tgl_Pinjam" required>
										</a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Nama_Anggota" id="Nama_Anggota">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
									<button type="reset" class="btn btn-primary">Cancel</button>
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
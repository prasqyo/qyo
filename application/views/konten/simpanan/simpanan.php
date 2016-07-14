<script type="text/javascript" src="<?php echo base_url(); ?>asset2/datetimepicker_css.js"></script>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Transaksi Simpanan</h3>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Transaksi Simpanan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/simpanan"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/simpanan/tambah" class="form-horizontal form-label-left input_mask">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Kode Transaksi</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Kode_Simpanan_Header" id="Kode_Simpanan_Header">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">No Anggota</label>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<select class="form-control" name="No_Anggota">
											<option>--Pilih Anggota--</option>
											<option value="">
											</option>		
											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Tanggal Transaksi</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<a href="javascript:NewCssCal('Tgl_Transaksi','yyyymmdd')">
											<input type="text" class="form-control" name="Tgl_Transaksi" id="Tgl_Transaksi">
										</a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-12">Total Simpanan</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" name="Total_Simpanan" id="Total_Simpanan" readonly>
									</div>
								</div>
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
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/simpanan/tambah_detail" class="form-horizontal form-label-left input_mask">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12">Nominal Simpanan</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="hidden" class="form-control" name="Kode_Jenis_Simpanan[1]" value="JS002">
									<input type="hidden" class="form-control" name="Kode_Simpanan_Header[1]">
									<input type="text" class="form-control" name="Kode_Simpanan_Detail[1]">
									<input type="text" class="form-control" name="Nominal_Simpanan[1]" autofocus placeholder="Simpanan Wajib">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="hidden" class="form-control" name="Kode_Simpanan_Header[2]">
									<input type="text" class="form-control" name="Kode_Simpanan_Detail[2]">
									<input type="hidden" class="form-control" name="Kode_Jenis_Simpanan[2]" value="JS003">
									<input type="text" class="form-control" name="Nominal_Simpanan[2]" placeholder="Simpanan Pokok">
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="hidden" class="form-control" name="Kode_Simpanan_Header[3]">
									<input type="text" class="form-control" name="Kode_Simpanan_Detail[3]">
									<input type="hidden" class="form-control" name="Kode_Jenis_Simpanan[3]" value="JS001">
									<input type="text" class="form-control" name="Nominal_Simpanan[3]" placeholder="Simpanan Sukarela" >
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
									<button type="reset" class="btn btn-primary">Cancel</button>
									<input type="submit" class="btn btn-success" name="simpandetail" value="Simpan">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> 
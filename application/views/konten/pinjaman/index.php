<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Peminjaman</h3>
		</div>
	</div>
	<div class="row">
		<div class="animated fadeInRight col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>List Transaksi Pinjaman Anggota</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/pinjaman/tambah"><button type="button" class="btn btn-default"><i class="fa fa-plus" style="margin-right:10px;"></i>Tambah Data Pinjaman</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
						<thead>
							<tr class="headings">
								<th class="column-title">#</th>
								<th class="column-title">Kode Pinjaman</th>
								<th class="column-title">Tanggal Transaksi</th>
								<th class="column-title">No Anggota </th>
								<th class="column-title">Nama Anggota </th>
								<th class="column-title">Total Pinjaman (Rp)</th>
								<th class="column-title no-link last"><span class="nobr">Action</span></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$No=1;
								foreach ($pinjaman as $ambilpinjaman){
							?>
							<tr class="even pointer record" data-id="<?php echo $ambilpinjaman['Kode_Pinjaman_Header'];?>">
								<td class="a-center"><?php echo $No;?></td>
								<td class=" "><?php echo $ambilanggota['Kode_Pinjaman_Header'];?></td>
								<td class=" "><?php echo $ambilanggota['Tanggal_Transaksi'];?></td>
								<td class=" "><?php echo $ambilanggota['No_Anggota'];?> </td>
								<td class=" "><?php echo $ambilanggota['Nama_Anggota'];?></td>
								<td class=" "><?php echo $ambilanggota['Total_Pinjaman'];?></td>
								<td class="last">
									<button type="button" class="detailbutton btn btn-primary btn-xs">Detail</button>
									<button type="button" class="editbutton btn btn-success btn-xs">Edit</button>
									<button class="btndelete btn btn-danger btn-xs">Hapus</button>
								</td>
							</tr>
							<?php $No++; } ?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
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
					<h3 style="float:left;">List Anggota</h3>
					<ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url(); ?>index.php/unit_kerja"><button type="button" class="btn btn-default"><i class="fa fa-list-ul" style="margin-right:10px;"></i>Kembali Ke Halaman List</button></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="<?php echo base_url();?>index.php/unit_kerja/detail/">
						<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">#</th>
									<th class="column-title">No. Anggota</th>
									<th class="column-title">Nama Anggota</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$No=1;
									foreach($detailunit as $detaill) { 
								?>
								<tr class="btndelete even pointer record">
									<td class="a-center"><?php echo $No;?></td>
									<td class=" "><?php echo $detaill['No_Anggota'];?> </td>
									<td class=" "><?php echo $detaill['Nama_Anggota'];?> </td>
								</tr>		
									<?php $No++; }?>		
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
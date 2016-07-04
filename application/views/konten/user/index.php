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
								<h2>List Data User</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a href="<?php echo base_url(); ?>index.php/user/tambah"><button type="button" class="btn btn-default"><i class="fa fa-plus" style="margin-right:10px;"></i>Tambah Data User</button></a></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<form method="post" action="<?php echo base_url();?>index.php/user/hapus">
									<table id="datatable" class="table table-striped responsive-utilities jambo_table bulk_action">
										<thead>
										  <tr class="headings">
											<th class="column-title">#</th>
											<th class="column-title">Username</th>
											<th class="column-title">Password</th>
											<th class="column-title no-link last"><span class="nobr">Action</span>
											</th>
										  </tr>
										</thead>
										<tbody>
										<?php
											$No=1;
											foreach ($user as $ambiluser){
										?>
											<tr class="even pointer record" data-id="<?php echo $ambiluser['Id'];?>">
												<td class="a-center"><?php echo $No;?></td>
												<td class=" "><?php echo $ambiluser['Username'];?> </td>
												<td class=" "><?php echo $ambiluser['Password'];?> </td>
												<td class=" last">
													<button type="button" class="editbutton btn btn-success btn-xs">Edit</button>
													<button class="btndelete btn btn-danger btn-xs">Hapus</button>
												</td>
											</tr>
											
										<?php $No++; } ?>
										
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$('button.btndelete').on('click', function (e) {
				    e.preventDefault();
				    var id = $(this).closest('tr').data('id');
				    window.location.href = '<?php echo base_url();?>index.php/user/hapus/'+id;

				});
				$('button.editbutton').on('click', function (e) {
				    e.preventDefault();
				    var id = $(this).closest('tr').data('id');
				    window.location.href = '<?php echo base_url();?>index.php/user/tampil/'+id;

				});
			</script>
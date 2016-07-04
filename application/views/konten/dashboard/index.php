<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h2><i class="fa fa-home"></i>&nbsp;&nbsp;Dashboard</h2>
		</div>
	</div>
	<div class="row tile_count">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-11" style="margin-top:30px; margin-left:25px;">
            <div class="tile-stats">
				<div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?php echo $this->db->count_all_results('pengurus');?></div>
				<h3>Total Pengurus</h3>
				<p>Koperasi Karyawan DKB Kantor Pusat</p>
			</div>
        </div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-11" style="margin-top:30px; margin-left:25px;">
            <div class="tile-stats">
				<div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                <div class="count"><?php echo $this->db->count_all_results('anggota');?></div>
				<h3>Total Anggota</h3>
				<p>Koperasi Karyawan DKB Kantor Pusat</p>
			</div>
        </div>
		<div class="animated flipInY col-lg-5 col-md-5 col-sm-5 col-xs-11" style="margin-top:30px; margin-left:25px;">
            <div class="tile-stats">
				<div class="icon"><i class="fa fa-calendar"></i></div>
                <div class="count">10-10-2016</div>
				<h3>Update Terakhir</h3>
				<p>Koperasi Karyawan DKB Kantor Pusat</p>
			</div>
        </div>
	</div>
</div>

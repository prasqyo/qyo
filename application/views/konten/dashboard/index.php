<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Banyak Data Anggota</span>
    <div class="count green">
      <?php
      $getcount = count($this->global_model->find_all('anggota'));
      echo $getcount;
      ?>
    </div>
    <span class="count_bottom">Koperasi DKB Pusat</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Banyak Data Pengurus</span>
    <div class="count green">
      <?php
      $getcount = count($this->global_model->find_all('pengurus'));
      echo $getcount;
      ?>
    </div>
    <span class="count_bottom">Koperasi DKB Pusat</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Banyak Data Simpanan</span>
    <div class="count green">
      <?php
      $getcount = count($this->global_model->find_all('simpanpokok'));
      $getcount2 = count($this->global_model->find_all('simpanwajib'));
      $getcount3 = count($this->global_model->find_all('simpansukarela'));
      echo intval($getcount+$getcount2+$getcount3);
      ?>
    </div>
    <span class="count_bottom">Koperasi DKB Pusat</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Banyak Data Pinjaman</span>
    <div class="count green">
      <?php
      $getcount = count($this->global_model->find_all('pinjaman'));
      echo $getcount;
      ?>
    </div>
    <span class="count_bottom">Koperasi DKB Pusat</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Banyak Data Angsuran</span>
    <div class="count green">
      <?php
      $getcount = count($this->global_model->find_all('angsuran_pinjam'));
      echo $getcount;
      ?>
    </div>
    <span class="count_bottom">Koperasi DKB Pusat</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Banyak Data User</span>
    <div class="count green">
      <?php
      $getcount = count($this->global_model->find_all('user'));
      echo $getcount;
      ?>
    </div>
    <span class="count_bottom">Koperasi DKB Pusat</span>
  </div>
</div>
<!-- /top tiles -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row x_title">
      <div class="col-md-6">
        <h3>Hallo User! <small>Selamat datang di koperasi DKB kantor pusat</small></h3>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>

</div>
<br />
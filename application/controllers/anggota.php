<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){
 		$data['anggota'] = $this->global_model->find_all('anggota');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

 	//fungsi ini untuk generate message
 	public function message($mode,$text,$active)
 	{
 		//generate message
 		$messagesession = array(
 			'messagemode' => $mode,
 			'messagetext' => $text,
 			'messageactive' => $active);

 		$this->session->set_flashdata($messagesession);
 	}
	
	public function tambah(){
		if($this->input->post('simpan')){

			/*generate kode anggota,simpanpokok,user*/
 			$sql = $this->global_model->query("select *from anggota order by No_Anggota desc");
 			$sql2 = $this->global_model->query("select *from simpanpokok order by kode_transaksi desc");
 			$sql3 = $this->global_model->query("select *from user order by kode_user desc");
 			$kode = "ANG";
 			$kode2 = "TR";
 			$kode3 = "USR";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['No_Anggota']);
 				$number =  (int) $pisah[1];
 				$digit = intval($number) + 1;

 				if ($digit >= 1 and $digit <= 9){
					$a = $kode."-00".$digit;
	 			}else if($digit >= 10 and $digit <= 99){
	 				$a = $kode."-0".$digit;
	 			}else{
	 				$a = $kode."-".$digit;
	 			}

 			}else{
 				$kodedefault = "ANG-001";
 				$a = $kodedefault;
 			}

 			if($sql2 != Null){
 				$pisah2 = explode('-', $sql2[0]['kode_transaksi']);
 				$number2 =  (int) $pisah2[1];
 				$digit2 = intval($number2) + 1;

 				if ($digit2 >= 1 and $digit2 <= 9){
					$ab = $kode2."-00".$digit2;
	 			}else if($digit2 >= 10 and $digit2 <= 99){
	 				$ab = $kode2."-0".$digit2;
	 			}else{
	 				$ab = $kode2."-".$digit2;
	 			}

 			}else{
 				$kodedefault2 = "TR-001";
 				$ab = $kodedefault2;
 			}

 			if($sql3 != Null){
 				$pisah3 = explode('-', $sql3[0]['kode_user']);

 				$number3 =  (int) $pisah3[1];
 				$digit3 = intval($number3) + 1;

 				if ($digit3 >= 1 and $digit3 <= 9){
					$ac = $kode3."-00".$digit3;
	 			}else if($digit3 >= 10 and $digit3 <= 99){
	 				$ac = $kode3."-0".$digit3;
	 			}else{	 				
	 				$ac = $kode3."-".$digit3;
	 			}

 			}else{
 				$kodedefault3 = "ANR-001";
 				$ac = $kodedefault3;
 			}
 			/* akhir generate kode anggota*/

 			/*generate username dan password*/
 			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 			$length = 10;
    		$charactersLength = strlen($characters);
    		$randomString = '';
    		for ($i = 0; $i < $length; $i++) {
        		$randomString .= $characters[rand(0, $charactersLength - 1)];
    		}
 			

 			/* generate tanggal input anggota */
 			date_default_timezone_set('Asia/Jakarta');
 			$getdatetime = date('m/d/Y H:i:s',time());
 			$getdatetime2 = date('d/m/Y H:i:s',time());

 			$pisah = explode(' ',$getdatetime);
 			list($bulan,$tanggal,$tahun) = explode('/', $pisah[0]);
 			$tanggalinput = $tahun."-".$bulan."-".$tanggal;

 			$pisah2 = explode(' ',$getdatetime2);
 			list($tanggal2,$bulan2,$tahun2) = explode('/', $pisah2[0]);
 			/* akhir generate tanggal input anggota */

 			//ganti format inputan ke format tanggal database
 			list($tanggal1,$bulan1,$tahun1) = explode('/', $this->input->post('Tanggal_Lahir'));
 			$tanggallahir = $tahun1."-".$bulan1."-".$tanggal1;

 			$namabulan = array(
 				'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus',
 				'September','Oktober','November','Desember');

 			$c = intval($bulan2);

 			//variable untuk cek
 			$listfield = array('NIK');
 			$listdata = array($this->input->post('NIK'));
 			$listtext = array('NIK');

 			//variable untuk message error
 			$texterror = "";

 			if($this->input->post('NIK')=="" && $this->input->post('Nama_Anggota')==""){
 				$this->message('error','NIK atau Nama anggota tidak boleh kosong','tambahanggota');
 			}else{
 				//cek data sama atau tidak
 				for($i = 0; $i < count($listfield); $i++){
 					$sql = $this->global_model->find_all_by('anggota', array($listfield[$i] => $listdata[$i]));
 					if(count($sql) > 0){
 						$texterror = $texterror." ".$listtext[$i];
 					}
 				}

 				if($texterror != ""){
 					$this->message('error',$texterror.' anggota sudah ada','tambahanggota');

 				}else if($texterror == ""){
 					$getsimpanpokok = $this->global_model->find_by('settingnominalsimpanan', array('id' => 1));
 					//kumpulkan data yang ada dalam suatu array untuk anggota
		 			$kumpuldata = array(
		 				'No_Anggota' => $a,
		 				'ID_Unit' => $this->input->post('ID_Unit'),
		 				'NIK' => $this->input->post('NIK'),
		 				'Nama_Anggota' => $this->input->post('Nama_Anggota'),
		 				'Tempat' => $this->input->post('Tempat'),
		 				'Tanggal_Lahir' => $tanggallahir,
		 				'Tanggal_Masuk_Anggota' => $tanggalinput,
		 				'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin'),
		 				'Alamat_Rumah' => $this->input->post('Alamat_Rumah'),
		 				'Status' => 'Anggota',
		 				'simpansukarela' => $this->input->post('simpansukarela'),
		 				'kode_user' => $ac);

		 			//insert kedalam database melalui model
		 			$this->global_model->create('anggota', $kumpuldata);

		 			//kumpulkan data yang ada dalam suatu array untuk simpanpokok
		 			$kumpuldata2 = array(
		 				'kode_transaksi' => $ab,
		 				'No_Anggota' => $a,
		 				'tanggal_transaksi' => $getdatetime2,
		 				'nominal' => $getsimpanpokok['simpan_pokok'],
		 				'Bulan' => $namabulan[$c-1],
		 				'Tahun' => $tahun2);
		 			$this->global_model->create('simpanpokok', $kumpuldata2);

		 			$kumpuldata3 = array(
		 				'kode_user' => $ac,
		 				'Nama_Lengkap' => $this->input->post('Nama_Anggota'),
		 				'Username' => $randomString,
		 				'Password' => md5($randomString),
		 				'Level' => '4');

		 			$this->global_model->create('user', $kumpuldata3);

		 			//memberikan pesan
		 			$this->message('success','Data berhasil di tambah','tambahanggota');
 				}
 			}

 			//redirect setelah sudah tersimpan
 			redirect(site_url('anggota/tambah'));
		}

		//load view
		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/tambah', $data);
 		$this->load->view('footer/dashboard/index');
		
	}

	public function edit($id){
		if($this->input->post('simpan')){

			//ganti format inputan ke format tanggal database
 			list($tanggal,$bulan,$tahun) = explode('/', $this->input->post('Tanggal_Lahir'));
 			$tanggallahir = $tahun."-".$bulan."-".$tanggal;

			//select data berdasarkan id data
			$getdata = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
 			if($this->input->post('NIK')=="" && $this->input->post('Nama_Anggota')==""){
 				$this->message('error','NIK atau Nama anggota tidak boleh kosong','ubahanggota');
 			}else{
 				//cek data sama atau tidak
 				$sql = $this->global_model->find_all_by('anggota', array('NIK' => $this->input->post('NIK')));
 				if(count($sql) > 0 && $this->input->post('NIK') != $getdata['NIK']){
 					$this->message('error','NIK anggota sudah ada','ubahanggota');
 				}else{
 					//kumpulkan data yang ada dalam suatu array
		 			$kumpuldata = array(
	 				'ID_Unit' => $this->input->post('ID_Unit'),
	 				'NIK' => $this->input->post('NIK'),
	 				'Nama_Anggota' => $this->input->post('Nama_Anggota'),
	 				'Tempat' => $this->input->post('Tempat'),
	 				'Tanggal_Lahir' => $tanggallahir,
	 				'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin'),
	 				'Alamat_Rumah' => $this->input->post('Alamat_Rumah'),
		 			'simpansukarela' => $this->input->post('simpansukarela'));

	 				//update ke database
		 			$this->global_model->update('anggota', $kumpuldata, array('No_Anggota' => $id));

		 			$kumpuldata2 = array(
		 				'Nama_Lengkap' => $this->input->post('Nama_Anggota'));

		 			//update ke database
		 			$this->global_model->update('user', $kumpuldata2, array('kode_user' => $getdata['kode_user']));

		 			//memberikan pesan
		 			$this->message('success','Data berhasil di edit','ubahanggota');
 				}
 			}

 			//redirect
 			redirect(site_url('anggota/edit/'.$id));
		}

		$data['load'] = $this->global_model->find_by('anggota',array('No_Anggota' => $id));
		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/edit',$data);
 		$this->load->view('footer/dashboard/index');
		
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('anggota', array('No_Anggota' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexanggota');

	 	redirect(site_url('anggota'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('anggota', array('No_Anggota' => $id));

 		$a = $sql['Tanggal_Lahir'];
 		list($tahun,$bulan,$tanggal) = explode('-', $a);
 		$sql['Tanggal_Lahir'] = $tanggal."/".$bulan."/".$tahun;
 		$b = $sql['Tanggal_Masuk_Anggota'];
 		list($tahun2,$bulan2,$tanggal2) = explode('-', $b);
 		$sql['Tanggal_Masuk_Anggota'] = $tanggal2."/".$bulan2."/".$tahun2;

 		$c = $sql['ID_Unit'];
 		$check = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $c));
 		$sql['ID_Unit'] = $check['Unit_Kerja'];

 		echo json_encode($sql);
 	}

 	public function cetak($id){
 		$sql = $this->global_model->find_by('anggota', array('No_Anggota' => $id));

 		$a = $sql['Tanggal_Lahir'];
 		list($tahun,$bulan,$tanggal) = explode('-', $a);
 		$sql['Tanggal_Lahir'] = $tanggal."/".$bulan."/".$tahun;
 		$b = $sql['Tanggal_Masuk_Anggota'];
 		list($tahun2,$bulan2,$tanggal2) = explode('-', $b);
 		$sql['Tanggal_Masuk_Anggota'] = $tanggal2."/".$bulan2."/".$tahun2;

 		$data['load'] = $sql;
 		$this->load->view('konten/laporan/cetakanggota', $data);
 	}

}
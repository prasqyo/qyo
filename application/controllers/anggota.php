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

			/*generate kode anggota,simpanpokok */
 			$sql = $this->global_model->query("select *from anggota order by No_Anggota desc");
 			$sql2 = $this->global_model->query("select *from simpanpokok order by kode_transaksi desc");
 			$kode = "ANG";
 			$kode2 = "TR";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['No_Anggota']);

 				$number =  (int) $pisah[1];
 				$digit = intval($number) + 1;

 				if ($digit >= 1 and $digit <= 9){
					$a = $kode."-00".$digit;
					$ab = $kode2."-00".$digit;
	 			}else if($digit >= 10 and $digit <= 99){
	 				$a = $kode."-0".$digit;
	 				$ab = $kode2."-0".$digit;
	 			}else{
	 				$a = $kode."-".$digit;
	 				$ab = $kode2."-".$digit;
	 			}

 			}else{
 				$kodedefault = "ANG-001";
 				$kodedefault2 = "TR-001";
 				$a = $kodedefault;
 				$ab = $kodedefault2;
 			}
 			/* akhir generate kode anggota*/

 			/* generate tanggal input anggota */
 			date_default_timezone_set('Asia/Jakarta');
 			$getdatetime = date('m/d/Y H:i:s',time());
 			$getdatetime2 = date('d/m/Y H:i:s',time());

 			$pisah = explode(' ',$getdatetime);

 			list($bulan,$tanggal,$tahun) = explode('/', $pisah[0]);

 			$tanggalinput = $tahun."-".$bulan."-".$tanggal;
 			/* akhir generate tanggal input anggota */

 			//ganti format inputan ke format tanggal database
 			list($tanggal,$bulan,$tahun) = explode('/', $this->input->post('Tanggal_Lahir'));
 			$tanggallahir = $tahun."-".$bulan."-".$tanggal;

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
		 				'simpansukarela' => $this->input->post('simpansukarela'));

		 			//insert kedalam database melalui model
		 			$this->global_model->create('anggota', $kumpuldata);

		 			//kumpulkan data yang ada dalam suatu array untuk simpanpokok
		 			$kumpuldata2 = array(
		 				'kode_transaksi' => $ab,
		 				'No_Anggota' => $a,
		 				'tanggal_transaksi' => $getdatetime2,
		 				'nominal' => $getsimpanpokok['simpan_pokok']);
		 			$this->global_model->create('simpanpokok', $kumpuldata2);

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
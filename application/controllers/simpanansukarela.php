<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simpanansukarela extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');

 		if(!$this->session->userdata('Nama_Lengkap','Username','Level','kode_user'))
	    {
	      redirect(site_url('/'));
	    }
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

 	public function index(){
 		if($this->session->userdata('Level')=="4"){
 			$id = $this->session->userdata('No_Anggota');
 			$check = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
	 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check['ID_Unit']));
	 		$data['detailsimpanan'] = $this->global_model->find_all_by('simpansukarela', array('No_Anggota' => $id));
	 		$data['noanggota']  = $check['No_Anggota'];
	 		$data['nik']  = $check['NIK'];
	 		$data['namaanggota']  = $check['Nama_Anggota'];
	 		$data['unit']  = $checkunit['Unit_Kerja'];

			//load view
	 		$this->load->view('head/dashboard/index');
	 		$this->load->view('konten/simpanansukarela/detail',$data);
	 		$this->load->view('footer/dashboard/index');
 		}else{
 			$data['simpansukarela'] = $this->global_model->query('select *from simpansukarela group by No_Anggota');
	 		$data['anggota'] = $this->global_model->find_all('anggota');
			//load view
	 		$this->load->view('head/dashboard/index');
	 		$this->load->view('konten/simpanansukarela/index',$data);
	 		$this->load->view('footer/dashboard/index');
 		}

 	}

 	public function detail($id){
 		$check = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check['ID_Unit']));
 		$data['detailsimpanan'] = $this->global_model->find_all_by('simpansukarela', array('No_Anggota' => $id));
 		$data['noanggota']  = $check['No_Anggota'];
 		$data['nik']  = $check['NIK'];
 		$data['namaanggota']  = $check['Nama_Anggota'];
 		$data['unit']  = $checkunit['Unit_Kerja'];

		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpanansukarela/detail',$data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function cetak($id){
 		$check = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check['ID_Unit']));
 		$data['detailsimpanan'] = $this->global_model->find_all_by('simpansukarela', array('No_Anggota' => $id));
 		$data['noanggota']  = $check['No_Anggota'];
 		$data['nik']  = $check['NIK'];
 		$data['namaanggota']  = $check['Nama_Anggota'];
 		$data['unit']  = $checkunit['Unit_Kerja'];

		//load view
 		$this->load->view('konten/laporan/cetaksimpanansukarela',$data);

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode transaksi */
 			$sql = $this->global_model->query("select *from simpansukarela order by kode_transaksi desc");
 			$kode = "TR";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['kode_transaksi']);

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
 				$kodedefault = "TR-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode transaksi*/

 			/* generate waktu input */
 			date_default_timezone_set('Asia/Jakarta');
 			$getdatetime = date('H:i:s',time());
 			/* akhir generate waktu input*/
 			list($bulan,$tanggal,$tahun) = explode('/', $this->input->post('tanggal_transaksi'));
 			$tanggaltransaksi = $tanggal.'/'.$bulan.'/'.$tahun;

 			$namabulan = array(
 				'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus',
 				'September','Oktober','November','Desember');

 			$c = intval($bulan);

			$data = $this->input->post();
			$data['kode_transaksi'] = $a;
			$data['tanggal_transaksi'] = $tanggaltransaksi;
			$data['waktu'] = $getdatetime;
			$data['Bulan'] = $namabulan[$c-1];
			$data['Tahun'] = $tahun;
			unset($data['simpan']);
			$this->global_model->create('simpansukarela',$data);
			$this->message('success','Data berhasil di tambah','indexsimpansukarela');
			redirect(site_url('simpanansukarela'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->update('unit_kerja',$data, array('ID_Unit' => $id));
			$this->message('success','Data berhasil di edit','indexunitkerja');
			redirect(site_url('unit_kerja'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('simpansukarela', array('No_Anggota' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexsimpansukarela');

	 	redirect(site_url('simpanansukarela'));
	}
}
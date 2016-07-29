<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

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
 		$data['pinjaman'] = $this->global_model->query('select *from pinjaman group by No_Anggota');
 		$data['anggota'] = $this->global_model->find_all('anggota');
 		$data['cicilan'] = $this->global_model->find_all('cicilan');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pinjaman/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function detail($id){
 		$check = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check['ID_Unit']));
 		$data['detailsimpanan'] = $this->global_model->find_all_by('pinjaman', array('No_Anggota' => $id));
 		$data['noanggota']  = $check['No_Anggota'];
 		$data['nik']  = $check['NIK'];
 		$data['namaanggota']  = $check['Nama_Anggota'];
 		$data['unit']  = $checkunit['Unit_Kerja'];

		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pinjaman/detail',$data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function cetak($id){
 		$check = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check['ID_Unit']));
 		$data['detailsimpanan'] = $this->global_model->find_all_by('pinjaman', array('No_Anggota' => $id));
 		$data['noanggota']  = $check['No_Anggota'];
 		$data['nik']  = $check['NIK'];
 		$data['namaanggota']  = $check['Nama_Anggota'];
 		$data['unit']  = $checkunit['Unit_Kerja'];

		//load view
 		$this->load->view('konten/laporan/cetakpinjaman',$data);

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode transaksi */
 			$sql = $this->global_model->query("select *from pinjaman order by kode_transaksi desc");
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
 			$getdatetime = date('d/m/Y H:i:s',time());
 			/* akhir generate waktu input*/

 			list($tanggal,$bulan,$tahun) = explode('/', $getdatetime);

 			$namabulan = array(
 				'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus',
 				'September','Oktober','November','Desember');

 			$c = intval($bulan);

 			$checkdurasi = $this->global_model->find_by('cicilan',array('kode_cicilan' => $this->input->post('jangka_waktu')));
 			$banyak = intval($checkdurasi['jangka_waktu']*12);

			$data = $this->input->post();
			$data['kode_transaksi'] = $a;
			$data['tanggal_transaksi'] = $getdatetime;
			$data['banyak_cicilan'] = $banyak;
			$data['bulan'] = $namabulan[$c-1];
			$data['tahun'] = $tahun;
			$data['status'] = "aktif";
			unset($data['simpan']);
			$this->global_model->create('pinjaman',$data);
			$this->message('success','Data berhasil di tambah','indexpinjaman');
			redirect(site_url('pinjaman'));
		}
		
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('pinjaman', array('No_Anggota' => $chkbox[$i]));
	 			$this->global_model->delete('angsuran_pinjam', array('No_Anggota' => $chkbox[$i]));
	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexpinjaman');

	 	redirect(site_url('pinjaman'));
	}
}
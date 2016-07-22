<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Angsuran extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
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
 		$this->load->view('konten/angsuran/index', $data);
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
 		$this->load->view('konten/angsuran/detail',$data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function rincian($id){
 		$check = $this->global_model->find_by('angsuran_pinjam', array('kode_transaksi' => $id));
 		$check1 = $this->global_model->find_by('anggota', array('No_Anggota' => $check['No_Anggota']));
 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check1['ID_Unit']));
 		$data['detailsimpanan'] = $this->global_model->find_all_by('angsuran_pinjam', array('kode_transaksi' => $id));
 		$data['noanggota']  = $check1['No_Anggota'];
 		$data['nik']  = $check1['NIK'];
 		$data['namaanggota']  = $check1['Nama_Anggota'];
 		$data['unit']  = $checkunit['Unit_Kerja'];
 		$data['kodeangsuran']  = $check['kode_angsuran'];

		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/angsuran/rincian',$data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function cetak($id){
 		$check = $this->global_model->find_by('angsuran_pinjam', array('kode_transaksi' => $id));
 		$check1 = $this->global_model->find_by('anggota', array('No_Anggota' => $check['No_Anggota']));
 		$checkunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $check1['ID_Unit']));
 		$data['detailsimpanan'] = $this->global_model->find_all_by('angsuran_pinjam', array('kode_transaksi' => $id));
 		$data['noanggota']  = $check1['No_Anggota'];
 		$data['nik']  = $check1['NIK'];
 		$data['namaanggota']  = $check1['Nama_Anggota'];
 		$data['unit']  = $checkunit['Unit_Kerja'];
 		$data['kodeangsuran']  = $check['kode_angsuran'];

		//load view
 		$this->load->view('konten/laporan/cetakangsuran',$data);

 	}

	public function tampilan($id){
		$check = $this->global_model->find_by('pinjaman', array('kode_transaksi' => $id));
		$getcicilan = $this->global_model->find_by('cicilan', array('kode_cicilan' => $check['kode_cicilan']));
		$data = array(
			'kode_transaksi' => $check['kode_transaksi'],
			'tanggal_transaksi' => $check['tanggal_transaksi'],
			'nominal' => $getcicilan['nominal'],
			'nominal_cicilan' => $getcicilan['nominal_cicilan']);

		echo json_encode($data);
	}

	public function tambahangsuran($id){
		/*generate kode angsuran */
 			$sql = $this->global_model->query("select *from angsuran_pinjam order by kode_angsuran desc");
 			$kode = "AP";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['kode_angsuran']);

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
 				$kodedefault = "AP-001";
 				$a = $kodedefault;
 			}
 		/* akhir generate kode angsuran*/

 		/* generate waktu input */
 			date_default_timezone_set('Asia/Jakarta');
 			$getdatetime = date('d/m/Y H:i:s',time());
 		/* akhir generate waktu input*/

		$check = $this->global_model->find_by('pinjaman', array('kode_transaksi' => $id));
		$check2 = $this->global_model->find_by('cicilan', array('kode_cicilan' => $check['kode_cicilan']));
		$kumpuldata = array(
			'kode_angsuran' => $a,
			'kode_transaksi' => $check['kode_transaksi'],
			'No_Anggota' => $check['No_Anggota'],
			'tanggal_angsuran' => $getdatetime,
			'kode_cicilan' => $check['kode_cicilan'],
			'nominal' => $check2['nominal_cicilan']);

		$this->global_model->create('angsuran_pinjam', $kumpuldata);

		redirect(site_url('angsuran/detail/'.$check['No_Anggota']));
	}


}
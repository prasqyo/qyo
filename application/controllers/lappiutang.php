<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lappiutang extends CI_Controller {

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

 	public function index(){
 		$data['anggota'] = $this->global_model->find_all('anggota');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/lappiutang/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function cetak(){
 		if($this->input->post('noanggota')!= "all"){
	 		$getdataanggota = $this->global_model->find_by('anggota', array('No_Anggota' => $this->input->post('noanggota')));

	 		$getdataunit = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $getdataanggota['ID_Unit']));

	 		$data['noanggota'] = $getdataanggota['No_Anggota'];
	 		$data['namaanggota'] = $getdataanggota['Nama_Anggota'];
	 		$data['namaunit'] = $getdataunit['Unit_Kerja'];
	 		$data['bulan'] = $this->input->post('bulan');
	 		$data['tahun'] = $this->input->post('tahun');

	 		$sql = "select *from pinjaman where Bulan='".$this->input->post('bulan')."' and Tahun='".$this->input->post('tahun')."' and status='aktif' and No_Anggota='".$getdataanggota['No_Anggota']."'";

 			$data['detailsimpanan'] = $this->global_model->query($sql);
	 		//load view
 			$this->load->view('konten/lappiutang/cetak',$data);
 		}else{
 			$data['bulan'] = $this->input->post('bulan');
	 		$data['tahun'] = $this->input->post('tahun');

	 		$sql = "select *from pinjaman where Bulan='".$this->input->post('bulan')."' and Tahun='".$this->input->post('tahun')."' and status='aktif'";

 			$data['detailsimpanan'] = $this->global_model->query($sql);

 			//load view
 			$this->load->view('konten/lappiutang/cetak2',$data);
 		}
 	}
 }
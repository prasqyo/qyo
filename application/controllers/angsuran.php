<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Angsuran extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){
 		$data['angsuran'] = $this->global_model->find_all('angsuran_pinjam');
		
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/angsuran/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function tambah(){
		if($this->input->post('simpandata')){
			$data = $this->input->post();

			unset($data['simpandata']);
			$this->global_model->create('simpanan', $data);
		}
		
		$data['simpanan'] = $this->global_model->find_all('simpanan_header');
		$data['jenis_simpan'] = $this->global_model->find_all('jenis_simpanan');
		$data['carianggota'] = $this->global_model->find_all('anggota');
		
		//load database
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpanan/simpanan', $data);
 		$this->load->view('footer/dashboard/index');
	}

 	public function hapus($id){
		$this->global_model->delete('simpanan', array('Kode_Simpanan_Header' => $id));

		redirect(site_url('simpanan'));
	}


}
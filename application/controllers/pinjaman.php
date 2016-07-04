<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){

 		$data['pinjaman'] = $this->global_model->find_all('pinjaman_header');
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pinjaman/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function tambah(){
		if($this->input->post('pinjamdata')){
			$data = $this->input->post();

			unset($data['pinjamdata']);
			$this->global_model->create('pinjaman', $data);
		}
		
		$data['pinjaman'] = $this->global_model->find_all('pinjaman_header');
		
		//load database
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pinjaman/pinjaman', $data);
 		$this->load->view('footer/dashboard/index');
	}

 	public function hapus($id){
		$this->global_model->delete('pinjaman_header', array('Kode_Pinjaman_Header' => $id));

		redirect(site_url('pinjaman'));
	}


}
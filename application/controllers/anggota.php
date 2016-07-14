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
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/index');
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/anggota');
 		$this->load->view('footer/dashboard/index');
		
	}

	public function edit($id){
		redirect(site_url('anggota'));
	}
	
	public function hapus($id){
		$this->global_model->delete('anggota', array('No_Anggota' => $id));

		redirect(site_url('anggota'));
	}
	
	public function detail($id){
		$data['anggota'] = $this->global_model->find_by('anggota', array('No_Anggota' => $id));

		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/detail', $data);
 		$this->load->view('footer/dashboard/index');
		
	}

}
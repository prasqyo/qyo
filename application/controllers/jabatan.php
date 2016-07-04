<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){

 		$data['jabatan'] = $this->global_model->find_all('jabatan');

 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jabatan/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

	public function tambah(){
 		if($this->input->post('simpandata')){
 			$data = $this->input->post();

 			unset($data['simpandata']);
 			$this->global_model->create('jabatan', $data);
			
			redirect(site_url('jabatan'));
 		}
		
		$data['jabatan'] = $this->global_model->get_kodejab();
		
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jabatan/jabatan', $data);
 		$this->load->view('footer/dashboard/index');
 	}

 	public function tampil($id){
		$data['jabatan'] = $this->global_model->find_by('jabatan', array('Kode_Jabatan' => $id));

		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jabatan/edit', $data);
 		$this->load->view('footer/dashboard/index');
	}

	public function edit($id){
		if($this->input->post('editdata')){
			$data = $this->input->post();

			unset($data['editdata']);
			$this->global_model->update('jabatan', $data, array('Kode_Jabatan' => $id));
		}

		redirect(site_url('jabatan'));
		
	}

 	public function hapus($id){
		$this->global_model->delete('jabatan', array('Kode_Jabatan' => $id));

		redirect(site_url('jabatan'));
	}


}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){
		
		$data['pengurus'] = $this->global_model->find_all('pengurus');
		$data['jabatan'] = $this->global_model->find_all('jabatan');
		
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpandata')){
			$data = $this->input->post();

			unset($data['simpandata']);
			$this->global_model->create('pengurus', $data);
			
			redirect(site_url('pengurus'));
		}
		
		$data['pengurus'] = $this->global_model->find_all('pengurus');
		$data['jabatan'] = $this->global_model->find_all('jabatan');
		$data['kodepengurus'] = $this->global_model->get_kodepengurus();
		
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/pengurus', $data);
 		$this->load->view('footer/dashboard/index');
	}
	
	public function tampil($id){
		$data['pengurus'] = $this->global_model->find_by('pengurus', array('ID_Pengurus' => $id));
		$data['jabatan'] = $this->global_model->find_all('jabatan');


		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/edit', $data);
 		$this->load->view('footer/dashboard/index');
		
	}
	
	public function edit($id){
		if($this->input->post('editdata')){
			$data = $this->input->post();

			unset($data['editdata']);
			$this->global_model->update('pengurus', $data, array('ID_Pengurus' => $id));
		}

		redirect(site_url('pengurus'));
	}
	public function hapus($id){
		$this->global_model->delete('pengurus', array('ID_Pengurus' => $id));

		redirect(site_url('pengurus'));
	}

}
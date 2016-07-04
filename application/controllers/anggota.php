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
		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
		
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpandata')){
			$data = $this->input->post();

			unset($data['simpandata']);
			$this->global_model->create('anggota', $data);
			
			redirect(site_url('anggota'));
		}
		
		$data['anggota'] = $this->global_model->find_all('anggota');
		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
		$data['noauto'] = $this->global_model->get_noauto();
		
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/anggota', $data);
 		$this->load->view('footer/dashboard/index');
		
	}
	
	public function tampil($id){
		$data['anggota'] = $this->global_model->find_by('anggota', array('No_Anggota' => $id));
		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');


		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/anggota/edit', $data);
 		$this->load->view('footer/dashboard/index');
		
	}
	
	public function edit($id){
		if($this->input->post('editdata')){
			$data = $this->input->post();

			unset($data['editdata']);
			$this->global_model->update('anggota', $data, array('No_Anggota' => $id));
		}

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
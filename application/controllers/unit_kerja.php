<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit_kerja extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){

 		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/unit_kerja/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function tambah(){
 		if($this->input->post('simpandata')){
 			$data = $this->input->post();

 			unset($data['simpandata']);
 			$this->global_model->create('unit_kerja', $data);
			
			redirect(site_url('unit_kerja'));
 		}
		
		$data['id_unit'] = $this->global_model->get_idunit();
 		
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/unit_kerja/unit_kerja', $data);
 		$this->load->view('footer/dashboard/index');
 	}
	
	public function tampil($id){
		$data['unitkerja'] = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $id));

		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/unit_kerja/edit', $data);
 		$this->load->view('footer/dashboard/index');
	}

	public function edit($id){
		if($this->input->post('editdata')){
			$data = $this->input->post();

			unset($data['editdata']);
			$this->global_model->update('unit_kerja', $data, array('ID_Unit' => $id));
		}

		redirect(site_url('unit_kerja'));
		
	}

 	public function hapus($id){
		$this->global_model->delete('unit_kerja', array('ID_Unit' => $id));

		redirect(site_url('unit_kerja'));
	}
	
	public function detail(){
		$detail = $this->uri->segment(3);
		$data['detailunit'] = $this->global_model->query('select anggota.No_Anggota as No_Anggota, anggota.Nama_Anggota as Nama_Anggota,
		unit_kerja.ID_Unit from unit_kerja inner join anggota on unit_kerja.ID_Unit=anggota.ID_Unit 
		where unit_kerja.ID_Unit ="'.$detail.'"');
		$data['unit'] = $this->global_model->find_all('unit_kerja');
		$data['anggota'] = $this->global_model->find_all('anggota');
		
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/unit_kerja/detail', $data);
 		$this->load->view('footer/dashboard/index');
		
	}
	

}
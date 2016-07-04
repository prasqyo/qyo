<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_simpanan extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){

 		$data['jenissimpanan'] = $this->global_model->find_all('jenis_simpanan');
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jenis_simpanan/index',$data);
 		$this->load->view('footer/dashboard/index');
 	}

 	public function tambah(){
 		if($this->input->post('simpandata')){
 			$data = $this->input->post();

 			unset($data['simpandata']);
 			$this->global_model->create('jenis_simpanan', $data);
			
			redirect(site_url('jenis_simpanan'));
 		}
		
		$data['kodejenis'] = $this->global_model->get_kodejenis();
 		
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jenis_simpanan/jenis_simpanan',$data);
 		$this->load->view('footer/dashboard/index');
 	}
	
	public function tampil($id){
		$data['jenissimpanan'] = $this->global_model->find_by('jenis_simpanan', array('Kode_Jenis_Simpanan' => $id));

		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jenis_simpanan/edit', $data);
 		$this->load->view('footer/dashboard/index');
	}

	public function edit($id){
		if($this->input->post('editdata')){
			$data = $this->input->post();

			unset($data['editdata']);

			$this->global_model->update('jenis_simpanan', $data, array('Kode_Jenis_Simpanan' => $id));
		}

		redirect(site_url('jenis_simpanan'));
	}

 	public function hapus($id){
		$this->global_model->delete('jenis_simpanan', array('Kode_Jenis_Simpanan' => $id));

		redirect(site_url('jenis_simpanan'));
	}
	
	public function detail(){
		$detail = $this->uri->segment(3);
		$data['detailsimpan'] = $this->global_model->query('select simpanan_detail.Kode_Simpanan as Kode_Simpanan, simpanan_detail.No_Anggota as No_Anggota,
		simpanan_detail.Nama_Anggota as Nama_Anggota, simpanan_detail.Nominal_Simpanan as Nominal_Simpanan, jenis_simpanan.Kode_Jenis_Simpanan
		from jenis_simpanan inner join simpanan_detail on jenis_simpanan.Kode_Jenis_Simpanan=simpanan_detail.Kode_Jenis_Simpanan 
		where jenis_simpanan.Kode_Jenis_Simpanan ="'.$detail.'"');
		$data['jenissimpan'] = $this->global_model->find_all('jenis_simpanan');
		$data['simpanan'] = $this->global_model->find_all('simpanan_detail');
		
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jenis_simpanan/detail', $data);
 		$this->load->view('footer/dashboard/index');
		
	}
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){
		
		$data['user'] = $this->global_model->find_all('user');
		
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/user/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		$Id = $this->input->post('Id');
		$Nama_Lengkap = $this->input->post('Nama_Lengkap');
		$Username = $this->input->post('Username');
		$Password = $this->input->post('Password');
		$Level = $this->input->post('Level');
		
		if($this->input->post('simpandata')){
			$data = array(
			'Id' => $Id,
			'Username' => $Username,
			'Password' => md5($Password),
			'Level' => $Level
			);

			unset($data['simpandata']);
			$this->global_model->create('user', $data);
			
			redirect(site_url('user'));
		}
		
		$data['user'] = $this->global_model->find_all('user');
		$data['iduser'] = $this->global_model->get_user();
		
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/user/user', $data);
 		$this->load->view('footer/dashboard/index');
	}
	
	public function tampil($id){
		$data['user'] = $this->global_model->find_by('user', array('Id' => $id));


		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/user/edit', $data);
 		$this->load->view('footer/dashboard/index');
		
	}
	
	public function edit($id){
		if($this->input->post('editdata')){
			$data = $this->input->post();

			unset($data['editdata']);
			$this->global_model->update('user', $data, array('Id' => $id));
		}

		redirect(site_url('user'));
	}
	public function hapus($id){
		$this->global_model->delete('user', array('Id' => $id));

		redirect(site_url('user'));
	}

}
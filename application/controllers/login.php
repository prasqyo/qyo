<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('global_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index(){

		if($this->input->post('masuk')){

 			$username = $this->input->post('Username');
 			$password = $this->input->post('Password');
 			$passwordhash = md5($password);
 			$redirect = "dashboard";

 			$sql = $this->global_model->find_by('user', array('Username' => $username, 'Password' => $passwordhash));

 			if($sql == NULL){
 				$redirect = "/";
 			}else{
 				/*$sessiondata = array(
 					'Nama_Lengkap' => $sql['Nama_Lengkap'],
 					'Username' => $sql['Username'],
 					'Level' => $sql['Level']);

 					$this->session->set_userdata($sessiondata);*/
					
 			}

 			redirect(site_url($redirect));

 		}

 		// mengambil data dari database
 		$this->load->view('head/login/index');
 		$this->load->view('konten/login/index');
	}
 
		
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect(site_url(''));
	} 
 
}
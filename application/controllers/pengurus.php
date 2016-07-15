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
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/index');
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/tambah');
 		$this->load->view('footer/dashboard/index');
		
	}

	public function edit(){
		//load view
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/edit');
 		$this->load->view('footer/dashboard/index');
		
	}
}
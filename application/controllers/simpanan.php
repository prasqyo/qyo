<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simpanan extends CI_Controller {

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
 		$this->load->view('konten/simpanan/index');
 		$this->load->view('footer/dashboard/index');

 	}

 	public function tambah(){
		//load database
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpanan/simpanan');
 		$this->load->view('footer/dashboard/index');
	}
}
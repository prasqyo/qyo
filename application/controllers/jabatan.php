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
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jabatan/index');
 		$this->load->view('footer/dashboard/index');

 	}

	public function tambah(){
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jabatan/jabatan');
 		$this->load->view('footer/dashboard/index');
 	}

}
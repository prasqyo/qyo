<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');

 		if(!$this->session->userdata('Nama_Lengkap','Username','Level','kode_user'))
	    {
	      redirect(site_url('/'));
	    }
 	}

 	public function index(){
		
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/dashboard/index');
 		$this->load->view('footer/dashboard/index');

 	}

	
}
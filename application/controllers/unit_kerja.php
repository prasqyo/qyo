<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit_kerja extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	//fungsi ini untuk generate message
 	public function message($mode,$text,$active)
 	{
 		//generate message
 		$messagesession = array(
 			'messagemode' => $mode,
 			'messagetext' => $text,
 			'messageactive' => $active);

 		$this->session->set_flashdata($messagesession);
 	}

 	public function index(){
 		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/unit_kerja/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->create('unit_kerja',$data);
			$this->message('success','Data berhasil di tambah','indexunitkerja');
			redirect(site_url('unit_kerja'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->update('unit_kerja',$data, array('ID_Unit' => $id));
			$this->message('success','Data berhasil di edit','indexunitkerja');
			redirect(site_url('unit_kerja'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('unit_kerja', array('ID_Unit' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexunitkerja');

	 	redirect(site_url('unit_kerja'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('unit_kerja', array('ID_Unit' => $id));
 		echo json_encode($sql);
 	}
}
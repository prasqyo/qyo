<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simpananpokok extends CI_Controller {

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
 		$data['simpanpokok'] = $this->global_model->query('select *from simpanpokok');
 		$data['anggota'] = $this->global_model->find_all('anggota');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpananpokok/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function cetak(){
 		$data['detailsimpanan'] = $this->global_model->find_all('simpanpokok');
		//load view
 		$this->load->view('konten/laporan/cetaksimpananpokok',$data);

 	}

 	public function setting(){
 		if($this->input->post('simpan')){
 			$data = $this->input->post();
 			unset($data['simpan']);
 			$this->global_model->update('settingnominalsimpanan', $data, array('id' => 1));

 			$this->message('success','Nominal simpanan pokok berhasil di ubah','indexsimpanpokok');
 			redirect(site_url('simpananpokok'));
 		}
 	}
	
	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('simpanpokok', array('No_Anggota' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexsimpanpokok');

	 	redirect(site_url('simpananpokok'));
	}

 	public function editnominal(){
 		$sql = $this->global_model->find_by('settingnominalsimpanan', array('id' => 1));
 		echo json_encode($sql);
 	}
}
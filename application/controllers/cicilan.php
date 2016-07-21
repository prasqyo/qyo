<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cicilan extends CI_Controller {

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
 		$data['cicilan'] = $this->global_model->find_all('cicilan');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/cicilan/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode cicilan */
 			$sql = $this->global_model->query("select *from cicilan order by kode_cicilan desc");
 			$kode = "CL";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['kode_cicilan']);

 				$number =  (int) $pisah[1];
 				$digit = intval($number) + 1;

 				if ($digit >= 1 and $digit <= 9){
					$a = $kode."-00".$digit;
	 			}else if($digit >= 10 and $digit <= 99){
	 				$a = $kode."-0".$digit;
	 			}else{
	 				$a = $kode."-".$digit;
	 			}

 			}else{
 				$kodedefault = "CL-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode cicilan*/

			$data = $this->input->post();
			$data['kode_cicilan'] = $a;
			unset($data['simpan']);
			$this->global_model->create('cicilan',$data);
			$this->message('success','Data berhasil di tambah','indexcicilan');
			redirect(site_url('cicilan'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->update('cicilan',$data, array('kode_cicilan' => $id));
			$this->message('success','Data berhasil di edit','indexcicilan');
			redirect(site_url('cicilan'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('cicilan', array('kode_cicilan' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexcicilan');

	 	redirect(site_url('cicilan'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('cicilan', array('kode_cicilan' => $id));
 		echo json_encode($sql);
 	}

}
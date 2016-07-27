<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
 		$data['user'] = $this->global_model->query("select *from user where Level !='1'");
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/user/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode user */
 			$sql = $this->global_model->query("select *from user order by kode_user desc");
 			$kode = "USR";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['kode_user']);

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
 				$kodedefault = "USR-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode user*/

			$data = $this->input->post();
			$data['kode_user'] = $a;
			$data['Password'] = md5($this->input->post('Password'));
			unset($data['simpan']);
			$this->global_model->create('user',$data);
			$this->message('success','Data berhasil di tambah','indexuser');
			redirect(site_url('user'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			$data['Password'] = md5($this->input->post('Password'));
			unset($data['simpan']);
			if($this->input->post('Password') == ""){
				unset($data['Password']);
			}
			$this->global_model->update('user',$data, array('kode_user' => $id));
			$this->message('success','Data berhasil di edit','indexuser');
			redirect(site_url('user'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('user', array('kode_user' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexuser');

	 	redirect(site_url('user'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('user', array('kode_user' => $id));
 		echo json_encode($sql);
 	}

}
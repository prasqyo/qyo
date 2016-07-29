<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {

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
 		$data['jabatan'] = $this->global_model->find_all('jabatan');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jabatan/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode jabatan */
 			$sql = $this->global_model->query("select *from jabatan order by Kode_Jabatan desc");
 			$kode = "JB";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['Kode_Jabatan']);

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
 				$kodedefault = "JB-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode jabatan*/

			$data = $this->input->post();
			$data['Kode_Jabatan'] = $a;
			unset($data['simpan']);
			$this->global_model->create('jabatan',$data);
			$this->message('success','Data berhasil di tambah','indexjabatan');
			redirect(site_url('jabatan'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->update('jabatan',$data, array('Kode_Jabatan' => $id));
			$this->message('success','Data berhasil di edit','indexjabatan');
			redirect(site_url('jabatan'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('jabatan', array('Kode_Jabatan' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexjabatan');

	 	redirect(site_url('jabatan'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('jabatan', array('Kode_Jabatan' => $id));
 		echo json_encode($sql);
 	}

}
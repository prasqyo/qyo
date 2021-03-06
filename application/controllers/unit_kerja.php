<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit_kerja extends CI_Controller {

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
 		$data['unitkerja'] = $this->global_model->find_all('unit_kerja');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/unit_kerja/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode unit */
 			$sql = $this->global_model->query("select *from unit_kerja order by ID_Unit desc");
 			$kode = "UK";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['ID_Unit']);

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
 				$kodedefault = "UK-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode unit*/

			$data = $this->input->post();
			$data['ID_Unit'] = $a;
			unset($data['simpan']);

			$check = count($this->global_model->find_by('unit_kerja', array('Unit_Kerja' => $this->input->post('Unit_Kerja'))));

			if($this->input->post('Unit_Kerja')==""){
				$this->message('error','Nama unit tidak boleh kosong','indexunitkerja');
			}else if($check > 0){
				$this->message('error','Nama unit sudah tersedia','indexunitkerja');
			}else{
				$this->global_model->create('unit_kerja',$data);
				$this->message('success','Data berhasil di tambah','indexunitkerja');
			}
			
			redirect(site_url('unit_kerja'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			
			$check = count($this->global_model->find_by('unit_kerja', array('Unit_Kerja' => $this->input->post('Unit_Kerja'))));

			if($this->input->post('Unit_Kerja')==""){
				$this->message('error','Nama unit tidak boleh kosong','indexunitkerja');
			}else if($check > 0){
				$this->message('error','Nama unit sudah tersedia','indexunitkerja');
			}else{
				$this->global_model->update('unit_kerja',$data, array('ID_Unit' => $id));
				$this->message('success','Data berhasil di edit','indexunitkerja');
			}

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
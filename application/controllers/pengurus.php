<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengurus extends CI_Controller {

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
 		$data['pengurus'] = $this->global_model->find_all('pengurus');
 		$data['jabatan'] = $this->global_model->find_all('jabatan');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/pengurus/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode pengurus */
 			$sql = $this->global_model->query("select *from pengurus order by ID_Pengurus desc");
 			$kode = "PNG";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['ID_Pengurus']);

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
 				$kodedefault = "PNG-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode pengurus*/

			$data = $this->input->post();
			$data['ID_Pengurus'] = $a;
			unset($data['simpan']);
			$this->global_model->create('pengurus',$data);
			$this->message('success','Data berhasil di tambah','indexpengurus');
			redirect(site_url('pengurus'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->update('pengurus',$data, array('ID_Pengurus' => $id));
			$this->message('success','Data berhasil di edit','indexpengurus');
			redirect(site_url('pengurus'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('pengurus', array('ID_Pengurus' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexpengurus');

	 	redirect(site_url('pengurus'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('pengurus', array('ID_Pengurus' => $id));
 		echo json_encode($sql);
 	}

}
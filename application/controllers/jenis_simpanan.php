<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_simpanan extends CI_Controller {

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
 		$data['jenissimpanan'] = $this->global_model->find_all('jenis_simpanan');
		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/jenis_simpanan/index',$data);
 		$this->load->view('footer/dashboard/index');

 	}
	
	public function tambah(){
		if($this->input->post('simpan')){
			/*generate kode jenis simpanan */
 			$sql = $this->global_model->query("select *from jenis_simpanan order by Kode_Jenis_Simpanan desc");
 			$kode = "JS";

 			if($sql != Null){
 				$pisah = explode('-', $sql[0]['Kode_Jenis_Simpanan']);

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
 				$kodedefault = "JS-001";
 				$a = $kodedefault;
 			}
 			/* akhir generate kode jenis simpanan*/

			$data = $this->input->post();
			$data['Kode_Jenis_Simpanan'] = $a;
			unset($data['simpan']);
			$this->global_model->create('jenis_simpanan',$data);
			$this->message('success','Data berhasil di tambah','indexjenissimpanan');
			redirect(site_url('jenis_simpanan'));
		}
		
	}

	public function edit($id){
		if($this->input->post('simpan')){
			$data = $this->input->post();
			unset($data['simpan']);
			$this->global_model->update('jenis_simpanan',$data, array('Kode_Jenis_Simpanan' => $id));
			$this->message('success','Data berhasil di edit','indexjenissimpanan');
			redirect(site_url('jenis_simpanan'));
		}
	}

	public function hapus(){
		$chkbox = $this->input->post('check');
	 	if(is_array($chkbox)){
	 		for($i = 0; $i < count($chkbox); $i++){
	 			$this->global_model->delete('jenis_simpanan', array('Kode_Jenis_Simpanan' => $chkbox[$i]));

	 		}
	 	}

	 	//memberikan pesan
 		$this->message('success','Data berhasil di hapus','indexjenissimpanan');

	 	redirect(site_url('jenis_simpanan'));
	}

	public function tampil($id){
 		$sql = $this->global_model->find_by('jenis_simpanan', array('Kode_Jenis_Simpanan' => $id));
 		echo json_encode($sql);
 	}
	
}
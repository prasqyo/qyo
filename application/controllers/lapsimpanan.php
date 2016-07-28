<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lapsimpanan extends CI_Controller {

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
 		$this->load->view('konten/lapsimpanan/index');
 		$this->load->view('footer/dashboard/index');

 	}

 	public function cetak(){
 		$data['jenissimpanan'] = $this->input->post('jenissimpanan');
 		$data['bulan'] = $this->input->post('bulan');
 		$data['tahun'] = $this->input->post('tahun');
 		$a = "simpansukarela";
 		if($this->input->post('jenissimpanan')=="wajib"){
 			$a = "simpanwajib";
 		}else if($this->input->post('jenissimpanan')=="pokok"){
 			$a = "simpanpokok";
 		}

 		$sql = "select *from ".$a." where Bulan='".$this->input->post('bulan')."' and Tahun='".$this->input->post('tahun')."'";
 		$data['detailsimpanan'] = $this->global_model->query($sql);

 		$sqljumlah = "select sum(nominal) as jumlah from ".$a." where Bulan='".$this->input->post('bulan')."' and Tahun='".$this->input->post('tahun')."'";
 		$checkjumlah = $this->db->query($sqljumlah);
 		$row = $checkjumlah->row();
 		$data['jumlah'] = $row->jumlah;
 		//load view
 		$this->load->view('konten/lapsimpanan/cetak',$data);
 	}
 }
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simpanan extends CI_Controller {

	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){
 		$data['simpanan'] = $this->global_model->find_all('simpanan_header');
		
 		//load view
 		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpanan/index', $data);
 		$this->load->view('footer/dashboard/index');

 	}

 	public function tambah(){
		if($this->input->post('simpandata')){
			$data = $this->input->post();

			unset($data['simpandata']);
			$this->global_model->create('simpanan_header', $data);
		}
		$data['head_simpan'] = $this->global_model->query('select Kode_Simpanan_Header from simpanan_header order by Kode_Simpanan_Header limit 0,1');
		$data['jenis_simpan'] = $this->global_model->find_all('jenis_simpanan');
		$data['anggota'] = $this->global_model->find_all('anggota');
		$data['kode_simpanan'] = $this->global_model->get_kode_simpanan();
		
		//load database
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpanan/simpanan', $data);
 		$this->load->view('footer/dashboard/index');
	}
	
	public function tambah_detail()
	{
		$data2=array();
		foreach($_POST['Nominal_Simpanan'] as $key=>$val){
		$data2[]=array(
		'Kode_Simpanan_Detail'=>$_POST['Kode_Simpanan_Detail'][$key],
		'Kode_Simpanan_Header'=>$_POST['Kode_Simpanan_Header'][$key],
		'Kode_Jenis_Simpanan'=>$_POST['Kode_Jenis_Simpanan'][$key],
		'Nominal_Simpanan'=>$_POST['Nominal_Simpanan'][$key]
		);
		}
		$this->db->insert_batch('simpanan_detail',$data2);
		
		$data2['headd_simpan'] = $this->global_model->query('select Kode_Simpanan_Header from simpanan_header order by Kode_Simpanan_Header limit 0,1');
		$data2['simpanan_detail'] = $this->global_model->find_all('simpanan_detail');
		$data2['jenis_simpan'] = $this->global_model->find_all('jenis_simpanan');
		$data2['anggota'] = $this->global_model->find_all('anggota');
		$data2['kdsimpan_detail'] = $this->global_model->get_kdsimpan_detail();
		$data['kode_simpanan'] = $this->global_model->get_kode_simpanan();
		
		//load database
		$this->load->view('head/dashboard/index');
 		$this->load->view('konten/simpanan/simpanan', $data2);
 		$this->load->view('footer/dashboard/index');
	}
	
	
 	public function hapus($id){
		$this->global_model->delete('simpanan', array('Kode_Simpanan_Header' => $id));

		redirect(site_url('simpanan'));
	}


}
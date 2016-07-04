<?php

class Global_model extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * Find single record by id
	 * @param str $tbl 
	 * @param str $id
	 * @return array
	 */
	function find($tbl, $id) {
		$q = $this->db->get_where($tbl, array('id'=>$id));
		return $q->row_array();
	}
	
	/**
	 * Find single record by condition 
	 * @param str $tbl 
	 * @param multi $condition accept string or array
	 * @param bool $obj TRUE for @return as object
	 * @return array or object
	 */
	function find_by($tbl, $condition, $obj = FALSE) {
		$q = $this->db->get_where($tbl, $condition);
		if($obj){
			return $q->row();
		}else{
			return $q->row_array();
		}
		
	}
	
	/**
	 * Find all records
	 * @param str $tbl 
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @return array
	 */
	function find_all($tbl, $order=null, $limit=null, $offset=null) {
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$order = explode(" ",$order);
			$this->db->order_by($order[0],$order[1]);
		}
		$q = $this->db->get($tbl);
		return $q->result_array();
	}
	
	/**
	 * Find all records by condition
	 * @param str $tbl 
	 * @param multi $condition accept array or string
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @return array
	 */	
	function find_all_by($tbl, $condition, $order=null, $limit=null, $offset=null) {
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		$this->db->where($condition);
		if($order){
			$order = explode(" ",$order);
			$this->db->order_by($order[0],$order[1]);
		}
		$q = $this->db->get($tbl);
		return $q->result_array();
	}
	
	/**
	 * Find single record join one table
	 * @param str $tbl 
	 * @param int $id 
	 * @param str $join table to be joined
	 * @param str $fkey foreign key default='id'
	 * @param str $pkey primary key if null set $tbl._id
	 * @return array
	 */
	function find_join($tbl, $id, $join, $fkey='id', $pkey=null) {
//		$this->db->limit($limit, $offset);
		$pkey = ($pkey)?$pkey:$join."_id";
		$this->db->join($join, $join.".".$fkey."=".$tbl.".".$pkey);
		$this->db->where($tbl.'.id',$id);
		$q = $this->db->get($tbl);
		return $q->row_array();
	}
	
	/**
	 * Find all records join one table with condition if not null
	 * @param str $tbl 
	 * @param str $join 
	 * @param str $fkey 
	 * @param str $pkey 
	 * @param multi $condition 
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @return array
	 */
	function find_all_join($tbl, $join, $fkey='id', $pkey=null, $condition=null, $order=null, $limit=null, $offset=null) {
		$pkey = ($pkey)?$pkey:$join."_id";
		$this->db->join($join, $join.".".$fkey."=".$tbl.".".$pkey);
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$this->db->order_by($order);
		}
		if($condition){
			$this->db->where($condition);
		}
		$q = $this->db->get($tbl);
		return $q->result_array();
	}
	
	/**
	 * Find all records join many table with condition if not null
	 * @param str $tbl 
	 * @param array $join e.g: array(array1,array2,arrayn)
	 * @param multi $condition accept string or array
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @return array
	 */
	function find_all_join_many($tbl, $join, $condition=null, $order=null, $limit=null, $offset=null) {
		foreach ($join as $j) {
			if(isset($j[3])){
				$this->db->select($tbl.'.*, '.$j[3]);
			}
			$on = preg_match('/\./', $j[2]) ? $j[2] : $tbl.'.'.$j[2];
			$this->db->join($j[0], $j[0].".".$j[1]."=".$on);
		}
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$this->db->order_by($order);
		}
		if($condition){
			$this->db->where($condition);
		}
		$q = $this->db->get($tbl);
		return $q->result_array();
	}

	/**
	 * Select field join one table with condition if not null
	 * @param str $tbl 
	 * @param str $fields 
	 * @param str $join 
	 * @param str $fkey 
	 * @param str $pkey 
	 * @param multi $condition accept string or array
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @param str $group 
	 * @return array
	 */
	function select_join($tbl, $fields="*", $join, $fkey='id', $pkey=null, $condition=null, $order=null, $limit=null, $offset=null, $group=null) {
		$this->db->_protect_identifiers=false;
		$pkey = ($pkey)?$pkey:$join."_id";
		$this->db->join($join, $join.".".$fkey."=".$tbl.".".$pkey);
		$offset = ($offset) ? $offset : 0;
		$this->db->select($fields);
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$this->db->order_by($order);
		}
		if($group){
			$this->db->group_by($group);
		}
		if($condition){
			$this->db->where($condition);
		}
		$q = $this->db->get($tbl);
		return $q->result_array();
	}

	/**
	 * Select field join many table
	 * @param str $tbl 
	 * @param str $fields 
	 * @param array $join e.g: array(array1,array2,arrayn)
	 * @param multi $condition accept string or array
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @param str $group 
	 * @return array
	 */
	function select_join_many($tbl, $fields="*", $join, $condition=null, $order="id DESC", $limit=null, $offset=null, $group=null) {
		$this->db->select($fields);
		foreach ($join as $j) {
			$on = preg_match('/\./', $j[2]) ? $j[2] : $tbl.'.'.$j[2];
			$this->db->join($j[0], $j[0].".".$j[1]."=".$on);
		}
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$this->db->order_by($order);
		}
		if($group){
			$this->db->group_by($group);
		}
		if($condition){
			$this->db->where($condition);
		}
		$q = $this->db->get($tbl);
		return $q->result_array();
	}

	/**
	 * Create new record
	 * @param str $tbl 
	 * @param array $data 
	 * @return int INSERT_ID
	 */
	function create($tbl, $data) {
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}

	/**
	 * Crate new batch records
	 * @param str $tbl 
	 * @param array $data multidimension
	 * @return void
	 */
	function create_batch($tbl, $data) {
		$this->db->insert_batch($tbl, $data);
		return $this->db->insert_id();
	}
	
	/**
	 * Update record by key default=id
	 * @param str $tbl 
	 * @param array $data 
	 * @param str $key 
	 * @return void
	 */
	function update($tbl, $data, $key=array()) {
		if(!is_array($key)){
			$id = $key;
			$this->db->where('id', $id);
		}else{
			$this->db->where($key);
		}
		//$this->db->where($key,$data[$key]);
		$this->db->update($tbl, $data);
	}
	
	/**
	 * Delete record by key
	 * @param str $tbl 
	 * @param multi $key accept array or string
	 * @return void
	 */
	function delete($tbl, $key=array()) {
		if(!is_array($key)){
			$id = $key;
			$this->db->where('id', $id);
		}else{
			$this->db->where($key);
		}
		$this->db->delete($tbl);
	}

	/**
	 * Select all records by fields
	 * @param str $tbl 
	 * @param str $fields 
	 * @param int $limit 
	 * @param int $offset 
	 * @return array
	 */	
	function select($tbl, $fields = "*", $condition = null, $limit = null, $offset = null){
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($condition){
			$this->db->where($condition);
		}
		$this->db->select($fields);
		$q = $this->db->get($tbl, $limit, $offset);
		return $q->result_array();
	}

	/**
	 * Search record by criteria(LIKE function)
	 * @param str $tbl 
	 * @param array $criteria 
	 * @param multi $condition 
	 * @param str $order 
	 * @param int $limit 
	 * @param int $offset 
	 * @param array $notin 
	 * @return type
	 */
	function search($tbl, $criteria, $condition=null, $order = null, $limit=null, $offset=null, $notin=null){
		$offset = ($offset) ? $offset : 0;
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$order = explode(" ",$order);
			$this->db->order_by($order[0],$order[1]);
		}
		if($condition){
			$this->db->where($condition);
		}
		if($notin){
			$this->db->where_not_in($notin[0],$notin[1]);
		}
		$this->db->like($criteria);
		$q = $this->db->get($tbl, $limit, $offset);
		return $q->result_array();
	}

	function search_join($tbl, $join, $fkey='id', $pkey=null, $criteria, $condition=null, $order = null, $limit=null, $offset=null, $notin=null){
		$offset = ($offset) ? $offset : 0;
		$pkey = ($pkey)?$pkey:$join."_id";
		$this->db->join($join, $join.".".$fkey."=".$tbl.".".$pkey);
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$order = explode(" ",$order);
			$this->db->order_by($order[0],$order[1]);
		}
		if($condition){
			$this->db->where($condition);
		}
		if($notin){
			$this->db->where_not_in($notin[0],$notin[1]);
		}
		$this->db->like($criteria);
		$q = $this->db->get($tbl, $limit, $offset);
		return $q->result_array();
	}

	function search_join_many($tbl, $join, $criteria, $condition=null, $order = null, $limit=null, $offset=null, $notin=null){
		$offset = ($offset) ? $offset : 0;
		foreach ($join as $j) {
			if(isset($j[3])){
				$this->db->select($tbl.'.*, '.$j[3]);
			}
			$on = preg_match('/\./', $j[2]) ? $j[2] : $tbl.'.'.$j[2];
			$this->db->join($j[0], $j[0].".".$j[1]."=".$on);
		}
		if($limit){
			$this->db->limit($limit, $offset);
		}
		if($order){
			$order = explode(" ",$order);
			$this->db->order_by($order[0],$order[1]);
		}
		if($condition){
			$this->db->where($condition);
		}
		if($notin){
			$this->db->where_not_in($notin[0],$notin[1]);
		}
		if(is_array($criteria)){
			foreach ($criteria as $key => $val) {
				if(count(explode(" ",$key)) > 1){
					if(substr($key,0,2) == 'or' || substr($key,0,2) == 'OR'){
						$this->db->or_like(substr($key,3), $val);
					}else{
						$this->db->like(substr($key,3), $val);
					}
				}else{
					$this->db->like($key, $val);
				}
			}
		}else{
			$this->db->where($criteria);
		}
		$q = $this->db->get($tbl, $limit, $offset);
		return $q->result_array();
	}

	function query($sql)
	{
		$q = $this->db->query($sql);
		return $q->result_array();
	}
	
	function get_noauto()
	{
		$s = 'ANG--';
		$query = 'SELECT MAX(RIGHT(No_Anggota,4)) as max_id from anggota ORDER BY No_Anggota';
		$result = mysql_query($query);
		$data = mysql_fetch_array($result);
		$id_max = $data['max_id'];
		$sort_num = (int) substr($id_max,1,4);
		$sort_num++;
		$new_code = $s.sprintf("%03s", $sort_num);
		return $new_code;
	}
	
	function get_kodepengurus()
	{
		$pengurus = 'PNG--';
		$q = 'SELECT MAX(RIGHT(ID_Pengurus,4)) as id_pengurus from pengurus ORDER BY ID_Pengurus';
		$hasil = mysql_query($q);
		$data1 = mysql_fetch_array($hasil);
		$id_png = $data1['id_pengurus'];
		$kode = (int) substr($id_png,1,4);
		$kode++;
		$kode_baru = $pengurus.sprintf("%03s", $kode);
		return $kode_baru;
	}
	
	function get_kodejenis()
	{
		$jenis = 'JS--';
		$r = 'SELECT MAX(RIGHT(Kode_Jenis_Simpanan,4)) as kode_jenis from jenis_simpanan ORDER BY Kode_Jenis_Simpanan';
		$qjenis = mysql_query($r);
		$data2 = mysql_fetch_array($qjenis);
		$id_jenis = $data2['kode_jenis'];
		$kj = (int) substr($id_jenis,1,4);
		$kj++;
		$id_baru = $jenis.sprintf("%03s", $kj);
		return $id_baru;
	}
	
	function get_idunit()
	{
		$unit = 'UI--';
		$s = 'SELECT MAX(RIGHT(ID_Unit,4)) as kode_unit from unit_kerja ORDER BY ID_Unit';
		$sid = mysql_query($s);
		$data3 = mysql_fetch_array($sid);
		$kodeunit = $data3['kode_unit'];
		$iu = (int) substr($kodeunit,1,4);
		$iu++;
		$unit_baru = $unit.sprintf("%03s", $iu);
		return $unit_baru;
	}
	
	function get_kodejab()
	{
		$jabatan = 'JBT--';
		$t = 'SELECT MAX(RIGHT(Kode_Jabatan,4)) as id_jabatan from jabatan ORDER BY Kode_Jabatan';
		$tjbt = mysql_query($t);
		$data4 = mysql_fetch_array($tjbt);
		$kodejbtn = $data4['id_jabatan'];
		$jbtn = (int) substr($kodejbtn,1,4);
		$jbtn++;
		$jabat_baru = $jabatan.sprintf("%03s", $jbtn);
		return $jabat_baru;
	}
	
	function get_user()
	{
		$user = 'USE--';
		$u = 'SELECT MAX(RIGHT(Id,4)) as kode_user from user ORDER BY Id';
		$uuse = mysql_query($u);
		$data5 = mysql_fetch_array($uuse);
		$kodeuse = $data5['kode_user'];
		$use = (int) substr($kodeuse,1,4);
		$use++;
		$use_baru = $user.sprintf("%03s", $use);
		return $use_baru;
	}
	
	function get_kode_simpanan()
	{
		$simpanan = 'SIM--';
		$u = 'SELECT MAX(RIGHT(Kode_Simpanan_Header,4)) as simpanan_header from simpanan_header ORDER BY Kode_Simpanan_Header';
		$su = mysql_query($u);
		$data6 = mysql_fetch_array($su);
		$kodesim = $data6['simpanan_header'];
		$simp = (int) substr($kodesim,1,4);
		$simp++;
		$sim_baru = $simpanan.sprintf("%03s", $simp);
		return $sim_baru;
	}
	
	function get_kdsimpan_detail()
	{
		$simdet = 'SDET--';
		$v = 'SELECT MAX(RIGHT(Kode_Simpanan_Detail,4)) as simpanan_detail from simpanan_detail ORDER BY Kode_Simpanan_Detail';
		$detv = mysql_query($v);
		$data7 = mysql_fetch_array($detv);
		$kodetsim = $data7['simpanan_detail'];
		$simpdet = (int) substr($kodetsim,1,4);
		$simpdet++;
		$simdet_baru = $simdet.sprintf("%03s", $simpdet);
		return $simdet_baru;
	}
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mawal extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
	public function no_calon(){
		$query ="select * from kandidat order by no_kandidat DESC limit 1";
		$res = $this->db->query($query);
		return $res->row_array();
	}
	public function detail_kandidat($id){
		$this->db->select('kandidat.*,detail_user.nama,detail_user.alamat,visimisi.*,image_user.*');
		$this->db->from('kandidat');
		$this->db->join('detail_user', "detail_user.nik=kandidat.nik");
		$this->db->join('image_user', 'image_user.id_user = detail_user.id_user');
		$this->db->join('visimisi', 'visimisi.no_kandidat = kandidat.no_kandidat');
		$this->db->where('kandidat.no_kandidat', $id);
		$query = $this->db->get();
			if($query->num_rows() >0){
				return $query->result();
			}
			else{
				return false;
			}
	}
	public function daftar_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->order_by('waktu_diedit', 'desc');
		$query = $this->db->get();
		if($query->num_rows()!=0){
			return $query->result_array();
		}
	}
	public function quickcount($i){
		$this->db->where('no_kandidat='.$i);
		$query = $this->db->get('voting');
		if($query->num_rows()>0){
			return $query->num_rows();
		}else{
			return 0;
		}

	}
	public function total()
	{
		$query = $this->db->query("SELECT COUNT(*) as total from akun where akses='u'");
		$row = $query->row();
		return $row;
	}
}
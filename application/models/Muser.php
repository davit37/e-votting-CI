<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
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
	public function user_akun_detail($id_user){
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		$this->db->join('image_user', 'akun.id_user = image_user.id_user');
		$this->db->where('akun.id_user', $id_user);
		$query = $this->db->get();
			if($query->num_rows() >0){
				return $query->result();
			}
			else{
				return false;
			}
	}
	public function no_calon(){
		$query ="select * from kandidat order by no_kandidat DESC limit 1";
		$res = $this->db->query($query);
		return $res->row_array();
		
		
	}
	public function photo_kandidat(){
		$this->db->select('*');
		$this->db->from('image_kandidat');
		$query = $this->db->get();
			if($query->num_rows() >0){
				return $query->result();
			}
			else{
				return false;
			}
	}
	public function detail_kandidat($id){
		$this->db->select('*');
		$this->db->from('kandidat');
		$this->db->join('image_user', 'image_user.id_user = kandidat.id_user');
		$this->db->join('detail_user', 'detail_user.id_user = kandidat.id_user');
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
	public function max_no(){
		$this->db->select_max("no_kandidat", "no_max");
		$query = $this->db->get("kandidat");
		return $query->result();
	}
	public function tanggal(){
		$this->db->select('*');
		$this->db->from('tgl_voting');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getTanggal(){
		$this->db->select('*');
		$this->db->from('tgl_voting');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function hasil_voting($id_user, $data){
		$this->db->insert('voting', $data);
		if($this->db->affected_rows()>0){
			$this->db->set('status', 'y');
			$this->db->where('id_user', $id_user);
			$this->db->update('detail_user');
			if ($this->db->affected_rows()>0) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
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

	//update info
	public function update_info($id_user, $data){
		$this->db->update('detail_user', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	//get information
	public function get_information($id_user){
		$this->db->select('detail_user.nama, detail_user.status, image_user.name, akun.akses');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		$this->db->join('image_user', 'akun.id_user = image_user.id_user');
		$this->db->where('akun.id_user', $id_user);
		$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}
			else{
				return false;
			}
	}

	public function update_akun($id_user, $data){
		$this->db->update('akun', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function photo($id_user, $data){
		$this->db->update('image_user', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function masalah($data){
		$this->db->insert('keluhan', $data);
		if($this->db->affected_rows()>0){
			return true;
		}
	}

}

/* End of file muser.php */
/* Location: ./application/models/muser.php */
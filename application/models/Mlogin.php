<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

	public function check_akun($akun){
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('username', $akun['username']);
		$this->db->where('password', $akun['password']);
		$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}
			else{
				return false;
			}
	}
	public function check_user($akun){
		$this->db->select('akun.*, detail_user.*');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		$this->db->where('nik', $akun['nik']);
		$this->db->where('password', $akun['password']);
		$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}
			else{
				return false;
			}
	}
	public function get_information($akun){
		$this->db->select('akun.*, detail_user.nama, detail_user.status, image_user.name');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		$this->db->join('image_user', 'akun.id_user = image_user.id_user');
		$this->db->where('akun.username', $akun['username']);
		$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}
			else{
				return false;
			}
	}
	public function get_information_user($akun){
		$this->db->select('akun.*, detail_user.nama, detail_user.status, image_user.name');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		$this->db->join('image_user', 'akun.id_user = image_user.id_user');
		$this->db->where('detail_user.nik', $akun['nik']);
		$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}
			else{
				return false;
			}
	}

}

/* End of file mlogin.php */
/* Location: ./application/models/mlogin.php */

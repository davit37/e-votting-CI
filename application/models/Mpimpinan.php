<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpimpinan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
    public function daftar_user($limit=array()){
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		return $this->db->get();

	}
    public function daftar_pemilih($limit=array()){
		$this->db->select('*');
		$this->db->from('voting');
		$this->db->join('detail_user', 'detail_user.id_user = voting.id_user');
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		return $this->db->get();

	}
    public function select_all(){
		$this->db->select('*');
		$this->db->from('voting');
		$this->db->join('detail_user', 'detail_user.id_user = voting.id_user');
		$query = $this->db->get();
		return $query->num_rows();

	}
    public function vkandidat(){
		$this->db->select('*');
		$this->db->from('kandidat');
		
		$query = $this->db->get();
		return $query->result();
	}
}
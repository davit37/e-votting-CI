<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
	public function insert_pengumuman($pengumuman){
		$this->db->insert('pengumuman', $pengumuman);
		if ($this->db->affected_rows()==1) {
			return true;
		}
		else{
			return false;
		}
	}

	public function search_pengumuman($clue)
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->like('judul', $clue);
		$query = $this->db->get();
		return $query->result();
	}

	public function select_data(){
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->order_by('waktu_diedit', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function edit_pengumuman($id){
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->where('id_peng', $id);
		$query = $this->db->get();
		return $query->result();
	}

	
	public function proses_edit_pengumuman($id_peng, $data_update)
	{
		$this->db->update('pengumuman', $data_update, 'id_peng = '.$id_peng);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
	public function delete_pengumuman($id_peng){
		$this->db->where('id_peng', $id_peng);
		$this->db->delete('pengumuman');
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function tambah_user($data_login, $nik){
		$this->db->select('*');
		$this->db->from('detail_user');
		$this->db->join('akun', 'akun.id_user=detail_user.id_user');
		$this->db->where('nik', $nik);
		
		$this->db->or_where('username',$data_login['username']);
		$query = $this->db->get();
		if($query->num_rows() == 0){
			$this->db->insert('akun', $data_login);
			$query2= $this->db->affected_rows();
			if($this->db->affected_rows()>0){
				return true;
			}
		}
		else{
				return false;
		}
	}

	 // buat kode
	 public function buat_code(){
		 $this->db->select_max('id_user');
		 $query=$this->db->get('detail_user'); 
		 return $query->result();
	 }
 	public function max_no(){
		$this->db->select_max("no_kandidat", "no_max");
		$query = $this->db->get("kandidat");
		return $query->result();
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
	//search user
	public function search_user($clue)
	{
		$this->db->select('detail_user.*,akun.*');
		$this->db->from('detail_user');
		$this->db->join('akun', 'detail_user.id_user=akun.id_user');
		$this->db->or_like('nama', $clue);
		$this->db->or_like('alamat', $clue);
		$this->db->or_like('nik', $clue);
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_user($data_akun){
		$this->db->insert('detail_user', $data_akun);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
	public function image_user($data_image){
		$this->db->insert('image_user', $data_image);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function user_detail_gagal($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete('akun');
	}

	public function user_image_gagal($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete('akun');
		if($this->db->affected_rows()=='1'){
			$this->db->where('id_user', $id_user);
			$this->db->delete('detail_user');
		}
	}

	//daftar user
	public function select_all(){
		$this->db->select('akun.id_user, akun.username,detail_user.nik, detail_user.nama, detail_user.alamat');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function daftar_user($limit=array()){
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('detail_user', 'detail_user.id_user = akun.id_user');
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		return $this->db->get();

	}


	public function user_akun_detail($id_user){
		$this->db->select('akun.*,detail_user.*,image_user.*');
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
	//update akun
	public function update_akun($id_user, $data){
		$this->db->update('akun', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
	//update photo
	public function photo($id_user, $data){
		$this->db->update('image_user', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
	//hapus user
	public function hapus_akun($id_user){
		$tables = array('akun', 'detail_user', 'image_user');
		$this->db->where('id_user', $id_user);
		$this->db->delete($tables);
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	//tambah kandidat
	public function tambah_kandidat($data_kandidat){
		$this->db->insert('kandidat', $data_kandidat);
		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function cek_id_user($id_user)
	{
		$this->db->select('nik');
		$this->db->from('detail_user');
		$this->db->where('nik', $id_user);
		$query = $this->db->get();
		if($query->num_rows()==0){
			return false;
		}
		else{
			return true;
		}
	}

	//cekid
	public function cek_kandidat($nik){
		$this->db->select('*');
		$this->db->from('kandidat');
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function photo_kandidat($data, $id_user){
		$this->db->update('image_user', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	//daftar semua kandidat
	public function vkandidat(){
		$this->db->select('*');
		$this->db->from('kandidat');
		
		$query = $this->db->get();
		return $query->result();
	}

	//detail kandidat
	public function detail_kandidat($nik){
		$this->db->select('kandidat.*, visimisi.*');
		$this->db->from('kandidat');
		$this->db->join('visimisi', 'visimisi.no_kandidat = kandidat.no_kandidat');
		$this->db->where('kandidat.nik', $nik);
		$query = $this->db->get();
			if($query->num_rows() >0){
				return $query->result();
			}
			else{
				return false;
			}
	}

	//update profile kandidat
	public function update_kandidat($id_user, $data){
		$this->db->where('id_user', $id_user);
		$this->db->update('kandidat', $data);
		if($this->db->affected_rows()==1){
			return true;
		}
		else{
			return false;
		}
	}
	//visi misi
	public function no_visimisi(){
		$this->db->select('*');
		$this->db->from('visimisi');
		$this->db->order_by('no_kandidat', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function visi_misi($no, $data){
		$this->db->update('visimisi', $data, 'no_kandidat='.$no);
		if($this->db->affected_rows()==1){
			return true;
		}
		else{
			return false;
		}
	}

	//update photo
	public function photo_kandidat_update($id_user, $data){
		$this->db->update('image_user', $data, 'id_user='.$id_user);
		if($this->db->affected_rows()==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	//insert photo
	public function tambah_photo($data)
	{
		$this->db->insert('image_kandidat', $data);
		if($this->db->affected_rows()==1){
			return true;
		}
		else{
			return false;
		}
	}
	
	//hapus photo
	public function hapus_photo($data){
		$tables = array('image_kandidat');
		$this->db->where('no_kandidat', $data);
		$this->db->delete($tables);
	}
		

	//hapus kandidat
	public  function hapus_kandidat($no_kandidat){
		$tables = array('kandidat');
		$this->db->where('no_kandidat', $no_kandidat);
		$this->db->delete($tables);
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	public function hapus_visi($no_kandidat){
		$tables = array('visimisi');
		$this->db->where('no_kandidat',$no_kandidat);
		$this->db->delete($tables);
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	//search kandidat
	public function search_kandidat($clue)
	{
		$this->db->select('*');
		$this->db->from('kandidat');
		$this->db->join('detail_user', 'detail_user.id_user=kandidat.id_user');
		$this->db->like('nama', $clue);
		$this->db->or_like('no_kandidat', $clue);
		$this->db->or_like('nik', $clue);
		$query = $this->db->get();
		return $query->result();
	}

	//visi misi
	public function visimisi(){
		$this->db->select('*');
		$this->db->from('visimisi');
		$query = $this->db->get();
		return $query->result();
	}

	//proses tambah visi misi
	public function proses_tambah_visimisi($data)
	{	
			$this->db->insert('visimisi', $data);
			if($this->db->affected_rows()>0){
				return true;
			}
		else{
			return false;
		}
	}

	//cek voting
	public function cekvoting(){
		$this->db->select('*');
		$this->db->from('tgl_voting');
		$query = $this->db->get();
		if($query->num_rows()>0){
		return $query->result();
		}else{
			return;
		}
	}
	//datevoting
	public function datevoting($data){
		$this->db->insert('tgl_voting', $data);
		if($this->db->affected_rows()>0){
			return true;
		}
	}

	//hapus voting
	public function delete_voting($id){
		$this->db->where('id', $id);
		$this->db->delete('tgl_voting');
		
		if($this->db->affected_rows()==1){
			return true;
		}
		else{
			return false;
		}

	}

	public function update_voting($id, $data){
		$this->db->update('tgl_voting', $data, 'id='.$id);
		if ($this->db->affected_rows() ==1) {
			return true;
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
	public function no_calon(){
		$query ="select * from kandidat order by no_kandidat DESC limit 1";
		$res = $this->db->query($query);
		return $res->row_array();
	}

	public function reset_count(){
		$query = "DELETE from voting";
		$res = $this->db->query($query);
		return true;
	}

	public function reset_status(){
		$query = "UPDATE detail_user SET status = 'n'";
		$res = $this->db->query($query);
		return true;
	}

	public function select_all_pesan(){
		$this->db->select('*');
		$this->db->from('keluhan');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function pesan($limit=array()){
		$this->db->select('*');
		$this->db->from('keluhan');
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		return $this->db->get();
		}

}



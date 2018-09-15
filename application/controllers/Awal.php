<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class awal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');		
		$this->load->model('Mawal');
		$this->load->model('Muser');
	}

	public function index()
	{
		
		
		$result ['no_calon'] = $this->Mawal->no_calon();
		$result['angka']=$this->Muser->max_no();
		$result['total']=$this->Mawal->total();
		$result['suara'] = array();
		$kandidat = $result['no_calon']['no_kandidat'];
		for($i=1; $i<=$kandidat; $i++){
			$result['suara'][$i] = $this->Mawal->quickcount($i);
		}
		
		$this->load->view('awal/vawal', $result);
	}
	public function detail_kandidat($id)
	{
		$data['detail_kandidat'] = $this->Mawal->detail_kandidat($id);
		
		$this->load->view('awal/kandidat', $data);
	}
	public function checkDifferenceNow($waktu){ 

	date_default_timezone_set("Asia/Makassar"); 
	$now = new datetime(); 
	$waktu = new datetime($waktu); 
	$interval = $waktu->diff($now); 
		if($interval->y > 0){ 
		return $time->y." tahun"; 
		} 
		elseif ($interval->m > 0) { 
		return $interval->m." bulan"; 
		} 
		elseif ($interval->d > 0) { 
		return $interval->d." hari"; 
		} 
		elseif ($interval->h > 0) { 
		return $interval->h." jam"; 
		} 
		elseif ($interval->i > 0) { 
		return $interval->i." menit"; 
		} 
		elseif ($interval->s > 0) { 
		return $interval->s." detik"; 
		} 
	}
	
}

?>

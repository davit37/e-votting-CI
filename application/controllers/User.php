<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
			$id_user = ($this->session->userdata['logged_in']['nik']);
			$login = ($this->session->userdata['logged_in']['loggedin']);
			$akses = ($this->session->userdata['logged_in']['akses']);
			if(!$login){
			redirect (site_url('login/user'));
			}
		$this->load->model('Muser');
		$this->load->model('Mlogin');
		
		$tanggal = $this->Muser->tanggal();
		if($tanggal !=false){
			$this->session->set_userdata('start', $tanggal[0]->start);
			$this->session->set_userdata('end', $tanggal[0]->end);
		}
	}

	public function index()
	{
		$status = ($this->session->userdata['logged_in']['status']);
		$tanggal = $this->Muser->getTanggal();
		if($tanggal != FALSE){
		$result['start'] = $tanggal[0]->start;
		$result['end'] = $tanggal[0]->end;
		
		$dateawal = $tanggal[0]->start;
		$dateakhir = $tanggal[0]->end;
		date_default_timezone_set('Asia/jakarta');
		$date = date('Y-m-d H:i:s');
		if($date > $dateawal && $date < $dateakhir){
			if($status =='n'){
			$result['disable'] = '';
			}else{
			$result['disable'] = 'disabled';
			}
		}
		else{
			$result['disable'] = 'disabled';
		}
		}
		else{
			$result['disable'] = 'disabled';
		}
			
		$result ['no_calon'] = $this->Muser->no_calon();
		$result['daftar_kandidat'] = $this->Muser->photo_kandidat();
		$result['angka']=$this->Muser->max_no();
		$result['pengumuman'] = array(); 
		
		
			
		
		
		$this->load->view('user/Dashboard', $result);
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
	public function user_akun_detail(){
		$id_user = $this->input->get('id');
		$detail['data'] = $this->Muser->user_akun_detail($id_user);
		$this->load->view('user/Detail_user', $detail);
	}

	public function daftar_calon()
	{
		$result ['no_calon'] = $this->Muser->no_calon();
		$this->load->view('user/Kandidat', $result);
	}

	public function detail_kandidat($id)
	{
		$data['detail_kandidat'] = $this->Muser->detail_kandidat($id);
		$status = ($this->session->userdata['logged_in']['status']);
		{
			$result = $this->Muser->getTanggal();
			if($result != FALSE){
				$dateawal = $result[0]->start;
				$dateakhir = $result[0]->end;
				date_default_timezone_set('Asia/jakarta');
				$date = date('Y-m-d H:i:s');
				if($date > $dateawal && $date < $dateakhir){
					if($status =='n'){
					$data['disable'] = '';
					}else{
					$data['disable'] = 'disabled';
					}
				}else{
					$data['disable'] = 'disabled';
				}
			}else{
				$data['disable'] = 'disabled';
			}
		}
		$this->load->view('user/V_detailkandidat', $data);
	}

	public function hasil_voting(){
		$id_user = ($this->session->userdata['logged_in']['id_user']);
		
		if($id_user ==false){
			$hasil['hasil']='data_gagal';
			echo json_encode($hasil);
		}
		$data = array(
			'id_user' => $id_user,
			'no_kandidat' => $this->input->get('no')
			);
		$result = $this->Muser->hasil_voting($id_user, $data);
		if($result != FALSE){
				$result = $this->Muser->get_information($id_user);
					$session_data = array(
						'id_user'	=> $id_user,
						'nama'	=> $result[0]->nama,
						'gambar'=> $result[0]->name,
						'akses'	=> $result[0]->akses,
						'status' => $result[0]->status,
						'loggedin' => true,
						);
				$this->session->set_userdata('logged_in', $session_data);
				$hasil['hasil'] = 'true';
				echo json_encode($hasil);
			}else{
				$hasil['hasil'] = 'false';
				echo json_encode($hasil);
			}
	}

	public function quickcount(){
		$result ['no_calon'] = $this->Muser->no_calon();
		$result['suara'] = array();
		$kandidat = $result['no_calon']['no_kandidat'];
		for($i=1; $i<=$kandidat; $i++){
			$result['suara'][$i] = $this->Muser->quickcount($i);
		}
		$this->load->view('user/Quickcount', $result);
	}
	public function update_info(){
		$id_user = ($this->session->userdata['logged_in']['id_user']);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telephone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if($this->form_validation->run() == FALSE){
			$hasil['hasil'] = 'false';
			echo json_encode($hasil);
		}
		else{
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'no_telp'	=> $this->input->post('no_telp'),
				'alamat'	=> $this->input->post('alamat')

				);
			$result = $this->Muser->update_info($id_user, $data);
			if($result == true){
				$hasil['hasil'] = 'true';
				echo json_encode($hasil);
			}
			else{
				$hasil['hasil'] = 'false';
				echo json_encode($hasil);
			}	
		}
	}

	public function update_akun(){
		$id_user = ($this->session->userdata['logged_in']['id_user']);
		$this->form_validation->set_rules('pass', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			redirect(site_url());
		}
		else{
			$data = array(
				'password'	=> md5($this->input->post('pass')),
				);
			$result = $this->Muser->update_akun($id_user, $data);
			if($result == TRUE){
				$hasil['hasil'] = 'true';
				echo json_encode($hasil);
			}
			else{
				$hasil['hasil'] = 'false';
				echo json_encode($hasil);
			}
		}
	}

	public function photo(){
		//berfungsi saat submit ditekan namun file kosong supaya tidak masuk ke database
		if (empty($_FILES['imgName']['name']))
			{
			    $this->form_validation->set_rules('imgName', 'Document', 'required');
			    redirect(base_url());
			}
		else{
		$id_user = ($this->session->userdata['logged_in']['id_user']);
		$this->load->library('upload');
		$namafile = "file_".time();
		//konfigurasi ukuran dan type yang bisa di upload
		$config = array(
		'upload_path' => "./pictures/", //mengatur lokasi penyimpanan gambar
		'allowed_types' => "gif|jpg|png|jpeg|pdf", // mengatur type yang boleh disimpan
		'overwrite' => TRUE,
		'max_size' => "2048000",//maksimal ukuran file yang bisa diupload, disini menggunankan 2MB
		'max_height' => "768",
		'max_width' => "1024",
		'file_name'	=> $namafile //nama file yang akan terimpan nanti 
		);

		$this->upload->initialize($config);
		if($_FILES['imgName']['name']){
			if($this->upload->do_upload('imgName')){
				$gambar =  $this->upload->data();
				
				//data yang akan di insert ke database
				$data = array(
					'name'	=> $gambar['file_name'],
					'type'	=> $gambar['file_type']
					);
				$result = $this->Muser->photo($id_user, $data);
				if($result != FALSE){
					$result = $this->Muser->get_information($id_user);
					$session_data = array(
						'id_user'	=> $id_user,
						'nama'	=> $result[0]->nama,
						'gambar'=> $result[0]->name,
						'akses'	=> $result[0]->akses,
						'status' => $result[0]->status,
						'loggedin' => true,
						);
				$this->session->set_userdata('logged_in', $session_data);
					echo '<script type="text/javascript">alert("Update Berhasil!!!")</script>';
					redirect(site_url(), 'refresh');
					}
				}
			}
		}
	}

	public function masalah(){
		$data = array(
			'id_user' => $this->session->userdata['logged_in']['id_user'],
			'deskripsi' => $this->input->post('deskripsi'),
			);
		$result = $this->Muser->masalah($data);
		if($result != FALSE){
			echo '<script type="text/javascript">alert("Berhasil!!!")</script>';
			redirect(site_url(), 'refresh');
		}

	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mlogin');
	}

	public function index()
	{
		$this->load->view('login/Vlogin');
	}
	public function check_login()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE ){
			$this->load->view('login/Vlogin');
		}
		else{
			$akun = array(
			'username'		=> $this->input->post('username'),
			'password'	=>$this->input->post('password')
			);

			$result = $this->Mlogin->check_akun($akun);
			if($result != false){
				$result = $this->Mlogin->get_information($akun);
				
					$session_data = array(
						
						'username'	=> $akun['username'],
						'nama'	=> $result[0]->nama,
						'gambar'=> $result[0]->name,
						'akses'	=> $result[0]->akses,
						'status' => $result[0]->status,
						'id_user'=> $result[0]->id_user,
						'loggedin' => true,
						);
					$this->session->set_userdata('logged_in', $session_data);
				if ($result[0]->akses=='a') {
					$hasil['hasil'] = 'a';
					echo json_encode($hasil);
				}
				else if($result[0]->akses=='u'){
					$hasil['hasil'] = 'u';
					echo json_encode($hasil);
				}
				else if($result[0]->akses=='p'){
					$hasil['hasil'] = 'p';
					echo json_encode($hasil);
				}
			}
			else
			{
				$hasil['hasil'] = 'false';
				echo json_encode($hasil);
			}
	}
}
public function user(){
	$this->load->view('login/Ulogin');
}
public function cek_login_user()
	{
		$this->form_validation->set_rules('nik', 'nik', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE ){
			$hasil['hasil'] = 'kosong';
			echo json_encode($hasil);
		}
		else{
			$akun = array(
			'nik'		=> $this->input->post('nik'),
			'password'	=>$this->input->post('password')
			);

			$result = $this->Mlogin->check_user($akun);
			if($result != false){
				$result = $this->Mlogin->get_information_user($akun);
				
					$session_data = array(
						
						'nik'	=> $akun['nik'],
						'nama'	=> $result[0]->nama,
						'gambar'=> $result[0]->name,
						'akses'	=> $result[0]->akses,
						'status' => $result[0]->status,
						'id_user'=> $result[0]->id_user,
						'loggedin' => true,
						);
					$this->session->set_userdata('logged_in', $session_data);
				if ($result[0]->akses=='u') {
					$hasil['hasil'] = 'true';
					echo json_encode($hasil);
				}else {
					$hasil['hasil'] = 'false';
					echo json_encode($hasil);
				}
				
			}
			else
			{
				$hasil['hasil'] = 'false';
				echo json_encode($hasil);
			}
	}
}
	public function logout(){
		//menghapus data session
		$sess_array = array(
		'nama' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->load->view('login/Vlogin');
		}
		public function logout2(){
			//menghapus data session
			$sess_array = array(
			'nama' => ''
			);
			$this->session->unset_userdata('logged_in', $sess_array);
			$this->load->view('login/Ulogin');
			}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */

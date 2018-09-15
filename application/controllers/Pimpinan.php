<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pimpinan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
			$id_user = ($this->session->userdata['logged_in']['id_user']);
			$login = ($this->session->userdata['logged_in']['loggedin']);
			$akses = ($this->session->userdata['logged_in']['akses']);
			if(!$login){
			redirect (site_url('login'));
			}
		$this->load->model('Mpimpinan');
        $this->load->model('Madmin');
		$this->load->model('Mlogin');
		
		
	}
    public function index()
	{
		$this->load->view('pimpinan/vkandidat');
	}
    //menampilkan user
	public function daftar_user($offset=0){
		//tentukan jumlah tampil perpage
		$perpage= 10;


		//konfigurasi tampilan paging

		$config = array(
			'base_url'	=> site_url('pimpinan/daftar_user'),
			'total_rows'=>$this->Madmin->select_all(),

			'per_page'	=>$perpage,
			'full_tag_open'	=> "<ul class='pagination'>",
			'full_tag_close'=> "</ul>",
			'num_tag_open'	=> '<li>',
			'num_tag_close' => '</li>',
			'cur_tag_open'	=> '<li class="active blue"><a href="#">',
			'cur_tag_close'	=> '</a></li>',
			'next_tag_open' => "<li>",
	  		'next_tagl_close' => "</li>",
	   		'prev_tag_open' => "<li>",
	   		'prev_tagl_close' => "</li>",
	   		'first_tag_open' => "<li>",
	   		'first_tagl_close' => "</li>",
	  		'last_tag_open'=>"<li>",
	   		'last_tagl_close' => "</li>",
			);

		//inisialisasi pagination dan config
		$this->pagination->initialize($config);
		$limit['perpage'] = $perpage;
		$limit['offset'] = $offset;
		$data['no'] = $offset+1;
		$data['data'] = $this->Mpimpinan->daftar_user($limit)->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pimpinan/Vdaftaruser', $data);
	}
    //menampilkan user
	public function daftar_pemilih($offset=0){
		//tentukan jumlah tampil perpage
		$perpage= 10;


		//konfigurasi tampilan paging

		$config = array(
			'base_url'	=> site_url('pimpinan/daftar_pemilih'),
			'total_rows'=>$this->Mpimpinan->select_all(),

			'per_page'	=>$perpage,
			'full_tag_open'	=> "<ul class='pagination'>",
			'full_tag_close'=> "</ul>",
			'num_tag_open'	=> '<li>',
			'num_tag_close' => '</li>',
			'cur_tag_open'	=> '<li class="active blue"><a href="#">',
			'cur_tag_close'	=> '</a></li>',
			'next_tag_open' => "<li>",
	  		'next_tagl_close' => "</li>",
	   		'prev_tag_open' => "<li>",
	   		'prev_tagl_close' => "</li>",
	   		'first_tag_open' => "<li>",
	   		'first_tagl_close' => "</li>",
	  		'last_tag_open'=>"<li>",
	   		'last_tagl_close' => "</li>",
			);

		//inisialisasi pagination dan config
		$this->pagination->initialize($config);
		$limit['perpage'] = $perpage;
		$limit['offset'] = $offset;
		$data['no'] = $offset+1;
		$data['data'] = $this->Mpimpinan->daftar_pemilih($limit)->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('pimpinan/Vdaftar_pemilih', $data);
	}
    public function vkandidat(){
		
		$data['daftar_kandidat'] = $this->Mpimpinan->vkandidat();
		
		$this->load->view('pimpinan/Vkandidat', $data);
	}
}

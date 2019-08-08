<?php 
class C_login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('m_admin');
	}

	function index(){
		$this->load->view('pages/login');
	}

	function aksi_login(){
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
		$bagian = $this->input->post('bagian');
		$tahun_anggaran = $this->input->post('tahun_anggaran');
		
		$where = array(
			'nip' => $nip,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("pegawai",$where)->num_rows();
		if($cek > 0){
 		
			$data_session = array(
				'nama' => $nip,
				'status' => "login",
				'tahun_anggaran' => $tahun_anggaran
				);
 
			$this->session->set_userdata($data_session);

			if ($bagian == 'UMUM') {
				redirect(base_url("index.php/c_pengguna/umum"));
			}
			elseif ($bagian == 'MSKI') {
				redirect(base_url("index.php/c_pengguna/mski"));
			}
			elseif ($bagian == 'PD') {
				redirect(base_url("index.php/c_pengguna/pd"));
			}
			elseif ($bagian == 'BANK') {
				redirect(base_url("index.php/c_pengguna/bank"));
			}
			elseif ($bagian == 'VERA') {
				redirect(base_url("index.php/c_pengguna/vera"));
			}

 
		}else{
			$this->load->view('pages/login');
		}
	}

	function login_admin(){
		$this->load->view('pages/login_admin');
	}

	function cek_admin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_admin->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 		
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);

			redirect(base_url("index.php/c_admin/admin"));

		}else{
			$this->load->view('pages/login_admin');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}	
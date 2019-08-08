<?php 

class C_admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		} 
	}

	function admin(){
        $this->load->view('admin/templates/header');
		$this->load->view('admin/home');
	}

	function bidang(){
        $this->load->view('admin/templates/header');
		$this->load->view('admin/bidang');
	}

	function profil(){
        $this->load->view('admin/templates/header');
		$this->load->view('admin/profil');
	}

	public function data_pegawai() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_table('pegawai');
        $crud->unset_columns('password');
        // simpan hasilnya kedalam variabel output
        $crud->required_fields('nip');
        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/data_pegawai', $output);

    }

    function home_umum()
    {
        $this->load->view('admin/templates/header');
    	$this->load->view('admin/home_umum');
    }

    function home_mski()
    {
        $this->load->view('admin/templates/header');
    	$this->load->view('admin/home_mski');
    }

    function home_pd()
    {
        $this->load->view('admin/templates/header');
    	$this->load->view('admin/home_pd');
    }

    function home_bank()
    {
        $this->load->view('admin/templates/header');
    	$this->load->view('admin/home_bank');
    }

    function home_vera()
    {
        $this->load->view('admin/templates/header');
    	$this->load->view('admin/home_vera');
    }

    function surat_mski()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('ptup');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_columns(array('tempat', 'status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala'));
         $crud->add_action('More', '', 'demo/action_more', 'ui-icon-plus');
        $output = $crud->render();

        $this->load->view('admin/templates/header');
        $this->load->view('mski/semua_surat', $output);
    }

    function surat_vera()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('vera');
        $crud->unset_add();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
         // $crud->add_action('More', '', 'demo/action_more', 'ui-icon-plus');
        $crud->unset_columns(array('status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala'));
        $output = $crud->render();

        $this->load->view('admin/templates/header');
        $this->load->view('vera/semua_surat', $output);
    }

    function surat_bank()
    {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
         // $crud->set_theme('datatables'); 
        $crud->set_table('bank');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();

        $crud->unset_columns(array('status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala'));

        // $crud->add_action('Cetak', 'k', 'c_bank/tampil_surat', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('admin/templates/header');
        $this->load->view('bank/semua_surat', $output);
    }

    function data_daerah()
    {
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_table('daerah');
        // $crud->unset_columns('password');
        // simpan hasilnya kedalam variabel output
        $crud->required_fields('kode');
        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/data_daerah', $output);
    }

    function semua_surat_spb()
    {
         $crud = new grocery_CRUD();
        $crud->set_table('penolakan_spms');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_columns(array('lampiran', 'no_surat_pengajuan', 'status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala', 'alasan'));

         // $crud->add_action('Cetak', 'k', 'c_pd/tampil_surat_penolakan', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('admin/templates/header');
        $this->load->view('pd/semua_surat_spb', $output);
    }

    function semua_surat_pengembalian_skpp()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('pengembalian_skpp');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_columns(array('lampiran', 'no_surat_pengajuan', 'status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala', 'alasan'));

         // $crud->add_action('Cetak', 'k', 'c_pd/tampil_surat_pengembalian', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('admin/templates/header');
        $this->load->view('pd/semua_surat_pengembalian_skpp', $output);
    }

    function data_pegawai_atas()
    {
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_table('pegawai_atas');
        // $crud->unset_columns('password');
        // simpan hasilnya kedalam variabel output
        $crud->required_fields('nip');
        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/data_pegawai_atas', $output);
    }
}
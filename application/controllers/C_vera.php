<?php 

class C_vera extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengguna');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
	}

	function buat_surat(){
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$this->load->view('vera/templates/header');
		$this->load->view('vera/buat_surat', $data);
	}

	function simpan_surat()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kepada = $this->input->post('kepada');
		$sanksi = $this->input->post('sanksi');	
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kepada' => $kepada,
			 'sanksi' => $sanksi,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);
		$kirim['no_surat'] = $no_surat;
		$kirim['tanggal_surat'] = $tanggal_surat;
		$kirim['kepada'] = $kepada;
		$kirim['sanksi'] = $sanksi;
		$kirim['status_kepala'] = $status_kepala;
		$kirim['ket_jabatan_kepala'] = $ket_jabatan_kepala;
		$kirim['nama_kepala'] = $nama_kepala;
		$kirim['nip_kepala'] = $nip_kepala;

		$cek = $this->m_pengguna->chek_data($no_surat, 'vera');
		if ($cek == null) {
			$this->m_pengguna->input_data($data, 'vera');
			$this->load->view('vera/templates/header');
			$this->load->view('vera/tampil_surat', $kirim);
		}
		else{
			foreach ($cek as $d) {
				if ($d->no_surat == $no_surat) {
					$this->load->view('vera/templates/header');
					$this->load->view('vera/pesan_error');
				}
			}
		}
		// redirect(base_url('index.php/c_vera/tampil_surat'));
	}

	function semua_surat()
	{
		 // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
         // $crud->set_theme('datatables');	
        $crud->set_table('vera');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_columns(array('status_kepala', 'ket_jabatan_kepala', 'nip_kepala', 'nama_kepala'));
         $crud->add_action('Cetak', '../../assets/grocery_crud/themes/flexigrid/print.png', 'c_vera/tampil_surat', 'ui-icon-plus');
         $crud->add_action('Edit', '../../assets/grocery_crud/themes/flexigrid/edit.png', 'c_vera/edit', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('vera/templates/header');
        $this->load->view('vera/semua_surat', $output);
        // $this->load->view('mski/templates/footer');
	}

	function tampil_surat($id)
	{
		$where = array('no_surat' => $id);
		$data['vera'] = $this->m_pengguna->get_where($where, 'vera')->result();

		$this->load->view('vera/templates/header');
		$this->load->view('vera/tampil_surat_dua', $data);
	}

	function nama_kepala()
	{
		$kode = $this->input->post('nama_kepala');
		// echo $kode;
		$data['nama_kepala']=$this->m_pengguna->get_nip($kode);
		$this->load->view('vera/ajax_nip', $data);
	}

	function edit($id)
	{
		$where = array('no_surat' => $id);
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$data['vera'] = $this->m_pengguna->get_where($where, 'vera')->result();
		
		$this->load->view('vera/templates/header');
		$this->load->view('vera/edit', $data);
	}

	function simpan_edit_surat()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kepada = $this->input->post('kepada');
		$sanksi = $this->input->post('sanksi');	
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kepada' => $kepada,
			 'sanksi' => $sanksi,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);

		$where = array(
		'no_surat' => $no_surat
		);

		$this->m_pengguna->update_data($where, $data,'vera');
		redirect('c_vera/semua_surat');
	}
}

?>
 <?php 

class C_bank extends CI_Controller
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
		$data['daerah'] = $this->m_pengguna->tampil_data()->result();
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$this->load->view('bank/templates/header');
		$this->load->view('bank/buat_surat', $data);
	}

	function simpan_surat()
	{
		// $id = '01';
		// $where = array('id_urut' => $id);
		// $kirim['pegawai'] = $this->m_pengguna->get_where($where, 'pegawai')->result();

		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kode = $this->input->post('kode');
		$kepada = $this->input->post('kepada');
		$satker = $this->input->post('satker');
		$tempat = $this->input->post('tempat');	
		$bank_retur = $this->input->post('bank_retur');
		$tanggal_ralat = $this->input->post('tanggal_ralat');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kode' => $kode,
			 'kepada' => $kepada,
			 'satker' => $satker,
			 'tempat' => $tempat,
			 'bank_retur' => $bank_retur,
			 'tanggal_ralat' => $tanggal_ralat,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala,

		);
		$kirim['no_surat'] = $no_surat;
		$kirim['tanggal_surat'] = $tanggal_surat;
		$kirim['kode'] = $kode;
		$kirim['kepada'] = $kepada;
		$kirim['satker'] = $satker;
		$kirim['tempat'] = $tempat;
		$kirim['bank_retur'] = $bank_retur;
		$kirim['tanggal_ralat'] = $tanggal_ralat;
		$kirim['status_kepala'] = $status_kepala;
		$kirim['ket_jabatan_kepala'] = $ket_jabatan_kepala;
		$kirim['nama_kepala'] = $nama_kepala;
		$kirim['nip_kepala'] = $nip_kepala;

		$cek = $this->m_pengguna->chek_data($no_surat, 'bank');
		if ($cek == null) {
			$this->m_pengguna->input_data($data, 'bank');
			$this->load->view('bank/templates/header');
			$this->load->view('bank/tampil_surat', $kirim);
		}
		else{
			foreach ($cek as $d) {
				if ($d->no_surat == $no_surat) {
					$this->load->view('bank/templates/header');
					$this->load->view('bank/pesan_error');
				}
			}
		}

		
		
		
		// redirect(base_url('index.php/c_bank/tampil_surat'));
	}

	function semua_surat()
	{
		 // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
         // $crud->set_theme('datatables');	
        $crud->set_table('bank');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_columns(array('status_kepala', 'ket_jabatan_kepala', 'bank_retur', 'nama_kepala', 'nip_kepala'));
        $crud->add_action('Cetak', '../../assets/grocery_crud/themes/flexigrid/print.png', 'c_bank/tampil_surat', 'ui-icon-plus');
        $crud->add_action('Edit', '../../assets/grocery_crud/themes/flexigrid/edit.png', 'c_bank/edit', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('bank/templates/header');
        $this->load->view('bank/semua_surat', $output);
        // $this->load->view('mski/templates/footer');
	}

	function tampil_surat($id)
	{
		$where = array('no_surat' => $id);
		$data['bank'] = $this->m_pengguna->get_where($where, 'bank')->result();
		
		$this->load->view('bank/templates/header');
		$this->load->view('bank/tampil_surat_dua', $data);
	}

	function ajaxrespon()
	{
		$kode = $this->input->post('kode');

		$data['daerah']=$this->m_pengguna->get_subkategori($kode);
		$this->load->view('bank/ajax', $data);
	}

	function edit($id)
	{
		$where = array('no_surat' => $id);
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$data['daerah'] = $this->m_pengguna->tampil_data()->result();
		$data['bank'] = $this->m_pengguna->get_where($where, 'bank')->result();
		
		$this->load->view('bank/templates/header');
		$this->load->view('bank/edit', $data);
	}

	function simpan_edit_surat()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kode = $this->input->post('kode');
		$kepada = $this->input->post('kepada');
		$satker = $this->input->post('satker');
		$tempat = $this->input->post('tempat');	
		$bank_retur = $this->input->post('bank_retur');
		$tanggal_ralat = $this->input->post('tanggal_ralat');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kode' => $kode,
			 'kepada' => $kepada,
			 'satker' => $satker,
			 'tempat' => $tempat,
			 'bank_retur' => $bank_retur,
			 'tanggal_ralat' => $tanggal_ralat,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala,

		);

		$where = array(
		'no_surat' => $no_surat
		);

		$this->m_pengguna->update_data($where, $data,'bank');
		redirect('c_bank/semua_surat');
	}

	function nama_kepala()
	{
		$kode = $this->input->post('nama_kepala');
		// echo $kode;
		$data['nama_kepala']=$this->m_pengguna->get_nip($kode);
		$this->load->view('bank/ajax_nip', $data);
	}
}

?>
<?php 

class C_pengguna extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_pengguna');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
	}

	function umum(){
		$this->load->view('umum/templates/header');
		$this->load->view('umum/home');
		$this->load->view('umum/templates/footer');
	}

	function mski(){
		$this->load->view('mski/templates/header');
		$this->load->view('mski/home');
		$this->load->view('mski/templates/footer');
	}

	function pd(){
		$this->load->view('pd/templates/header');
		$this->load->view('pd/home');
		$this->load->view('pd/templates/footer');
	}

	function bank(){
		$this->load->view('bank/templates/header');
		$this->load->view('bank/home');
		$this->load->view('bank/templates/footer');
	}

	function vera(){
		$this->load->view('vera/templates/header');
		$this->load->view('vera/home');
		$this->load->view('vera/templates/footer');
	}

	function buat_surat(){
		$data['daerah'] = $this->m_pengguna->tampil_data()->result();
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$this->load->view('mski/templates/header');
		$this->load->view('mski/buat_surat', $data);
		$this->load->view('mski/templates/footer');
	}

	function simpan_surat()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kode = $this->input->post('kode');
		$kepada = $this->input->post('kepada');
		$tempat = $this->input->post('tempat');
		$no_surat_pengajuan = $this->input->post('no_surat_pengajuan');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$jumlah_uang = $this->input->post('jumlah_uang');
		$no_beban = $this->input->post('no_beban');
		$tanggal_ketetapan_beban = $this->input->post('tanggal_ketetapan_beban');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kode' => $kode,
			 'kepada' => $kepada,
			 'tempat' => $tempat,
			 'no_surat_pengajuan' => $no_surat_pengajuan,
			 'tanggal_pengajuan' => $tanggal_pengajuan,
			 'jumlah_uang' => $jumlah_uang,
			 'no_beban' => $no_beban,
			 'tanggal_ketetapan_beban' => $tanggal_ketetapan_beban,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);

		$kirim['no_surat'] = $no_surat;
		$kirim['tanggal_surat'] = $tanggal_surat;
		$kirim['kode'] = $kode;
		$kirim['kepada'] = $kepada;
		$kirim['tempat'] = $tempat;
		$kirim['no_surat_pengajuan'] = $no_surat_pengajuan;
		$kirim['tanggal_pengajuan'] = $tanggal_pengajuan;
		$kirim['jumlah_uang'] = $jumlah_uang;
		$kirim['no_beban'] = $no_beban;
		$kirim['tanggal_ketetapan_beban'] = $tanggal_ketetapan_beban;
		$kirim['status_kepala'] = $status_kepala;
		$kirim['ket_jabatan_kepala'] = $ket_jabatan_kepala;
		$kirim['nama_kepala'] = $nama_kepala;
		$kirim['nip_kepala'] = $nip_kepala;

		$cek = $this->m_pengguna->chek_data($no_surat, 'ptup');
		if ($cek == null) {
			$this->m_pengguna->input_data($data, 'ptup');
			// $data['pegawai'] = $this->m_pengguna->tampil_data()->result();
			// redirect(base_url('index.php/c_pengguna/tampil_surat', $kirim));
			$this->load->view('mski/templates/header');
			$this->load->view('mski/tampil_surat', $kirim);
		}
		else{
			foreach ($cek as $d) {
				if ($d->no_surat == $no_surat) {
					$this->load->view('mski/templates/header');
					$this->load->view('mski/pesan_error');
				}
			}
		}


		
		// $this->load->view('mski/templates/footer');
		
		// if($cek <= 0){
			
		// }
	}

	function semua_surat()
	{
		 // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
         // $crud->set_theme('datatables');	
        $crud->set_table('ptup');
        // simpan hasilnya kedalam variabel output

        $crud->unset_add();
        $crud->unset_edit();

        $crud->unset_columns(array('kepada', 'status_kepala', 'ket_jabatan_kepala', 'nip_kepala', 'nama_kepala'));
        $crud->add_action('Cetak', '../../assets/grocery_crud/themes/flexigrid/print.png', 'c_pengguna/tampil_surat');
        $crud->add_action('Edit', '../../assets/grocery_crud/themes/flexigrid/edit.png', 'c_pengguna/edit', '');
        $crud->add_action('Books', '', 'admin/book', 'el-book');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('mski/templates/header');
        $this->load->view('mski/semua_surat', $output);
        // $this->load->view('mski/templates/footer');
	}

	function tampil_surat($id)
	{
		// $id = $this->input->post('id');
		 // $data['no_surat'] = $id;
		$where = array('no_surat' => $id);
		$data['ptup'] = $this->m_pengguna->get_where($where, 'ptup')->result();
		
		$this->load->view('mski/templates/header');
		$this->load->view('mski/tampil_surat_dua', $data);
		$this->load->view('mski/templates/footer');
		
	}
	function cetak()
	{
		# code...
	}

	function home_mski()
	{
		$this->load->view('mski/templates/header');
		$this->load->view('mski/home');
		$this->load->view('mski/templates/footer');
	}

	function ajaxrespon()
	{
		$kode = $this->input->post('kode');

		$data['daerah']=$this->m_pengguna->get_subkategori($kode);
		$this->load->view('mski/ajax', $data);
	}

	function nama_kepala()
	{
		$kode = $this->input->post('nama_kepala');
		// echo $kode;
		$data['nama_kepala']=$this->m_pengguna->get_nip($kode);
		$this->load->view('mski/ajax_nip', $data);
	}

	function edit($id)
	{
		$where = array('no_surat' => $id);
		$data['pegawai'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$data['daerah'] = $this->m_pengguna->tampil_data()->result();
		$data['ptup'] = $this->m_pengguna->get_where($where, 'ptup')->result();
		
		$this->load->view('mski/templates/header');
		$this->load->view('mski/edit', $data);
	}

	function simpan_surat_edit()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kode = $this->input->post('kode');
		$kepada = $this->input->post('kepada');
		$tempat = $this->input->post('tempat');
		$no_surat_pengajuan = $this->input->post('no_surat_pengajuan');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$jumlah_uang = $this->input->post('jumlah_uang');
		$no_beban = $this->input->post('no_beban');
		$tanggal_ketetapan_beban = $this->input->post('tanggal_ketetapan_beban');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kode' => $kode,
			 'kepada' => $kepada,
			 'tempat' => $tempat,
			 'no_surat_pengajuan' => $no_surat_pengajuan,
			 'tanggal_pengajuan' => $tanggal_pengajuan,
			 'jumlah_uang' => $jumlah_uang,
			 'no_beban' => $no_beban,
			 'tanggal_ketetapan_beban' => $tanggal_ketetapan_beban,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);

		$where = array(
		'no_surat' => $no_surat
		);

		
		$this->m_pengguna->update_data($where, $data,'ptup');
		redirect('c_pengguna/semua_surat');
	}

}
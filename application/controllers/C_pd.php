<?php 

class C_pd extends CI_Controller
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
		$this->load->view('pd/templates/header');
		$this->load->view('pd/buat_surat');
	}

	function simpan_pengembalian_skpp()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$lampiran = $this->input->post('lampiran');
		$pengembalian_atas_nama = $this->input->post('pengembalian_atas_nama');
		$kepada = $this->input->post('kepada');
		$tempat = $this->input->post('tempat');	
		$no_surat_pengajuan = $this->input->post('no_surat_pengajuan');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$alasan = $this->input->post('alasan');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'lampiran' => $lampiran,
			 'pengembalian_atas_nama' => $pengembalian_atas_nama,
			 'kepada' => $kepada,
			 'tempat' => $tempat,
			 'no_surat_pengajuan' => $no_surat_pengajuan,
			 'tanggal_pengajuan' => $tanggal_pengajuan,
			 'alasan' => $alasan,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);
		$kirim['no_surat'] = $no_surat;
		$kirim['tanggal_surat'] = $tanggal_surat;
		$kirim['lampiran'] = $lampiran;
		$kirim['pengembalian_atas_nama'] = $pengembalian_atas_nama;
		$kirim['kepada'] = $kepada;
		$kirim['tempat'] = $tempat;
		$kirim['no_surat_pengajuan'] = $no_surat_pengajuan;
		$kirim['tanggal_pengajuan'] = $tanggal_pengajuan;
		$kirim['alasan'] = $alasan;
		$kirim['status_kepala'] = $status_kepala;
		$kirim['ket_jabatan_kepala'] = $ket_jabatan_kepala;
		$kirim['nama_kepala'] = $nama_kepala;
		$kirim['nip_kepala'] = $nip_kepala;
		
		$cek = $this->m_pengguna->chek_data($no_surat, 'pengembalian_skpp');
		if ($cek == null) {
			$this->m_pengguna->input_data($data, 'pengembalian_skpp');
		// redirect(base_url('index.php/c_pd/tampil_surat_pengembalian'));
		$this->load->view('pd/templates/header');
		$this->load->view('pd/tampil_surat_pengembalian', $kirim);
		}
		else{
			foreach ($cek as $d) {
				if ($d->no_surat == $no_surat) {
					$this->load->view('pd/templates/header');
					$this->load->view('pd/pesan_error_skpp');
				}
			}
		}

		
	}

	function semua_surat()
	{

		$this->load->view('pd/templates/header');
		$this->load->view('pd/semua_surat');
	}

	function semua_surat_spb()
	{
        $crud = new grocery_CRUD();
        $crud->set_table('penolakan_spms');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_columns(array('lampiran', 'no_surat_pengajuan', 'status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala', 'alasan'));

         $crud->add_action('Cetak', '../../assets/grocery_crud/themes/flexigrid/print.png', 'c_pd/tampil_surat_penolakan', 'ui-icon-plus');
         $crud->add_action('Edit', '../../assets/grocery_crud/themes/flexigrid/edit.png', 'c_pd/edit_penolakan', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('pd/templates/header');
        $this->load->view('pd/semua_surat_spb', $output);
        // $this->load->view('mski/templates/footer');
	}

	function semua_surat_pengembalian_skpp()
	{
		$crud = new grocery_CRUD();
        $crud->set_table('pengembalian_skpp');
        // simpan hasilnya kedalam variabel output
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_columns(array('lampiran', 'no_surat_pengajuan', 'status_kepala', 'ket_jabatan_kepala', 'nama_kepala', 'nip_kepala', 'alasan'));

         $crud->add_action('Cetak', '../../assets/grocery_crud/themes/flexigrid/print.png', 'c_pd/tampil_surat_pengembalian', 'ui-icon-plus');
         $crud->add_action('Edit', '../../assets/grocery_crud/themes/flexigrid/edit.png', 'c_pd/edit_pengembalian', 'ui-icon-plus');

        $output = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);

        $this->load->view('pd/templates/header');
        $this->load->view('pd/semua_surat_pengembalian_skpp', $output);
	}

	function tampil_surat()
	{
		$this->load->view('pd/templates/header');
		$this->load->view('pd/tampil_surat');
	}

	function surat_spb()
	{
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$this->load->view('pd/templates/header');
		$this->load->view('pd/surat_spb', $data);
	}

	function pengembalian_skpp()
	{
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$this->load->view('pd/templates/header');
		$this->load->view('pd/pengembalian_skpp', $data);
	}

	function simpan_spb()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kepada = $this->input->post('kepada');
		$tempat = $this->input->post('tempat');	
		$no_surat_pengajuan = $this->input->post('no_surat_pengajuan');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$alasan = $this->input->post('alasan');
		$pesan = $this->input->post('pesan');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kepada' => $kepada,
			 'tempat' => $tempat,
			 'no_surat_pengajuan' => $no_surat_pengajuan,
			 'tanggal_pengajuan' => $tanggal_pengajuan,
			 'alasan' => $alasan,
			 'pesan' => $pesan,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);
		$kirim['no_surat'] = $no_surat;
		$kirim['tanggal_surat'] = $tanggal_surat;
		$kirim['kepada'] = $kepada;
		$kirim['tempat'] = $tempat;
		$kirim['no_surat_pengajuan'] = $no_surat_pengajuan;
		$kirim['tanggal_pengajuan'] = $tanggal_pengajuan;
		$kirim['alasan'] = $alasan;
		$kirim['pesan'] = $pesan;
		$kirim['status_kepala'] = $status_kepala;
		$kirim['ket_jabatan_kepala'] = $ket_jabatan_kepala;
		$kirim['nama_kepala'] = $nama_kepala;
		$kirim['nip_kepala'] = $nip_kepala;
		
		$cek = $this->m_pengguna->chek_data($no_surat, 'penolakan_spms');
		if ($cek == null) {
			$this->m_pengguna->input_data($data, 'penolakan_spms');
			// redirect(base_url('index.php/c_pd/tampil_surat_pengembalian'));
			$this->load->view('pd/templates/header');
			$this->load->view('pd/tampil_surat_spb', $kirim);
		}
		else{
			foreach ($cek as $d) {
				if ($d->no_surat == $no_surat) {
					$this->load->view('pd/templates/header');
					$this->load->view('pd/pesan_error_spb');
				}
			}
		}

		
	}

	function tampil_surat_spb()
	{
		$this->load->view('pd/templates/header');
		$this->load->view('pd/tampil_surat_spb');
	}
	function tampil_surat_pengembalian($id)
	{
		$where = array('no_surat' => $id);
		$data['pengembalian_skpp'] = $this->m_pengguna->get_where($where, 'pengembalian_skpp')->result();
		
		$this->load->view('pd/templates/header');
		$this->load->view('pd/tampil_surat_pengembalian_dua', $data);
	
	}

	function tampil_surat_penolakan($id)
	{
		$where = array('no_surat' => $id);
		$data['penolakan_spms'] = $this->m_pengguna->get_where($where, 'penolakan_spms')->result();
		
		$this->load->view('pd/templates/header');
		$this->load->view('pd/tampil_surat_spb_dua', $data);
	
	}

	function nama_kepala()
	{
		$kode = $this->input->post('nama_kepala');
		// echo $kode;
		$data['nama_kepala']=$this->m_pengguna->get_nip($kode);
		$this->load->view('pd/ajax_nip_spb', $data);
	}

	function nama_kepala_p()
	{
		$kode = $this->input->post('nama_kepala');
		// echo $kode;
		$data['nama_kepala']=$this->m_pengguna->get_nip($kode);
		$this->load->view('pd/ajax_nip_p', $data);
	}

	function edit_penolakan($id)
	{
		$where = array('no_surat' => $id);
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$data['penolakan_spms'] = $this->m_pengguna->get_where($where, 'penolakan_spms')->result();
		
		$this->load->view('pd/templates/header');
		$this->load->view('pd/edit_penolakan', $data);
	}

	function simpan_edit_spb()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$kepada = $this->input->post('kepada');
		$tempat = $this->input->post('tempat');	
		$no_surat_pengajuan = $this->input->post('no_surat_pengajuan');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$alasan = $this->input->post('alasan');
		$pesan = $this->input->post('pesan');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'kepada' => $kepada,
			 'tempat' => $tempat,
			 'no_surat_pengajuan' => $no_surat_pengajuan,
			 'tanggal_pengajuan' => $tanggal_pengajuan,
			 'alasan' => $alasan,
			 'pesan' => $pesan,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);
		
		$where = array(
		'no_surat' => $no_surat
		);
		
		$this->m_pengguna->update_data($where, $data,'penolakan_spms');
		redirect('c_pd/semua_surat_spb');
	}

	function edit_pengembalian($id)
	{
		$where = array('no_surat' => $id);
		$data['pegawai_atas'] = $this->m_pengguna->tampil_data_pegawai_atas()->result();
		$data['pengembalian_skpp'] = $this->m_pengguna->get_where($where, 'pengembalian_skpp')->result();
		
		$this->load->view('pd/templates/header');
		$this->load->view('pd/edit_pengembalian', $data);
	}

	function nama_kepala_skpp()
	{
		$kode = $this->input->post('nama_kepala');
		// echo $kode;
		$data['nama_kepala']=$this->m_pengguna->get_nip($kode);
		$this->load->view('pd/ajax_nip_skpp', $data);
	}

	function simpan_edit_pengembalian_skpp()
	{
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$lampiran = $this->input->post('lampiran');
		$pengembalian_atas_nama = $this->input->post('pengembalian_atas_nama');
		$kepada = $this->input->post('kepada');
		$tempat = $this->input->post('tempat');	
		$no_surat_pengajuan = $this->input->post('no_surat_pengajuan');
		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$alasan = $this->input->post('alasan');
		$status_kepala = $this->input->post('status_kepala');
		$ket_jabatan_kepala = $this->input->post('ket_jabatan_kepala');
		$nama_kepala = $this->input->post('nama_kepala');
		$nip_kepala = $this->input->post('nip_kepala');

		$data = array(
			 'no_surat' => $no_surat,
			 'tanggal_surat' => $tanggal_surat,
			 'lampiran' => $lampiran,
			 'pengembalian_atas_nama' => $pengembalian_atas_nama,
			 'kepada' => $kepada,
			 'tempat' => $tempat,
			 'no_surat_pengajuan' => $no_surat_pengajuan,
			 'tanggal_pengajuan' => $tanggal_pengajuan,
			 'alasan' => $alasan,
			 'status_kepala' => $status_kepala,
			 'ket_jabatan_kepala' => $ket_jabatan_kepala,
			 'nama_kepala' => $nama_kepala,
			 'nip_kepala' => $nip_kepala
		);

		$where = array(
		'no_surat' => $no_surat
		);
		
		$this->m_pengguna->update_data($where, $data,'pengembalian_skpp');
		redirect('c_pd/semua_surat_pengembalian_skpp');

	}

}

?>
<?php
class M_pengguna extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function semua_surat()
	{
		$crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_table('ptup');
        // simpan hasilnya kedalam variabel output
        $data = $crud->render();
        // tampilkan di view 
        //$this->_example_output($output);
        $this->load->view('mski/semua_surat', $data);
	}
    function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function tampil_data()
    {
        return $this->db->get('daerah');
    }

    function tampil_data_pegawai()
    {
        return $this->db->get('pegawai');
    }

    function tampil_data_pegawai_kon()
    {
        return $this->db->get_where('pegawai', '01');
    }

    function get_subkategori($kode){
        $hasil=$this->db->query("SELECT nama FROM daerah WHERE kode='$kode'");
        return $hasil->result();
    }

    function get_nip($kode)
    {
        $hasil=$this->db->query("SELECT nip FROM pegawai_atas WHERE nama='$kode'");
        return $hasil->result();
    }

    function tampil_data_pegawai_atas()
    {
        return $this->db->get('pegawai_atas');
    }

    function chek_data($no_surat, $table)
    {
        $hasil=$this->db->query("SELECT no_surat FROM $table WHERE no_surat='$no_surat'");
        return $hasil->result();
    }

    function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    } 

}

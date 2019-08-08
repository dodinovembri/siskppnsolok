<?php
class M_admin extends CI_Model {

        public function __construct()
        {
        	parent::__construct();
            $this->load->database();
        }

        function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

}

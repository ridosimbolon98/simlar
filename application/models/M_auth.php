<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    //Cek login user pada tabel akun di database
	public function autentikasi($table,$where){
		return $this->db->get_where($table,$where);
	}

    // Fungsi untuk ambil data berdasarkan ketentuan tertentu dari database
    function getWhere($table,$where){
        return $this->db->get_where($table, $where);
    }
	
}
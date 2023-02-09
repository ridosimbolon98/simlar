<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * @author Rido
	 */

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');	
	}

	public function index()
	{
		$data['title'] = "Sistem Informasi Langganan Air | Login Page";
		$this->load->view('auth/v_index', $data);
	}

	function login(){
    $this->load->database();
		date_default_timezone_set("Asia/Jakarta");

		$username = htmlspecialchars(trim($this->input->post('username')));
		$password = htmlspecialchars(trim($this->input->post('password')));
		$where    = array(
			'username' => $username,
			'password' => md5($password)
			);
		$data     = $this->m_auth->getWhere('user',$where)->result();
		$cek      = $this->m_auth->getWhere('user',$where)->num_rows();
		
		if($cek > 0){
			$level = $data[0]->level;
			$uid   = $data[0]->uid;
			// menyimpan data session
			$login_session  = array(
				'username' => $username,
				'level'    => $level,
				'uid'      => $uid,
				'status'   => "logged",
			);
			$this->session->set_userdata($login_session);
			$this->session->set_flashdata('success', "Selamat datang Admin.");
			redirect(base_url("admin/index"));
		} else {
			echo "<script>alert('Gagal Login!. Pastikan username dan password benar.');</script>";
			echo "<script>location='".base_url()."';</script>";
		}
	}

	// Fungsi untuk logout
	function logout() {
		date_default_timezone_set("Asia/Jakarta");

		// hapus session dan redirect ke halaman login
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}

	
}

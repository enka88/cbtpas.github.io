<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index(){
		cek_register();
		$this->logged();
		$this->load->view('admin/login');
	}

	function proses(){
		if ($this->mdl__cbtadmin->cek_login()){
			redirect(base_url(''));
		} else {
			redirect('login', 'location');
		}
	}

	function logged() {
		if ($this->session->userdata('adm_logged_in') == true ) {
			redirect ('', 'location');
		}
	}

}

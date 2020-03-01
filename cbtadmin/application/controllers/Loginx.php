<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loginx extends CI_Controller {

	function index(){
		cek_register();
		$this->logged();
		$this->load->view('admin/loginx');
	}

	function proses(){
		if ($this->mdl__cbtadmin->cek_pass()){
			redirect(base_url(''));
		} else {
			redirect('loginx', 'location');
		}
	}

	function logged() {
		if ($this->session->userdata('adm_logged_in') == true ) {
			redirect ('', 'location');
		}
	}

}
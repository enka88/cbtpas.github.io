<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function index(){
		$this->cek_status();
		$this->load->view('admin/register');
	}

	function proses(){
		$this->mdl___enka->server_register();
		redirect('login', 'location');
	}

	function cek_status(){
		if ($this->mdl_cbtadmin->server_info()->num_rows()){
		redirect('login', 'location'); }
	}

}

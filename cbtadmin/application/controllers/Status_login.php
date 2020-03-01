<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status_login extends CI_Controller{

	function index(){
		cek_logged();
		$data['title'] = 'Status Login';
		$data['aksi1'] = 'status_login/reset_user';
		$data['aksi2'] = 'status_login/block_user1';
		$data['aksi3'] = 'status_login/block_user2';
		$data['aksi4'] = 'status_login/reset_all';
		$data['isi1'] = $this->mdl__cbtadmin->user_logged();
		$data['isi2'] = $this->mdl_cbtadmin->user_blocked();
		$this->template->load_admin('admin/index', 'admin/status_peserta_login', $data);
	}

	function reset_user(){
		$this->mdl_cbtadmin->user_logged_reset();
		redirect ('status_login', 'location');
	}

	function reset_all(){
		$this->mdl__cbtadmin->user_reset_all();
		redirect ('status_login', 'location');
	}

	function blocked(){
		$data['title'] = 'Status Login';
		$data['aksi3'] = 'status_login/block_user3';
		$data['isi2'] = $this->mdl_cbtadmin->user_blocked();
		$this->template->load_admin('admin/index', 'admin/status_peserta_block', $data);
	}

	function block_user1(){
		$this->mdl_cbtadmin->user_block1();
		redirect ('status_login', 'location');
	}

	function block_user2(){
		$this->mdl_cbtadmin->user_block2();
		redirect ('status_login', 'location');
	}

	function block_user3(){
		$this->mdl_cbtadmin->user_block2();
		redirect ('status_login/blocked', 'location');
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	function index(){
	cek_logged();
	$data['title'] = 'Dashboard';
	$data['user']  = $this->mdl__cbtadmin->user_cbt()->num_rows();
	$data['line']  = $this->mdl__cbtadmin->user_logged()->num_rows();
	$data['prog']  = $this->mdl_cbtadmin->user_ujian_in()->num_rows();
	$data['blok']  = $this->mdl_cbtadmin->user_blocked()->num_rows();
	if (!cek_inet())
	$data['stat'] = '<span style="color:#ff0000">OFFLINE</span>';
	else
	$data['stat'] = '<span style="color:#008000">AKTIF</span>';
	$this->template->load_admin('admin/index', 'admin/dashboard', $data);
	}

}

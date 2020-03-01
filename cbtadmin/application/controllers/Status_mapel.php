<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_mapel extends CI_Controller{

	function index(){
		cek_logged();
		$data['isi'] = $this->mdl_tryout->mapel_read();
		$this->template->load_admin('admin/index', 'admin/pilih_mapel',$data);
    }

	function update(){
		$this->mdl_tryout->mapel_simpan();
		redirect ('status_mapel', 'location');
    }

}
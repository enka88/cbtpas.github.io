<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status_ujian extends CI_Controller{

	function index(){
		cek_logged();
		$data['title'] = 'Status Test';
		$data['isi']   = $this->mdl_cbtadmin->ujian_actv();
		$data['opt']   = $this->mdl_cbtadmin->ujian_list();
		$data['act']   = 'status_ujian/ujian_update';
		if ($this->mdl_cbtadmin->ujian_actv()->num_rows())
		$nama  = $this->mdl_cbtadmin->ujian_actv()->row()->name;
		else
		$nama = '';
		$isi1  = $this->mdl_cbtadmin->user_ujian_list()->num_rows();
		$isi2  = $this->mdl_cbtadmin->user_ujian_state()->num_rows();
		if (!$nama){
		if (cek_admin())
		$data['check'] = '';
		else
		$data['check'] = ' disabled';
		$data['stat'] = '<span style="color:#0000ff">BELUM DIMULAI</span>';
		$data['token'] = '';
		$data['last']  = '';
		} else {
		if (cek_admin())
		$data['check'] = '';
		else
		$data['check'] = ' disabled';
		token_validation();
		$data['token'] = token_read();
		$data['last']  = ' - Last update '. date('H:i:s',token_time());
		if (!$isi1) {
		$data['stat'] = '<span style="color:#0000ff">BELUM DIMULAI</span>';
		} else { if (!$isi2) {
		$data['stat'] = '<span style="color:#008000">SELESAI</span>';
		} else {
		$data['stat'] = '<span style="color:#ff0000">SEDANG DIKERJAKAN</span>';
		} } }
		$this->template->load_admin('admin/index', 'admin/status_ujian', $data);
    }

	function ujian_update(){
		$this->mdl__cbtadmin->ujian_update();
		if ($this->mdl_cbtadmin->ujian_course()->num_rows())
		$this->mdl_cbtadmin->quiz_token_update();
		redirect ('status_ujian', 'location');
    }

	function hapus(){
		$this->mdl_cbtadmin->ujian_default();
		redirect ('status_ujian', 'location');
	}

}

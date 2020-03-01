<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status_peserta extends CI_Controller{

	function index(){
		$this->all();
    }

	function all(){
		cek_logged();
		$data['title']  = 'Status Peserta';
		if ($this->mdl_cbtadmin->ujian_actv()->num_rows()){
		$data['nama']   = $this->mdl_cbtadmin->ujian_actv()->row()->name;
		$data['isi']    = $this->mdl_cbtadmin->user_ujian_list();
		}
		else
		$data['nama']   = '';
		$this->template->load_admin('admin/index', 'admin/status_peserta_ujian', $data);
    }

	function by(){
		cek_logged();
		$data['title']  = 'Status Peserta';
		if ($this->mdl_cbtadmin->ujian_actv()->num_rows()){
		$data['nama']   = $this->mdl_cbtadmin->ujian_actv()->row()->name;
		if ($this->mdl_cbtadmin->user_ujian_cek()->num_rows()){
		$cek_isi	= $this->mdl_cbtadmin->user_ujian_cek()->result();
		foreach($cek_isi as $isi){
			$quiz[] = $isi->quiz;
			$i_quiz = array_unique($quiz);
		}
		if (count($i_quiz) <= 1) {
		$data['isi']    = $this->mdl_cbtadmin->user_ujian_list();
		$this->template->load_admin('admin/index', 'admin/status_peserta_ujian', $data);
		}
		else {
		$data['isi']    = $this->mdl_cbtadmin->ujian_course();
		$data['act']	= 'status_peserta/pilih_mapel';
		$this->template->load_admin('admin/index', 'admin/status_pilih_mapel', $data);
		}
		}
		else {
		$data['isi']    = $this->mdl_cbtadmin->user_ujian_list();
		$this->template->load_admin('admin/index', 'admin/status_peserta_ujian', $data);
		}
		}
		else {
		$data['nama']   = '';
		$this->template->load_admin('admin/index', 'admin/status_peserta_ujian', $data);
		}
    }

	function inprogress(){
		cek_logged();
		$data['title']  = 'Status Peserta';
		$data['isi']    = $this->mdl_cbtadmin->user_ujian_in();
		$this->template->load_admin('admin/index', 'admin/status_peserta_ujian2', $data);
	}

	function pilih_mapel(){
		$this->mdl_cbtadmin->user_ujian_mapel();
		redirect('status_peserta/by_mapel','location');
	}

	function by_mapel(){
		cek_logged();
		$data['title']  = 'Status Peserta';
		$data['isi']    = $this->mdl_cbtadmin->user_ujian_by();
		$this->template->load_admin('admin/index', 'admin/status_peserta_ujian2', $data);
	}

}
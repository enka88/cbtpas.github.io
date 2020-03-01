<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	function index(){
		cek_logged();
		$data['title']	= 'Kelola Ujian';
		$data['aksi'] 	= 'course/cat_add';
		$data['cat_nm'] = '';
		$data['cat_ls'] = $this->mdl__cbtadmin->cat_list();
		$data['crs_ls'] = $this->mdl__cbtadmin->crs_list();
		$this->template->load_admin('admin/index', 'admin/list_course', $data);
    }

	function cat(){
		cek_logged();
		$data['title']	= 'Kelola Ujian';
		$data['aksi'] 	= 'course/cat_add';
		$data['aksi2'] 	= 'course/crs_add/'.$this->uri->segment(3);
		$data['aksi3']  = 'course/crs_del/'.$this->uri->segment(3).'/';
		$data['aksi4']  = 'course/crs_res/'.$this->uri->segment(3);
		$data['cat_nm'] = $this->mdl__cbtadmin->cat_name();
		$data['cat_ls'] = $this->mdl__cbtadmin->cat_list();
		$data['crs_ls'] = $this->mdl__cbtadmin->crs_list();
		$this->template->load_admin('admin/index', 'admin/list_course', $data);
	}

	function user_list(){
		cek_logged();
		$data['title']  = 'Daftar User';
		$data['aksi']	= 'course/upload';
		$data['isi']    = $this->mdl__cbtadmin->user_ruang();
		$this->template->load_admin('admin/index', 'admin/list_user', $data);
    }

	function cat_add(){
		$cat_nm = $this->input->post('cat_nm');
		exec('php mosh category-create '.$cat_nm);
		redirect('course');
	}

	function cad(){
		exec('php mosh category-delete '.$this->uri->segment(3));
		redirect('course');
	}

	function crs_add($cat_id){
		$crs_nm = $this->input->post('crs_nm');
		$shrtnm = $this->input->post('shrtnm');
		exec('php mosh course-create --category '.$cat_id.' --fullname "'.$crs_nm.'" '.$shrtnm);
		redirect('course/cat/'.$cat_id);
	}

	function crs_del(){
		exec('php mosh course-delete '.$this->uri->segment(4));
		redirect('course/cat/'. $this->uri->segment(3));
	}
	
	function crs_res($cat_id)
	{
                $this->mdl__cbtadmin->course_impor($cat_id);
		redirect('course/cat/'. $cat_id);

	}

}

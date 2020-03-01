<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller{

	function index(){
		$this->berita_acara();
    }

	function daftar_peserta(){
		cek_logged();
		$data['title']  = 'Daftar Peserta';
		$data['aksi']	= 'dokumen/peserta_upload';
		$data['aksi2']	= 'dokumen/peserta_reset';
		$data['aksi3']  = 'dokumen/upload_foto';
		$data['isi']    = $this->mdl__cbtadmin->user_cbt();
		$this->template->load_admin('admin/index', 'admin/list_user_cbt', $data);
    }

	function peserta_upload(){
		$this->mdl__cbtadmin->user_cbt_upload();
		redirect('dokumen/daftar_peserta');
	}

	function peserta_reset(){
		$this->mdl__cbtadmin->user_cbt_reset();
		redirect('dokumen/daftar_peserta');
	}

	function daftar_ruang(){
		cek_logged();
		$data = [
		'title'  => 'Daftar Ruang',
		'nm_kg'  => id_kegiatan(),
		'aksi1'	 => 'dokumen/id_kegiatan',
		'aksi2'	 => 'dokumen/ruang_up',
		'list'   => $this->mdl__cbtadmin->ruang_list()
		];
		$this->template->load_admin('admin/index', 'admin/list_ruang', $data);
	}

	function id_kegiatan(){
		$this->mdl_cbtadmin->serverid_kg();
		redirect('dokumen/daftar_ruang');
    }

	function ruang_up(){
		$this->mdl__cbtadmin->ruang_ed();
		redirect('dokumen/daftar_ruang');
	}

	function berita_acara(){
		cek_logged();
		$data['title']  = 'Berita Acara';
		$data['aksi']	= 'dokumen/berita_acara_c';
		$data['list']   = $this->mdl__cbtadmin->ba_daftar();
		$data['opt']    = $this->mdl__cbtadmin->user_cbt();
		$this->template->load_admin('admin/index', 'admin/doc_berita_acara', $data);
    }

	function berita_acara_c(){
		$this->mdl_cbtadmin->ba_simpan();
		redirect('dokumen/berita_acara');
    }

	function berita_acara_s(){
		$this->mdl_cbtadmin->ba_ruang_s();
		redirect('dokumen/berita_acara');
    }

	function berita_acara_d(){
		$this->mdl_cbtadmin->ba_hapus();
		redirect('dokumen/berita_acara');
    }

	function berita_acara_cetak(){
		$data['isi'] = $this->mdl__cbtadmin->ba_cetak();
		$this->load->view('admin/doc_berita_acara_c',$data);
    }

	function daftar_hadir(){
		cek_logged();
		$data['title']  = 'Daftar Hadir';
		$data['aksi']	= 'dokumen/daftar_hadir_s';
		$data['isi']    = $this->mdl__cbtadmin->user_cbt();
		$this->template->load_admin('admin/index', 'admin/doc_daftar_hadir', $data);
	}

	function daftar_hadir_s(){
		$this->mdl_cbtadmin->user_ruang_s();
		redirect('dokumen/daftar_hadir_cetak');
	}

	function daftar_hadir_cetak(){
		cek_logged();
		$data['title']  = 'Cetak Daftar Hadir';
		$data['isi']    = $this->mdl__cbtadmin->user_ruang_persesi();
		$this->load->view('admin/doc_daftar_hadir_c', $data);
	}

	function kartu_ujian(){
		cek_logged();
		$data['title']  = 'Kartu Ujian';
		$data['aksi']	= 'dokumen/kartu_ujian_s';
		$data['aksi2']	= 'dokumen/nomor_meja_s';
		$data['aksi3']	= 'dokumen/daftar_hadir_s';
		$data['isi']    = $this->mdl__cbtadmin->user_cbt();
		$this->template->load_admin('admin/index', 'admin/doc_kartu_ujian', $data);
	}

	function kartu_ujian_s(){
		$this->mdl_cbtadmin->user_ruang_s();
		redirect('dokumen/kartu_ujian_cetak');
	}

	function kartu_ujian_cetak(){
		cek_logged();
		$data['isi']    = $this->mdl__cbtadmin->user_ruang_persesi();
		$this->load->view('admin/doc_kartu_ujian_c', $data);
	}

	function nomor_meja(){
		cek_logged();
		$data['title']  = 'Nomor Meja';
		$data['aksi']	= 'dokumen/nomor_meja_s';
		$data['isi']    = $this->mdl__cbtadmin->user_cbt();
		$this->template->load_admin('admin/index', 'admin/doc_nomor_meja', $data);
	}

	function nomor_meja_s(){
		$this->mdl_cbtadmin->user_ruang_s();
		redirect('dokumen/nomor_meja_cetak');
	}

	function nomor_meja_cetak(){
		cek_logged();
		$data['isi']    = $this->mdl__cbtadmin->user_ruang_persesi();
		$this->load->view('admin/doc_nomor_meja_c', $data);
	}
	
	function upload_foto(){
		$this->mdl__cbtadmin->photo_impor();
		redirect('dokumen/daftar_peserta');
	}
}

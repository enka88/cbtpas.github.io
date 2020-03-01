<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

	function index(){
		cek_logged();
		if (!cek_admin())
		exit('<h1>Akses ditolak!</h1>');
		$data['title'] = 'Tools General';
		$data['pesan'] = '';
		$data['aksi_clear'] = 'tools/clear_cache';
		$data['aksi_token'] = 'tools/rilis_token';
		$this->template->load_admin('admin/index', 'admin/tools', $data);
	}

	/*function id_hapus(){
		$this->mdl_cbtadmin->serverid_rs();
		redirect('register');
	}*/

	function setting_token(){
		cek_logged();
		if (!cek_admin())
		exit('<h1>Akses ditolak!</h1>');
		$data['title'] = 'Pengaturan Token';
		$data['aksi'] = 'tools/token_r';

		$this->template->load_admin('admin/index', 'admin/tools_tokens', $data);
    }

	function token_r(){
		token_release();
		redirect ('status_ujian', 'location');
    }

	function tmreset(){
		cek_logged();
		if (!cek_admin())
		exit('<h1>Akses ditolak!</h1>');
		$data['title'] = 'Reset Waktu';
		$data['aksi'] = 'tools/reset_timer';
		$this->template->load_admin('admin/index', 'admin/tools_reset', $data);
    }

	function reset_timer(){
		$this->mdl_cbtadmin->reset_timer_all();
		redirect('tools/tmreset');
    }

	function fix_program(){
		cek_logged();
		if (!cek_admin())
		exit('<h1>Akses ditolak!</h1>');
		$data['title'] = 'Fix Program';
		$data['aksi1'] = 'tools/clear_cache';
		$data['aksi2'] = 'tools/clear_cbtadmin';
		$this->template->load_admin('admin/index', 'admin/tools_fix', $data);
    }

	function clear_cache(){
		$this->mdl_cbtadmin->mdl_cache_clear();
		redirect ('tools/fix_program');
    }

	function clear_cbtadmin(){
		$this->mdl__cbtadmin->serverid_rs_all();
		redirect ('tools/fix_program');
    }

	function cek_update(){
		cek_logged();
		if (!cek_admin())
		exit('<h1>Akses ditolak!</h1>');
		$data['title'] = 'Cek Update';
		$data['aksi'] = 'tools/update_cek';
		$this->template->load_admin('admin/index', 'admin/tools_cek', $data);
    }

	function update_cek(){
		$this->mdl__cbtadmin->cek_update();
		redirect ('tools/cek_update');
    }

	function sinkron_foto(){
		exec("php mosh user-import-pictures -u /home/aio/www/cbtadmin/assets/foto/");
		redirect ('dokumen/daftar_peserta');
	}

	function rekap(){
	cek_logged();
        if (!cek_admin())
        exit('<h1>Akses ditolak!</h1>');
        $data['title'] = 'Rekap';
        $data['aksi'] = 'tools/upload_hasil';

	$this->template->load_admin('admin/index', 'admin/tools_rekap', $data);
	}

	function upload_hasil(){
		$this->load->library('encryption');
		require_once APPPATH . 'third_party/autoloader_psr.php';
                require_once APPPATH . 'third_party/autoloader_psp.php';
                $config = ['upload_path' => './hasil/', 'allowed_types' => '*'];
                $this->load->library('upload', $config);
		$fpath = '/home/aio/www/cbtadmin/hasil/';
		$pathto = '/home/aio/www/cbtadmin/hasil/rekap/';

		if($this->upload->do_upload('encfile'))
                {
                        $data = $this->upload->data();
                        $dpath = $data['full_path'];
			$fcsv = $data['raw_name'].'.csv';


			$enc = file_get_contents($dpath);
			$dec = $this->encryption->decrypt($enc);
//			$dec = base64_decode($enc);
			$hasil = base64_decode($dec);
//			$hasil = unserialize($dec2);

			exec("cp $dpath $pathto . $fcsv ");
			$baca = fopen($pathto . $fcsv, 'w') or die('Permission error');
			fwrite($baca, $hasil);
			fclose($baca);
			unlink($dpath);
			$this->session->set_flashdata('s_msg', 'Upload Sukses');
			redirect('tools/rekap');

                }
                else
                {
			$this->session->set_flashdata('e_msg', 'Upload Gagal');
                }

	}




}

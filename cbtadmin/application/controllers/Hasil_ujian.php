<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_ujian extends CI_Controller {

	function index(){
		cek_logged();
		if (!cek_admin())
		exit('<h1>Akses ditolak!</h1>');
		$data['title']  = 'Nilai Ujian';
		if ($this->mdl_cbtadmin->ujian_actv()->num_rows()){
		$data['nama']   = $this->mdl_cbtadmin->ujian_actv()->row()->name;
		if ($this->mdl_cbtadmin->user_ujian_list()->num_rows()) {
		$cek_isi = $this->mdl_cbtadmin->hasil_read()->result();
		if ($cek_isi) {
		foreach($cek_isi as $isi){
			$quiz[] = $isi->Pelajaran;
			$i_quiz = array_unique($quiz);
		}
		$data['isi']    = $this->mdl__cbtadmin->ujian_course();
		$data['act']	= 'hasil_ujian/pilih';
		$this->template->load_admin('admin/index', 'admin/status_pilih_mapel', $data);
		} else {
		$data['isi'] = $this->mdl_cbtadmin->hasil_read();
		$this->template->load_admin('admin/index', 'admin/hasil_ujian',$data);
		}
		} else {
		$data['aksi'] = '#';
		$data['isi'] = $this->mdl_cbtadmin->user_ujian_list();
		$this->template->load_admin('admin/index', 'admin/hasil_ujian',$data);
		}
		} else {
		$data['nama']  = '';
		$this->template->load_admin('admin/index', 'admin/hasil_ujian',$data);
		}
    }

	function pilih(){
		$this->mdl_cbtadmin->user_ujian_mapel();
		redirect('hasil_ujian/nilai','location');
	}

	function nilai(){
		cek_logged();
		$data['title']  = 'Hasil Ujian';
		$data['aksi'] 	= 'hasil_ujian/export_hasil';
		$data['aksi2']  = 'hasil_ujian/download_hasil';
		$data['nama']   = $this->mdl_cbtadmin->ujian_actv()->row()->name;
		$data['isi']    = $this->mdl__cbtadmin->hasil_by();
		$this->template->load_admin('admin/index', 'admin/hasil_ujian', $data);
	}

	function export_hasil(){
		$this->load->dbutil();
		$this->load->library('encryption');
		$delimit  = ",";
		$newline  = "\r\n";
		$namafile = $this->mdl_cbtadmin->nama_course();
		$npsn	  = $this->session->userdata('adm_namauser');
		$data_isi = $this->mdl__cbtadmin->hasil_by();
		$data_csv = $this->dbutil->csv_from_result($data_isi, $delimit, $newline);

		$filecsv = $npsn."-Nilai_".$namafile."_".date('Ymd').".cbt";
//		force_download($filecsv, $data_csv);
//		$enc = base64_encode(serialize($data_csv));
		$enc = base64_encode($data_csv);
//		$this->zip->add_data($filecsv, $data_csv);
//		$data = $this->zip->get_zip();
		force_download($filecsv, $this->encryption->encrypt($enc));
//		$this->zip->download($npsn."-".$namafile."-".date('Ymd').".res");
//		force_download($filecsv, base64_encode($enc));
    }


	function download_hasil(){
		$this->load->dbutil();
                $delimit  = ",";
                $newline  = "\r\n";
                $namafile = $this->mdl_cbtadmin->nama_course();
                $npsn     = $this->session->userdata('adm_namauser');
                $data_isi = $this->mdl__cbtadmin->hasil_by();
                $data_csv = $this->dbutil->csv_from_result($data_isi, $delimit, $newline);

		$filecsv = $npsn."-Nilai_".$namafile."_".date('Ymd').".csv";
                force_download($filecsv, $data_csv);

	}
}

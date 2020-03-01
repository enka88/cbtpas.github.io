<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Mdl__cbtadmin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->_db = $this->load->database('db_mood', true);
		$this->room = 'R.' . $this->session->userdata('adm_namaruang');
	}

	public function server_info()
	{
		$this->db->select('*')->from('mdl_zserver_info');
		return $this->db->get();
	}

	public function conn_server($usync, $dsync)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $usync);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $dsync);
		curl_setopt($ch, CURLOPT_TIMEOUT, t_out());
		$respon = curl_exec($ch);
		curl_close($ch);
		return $respon;
	}

	public function cat_list()
	{
		$this->_db->select('id, name')->from('mdl_course_categories')->order_by('sortorder');
		return $this->_db->get();
	}

	public function cat_name()
	{
		$cat_id = $this->uri->segment(3);

		if (!$this->uri->segment(3)) {
			$cat_id = 99999;
		}

		$this->_db->select('id, name')->from('mdl_course_categories')->where('id', $cat_id);
		return $this->_db->get();
	}

	public function crs_list()
	{
		$cat_id = $this->uri->segment(3);

		if (!$this->uri->segment(3)) {
			$cat_id = 99999;
		}

		$this->_db->select('id, fullname, shortname')->from('mdl_course')->where('category', $cat_id)->order_by('fullname');
		return $this->_db->get();
	}

	public function kode_gen($sum)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$kode = '';

		for ($i = 0; $i < $sum; $i++) {
			$init = rand(0, strlen($char) - 1);
			$kode .= $char[$init];
		}

		return $kode;
	}

	public function ruangnya_cbt()
	{
		if ($this->session->userdata('adm_namaruang') != 'admin') {
			$this->db->where('address', $this->room);
		}
	}

	public function ruangnya()
	{
		if (!cek_admin()) {
			$this->_db->where('address', $this->room);
		}
	}

	public function cek_login()
	{
		$proses = false;
		$id = $this->input->post('idserver');

		if ($id != define_admin()['user']) {
			$pecah = explode('-', $id);
			$npsn = $pecah[0];
			$ruang = $pecah[1];
			$this->db->where('npsn', $npsn)->where('kode_ruang', $ruang);
			$query = $this->db->get('mdl_zref_ruang');

			if ($query->num_rows() == 1) {
				$skul_ruang = explode('.', $query->row()->skul_ruang);
				$data_session = ['adm_namauser' => $npsn, 'adm_namaruang' => $skul_ruang[1], 'adm_koderuang' => $ruang, 'adm_logged_in' => true];
				$this->session->set_userdata($data_session);
				$proses = true;
			}
			else if (!is_numeric($ruang)) {
				$this->session->set_flashdata('l_msg', 'Authentication ID salah !!!');
			}
			else {
				$this->db->where('npsn', $npsn);
				$query2 = $this->db->get('mdl_zserver_info');

				if ($query2->num_rows() == 1) {
					if (!$ruang || ($ruang == '0')) {
						$this->session->set_flashdata('l_msg', 'ID tidak lengkap');
						return $proses;
					}

					if ($ruang < id_ruang()) {
						$this->session->set_flashdata('l_msg', 'Authentication ID salah !!!');
						return $proses;
					}

					$data_session = ['adm_namauser' => $query2->row()->npsn, 'adm_namaruang' => sprintf('%02d', $ruang), 'adm_koderuang' => sprintf('%02d', $ruang), 'adm_logged_in' => true];
					$this->session->set_userdata($data_session);
					$proses = true;
				}

				$this->session->set_flashdata('l_msg', 'Authentication ID salah !!!');
			}
		}
		else if ($id == define_admin()['user']) {
			redirect('loginx', 'location');
		}

		return $proses;
	}

	public function cek_pass()
	{
		$proses = false;
		$ps = md5($this->input->post('idsekolah'));
		$this->db->select('id, pa')->from('mdl_zserver_info');
		$dbpass = $this->db->get()->result_array();
		foreach($dbpass as $row){
			if ($ps == $row['pa']) {
				$data_session = ['adm_namauser' => profile()['npsn'], 'adm_username' => define_admin()['user'], 'adm_namaruang' => 'admin', 'adm_koderuang' => 'adm', 'adm_logged_in' => true, 'id' => $row['id']];
				$this->session->set_userdata($data_session);
				$proses = 1;
			}
			else {
			$this->session->set_flashdata('l_msg', 'Password salah !!!');
			return $proses;
			}
		}
	}

	public function reg_server($url, $aksi)
	{
		$usync = id_serv() . '/' . $url . '/' . $aksi;
		$dsync = ['idserver' => strtoupper($this->input->post('idserver'))];
		return $this->conn_server($usync, $dsync);
	}

	public function syn_server($url, $aksi)
	{
		$usync = id_serv() . '/' . $url . '/' . $aksi;
		$dsync = ['idserver' => profile()['npsn']];
		return $this->conn_server($usync, $dsync);
	}

	public function cek_update()
	{
		$js_data = $this->syn_server('data_sync', 'version');
		$dc_data = json_decode($js_data, true);

		if ($dc_data['status']) {
			$l_verr = id_verr();
			$r_verr = $dc_data['data'];

			if ($l_verr == $r_verr) {
				$this->session->set_flashdata('s_msg', 'Tidak ada versi terbaru');
			}
			else {
				$this->session->set_flashdata('s_msg', 'Versi terbaru ditemukan. Cek pada web Portal AIOCBT.');
			}
		}
		else {
			$this->session->set_flashdata('e_msg', 'Tidak dapat terhubung ke server');
		}
	}

	public function server_register()
	{
		if ($this->input->post('idserver')) {
			$js_data = $this->reg_server('data_sync', 'server');
			$dc_data = json_decode($js_data, true);

			if ($dc_data['status']) {
				foreach ($dc_data['data'] as $row) {
					$info = ['npsn' => $row['npsn'], 'no_server' => 1, 'id_kota' => 1, 'ua' => 'admin', 'pa' => md5('Password')];
					$this->db->insert('mdl_zserver_info', $info);
					$reff = ['npsn' => $row['npsn'], 'sekolah' => $row['sk_nama']];
					$this->db->insert('mdl_zref_sekolah', $reff);
				}

				$stat = ['categoryid' => '1000', 'subcatid' => '0', 'kegiatan' => '', 'tokens' => '1', 'tokent' => '900', 'token' => 'AIOCBT', 'tokenstamp' => '1451606400'];
				$this->db->insert('mdl_zstatus_ujian', $stat);
				$this->session->set_flashdata('l_msg', '<b>Register Berhasil!</b><br/><br/>Login dengan Kode - Ruang<br/>(' . strtoupper($this->input->post('idserver')) . '-xxxx) untuk login<br/>proktor ruangan, ' . "\n\t\t" . 'atau id<br/>admin untuk proktor utama.');
			}
			else {
				$this->session->set_flashdata('l_msg', '<b>Kesalahan :</b><p>Kode tidak ditemukan.<br/>Silahkan registrasi pada web<br/><a target="_blank" href="http://aiocbt.com">app.aiocbt.com</a></p>');
				cek_register();
			}
		}
		else {
			$this->session->set_flashdata('l_msg', '<b>Kesalahan :</b><p>Silahkan masukkan kode sekolah.</p>');
		}
	}

	public function user_ruang()
	{
		$this->_db->select('idnumber, username, firstname, lastname, address')->from('mdl_user')->where('id NOT in (1,2)')->where('deleted', '0')->where('address <> \'\'');
		$this->ruangnya();
		$this->_db->order_by('username');
		return $this->_db->get();
	}

	public function user_cbt()
	{
		$this->db->select('username, password, firstname, lastname, department, address, idnumber, kode_ruang, nama_ruang, gender, tmpt_lhr, tgl_lhr, img')->from('mdl_zuser_data')->join('mdl_zref_ruang', 'mdl_zuser_data.address = mdl_zref_ruang.skul_ruang')->where('address <> \'\'');
		$this->ruangnya_cbt();
		$this->db->order_by('username');
		return $this->db->get();
	}

	public function user_ruang_persesi()
	{
		if ($this->session->userdata('ruang_sesi')) {
			$fork = explode('-', $this->session->userdata('ruang_sesi'));
		}
		else {
			$fork = explode('-', '0-0');
		}

		$addr = $fork[0];
		$nmbr = $fork[1];
		$this->db->select('username, password, idnumber, firstname, lastname, department, address, kode_ruang, nama_ruang, gender, tmpt_lhr, tgl_lhr, img')->from('mdl_zuser_data')->join('mdl_zref_ruang', 'mdl_zuser_data.address = mdl_zref_ruang.skul_ruang')->where('address', $addr)->where('idnumber', $nmbr);
		return $this->db->get();
	}

	public function excel_upload()
	{
		require_once APPPATH . 'third_party/autoloader_psr.php';
		require_once APPPATH . 'third_party/autoloader_psp.php';
		$config = ['upload_path' => './hasil/', 'allowed_types' => 'xlsx|xls|csv'];
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			$datanx = $this->upload->data();
			$isinyx = \PhpOffice\PhpSpreadsheet\IOFactory::load($datanx['full_path']);
			$hasilx = $isinyx->getActiveSheet()->toArray(NULL, true, true, true);
			unlink($datanx['full_path']);
			return $hasilx;
		}
		else {
			return false;
		}
	}

	public function user_cbt_upload()
	{
		$isdtnx = $this->excel_upload();

		if (empty($isdtnx)) {
			$this->session->set_flashdata('e_msg', 'Upload Gagal : File salah');
			return NULL;
		}

		if (empty($isdtnx[1])) {
			$this->session->set_flashdata('e_msg', 'Upload Gagal : Tidak sesuai format');
			return NULL;
		}

		if (empty($isdtnx[2]['A'])) {
			$this->session->set_flashdata('e_msg', 'Upload Gagal : File kosong');
			return NULL;
		}

		$isixls = [];
		$no = 1;

		for ($i = 2; $i <= count($isdtnx); $i++) {
			if (!empty($isdtnx[$i]['A'])) {
				$isixls[$no]['username'] = $isdtnx[$i]['A'];
				$isixls[$no]['password'] = $isdtnx[$i]['B'];
				$isixls[$no]['firstname'] = $isdtnx[$i]['D'];
				$isixls[$no]['lastname'] = $isdtnx[$i]['H'];
                                $isixls[$no]['email'] = $isdtnx[$i]['A'].'@mail.cbt';
				$isixls[$no]['department'] = $isdtnx[$i]['F'];
				$isixls[$no]['address'] = $isdtnx[$i]['I'];
                                $isixls[$no]['gender'] = $isdtnx[$i]['E'];
                                $isixls[$no]['tmpt_lhr'] = $isdtnx[$i]['F'];
                                $isixls[$no]['tgl_lhr'] = $isdtnx[$i]['G'];
				$isixls[$no]['img'] = $isdtnx[$i]['A'].'.jpg';
				$isixls[$no]['nisn'] = $isdtnx[$i]['C'];


				if (isset($isdtnx[$i]['J'])) {
					$isixls[$no]['idnumber'] = $isdtnx[$i]['J'];
				}
				else {
					$isixls[$no]['idnumber'] = 0;
				}

				$no++;
			}
		}

		foreach ($isixls as $item) {
			$cek_duplicate = $this->user_cbt_cek($item['username']);

			if ($cek_duplicate) {
				@unlink($data['full_path']);
				$this->session->set_flashdata('e_msg', 'Terdeteksi username ganda dengan database');
				return NULL;
			}
		}

		$this->db->insert_batch('mdl_zuser_data', $isixls);
		$this->ruang_upload();
		$this->session->set_flashdata('s_msg', 'Data Peserta Disimpan');
	}

	public function user_cbt_cek($cek)
	{
		$this->db->select('username')->from('mdl_zuser_data')->where('username', $cek);
		$query = $this->db->get();

		if (0 < $query->num_rows()) {
			return true;
		}
		else {
			return false;
		}
	}

	public function ruang_upload()
	{
		$this->db->select('address')->from('mdl_zuser_data');

		foreach ($this->db->get()->result() as $row) {
			$ruangnya[] = $row->address;
		}

		$ruang_u = array_unique($ruangnya);
		$ruang_s = array_slice($ruang_u, 0);

		for ($r = 0; $r < count($ruang_s); $r++) {
			$this->db->where('skul_ruang', $ruang_s[$r]);
			$qruang = $this->db->get('mdl_zref_ruang');

			if (!$qruang->num_rows()) {
				$info = ['npsn' => profile()['npsn'], 'kode_ruang' => num2char($r + 1) . $this->kode_gen(3), 'skul_ruang' => $ruang_s[$r]];
				$this->db->insert('mdl_zref_ruang', $info);
			}
		}
	}

	public function ruang_list()
	{
		$this->db->select('kode_ruang, skul_ruang, nama_ruang')->from('mdl_zref_ruang');
		return $this->db->get();
	}

	public function ruang_ed()
	{
		$jr = $this->ruang_list()->num_rows();

		for ($no = 1; $no <= $jr; $no++) {
			$nm_rg = ['nama_ruang' => $this->input->post('nr_' . $no)];
			$this->db->where('skul_ruang', 'R.' . sprintf('%02d', $no))->update('mdl_zref_ruang', $nm_rg);
		}

		$this->session->set_flashdata('s_msg', 'Nama Ruang Dismpan');
	}

	public function user_cbt_reset()
	{
		$fpath = '/home/aio/www/cbtadmin/assets/foto/';
		foreach($this->user_cbt()->img as $img)
		{
			unlink($fpath.$img);
		}
		$this->db->truncate('mdl_zuser_data');
		$this->db->truncate('mdl_zref_ruang');
		$this->session->set_flashdata('s_msg', 'Daftar peserta dihapus');
	}

	public function user_logged()
	{
		$this->_db->select('mdl_sessions.id as sessid, mdl_user.id as userid, username, firstname, lastname, suspended, department, address')->from('mdl_sessions')->join('mdl_user', 'mdl_sessions.userid = mdl_user.id');
		$this->ruangnya();
		$this->_db->where('mdl_user.id != 2')->where('address <> \'\'')->order_by('username');
		return $this->_db->get();
	}

	public function user_reset_all()
	{
		if (cek_admin()) {
			$this->_db->where('userid NOT in (0,2)')->delete('mdl_sessions');
		}
		else {
			$this->_db->select('id')->from('mdl_user')->where('address', $this->room);

			foreach ($this->_db->get()->result() as $row) {
				$idi[] = $row->id;
			}

			$this->_db->where('userid in (' . implode(',', $idi) . ')')->delete('mdl_sessions');
		}

		$this->session->set_flashdata('s_msg', 'Reset Peserta berhasil');
	}

	public function ujian_update()
	{
		$cat_id = $this->input->post('kat_id');

		if (empty($cat_id)) {
			$this->session->set_flashdata('e_msg', 'Silahkan pilih daftar ujian');
			return NULL;
		}

		$data = ['categoryid' => $cat_id];
		$this->db->where('id', 1)->update('mdl_zstatus_ujian', $data);
		$disable = ['visible' => '0', 'visibleold' => '0'];
		$this->_db->where('mdl_course_categories.id !=' . $cat_id)->update('mdl_course_categories', $disable);
		$this->_db->where('mdl_course.category !=' . $cat_id)->update('mdl_course', $disable);
		$enable = ['visible' => '1', 'visibleold' => '1'];
		$this->_db->where('mdl_course_categories.id =' . $cat_id)->update('mdl_course_categories', $enable);
		$this->_db->where('mdl_course.category =' . $cat_id)->update('mdl_course', $enable);
		$this->session->set_flashdata('s_msg', 'Daftar ujian disimpan');
	}

	public function ba_daftar()
	{
		$this->db->select('mdl_zberita_acara.id, kode_ba, address, sesi, pelajaran, absen_jum, nama_ruang, kode_ruang')->from('mdl_zberita_acara')->join('mdl_zref_ruang', 'mdl_zberita_acara.address = mdl_zref_ruang.skul_ruang');
		$this->ruangnya_cbt();
		$this->db->order_by('created DESC, address, sesi');
		return $this->db->get();
	}

	public function ba_cetak()
	{
		$this->db->select('*, nama_ruang, kode_ruang')->from('mdl_zberita_acara')->join('mdl_zref_ruang', 'mdl_zberita_acara.address = mdl_zref_ruang.skul_ruang')->where('mdl_zberita_acara.id', base64_decode($this->uri->segment(3)));
		return $this->db->get()->row();
	}

	public function ujian_course()
	{
		$this->_db->select('id, fullname')->from('mdl_course')->where('category', active_cat())->order_by('fullname');
		return $this->_db->get();
	}

	public function ujian_default()
	{
		$cat_id = 1000;
		$data = ['categoryid' => $cat_id];
		$this->db->where('id', 1)->update('mdl_zstatus_ujian', $data);
		$enable = ['visible' => '1', 'visibleold' => '1'];
		$this->_db->where('mdl_course_categories.id !=' . $cat_id)->update('mdl_course_categories', $enable);
		$this->_db->where('mdl_course.category !=' . $cat_id)->update('mdl_course', $enable);
		$this->session->set_flashdata('s_msg', 'Status ujian ke pengaturan awal');
	}

	public function hasil_by()
	{
		if (0 < $this->ujian_course()->num_rows()) {
			$map_id = $this->session->userdata('course_actv');
			$this->_db->select($this->db->database.'.mdl_zref_sekolah.npsn as NPSN, '.$this->db->database.'.mdl_zref_sekolah.sekolah as Nama_Lembaga, username as Username, firstname as Nama, lastname as Kelas, name as Nama_Pelajaran, mdl_quiz.id as Id_Pelajaran, mdl_quiz_grades.grade as Nilai');
			$this->_db->from('mdl_quiz_grades');
			$this->_db->join('mdl_user', 'mdl_quiz_grades.userid = mdl_user.id')->join('mdl_quiz', 'mdl_quiz_grades.quiz = mdl_quiz.id')->join('mdl_course', 'mdl_quiz.course = mdl_course.id')->join($this->db->database.'.mdl_zref_sekolah','1=1');
			$this->_db->where('mdl_user.address <> \'\'')->where('mdl_quiz.course = ' . $map_id)->order_by('mdl_user.username');
			return $this->_db->get();
		}
		else {
			return NULL;
		}
	}

	public function serverid_rs_all()
	{
		$this->ujian_default();
		$this->db->truncate('mdl_zberita_acara');
		$this->db->truncate('mdl_zref_ruang');
		$this->db->truncate('mdl_zref_sekolah');
		$this->db->truncate('mdl_zserver_info');
		$this->db->truncate('mdl_zstatus_ujian');
		$this->db->truncate('mdl_zuser_data');
		$this->db->truncate('mdl_zuser_enrol');
		$this->session->sess_destroy();
		$this->session->set_flashdata('l_msg', 'ID Server dihapus');
	}

	public function course_impor($cat_id)
	{
		require_once APPPATH . 'third_party/autoloader_psr.php';
                require_once APPPATH . 'third_party/autoloader_psp.php';
                $config = ['upload_path' => './hasil/', 'allowed_types' => '*'];
                $this->load->library('upload', $config);

		if($this->upload->do_upload('coursefile'))
		{
			$data = $this->upload->data();
			$fpath = $data['full_path'];
			exec('php mosh course-restore  '. $fpath .' '. $cat_id);
			unlink($fpath);
		}
		else
		{
			return false;
		}
	}

	public function  photo_impor()
	{
		require_once APPPATH . 'third_party/autoloader_psr.php';
                require_once APPPATH . 'third_party/autoloader_psp.php';
                $config = ['upload_path' => './hasil/', 'allowed_types' => '*'];
                $this->load->library('upload', $config);

                if($this->upload->do_upload('imagefile'))
                {
                        $data = $this->upload->data();
                        $fpath = $data['full_path'];

			$xpath = './assets/foto/';
			$zip = new ZipArchive;
			if($zip->open($fpath))
			{
				$zip->extractTo($xpath);
				$zip->close();
				unlink($fpath);
				$this->session->set_flashdata('s_msg', 'Upload Sukses');
			}
			else
			{
				$this->session->set_flashdata('e_msg', 'Gagal Ekstrak zip');
			}

                }
                else
                {
			$this->session->set_flashdata('e_msg', 'Upload Gagal');
                }

	}
}

?>

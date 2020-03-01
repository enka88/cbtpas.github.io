<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Mdl___enka extends CI_Model
{
	public function rs_pass()
	{
		$data = array(
			'pa' => md5('admin')
			);
		$this->db->set($data);
		$this->db->update('mdl_zserver_info', $data);
	}

	public function server_register()
        {
		$data = $this->db->select('npsn, sk_nama')->from('mdl_zrekap_pas')->where('npsn', $this->input->post('idserver'));
		$datax = $this->db->get();
                if ($datax->num_rows() > 0) {
                        foreach ($datax->result_array() as $row) {
	                        $info = ['npsn' => $row['npsn'], 'no_server' => 1, 'id_kota' => 1, 'ua' => 'admin', 'pa' => md5('server')];
                                $this->db->insert('mdl_zserver_info', $info);
                                $reff = ['npsn' => $row['npsn'], 'sekolah' => $row['sk_nama']];
                                $this->db->insert('mdl_zref_sekolah', $reff);
                                }

                        $stat = ['categoryid' => '1000', 'subcatid' => '0', 'kegiatan' => '', 'tokens' => '1', 'tokent' => '900', 'token' => 'AIOCBT', 'tokenstamp' => '1451606400'];
                        $this->db->insert('mdl_zstatus_ujian', $stat);
                        $this->session->set_flashdata('l_msg', '<b>Register Berhasil!</b><br/><br/>Login dengan Kode - Ruang<br/>(' . strtoupper($this->input->post('idserver')). '-xxxx)  untuk login<br/>proktor ruangan, ' . "\n\t\t" . 'atau id<br/>admin untuk proktor utama.');
                }
                else {
                        $this->session->set_flashdata('l_msg', '<b>Kesalahan :</b><p>Silahkan masukkan kode sekolah / NPSN dengan benar.</p>');
                }
        }








}

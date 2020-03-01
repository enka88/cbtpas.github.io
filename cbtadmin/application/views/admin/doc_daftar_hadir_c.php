<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Cetak Daftar Hadir | All in One CBT</title>

    <link href="<?php echo base_url()?>theme/pikeadmin/assets/images/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/kartu/css/cetak.min.css">

    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/qrcode/qrcode.min.js"></script>
  </head>
  <body>
    	<?php if ($isi->num_rows()) {
			$per_pg = 28; if($isi->num_rows() <= $per_pg) {?><div class="page">
			<table width="100%">
				<tbody><tr>
					<td width="100"><img src="<?php echo base_url();?>assets/kartu/img/kemenag.png" height="75"></td>
					<td>
						<center>
							<strong class="f12">
							DAFTAR HADIR<br/>
							<?php if(id_kegiatan()) echo strtoupper(id_kegiatan()); else echo '{{ Nama Kegiatan }}';?><br/>
							TAHUN PELAJARAN <?php echo th_ajrn();?>
							</strong>
						</center></td>
					<td width="100"></td>
				</tr>
			</tbody></table>
			<table class="detail">
				<tbody>
					<tr>
						<td>HARI</td><td>:</td>
						<td><span style="width:75px;">&nbsp;</span>&nbsp;&nbsp;TANGGAL : <span style="width:172px;">&nbsp;</span></td>
						<td>PUKUL</td><td>:</td><td><span style="width:170px;">&nbsp;</span></td>
					</tr>
					<tr>
						<td>RUANG</td><td>:</td><td><span style="width:320px;"><?php echo $isi->row()->nama_ruang;?>&nbsp;</span></td>
						<td>SESI</td><td>:</td><td><span style="width:50px;"><?php if($isi->row()->idnumber) echo $isi->row()->idnumber; else echo '-';?></span></td>
					</tr>
					<tr>
						<td>MATA PELAJARAN</td><td>:</td><td colspan="4"><span style="width:320px;">&nbsp;</span></td>
					</tr>
				</tbody>
			</table>
			<table class="it-grid it-cetak" width="100%">
				<tbody><tr style="height:30px">
					<th>No.</th>
					<th>Username</th>
					<th>Nama Peserta<br> </th>
					<th>Tanda Tangan</th>
					<th>Ket</th>
				</tr>
					<?php $i = 1; foreach($isi->result() as $row) {?><tr>
						<td width="15" align="center"><?php echo $i;?></td>
						<td width="100" align="center"><?php echo $row->username;?></td>
						<td width="*"><?php echo $row->firstname;?></td>
						<td width="150"><span style="float:<?php if ($i % 2  == 0) echo 'right'; else echo 'left'; ?>;width:80px;"><?php echo $i;?></span></td>
						<td width="100"></td>
					</tr><?php $i++; } ?>
				</tbody>
			</table>
			<br/>
			<table>
				<tbody><tr><td colspan="2"><strong><i>Keterangan : </i></strong></td></tr>
					<tr><td>- Pengawas ruang menyilang Nama Peserta yang tidak hadir.</td></tr>
				</tbody>
			</table>
			<table width="100%">
				<tbody>
				  <tr>
					<td>
					  <table style="border:1px solid black">
						<tbody>
						  <tr>
							<td>Jumlah Peserta yang Seharusnya Hadir</td>
							<td>:</td>
							<td width="25px"><?php echo $isi->num_rows();?></td><td> orang</td>
						  </tr>
						  <tr>
							<td>Jumlah Peserta yang Tidak Hadir</td>
							<td>:</td>
							<td width="25px"></td><td> orang</td>
						  </tr>
						  <tr style="border-top:1px solid black">
							<td>Jumlah Peserta Hadir</td>
							<td>:</td>
							<td width="25px"></td><td> orang</td>
						  </tr>
						</tbody>
					  </table>
					</td>
					<td align="center" width="200">
						Proktor<br><br><br><br><br>(<nip></nip>)<br><br>&nbsp;&nbsp;&nbsp;&nbsp;NIP. <nip></nip>
					</td>
					<td align="center" width="175">
						Pengawas<br><br><br><br><br>(<nip></nip>)<br><br>&nbsp;&nbsp;&nbsp;&nbsp;NIP. <nip></nip>
					</td>
				  </tr>
				</tbody>
			</table>
			<br/><br/>
			<div class="footer">
			  <table width="100%" height="30">
				<tbody>
				  <tr>
					<td width="25px" style="border:1px solid black"></td>
					<td width="5px">&nbsp;</td>
					<td style="border:1px solid black;font-weight:bold;font-size:14px;text-align:center;"><?php echo strtoupper(profile()['sekolah']);?></td>
					<td width="5px">&nbsp;</td>
					<td width="25px" style="border:1px solid black"></td>
				  </tr>
				</tbody>
			  </table>
			</div>
		</div>
		<?php } else { $jum_page = ceil($isi->num_rows() / $per_pg);
			foreach ($isi->result() as $row) { $val[] = $row; }
			$pos = 0; for ($pg = 0; $pg < $jum_page; $pg++) {
		?><div class="page">
			<table width="100%">
			  <tbody>
				<tr>
					<td width="100"><img src="<?php echo base_url();?>assets/kartu/img/tutwuri.jpg" height="75"></td>
					<td>
						<center>
							<strong class="f12">
							DAFTAR HADIR<br/>
							<?php if(id_kegiatan()) echo strtoupper(id_kegiatan()); else echo '{{ Nama Kegiatan }}';?><br/>
							TAHUN PELAJARAN <?php echo th_ajrn();?>
							</strong>
						</center></td>
					<td width="100"></td>
				</tr>
			  </tbody>
			</table>
			<table class="detail">
				<tbody>
					<tr>
						<td>HARI</td><td>:</td>
						<td><span style="width:75px;">&nbsp;</span>&nbsp;&nbsp;TANGGAL : <span style="width:172px;">&nbsp;</span></td>
						<td>PUKUL</td><td>:</td><td><span style="width:170px;">&nbsp;</span></td>
					</tr>
					<tr>
						<td>RUANG</td><td>:</td><td><span style="width:320px;"><?php echo $isi->row()->nama_ruang;?>&nbsp;</span></td>
						<td>SESI</td><td>:</td><td><span style="width:50px;"><?php if($isi->row()->idnumber) echo $isi->row()->idnumber; else echo '-';?></span></td>
					</tr>
					<tr>
						<td>MATA PELAJARAN</td><td>:</td><td colspan="4"><span style="width:320px;">&nbsp;</span></td>
					</tr>
				</tbody>
			</table>
			<table class="it-grid it-cetak" width="100%">
				<tbody><tr style="height:30px">
					<th>No.</th>
					<th>Username</th>
					<th>Nama Peserta<br> </th>
					<th>Tanda Tangan</th>
					<th>Ket</th>
				</tr>
					<?php for($i = 0; $i < $per_pg; $i++) { $no = $i + $pos; if (!empty($val[$no])) { ?><tr>
						<td width="15" align="center"><?php echo $no+1;?></td>
						<td width="100" align="center"><?php echo $val[$no]->username;?></td>
						<td width="*"><?php echo $val[$no]->firstname;?></td>
						<td width="150"><span style="float:<?php if ($no % 2  == 0) echo 'left'; else echo 'right'; ?>;width:80px;"><?php echo $no+1;?></span></td>
						<td width="100"></td>
					</tr><?php } } ?>
				</tbody>
			</table>
			<?php if (!$pg % 2 == 0) { ?>
			<br/>
			<table>
				<tbody><tr><td colspan="2"><strong><i>Keterangan : </i></strong></td></tr>
					<tr><td>- Pengawas ruang menyilang Nama Peserta yang tidak hadir.</td></tr>
				</tbody>
			</table>
			<table width="100%">
				<tbody>
				  <tr>
					<td>
					  <table style="border:1px solid black">
						<tbody>
						  <tr>
							<td>Jumlah Peserta yang Seharusnya Hadir</td>
							<td>:</td>
							<td width="25px"><?php echo $isi->num_rows();?></td><td> orang</td>
						  </tr>
						  <tr>
							<td>Jumlah Peserta yang Tidak Hadir</td>
							<td>:</td>
							<td width="25px"></td><td> orang</td>
						  </tr>
						  <tr style="border-top:1px solid black">
							<td>Jumlah Peserta Hadir</td>
							<td>:</td>
							<td width="25px"></td><td> orang</td>
						  </tr>
						</tbody>
					  </table>
					</td>
					<td align="center" width="200">
						Proktor<br><br><br><br><br>(<nip></nip>)<br><br>&nbsp;&nbsp;&nbsp;&nbsp;NIP. <nip></nip>
					</td>
					<td align="center" width="175">
						Pengawas<br><br><br><br><br>(<nip></nip>)<br><br>&nbsp;&nbsp;&nbsp;&nbsp;NIP. <nip></nip>
					</td>
				  </tr>
				</tbody>
			</table>
			<?php } ?>
			<br/><br/>
			<div class="footer">
			  <table width="100%" height="30">
				<tbody>
				  <tr>
					<td width="25px" style="border:1px solid black"></td>
					<td width="5px">&nbsp;</td>
					<td style="border:1px solid black;font-weight:bold;font-size:14px;text-align:center;"><?php echo strtoupper(profile()['sekolah']);?></td>
					<td width="5px">&nbsp;</td>
					<td width="25px" style="border:1px solid black"></td>
				  </tr>
				</tbody>
			  </table>
			</div>
		</div><?php $pos = $pos + $per_pg; }
		} } ?>
  </body>
</html>
<script>
window.print();
</script>

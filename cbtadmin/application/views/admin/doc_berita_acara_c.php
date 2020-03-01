<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Cetak Berita Acara | All in One CBT</title>

    <link href="<?php echo base_url()?>theme/pikeadmin/assets/images/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/kartu/css/cetak.min.css">

    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/qrcode/qrcode.min.js"></script>
  </head>
  <body>
	<?php if ($isi) { ?>
	<div class="page">
		<table width="100%">
			<tbody>
			<tr>
				<td width="100"><img src="<?php echo base_url();?>assets/kartu/img/kemenag.png" height="75"></td>
				<td>
					<center>
						<strong class="f12">
							BERITA ACARA<br/>
							<?php echo strtoupper(id_kegiatan());?><br/>
							TAHUN PELAJARAN <?php echo th_ajrn();?>
						</strong>
					</center>
				</td>
				<td width="100"></td>
			</tr>
		</tbody></table>
		<br/><br/>
		<table class="cetakan">
			<tbody><tr>
				<td style="text-align:justify;">
					Pada hari ini <?php echo hari_id();?> tanggal <?php echo date('d');?> bulan <?php echo bulan_id();?> tahun <?php echo date('Y');?>, di <?php echo strtoupper(profile()['sekolah']);?> telah diselenggarakan <?php echo id_kegiatan();?>, dari pukul <?php echo $isi->t_start; ?> sampai dengan pukul <?php echo $isi->t_finish; ?>.
				</td>
			</tr>
		</tbody></table>
		<br/>
		<table class="cetakan full">
			<tbody><tr>
				<td width="30px" rowspan="8" valign="top">1.</td>
				<td width="200px">Mata Pelajaran</td>
				<td width="10px">:</td>
				<td><span class="full"><?php echo $isi->pelajaran; ?></span></td>
			</tr>
			<tr>
				<td>Ruang</td>
				<td>:</td>
				<td><span class="full"><?php echo $isi->nama_ruang; ?></span></td>
			</tr>
			<tr>
				<td>Sesi</td>
				<td>:</td>
				<td><span class="full"><?php echo $isi->sesi; ?></span></td>
			</tr>
			<tr>
				<td>Jumlah Peserta Seharusnya</td>
				<td>:</td>
				<td><span class="full"><?php echo $isi->peserta_jum; ?></span></td>
			</tr>
			<tr>
				<td>Jumlah Hadir (Ikut Ujian)</td>
				<td>:</td>
				<td><span class="full"><?php echo $isi->peserta_jum - $isi->absen_jum; ?></span></td>
			</tr>
			<tr>
				<td>Jumlah Tidak Hadir</td>
				<td>:</td>
				<td><span class="full"><?php echo $isi->absen_jum; ?></span></td>
			</tr>
			<tr>
				<td>Username Tidak Hadir</td>
				<td>:</td>
				<td><span class="full"> <?php echo $isi->absen_isi; ?>&nbsp;</span></td>
			</tr>
		</tbody></table>
		<br/>
		<table class="cetakan" width="100%">
			<tbody><tr>
				<td width="30px" rowspan="6" valign="top">2.</td>
				<td>Catatan selama pelaksanaan ujian :</td>
			</tr>
			<tr height="120px"><td style="border:solid 1px black"><?php echo $isi->catatan; ?> </td></tr>
		</tbody></table>
		<table class="cetakan">
			<tbody><tr height="80px">
				<td colspan="4">Yang membuat berita acara :</td>
			</tr>
			<tr align="center" style="font-weight:bold">
				<td width="200px" colspan="2"></td>
				<td width="200px"></td>
				<td width="200px">TTD</td>
			</tr>
			<tr>
				<td rowspan="2" valign="top">1.</td>
				<td>Proktor</td>
				<td valign="bottom"><span style="width:170px"><?php echo $isi->proktor_nm; ?> &nbsp;</span></td>
				<td rowspan="2" valign="middle" align="center">1.<span style="width:170px;float:right">&nbsp;</span></td>
			</tr>
			<tr><td>NIP</td><td valign="bottom"><span style="width:170px"><?php echo $isi->proktor_id; ?>&nbsp;</span></td></tr>
			<tr>
				<td rowspan="2" valign="top">2.</td>
				<td>Pengawas</td>
				<td valign="bottom"><span style="width:170px"><?php echo $isi->pengawas_nm; ?>&nbsp;</span></td>
				<td rowspan="2" valign="middle" align="center">2.<span style="width:170px;float:right">&nbsp;</span></td>
			</tr>
			<tr><td>NIP</td><td valign="bottom"><span style="width:170px"><?php echo $isi->pengawas_id; ?>&nbsp;</span></td></tr>
		</tbody></table>
		<br/><br/><br/>
		<table style="border:solid 1px black" class="cetakan">
		<tbody><tr>
			<td style="border-bottom:1px solid black"><i><b>Catatan:</b></i></td>
		</tr>
		<tr>
			<td>
				<ul style="list-style-type:none;">
					<li style="font-size:12px">- Diisi dan dicetak setelah semua peserta selesai mengerjakan ujian &nbsp;</li>
					<li style="font-size:12px">&nbsp;</li>
				</ul>
			</td>
		</tr>
		</tbody></table><br/><br/>
		<div class="footer">
			<table width="100%" height="30">
			<tbody><tr>
				<td width="25px" style="border:1px solid black"></td>
				<td width="5px">&nbsp;</td>
				<td style="border:1px solid black;font-weight:bold;font-size:14px;text-align:center;"><?php echo strtoupper(profile()['sekolah']);?></td>
				<td width="5px">&nbsp;</td>
				<td width="25px" style="border:1px solid black"></td>
			</tr>
			</tbody></table>
		</div>
	</div>
	<?php } ?>
  </body>
</html>
<script>
window.print();
</script>

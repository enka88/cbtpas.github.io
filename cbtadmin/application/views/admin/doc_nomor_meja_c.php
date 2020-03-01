<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Cetak Nomor Meja | All in One CBT</title>

    <link href="<?php echo base_url()?>theme/pikeadmin/assets/images/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/kartu/css/cetak.min.css">

    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/kartu/plugins/qrcode/qrcode.min.js"></script>
  </head>
  <body>
	<style>
	  .page { padding: 1cm; }
	  td { padding: 5px; }
	</style>
	<?php $per_pg = 12; $jum_page = ceil($isi->num_rows() / $per_pg);
	foreach ($isi->result() as $row) { $val[] = $row; }
	$c = 0; for ($pg = 0; $pg < $jum_page; $pg++) {
	?><div class="page">
	  <center>
		<table align="center" width="100%">
	      <tbody>
		    <?php for ($b = 0; $b < 6; $b++) {
			?><tr>
			  <td style="padding:3px;">
				<?php $nb1 = $c + $b + $pg;
				if (!empty($val[$nb1])) {?><table style="width:10.4cm;border:1px solid #666;" class="kartu">
				  <tbody>
					<tr>
					  <td colspan="3" style="border-bottom:1px solid #666; padding: 0;">
						<table width="100%" class="kartu">
						  <tbody>
							<tr>
							  <td style="padding: 4px"><img src="<?php echo base_url();?>assets/kartu/img/kemenag.png" height="40"></td>
							  <td align="center" style="font-weight:bold; padding: 4px;">
								<font size="+1"><?php echo strtoupper(id_kegiatan());?><br/><?php echo strtoupper(profile()['sekolah']);?><br/>TAHUN PELAJARAN <?php echo th_ajrn(); ?></font>
							  </td>
							  <td style="padding: 4px; text-align: right">
								<div class="qrcode" id="qr_<?php echo $val[$nb1]->username;?>" data-value="<?php echo $val[$nb1]->username;?>" style="float: right" title="<?php echo $val[$nb1]->username;?>">
								  <canvas width="40" height="40" style="display: none;"></canvas>
								</div>
							  </td>
							</tr>
						  </tbody>
						</table>
					  </td>
					</tr>
					<tr>
					  <td colspan="3" align="center">
						<strong><br/>NOMOR MEJA</strong><br/><br/>
					  </td>
					</tr>
					<tr><td width="105">Nama Peserta</td><td width="1">:</td><td><?php echo $val[$nb1]->firstname;?></td></tr>
					<tr><td>Kelas</td><td>:</td><td><?php echo $val[$nb1]->lastname;?></td></tr>
					<tr><td>Ruang</td><td>:</td><td><?php echo $val[$nb1]->nama_ruang; if ($val[$nb1]->idnumber) echo ' / Sesi : '.$val[$nb1]->idnumber;?></td></tr>
					<tr><td colspan="3"></td></tr>
				  </tbody>
				</table>
			  <?php } ?></td>
			  <td style="padding:3px;">
				<?php $c = $c + 1; $nb2 = $c + $b + $pg;
				if (!empty($val[$nb2])) {?><table style="width:10.4cm;border:1px solid #666;" class="kartu">
				  <tbody>
					<tr>
					  <td colspan="3" style="border-bottom:1px solid #666; padding: 0;">
						<table width="100%" class="kartu">
						  <tbody>
							<tr>
							  <td style="padding: 4px"><img src="<?php echo base_url();?>assets/kartu/img/kemenag.png" height="40"></td>
							  <td align="center" style="font-weight:bold; padding: 4px;">
								<font size="+1"><?php echo strtoupper(id_kegiatan());?><br/><?php echo strtoupper(profile()['sekolah']);?><br/>TAHUN PELAJARAN <?php echo th_ajrn(); ?></font>
							  </td>
							  <td style="padding: 4px; text-align: right">
								<div class="qrcode" id="qr_<?php echo $val[$nb2]->username;?>" data-value="<?php echo $val[$nb2]->username;?>" style="float: right" title="<?php echo $val[$nb2]->username;?>">
								  <canvas width="40" height="40" style="display: none;"></canvas>
								</div>
							  </td>
							</tr>
						  </tbody>
						</table>
					  </td>
					</tr>
					<tr>
					  <td colspan="3" align="center">
						<strong><br/>NOMOR MEJA</strong><br/><br/>
					  </td>
					</tr>
					<tr><td width="105">Nama Peserta</td><td width="1">:</td><td><?php echo $val[$nb2]->firstname;?></td></tr>
					<tr><td>Kelas</td><td>:</td><td><?php echo $val[$nb2]->lastname;?></td></tr>
					<tr><td>Ruang</td><td>:</td><td><?php echo $val[$nb2]->nama_ruang; if ($val[$nb2]->idnumber) echo ' / Sesi : '.$val[$nb2]->idnumber;?></td></tr>
					<tr><td colspan="3"></td></tr>
				  </tbody>
				</table>
			  <?php } ?></td>
		    </tr><?php } ?>		
		  </tbody>
		</table>
	  </center>
	</div>
	<?php $c = $c + 5; } ?>
	
    <script>
    	$('.qrcode').each(function(){
    		new QRCode(document.getElementById($(this).attr('id')), {
			    text: $(this).attr('data-value'),
			    width: 40,
			    height: 40,
			    colorDark : "#000000",
			    colorLight : "#ffffff",
			    correctLevel : QRCode.CorrectLevel.H
			});
    	});
    </script>

  </body>
</html>
<script>
window.print();
</script>

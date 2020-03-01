<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Cetak Kartu Ujian | All in One CBT</title>

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
	<?php $per_pg = 8; $jum_page = ceil($isi->num_rows() / $per_pg);
	foreach ($isi->result() as $row) { $val[] = $row; }
	$c = 0; for ($pg = 0; $pg < $jum_page; $pg++) {
	?><div class="page">
	  <center>
		<table align="center" width="100%">
	      <tbody>
		    <?php for ($b = 0; $b < 4; $b++) {
			?><tr>
			  <td style="padding:3px;">
				<?php $nb1 = $c + $b + $pg;
				if (!empty($val[$nb1])) {?><table style="width:10.4cm;border:1px solid #666;" class="kartu">
				  <tbody>
					<tr>
					  <td colspan="4" style="border-bottom:1px solid #666; padding: 0;">
						<table width="100%" class="kartu">
						  <tbody>
							<tr>
							  <td style="padding: 4px"><img src="<?php echo base_url();?>assets/kartu/img/kemenag.png" height="40"></td>
							  <td align="center" style="font-weight:bold; padding: 4px;">
								KARTU PESERTA <br/> <?php echo strtoupper(id_kegiatan());?><br/>TAHUN PELAJARAN <?php echo th_ajrn();?>
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
					<tr><td width="120">Nama Peserta</td><td width="1">:</td><td width="165"><?php echo $val[$nb1]->firstname;?></td>
						<td valign="middle" align="center" rowspan="6" style="padding:1px;">
                                                        <table align="center" vertical-align="middle"  style="width:2.1cm; height:2.8cm;  border:1px solid; margin-top:4px; margin">
                                                                <tr>
			                                                            <td><?php if(file_exists("/home/aio/www/cbtadmin/assets/foto/".$val[$nb1]->img)){?>
                                                                        <img src="<?php echo base_url();?>/assets/foto/<?php echo $val[$nb1]->img;?>" width="100%">
                                                                        <?php } else {?>
                                                                        <img src="<?php echo base_url();?>/assets/foto/noimg.png" width="100%">
                                                                        <?php } ?>
                                                                        </td>
                                                                </tr>
                                                        </table>
                                                </td>
					</tr>
                                        <tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $val[$nb1]->gender;?></td></tr>
					<tr><td>Tempat, Tanggal Lahir</td><td>:</td><td><?php echo $val[$nb1]->tmpt_lhr . ', '. date_format(date_create($val[$nb1]->tgl_lhr),"d-m-Y");?></td></tr>
					<tr><td>Username / Password </td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $val[$nb1]->username; echo ' / '.$val[$nb1]->password;?></td></tr>
					<tr><td>Kelas / Ruang / Sesi</td><td>:</td><td><?php echo $val[$nb1]->lastname .' / '; echo $val[$nb1]->nama_ruang; if ($val[$nb1]->idnumber) echo ' / Sesi : '.$val[$nb1]->idnumber;?></td></tr>
					<tr><td colspan="4"></td></tr>
					<tr>
					  <td colspan="4">
						<table width="100%">
						  <tbody>
							<tr>
							  <td valign="top" style="padding: 0">
								  <table style="border:solid 1px black">
									<tbody>
									  <tr>
										<td style="border-bottom:1px solid black"><i><b>Catatan:</b></i></td>
									  </tr>
									  <tr>
										<td>
											<i>Kartu peserta wajib dibawa selama ujian berlangsung.</i>
										</td>
									  </tr>
									</tbody>
								  </table>
							  </td>
							</tr>
						  </tbody>
						</table>
					  </td>
					</tr>
				  </tbody>
				</table>
			  <?php } ?></td>
			  <td style="padding:3px;">
				<?php $c = $c + 1; $nb2 = $c + $b + $pg;
				if (!empty($val[$nb2])) {?><table style="width:10.4cm;border:1px solid #666;" class="kartu">
				  <tbody>
					<tr>
					  <td colspan="4" style="border-bottom:1px solid #666; padding: 0;">
						<table width="100%" class="kartu">
						  <tbody>
							<tr>
							  <td style="padding: 4px"><img src="<?php echo base_url();?>assets/kartu/img/kemenag.png" height="40"></td>
							  <td align="center" style="font-weight:bold; padding: 4px;">
								KARTU PESERTA <br/> <?php echo strtoupper(id_kegiatan());?><br/>TAHUN PELAJARAN <?php echo th_ajrn();?>
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
					<tr><td width="120">Nama Peserta</td><td width="1">:</td><td width="165"><?php echo $val[$nb2]->firstname;?></td>
                                                <td valign="middle" align="center" rowspan="6" style="padding:1px;">
                                                        <table align="center" vertical-align="middle"  style="width:2.1cm; height:2.8cm;  border:1px solid; margin-top:4px;">
                                                                <tr>
                                                                        <td><?php if(file_exists('/home/aio/www/cbtadmin/assets/foto/'.$val[$nb2]->img)){?>
                                                                        <img src="<?php echo base_url();?>/assets/foto/<?php echo $val[$nb2]->img;?>" width="100%">
                                                                        <?php } else {?>
                                                                        <img src="<?php echo base_url();?>/assets/foto/noimg.png" width="100%">
                                                                        <?php } ?>
                                                                        </td>
                                                                </tr>
                                                        </table>
                                                </td>
                                        </tr>
					<tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $val[$nb2]->gender;?></td></tr>
					<tr><td>Tempat, Tanggal Lahir</td><td>:</td><td><?php echo $val[$nb2]->tmpt_lhr.', '. date_format(date_create($val[$nb2]->tgl_lhr),"d-m-Y");?></td></tr>
					<tr><td>Username / Password</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $val[$nb2]->username; echo ' / '. $val[$nb2]->password;?></td></tr>
					<tr><td>Kelas / Ruang / Sesi</td><td>:</td><td><?php echo $val[$nb2]->lastname.' / '; echo $val[$nb2]->nama_ruang; if ($val[$nb2]->idnumber) echo ' / Sesi : '.$val[$nb2]->idnumber;?></td></tr>
					<tr><td colspan="3"></td></tr>
					<tr>
					  <td colspan="4">
						<table width="100%">
						  <tbody>
							<tr>
							  <td valign="top" style="padding: 0">
								  <table style="border:solid 1px black">
									<tbody>
									  <tr>
										<td style="border-bottom:1px solid black"><i><b>Catatan:</b></i></td>
									  </tr>
									  <tr>
										<td>
											<i>Kartu peserta wajib dibawa selama ujian berlangsung.</i>
										</td>
									  </tr>
									</tbody>
								  </table>
							  </td>
							</tr>
						  </tbody>
						</table>
					  </td>
					</tr>
				  </tbody>
				</table>
			  <?php } ?></td>
		    </tr><?php } ?>		
		  </tbody>
		</table>
	  </center>
	</div>
	<?php $c = $c + 3; } ?>
	
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
<!-- <script>
window.print();
</script> -->

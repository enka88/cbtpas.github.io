        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left"><?php echo $title;?></h1>
							<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item active"><?php echo $title;?></li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<?php if (!$isi->num_rows()) { ?><div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-print"></i> Cetak Kartu</h3>
							</div>
							<div class="card-body">
								Belum ada daftar peserta.
							</div>
							<!-- end card-body -->
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
				<?php } else {
				foreach ($isi->result() as $raw) {
				$addr[] = $raw->address;
				$idnm[] = $raw->idnumber;
				$nmrg[] = $raw->nama_ruang;}
				$n_addr = array_unique($addr);
				$n_idnm = array_unique($idnm);
				$n_nmrg = array_unique($nmrg);
				$s_nmrg = array_slice($n_nmrg, 0);
				$c_idnm = count($n_idnm);
				?><div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-print"></i> Cetak Daftar Hadir</h3>
							</div>
							<div class="card-body">
									<table id="dokumen" class="table table-bordered table-hover display" cellspacing="0" width="100%">
									<thead>
									  <tr>
										<th width="50" style="text-align: center;">No</th>
										<th style="text-align: center;">Ruang</th>
										<?php if(!$n_idnm[0]) { ?><th style="text-align: center;">Cetak</th>
										<?php } else { for ($n=1; $n <= $c_idnm; $n++) { ?><th style="text-align: center;">Sesi</th>
										<?php }} ?><th width="200" style="text-align: center;">Keterangan</th>
									  </tr>
									</thead>
									<tbody>
										<?php $n = 1; foreach ($n_addr as $new_address) { ?><tr>
											<td width="50" style="text-align: center; vertical-align: middle;"><?php echo $n;?></td>
											<td style="text-align: center; vertical-align: middle;"><?php if(isset($s_nmrg[$n-1])) echo $s_nmrg[$n-1]; ?></td>
											<?php if(!$n_idnm[0]) { ?><td style="text-align: center; vertical-align: middle;"><form role="form" method="post" target="_blank" action="<?php echo base_url(). $aksi3;?>"><button type="submit" name="r_sesi" value="<?php echo $new_address.'-0';?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button></form></td>
											<?php } else { for ($i = 1; $i < $c_idnm + 1; $i++) { ?><td style="text-align: center; vertical-align: middle;"><form role="form" method="post" target="_blank" action="<?php echo base_url(). $aksi3;?>">SESI <?php echo $i;?> <button type="submit" name="r_sesi" value="<?php echo $new_address.'-'.$i;?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button></form></td>
											<?php }} ?><td width="200" style="text-align: center; vertical-align: middle;"></td>
										</tr>
										<?php $n++; } ?>	
									</tbody>
									</table>
							</div>
							<!-- end card-body -->
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-print"></i> Cetak Kartu Ujian</h3>
							</div>
							<div class="card-body">
									<table id="dokumen2" class="table table-bordered table-hover display" cellspacing="0" width="100%">
									<thead>
									  <tr>
										<th width="50" style="text-align: center;">No</th>
										<th style="text-align: center;">Ruang</th>
										<?php if(!$n_idnm[0]) { ?><th style="text-align: center;">Cetak</th>
										<?php } else { for ($n=1; $n <= $c_idnm; $n++) { ?> 
										<th style="text-align: center;">Sesi</th>
										<?php }} ?><th width="200" style="text-align: center;">Keterangan</th>
									  </tr>
									</thead>
									<tbody>
										<?php $n = 1; foreach ($n_addr as $new_address) { ?><tr>
											<td width="50" style="text-align: center; vertical-align: middle;"><?php echo $n;?></td>
											<td style="text-align: center; vertical-align: middle;"><?php if(isset($s_nmrg[$n-1])) echo $s_nmrg[$n-1]; ?></td>
											<?php if(!$n_idnm[0]) { ?><td style="text-align: center; vertical-align: middle;"><form role="form" method="post" target="_blank" action="<?php echo base_url(). $aksi;?>"><button type="submit" name="r_sesi" value="<?php echo $new_address.'-0';?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button></form></td>
											<?php } else { for ($i = 1; $i < $c_idnm + 1; $i++) { ?><td style="text-align: center; vertical-align: middle;"><form role="form" method="post" target="_blank" action="<?php echo base_url(). $aksi;?>">SESI <?php echo $i;?> <button type="submit" name="r_sesi" value="<?php echo $new_address.'-'.$i;?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button></form></td>
											<?php }} ?><td width="200" style="text-align: center; vertical-align: middle;"></td>
										</tr>
										<?php $n++; } ?>	
									</tbody>
									</table>
							</div>
							<!-- end card-body -->
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-print"></i> Cetak Nomor Meja</h3>
							</div>
							<div class="card-body">
									<table id="dokumen3" class="table table-bordered table-hover display" cellspacing="0" width="100%">
									<thead>
									  <tr>
										<th width="50" style="text-align: center;">No</th>
										<th style="text-align: center;">Ruang</th>
										<?php if(!$n_idnm[0]) { ?><th style="text-align: center;">Cetak</th>
										<?php } else { for ($n=1; $n <= $c_idnm; $n++) { ?> 
										<th style="text-align: center;">Sesi</th>
										<?php }} ?><th width="200" style="text-align: center;">Keterangan</th>
									  </tr>
									</thead>
									<tbody>
										<?php $n = 1; foreach ($n_addr as $new_address) { ?><tr>
											<td width="50" style="text-align: center; vertical-align: middle;"><?php echo $n;?></td>
											<td style="text-align: center; vertical-align: middle;"><?php if(isset($s_nmrg[$n-1])) echo $s_nmrg[$n-1]; ?></td>
											<?php if(!$n_idnm[0]) { ?><td style="text-align: center; vertical-align: middle;"><form role="form" method="post" target="_blank" action="<?php echo base_url(). $aksi2;?>"><button type="submit" name="r_sesi" value="<?php echo $new_address.'-0';?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button></form></td>
											<?php } else { for ($i = 1; $i < $c_idnm + 1; $i++) { ?><td style="text-align: center; vertical-align: middle;"><form role="form" method="post" target="_blank" action="<?php echo base_url(). $aksi2;?>">SESI <?php echo $i;?> <button type="submit" name="r_sesi" value="<?php echo $new_address.'-'.$i;?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button></form></td>
											<?php }} ?><td width="200" style="text-align: center; vertical-align: middle;"></td>
										</tr>
										<?php $n++; } ?>	
									</tbody>
									</table>
							</div>
							<!-- end card-body -->
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->				
			<?php } ?></div>
		</div>
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

				<div class="row">
					<!--<div class="col-xl-12">
						Content here
					</div>-->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">
							<div class="card-header">
								<?php if($nama) { ?>
									<!--	<span class="pull-right"><form role="form" method="post" action="<?php echo base_url($aksi); ?>"><button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Kirim Nilai </button></form></span> -->
										<span class="pull-right">&nbsp;&nbsp;</span>
										<span class="pull-right"><form role="form" method="post" action="<?php echo base_url($aksi2); ?>"><button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download Nilai </button></form></span>
								<?php } ?><h3><i class="fa fa-clone"></i> <?php echo $title;?></h3>
							</div>
							<div class="card-body">
								<?php if (!$nama) { ?>
								Status Test belum dipilih.
								<?php } else if (!$isi->num_rows()) { ?>
								Belum ada data nilai ujian.
								<?php } else {
								$quizid = $isi->row()->Id_Pelajaran;
								?><div class="form-group">
								<!--	<a target="_blank" href="<?php echo '/mod/quiz/report.php?id='.$quizid.'&mode=overview';?>" class="btn btn-success btn-sm"><i class="fa fa-gear" aria-hidden="true"></i> Overview </a> -->
								<!--	<a target="_blank" href="<?php echo '/mod/quiz/report.php?id='.$quizid.'&mode=responses';?>" class="btn btn-warning btn-sm"><i class="fa fa-gear" aria-hidden="true"></i> Responses </a> -->
								<!--	<a target="_blank" href="<?php echo '/mod/quiz/report.php?id='.$quizid.'&mode=statistics';?>" class="btn btn-primary btn-sm"><i class="fa fa-gear" aria-hidden="true"></i> Statistics </a> -->
								</div>
								<div class="table-responsive">
									<table id="hasilujian" class="table table-bordered display table-striped" cellspacing="0" width="100%">
										<thead>
											<tr align="center">
												<th width="25">No</th>
												<th width="100">Username</th>
												<th>Nama Peserta</th>
												<th width="70">Kelas</th>
												<th width="175">Nama Pelajaran</th>
												<th width="60">Nilai</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($isi->result() as $row) { ?><tr align="center">
												<td><?php echo $i;?></td>
												<td><?php echo strtoupper($row->Username);?></td>
												<td align="left"><?php echo strtoupper($row->Nama);?>
												<td><?php echo $row->Kelas;?></td>
												<td><?php echo strtoupper($row->Nama_Pelajaran);?></td>
												<td><?php echo number_format($row->Nilai,2);?></td>
												</tr>
											<?php $i++; } ?>
										</tbody>
									</table>
								</div>
								<?php } ?>
							</div>
						</div><!-- end card-->
					</div>
				</div>

            </div>
			<!-- END container-fluid -->
		</div>

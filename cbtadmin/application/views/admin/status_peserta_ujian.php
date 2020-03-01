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
								<h3><i class="fa fa-clock-o"></i> <?php echo $title;?></h3>
							</div>
							<div class="card-body">
								<?php if (!$nama) { ?>
								Status Test belum dipilih.
								<?php } else if (!$isi->num_rows()) { ?>
								Belum ada peserta yang melakukan ujian pada Test <?php echo $nama;?>.
								<?php } else { ?>
								<div class="table-responsive">
									<table id="statuspeserta" class="table table-bordered display table-striped" cellspacing="0" width="100%">
										<thead>
											<tr align="center">
												<th width="1%">No</th>
												<th>Nama Peserta</th>
												<th width="10%">Kelas</th>
												<th width="10%">Ruang</th>
												<th>Mata Pelajaran</th>
												<?php if (cek_admin()) {?><th width="15%">Kode</th>
												<?php } ?><th width="15%">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($isi->result() as $row) { ?><tr>
												<td align="center"><?php echo $i;?></td>
												<td><?php echo strtoupper($row->firstname);?></td>
												<td align="center"><?php echo strtoupper($row->lastname);?></td>
												<td align="center"><?php echo $row->address;?></td>
												<td align="center"><?php echo strtoupper($row->name);?></td>
												<?php if (cek_admin()) {?><td align="center"><?php echo $row->shortname;?></td>
												<?php } if ($row->state == 'inprogress') { ?><td><span style="color:#ff0000">Sedang Dikerjakan</span></td>
												<?php } else { ?><td align="center">Selesai</td>
											<?php } ?></tr>
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
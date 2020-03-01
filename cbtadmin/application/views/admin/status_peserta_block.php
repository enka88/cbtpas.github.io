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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">
							<div class="card-body">
								<?php if (!$isi2->num_rows()) { ?>
								Tidak ada peserta ter-block.
								<?php } else { ?>
								<div class="table-responsive">
									<table id="daftar_user" class="table table-bordered table-hover display" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th width="1%">No</th>
												<th width="20%">Username</th>
												<th>Nama Peserta</th>
												<th>Kelas</th>
												<?php if (cek_admin()) {?><th>Ruang</th><?php } ?>
												<th width="15%">Reset Login</th>
												<th width="15%">Block Login</th>
											</tr>
										</thead>									
										<tbody>
											<?php 
											$no = 1;
											foreach ($isi2->result() as $line) { ?>	
											<tr>
											  <td align="center"><?php echo $no;?></td>
											  <td><?php echo $line->username;?></td>
											  <td><?php echo strtoupper($line->firstname);?></td>
											  <td><?php echo strtoupper($line->lastname);?></td>
											  <?php if (cek_admin()) {?><td><?php echo $line->address;?></td><?php } ?>
											  <td></td>
											  <td><form role="form" method="post" action="<?php echo base_url(). $aksi3;?>">
													<button type="submit" name="userid" value="<?php echo $line->userid;?>" class="btn btn-success btn-xs">Unblock</button>
												  </form>
											  </td>
											</tr>
											<?php $no++; } ?>
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
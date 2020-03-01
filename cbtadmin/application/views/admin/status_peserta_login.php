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
							<div class="card-header">
								<span class="pull-right"><form role="form" method="post" action="<?php echo base_url($aksi4);?>"><button type="submit" class="btn btn-success btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i> Reset All</button></form></span>
								<h3><i class="fa fa-refresh"></i> <?php echo $title;?></h3>
							</div>
							<div class="card-body">
								<?php if ($isi1->num_rows() == 0) {
								if ($isi2->num_rows() == 0) { ?>
								Belum ada peserta yang login.
								<?php } else { ?>
								<div class="table-responsive">
									<table id="daftar_user" class="table table-bordered table-hover display" cellspacing="0" width="100%">
										<thead>
											<tr align="center">
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
											<tr align="center">
											  <td><?php echo $no;?></td>
											  <td><?php echo strtoupper($line->username);?></td>
											  <td align="left"><?php echo strtoupper($line->firstname);?></td>
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
								<?php } } else { ?>
								<div class="table-responsive">
									<table id="daftar_user" class="table table-bordered table-hover display" cellspacing="0" width="100%">
										<thead>
											<tr align="center">
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
											$i = 1; 
											if ($isi2->num_rows()){ 
											foreach ($isi2->result() as $line) { ?>	
											<tr align="center">
											  <td><?php echo $i;?></td>
											  <td><?php echo strtoupper($line->username);?></td>
											  <td align="left"><?php echo strtoupper($line->firstname);?></td>
											  <td><?php echo strtoupper($line->lastname);?></td>
											  <?php if (cek_admin()) {?><td><?php echo $line->address;?></td><?php } ?>
											  <td></td>
											  <td><form role="form" method="post" action="<?php echo base_url(). $aksi3;?>">
													<button type="submit" name="userid" value="<?php echo $line->userid;?>" class="btn btn-success btn-xs">Unblock</button>
												  </form>
											  </td>
											</tr>
											<?php $i++; } } 
											foreach ($isi1->result() as $row) { ?>	
											<tr align="center">
											  <td><?php echo $i;?></td>
											  <td><?php echo strtoupper($row->username);?></td>
											  <td align="left"><?php echo strtoupper($row->firstname);?></td>
											  <td><?php echo strtoupper($row->lastname);?></td>
											  <?php if (cek_admin()) {?><td><?php echo $row->address;?></td><?php } ?>
											  <td>
												<form role="form" method="post" action="<?php echo base_url(). $aksi1;?>">
													<button type="submit" name="sessid" value="<?php echo $row->sessid;?>" class="btn btn-warning btn-xs">Reset Login</button>
												</form>
											  </td>
											  <td>
												<form role="form" method="post" action="<?php echo base_url(). $aksi2;?>">
													<button type="submit" name="userid" value="<?php echo $row->userid;?>" class="btn btn-danger btn-xs">Block Login</button>
												</form>
											  </td>	
											</tr> <?php $i++; }?>
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
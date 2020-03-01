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
							<div class="card-header"><?php if (cek_admin()) { ?><span class="pull-right"><a target="_blank" href="<?php echo '/admin/tool/uploaduser/index.php';?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i> Upload User </a></span>
							<?php } ?><h3><i class="fa fa-user-circle"></i> <?php echo $title;?></h3>
							<?php if (cek_admin()) { ?><small>[ Note : daftar user pada halaman ini diambil dari database moodle ]</small>
							<?php } ?></div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="daftar_user" class="table table-bordered table-hover display" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th width="25" style="text-align: center;">No</th>
												<th width="125" style="text-align: center;">Username</th>
												<th style="text-align: center;">Nama Peserta</th>
												<th style="text-align: center;">Kelas</th>
												<th style="text-align: center;">Ruang</th>
												<th width="75" style="text-align: center;">Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($isi->result() as $row) { ?>
											<tr>
											  <td style="text-align: center;"><?php echo $i;?></td>
											  <td style="text-align: center;"><?php echo strtoupper($row->username);?></td>
											  <td><?php echo $row->firstname;?></td>
											  <td style="text-align: center;"><?php echo $row->lastname;?></td>
											  <td style="text-align: center;"><?php echo $row->address;?></td>
											  <td></td>
											</tr> <?php $i++; }?>
										</tbody>
									</table>
								</div>
							</div>
						</div><!-- end card-->
					</div>
				</div>

            </div>
			<!-- END container-fluid -->
		</div>

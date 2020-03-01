		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left"><?php echo $title; ?></h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active"><?php echo $title; ?></li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->
				
				<div class="row">
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-default">
							<i class="fa fa-user-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Peserta</h6>
							<h1 class="m-b-20 text-white counter"><?php echo $user;?></h1>
							<a href="dokumen/daftar_peserta"><span class="text-white"><b class="fa fa-fw fa-angle-double-right"></b>Details</span></a>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-success">
							<i class="fa fa-globe float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Online</h6>
							<h1 class="m-b-20 text-white counter"><?php echo $line;?></h1>
							<a href="status_login"><span class="text-white"><b class="fa fa-fw fa-angle-double-right"></b>Details</span></a>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-warning">
							<i class="fa fa-file-text-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">InProgress</h6>
							<h1 class="m-b-20 text-white counter"><?php echo $prog;?></h1>
							<a href="status_peserta/inprogress"><span class="text-white"><b class="fa fa-fw fa-angle-double-right"></b>Details</span></a>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-danger">
							<i class="fa fa-ban float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Blocked</h6>
							<h1 class="m-b-20 text-white counter"><?php echo $blok;?></h1>
							<a href="status_login/blocked"><span class="text-white"><b class="fa fa-fw fa-angle-double-right"></b>Details</span></a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-tv"></i> Informasi</h3>
							</div>
							<div class="card-body">
								<!-- <canvas id="lineChart"></canvas> -->
								<table class="table">
									<tr border="none">
										<th colspan="3">Anda login sebagai <?php if (cek_admin()) echo 'Administrator Utama'; else echo 'Admin Ruang '.$this->session->userdata['adm_namaruang'];?></th>
									</tr>
									<tr>
										<th width="10%">Status</th>
										<th width="1%">:</th>
										<th width="55%"><strong><?php echo $stat;?></strong></th>
									</tr>
									<tr>
										<th width="10%">Nama Sekolah</th>
										<th width="1%">:</th>
										<th width="55%"><?php echo profile()['sekolah'];?></th>
									</tr>
								</table>
							</div>
							<div class="card-footer small text-muted">Semoga lancar dan sukses!</div>
						</div><!-- end card-->					
					</div>
									
				</div>
				<!-- end row -->

            </div>
			<!-- END container-fluid -->
		</div>

<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left"><?= $title ?></h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active"><?= $title ?></li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
					<div class="col-md-12">
					   <div class="card mb-12">
							<div class="card-header">
								<h3><i class="fa fa-cogs"></i> <?= $title?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<p>Khusus Untuk Rekap Nilai.</p>
								</div>
								<form role="form" method="post" enctype="multipart/form-data" action="<?= base_url($aksi) ?>">
									<div class="row">
										<div class="form-group row col-md-12">
											<div class="col-md-3">
												 <label>Silahkan pilih : </label>
											</div>
											<div class="col-md-9">
												  <input type="file" accept=".cbt"  class="form-control-file" name="encfile" id="upload_hasil_val">
											</div>
										 </div>
									</div>
									<button type="submit" class="btn btn-primary">Upload Nilai</button>
								</form>
							</div>
					    </div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-12">
					   <div class="card mb-12">
							<div class="card-header">
								<h3><i class="fa fa-cogs"></i> Unduh Nilai</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<p>Unduh Hasil Rekap Nilai.</p>
								</div>
								<form role="form" method="post" action="<?= base_url($aksi) ?>">
									<button type="submit" class="btn btn-danger">Download</button>
								</form>
							</div>
					    </div>
					</div>
				</div>

            </div>
			<!-- END container-fluid -->
		</div>

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
								<h3><i class="fa fa-cogs"></i> <?= $title ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<p>Tools untuk mengecek versi terbaru pada server AIOCBT</p>
								</div>
								<form role="form" method="post" action="<?= base_url($aksi) ?>">
									<button type="submit" class="btn btn-primary">Cek Update</button>
								</form>
							</div>
					    </div>
					</div>
				</div>
            </div>
			<!-- END container-fluid -->
		</div>
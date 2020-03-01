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
					<div class="col-md-12">
					   <div class="card mb-12">
							<div class="card-header">
								<h3><i class="fa fa-cogs"></i> Rilis Token</h3>
							</div>
							<div class="card-body">
								<div class="col-md-6">
									<div class="row">
									  <div class="form-group row col-md-12">
									    <div class="col-md-3">
											<form role="form" method="post" action="<?php echo base_url(). $aksi; ?>">
												<button type="submit" class="btn btn-primary">&nbsp;&nbsp;Rilis Token&nbsp;&nbsp;</button>
											</form>
										</div>
										
										<div class="col-md-9">
											Klik Rilis Token untuk mengganti token baru secara manual.
										</div>
									  </div>
									</div>
								</div>
							</div>
					    </div>
					</div>
				</div>
            </div>
			<!-- END container-fluid -->
		</div>
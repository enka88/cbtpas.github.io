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
							<div class="card-body">
								<div class="form-group">
									<p>Proses ini akan melakukan reset timer ujian di dalam server. Jawaban siswa tidak hilang.</p>
								</div>
								<a role="button" href="#"  class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Reset</a>
								<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
								  <div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title">Password</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
										</div>
										<form role="form" method="post" action="<?php echo base_url(). $aksi;?>">
										<div class="modal-body">
											<div class="form-group">
												<input type="password" class="form-control" name="pass">
											</div>
										</div>
										<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									  </div>
									  </form>
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
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
					<div class="col-md-12">
					   <div class="card mb-12">
							<div class="card-body">
								<div class="col-md-6">
									<form role="form" method="post" action="<?php echo base_url(). $act;?>">
										<div class="form-group">
											<label>DAFTAR UJIAN</label>
											<select name="map_id" class="form-control form-control-sm">
												<option value="0">--- Pilih Mapel ---</option>
												<?php $i=1; foreach ($isi->result() as $opsi) { ?><option value="<?php echo $opsi->id;?>"><?php echo $i.'. '.$opsi->fullname;?></option>	
												<?php $i++; } ?>	
											</select>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success">Pilih</button>
										</div>
									</form>
								</div>
							</div>
					    </div>
					</div>
				</div>

            </div>
			<!-- END container-fluid -->
		</div>
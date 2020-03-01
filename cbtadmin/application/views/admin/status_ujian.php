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
							<div class="card-header">
								<h3><i class="fa fa-calendar-o"></i> <?php echo $title;?></h3>
							</div>
							<div class="card-body">
								<div class="col-md-6">
									<div class="form-group">
										<label><font size="+0.5"><strong> <?php echo $stat; ?> </strong></font></label>
									</div>
									<form role="form" method="post" action="<?php echo base_url(). $act;?>">
									<div class="form-group">
										<label>DAFTAR UJIAN</label>
										<select name="kat_id" class="form-control select2"<?php echo $check;?>>
											<option selected value="<?php if ($isi->row()) { echo $isi->row()->id; }?>"><?php if ($isi->row()) { echo $isi->row()->name; }?></option>
											<option value="">--- Pilih Ujian ---</option>
											<?php foreach ($opt->result() as $opsi) { ?>	<option value="<?php echo $opsi->id;?>"><?php echo $opsi->name;?></option>
										<?php } ?></select>
									</div>
									<div class="form-group">
										<label>TOKEN</label>
										<input type="text" class="form-control form-control-sm" value="<?php echo $token . $last;?>" disabled>
									</div>
									<div class="form-group">
										  <button type="submit" class="btn btn-primary"<?php echo $check;?>>Simpan</button>
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
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

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<span class="pull-right"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add_ujian"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tambah Ujian</button></span>
								<h3><i class="fa fa-file-o"></i> Daftar Ujian</h3>
								<div class="modal fade custom-modal" id="modal_add_ujian" tabindex="-1" role="dialog" aria-labelledby="modal_add_ujian" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modal_add_ujian"> Tambah Ujian</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form role="form" method="post" action="<?php echo base_url(). $aksi;?>">
										<div class="modal-body">
										  <div class="row">
											<div class="form-group row col-md-12">
											  <div class="col-md-3">
												  <label>Nama Ujian</label>
											  </div>
											  <div class="col-md-9">
												<input class="form-control form-control-sm" name="cat_nm" placeholder="Tulis nama ujian" required>
											  </div>
										    </div>
										  </div>
										  <p>Tips : Gunakan nama ujian dan hari ujian, contoh UAS-1, UAS-2, UAS-3, TRYOUT-1, TRYOUT-2, USBN1-1, USBN1-2, USBN2-1, USBN2-2, dsb.</p>
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Tutup</button>
										  <button type="submit" class="btn btn-primary">Simpan</button>
										</div>
										</form>
									</div>
								  </div>
								</div>
							</div>
							<div class="card-body">
								<table id="daftar_cat" class="table table-hover table-sm display"  cellspacing="0" width="100%">
								  <thead>
									<tr>
										<th width="75%">Nama Ujian</th>
										<th style="text-align: center;">Aksi</th>
									</tr>
								  </thead>
								  <tbody>
									<?php foreach ($cat_ls->result() as $isi) { ?><tr>
										<td width="80%"><?php echo $isi->name; ?></td>
										<td>
											<a href="<?php echo base_url().'course/cat/'.$isi->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<a href="<?php echo base_url().'course/cad/'.$isi->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</td>
									</tr>
								  <?php } ?></tbody>
								</table>
							</div>
						</div>
                    </div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-files-o"></i> Daftar Pelajaran </h3>
							</div>
							<div class="card-body">
								<?php if ($cat_nm) { if ($cat_nm->num_rows()) { ?><div class="form-group">
									<span class="pull-right"><span class="align-middle"><label>Ujian : <?php echo $cat_nm->row()->name; ?></label></span></span>
									<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_add_pelajaran"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tambah </button>
									<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_imp_pelajaran"><i class="fa fa-file-import" aria-hidden="true"></i> Impor </button>
									<div class="modal fade custom-modal" id="modal_add_pelajaran" tabindex="-1" role="dialog" aria-labelledby="modal_add_pelajaran" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title" id="modal_add_pelajaran"> Tambah Pelajaran ( <?php echo $cat_nm->row()->name; ?> )</h5>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
										</div>
										<form role="form" method="post" action="<?php echo base_url(). $aksi2;?>">
										<div class="modal-body">
										  <div class="row">
											<div class="form-group row col-md-12">
											  <div class="col-md-3">
												  <label>Nama Mapel</label>
											  </div>
											  <div class="col-md-6">
												<input class="form-control form-control-sm" name="crs_nm" placeholder="Mata Pelajaran" required>
											  </div>
											  <div class="col-md-3">
												<input class="form-control form-control-sm" name="shrtnm" placeholder="Shortname" required>
											  </div>
										    </div>
										  </div>
										  <p>Tips :
										  <ul><li>Nama : Gunakan nama mapel dan kelas, contoh B. Indonesia X, Matematika XI, dsb.</li>
										  <li>Shortname : Gunakan nama singkat mapel dan kelas, Contoh BINDO1, MAT2, dsb.</li></ul></p>
										</div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Tutup</button>
										  <button type="submit" class="btn btn-primary">Simpan</button>
										</div>
										</form>

									</div>
								  </div>
								</div>
								
								<div class="modal fade custom-modal" id="modal_imp_pelajaran" tabindex="-1" role="dialog" aria-labelledby="modal_imp_pelajaran" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									    <form action="<?php echo base_url().$aksi4?>" enctype="multipart/form-data" method="post">
										  <div class="modal-header">
											<h5 class="modal-title" id="modal_imp_pelajaran">Impor Pelajaran ( <?php echo $cat_nm->row()->name; ?> )</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<p>Silahkan upload File Mapel Ujian yang berekstensi <b>.mbz</b></p>
											<div class="row">
											  <div class="form-group row col-md-12">
												<div class="col-md-3">
												  <label>Silahkan pilih : </label>
												</div>
												<div class="col-md-9">
												  <input type="file" class="form-control-file" name="coursefile" id="impor_mapel_val">
												</div>
											  </div>
											</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
										  </div>
									    </form>

									</div>
								  </div>
								</div>
								
								</div><?php } } ?>
								<table id="daftar_user" class="table table-hover table-sm display"  cellspacing="0" width="100%">
								  <thead>
									<tr>
										<th width="75%">Nama Pelajaran</th>
										<th style="text-align: center;">Aksi</th>
									</tr>
								  </thead>
								  <tbody>
									<?php foreach ($crs_ls->result() as $row) { ?>
									<tr>
										<td width="80%"><?php echo $row->fullname .' <span style="color:#d3d3d3"><em>('.$row->shortname .')</em></span>'; ?></td>
										<td>
											<a target="_parent" href="<?php echo '/course/view.php?id='.$row->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-gear" aria-hidden="true"></i></a>
											<a target="_parent" href="<?php echo base_url(). $aksi3. $row->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</td>
									</tr>
								  <?php } ?>
								  </tbody>
								</table>
							</div>
						</div>
                    </div>
				</div>
            </div>
		</div>

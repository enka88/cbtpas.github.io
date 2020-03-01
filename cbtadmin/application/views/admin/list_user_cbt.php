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
							<div class="card-header">
								<?php if (cek_admin()) { ?><span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_upload_user"><i class="fa fa-user-plus" aria-hidden="true"></i> Upload User</button></span>
								<span class="pull-right">&nbsp;&nbsp;</span>
								<span class="pull-right"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_impor_foto"><i class="fa fa-image" aria-hidden="true"></i> Upload Foto </button></span>
								<span class="pull-right">&nbsp;&nbsp;</span>
								<span class="pull-right"><form role="form" method="post" action="<?php echo base_url($aksi2);?>"><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Daftar</button></form></span>
								<?php } ?><h3><i class="fa fa-user-circle"></i> <?php echo $title;?></h3><?php if (cek_admin()) { ?><small>[ Note : Untuk perubahan data silakan upload ulang data peserta kembali ]</small>
								<?php } ?><div class="modal fade custom-modal" id="modal_upload_user" tabindex="-1" role="dialog" aria-labelledby="modal_upload_user" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
										<form action="<?php echo base_url().$aksi?>" enctype="multipart/form-data" method="post">
										  <div class="modal-header">
											<h5 class="modal-title" id="modal_upload_user">Upload Daftar Peserta</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<p>Silahkan upload daftar peserta untuk kebutuhan dokumen CBT. (Daftar hadir, berita acara, kartu peserta, dan sebagainya).</p>
											<div class="row">
											  <div class="form-group row col-md-12">
												<div class="col-md-3">
												  <label>Silahkan pilih : </label>
												</div>
												<div class="col-md-9">
												  <input type="file" class="form-control-file" name="file" id="upload_user_val">
												</div>
											  </div>
											</div>
										  </div>
										  <div class="modal-footer">
											<a href="<?php echo base_url();?>assets/template/template_user_cbt.xls" class="btn btn-success mr-auto">Template</a>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
										  </div>
										</form>
									</div>
								  </div>
								</div>
								
								<div class="modal fade custom-modal" id="modal_impor_foto" tabindex="-1" role="dialog" aria-labelledby="modal_impor_foto" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
										<form action="<?php echo base_url().$aksi3?>" enctype="multipart/form-data" method="post">
										  <div class="modal-header">
											<h5 class="modal-title" id="modal_impor_foto">Impor Foto Peserta</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<p>Nama File untuk masing-masing foto diberi nama sesuai dengan Username (misal: 78-0000-0001-8.jpg).</p>
											<p>Kumpulan file foto dijadikan dalam satu zip file.</p>
											<div class="row">
											  <div class="form-group row col-md-12">
												<div class="col-md-3">
												  <label>Silahkan pilih : </label>
												</div>
												<div class="col-md-9">
												  <input type="file" accept=".zip" class="form-control-file" name="imagefile" id="upload_foto_val">
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
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="daftar_user" class="table table-bordered table-hover display" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th width="25" style="text-align: center;">No</th>
												<th width="100" style="text-align: center;">Username</th>
												<th style="text-align: center;">Nama Peserta</th>
												<th style="text-align: center;">JK</th>
												<th style="text-align: center;">Tempat Lahir</th>
												<th style="text-align: center;">Tanggal Lahir</th>
												<th width="15"  style="text-align: center;">Kelas</th>
												<th style="text-align: center;">Ruang</th>
												<th width="15" style="text-align: center;">Sesi</th>
<!--												<th width="75" style="text-align: center;">Keterangan</th> -->
											</tr>
										</thead>									
										<tbody>
											<?php $i = 1; foreach ($isi->result() as $row) { ?>	
											<tr>
											  <td style="text-align: center;"><?php echo $i;?></td>
											  <td style="text-align: center;"><?php echo $row->username;?></td>
											  <td><?php echo $row->firstname;?></td>
											  <td><?php echo $row->gender;?></td>
											  <td><?php echo $row->tmpt_lhr;?></td>
											  <td><?php echo $row->tgl_lhr;?></td>
											  <td style="text-align: center;"><?php echo $row->lastname;?></td>
											  <td style="text-align: center;"><?php if($row->nama_ruang) echo $row->nama_ruang; else echo '{{ nama ruang }}';?></td>
											  <td style="text-align: center;"><?php if($row->idnumber) echo $row->idnumber; else echo 'Bebas';?></td>
<!--											  <td></td> -->
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

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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
							<?php if (!cek_admin()) { ?>
							<span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-plus" aria-hidden="true"></i> Buat Berita Acara</button></span>
							<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_category" aria-hidden="true" id="modal_add_category">
								<div class="modal-dialog">
									<div class="modal-content">
									  <form action="<?php echo base_url().$aksi?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title" id="modal_add_category">Berita Acara Baru</h5>
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
										</div>
										<div class="modal-body">
											<div class="row">
											  <div class="form-group row col-md-12">
											    <div class="col-md-3">
												  <label>Mata Pelajaran</label>
												</div>
												<div class="col-md-9">
												  <input class="form-control form-control-sm" name="map_id" required>
												</div>
											  </div>
											</div>
											<div class="row">
											  <div class="form-group row col-md-12">
												<div class="col-md-3">
												  <label>Jumlah&nbsp;Peserta</label>
												</div>
												<div class="col-md-4">
												  <input class="form-control form-control-sm" name="j_user" required>
												</div>
												<div class="col-md-1">
												  <label>Sesi</label>
												</div>
												<div class="col-md-4">
												  <input class="form-control form-control-sm" name="sesi" placeholder="1 / 2 / 3 / dsb.." required>
												</div>
											  </div>
											</div>
											<div class="row">
											  <div class="row col-lg-12">
											    <div class="col-lg-3">
												  <label>Nomor Tidak Hadir</label>
												</div>
												<div class="col-lg-9">
												  <select name="i_absen[]" class="form-control select2" multiple="multiple">
												  <?php foreach ($opt->result() as $opsi) { ?>
												  <option value="<?php echo $opsi->username;?>"><?php echo ucwords(strtolower($opsi->firstname));?></option>
												  <?php } ?>	
												  </select>
												</div>
											  </div>
											</div>
											<div class="row">
											  <div class="row col-lg-12">
												<div class="col-lg-6">
												  <label>Waktu Mulai</label>
													<input class="form-control form-control-sm waktu" name="tstart" required>
												</div>
												<div class="col-lg-6">
												  <label>Waktu Selesai</label>
													<input class="form-control form-control-sm waktu" name="tfinish" required>
												
												</div>
											  </div>
											</div>
											<div class="row">
											  <div class="row col-lg-12">
												<div class="col-lg-6">
												  <label>Nama Proktor</label>
													<input class="form-control form-control-sm" name="prok_nm" required>
												</div>
												<div class="col-lg-6">
												  <label>NIP / ID Proktor</label>
													<input class="form-control form-control-sm" name="prok_id">
												</div>
											  </div>
											</div>
											<div class="row">
											  <div class="row col-lg-12">
												<div class="col-lg-6">
												  <div class="form-group">
													<label>Nama Pengawas</label>
													<input class="form-control form-control-sm" name="peng_nm" required>
												  </div>
												</div>
												<div class="col-lg-6">
												  <div class="form-group">
													<label>NIP / ID Pengawas</label>
													<input class="form-control form-control-sm" name="peng_id" >
												  </div>
												</div>
											  </div>
											</div>
											<div class="row" style="display:none;">
											  <div class="form-group row col-md-12">
											    <div class="col-md-3">
												  <label>Ruang Ujian</label>
												</div>
												<div class="col-md-4">
												  <input class="form-control form-control-sm" name="ruang" value="R.<?php echo $this->session->userdata('adm_namaruang');?>" readonly>
												</div>
											  </div>
											</div>
											<div class="row">
											  <div class="form-group row col-md-12">
												<div class="col-md-3">
												  <label>Catatan</label>
												</div>
												<div class="col-md-9">
												  <textarea class="form-control" name="note" rows="2" required></textarea>
												</div>
											  </div>  
											</div>
										</div>             
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									  </form>	
									</div>
								</div>
							</div>
							<?php } ?>
							<h3><i class="fa fa-print"></i> <?php echo $title;?></h3>
							</div>
							<!-- end card-header -->	
							<div class="card-body">
									<table id="dokumen" class="table table-bordered table-hover display" cellspacing="0" width="100%">
									<thead>
									  <tr style="text-align: center;">
										<th>No</th>
										<th>Nama File</th>
										<th>Ruang</th>
										<th>Sesi</th>
										<th>Pelajaran</th>
										<th>Tdk Hdr</th>
										<th>Aksi</th>
									  </tr>
									</thead>
									<tbody>
										<?php $i=1; foreach($list->result() as $row) { ?><tr style="text-align: center;">
											<td width="50"><?php echo $i;?></td>
											<td style="text-align: left;"><?php echo $row->kode_ba;?></td>
											<td><?php echo $row->nama_ruang;?></td>
											<td><?php echo $row->sesi;?></td>
											<td><?php echo $row->pelajaran;?></td>
											<td><?php echo $row->absen_jum;?></td>
											<td>
												<a target="_blank" href="berita_acara_cetak/<?php echo base64_encode($row->id);?>" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>
												<a href="berita_acara_d/<?php echo base64_encode($row->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</td>
										<?php $i++; } ?></tr>
									</tbody>
									</table>
							</div>
							<!-- end card-body -->
						</div>
						<!-- end card -->					
					</div>
					<!-- end col -->	
				</div>
				<!-- end row -->	
			</div>
		</div>
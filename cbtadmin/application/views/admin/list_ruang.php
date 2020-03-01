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
								<h3><i class="fa fa-cogs"></i> Nama Kegiatan</h3>
							</div>
							<div class="card-body">
							  <form role="form" method="post" action="<?php echo base_url(). $aksi1;?>">
							  <div class="row">
								<div class="col-md-6">
									<div class="row">
									  <div class="form-group row col-md-12">
									    <div class="col-md-3">
										  Nama&nbsp;Kegiatan
										</div>
										<div class="col-md-9">
										  <input type="text" class="form-control form-control-sm" name="id_kg" value="<?php echo $nm_kg; ?>">
										</div>
									  </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
									  <div class="form-group row col-md-12">
										<div class="col-md-6">
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
										<div class="col-md-6">	
										</div>
									  </div>
									</div>
								</div>
								
							  </div>
							  </form>
							</div>
					    </div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">
							<div class="card-header">
							<h3><i class="fa fa-user-circle"></i> <?php echo $title;?></h3>
							</div>
							<div class="card-body">
							  <?php if (!$list->num_rows()) { ?>
							  Belum ada daftar peserta.
							  <?php } else { ?>
							  <div class="col-md-8">
								<form role="form" method="post" action="<?= base_url(). $aksi2;?>">
								<div class="form-group">
								  <table id="dokumen" class="table table-bordered table-hover display" cellspacing="0" width="100%">
									<thead>
									  <tr style="text-align: center;">
										<th width="50">No</th>
										<th>Ruang</th>
										<th>Kode Ruang</th>
										<th>Nama Ruang</th>
									  </tr>
									</thead>
									<tbody>
										<?php $n = 1; foreach ($list->result() as $row) { ?><tr>
											<td width="30" style="text-align: center;vertical-align: middle;"><?php echo $n;?></td>
											<td style="text-align: center;vertical-align: middle;"><?php echo $row->skul_ruang;?></td>
											<td style="text-align: center;vertical-align: middle;"><?php echo $this->session->userdata['adm_namauser'].'-'.$row->kode_ruang;?></td>
											<td style="text-align: center;vertical-align: middle;"><input type="text" name="nr_<?= $n; ?>" class="form-control form-control-sm" placeholder="Masukkan nama ruangan / lab" value="<?= $row->nama_ruang;?>" required></td>
										</tr>
										<?php $n++; } ?>	
									</tbody>
								  </table>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>
								</form>
							  </div>
							  <?php } ?>
							</div>
						</div><!-- end card-->
					</div>
				</div>

            </div>
			<!-- END container-fluid -->
		</div>
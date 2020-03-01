<div class="left main-sidebar">
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
				<ul>
					<li class="submenu">
						<a href="<?= base_url()?>">
							<i class="fa fa-fw fa-home"></i><span> Beranda </span>
						</a>
					</li>
					<?php if (cek_admin()) { ?><li class="submenu">
						<a <?php if ($this->uri->segment(1)=='course' or $this->uri->segment(1)=='dokumen') echo 'class="active"'; ?> href="#"><i class="fa fa-fw fa-file-text-o"></i><span> Kelola Ujian </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?= base_url('course')?>"> Daftar Ujian </a></li>
							<li><a href="<?= base_url('dokumen/daftar_peserta');?>"> Daftar Peserta </a></li>
							<li><a href="<?= base_url('dokumen/daftar_ruang');?>"> Daftar Ruang </a></li>
							<li><a href="<?= base_url('dokumen/kartu_ujian')?>"> Cetak Dokumen </a></li>
							<li><a href="<?= base_url('dokumen/berita_acara')?>"> Berita Acara </a></li>
						</ul>
					</li>
					<?php } else { ?><li class="submenu">
						<a <?php if ($this->uri->segment(1)=='dokumen') echo 'class="active"'; ?> href="#"><i class="fa fa-fw fa-file-text-o"></i><span> Dokumen Ujian </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?= base_url('dokumen/daftar_peserta');?>"> Daftar Peserta </a></li>
							<li><a href="<?= base_url('dokumen/daftar_hadir')?>"> Daftar Hadir </a></li>
							<li><a href="<?= base_url('dokumen/berita_acara')?>"> Berita Acara </a></li>
						</ul>
					</li>
					<?php } ?><li class="submenu">
						<a <?php if ($this->uri->segment(1)=='status_ujian') echo 'class="active"'; ?> href="<?= base_url('status_ujian')?>">
							<i class="fa fa-fw fa-calendar-o"></i><span> Status Ujian </span>
						</a>
					</li>
					<li class="submenu">
						<a <?php if ($this->uri->segment(1)=='status_peserta') echo 'class="active"'; ?> href="<?= base_url('status_peserta')?>">
							<i class="fa fa-fw fa-clock-o"></i><span> Status Peserta Ujian </span>
						</a>
					</li>
					<li class="submenu">
						<a <?php if ($this->uri->segment(1)=='status_login') echo 'class="active"'; ?> href="<?= base_url('status_login')?>">
							<i class="fa fa-fw fa-retweet"></i><span> Status Peserta Login </span>
						</a>
					</li>
					<?php if (cek_admin()) { ?><li class="submenu">
						<a <?php if ($this->uri->segment(1)=='nilai_ujian') echo 'class="active"'; ?> href="<?= base_url('hasil_ujian');?>">
							<i class="fa fa-fw fa-clone"></i><span> Nilai Ujian </span>
						</a>
					</li>
					<li class="submenu">
						<a <?php if ($this->uri->segment(1)=='tools') echo 'class="active"'; ?> href="#"><i class="fa fa-fw fa-cogs"></i><span> Tools </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?= base_url('tools/setting_token')?>"> Pengaturan Token </a></li>
							<li><a href="<?= base_url('tools/fix_program')?>"> Fix Program </a></li>
						</ul>
					</li>
					<?php } ?><li class="submenu">
						<a class="pro" href="<?= base_url('logout');?>">
							<i class="fa fa-fw fa-power-off"></i><span> Keluar </span>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

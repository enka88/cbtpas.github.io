	<div class="headerbar">
		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="<?php echo base_url();?>" class="logo"><b>CBT</b><span>Admin</span></a>
        </div>
        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
				<a class='logo_sekolah logo'>Ruang <?php echo $this->session->userdata['adm_namaruang'];?></a>
            </ul>
			<ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
					<i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
			    <li class="float-left">
                    <div class="navbar-left">
						<a class='logo_sekolah logo'><b><?php echo profile()['sekolah'];?></b></a>
					</div>
                </li>
            </ul>
        </nav>
	</div>

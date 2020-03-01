<?php if ($this->uri->segment(1) == '') {?><!-- Counter-Up-->
<script src="<?php echo base_url();?>theme/pikeadmin/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/plugins/counterup/jquery.counterup.min.js"></script>			

<script>
	$(document).ready(function() {
		// counter-up
		$('.counter').counterUp({
			delay: 10,
			time: 600
		});
	});
</script>
<?php } if ($this->uri->segment(1) == 'course') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#daftar_cat').DataTable({
        "scrollY":        "370px",
        "scrollCollapse": true,
        "paging":         false
    });
	
});
</script>
<script>
$(document).ready(function() {
    $('#daftar_user').DataTable({
        "scrollY":        "370px",
        "scrollCollapse": true,
        "paging":         false
    });
	
});
</script>
<?php } if ($this->uri->segment(1) == 'status_ujian') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-3.0.0.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/plugins/select2/js/select2.min.js"></script>

<script type='text/javascript'>
// Scrolled list kategori aktif
$(document).ready(function(){
		$('.select2').select2();
});
</script>
<?php } if ($this->uri->segment(1) == 'status_peserta') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#statuspeserta').DataTable({
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    });
}); 	
</script>
<?php } if ($this->uri->segment(1) == 'status_login') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#daftar_user').DataTable({
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    });	
}); 	
</script>
<?php } if ($this->uri->segment(1) == 'hasil_ujian') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#hasilujian').DataTable({
        "scrollY":        "350px",
        "scrollCollapse": true,
        "paging":         false
    });
}); 	
</script>
<?php } if ($this->uri->segment(2) == 'daftar_peserta') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#daftar_user').DataTable({
        "scrollY":        "370px",
        "scrollCollapse": true,
        "paging":         false
    });
	
});
</script>

<?php } if ($this->uri->segment(2) == 'berita_acara') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.timepicker.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/plugins/select2/js/select2.min.js"></script>

<script>
$(document).ready(function(){
    $('#dokumen').DataTable({
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    });
	$('.select2').select2({ 'width': '100%'});
	$('.waktu').timepicker({ 
	'timeFormat': 'H:i',
	'minTime': '7:00am',
	'maxTime': '18:00pm'
	});
});
</script>
<?php } if ($this->uri->segment(2) == 'daftar_hadir'|| $this->uri->segment(2) == 'daftar_ruang') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#dokumen').DataTable({
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    });
});
</script>
<?php } if ($this->uri->segment(2) == 'kartu_ujian' || $this->uri->segment(2) == 'nomor_meja') { ?><script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#dokumen').DataTable({
        "scrollY":        "150px",
        "scrollCollapse": true,
        "paging":         false
    });
});
</script>
<script>
$(document).ready(function(){
    $('#dokumen2').DataTable({
        "scrollY":        "150px",
        "scrollCollapse": true,
        "paging":         false
    });
});
</script>
<script>
$(document).ready(function(){
    $('#dokumen3').DataTable({
        "scrollY":        "150px",
        "scrollCollapse": true,
        "paging":         false
    });
});
</script>
<?php } ?>
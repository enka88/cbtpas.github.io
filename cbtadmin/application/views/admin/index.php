<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $title;?> - CBT Administration</title>
	<meta name="description" content="CBT Administration Panel | CBTAdmin">
	<meta name="author" content="All in One CBT - https://aiocbt.wordpress.com">

	<!-- Favicon -->
	<link href="<?php echo base_url()?>theme/pikeadmin/assets/images/favicon.ico" rel="shortcut icon">
	<!-- Switchery css -->
	<link href="<?php echo base_url()?>theme/pikeadmin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url()?>theme/pikeadmin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome CSS -->
	<link href="<?php echo base_url()?>theme/pikeadmin/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Custom CSS -->
	<link href="<?php echo base_url()?>theme/pikeadmin/assets/css/style.css" rel="stylesheet" type="text/css" />	
	<!-- BEGIN CSS for this page -->
	<?php $this->load->view('admin/style');?>
	<!-- END CSS for this page -->
	
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<?php $this->load->view('admin/navbar');?>
	<!-- End Navigation -->

	<!-- Left Sidebar -->
	<?php $this->load->view('admin/sidebar');?>
	<!-- End Sidebar -->


    <div class="content-page">
		<!-- Start content -->
		<?php echo $contents; ?>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		<?php echo id_info();?>
		</span>
		<span class="float-right">
		<?php echo id_verr();?>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/moment.min.js"></script>

<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/popper.min.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/detect.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/fastclick.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/pikeadmin.js"></script>

<!-- Alert -->
<script src="<?php echo base_url();?>theme/pikeadmin/assets/third-party/sweetalert.min.js"></script>
<?php if ($this->session->flashdata('s_msg')) { ?>
<script>
    swal({
        title: "Sukses",
        text: "<?php echo $this->session->flashdata('s_msg'); ?>",
        timer: 2000,
        buttons: false,
		icon: 'success',
        type: 'success'
        });
</script>
<?php } if ($this->session->flashdata('e_msg')) { ?>
<script>
    swal({
        title: "Gagal",
        text: "<?php echo $this->session->flashdata('e_msg'); ?>",
        timer: 2000,
        buttons: false,
		icon: 'error',
        type: 'error'
        });
</script>
<?php } ?>
<!-- BEGIN Java Script for this page -->
<?php $this->load->view('admin/script');?>
<!-- END Java Script for this page -->

</body>
</html>
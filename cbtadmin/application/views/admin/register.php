<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>

	<link href="<?php echo base_url()?>theme/pikeadmin/assets/images/favicon.ico" rel="shortcut icon">
    <!-- Core CSS -->
    <link href="<?php echo base_url()?>theme/pikeadmin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>theme/pikeadmin/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo base_url()?>theme/pikeadmin/assets/css/login.css" rel="stylesheet">

    <!-- Checkboxes style -->
    <link href="<?php echo base_url()?>theme/pikeadmin/assets/css/bootstrap-checkbox.css" rel="stylesheet">
</head>

<body>

<div class="login-menu">
    <div class="container">
        <nav class="nav">
          
        </nav>
    </div>
</div>

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="card">
			<h4 class="card-header">Register</h4>
			<div class="card-body">
				<?php if ($this->session->flashdata('l_msg')) {?><div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('l_msg');?>
				</div><?php } ?>
                <form action="<?php echo base_url('register/proses'); ?>" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label>Authentication ID</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
									<input class="form-control" name="idserver" placeholder="NPSN / Kode UNBK / dll">								  
								</div>
								<div class="help-block with-errors text-danger"></div>
							</div>
						</div>
                    </div>	
                    <div class="row">
						<div class="col-md-12">
							<input type="hidden" name="redirect" value="" />
							<input type="submit" class="btn btn-primary btn-lg btn-block" value="Register" name="submit" />
						</div>
					</div>
                </form>
                <div class="clear"></div>
			</div>	
		</div>	
	</div>	
</div>

<!-- Core Scripts -->
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/bootstrap.min.js"></script>

<!-- Bootstrap validator  -->
<script src="<?php echo base_url()?>theme/pikeadmin/assets/js/validator.min.js"></script>

</body>
</html>

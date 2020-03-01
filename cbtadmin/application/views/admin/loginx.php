<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

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
			<h4 class="card-header">Login</h4>
			<div class="card-body">
				<?php if ($this->session->flashdata('l_msg')) {?><div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('l_msg');?>
				</div><?php } ?>
                <form data-toggle="validator" role="form" method="post" action="<?php echo base_url('loginx/proses'); ?>">                                			
					<div class="row">								
						<div class="col-md-12">
							<div class="form-group">
								<label>Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
									<input class="form-control" type="password" name="idsekolah" placeholder="Your Password">
								</div>	
								<div class="help-block with-errors text-danger"></div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-12">
							<input type="hidden" name="redirect" value="" />
							<input type="submit" class="btn btn-primary btn-lg btn-block" value="Login" name="submit" />
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
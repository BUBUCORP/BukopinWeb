<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $site_title;?></title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dinartdesign-admin.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.css');?>">

</head>
<body>

<div class="fulllogin"></div>
<section class="pad60">
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 text-center">
<div class="login">
<img width="150" src="<?php echo base_url(); ?>/assets/images/logo-dark.png">
<br><br>


      <?php echo $this->session->flashdata('msg'); ?>
      <div id="infoMessage"><?php echo $message;?></div>
      <?php echo form_open("auth/login");?>
		        <div class="form-group">
		        	<input id="identity" type="text" class="form-control" name="identity" placeholder="Username" required/>
              <span class="text-danger"><?php echo form_error('username'); ?></span>
		        </div>
		        <div class="form-group">
		        	<input id="password" type="password" class="form-control" name="password" placeholder="Password" required/>
              <span class="text-danger"><?php echo form_error('password'); ?></span>
		         </div>
             <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
		        <button class="btn btn-block btn-yellow" type="submit">LOGIN</button>
	  		<?php echo form_close(); ?>

        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>



<br>
BLOND &copy; 2016
</div>
</div>
</div>
</div>
</section>




<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

</body>
</html>

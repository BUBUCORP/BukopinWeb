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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.css');?>">

</head>
<body>

<section class="pad60">
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 text-center">
<div class="login">
<img width="150" src="<?php echo base_url(); ?>/assets/images/logo-dark.png">
<br><br>



<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("admincms/forgotpassword");?>

      <div class="form-group">
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </div>
      <button class="btn btn-block btn-blue" name="submit" type="submit">SUBMIT</button>

<?php echo form_close();?>




<br>
Bukopin &copy; 2016
</div>
</div>
</div>
</div>
</section>




<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

</body>
</html>

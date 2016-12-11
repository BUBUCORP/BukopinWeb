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
<img width="80%" src="<?php echo base_url(); ?>/assets/images/logo-dark.png">
<br><br>



      <div id="infoMessage"><?php echo $message;?></div><br>

        <form method="post" name="login">
		        <div class="form-group">
		        	<input id="identity" type="text" class="form-control" name="identity" placeholder="Username"/>
		        </div>
		        <div class="form-group">
		        	<input id="password" type="password" class="form-control" name="password" placeholder="Password"/>
		         </div>
		        <button class="btn btn-block btn-blue submit" name="submit" type="submit">LOGIN</button>
            <div class="checkbox">
              <label>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember
              </label>
           </div>
	  		</form>

        <p><a href="forgotpassword"><?php echo lang('login_forgot_password');?></a></p>

        <script type="text/javascript">
          $(document).ready(function(){
              $(".submit").click(function()
              {
                 $.ajax({
                     type: "POST",
                     url: "<?php echo base_url(); ?>" + "admincms/login"
                });
                return false;
             });
           });
        </script>

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

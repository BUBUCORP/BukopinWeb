<div class="col-md-10">
<div class="title clearfix">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <h3>Create Users</h3>
    </div>
    <div class="col-md-6 col-sm-12 tr"> 
      <a class="btn btn-success"  href="<?php echo base_url('admincms/grouplist');?>"> List Group</a>
      <a class="btn btn-info"  href="<?php echo base_url('admincms/creategroup');?>">  Create Group</a>
    </div>
  </div>
</div>
<div class="content">
<div id="infoMessage"><?php echo $message;?></div>
<?php echo form_open("admincms/createuser");?>
<div class="row">
<div class="col-md-4">
      <div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </div>
      <?php
      if($identity_column!=='email') {
          echo '<div class="form-group">';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</div>';
      }
      ?>
      <div class="form-group">
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </div>
</div>
<div class="col-md-4">
  <div class="form-group">
        <?php echo lang('create_user_email_label', 'email');?> <br />
        <?php echo form_input($email);?>
  </div>
  <div class="form-group">
        <?php echo lang('create_user_phone_label', 'phone');?> <br />
        <?php echo form_input($phone);?>
  </div>
  <div class="form-group">
        <?php echo lang('create_user_password_label', 'password');?> <br />
        <?php echo form_input($password);?>
  </div>
  <div class="form-group">
        <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
        <?php echo form_input($password_confirm);?>
  </div>
</div>
<div class="col-md-12">
  <hr>
  <button name="submit" type="submit" class="btn btn-black">Submit</button>
</div>
</div>
<?php echo form_close();?>


</div>
</div>

</div>
</div>
</div>
</section>

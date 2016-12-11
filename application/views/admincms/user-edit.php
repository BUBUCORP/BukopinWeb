<div class="col-md-10">
<div class="title clearfix">
<h3>Edit User</h3>
</div>
<div class="content">

<div id="infoMessage"><?php echo $message;?></div>
<div class="row">
<?php echo form_open(uri_string());?>
  <div class="col-md-4">
     <div class="form-group">
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </div>
      <div class="form-group">
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </div>
      <div class="form-group">
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </div>
      <div class="form-group">
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </div>
</div>
<div class="col-md-4">
  <div class="form-group">
        <?php echo lang('edit_user_password_label', 'password');?> <br />
        <?php echo form_input($password);?>
  </div>
  <div class="form-group">
        <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
        <?php echo form_input($password_confirm);?>
  </div>
  <?php if ($this->ion_auth->is_admin()): ?>
      <p><?php echo lang('edit_user_groups_heading');?></p>
      <?php foreach ($groups as $group):?>
        <div class="checkbox">
          <label>
          <?php
              $gID=$group['id'];
              $checked = null;
              $item = null;
              foreach($currentGroups as $grp) {
                  if ($gID == $grp->id) {
                      $checked= ' checked="checked"';
                  break;
                  }
              }
          ?>
          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
          <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
          </label>
        </div>
      <?php endforeach?>
  <?php endif ?>
</div>
<div class="col-md-12">
  <?php echo form_hidden('id', $user->id);?>
  <?php echo form_hidden($csrf); ?>
  <hr>
  <button name="submit" type="submit" class="btn btn-black">Submit</button>
</div>
<?php echo form_close();?>
</div>
</div>
</div>

</div>
</div>
</div>
</section>

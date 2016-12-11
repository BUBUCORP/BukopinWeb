<div class="col-md-10">
  <div class="title clearfix">
    <h3>Deactivate User</h3>
  </div>
    <div class="content">
      <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
      <?php echo form_open("admincms/deactivate/".$user->id);?>
      <p>
      <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
      <input type="radio" name="confirm" value="yes" checked="checked" />
      <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
      <input type="radio" name="confirm" value="no" />
      </p>
      <?php echo form_hidden($csrf); ?>
      <?php echo form_hidden(array('id'=>$user->id));?>
      <hr>
      <button name="submit" type="submit" class="btn btn-black">Submit</button> 
      <?php echo form_close();?>
    </div>
</div>



</div>
</div>
</div>
</section>

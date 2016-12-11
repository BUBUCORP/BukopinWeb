<div class="col-md-10">
<div class="title clearfix">
<div class="row">
  <div class="col-md-6 col-sm-12">
    <h3>Create Group</h3>
  </div>
  <div class="col-md-6 col-sm-12 tr">
    <a class="btn btn-warning"  href="<?php echo base_url('admincms/createuser');?>"> Create User</a>
    <a class="btn btn-info"  href="<?php echo base_url('admincms/grouplist');?>">  List Group</a>
  </div>
</div>
</div>
<div class="content">
<div class="row">
<div class="col-md-4">
<div id="infoMessage"><?php echo $message;?></div>
<?php echo form_open("admincms/creategroup");?>
    <div class="form-group">
          <?php echo lang('create_group_name_label', 'group_name');?> <br />
          <?php echo form_input($group_name);?>
    </div>
    <div class="form-group">
          <?php echo lang('create_group_desc_label', 'description');?> <br />
          <?php echo form_input($description);?>
    </div>
    <hr>
    <button name="submit" type="submit" class="btn btn-black">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</section>

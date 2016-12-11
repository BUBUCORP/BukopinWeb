<div class="col-md-10">
<div class="title clearfix">
<h3>Edit Group</h3>
</div>
<div class="content">
<div id="infoMessage"><?php echo $message;?></div>
<div class="row">
  <?php echo form_open(current_url());?>
    <div class="col-md-4">
      <div class="form-group">
            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </div>
      <div class="form-group">
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description);?>
      </div>
    </div>
    <div class="col-md-12">
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

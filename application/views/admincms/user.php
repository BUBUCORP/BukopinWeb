            <div class="col-md-10" style="margin:0!important">
            <div class="title clearfix">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <h3>Management Users</h3>
                </div>
                <div class="col-md-6 col-sm-12 tr">
                  <a class="btn btn-warning"  href="<?php echo base_url('admincms/createuser');?>"> Create User</a>
                  <a class="btn btn-success"  href="<?php echo base_url('admincms/grouplist');?>"> List Group</a>
                  <a class="btn btn-info"  href="<?php echo base_url('admincms/creategroup');?>">  Create Group</a>
                </div>
              </div>
            </div>
                <div class="content">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="DataTable" class="table table-striped" cellpadding="0" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="20">No</th>
                                        <th>Username</th>
                                        <th>Nama pengguna</th>
                                        <th>Email</th>
                                        <th>Group</th>
                                        <th>Status</th>
                                        <th width="100" class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user){?>
                                        <tr>
                                            <td><?php echo $no++ ;?></td>
                                            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                            <td>
                                              <?php foreach ($user->groups as $group):?>
                                                <span class="label label-info"><?php echo anchor("admincms/editgroup/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?></span><br />
                                              <?php endforeach?>
                                            </td>
                                            <td>
                                              <?php if($user->active==1){?>
                                                  <span class="label label-info">
                                                  <?php echo ($user->active) ? anchor("admincms/deactivate/".$user->id, lang('index_active_link')) : anchor("admincms/activate/". $user->id, lang('index_inactive_link'));?>
                                                  </span>
                                              <?php } ?>
                                              <?php if($user->active==0){?>
                                                <span class="label label-warning">
                                                <?php echo ($user->active) ? anchor("admincms/deactivate/".$user->id, lang('index_active_link')) : anchor("admincms/activate/". $user->id, lang('index_inactive_link'));?>
                                                </span>
                                              <?php } ?>
                                            </td>
                                      			<td class="text-center">
                                                <a href="#" data-href="<?php echo base_url("admincms/edituser/".$user->id);?>" data-toggle="modal" data-target="#confirm-edit">
                                                  <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                                </a>
                                                <a href="#" data-href="<?php echo base_url("admincms/deleteuser/".$user->id);?>" data-toggle="modal" data-target="#confirm-delete">
                                                  <span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

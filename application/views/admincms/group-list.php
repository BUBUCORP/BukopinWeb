

            <div class="col-md-10">
            <div class="title clearfix">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <h3>Management Group</h3>
                  </div>
                  <div class="col-md-6 col-sm-12 tr">
                    <a class="btn btn-warning"  href="<?php echo base_url('admincms/createuser');?>"> Create User</a> 
                    <a class="btn btn-info"  href="<?php echo base_url('admincms/creategroup');?>">  Create Group</a>
                  </div>
                </div>
            </div>

                <div class="content">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="DataTable" cellpadding="0" cellspacing="0" width="100%" class="table table-striped">
                                    <thead >
                                        <tr>
                                            <th width="20">No</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th width="100" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    			           <?php foreach($groups as $group){ ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $group['name']; ?></td>
                                            <td><?php echo $group['description']; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>admincms/editgroup/<?php echo $group['id']; ?>">
                                                    <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>admincms/deletegroup/<?php echo $group['id']; ?>">
                                                    <span  class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></span>
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

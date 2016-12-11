

            <div class="col-md-10">
            <div class="title clearfix">
            <div class="row">
            <div class="col-md-6">
                <h3>Menu</h3>
            </div>
              <div class="col-md-6 tr">
                <a href="<?php echo base_url('admincms/createmenu');?>" class="btn btn-info">Create Menu</a>
                </div>      
             </div>             
            </div>

                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                        <?php echo $this->session->flashdata('msg'); ?>
                            <div class="table-responsive">
                                <table id="DataTable" cellpadding="0" cellspacing="0" width="100%" class="table table-striped">
                                    <thead >
                                        <tr>
                                            <th width="20">No</th>
                                            <th>Nama Menu (ID)</th>
                                            <th>Nama Menu (EN)</th>
                                            <th>Parent Menu</th>
                                            <th>Link</th>
                                            <th width="80" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        			           <?php $no=1; foreach($label as $cat){;?>
                                            <tr>
                                                <td><?php echo $no++ ;?></td>
                                                <td><?php echo $cat['ind_name']; ?></td>
                                                <td><?php echo $cat['eng_name']; ?></td>
                                                <td><?php echo $menukey[$cat['parent_menu']]; ?></td>
                                                <td><?php echo $cat['menu_link']; ?></td>                                                
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>admincms/editmenus/<?php echo $cat['id_menu'];?>">
                                                      <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                      </span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>admincms/deletemenu/<?php echo $cat['id_menu'];?>">
                                                      <span  data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                      </span>
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


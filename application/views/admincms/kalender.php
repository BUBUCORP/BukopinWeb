
        <div class="col-md-10" style="margin:0!important">
            <div class="clearfix"></div>
            <div class="title clearfix">
              <div class="row">
                <div class="col-md-6">
                <h3>Kalender</h3>
              </div>
              <div class="col-md-6 tr">
                <a href="<?php echo base_url('admincms/newkalender');?>" class="btn btn-info">Create Post kalender</a>
                </div>
              </div>
            </div>
            <div class="content">
                <?php echo $this->session->flashdata('msg'); ?>
                    <div class="table-responsive">
                        <table id="DataTable" class="table table-striped" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th width="20">No</th>
                                <th>Title</th> 
                                <th>Start Date</th>
                                <th>End Date</th>   
                                <th>color</th>                               
                                <th>URL</th>                                 
                                <th width="100" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;
                            foreach($content as $c){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $c['name']; ?></td>
                                    <td><?php echo $c['start_date']; ?></td>
                                    <td><?php echo $c['end_date']; ?></td>
                                    <td><div style='background:<?php echo $c['color']; ?>;color:#ffffff;'><?php echo $c['color']; ?></div></td>
                                    <td><?php echo $c['url']; ?></td>
                                    <td class="text-center">
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/editkalender/<?php echo $c['id_event']; ?>" data-toggle="modal" data-target="#confirm-edit">
                                            <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/deletekalender/<?php echo $c['id_event']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                          <span data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></span>
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
</section>

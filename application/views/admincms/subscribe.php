

            <div class="col-md-10">
            <div class="title clearfix">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <h3>List Subscribe</h3>
                  </div>
                  <div class="col-md-6 col-sm-12 tr">
                    <a class="btn btn-info"  href="<?php echo base_url('excel/subscribe');?>"><i class="fa fa-save"></i> Save Excel</a>
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
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th width="100" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        			           <?php foreach($subscribe as $l){ ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $l['name']; ?></td>
                                            <td><?php echo $l['email']; ?></td>
                                            <td>
                                                <?php
                                                    if( $l['status']!="N"){
                                                        echo "Berlanggan";
                                                    }else{
                                                        echo "Tidak Berlanggan";
                                                    }
                                                ?>

                                            </td>
                                            <td class="text-center">

                                                <a href="<?php echo base_url(); ?>admincms/editsubscribe/<?php echo $l['id_subscribe']; ?>">
                                                    <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>admincms/deletesubscribe/<?php echo $l['id_subscribe']; ?>">
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

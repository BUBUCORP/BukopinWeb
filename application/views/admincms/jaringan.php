
        <div class="col-md-10" style="margin:0!important">
            <div class="clearfix"></div>
            <div class="title clearfix">
              <div class="row">
                <div class="col-md-6">
                <h3>Jaringan</h3>
              </div>
              <div class="col-md-6 tr">
                <a href="<?php echo base_url('admincms/newjaringan');?>" class="btn btn-info">Create Post Jaringan</a>
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
                                <th>type_jaringan</th>
                                <th>title</th> 
                                <th>alamat</th> 
                                <th>Latitude</th> 
                                <th>Longitude</th> 
                                <th width="100" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;
                            foreach($content as $c){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $c['type_jaringan']; ?></td>
                                    <td><?php echo $c['title']; ?></td>
                                    <td><?php echo $c['alamat']; ?></td>
                                    <td><?php echo $c['lat']; ?></td>
                                    <td><?php echo $c['lng']; ?></td>
                                    <td class="text-center">
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/editjaringan/<?php echo $c['id_jaringan']; ?>" data-toggle="modal" data-target="#confirm-edit">
                                            <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/deletejaringan/<?php echo $c['id_jaringan']; ?>" data-toggle="modal" data-target="#confirm-delete">
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

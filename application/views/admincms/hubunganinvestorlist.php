
        <div class="col-md-10" style="margin:0!important">
            <div class="clearfix"></div>
            <div class="title clearfix">
              <div class="row">
                <div class="col-md-6">
                <h3>Hubungan Investor</h3>
              </div>
              <div class="col-md-6 tr">
                <a href="<?php echo base_url('admincms/hubunganinvestoradd');?>" class="btn btn-info">Create File</a>
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
								<th>Images</th>
                                <th>File</th> 
								<th>Year</th>
								<th>Kategori</th>
                                <th>Status</th> 
                                <th width="100" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;
                            foreach($content as $c){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $c['title']; ?></td>		 
									<td><img width="60" src="<?php echo $c['image'];?>"></td>
                                    <td><?php echo $c['files']; ?></td> 
									<td><?php echo $c['year']; ?></td>									
									<td><?php echo $c['category']; ?></td>
                                      <?php if($c['active'] == "Y"){ ?>
                                          <td><span class="label label-info">AKTIF</span></td>
                                      <?php }else{ ?>
                                          <td><span class="label label-warning">DRAFT</span></td>
                                      <?php } ?>
 
                                    <td class="text-center">
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/hubunganinvestoredit/<?php echo $c['id']; ?>" data-toggle="modal" data-target="#confirm-edit">
                                            <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url(); ?>hubunganinvestor/delete/<?php echo $c['id']; ?>" data-toggle="modal" data-target="#confirm-delete">
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

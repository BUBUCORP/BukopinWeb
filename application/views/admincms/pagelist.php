
        <div class="col-md-10" style="margin:0!important">
            <div class="clearfix"></div>
            <div class="title clearfix">
              <div class="row">
                <div class="col-md-6">
                <h3>Pages</h3>
              </div>
              <div class="col-md-6 tr">
                <a href="<?php echo base_url('admincms/pagestatic');?>" class="btn btn-info">Create Page</a>
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
                                <th width="150">Date</th>
                                <th>Title IN</th>
                                <th>Title EN</th>
                                <th>Status</th>
                                <th width="100" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;
                            foreach($content as $page){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $page['date']; ?></td>
                                    <td><a href="<?php echo base_url('pages');?>/<?php echo $page['id_page'].'-'.$page['seotitle'];?>" target="_blank"><?php echo $page['title']; ?></a></td>
                                    <td><a href="<?php echo base_url('pages');?>/<?php echo $page['id_page'].'-'.$page['seotitle'];?>" target="_blank"><?php echo $page['title_en']; ?></a></td>
                                      <?php if($page['active'] == "Y"){ ?>
                                          <td><span class="label label-info">AKTIF</span></td>
                                      <?php }else{ ?>
                                          <td><span class="label label-warning">DRAFT</span></td>
                                      <?php } ?>
                                    <td class="text-center">
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/pageedit/<?php echo $page['id_page']; ?>" data-toggle="modal" data-target="#confirm-edit">
                                            <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url(); ?>pagestatic/delete/<?php echo $page['id_page']; ?>" data-toggle="modal" data-target="#confirm-delete">
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

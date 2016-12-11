
        <div class="col-md-10" style="margin:0!important">
            <div class="clearfix"></div>
            <div class="title clearfix">
              <div class="row">
                <div class="col-md-6">
                <h3>Posts</h3>
              </div>
              <div class="col-md-6 tr">
                <a href="<?php echo base_url('admincms/post');?>" class="btn btn-info">Create Post</a>
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
                                <th>Tanggal</th>
                                <th>Judul Post</th>
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
                                    <td><?php echo $c['date']; ?></td>
                                    <td><a href="<?php echo base_url('read');?>/<?php echo $c['id_post'].'-'.$c['seotitle'];?>" target="_blank"><?php echo $c['title']; ?></a></td>
                                    <td>
                                      <?php
                                          $catid=$c['category'];
                                          $this->db->select('name');
                                          $this->db->from('post_category');
                                          $this->db->where('id',$catid);
                                          $query = $this->db->get();
                                          foreach ($query->result() as $row)
                                          {
                                              echo $row->name ;
                                          }
                                        ?>
                                    </td>

                                      <?php if($c['active'] == "Y"){ ?>
                                          <td><span class="label label-info">AKTIF</span></td>
                                      <?php }else{ ?>
                                          <td><span class="label label-warning">DRAFT</span></td>
                                      <?php } ?>
 
                                    <td class="text-center">
                                        <a href="#" data-href="<?php echo base_url(); ?>admincms/postedit/<?php echo $c['id_post']; ?>" data-toggle="modal" data-target="#confirm-edit">
                                            <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></span>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url(); ?>post/delete/<?php echo $c['id_post']; ?>" data-toggle="modal" data-target="#confirm-delete">
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



            <div class="col-md-10">
            <div class="title clearfix">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <h3>List Gallery</h3>
                  </div>
                  <div class="col-md-6 col-sm-12 tr">
					<a href="<?php echo base_url('admincms/gallerypost');?>" class="btn btn-info">Add Gallery</a>
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th width="100" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        			           <?php foreach($gallery as $gal){ ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
												<td><img width="60" src="<?php echo site_url('assets/images/gallery/'.$gal['picture']);?>"></td> 
                                                <td><?php echo $gal['name']; ?></td>     
                                                <td>
                                                <?php 
                                                    if($gal['type_gallery']==2){
                                                        echo "Tanggung Jawab Perusahaan";
                                                    }else{
                                                        echo "Gallery";
                                                    }
                                                ?>                                                    
                                                </td> 
												<td class="text-center"> 
                                                    <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>gallery/delete/<?php echo $gal['id_gallery']; ?>">
                                                        <span class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></span>
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

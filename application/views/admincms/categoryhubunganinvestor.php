

            <div class="col-md-10">
            <div class="title clearfix">
                <h3>Kategori Hubungan Investor</h3>
            </div>

                <div class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo $this->session->flashdata('msg'); ?>

                            <form id="category">
                                <input class="hidden" name="id" value="<?php echo $id; ?>" />
                                <input class="hidden" name="status" value="<?php echo $status; ?>" />
                                <label><?php echo $labeltitle ;?></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Kategori">
                                    <span class="input-group-btn">
                                    <button class="btn btn-info submit" type="submit" data-toggle="tooltip" data-placement="top" title="Simpan"><i class="fa fa-save"></i></button>
                                    <?php if($labeltitle!='Tambah kategori'){?>
                                        <button class="btn btn-danger" type="button" onClick="location.href='../category'" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fa fa-remove"></i></button>
                                        </span>
                                    <?php }?>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table id="DataTable" cellpadding="0" cellspacing="0" width="100%" class="table table-striped">
                                    <thead >
                                        <tr>
                                            <th width="20">No</th>
                                            <th>Nama Kategori</th>
                                            <th width="80" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									   <?php $no=1; foreach($label as $cat){;?>
                                            <tr>
                                                <td><?php echo $no++ ;?></td>
                                                <td><?php echo $cat['name']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>admincms/editcategoryhubunganinvestor/<?php echo $cat['id'];?>">
                                                      <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                      </span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>categoryhubinvestor/delete/<?php echo $cat['id'];?>">
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


<script type="text/javascript">
  $(document).ready(function(){
      $('form#category').on('submit', function (e) {
        e.preventDefault();
        $('#loader').show();
         $.ajax({
             url: "<?php echo base_url('categoryhubinvestor/save'); ?>",
             type: "POST",
             data: $('form#category').serialize(),
              success: function(){
                 $('#loader').hide(); 
                 location.reload();
             }
        });
     });
   });
</script>

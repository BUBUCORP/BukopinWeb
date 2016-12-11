<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Slider</h3>
    </div>
    <div class="content">

        <?php echo $this->session->flashdata('msg'); ?>

        <div class="modal fade" id="infonya" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm text-center" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="modal-title">Status</h3>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <br>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onClick="refresh()">TETAP EDIT</button>
                        <a href="<?php echo base_url('admincms/slider'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE LIST</a>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="<?php echo $formaction; ?>" enctype="multipart/form-data">
            <div class="row">
                <input class="hidden" name="id" value="<?php echo $id ?>">                
                <input class="hidden" name="editor" value="<?php echo lang('index_fname_th'); ?>">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <?php
                                    if ($status == "Y") {
                                        echo '<option value="Y">Publish</option>';
                                        echo '<option value="N">Draft</option>';
                                    } else {
                                        echo '<option value="N">Draft</option>';
                                        echo '<option value="Y">Publish</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 
                    </div>

                    <div class="form-group">
                        <label>Image </label>
                        <div class="input-group">
                            <input id="featureimages" type="text" class="form-control" value="<?php echo $image ?>" name="image">
                            <span class="input-group-btn">
                                <a data-fancybox-type="iframe" href="<?php echo base_url(); ?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=1&field_id=featureimages" class="loadfile btn btn-black" type="button">Open Filemanager</a>
                            </span>
                        </div> 
                    </div>			  
                </div> 

                <div class="clearfix"></div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="input-group">
                        <button class="btn btn-blue" type="submit"><i class="fa fa-save"></i> Simpan</button> 
                        <button class="btn btn-black" onclick="window.history.back();">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>
</div>
</section>
<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Hubungan Investor</h3>
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
                        <a href="<?php echo base_url('admincms/hubunganinvestorlist'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE LIST</a>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="<?php echo $formaction; ?>" enctype="multipart/form-data">
            <div class="row">
                <input class="hidden" name="id" value="<?php echo $id_post ?>">
                <input class="hidden" name="status" value="<?php echo $status ?>">
                <input class="hidden" name="editor" value="<?php echo lang('index_fname_th'); ?>">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"/>
                    </div> 
					<div class="form-group">                                 
                           <label>Category</label>     
						  <select name="category" class="form-control">
							<?php foreach($category as $cat){?>
							  <?php if($categorys==$cat['id']){ ?>
								<option value="<?php echo $cat['id'] ?>" selected><?php echo $cat['name'] ?></option>
							  <?php }else{ ?>
								<option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
							  <?php } ?>
							<?php } ?>
						  </select>                                                                          
					</div>
                    <div class="form-group">        
                          <label>Sub Category</label>                                 
                          <select name="subcategory" class="form-control">
                                <?php if($subcategory){ ?>
                                <option value="<?=$subcategory;?>" selected><?=$subcategory;?></option> 
                                <?php } ?>
                                <option value="Tahunan" >Tahunan</option> 
                                <option value="Januari" >Januari</option>  
                                <option value="Februari" >Februari</option>  
                                <option value="Maret" >Maret</option>  
                                <option value="April" >April</option>  
                                <option value="Mei" >Mei</option>                                 
                                <option value="Juni" >Juni</option>  
                                <option value="Juli" >Juli</option>  
                                <option value="Agustus" >Agustus</option>  
                                <option value="September" >September</option>  
                                <option value="Oktober" >Oktober</option>  
                                <option value="November" >November</option>  
                                <option value="Desember" >Desember</option>  
                                <option value="Triwulan I" >Triwulan I</option> 
                                <option value="Triwulan II" >Triwulan II</option>
                                <option value="Triwulan III" >Triwulan III</option>
                                <option value="Triwulan IV" >Triwulan IV</option>
                          </select>                                                                          
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="active" class="form-control">
                                    <?php
                                    if ($active == "Y") {
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
                    <div class="form-group">
                        <label>File</label> 
                        <input type="file" class="form-control" name="files" id="files" value="<?php echo $files; ?>"/>
                    </div> 
                    <div class="form-group">
                        <label>Year</label> 
						<select name="year" class="form-control" required>
							
							<?php
							for($i=2016; $i>=2001; $i-=1){
                                if($i==$year){
                                    echo "<option value=".$i." selected>".$i."</option>";
                                }else{
                                    echo "<option value=".$i.">".$i."</option>";                                    
                                }

							}
							?>
						</select>
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
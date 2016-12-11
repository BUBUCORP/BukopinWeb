<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Product Credit</h3>
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
                      <a href="<?php echo base_url('admincms/postlist'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE POST LIST</a>
                  </div>
              </div>
          </div>
      </div>

        <form method="post" action="<?php echo $formaction;?>" enctype="multipart/form-data">
            <div class="row">
               <input class="hidden" name="id_post" value="<?php echo $id_post?>">
               <input class="hidden" name="status" value="<?php echo $status ?>">
               <input class="hidden" name="editor" value="<?php echo lang('index_fname_th');?>">
                  <div class="col-md-4">
				  
						<div class="form-group">
						  <label>Set Product </label>                                      
						  <select class="form-control" name="menu">
							<option value="promo">PROMO</option>
							<option value="catalog">KATALOG</option>
						  </select>											
						</div> 				  
				  
                        <div class="form-group">
                            <label>Judul</label>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#title_id" aria-controls="title_id" role="tab" data-toggle="tab">Indonesia</a></li>
                              <li role="presentation"><a href="#title_en" aria-controls="title_en" role="tab" data-toggle="tab">English</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="title_id">
                                <input type="text" class="form-control" name="title" value="<?php echo $title;?>"/>
                              </div>
                              <div role="tabpanel" class="tab-pane" id="title_en">
                                <input type="text" class="form-control" name="title_en" value="<?php echo $title_en;?>"/>
                              </div>
                            </div>
                        </div>
						
						 

							
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="active" class="form-control">
                                      <?php if ($active=="Y"){
                                        echo '<option value="Y">Publish</option><option value="N">Draft</option>';
                                      }else {
                                        echo '<option value="N">Draft</option><option value="Y">Publish</option>';
                                      }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="mycategory" class="form-group">
                                  <label>Kategori</label>                                      
                                  <select name="category" class="form-control">
                                    <?php foreach($datacategory as $cat){?>
                                      <?php if($id_cat==$cat['id']){ ?>
                                        <option value="<?php echo $cat['id'] ?>" selected><?php echo $cat['name'] ?></option>
                                      <?php }else{ ?>
                                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>                                                                         
                                </div>
                            </div>
                        </div>
						<div class="form-group">
							<label>Price</label> 
							<input type="text" class="form-control" name="price" value="<?php echo $price;?>"/>
						</div> 
											 
						<div class="form-group">
							<label>Discount</label> 
							<input type="text" class="form-control" name="discount" value="<?php echo $discount;?>"/>
						</div> 
						
                        <div class="form-group">
                            <label>Featured Product <i>Max size : 650x400px</i></label>
                            <div class="input-group">
                            <input id="featureimages" type="text" class="form-control" value="<?php echo $images?>" name="images">
                            <span class="input-group-btn">
                                <a data-fancybox-type="iframe" href="<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=1&field_id=featureimages" class="loadfile btn btn-black" type="button">Open Filemanager</a>
                            </span>
                            </div><!-- /input-group -->
                            <?php if(!empty($header_post)){?>
                                <br>
                                <img width="100%" src="<?php echo $header_post; ?>"/>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Summary</i></label>
                            <div class="input-group">
                            <textarea id="summary" class="form-control"  name="summary" style="height: 200px;width: 350px"></textarea>
                            </div>
                        </div>
                    </div>
				<div class="col-md-8"> 
                    <div class="form-group">
              <label>Kode Produk</label> 
              <input type="text" class="form-control" name="kode" value="<?php echo $kode;?>"/>
            </div> 
                        <div class="form-group">
                          <div><label>Konten</label>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Indonesia</a></li>
                              <li role="presentation"><a href="#content_en" aria-controls="content_en" role="tab" data-toggle="tab">English</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="content">
                                <textarea id="ckeditor" class="form-control" name="content"><?php echo $content?></textarea>
                              </div>
                              <div role="tabpanel" class="tab-pane" id="content_en">
                                <textarea id="ckeditor_en" class="form-control" name="content_en"><?php echo $content_en?></textarea>
                              </div>
                            </div> 
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
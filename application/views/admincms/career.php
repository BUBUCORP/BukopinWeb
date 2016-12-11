<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Career</h3>
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
                      <a href="<?php echo base_url('admincms/careerlist'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE POST LIST</a>
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
                            <label>Judul</label>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#title_id" aria-controls="title_id" role="tab" data-toggle="tab">Indonesia</a></li>
                              <li role="presentation"><a href="#title_en" aria-controls="title_en" role="tab" data-toggle="tab">English</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="title_id">
                                <input type="text" class="form-control" name="title" value="<?php echo $title?>"/>
                              </div>
                              <div role="tabpanel" class="tab-pane" id="title_en">
                                <input type="text" class="form-control" name="title_en" value="<?php echo $title_en?>"/>
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
                        </div> 
                        <div class="form-group">
                            <label>Set meta description</label>
                            <span style="color:red;font-size:10px;"> Maksimal 160 Char</span>
                            <textarea onKeyPress="check_length(this.form)" onKeyDown="check_length(this.form)" maxlength="160" class="form-control" name="meta_description"><?php echo $description?></textarea>
                            <span style="color:#999;">
                                <input value="160" name="text_num" style="width:28px;border:none;color:#999;"> Characters Left
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Set meta keyword</label>
                            <span style="color:red;font-size:10px;"> Minimal 50 Char &amp; Maksimal 160 Char</span>
                            <textarea onKeyPress="check_length(this.form)" onKeyDown="check_length(this.form)" maxlength="160" class="form-control" name="meta_keyword"><?php echo $keyword?></textarea>
                            <span style="color:#999;">
                                <input value="160" name="text_num2" style="width:28px;border:none;color:#999;"> Characters Left
                            </span>
                        </div>
                    </div>
                    <div class="col-md-8"> 
                        <div class="form-group"> 
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
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <button class="btn btn-blue" type="submit"><i class="fa fa-save"></i> Simpan</button>
                            <button class="btn btn-black" onclick="window.history.back();">Cancel</button>
                        </div>
                    </div>
                </div>
          </form>
        </div>
    </div>
</div>
</div>
</section>
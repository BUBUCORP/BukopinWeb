<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Kalender</h3>
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
                      <a href="<?php echo base_url('admincms/kalender'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE POST LIST</a>
                  </div>
              </div>
          </div>
      </div>

        <form method="post" action="<?php echo $formaction;?>" >
            <div class="row">
               <input class="hidden" name="id_event" value="<?php echo $id_event?>">

               <input class="hidden" name="editor" value="<?php echo lang('index_fname_th');?>">
                  <div class="col-md-12">
                        <div class="form-group">
                            <label>Title</label>
                              <div role="tabpanel" class="tab-pane active" id="name">
                                <input type="text" class="form-control" name="name" value="<?php echo $name;?>" >
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Start Date</label>
                                      <div class='input-group date' class="start_date">
                                          <input type="text" class="form-control" name="start_date" id="start_date" value="<?php echo $start_date;?>" >
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar">
                                              </span>
                                          </span>
                                      </div>
                              </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>End Date</label>
                                      <div class='input-group date' class="start_date">
                                        <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo $end_date;?>" >
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar">
                                              </span>
                                          </span>
                                      </div>                                    
                                </div>
                            </div> 
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Color</label>
                                  <input type="text" class="form-control" name="color" value='<?=$color?>' >                            
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
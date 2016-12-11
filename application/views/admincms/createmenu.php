<?php 
$fields = array('id_menu','ind_name','eng_name','menu_link','parent_menu','status');
foreach($fields as $field){
  $EDIT->{$field} = isset($EDIT->{$field}) ? $EDIT->{$field} : '';
}
?>

<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Menu</h3>
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
                      <a href="<?php echo base_url('admincms/menus'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE MENU LIST</a>
                  </div>
              </div>
          </div>
      </div>

        <form method="post" action="<?php echo $formaction?>" enctype="multipart/form-data">
            <div class="row">
               <input class="hidden" name="id_menu" value="<?php echo set_value('id_menu', $EDIT->id_menu); ?>">
              
              
                  <div class="col-md-12">
                        <div class="form-group">
                            <label>Menu Name </label>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#title_id" aria-controls="title_id" role="tab" data-toggle="tab">Indonesia</a></li>
                              <li role="presentation"><a href="#title_en" aria-controls="title_en" role="tab" data-toggle="tab">English</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="title_id">
                                <input type="text" class="form-control" name="ind_name" value="<?php echo set_value('ind_name', $EDIT->ind_name); ?>"/>
                              </div>
                              <div role="tabpanel" class="tab-pane" id="title_en">
                                <input type="text" class="form-control" name="eng_name" value="<?php echo set_value('eng_name', $EDIT->eng_name); ?>"/>
                              </div>
                            </div>
                        </div>
                    </div>                        
                   <div class="col-md-12">                                                    
                        <div class="form-group">
                            <label>Menu Link</label><br>
                            <span style="color:red;font-size:11px;">Contoh penulisan : http://bukopin.co.id/pages/11-tentang-kami</span>
                            <br>
                            <input data-role="text" type="text" class="form-control" name="menu_link" value="<?php echo set_value('menu_link', $EDIT->menu_link); ?>"/>
                        </div>
                  </div>
                   <div class="col-md-12">                                                    
                        <div class="form-group">
                            <label>Menu Parent</label><br>
                              <select name="parent_menu" class="form-control">

                                <?php foreach ($menu as $key => $value) {?>
                                  <?php if ($value['id_menu']==$EDIT->parent_menu){?>
                                    <option value="<?=$value['id_menu']?>" selected ><?=$value['ind_name']?></option>
                                  <?php }else{ ?>
                                    <option value="<?=$value['id_menu']?>" ><?=$value['ind_name']?></option>
                                                                                                  
                                <?php } } ?>
                                <option value="0">NO PARENT</option>
                              </select>
                        </div>
                    </div>
                   <div class="col-md-12">                                                    
                        <div class="form-group">
                            <label>Status</label><br>
                              <select name="status" id="status" class="form-control">  
                                    <?php if($EDIT->status==1){ ?>
                                      <option value="1" selected>Aktif</option>
                                      <option value="2">Nonaktif</option>
                                    <?php } else{ ?>
                                      <option value="2" selected>Nonaktif</option>
                                      <option value="1">Aktif</option>
                                    <?php }?>                             
                                    
                              </select>
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

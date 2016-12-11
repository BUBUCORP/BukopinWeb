<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Jaringan</h3>
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
                      <a href="<?php echo base_url('admincms/jaringan'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE POST LIST</a>
                  </div>
              </div>
          </div>
      </div>

        <form method="post" action="<?php echo $formaction;?>" >
            <div class="row">
               <input class="hidden" name="id_jaringan" value="<?php echo $id_jaringan?>">

               <input class="hidden" name="editor" value="<?php echo lang('index_fname_th');?>">
                  <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                              <div role="tabpanel" class="tab-pane active" id="title">
                                <input type="text" class="form-control" name="title" value="<?php echo $title;?>" >
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type Jaringan</label>
                                    <select name="type_jaringan" class="form-control">
                                      <?php if ($type_jaringan=="ATM"){
                                        echo '<option value="ATM" selected>ATM</option><option value="KANTOR">KANTOR</option><option value="PEMASARAN">PEMASARAN</option>';
                                      }else {
                                        echo '<option value="ATM">ATM</option><option value="KANTOR">KANTOR</option><option value="PEMASARAN">PEMASARAN</option>';
                                      }?>
                                    </select>
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinsi" class="form-control">
                                    <?php foreach ($provinsi as $key => $val) { 
                                      if($val['idprovinsi']==$idprovinsi){?>
                                      <option value="<?=$val['idprovinsi']?>" selected><?=$val['nama_provinsi']?></option>
                                      <?php }else{ ?>                                
                                      <option value="<?=$val['idprovinsi']?>"><?=$val['nama_provinsi']?></option>
                                    <?php } } ?>
                                    </select>
                                </div>
                            </div> 
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <select name="kabupaten" class="form-control">
                                    <?php foreach ($kabupaten as $key => $val) { 
                                      if($val['idkabupaten']==$idkabupaten){?>
                                      <option value="<?=$val['idkabupaten']?>" selected><?=$val['namakabupaten']?></option>
                                      <?php }else{ ?>                                
                                      <option value="<?=$val['idkabupaten']?>"><?=$val['namakabupaten']?></option>
                                    <?php } } ?>                                      
                                    </select>
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>MAPS LINK</label>
                                  <input type="text" class="form-control" name="map" value='<?=$map?>' >                            
                                </div>
                            </div> 
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Latitude</label>
                                  <input type="text" class="form-control"  name="lat" value='<?=$lat?>' >                            
                                </div>
                            </div> 
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Longitude</label>
                                  <input type="text" class="form-control" name="lng" value='<?=$lng?>' >                            
                                </div>
                            </div> 
                        </div> 

                    </div>

                    <div class="col-md-8"> 
                        <div class="form-group"> 
                            <label> Alamat</label>
                            <div role="tabpanel" class="tab-pane active" id="alamat">
                                <textarea id="ckeditor" class="form-control" name="alamat"><?php echo $alamat?></textarea>
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
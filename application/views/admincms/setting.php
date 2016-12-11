         <div class="col-md-10">
            <div class="title clearfix">
                <h4>Setting Website</h4>
            </div>

            <div class="content">
              <?php echo $this->session->flashdata('msg'); ?>
              <div class="row">
                  <form method="post" id="validate" action="<?php echo base_url(); ?>index.php/setting/save">
                  <div class="col-md-4">
                    <div class="form-group">
                    <label>Nama Website:</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $setting[0]['title']; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Owner/author </label>
                      <input type="text"class="form-control"  name="owner" value="<?php echo $setting[0]['owner']; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Email </label>
                      <input type="email" name="email" class="form-control" value="<?php echo $setting[0]['email']; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Phone </label>
                      <input type="text" name="phone" class="form-control" value="<?php echo $setting[0]['phone']; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label>Informasi  </label>
                    <textarea type="text" name="info" class="form-control"><?php echo $setting[0]['info']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Website meta description</label>
                      <span style="color:red;font-size:10px;"> Maksimal 160 Char</span>
                      <textarea maxlength="160" class="form-control" name="description"><?php echo $setting[0]['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Website meta keyword</label>
                      <span style="color:red;font-size:10px;"> Minimal 50 Char &amp; Maksimal 160 Char</span>
                      <textarea maxlength="160" class="form-control" name="keyword"><?php echo $setting[0]['keyword']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Google analytics</label>
                      <span style="color:red;font-size:10px;"></span>
                      <textarea class="form-control" name="analytics"><?php echo $setting[0]['analytics']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Facebook script</label>
                      <span style="color:red;font-size:10px;"></span>
                      <textarea class="form-control" name="fbscript"><?php echo $setting[0]['fbscript']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Twitter script</label>
                      <span style="color:red;font-size:10px;"></span>
                      <textarea class="form-control" name="twscript"><?php echo $setting[0]['twscript']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                    <button class="btn btn-info" type="submit">Simpan</button>
                    <button class="btn btn-success" onclick="window.history.back();">Cancel</button>
                    </div>
                  </div>
              </form>
              </div>
            </div><!-- END CONTENT-->
          </div><!-- END col-md-10-->

        </div>
    </div>
</section>

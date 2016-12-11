            <div class="col-md-10">
                <div class="title clearfix">
                    <h3>List Subscribe</h3>
                </div>
                <div class="content">
                  <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <form method="post" id="validate" action="<?php echo base_url(); ?>subscribe/save">
                                <input type="text" class="form-control hidden" name="id_subscribe" value="<?php echo $id_subscribe; ?>"/>

                               <div class="form-group">
                                    <label>Status Subscibe </label>
                                    <?php if ($status=="Y"){?>
                                        <select name="status" class="form-control">
                                            <option value="Y">YES</option>
                                            <option value="N">NO</option>
                                        </select>
                                    <?php }?>
                                    <?php if ($status=="N"){?>
                                        <select name="status" class="form-control">
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    <?php }?>
                                </div>
                                <div class="form-group">
                                    <label> Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $name; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label> Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $email; ?>" required/>
                                </div>
                                <button class="btn btn-success" type="submit">Simpan</button>
                                <button class="btn btn-info" onclick="window.history.back();">Cancel</button>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>




<!-- JANGAN DI HAPUS DIV DIBAWAH INI -->
</div>
</div>
</section>



                <div class="col-md-10">
                    <div class="title clearfix">
                        <h3>Edit Member</h3>
                    </div>
                    <div class="content">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="col-md-4">
                            <form method="post" id="validate" action="<?php echo base_url(); ?>index.php/admincms/savememberedit">
                                <input type="text" class="form-control hidden" name="id" value="<?php echo $id; ?>"/>
                                <input type="text" class="form-control hidden" name="id_reg" value="<?php echo $id_reg; ?>"/>
                                <div class="form-group">
                                    <label> Username</label>
                                    <input type="text" class="form-control" name="fname" placeholder="username" value="<?php echo $name; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label> Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $email; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label> Password</label>
                                    <input type="password" class="form-control" name="password" value="" placeholder="password"/>
                                </div>
                                <button class="btn btn-blue" type="submit">Simpan</button>
                                <button class="btn btn-black" onclick="window.history.back();">Cancel</button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

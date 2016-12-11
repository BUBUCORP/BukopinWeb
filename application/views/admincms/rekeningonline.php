

            <div class="col-md-10">
            <div class="title clearfix">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <h3>List Pembukaan Rekening Online</h3>
                  </div>
                  <div class="col-md-6 col-sm-12 tr">
                    <a class="btn btn-info"  href="<?php echo base_url('excel/pembukaanrekening');?>"><i class="fa fa-save"></i> Save Excel</a>
                  </div>
                </div>
            </div>

                <div class="content">
                  <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="DataTable" cellpadding="0" cellspacing="0" width="100%" class="table table-striped">
                                    <thead >
                                        <tr>
                                            <th width="20">No</th>
                                            <th>No Tiket</th>
                                            <th>Nama</th>
                                            <th>Handphone</th>
                                            <th>Email</th>                                            
                                            <th width="300">Alamat</th>
                                            <th width="100" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        			           <?php foreach($contact as $l){ ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $l['no_tiket_rek']; ?></td>
                                                <td><?php echo $l['nama_lengkap']; ?></td>
                                                <td><?php echo $l['handphone']; ?></td>
                                                <td><?php echo $l['email']; ?></td>                                                
                                                <td><?php echo $l['alamat_rmh']; ?></td>
                                                
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>admincms/viewrekonline/<?php echo $l['id_data']; ?>">
                                                        <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"class="btn btn-info"  data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-search"></i></span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>admincms/deleterekonline/<?php echo $l['id_data']; ?>">
                                                        <span class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></span>
                                                    </a>
                                                </td>
                                            </tr>
                        			             <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



            <div class="col-md-10">
            <div class="title clearfix">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                      <h3>List Contact</h3>
                  </div>
                  <div class="col-md-6 col-sm-12 tr">
                    <a class="btn btn-info"  href="<?php echo base_url('excel/contact');?>"><i class="fa fa-save"></i> Save Excel</a>
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
                                            <th>Topik</th>
                                             <th>produk</th>
                                            <th>Nama</th>
                                            <th>email</th>                                            
                                            <th width="300">Masalah</th>
                                            <th width="100" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        			           <?php foreach($contact as $l){ ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $l['no_tiket']; ?></td>
                                                <td><?php echo $l['topik']; ?></td>
                                                <td><?php echo $l['produk']; ?></td>
                                                <td><?php echo $l['nama_lengkap']; ?></td>
                                                <td><?php echo $l['email']; ?></td>                                                
                                                <td><?php echo $l['jenis_masalah']; ?></td>
                                                
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>admincms/viewcontact/<?php echo $l['id_contact']; ?>">
                                                        <span class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"class="btn btn-info"  data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-search"></i></span>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#confirm-delete" data-href="<?php echo base_url(); ?>contact/delete/<?php echo $l['id_contact']; ?>">
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

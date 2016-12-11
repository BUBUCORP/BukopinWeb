            <div class="col-md-10" style="margin:0!important">
            <div class="title clearfix">
                <button class="btn btn-info" data-toggle="modal" data-target="#edituser" style="float:right"><i class="fa fa-plus"></i> Tambah Baru</button>
                <h3>Management Member</h3>
            </div>
                <div class="content">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="DataTable" class="table table-striped" cellpadding="0" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="20">No</th>
                                        <th>Date Reg</th>
                                        <th>ID Reg</th>
                                        <th>Nama Manager</th>
                                        <th>Email</th>
                                        <th width="100" class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($user as $u){?>
                                        <tr>
                                            <td><?php echo $no++ ;?></td>
                                            <td><?php echo $u['date_reg']; ?></td>
                                            <td><?php echo $u['id_reg']; ?></td>
                                            <td><?php echo $u['fname']; ?></td>
                                            <td><?php echo $u['email']; ?></td>
                                            <td class="text-center">
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url(); ?>index.php/admincms/editmember/<?php echo $u['id']; ?>" onclick="return confirm('Edit data ini ?');" class="btn btn-info">
                                                    <div class="icon"><i class="fa fa-edit"></i></div>
                                                </a>
                                                <a  data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo base_url(); ?>index.php/admincms/deletemember/<?php echo $u['id']; ?>" onclick="return confirm('yakin hapus data ini ?');" class="btn btn-danger">
                                                    <div class="icon"><i class="fa fa-trash"></i></div>
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


<!-- Modal -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <form method="post" id="validate" action="<?php echo base_url(); ?>index.php/admincms/saveuser">
      <div class="modal-body">
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control" required>
                    <option value=""></option>
                    <option value="1">Admin</option>
                    <option value="2">Member</option>
                </select>
            </div>

            <div class="form-group">
                <label> Nama Pengguna</label>
                <input type="text" class="form-control" name="fullname" placeholder="nama lengkap" required/>
            </div>
            <div class="form-group">
                <label> Username</label>
                <input type="text" class="form-control" name="username" placeholder="username" required/>
            </div>
            <div class="form-group">
                <label> Email</label>
                <input type="email" class="form-control" name="email" placeholder="email" required/>
            </div>
            <div class="form-group">
                <label> Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" required/>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-blue" data-dismiss="modal">Close</button>
        <button type="submits" class="btn btn-black">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

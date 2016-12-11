
                
                <div class="col-md-10">
                    <div class="title clearfix">
                        <h3>Read Contact</h3>
                    </div>
                    <div class="content">
                    <?php foreach ($contact as $key => $val) {?>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>: <?php echo $val['tanggal']; ?></td>
                                    </tr>                                
                                    <tr>
                                        <td>No Tiket</td>
                                        <td>: <?php echo $val['no_tiket']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>: <?php echo $val['cat_contact']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?php echo $val['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No_identitas</td>
                                        <td>: <?php echo $val['no_identitas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>no_identitas</td>
                                        <td>: <?php echo $val['no_identitas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>: <?php echo $val['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>phone</td>
                                        <td>: <?php echo $val['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>alamat</td>
                                        <td>: <?php echo $val['alamat']; ?></td>
                                    </tr>  
                                    <tr>
                                        <td>subject</td>
                                        <td>: <?php echo $val['subject']; ?></td>
                                    </tr> 
                                    <tr>
                                        <td>Topik</td>
                                        <td>: <?php echo $val['topik']; ?></td>
                                    </tr>                                     
                                    <tr>
                                        <td>jenis_masalah</td>
                                        <td>: <?php echo $val['jenis_masalah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>pesan</td>
                                        <td>: <?php echo $val['pesan']; ?></td>
                                    </tr>                                       
                                </tbody>
                            </table>
                    <?php }?>
                          <button class="btn btn-info" onclick="window.history.back();">BACK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

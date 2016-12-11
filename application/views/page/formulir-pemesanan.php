<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>
<!-- content page -->
<div class="wrap-content-page2">
<div class="container">
<div class="content-page2">
<div class="row">
<link rel="stylesheet" href="<?php echo base_url('assets/js/datepicker/css/bootstrap-datepicker.min.css');?>">
<script src="<?php echo base_url('assets/js/datepicker/js/bootstrap-datepicker.min.js');?>"></script>
        <!-- content page -->
        <div class="col-md-8 col-md-push-4">
          <div class="content-page-in">
            <!-- c blok 1 -->
            <div class="c-block-1 post-content">
              <div class="c-block-1-title">
                <h2>Formulir Pemesanan </h2>
              </div>
              <p class="light">Syarat dan Ketentuan :</p>
1. Semua pemesanan sudah harus kami terima sebelum tanggal yang ditentukan. Khusus pemesanan melalui fax atau surat akan kami proses apabila dilengkapi
    fotocopy Kartu Kredit. Bila Anda tidak melampirkan dan kami tidak berhasil menghubungi Anda, maka pemesanan kami batalkan.
2. Untuk pengiriman area Jakarta tidak dikenakan ongkos kirim, sedangkan untuk luar Jakarta dikenakan ongkos kirim.
3. Pengiriman tdiak dilakukan ke alamat kotak pos.
4. Bila pemesanan Anda disetujui dan persediaan barang masih Ada, Maka pengriman akan memerlukan waktu 2 minggu untuk wilayah Jakarta 3 minggu untuk
    luar Jakarta sejak tanggal pemesanan disetujui.
5. Pastikan ketersedian limit yang cukup sebesar total harga barang yang dipesan.
6. Barang yang sudah dipesan tidak dapat dibatalkan.
7. Apabila Anda tidak memilih jenis pembayaran, pemesanan akan diproses dengan harga pembayaran penuh.
8. Pembayaran penuh berakhirnya masa angsuran (pre-terminate) akan dikenakan biaya penalty sebesar Rp 250.000,-
9. Bukopin Card Center bukan sebagai pihak pemberi GARANSI atas produk dalam brosur ini. Segala keluhan atas keluhan atas kualitas barang yang telah dibeli
    dengan menggunakan Cicilan Seru 0% harus ditujukan kepada pihak pemasok barang dalam waktu 2x24 jam. Keluhan tersebut tidak akan mengubah maupun
    mempengaruhi kewajiban Anda untuk melanjutkan pembayaran angusran kepada kami. Bukopin Card Center adalah sebagai fasilitor untuk mempermudah
    penggunaan jasa Katalog Seru.
10.Penagihan melalui tagihan bulanan Kartu Kredit Bukopin akan dilakukan setelah Anda menerima barang.
11.Apabila penerima barang bukan pemegang Kartu Kredit, maka harus dilampirkan surat kuasa, nama jelas tanda tangan & nomor kartu pengenal (KTP/
    Kartu pegawai) pada tanda terima.
12.Bukopin Card Center tidak dapat mengeluarkan kwitansi atas pembelian barang tersebut.
13.Harga sewaktu - waktu dapat berubah. Untuk informasi lebih lanjut hubungi 14005.


                <form class="form-horizontal" action="" method="POST">
                    <input type="hidden" name="id_post" value="<?=$content['id_post']?>">
                    <input type="hidden" name="images" value="<?=$content['images']?>">
                    <input type="hidden" name="title" value="<?=$content['title']?>">
                    <input type="hidden" name="price" value="<?=$content['price']?>">
                    <input type="hidden" name="discount" value="<?=$content['discount']?>">                 
                    <input type="hidden" name="kode" value="<?=$content['kode']?>">
                    <div class="form-group">
                    <label for="full_name" class="col-sm-3 control-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                    <input type="text" name="full_name" class="form-control" id="full_name" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="birthdate" class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-9">                        
                    <div class="input-group date" data-provide="datepicker">
                    <input type="text" name="birthdate" class="form-control" id="birthdate" required>
                    <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="phone_cell" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="phone_cell" class="col-sm-3 control-label">Nomor HP</label>
                    <div class="col-sm-9">
                    <input type="text" name="phone_cell" class="form-control" id="phone_cell" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                    <input type="text" name="phone" class="form-control" id="phone" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="sex" class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <label class="radio-inline">
                    <input type="radio" name="sex" id="sex" value="male"> Pria
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="sex" id="sex" value="female"> Wanita
                    </label>
                    </div>
                    </div>
                        <p class="light">
                              <i class="text-success">*Semua kolom wajib diisi</i>
                        </p>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="agree" value="agree"> Saya telah membaca dan menyetujui syarat & ketentuan pengajuan serta syarat & ketentuan program Kartu Kredit Bukopin.
                        </label>
                        <div class="form-group text-center" style="margin-top: 50px;">
                      <button type="submit" name="button" class="btn" style="font-size: 15px; background-color: #0f9f0f; color: white; border-radius: 0; padding: 7px 46px;">Kirim</button>
                    </div>
              </form>
            </div>
          </div>
        </div> 
  <!-- end content page -->
  <script type="text/javascript">
      $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '-10y'
      });

  </script>
<?php echo $sidebar; ?>
</div>
</div>
</div>
</div>
<?php echo $footer;?>
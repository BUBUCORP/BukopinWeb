<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>
<!-- content page -->
<div class="wrap-content-page2">
<div class="container">
<div class="content-page2">
<div class="row">
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/js/datepicker/css/bootstrap-datepicker.min.css');?>">
<script src="<?php echo base_url('assets/js/datepicker/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.mask.min.js');?>"></script>
 -->
        <!-- content page -->
        <div class="col-md-8 col-md-push-4">
          <div class="content-page-in">
            <!-- c blok 1 -->
            <div class="c-block-1 post-content">
              <div class="c-block-1-title">
                <h2>Form Pemesanan</h2>
              </div>
<div class="col-md-12">

</div>
<div class="col-md-12" >

<form class="form-horizontal" action="<?php echo site_url('page/prosespesanan');?>" name="formpesanan" id="formpesanan" method="POST">
<input type="hidden" name="price" id="price" value="<?=$content['price'];?>">
<input type="hidden" name="kd_brg" id="kd_brg" value="<?=$content['kode'];?>">
<input type="hidden" name="title" id="title" value="<?=$content['title'];?>">
<table> 
<table class="table table-striped primary  ">
<thead>
<tr>
<th  style="text-align: center; width: 40%">Nama Barang</th>
<th  style="text-align: center;">Jumlah</th>
<th  style="text-align: center;">Harga</th>
<th  style="text-align: center;">Jumlah Pembayaran<br><small>(per bulan)</small></th>
</tr>
</thead>
<tbody>
<tr>
    <td  style="text-align: center;"><strong><?=$content['title'].' - '.$content['kode'];?></strong></td>
    <td  style="text-align: center;">
    <input type="number" class="form-control" style="width: 50px;" name="jumlah" id="jumlah" value="1">
    </td>
    <td  style="text-align: left;">
    <input type="radio" name="cicilan" value="0" checked> Harga Penuh <br>
    <input type="radio" name="cicilan" value="3" > 3x Cicilan  <br>
    <input type="radio" name="cicilan" value="6" > 6x Cicilan<br>
    <input type="radio" name="cicilan" value="12" > 12x Cicilan  <br>

    </td>
    <td  style="text-align: center;">
    <strong><div id="harganya">Rp. <?=number_format($content['price'],0,",",".")?></div></strong>
    </td>
</tr>
<tr>
    <td colspan="4">
    Mohon tagih jumlah keseluruhan diatas ke no Bukopin kartu kredit saya :<br>
    <small style="color: red;">*harus diisi</small>
    </td>
</tr>
<tr>
    <td colspan="4">
    <div class="form-group">
        <label for="full_name" class="col-sm-4 control-label">No Kartu Kredit*</label>
        <div class="col-sm-8">
        <input type="text" name="ccno1" title="Masukan 4 digit pertama nomor kartu kredit" pattern="[0-9]{4}" maxlength="4" placeholder="____" class="form-control" style="display: inline-block;max-width: 70px;text-align: center;"  id="ccno1" required>
        <input type="text" name="ccno2" title="Masukan 4 digit kedua nomor kartu kredit" pattern="[0-9]{4}" maxlength="4" placeholder="____" class="form-control" style="display: inline-block;max-width: 70px;text-align: center;"  id="ccno2" required>
        <input type="text" name="ccno3" title="Masukan 4 digit ketiga nomor kartu kredit" pattern="[0-9]{4}" maxlength="4" placeholder="____" class="form-control" style="display: inline-block;max-width: 70px;text-align: center;"  id="ccno3" required>
        <input type="text" name="ccno4" title="Masukan 4 digit keempat nomor kartu kredit" pattern="[0-9]{4}" maxlength="4" placeholder="____" class="form-control" style="display: inline-block;max-width: 70px;text-align: center;"  id="ccno4" required>
        </div>
    </div>   
    <div class="form-group">
        <label for="phone_cell" class="col-sm-4 control-label">Masa Berlaku*</label>
        <div class="col-sm-8">
            <input type="text" pattern="(?:0[1-9]|1[0-2])" title="Masukan 2 digit bulan masa berlaku kartu kredit" maxlength="2" placeholder="MM" style="display: inline-block;max-width: 60px;text-align: center;" name="berlakumm" class="form-control" id="berlakumm" required> - 
            <input type="text" pattern="[0-9]{4}" maxlength="4" title="Masukan 4 digit tahun masa berlaku kartu kredit" placeholder="YYYY" style="display: inline-block;max-width: 80px;text-align: center;" name="berlakuyy" class="form-control" id="berlakuyy" required> <small>(mm-yyyy)</small>
        </div>
    </div>
    <div class="form-group">
        <label for="full_name" class="col-sm-4 control-label">Nama Pemegang Kartu*</label>
        <div class="col-sm-8">
            <input type="text"  maxlength="50" name="full_name" title="Masukan nama pemegang kartu kredit" class="form-control" id="full_name" required>
        </div>
    </div>

    <div class="form-group">
        <label for="phone_cell" class="col-sm-4 control-label">Email*</label>
        <div class="col-sm-8">
            <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  class="form-control" id="email" required>
        </div>
    </div>

    <div class="form-group">
        <label for="alamat" class="col-sm-4 control-label">Alamat Pengiriman*</label>
        <div class="col-sm-8">
            <textarea  name="alamat" title="Masukan alamat pengiriman barang" class="form-control" id="alamat" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="kota" class="col-sm-4 control-label">Kota*</label>
        <div class="col-sm-8">
            <input type="text" name="kota" class="form-control" id="kota" required>
        </div>
    </div>

    <div class="form-group">
        <label for="kota" class="col-sm-4 control-label">Kode Pos*</label>
        <div class="col-sm-8">
            <input type="text" maxlength="4"  pattern="[0-9]{4}" style="display: inline-block;max-width: 80px;text-align: center;" name="kodepos" class="form-control" id="kodepos" required>
        </div>
    </div>
    <div class="form-group">
        <label for="phone_cell" class="col-sm-4 control-label">Telepon Rumah*</label>
        <div class="col-sm-8">
            <input type="text"  name="phone_home" class="form-control" id="phone_home" required>
        </div>
    </div>
    <div class="form-group">
        <label for="phone_cell" class="col-sm-4 control-label">Telepon Kantor*</label>
        <div class="col-sm-8">
            <input type="text" name="phone_office" class="form-control" id="phone_office" required>
        </div>
    </div>
    <div class="form-group">
        <label for="phone_cell" class="col-sm-4 control-label">Handphone*</label>
        <div class="col-sm-8">
            <input type="text"  name="phone_mobile" class="form-control" id="phone_mobile" required>
        </div>
    </div>        
    <div class="form-group">
        <label for="alamat" class="col-sm-4 control-label">Informasi Lainnya</label>
        <div class="col-sm-8">
            <textarea  name="info_lain" class="form-control" id="info_lain" required></textarea>
        </div>
    </div>  
    <div class="form-group">
    <label for="captcha" class="col-sm-4 control-label"></label>
    
        <div class="col-sm-8"><?php echo $captcha['image']; ?><br>
        <input type="text" autocomplete="off" name="userCaptcha" id="userCaptcha" placeholder="Enter number" required/>   
        <input type="hidden" name="hiddencaptcha" id="hiddencaptcha" value="<?=$this->session->userdata('captchaWord');?>">     
        </div>
    </div>    

    <div class="form-group">
        <div class="bt-next-popup-syaket text-right" style="margin-right: 20px!important" >
        <button id="submitbtn" type="submit" class="nav-next-rek" >Pesan</button>
        </div>

    </div>  

    </td>
</tr>
</tbody>
</table>

</form>
</div>
            </div>
          </div>
        </div> 
  <!-- end content page -->
  <script type="text/javascript">
    $("#jumlah").on('change', function() {
       var cicilan = $('input[name=cicilan]:checked', '#formpesanan').val();
       var harga =  $("#price").val();
       var jumlah = $("#jumlah").val();
       var hargacicil;
       $("#harganya").empty();
       if(cicilan!=0){
        hargacicil = (harga*jumlah)/cicilan;    
       }else{
        hargacicil = Number(harga*jumlah);
       }
       var n = 'Rp. ' + hargacicil.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); 
       //var hasil = '$' + hargacicil.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
       //console.log(n);
       $("#harganya").append(n);
    });
    $('#formpesanan input[name=cicilan]').on('change', function() {
       var cicilan = $('input[name=cicilan]:checked', '#formpesanan').val();
       var harga =  $("#price").val();
       var jumlah = $("#jumlah").val();
       var hargacicil;
       $("#harganya").empty();
       if(cicilan!=0){
        hargacicil = (harga*jumlah)/cicilan;    
       }else{
        hargacicil = Number(harga*jumlah);
       }
       var n = 'Rp. ' + hargacicil.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); 
       //var hasil = '$' + hargacicil.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
       //console.log(n);
       $("#harganya").append(n);

    });
$(document).ready(function() {
    $("#formpesanan").submit(function(e) {
        
        var cp = $("#hiddencaptcha").val();
        var up = $("#userCaptcha").val();
        if(cp==up){
            $("#formpesanan").submit();
            return true;
        }else{
            e.preventDefault();
            alert("captcha salah");
            $("#userCaptcha").focus();
            return false;
        }
    });
});
  </script>
<?php echo $sidebar; ?>
</div>
</div>
</div>
</div>
<?php echo $footer;?>
<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>
<!-- content page -->
<div class="wrap-content-page2">
<div class="container">
<div class="content-page2">
<div class="row">
				<!-- content page -->
				<div class="col-md-8 col-md-push-4">
					<div class="content-page-in">
						<!-- c blok 1 -->
						<div class="c-block-1 post-content text-justify">
							<div class="c-block-1-title">
								<h2>Pembukaan Rekening Online</h2>
							</div>
							<div id="infobukarekening">	
							Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.
							<br><br>
							<div class="c-block-1-img" style="position:relative">
								<button id="showform" class="buka_rek">Buka Rekening Online</button>
								<img width="100%" src="<?php echo base_url('assets/images/buka-rekening-online.jpg');?>">
							</div>
							</div>



<div class="row form_rek_online">
<!-- FORM 1-->
<div id="FORM1">
<div class="col-md-12 mb15"><span style="font-weight:bold;font-size:18px;">Data Pribadi</span></div>
<div class="col-md-6">
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input class="form-control" required/>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Nama Panggilan</label>
		<input class="form-control" required/>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control">
			<option value="">-Pilih-</option>
			<option value="">Laki-laki</option>
			<option value="">Perempuan</option>
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Gelar Depan</label>
		<select class="form-control">
			<option value="">-Pilih-</option> 
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Gelar Belakang</label>
		<select class="form-control">
			<option value="">-Pilih-</option> 
		</select>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Tempat Lahir</label>
		<input class="form-control" required/>
	</div>
</div>
<div class="col-md-2">
	<div class="form-group">
		<label>Tanggal</label>
		<select class="form-control">
			<?php
			for($a=1; $a<=31; $a+=1){
				echo "<option value=".$a.">".$a."</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Bulan</label>
		<select class="form-control">
			<?php
			$bulan=array(
				'01'=>"Januari",
				'02'=>"Februari",
				'03'=>"Maret",
				'04'=>"April",
				'05'=>"Mei",
				'06'=>"Juni",
				'07'=>"Juli",
				'08'=>"Agustus",
				'09'=>"September",
				'10'=>"Oktober",
				'11'=>"November",
				'12'=>"Desember"
			);
			$jlh_bln=count($bulan);
			foreach ($bulan as $key => $value) {
				echo "<option value=".$key.">".$value."</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="col-md-2">
	<div class="form-group">
		<label>Tahun</label>
		<select class="form-control">
                    <?php
                    for($i=2016; $i>=2000; $i-=1){
                        echo "<option value=".$i.">".$i."</option>";
                    }
                    ?>
		</select>
	</div>
</div>
<div class="col-md-2">
	<div class="form-group">
		<label>Usia</label>
		<input class="form-control" required/>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Kewarganegaraan</label>
		<input class="form-control" required/>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Jenis Identitas</label>
		<select class="form-control" require>
			<option>KTP</option>
			<option>SIM</option>
			<option>NIS</option>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>No. Identitas</label>
		<input class="form-control" required/>
	</div>
</div>

<div class="col-md-3"><div class="form-group">Berlaku Sampai</div></div>
<div class="col-md-2">
	<div class="form-group">
		<label>Tanggal</label>
		<select class="form-control">
			<?php
			for($a=1; $a<=31; $a+=1){
				echo "<option value=".$a.">".$a."</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label>Bulan</label>
		<select class="form-control">
			<?php
			$bulan=array(
				'01'=>"Januari",
				'02'=>"Februari",
				'03'=>"Maret",
				'04'=>"April",
				'05'=>"Mei",
				'06'=>"Juni",
				'07'=>"Juli",
				'08'=>"Agustus",
				'09'=>"September",
				'10'=>"Oktober",
				'11'=>"November",
				'12'=>"Desember"
			);
			$jlh_bln=count($bulan);
			foreach ($bulan as $key => $value) {
				echo "<option value=".$key.">".$value."</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="col-md-2">
	<div class="form-group">
		<label>Tahun</label>
		<select class="form-control">
                    <?php
                    for($i=2016; $i>=2000; $i-=1){
                        echo "<option value=".$i.">".$i."</option>";
                    }
                    ?>
		</select>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-md-12">
	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
</div>

<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="No Ijin Tinggal"/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="No Pajak Asing"/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="No Jaminan Sosial"/>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group"> 
		<select class="form-control" required>
			<option>Agama</option>
			<option>Islam</option>
			<option>Kristen</option>
			<option>Hindu</option>
			<option>Budha</option> 
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group"> 
		<select class="form-control" required>
			<option>Status Pernikahan</option>	
			<option>Menikah</option>
			<option>Duda</option> 
			<option>Janda</option> 
			<option>Belum Menikah</option> 
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group"> 
		<select class="form-control" required>
			<option>Jumlah Anak</option>	
			<?php
			for($a=1; $a<=10; $a+=1){
				echo "<option value=".$a.">".$a."</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group"> 
		<select class="form-control" required>
			<option>Pendidikan</option>	
			<option>Sarjana</option>
			<option>Diploma</option>
			<option>SMA</option> 
			<option>SMP</option> 
			<option>SD</option> 
		</select>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="Nama Ibu Kandung"/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="Telepon"/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="Fax"/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="Handphone"/>
	</div>
</div>
<div class="col-md-4">
	<div class="form-group"> 
		<input class="form-control" required placeholder="Email"/>
	</div>
</div>
</div>
</div>















							
						</div>
					</div>
				</div>

 <?php echo $sidebar; ?>	
</div>
</div>
</div>
</div>
 <?php echo $footer;?>

 
 <script>
$(document).ready(function(){
	$("#FORM1").hide();
	$("#FORM2").hide();
	$("#FORM3").hide();
	$("#FORM4").hide();
	$("#FORM5").hide();	
    $("#showform").click(function(){
		$("#infobukarekening").hide();
        $("#FORM1").slideToggle();
    }); 
});
</script>
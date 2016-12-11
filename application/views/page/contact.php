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
						<div class="c-block-1">
							<div class="c-block-1-img"></div>
						</div>
						<!-- c blok 1 -->
						<div class="c-block-1 post-content">
							<div class="c-block-1-title">
								<h2>Hubungi Kami</h2>
							</div>
							<div class="row">
								<div class="col-sm-6 mb15">
									<strong>Alamat Kantor Pusat Bank Bukopin :</strong>
									<br />
									Gedung Bank Bukopin
									<br />
									Jl. MT. Haryono Kav. 50-51
									<br />
									Jakarta 12770
									<br />
									<strong>Telp.</strong> +6221 798 8266, 798 9837
									<br />
									<strong>Fax.</strong> +6221 798 0625, 798 0238, 798 0244
									<br />
									<strong>Telex.</strong> 62487, 66087
									<br />
									<strong>SWIFT :</strong> BBUKIDJA
								</div>
								<div class="col-sm-6">
									<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126916.79288279767!2d106.77981670290684!3d-6.2439836714765855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e69f3a7b8491ead%3A0xf3823b907b126744!2sGedung+Bukopin%2C+Jl.+Letjen+M.T.+Haryono+No.51%2C+Cawang%2C+Kramatjati%2C+East+Jakarta+City%2C+Special+Capital+Region+of+Jakarta+13630%2C+Indonesia!3m2!1d-6.2439883!2d106.8498573!5e0!3m2!1sid!2s!4v1474649397167" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
							<p>&nbsp;
								<br />
								<img class="img-responsive" src="<?php echo base_url('assets/img/banner_hubungikami.jpg');?>" alt=""/>
								<br />
								Jika anda mempunyai pertanyaan mengenai produk dan layanan Bank Bukopin atau ingin menyampaikan informasi, saran, pengalaman, ataupun keluhan yang dapat memperbaiki kinerja kami, silahkan menghubungi layanan kami dibawah ini:
							</p>
							<ol>
								<li>Informasi korporasi selain layanan produk dan jasa silahkan hubungi <i>corporate secretary</i> atau e-mail:
									<a href="mailto:corsec@bukopin.co.id">corsec@bukopin.co.id</a>
								</li>
								<li>Sesuai Peraturan Bank Indonesia Nomor 7/7/PBI/2005 tentang penyelesaian pengaduan nasabah, setiap pengaduan mohon dilengkapi dengan <i>foto copy</i> identitas dan dokumen pendukung lainnya.</li>
								<li>Jangan pernah menulis <i>user id</i> dan PIN pada saat menyampaikan informasi, saran, atau keluhan Bank Bukopin tidak akan pernah menanyakan <i>user id</i> dan PIN dalam kondisi apapun.</li>
								<li>Informasi serta keluhan nasabah atas layanan produk dan jasa (termasuk jaringan kantor dan ATM) silahkan hubungi Halo Bukopin di nomor 14005 atau klik
									<a href="#" data-toggle="modal" data-target="#contactus">
									<em>di sini</em>
									</a>*
								</li>
							</ol>
							<p>
								<strong>Perhatian</strong>
							</p>
							<ul>
								<li>Setiap Formulir yang telah diisi akan terkirim dengan menekan tombol kirim dan akan diberikan nomor tiket ID.</li>
								<li>Mohon data diisi dengan sebenar-benarnya dan pastikan alamat email telah sesuai dan benar</li>
								<li>Lampirkan bukti-bukti pendukung yang diperlukan dalam pengaduan dengan menggunakan fasilitas attachment.</li>
								<li>Data yang telah diisi akan kami jaga kerahasiannya.</li>
							</ul>
							<p>Kami akan sangat berterima kasih apabila anda dapat mencantumkan data pada formulir terlampir dengan jelas dan lengkap agar memudahkan kami untuk menanggapi dan memproses pengajuan yang kami terima.
								<br />
								Hanya yang melengkapi data dengan lengkap dan jelas sesuai formulir terlampir di atas yang akan kami layani.
							</p>
							<p>
								<em>Ket:*Dengan klik &#8220;di sini&#8221;, akan terbuka form isian pengaduan/permohonan nasabah</em>
							</p>
						</div>
					</div>
				</div>
				<?php echo $sidebar; ?>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index:9999!important">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header text-center" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kirim Keluhan / Saran / Informasi</h4>
      </div>
      <div class="modal-body form-field">
        <div class="row" id="resultdiv">
			<form action="<?=$actionform?>" method="post" id="hubungikami">
			<div class="col-md-4">Kategori</div>
			<div class="col-md-5"> 
					<select name="cat_contact">
						<option value="">Select</option>
						<option value="nasabah">Nasabah</option>
						<option value="non nasabah">Non Nasabah</option>
						
					</select> 
			</div>
			<div class="clearfix"></div>
			<div class="col-md-4">Nama Lengkap</div>
			<div class="col-md-8">
				<input name="nama_lengkap" type="text" placeholder="(KTP/SIM/Pasport)" required> 
			</div>
			<div class="col-md-4">No. Identitas</div>
			<div class="col-md-8">
				<input name="no_identitas" type="text" placeholder="(No Rekening/No Kartu Debet/No Kartu Kredit)" required> 
			</div>
			<div class="col-md-4">No. Identitas di Bank</div>
			<div class="col-md-8">
				<input name="no_identitas_bank" type="text" placeholder="(No Rekening/No Kartu Debet/No Kartu Kredit)" required> 
			</div>		
			<div class="col-md-4">Alamat</div>
			<div class="col-md-8">
				<textarea name="alamat" required></textarea>
			</div>	
			<div class="col-md-4">No. Telepon/Ponsel</div>
			<div class="col-md-8">
				<input name="phone" type="text" required> 
			</div>	
			<div class="col-md-4">Alamat Email</div>
			<div class="col-md-8">
				<input name="email" type="email" required> 
			</div>
			<div class="col-md-4">Topik</div>
			<div class="col-md-5"> 
					<select name="topik">
						<option value="">Select</option>
						<option value="Keluhan">Keluhan</option>
						<option value="Saran">Saran</option>
						<option value="Informasi">Informasi</option>
					</select> 
			</div>
			<div class="clearfix"></div>
			<div class="col-md-4">Produk</div>
			<div class="col-md-5"> 
					<select name="produk" id="produk">
						<option value="">Pilih Produk</option>
						<option value="Giro">Giro</option>
						<option value="Tabungan">Tabungan</option>
						<option value="Deposito">Deposito</option>
						<option value="Kredit">Kredit</option>
						<option value="Kartu Debit">ATM/Kartu Debit</option>
						<option value="Kartu Kredit">Kartu Kredit</option>
						<option value="Internet Banking">Internet Banking</option>
						<option value="SMS Banking">SMS Banking</option>
						<option value="Phone Banking">Phone Banking</option>
						<option value="Bancassurance AIA">Bancassurance AIA</option>																																				
					</select> 
			</div>
			<div class="clearfix"></div>			
			<div class="col-md-4">Jenis Masalah</div>
			<div class="col-md-8"> 
					<select id="jenis_masalah" name="jenis_masalah">
						<!-- <option value="">Select</option>
						<option value="Keluhan">Keluhan</option>
						<option value="Saran">Saran</option>
						<option value="Informasi">Informasi</option> -->
					</select> 
			</div>
			<div class="clearfix"></div>
			<div class="col-md-4">Isi Pesan</div>
			<div class="col-md-8">
				<textarea name="pesan" required></textarea>
			</div>	
			<div class="col-md-12">
			<button id="submitbtn" class="btn btn-success">Kirim</button>
			</div>
		</div>
      </div>
      <div class="modal-footer"> 
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

$(function() {
	$('#produk').change(function(){
		var val= $('#produk').val();		
		if(val=='Giro'){
			var selectValues = { "1": "Produk dan Fitur Giro",
								 "2": "Belum menerima rekening koran" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}					
		}else if(val=='Tabungan'){
			var selectValues = { "1": "Produk dan Fitur Tabungan",
								 "2": "Suku Bunga Tabungan" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}
		}else if(val=='Deposito'){
			var selectValues = { "1": "Produk dan Fitur Deposito",
								 "2": "Suku Bunga Deposito" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}
		}else if(val=='Kredit'){
			var selectValues = { "1": "Produk dan Fitur Kredit",
								 "2": "Suku Bunga Kredit" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}
		}else if(val=='Kartu Debit'){
			var selectValues = { "1": "Kartu Hilang",
								 "2": "Kartu Tertelan",
								 "3": "Kartu Belum Aktif",
								 "4": "Kartu Terblokir",
								 "5": "Salah PIN/Lupa PIN",
								 "6": "Sanggahan Transaksi",
								 "7": "Transfer Gagal",
								 "8": "Pembelian Pulsa Gagal"
								  };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}		
		}else if(val=='Kartu Kredit'){
			var selectValues = { "1": "Aktivasi Kartu Kredit",
								 "2": "Blokir /Buka Blokir",
								 "3": "Cetak Kartu",
								 "4": "Cetak PIN",
								 "5": "Cicilan Tetap",
								 "6": "Kenaikan Limit",
								 "7": "Sanggahan Transaksi",
								 "8": "Pengajuan Kartu Baru",
								 "9": "Pengiriman Billing",
								 "10": "Penutupan Kartu",
								 "11": "Promo Kartu Kredit",
								 "12": "Reaktif",
								 "13": "Status Kartu",
								 "14": "Update Kartu"
								  };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}					
		}else if(val=='Internet Banking'){
			var selectValues = { "1": "Transfer Gagal",
								 "2": "Pembelian Pulsa Gagal",
								 "3": "Registrasi/Aktivasi Internet Banking" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}			
		}else if(val=='SMS Banking'){
			var selectValues = { "1": "Transfer Gagal",
								 "2": "Pembelian Pulsa Gagal",
								 "3": "Tidak Mendapat SMS Konfirmasi",
								 "4": "Tidak Mendapat SMS Transaksi Sukses",
								 "5": "Registrasi SMS Banking" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}			

		}else if(val=='Phone Banking'){
			var selectValues = { "1": "Transfer Gagal",
								 "2": "Pembelian Pulsa Gagal",
								 "3": "Registrasi Phone Banking" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}

		}else if(val=='Bancassurance AIA'){
			var selectValues = { "1": "Pembatalan Polis" };
			$('#jenis_masalah').empty();
			for (key in selectValues) {
				$('#jenis_masalah').append($('<option>', {value: selectValues[key],text: selectValues[key]}));
			}			
		}else{
			$('#jenis_masalah').empty();
		}


	});

});
</script>

<?php echo $footer;?>
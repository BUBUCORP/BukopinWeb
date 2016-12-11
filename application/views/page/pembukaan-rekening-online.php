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
										<!-- Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.
										<br><br> -->
										<div class="c-block-1-img" style="position:relative">
											<!-- <button class="" >Buka Rekening Online</button> -->
										<div class="overlay-img-button">
											<a href="#" data-toggle="modal" data-target="#showform" class="buka_rek bt-pop-rek-on">buka rekening online <i class="fa fa-play"></i></a>
										</div>

											<img width="100%" src="<?php echo base_url('assets/images/buka-rekening-online.jpg');?>">
										</div> 
										
										<!-- Modal -->
										<div class="modal fade" id="showform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index:9999!important">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
												<div class="modal-header">
										        	<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										      	</div>		
												<form action="<?=$formaction?>" method="POST" id="registrasionline" name="registrasionline">
													<div class="modal-body form-field">
														<div class=" form_rek_online" id="resultdiv"> 
																  
															<!-- FORM SYARAT-->
															<div id="syarat">
																<div class="text-center">
																	<h4>Syarat dan ketentuan</h4>
																</div>
																<div class="col-md-12">
																Selamat datang di Bukopin e-Form, form elektronik pembukaan rekening dari Bank Bukopin. Terima kasih atas kepercayaan Anda terhadap Bank Bukopin. Bukopin e-Form tersedia untuk membantu dan memudahkan Anda dalam melakukan pembukaan rekening.
																</div>
																<div class="col-md-12">
																	<div  style="background:#f5f5f5;padding:15px;margin:15px 0 0 0;overflow: auto;height: 500px;">
																		<strong>Syarat dan Ketentuan Pembukaan Rekening melalui layanan situs PT Bank Bukopin Tbk ("Bank Bukopin") selanjutnya disebut "Bukopin e-Form".</strong>
																		<br>
																		<ol>
																			<li>Pembukaan rekening melalui Bukopin e-Form hanya tersedia untuk jenis rekening perorangan.</li>
																			<li>Pemohon wajib memberikan informasi data atau dokumen dengan lengkap dan benar sesuai dengan persyaratan Bank Bukopin terkait dengan Know Your Customer Profile (KYCP) yang berlaku.</li>
																			<li>Setelah melengkapi aplikasi pembukaan rekening, calon nasabah (Pemohon)  yang belum memiliki rekening di Bank Bukopin tetap wajib datang ke Cabang Bank Bukopin untuk melanjutkan proses pembukaan rekening.</li>
																			<li>Bank Bukopin sepenuhnya berhak untuk tidak memproses lebih lanjut permohonan pembukaan rekening yang diajukan oleh Pemohon tanpa berkewajiban untuk mengemukakan alasannya.</li>
																			<li>E-Form ini berlaku selama 14 (empat belas) hari kalender setelah tanggal pengisian data pemohon melalui Bukopin e-form, jika dalam hal melebihi jangka waktu tersebut diatas, maka permohonan pembukaan rekening tersebut (e-form) tidak berlaku lagi.</li>
																			<li>Pemohon dengan ini setuju bahwa pembukaan rekening hanya akan berlaku efektif setelah seluruh persyaratan dipenuhi oleh Pemohon dan aplikasi pembukaan rekening Pemohon disetujui oleh Bank Bukopin.</li>
																			<li>Apabila permohonan pembukaan rekening disetujui, Pemohon harus melakukan setoran awal sebesar yang tercantum pada Info Produk.</li>
																			<li>Pemohon mengerti dan memahami bahwa pembukaan rekening melalui Bukopin e-Form ini terpapar atas risiko aktifitas melalui Internet antara lain virus, hacking, phising dan berbagai risiko lainnya di luar kekuasaan dan tanggung-jawab Bank Bukopin, baik karena kelalaian atau karena hal lain diluar kekuasaan Pemohon.</li>
																			<li>Pemohon wajib memastikan bahwa komputer maupun perangkat elektronik lainnya milik Pemohon yang digunakan untuk mengakses Bukopin e-Form ini dirawat secara berkala serta bebas dari virus dan/atau piranti lunak apapun yang dapat menimbulkan gangguan terhadap sistem komputer milik Pemohon maupun sistem komputer milik Bank Bukopin.</li>
																		</ol>
																	</div>
																	<div class="col-md-12"><br></div>
																	<div class="col-md-12 " style="background: #f5f5f5;">

													  					<label style="cursor:pointer;" ><input data-validation="required" name="chk_setuju" type="checkbox" id="chk_setuju" style="width: 30px!important; margin: 15px 0 0 0!important;" value="" required >Saya setuju dengan syarat dan ketentuan tersebut diatas</label>			
																		
																	</div>
																	<div class="col-md-12 text-center">
																		<div class="bt-next-popup-syaket">
																			
																			<button id="btn-next-1" type="button" class="nav-next-rek">Selanjutnya</button> 

																		</div>

																		<!-- -->
																	</div>
																</div>
															</div>

															<!-- FORM 1-->
															<div id="step1">
																<div class="text-center">
																	<h4>Data Pribadi</h4>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label> Nama Lengkap</label>
																		<input data-validation="required" data-validation="length" data-validation-length="min3" name="nama_lengkap" id="nama_lengkap" class="f-i-rek-on" placeholder="Nama Lengkap" required/>
																	</div>
																</div>
															
																<div class="col-md-6">
																	<div class="form-group">
																		<label> Nama Panggilan *</label>
																		<input data-validation="required" name="nama_panggilan" id="nama_panggilan" class="f-i-rek-on" placeholder="Nama Panggilan" required/>
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<label> Nama Sesuai dengan KTP/SIM/PASSPOR*</label>
																		<input data-validation="required" name="nama_sesuai_ktp" id="nama_sesuai_ktp" class="f-i-rek-on" placeholder="Nama Sesuai dengan KTP/SIM/PASSPOR" />
																	</div>
																</div>					



																<div class="col-md-4">
																	<div class="form-group"><label>Jenis Kelamin*</label>
																		<select  name="jenis_kelamin" id="jenis_kelamin" class="f-i-rek-on" data-validation="required">	
																			<!-- <option >Jenis Kelamin</option>	 -->					
																			<option value="P">Pria</option>
																			<option value="W">Wanita</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group"><label>&nbsp;</label>
																		<input name="gelar_depan" class="f-i-rek-on" placeholder="Gelar Depan"/>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group"><label>&nbsp;</label>
																		<input name="gelar_belakang" class="f-i-rek-on" placeholder="Gelar Belakang"/>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label>Tempat Lahir*</label>
																		<input data-validation="required" name="tmpt_lahir" id="tmpt_lahir" class="f-i-rek-on" />
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<label>Tanggal*</label>
																		<select name="tgl_lahir"  id="tgl_lahir"  class="f-i-rek-on" data-validation="required">
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
																		<label>Bulan*</label>
																		<select name="bln_lahir" id="bln_lahir" class="f-i-rek-on" data-validation="required">
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
																				echo "
																						<option value=".$key.">".$value."</option>";
																			}
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<label>Tahun*</label>
																		<select name="thn_lahir" id="thn_lahir" class="f-i-rek-on" data-validation="required">
																			<?php
																		for($i=2016; $i>=1950; $i-=1){
																			echo "
																			<option value=".$i.">".$i."</option>";
																		}
																		?>
																		</select>
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<label>Usia</label>
																		<input name="usia" class="f-i-rek-on" required/>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group"><label>Kewarganegaraan*</label>
																		<select class="f-i-rek-on" name="kewarganegaraan" id="kewarganegaraan" data-validation="required">
																			<!-- <option>Kewarganegaraan</option> -->
																			<option value="WNI">WNI</option>
																			<option value="WNA" >WNA</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group"><label>Jenis Identitas*</label>
																		<select name="identitas" id="identitas"  class="f-i-rek-on" data-validation="required">
																			<!-- <option>Jenis Identitas</option> -->
																			<option value="KTP">KTP</option>
																			<option value="SIM">SIM</option>
																			<option value="passpor" >Paspor</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-5">
																	<div class="form-group"><label>No Identitas*</label>
																		<input data-validation="required" name="no_identitas" id="no_identitas" class="f-i-rek-on" placeholder="No Idenditas" required/>
																	</div>
																</div>

																<div class="col-md-12">
																	<div class="col-md-3"><br/>
																		<label>Berlaku Sampai*</label>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group">
																			<label>Tanggal*</label>
																			<select name="tgl_berlaku" id="tgl_berlaku" class="f-i-rek-on">
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
																			<label>Bulan*</label>
																			<select name="bln_berlaku" id="bln_berlaku" class="f-i-rek-on" data-validation="required">
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
																	<div class="col-md-3">
																		<div class="form-group">
																			<label>Tahun*</label>
																			<select name="thn_berlaku" id="thn_berlaku" class="f-i-rek-on" data-validation="required">
																				<?php
																				for($i=2016; $i>=2000; $i-=1){
																					echo "<option value=".$i.">".$i."</option>";
																				}
																				?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input  name="no_ijin_tinggal" class="f-i-rek-on" placeholder="No Ijin Tinggal"/>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input  name="no_pajak_tinggal" class="f-i-rek-on" placeholder="No Pajak Asing"/>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input  name="no_jaminan_tinggal" class="f-i-rek-on" placeholder="No Jaminan Sosial"/>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group"><label>Agama*</label>
																		<select name="agama" id="agama" class="f-i-rek-on" >
																			<!-- <option>Agama</option> -->
																			<option value="islam">Islam</option>
																			<option value="katolik">Katolik</option>
																			<option value="protestan">Protestan</option>
																			<option value="hindu">Hindu</option>
																			<option value="budha" >Budha</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3"><label>Status*</label>
																	<div class="form-group">
																		<select name="status_nikah" id="status_nikah" class="f-i-rek-on" >
																			<!-- <option>Status Pernikahan</option> -->
																			<option value="menikah">Menikah</option>
																			<option value="duda">Duda</option>
																			<option value="janda">Janda</option>
																			<option value="belum menikah">Belum Menikah</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group"><label>Jumlah Anak*</label>
																		<select name="jml_anak" id="jml_anak" class="f-i-rek-on" >
																			<option value="0">Tidak ada</option>
																			<?php
																for($a=1; $a<=10; $a+=1){
																	echo "
																			<option value=".$a.">".$a."</option>";
																}
																?>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group"><label>Pendidikan terakhir*</label>
																		<select data-validation="required" name="pendidikan"  id="pendidikan" class="f-i-rek-on">
																			<!-- <option>Pendidikan</option> -->
																			<option value="SD">SD</option>
																			<option value="SMP">SMP</option>
																			<option value="SMA">SMA</option>
																			<option value="D3">D3</option>
																			<option value="S1">S1</option>
																			<option value="S2">S2</option>
																			<option value="S3">S3</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="ibu_kandung" class="f-i-rek-on" placeholder="Nama Ibu Kandung*"/>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input name="telepon" class="f-i-rek-on"  placeholder="Telepon"/>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input  name="fax" class="f-i-rek-on" placeholder="Fax"/>
																	</div>
																</div>
																
																	
																	<div class="col-md-6">
																		<div class="form-group">
																			<input  name="handphone" class="f-i-rek-on" placeholder="Handphone"/>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group">
																			<input name="email" class="f-i-rek-on" placeholder="Email"/>
																		</div>
																	</div>
																	
																
																<div class="col-md-12">
																	<div class="form-group">
																		<textarea name="hobby" class="f-i-rek-on" placeholder="Hobby"></textarea>
																	</div>
																</div>
																<div class="col-md-12 text-center">
																<img src="<?php echo base_url('assets/img/step1.png');?>"><br><br>
																</div>					
																<div class="col-md-12 text-center">
																<div class="bt-next-popup-syaket">
																	<button id="btn-next-2" type="button" class="nav-next-rek">Selanjutnya</button>
																</div>
																</div>
															</div>

															<div id="step2">
																<div class="text-center">
																	<h4>Alamat</h4>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<input data-validation="required" name="alamat_rmh" id="alamat_rmh" class="f-i-rek-on" placeholder="alamat*" >
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<select name="status_tmpt_tinggal" class="f-i-rek-on">
																			<!-- <option>Status Kepemilikan *</option> -->
																			<option value="Milik Sendiri">Milik Sendiri</option>
																			<option value="Sewa/Kos">Sewa/Kos</option>
																			<option value="Keluarga">Keluarga</option>
																			<option value="Kantor">Kantor</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="kode_pos"  id="kode_pos" class="f-i-rek-on" placeholder="Kode Pos*" >
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input  name="alamat_rt" id="alamat_rt" class="f-i-rek-on" placeholder="RT">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input  name="alamat_rw" id="alamat_rw" class="f-i-rek-on" placeholder="RW">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="alamat_kelurahan" id="alamat_kelurahan" class="f-i-rek-on" placeholder="Kelurahan/Desa*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="alamat_kecamatan" id="alamat_kecamatan" class="f-i-rek-on" placeholder="Kecamatan*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<select data-validation="required" name="alamat_provinsi" id="alamat_provinsi" class="f-i-rek-on" >
																			<option>Provinsi*</option>
																		<?php foreach ($provinsi as $key => $val) {?>
																			<option opt="<?=$val['idprovinsi'];?>" value="<?=$val['nama_provinsi'];?>"><?=$val['nama_provinsi'];?></option>
																		<?php }?>	

																			<!--	<option>Provinsi *</option>
																			<option value="DKI Jakarta">DKI Jakarta</option>
																			<option value="Jawa Barat">Jawa Barat</option> -->							
																		</select>
																	</div>
																</div>																
																<div class="col-md-4">
																	<div class="form-group">
																		<select data-validation="required" name="alamat_kota" id="alamat_kota" class="f-i-rek-on" >
																			<option>Kota/Kabupaten*</option>
																			
																		</select>
																	</div>
																</div>


																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
																</div>

																<div class="col-md-12">
													  			<label style="cursor:pointer;font-size: 20px;"><input data-validation="required" name="chksama" id="chksama" type="checkbox" style="width: 30px!important; margin: 15px 0 0 0!important;" value="" >Alamat Domisili</label>
													  			</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<textarea name="alamat_domisili"  data-validation="required" id="alamat_domisili" class="f-i-rek-on" placeholder="Alamat*" ></textarea>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="domisili_kode_pos" id="domisili_kode_pos" class="f-i-rek-on" placeholder="Kode Pos*">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input  name="domisili_rt" id="domisili_rt" class="f-i-rek-on" placeholder="RT">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input  name="domisili_rw" id="domisili_rw" class="f-i-rek-on" placeholder="RW">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="domisili_kelurahan" id="domisili_kelurahan" class="f-i-rek-on" placeholder="Kelurahan/Desa *" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="domisili_kecamatan" id="domisili_kecamatan" class="f-i-rek-on" placeholder="Kecamatan *" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<select data-validation="required" name="domisili_provinsi" id="domisili_provinsi" class="f-i-rek-on" >
																			<option>Provinsi*</option>
																		<?php foreach ($provinsi as $key => $val) {?>
																			<option opt="<?=$val['idprovinsi'];?>" value="<?=$val['nama_provinsi'];?>"><?=$val['nama_provinsi'];?></option>
																		<?php }?>																			
																			<!-- <option value="DKI Jakarta">DKI Jakarta</option>
																			<option value="Jawa Barat">Jawa Barat</option>	 -->						
																		</select>
																	</div>
																</div>																
																<div class="col-md-4">
																	<div class="form-group">
																		<select name="domisili_kota" data-validation="required" id="domisili_kota" class="f-i-rek-on">
																			<option>Kota/Kabupaten *</option>
																			<!-- <option value="Jakarta">Jakarta</option>
																			<option value="Bandung">Bandung</option> -->
																		</select>
																	</div>
																</div>

																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
																</div>
																<div class="col-md-12"><h4>Emergency Call</h4></div>

																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="emergency_name" id="emergency_name" class="f-i-rek-on" placeholder="Nama*">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="emergency_hubungan" id="emergency_hubungan" class="f-i-rek-on" placeholder="Hubungan Keluarga*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="emergency_telepon" id="emergency_telepon" class="f-i-rek-on" placeholder="No Telp*" >
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="emergency_kode_pos" class="f-i-rek-on" placeholder="Kode Pos*" >
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input  name="emergency_rt" id="emergency_rt" class="f-i-rek-on" placeholder="RT">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input  name="emergency_rw" class="f-i-rek-on" placeholder="RW">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="emergency_kelurahan" id="emergency_kelurahan"class="f-i-rek-on" placeholder="Kelurahan/Desa *" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="emergency_kecamatan"  ]id="emergency_kecamatan" class="f-i-rek-on" placeholder="Kecamatan*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<select id="emergency_provinsi" name="emergency_provinsi" data-validation="required" id="emergency_provinsi" class="f-i-rek-on" >
																			<option>Provinsi*</option>
																		<?php foreach ($provinsi as $key => $val) {?>
																			<option opt="<?=$val['idprovinsi'];?>" value="<?=$val['nama_provinsi'];?>"><?=$val['nama_provinsi'];?></option>
																		<?php }?>																			
																			<!-- <option value="Jawa Barat">Jawa Barat</option>
																			<option value="DKI Jakarta">DKI Jakarta</option> -->
																		</select>
																	</div>
																</div>																
																<div class="col-md-4">
																	<div class="form-group">
																		<select data-validation="required" name="emergency_kota" id="emergency_kota" class="f-i-rek-on">
																			<option>Kota/Kabupaten*</option>
																			<!-- <option value="Jakarta">Jakarta</option>
																			<option value="Bandung">Bandung</option> -->
																		</select>
																	</div>
																</div>

																<div class="col-md-12 text-center">
																<img src="<?php echo base_url('assets/img/step2.png');?>"><br><br>
																</div>				

																<div class="col-md-12 text-center">
																<div class="bt-next-popup-syaket">
																	<button id="btn-back-1" type="button" class="nav-next-rek">Sebelumnya</button>
																	<button id="btn-next-3" type="button" class="nav-next-rek">Selanjutnya</button>
																</div>
																</div>
															</div>

															<div id="step3">
																<div class="text-center">
																	<h4>Data Pekerjaan</h4>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="jenis_pekerjaan" id="jenis_pekerjaan" class="f-i-rek-on" placeholder="Jenis Pekerjaan*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="nama_kantor" id="nama_kantor" class="f-i-rek-on" placeholder="Nama Kantor*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="bidang_pekerjaan" id="bidang_pekerjaan" class="f-i-rek-on" placeholder="Bidang Pekerjaan*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="jabatan" id="jabatan" class="f-i-rek-on" placeholder="Jabatan*" >
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<input data-validation="required" name="lama_bekerja" class="f-i-rek-on" placeholder="Lama Bekerja">
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<input data-validation="required" name="lama_bekerja" class="f-i-rek-on" placeholder="Hingga">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input  name="bekerja_hingga" class="f-i-rek-on" placeholder="No NPWP" >
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div style="widht:100%;height:1px;background:#0F9F0F;margin:15px 0"></div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<textarea name="alamat_pekerjaan" class="f-i-rek-on" placeholder="Alamat Pekerjaan*" ></textarea>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="kantor_kode_pos" id="kantor_kode_pos" class="f-i-rek-on" placeholder="Kodepos *" >
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="kantor_rt" class="f-i-rek-on" placeholder="RT">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="kantor_rw" class="f-i-rek-on" placeholder="RW">
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<input data-validation="required" name="kantor_kelurahan" id="kantor_kelurahan" class="f-i-rek-on" placeholder="Kelurahan/Desa*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input data-validation="required" name="kantor_kecamatan" id="kantor_kecamatan" class="f-i-rek-on" placeholder="Kecamatan*" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<select name="kantor_provinsi" id="kantor_provinsi" data-validation="required"id="kantor_provinsi" class="f-i-rek-on" >
																			<option>Provinsi*</option>
																		<?php foreach ($provinsi as $key => $val) {?>
																			<option opt="<?=$val['idprovinsi'];?>" value="<?=$val['nama_provinsi'];?>"><?=$val['nama_provinsi'];?></option>
																		<?php }?>																			
																			<!-- <option value="Jawa Barat">Jawa Barat</option>
																			<option value="DKI Jakarta">DKI Jakarta</option> -->
																		</select>
																	</div>
																</div>																
																<div class="col-md-4">
																	<div class="form-group">
																		<select name="kantor_kota" data-validation="required" id="kantor_kota" class="f-i-rek-on" >
																			<option>Kota/Kabupaten *</option>
																			<!-- <option value="Jakarta">Jakarta</option>
																			<option value="Bandung">Bandung</option> -->
																		</select>
																	</div>
																</div>

																<div class="col-md-4">
																	<div class="form-group">
																		<input ame="kantor_telepon" class="f-i-rek-on" placeholder="Telepon" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input name="kantor_fax" class="f-i-rek-on" placeholder="Fax" >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<select  data-validation="required" name="alamat_surat_menyurat"  id="alamat_surat_menyurat" class="f-i-rek-on" >
																			<option>Alamat Surat Menyurat*</option>
																			<option value="Alamat Identitas">Alamat Identitas</option>
																			<option value="Alamat Domisili">Alamat Domisili</option>
																			<option value="Alamat Kantor">Alamat Kantor</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-12 text-center">
																<img src="<?php echo base_url('assets/img/step3.png');?>"><br><br>
																</div>				


																<div class="col-md-12 text-center">
																<div class="bt-next-popup-syaket">
																	<button id="btn-back-2" type="button" class="nav-next-rek">Sebelumnya</button>
																	<button id="btn-next-4" type="button" class="nav-next-rek">Selanjutnya</button>
																</div>
																</div>
															</div>

															<div id="step4">
																<div class="text-center">
																	<h4>Data Keuangan</h4>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																	<label>Tujuan Pembukaan Rekening</label>
																		<select name="tujuan_buka_rek" class="f-i-rek-on" >
																			
																			<option value="Investasi">Investasi</option>
																			<option value="Operasional Harian">Operasional Harian</option>
																			<option value="Gaji">Gaji</option>
																			<option value="Lainnya">Lainnya</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Penghasilan Perbulan*</label>
																		<select  id="penghasilan_bulanan" name="penghasilan_bulanan"  data-validation="required"  class="f-i-rek-on" >
																			
																			<option value="< Rp 1 Juta">< Rp 1 Juta</option>
																			<option value="Rp 1 Juta s/d Rp 5 juta">Rp 1 Juta s/d Rp 5 juta</option>
																			<option value="Rp 5 Juta s/d Rp 10 juta">Rp 5 Juta s/d Rp 10 juta</option>
																			<option value="Rp 10 Juta s/d Rp 25 juta">Rp 10 Juta s/d Rp 25 juta</option>
																			<option value="Rp 25 Juta s/d Rp 50 juta">Rp 25 Juta s/d Rp 50 juta</option>
																			<option value="Rp 50 Juta s/d Rp 100 juta">Rp 50 Juta s/d Rp 100 juta</option>
																			<option value="> Rp 100 Juta">> Rp 100 Juta</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Sumber Utama*</label>
																		<select name="penghasilan_sumber"  id="penghasilan_sumber"  data-validation="required"  class="f-i-rek-on" >
																			
																			<option value="Gaji">Gaji</option>
																			<option value="Hasil Usaha">Hasil Usaha</option>
																			<option value="Lainnya">Lainnya</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>Mempunyai Kartu Kredit Bukopin*</label>
																		<select name="punya_cc_bukopin" id="punya_cc_bukopin" data-validation="required"  class="f-i-rek-on" >
																			
																			<option value="Ya">Ya</option>
																			<option value="Tidak">Tidak</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-12 text-center">
																<img src="<?php echo base_url('assets/img/step4.png');?>"><br><br>
																</div>				

																<div class="col-md-12 text-center">
																<div class="bt-next-popup-syaket">
																	<button id="btn-back-3" type="button" class="nav-next-rek">Sebelumnya</button>
																	<button id="btn-next-5" type="button" class="nav-next-rek">Selanjutnya</button>
																</div>
																</div>
															</div>

															<div id="step5">
																<div class="text-center">
																	<h4>Pembukaan Rekening Baru</h4>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																	<label>Lokasi Pembukaan rekening yang Diinginkan*</label>
																		<select name="lokasi_pembukaan_rek" class="f-i-rek-on" >
																			
																			<option value="Sesuai Alamat Identitas">Sesuai Alamat Identitas</option>
																			<option value="Sesuai Alamat Domisili">Sesuai Alamat Domisili</option>
																			<option value="Sesuai Alamat Kantor">Sesuai Alamat Kantor</option>
																		</select>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label>SMS Banking</label>
																		<input name="no_sms_banking" class="f-i-rek-on" placeholder="Nomer Handphone">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label>SMS Notifikasi</label>
																		<input name="no_sms_notifikasi" class="f-i-rek-on" placeholder="Nomer Handphone">
																	</div>
																</div>
																<div class="col-md-12 text-center">
																<img src="<?php echo base_url('assets/img/step5.png');?>"><br><br>
																</div>				
															
																<div class="col-md-12 text-center">
																<div class="bt-next-popup-syaket">
																	<button id="btn-back-4" type="button" class="nav-next-rek">Sebelumnya</button>
																	<button id="submitrekonline" type="button" class="nav-next-rek">Kirim</button>
																</div>
																</div>
															</div>				  											  
														</div>
													</div> 
												</form>
												<div class="modal-footer"> </div>        
											</div>		
										</div>
									</div>						
										<!-- END Modal -->
							
									</div>
								</div>
							</div>
			<?php echo $sidebar; ?>	
			</div>
		</div>
	</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
$(document).ready(function(){
		$("#step1,#step2,#step3,#step4,#step5").hide();
	    $("#btn-next-1").click(function(){
	    	if($("#chk_setuju").is(':checked')) {
				$("#syarat").hide();
		        $("#step1").show();
	    	}else{
				alert("Anda harus setuju untuk dapat melanjutkan");
				$("#chk_setuju").focus();
	    	}

	    });
		$("#btn-next-2").click(function(){
				// var valid = $.validate();
				// if( valid ){
					if($("#nama_panggilan").val()!='' && $("#nama_sesuai_ktp").val()!='' && $("#jenis_kelamin").val()!='' && $("#tmpt_lahir").val()!='' && $("#tgl_lahir").val()!='' && $("#bln_lahir").val()!='' && $("#thn_lahir").val()!='' && $("#kewarganegaraan").val()!='' && $("#identitas").val()!='' && $("#no_identitas").val()!='' && $("#tgl_berlaku").val()!='' && $("#bln_berlaku").val()!='' && $("#thn_berlaku").val()!='' && $("#agama").val()!='' && $("#status_nikah").val()!='' && $("#ibu_kandung").val()!='' && $("#pendidikan").val()!='' )
					{
						$("#syarat,#step1").hide();
						$("#step2").show();											
					}else{
						alert("harap lengkapi data");
					}

		});
		$("#btn-next-3").click(function(){
				// var valid = $.validate();
				// if( valid ){
				if($("#kode_pos").val()!='' && $("#alamat_rt").val()!='' && $("#alamat_rw").val()!='' && $("#alamat_kelurahan").val()!='' && $("#alamat_kecamatan").val()!='' && $("#alamat_provinsi").val()!='' && $("#alamat_kota").val()!='' && $("#domisili_kode_pos").val()!='' && $("#domisili_rt").val()!='' && $("#domisili_rw").val()!='' && $("#domisili_kelurahan").val()!='' && $("#domisili_kecamatan").val()!='' && $("#domisili_provinsi").val()!='' && $("#domisili_kota").val()!='' && $("#emergency_name").val()!='' && $("#emergency_hubungan").val()!='' &&  $("#emergency_kode_pos").val()!='' && $("#emergency_kelurahan").val()!='' && $("#emergency_kecamatan").val()!='' && $("#emergency_provinsi").val()!='' && $("#emergency_kota").val()!='')
				{					
					$("#syarat,#step1,#step2").hide();
					$("#step3").show();
				}else{
					alert("harap lengkapi data");
				}				
		});
		$("#btn-next-4").click(function(){
				// var valid = $.validate();
				// if( valid ){
					
				if($("#jenis_pekerjaan").val()!='' && $("#nama_kantor").val()!='' && $("#bidang_pekerjaan").val()!='' && $("#jabatan").val()!='' && $("#kantor_kode_pos").val()!='' && $("#kantor_kelurahan").val()!='' &&  $("#kantor_kecamatan").val()!='' &&  $("#kantor_provinsi").val()!='' &&  $("#kantor_kota").val()!='' &&  $("#alamat_surat_menyurat").val()!='' )
				{
					$("#syarat,#step1,#step2,#step3").hide();
					$("#step4").show();
				}else{
					alert("harap lengkapi data");
				}								
		});
		$("#btn-next-5").click(function(){
				// var valid = $.validate();
				// if( valid ){	
				if($("#penghasilan_bulanan").val()!='' && $("#penghasilan_sumber").val()!='' && $("#punya_cc_bukopin").val()!='' )
				{
					$("#syarat,#step1,#step2,#step3,#step4").hide();
					$("#step5").show();
				}else{
					alert("harap lengkapi data");
				}		

		});

		$("#btn-next-5").click(function(){
				// var valid = $.validate();
				// if( valid ){	
				if($("#penghasilan_bulanan").val()!='' && $("#penghasilan_sumber").val()!='' && $("#punya_cc_bukopin").val()!='' )
				{
					$("#syarat,#step1,#step2,#step3,#step4").hide();
					$("#step5").show();
				}else{
					alert("harap lengkapi data");
				}		

		});

		$("#btn-back-1").click(function(){
				// var valid = $.validate();
				// if( valid ){				
				$("#syarat,#step2").hide();
				$("#step1").show();
				// }else{
				// 	alert("harap lengkapi data");
				// }					
		});
		$("#btn-back-2").click(function(){
				// var valid = $.validate();
				// if( valid ){				
				$("#syarat,#step3").hide();
				$("#step2").show();
				// }else{
				// 	alert("harap lengkapi data");
				// }					
		});
		$("#btn-back-3").click(function(){
				// var valid = $.validate();
				// if( valid ){				
				$("#syarat,#step4").hide();
				$("#step3").show();
				// }else{
				// 	alert("harap lengkapi data");
				// }					
		});
		$("#btn-back-4").click(function(){
				// var valid = $.validate();
				// if( valid ){				
				$("#syarat,#step5").hide();
				$("#step4").show();
				// }else{
				// 	alert("harap lengkapi data");
				// }		
		});
		
	$('#alamat_provinsi').change(function(){	
		var idProv = $('#alamat_provinsi option:selected').attr('opt');

		 $.getJSON('<?php echo site_url("page/getkabupaten/");?>' + idProv, function(data) {
		 	$('#alamat_kota').empty();
			for (key in data) {
				$('#alamat_kota').append($('<option>', {value: data[key].namakabupaten,text: data[key].namakabupaten}));
			}

		});	
	});	
	$('#domisili_provinsi').change(function(){	
		var idProv = $('#domisili_provinsi option:selected').attr('opt');

		 $.getJSON('<?php echo site_url("page/getkabupaten/");?>' + idProv, function(data) {
		 	$('#domisili_kota').empty();
			for (key in data) {
				$('#domisili_kota').append($('<option>', {value: data[key].namakabupaten,text: data[key].namakabupaten}));
			}

		});	
	});	

	$('#emergency_provinsi').change(function(){	
		var idProv = $('#emergency_provinsi option:selected').attr('opt');

		 $.getJSON('<?php echo site_url("page/getkabupaten/");?>' + idProv, function(data) {
		 	$('#emergency_kota').empty();
			for (key in data) {
				$('#emergency_kota').append($('<option>', {value: data[key].namakabupaten,text: data[key].namakabupaten}));
			}

		});	
	});	
	
	$('#kantor_provinsi').change(function(){	
		var idProv = $('#kantor_provinsi option:selected').attr('opt');

		 $.getJSON('<?php echo site_url("page/getkabupaten/");?>' + idProv, function(data) {
		 	$('#kantor_kota').empty();
			for (key in data) {
				$('#kantor_kota').append($('<option>', {value: data[key].namakabupaten,text: data[key].namakabupaten}));
			}

		});	
	});		
	$("#chksama").change(function() {
        if($(this).is(":checked")) {

			$("#alamat_domisili").val($("#alamat_rmh").val());
			$("#domisili_kode_pos").val($("#kode_pos").val());
			$("#domisili_rt").val($("#alamat_rt").val());
			$("#domisili_rw").val($("#alamat_rw").val());
			$("#domisili_kelurahan").val($("#alamat_kelurahan").val());
			$("#domisili_kecamatan").val($("#alamat_kecamatan").val());
			$("#domisili_provinsi").val($("#alamat_provinsi").val());
			$("#domisili_kota").val($("#alamat_kota").val());

        }else{
			$("#alamat_domisili").val('');
			$("#domisili_kode_pos").val('');
			$("#domisili_rt").val('');
			$("#domisili_rw").val('');
			$("#domisili_kelurahan").val('');
			$("#domisili_kecamatan").val('');
			$("#domisili_provinsi").val('');
			$("#domisili_kota").val('');
        }

    });

});

</script>
<?php echo $footer;?>

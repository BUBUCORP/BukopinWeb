
<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>
<script src="<?php echo base_url('assets/js/jquery.mask.min.js');?>"></script>


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
							<h2><?php echo $page_title; ?></h2>
							<?php 
							$no_career=1;
							foreach($career as $read){
								$no_career++?>
							<div class="panel panel-primary">
								<div id="heading<?php echo $no_career;?>" class="panel-heading">
									<div class="panel-title">
									<a href="#collapse<?php echo $no_career;?>" data-toggle="collapse" data-parent="#accordion">
										<?php echo $read['title'];?>
									</a>
									</div>
								</div>
								<div id="collapse<?php echo $no_career;?>" class="panel-collapse collapse">
									<div class="panel-body">
										<?php
											if ($this->session->userdata('site_lang') == 'english')
											{
											echo $read['content_en'];
											}
											else
											{
											echo $read['content'];
											}
										?>
										<a data-jobid="<?=$read['id_post']?>" data-title="<?=$read['title']?>" class="bt-pop-low-on btn pull-right" style="background-color: #0f9f0f;color: #FFF;border-radius: 0;">LAMAR POSISI</a>
									</div>
								</div>
							</div>
							<?php } ?>							
						</div>
					</div>
				</div>

				<?php echo $sidebar; ?>

			</div>
		</div>
	</div>
</div>

	<!-- popup lowongan pekerjaan -->
	<div class="wrapper-container-low-pekerjaan ">
		<form name="career_form" id="career_form" action="<?php echo site_url('page/jobsubmit');?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="jobid" id="jobid" /> 
		<div class="box-popup-rek">
			<div class="bt-close-popup-rek">
				<i class="fa fa-close bt-close-pop-loker"></i>
			</div>
			<div class="slider-rek-online" data-slider-id="2">
				<!-- Popup Lowongan Pekerjaan 1 -->
				<div class="item" id="lowongan1">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle"></span> </h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">data pribadi</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-md-8">
										<input type="text" data-validation="required" name="nama_lengkap" id="nama_lengkap" class="f-i-rek-on" placeholder="Nama Lengkap (Sesuai Ijazah tanpa Gelar) *" required>
									</div>
									<div class="col-md-4">
										<select name="jenis_kelamin" id="jenis_kelamin" class="s-f-t-rek-on" style="width:100%;">
											<option value="2">Pria</option>
											<option value="1">Wanita</option>
										</select>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<div class="input-f-res">
											<select name="agama" id="agama" class="s-f-t-rek-on" style="width:100px;">
												<option value="1">Islam</option>
												<option value="2">Kristem</option>
												<option value="3">Katolik</option>
												<option value="4">Hindu</option>
												<option value="5">Budha</option>
											</select>
										</div>
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												Tempat Kelahiran *
											</p>
											<input type="text" data-validation="required" name="tempat_lahir" id="tempat_lahir" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:110px;" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												Tanggal Lahir *
											</p>
											<select name="tgl_lahir" class="s-f-t-rek-on">
												<?php
												for($a=1; $a<=31; $a+=1){
													echo "<option value=".$a.">".$a."</option>";
												}
												?>
											</select>
											<select name="bln_lahir" id="bln_lahir" class="s-f-t-rek-on" >
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
															<option value=".$key.">".$key."</option>";
												}
												?>
											</select>																						
											<select name="thn_lahir" id="thn_lahir" class="s-f-t-rek-on">
												<?php
											for($i=2016; $i>=1950; $i-=1){
												echo "
												<option value=".$i.">".$i."</option>";
											}
											?>
											</select>
										</div>
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												Usia
											</p>
											<input type="text" name="usia" id="usia" class="f-i-rek-on" style="width: 50px;">
										</div>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												Tinggi Badan (cm) *
											</p>
											<input type="text" name="tinggi_bdn" data-validation="required" id="tinggi_bdn" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:50px;" required>
										</div>
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												Berat Badan (cm) *
											</p>
											<input type="text" name="berat_bdn" data-validation="required" id="berat_bdn" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:50px;" required>
										</div>
									</div>
									<div class="col-md-6">
										<p class="desc-f-i-rek-on-left">
											Golongan Darah
										</p>
										<select name="gol_darah" id="gol_darah" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:50px;">
											<option value="1">A</option>
											<option value="3">B</option>
											<option value="4">O</option>
											<option value="2">AB</option>
										</select>
										<select name="suku_bangsa" id="suku_bangsa" class="s-f-t-rek-on" style="width: 180px;">
											<option value="0">SUKU BANGSA</option>
											<option value="1">ACEH</option>
											<option value="10">MAKASAR</option>
											<option value="11">MALUKU</option>
											<option value="12">MANADO</option>
											<option value="13">MELAYU</option>
											<option value="14">MINANG</option>
											<option value="15">PAPUA</option>
											<option value="16">SUNDA</option>
											<option value="2">AMBON</option>
											<option value="3">BALI</option>
											<option value="4">BATAK</option>
											<option value="5">BETAWI</option>
											<option value="6">IRIAN</option>
											<option value="7">JAWA</option>
											<option value="8">CINA</option>
											<option value="9">LOMBOK</option>
										</select>

										
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<p class="desc-f-i-rek-on-left">
											No KTP *
										</p>
										<input name="ktp_p1" id="ktp_p1" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
										<input name="ktp_p2" id="ktp_p2" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
										<input name="ktp_p3" id="ktp_p3" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
										<input name="ktp_p4" id="ktp_p4" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
									</div>
									<div class="col-md-6">
										<p class="desc-f-i-rek-on-left">
											No NPWP *
										</p>
										<input name="npwp_1" id="npwp_1" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
										<input name="npwp_2" id="npwp_2" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
										<input name="npwp_3" id="npwp_3" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;">
										<input name="npwp_4" data-validation="required" id="npwp_4" maxlength="4" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;" required>
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">alamat</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-md-6">
										<input name="alamat" id="alamat" data-validation="required" type="text" class="f-i-rek-on" placeholder="Alamat *" required>
									</div>
									<div class="col-md-6">
										<select name="status_alamat" class="s-f-t-rek-on" style="width:100%;" required>
											<!-- <option>Status Kepemilikan *</option> -->
											<option value="1">PERSONAL</option>
											<option value="2">PARENT</option>
											<option value="3">COMPANY</option>
											<option value="4">SIBLING</option>
											<option value="5">OTHER</option>
										</select>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												No Telp *
											</p>
											<!-- <input type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:60px;"> -->
											<input name="no_tlp" data-validation="required" id="no_tlp" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:120px;" required>
										</div>
											<p class="desc-f-i-rek-on-left">
												No HP *
											</p>
											<input name="no_hp" data-validation="required" id="no_hp" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:166px;" required>
										<div class="input-f-res">
											<p class="desc-f-i-rek-on-left">
												Email *
											</p>
											<input name="email" data-validation="required" id="email" type="email" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:166px;" required>
										</div>
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">Kontak yang dapat di hubungi dalam keadaan darurat</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-md-6">
										<input name="nama_darurat" data-validation="required" id="nama_darurat" type="text" class="f-i-rek-on" placeholder="Nama *" required>
									</div>
									<div class="col-md-6">
										<input name="hubungan_darurat" data-validation="required" id="hubungan_darurat" type="text" class="f-i-rek-on" placeholder="Hubungan *" required>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-md-6">
										<input name="no_hp_darurat" data-validation="required" id="no_hp_darurat" type="text" class="f-i-rek-on" placeholder="No Telp *" required>
									</div>
									<div class="col-md-6">
										<input name="alamat_darutat" data-validation="required" id="alamat_darutat" type="text" class="f-i-rek-on" placeholder="Alamat *" required>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja1.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-next-rek" id="lowongan_step_1" >Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 2 -->
				<div class="item" id="lowongan2">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle2"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Media Social</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<div class="item-input-rek-online text-left">
											<span>Memiliki account Facebook?</span>
										</div>
										<input name="akun_facebook" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Tidak</span>
										<input name="akun_facebook" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Ada, URL account</span>
										<input name="url_facebook" id="url_facebook" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
									<div class="col-md-6">
										<div class="item-input-rek-online text-left">
											<span>Memiliki account Twitter?</span>
										</div>
										<input name="akun_twitter" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Tidak</span>
										<input name="akun_twitter" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Ada, URL account</span>
										<input name="url_twitter" id="url_twitter" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<div class="item-input-rek-online text-left">
											<span>Memiliki account Instagram?</span>
										</div>
										<input name="akun_instagram" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Tidak</span>
										<input name="akun_instagram" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Ada, URL account</span>
										<input name="url_instagram" id="url_instagram" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
									<div class="col-md-6">
										<div class="item-input-rek-online text-left">
											<span>Memiliki account Path?</span>
										</div>
										<input name="akun_path" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Tidak</span>
										<input name="akun_path" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Ada, URL account</span>
										<input name="url_path" id="url_path" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">Pengajuan Kredit</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Apakah anda pernah mengajukan Kredit (Kartu Kredit, KTA, KPR,  atau Lain-lain)?</span>
										</div>
										<input name="pernah_kredit" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Belum Pernah</span>
										<input name="pernah_kredit" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Pernah</span>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Apabila pernah</span>
										</div>
										<table class="table-input-low-p peng-kredit">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 35%;">Jenis Kredit</td>
												<td style="width: 20%;">Dimana</td>
												<td style="width: 20%;">Sejak Tanggal</td>
												<td style="width: 20%;">Proses Kredit</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<select name="kredit_jenis[]" id="kredit_jenis" class="s-f-t-rek-on2">
														<option value="Kartu Kredit">Kartu Kredit</option>
														<option value="KTA">KTA</option>
														<option value="KPR">KPR</option>
														<option value="Lain-lain">Lain-lain</option>
													</select>
												</td>
												<td>
													<input name="kredit_dimana[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="kredit_sejak[]" type="text" placeholder="DD-MM-YYYY" class="maskdate f-i-rek-on2">
												</td>
												<td>
													<select name="kredit_proses[]" id="kredit_proses" class="s-f-t-rek-on2">
														<option value="Masih Berjalan">Masih Berjalan</option>
														<option value="Sudah Selesai">Sudah Selesai</option>
													</select>
												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit"></i>
										</table>
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">Riwayat Kesehatan *</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<div class="item-input-rek-online text-left">
											<span> Apakah anda pernah dirawat dirumah sakit?</span>
										</div>
										<input name="riwayat_sakit" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Belum Pernah</span>
										<input name="riwayat_sakit" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Pernah</span>
										<input name="riwayat_sakit_desc" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
									<div class="col-md-6">
										<div class="item-input-rek-online text-left">
											<span>Apakah anda mengidap suatu penyakit bawaan keluarga?</span>
										</div>
										<input name="riwayat_bawaan" value="N" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Tidak</span>
										<input name="riwayat_bawaan" value="Y" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Ya,</span>
										<input name="riwayat_bawaan_desc" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<p class="desc-f-i-rek-on-left" style="margin-right:15px;">
											Lingkungan kerja yang disenangi *
										</p>
										<input name="lingkungan" value="Kantor" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio" style="margin-right:10px;">Kantor</span>
										<input name="lingkungan" value="Lapangan" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio" style="margin-right:10px;">Lapangan</span>
										<input name="lingkungan" type="radio" value="Lainnya" class="i-f-radio-but">
										<span class="text-i-f-radio">Lainnya</span>
										<input name="lingkungan_desc" type="text" class="f-i-rek-on" style="display: inline-block;width:100%;max-width:135px;">
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja2.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek" id="lowongan_step_2" >Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 3 -->
				<div class="item" id="lowongan3">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle3"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">keluarga</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Status Pernikahan *</span>
										</div>
										<input name="status_nikah" value="Belum" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Belum Menikah, rencana menikah pada tahun</span>
										<select name="rencana_nikah_thn" id="status_nikah_belum" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
											<?php
											for($i=2015; $i<=2050; $i+=1){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<input name="status_nikah" value="Sudah" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Sudah Menikah, menikah pada </span>
										<select name="nikah_bulan" id="nikah_bulan" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
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
										<select name="nikah_tahun" id="nikah_tahun" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
											<?php
											for($i=1950; $i<=2020; $i+=1){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<input name="status_nikah" value="Duda atau janda" type="radio" class="i-f-radio-but">
										<span class="text-i-f-radio">Duda/Janda</span>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Bagi Yang Sudah Menikah *</span>
										</div>
										<table class="table-input-low-p peng-kredit2">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 25%;">Nama Anggota Keluarga</td>
												<td style="width: 15%;">Tanggal Lahir</td>
												<td style="width: 10%;">L/P</td>
												<td style="width: 15%;">Pekerjaan</td>
												<td style="width: 15%;">No Telp</td>
												<td style="width: 15%;">Pendidikan Terakhir</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<input name="keluarga_nama[]" type="text" class="f-i-rek-on2" placeholder="Suami/Istri">
												</td>
												<td>
													<input name="keluarga_tgl_lahir[]" type="text" class="maskdate f-i-rek-on2" placeholder="DD-MM-YYYY">
												</td>
												<td>
													<select name="keluarga_jk[]"  class="s-f-t-rek-on2">
														<option value="2">L</option>
														<option value="1">P</option>
													</select>
												</td>
												<td>
													<input name="keluarga_job[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="keluarga_no_tlp[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<select name="keluarga_pendidikan[]"  class="s-f-t-rek-on2">
														<option value="3" >S1</option>
														<option value="2" >S2</option>
														<option value="1" >S3</option>
														<option value="4" >D1</option>
														<option value="5" >D2</option>
														<option value="6" >D3</option>
														<option value="7" >SMA/SMK/STM</option>
														<option value="8" >SMP</option>
														<option value="9" >SD</option>
													
													</select>
												</td>
											</tr>
											<tr>
												<td class="text-center">2</td>
												<td>
													<input name="keluarga_nama[]" type="text" class="f-i-rek-on2" placeholder="Anak">
												</td>
												<td>
													<input name="keluarga_tgl_lahir[]" type="text" class="maskdate f-i-rek-on2" placeholder="DD-MM-YYYY">
												</td>
												<td>
													<select name="keluarga_jk[]"  class="s-f-t-rek-on2">
														<option value="2">L</option>
														<option value="1">P</option>
													</select>
												</td>
												<td>
													<input name="keluarga_job[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="keluarga_no_tlp[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<select name="keluarga_pendidikan[]"  class="s-f-t-rek-on2">
														<option value="3" >S1</option>
														<option value="2" >S2</option>
														<option value="1" >S3</option>
														<option value="4" >D1</option>
														<option value="5" >D2</option>
														<option value="6" >D3</option>
														<option value="7" >SMA/SMK/STM</option>
														<option value="8" >SMP</option>
														<option value="9" >SD</option>												
													</select>
												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit2"></i>
										</table>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Orang Tua *</span>
										</div>
										<table class="table-input-low-p peng-kredit3">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 20%;">Nama Orang Tua</td>
												<td style="width: 14%;">Tanggal Lahir</td>
												<td style="width: 5%;">L/P</td>
												<td style="width: 14%;">Pekerjaan</td>
												<td style="width: 14%;">Nama Perusahaan</td>
												<td style="width: 14%;">No Telp</td>
												<td style="width: 14%;">Pendidikan Terakhir</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<input name="ortu_name[]" id="ortu_name" type="text" class="ortu_name f-i-rek-on2" placeholder="Ayah">
												</td>
												<td>
													<input name="ortu_tgl_lahir[]" id="ortu_tgl_lahir" type="text" class="maskdate f-i-rek-on2" placeholder="DD-MM-YYYY">
												</td>
												<td>
													<select name="ortu_jk[]" class="s-f-t-rek-on2">
														<option value="2">L</option>
														<option value="1">P</option>
													</select>
												</td>
												<td>
													<input name="ortu_job[]" id="ortu_job" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="ortu_job_kantor[]" id="ortu_job_kantor" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="ortu_no_tlp[]" id="ortu_no_tlp" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<select name="ortu_pendidikan[]" id="" class="s-f-t-rek-on2">
														<option value="3" >S1</option>
														<option value="2" >S2</option>
														<option value="1" >S3</option>
														<option value="4" >D1</option>
														<option value="5" >D2</option>
														<option value="6" >D3</option>
														<option value="7" >SMA/SMK/STM</option>
														<option value="8" >SMP</option>
														<option value="9" >SD</option>
													</select>
												</td>
											</tr>
											<tr>
												<td class="text-center">2</td>
												<td>
													<input name="ortu_name[]" type="text" class="f-i-rek-on2" placeholder="Ibu">
												</td>
												<td>
													<input name="ortu_tgl_lahir[]" type="text" class="maskdate f-i-rek-on2" placeholder="DD-MM-YYYY">
												</td>
												<td>
													<select name="ortu_jk[]" class="s-f-t-rek-on2">
														<option value="2">L</option>
														<option value="1">P</option>
													</select>
												</td>
												<td>
													<input name="ortu_job[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="ortu_job_kantor[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="ortu_no_tlp[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<select name="ortu_pendidikan[]" id="" class="s-f-t-rek-on2">
														<option value="3" >S1</option>
														<option value="2" >S2</option>
														<option value="1" >S3</option>
														<option value="4" >D1</option>
														<option value="5" >D2</option>
														<option value="6" >D3</option>
														<option value="7" >SMA/SMK/STM</option>
														<option value="8" >SMP</option>
														<option value="9" >SD</option>
													</select>
												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit3"></i>
										</table>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Saudara Kandung(Termasuk Anda)*</span>
										</div>
										<table class="table-input-low-p peng-kredit4">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 17%;">Nama</td>
												<td style="width: 14%;">Tanggal Lahir</td>
												<td style="width: 5%;">Status Pernikahan</td>
												<td style="width: 5%;">L/P</td>
												<td style="width: 14%;">Pekerjaan</td>
												<td style="width: 14%;">Nama Perusahaan</td>
												<td style="width: 12%;">No Telp</td>
												<td style="width: 14%;">Pendidikan Terakhir</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<input name="saudara_name[]" id="saudara_name" type="text" class="f-i-rek-on2" placeholder="Saudara Kandung">
												</td>
												<td>
													<input name="saudara_tgl_lahir[]" id="saudara_tgl_lahir" type="text" class="maskdate f-i-rek-on2" placeholder="DD-MM-YYYY">
												</td>
												<td>
													<select name="saudara_status_nikah[]" class="s-f-t-rek-on2">
														<option value="Sudah Menikah">Sudah Menikah</option>
														<option value="Belum Menikah">Belum Menikah</option>
														<option value="Duda/Janda">Duda/Janda</option>
													</select>
												</td>
												<td>
													<select name="saudara_jk[]" id="" class="s-f-t-rek-on2">
														<option value="2">L</option>
														<option value="1">P</option>
													</select>
												</td>
												<td>
													<input name="saudara_job[]" id="saudara_job" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="saudara_job_kantor[]" id="saudara_job_kantor" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="saudara_no_tlp[]" id="saudara_no_tlp" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<select name="saudara_pendidikan[]" class="s-f-t-rek-on2">
														<option value="3" >S1</option>
														<option value="2" >S2</option>
														<option value="1" >S3</option>
														<option value="4" >D1</option>
														<option value="5" >D2</option>
														<option value="6" >D3</option>
														<option value="7" >SMA/SMK/STM</option>
														<option value="8" >SMP</option>
														<option value="9" >SD</option>
													</select>
												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit4"></i>
										</table>
									</div>
								</div>
							</div>



						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja3.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek" id="lowongan_step_3">Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 4 -->
				<div class="item" id="lowongan4">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle4"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Riwayat Pendidikan *</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<table class="table-input-low-p">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 20%;">Jenjang</td>
												<td style="width: 20%;">Nama Sekolah</td>
												<td style="width: 25%;">Jurusan</td>
												<td style="width: 12%;">Tahun Masuk</td>
												<td style="width: 12%;">Tahun Lulus</td>
												<td style="width: 6%;">IPK</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<input name="pendidikan_name[]" id="pendidikan_name" type="text" class="f-i-rek-on2" placeholder="SMA/Sederajat">
												</td>
												<td>
													<input name="pendidikan_sekolah[]" id="pendidikan_sekolah" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="pendidikan_jurusan[]" id="pendidikan_jurusan" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="pendidikan_thn_masuk[]"  class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
													</select>
												</td>
												<td>
													<select name="pendidikan_thn_lulus[]" id="" class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>														
													</select>
												</td>
												<td>
													<input name="pendidikan_ipk[]" id="pendidikan_ipk" type="text" class="f-i-rek-on2" placeholder="">
												</td>
											</tr>
											<tr>
												<td class="text-center">2</td>
												<td>
													<input name="pendidikan_name[]" id="pendidikan_name2" type="text" class="f-i-rek-on2" placeholder="Diploma 1">
												</td>
												<td>
													<input name="pendidikan_sekolah[]" id="pendidikan_sekolah2"  type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="pendidikan_jurusan[]" id="pendidikan_jurusan2" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="pendidikan_thn_masuk[]"  class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
													</select>
												</td>
												<td>
													<select name="pendidikan_thn_lulus[]" id="" class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>														
													</select>
												</td>
												<td>
													<input name="pendidikan_ipk[]" id="pendidikan_ipk2"  type="text" class="f-i-rek-on2" placeholder="">
												</td>
											</tr>
											<tr>
												<td class="text-center">3</td>
												<td>
													<input name="pendidikan_name[]" type="text" class="f-i-rek-on2" placeholder="Diploma 2">
												</td>
												<td>
													<input name="pendidikan_sekolah[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="pendidikan_jurusan[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="pendidikan_thn_masuk[]"  class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
													</select>
												</td>
												<td>
													<select name="pendidikan_thn_lulus[]" id="" class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>														
													</select>
												</td>
												<td>
													<input name="pendidikan_ipk[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
											</tr>
											<tr>
												<td class="text-center">4</td>
												<td>
													<input name="pendidikan_name[]" type="text" class="f-i-rek-on2" placeholder="Diploma 3">
												</td>
												<td>
													<input name="pendidikan_sekolah[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="pendidikan_jurusan[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="pendidikan_thn_masuk[]"  class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
													</select>
												</td>
												<td>
													<select name="pendidikan_thn_lulus[]" id="" class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>														
													</select>
												</td>
												<td>
													<input name="pendidikan_ipk[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
											</tr>
											<tr>
												<td class="text-center">5</td>
												<td>
													<input name="pendidikan_name[]" type="text" class="f-i-rek-on2" placeholder="Strata 1">
												</td>
												<td>
													<input name="pendidikan_sekolah[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="pendidikan_jurusan[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="pendidikan_thn_masuk[]"  class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
													</select>
												</td>
												<td>
													<select name="pendidikan_thn_lulus[]" id="" class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>														
													</select>
												</td>
												<td>
													<input name="pendidikan_ipk[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
											</tr>
											<tr>
												<td class="text-center">6</td>
												<td>
													<input name="pendidikan_name[]" type="text" class="f-i-rek-on2" placeholder="Pasca Sarjana">
												</td>
												<td>
													<input name="pendidikan_sekolah[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="pendidikan_jurusan[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="pendidikan_thn_masuk[]"  class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
													</select>
												</td>
												<td>
													<select name="pendidikan_thn_lulus[]" id="" class="s-f-t-rek-on2">
													<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>														
													</select>
												</td>
												<td>
													<input name="pendidikan_ipk[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Pendidikan Informal *</span>
										</div>
										<table class="table-input-low-p peng-kredit5">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 35%;">Jenis Kursus</td>
												<td style="width: 30%;">Nama Lembaga</td>
												<td style="width: 15%;">Tahun Masuk</td>
												<td style="width: 15%;">Tahun Lulus</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<input name="kursus_jenis[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="kursus_name[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="kursus_thn_masuk[]" class="s-f-t-rek-on2">
														<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
														?>	
													</select>
												</td>
												<td>
													<select name="kursus_thn_lulus[]" class="s-f-t-rek-on2">
														<?php
														for($i=2016; $i>=1950; $i-=1){
															echo "<option value=".$i.">".$i."</option>";
														}
														?>	
													</select>

												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit5"></i>
										</table>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Penguasaan Bahasa</span>
										</div>
										<table class="table-input-low-p peng-kredit6" style="width:93%;">
											<tr class="row-head-input-low">
												<td style="width: 50%;">Bahasa Yang Dikuasai</td>
												<td style="width: 50%;">Kategori</td>
											</tr>
											<tr>
												<td>
													<input name="bahasa[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="bahasa_kategori[]" class="s-f-t-rek-on2">
														<option value="Basic">Basic</option>
														<option value="Standart">Standart</option>
														<option value="Advance">Advance</option>
													</select>

												</td>
											</tr>
												<i class="fa fa-plus bt-add-field-loker bt-peng-kredit6"></i>
										</table>
									</div>
									<div class="col-md-6 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Penguasaan Program Komputer</span>
										</div>
										<table class="table-input-low-p peng-kredit7" style="width:93%;">
											<tr class="row-head-input-low">
												<td style="width: 50%;">Program Yang Dikuasai</td>
												<td style="width: 50%;">Kategori</td>
											</tr>
											<tr>
												<td>
													<input name="komputer_skill[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="komputer_skill_kategori[]" class="s-f-t-rek-on2">
														<option value="Basic">Basic</option>
														<option value="Standart">Standart</option>
														<option value="Advance">Advance</option>
													</select>

												</td>
											</tr>
												<i class="fa fa-plus bt-add-field-loker bt-peng-kredit7"></i>
										</table>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<div class="item-input-rek-online text-left">
											<span>Kegiatan Sosial Yang Pernah Diikuti</span>
										</div>
										<table class="table-input-low-p peng-kredit8">
											<tr class="row-head-input-low">
												<td style="width: 5%;">No.</td>
												<td style="width: 35%;">Kegiatan</td>
												<td style="width: 30%;">Nama Organisasi</td>
												<td style="width: 15%;">Jabatan</td>
												<td style="width: 15%;">Lamanya</td>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>
													<input name="kegiatan_name[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="kegiatan_organisasi[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<input name="kegiatan_jabatan[]" type="text" class="f-i-rek-on2" placeholder="">
												</td>
												<td>
													<select name="kegiatan_lamanya[]" class="s-f-t-rek-on2">
														<?php
														for($a=1; $a<=20; $a+=1){
															echo "<option value=".$a.">".$a." Tahun</option>";
														}
														?>
													</select>
												</td>
											</tr>
												<i class="fa fa-plus bt-add-field-loker bt-peng-kredit8"></i>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja4.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek" id="lowongan_step_4">Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 5 -->
				<div class="item" id="lowongan5">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle5"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Lain Lain *</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1">
												Saya bersedia di tempatkan di seluruh kantor Bank Bukopin di Indonesia termasuk anak perusahaan yang terafiliasi
											</div>
											<div class="item-text-ck-2">
												<input name="ditempatkan_wilayah" value="Y" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Ya</span>
												<input name="ditempatkan_wilayah" value="N" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Tidak</span>
											</div>
										</div>
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1" style="width:100%;">
												Bila Ya, cabang2 manakah yang Anda pilih? (kecuali cabang tempat domisili Anda sekarang)
											</div>
										</div>
										<textarea name="ditempatkan_wilayah_desc" id="ditempatkan_wilayah_desc" class="f-text-rek-on2" id="ditempatkan_wilayah_desc" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1">
												Saya bersedia ditempatkan di bagian/posisi lain
											</div>
											<div class="item-text-ck-2">
												<input name="ditempatkan_bagian" value="Y" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Ya</span>
												<input name="ditempatkan_bagian" value="N" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Tidak</span>
											</div>
										</div>
										<textarea name="ditempatkan_bagian_desc" class="f-text-rek-on2" id="ditempatkan_bagian_desc" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1">
												Apakah anda pernah melamar atau mengikuti tes di perusahaan ini sebelumnya? Kapan dan Sebagai Apa?
											</div>
											<div class="item-text-ck-2">
												<input name="pernah_tes" value="Y" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Ya</span>
												<input name="pernah_tes" value="N" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Tidak</span>
											</div>
										</div>
										<textarea name="pernah_tes_desc" class="f-text-rek-on2" id="pernah_tes_desc" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1">
												Apakah Anda terikat Kontrak pada perusahaan lain? Sampai Kapan dan Dimana?
											</div>
											<div class="item-text-ck-2">
												<input name="terikat_kontrak" value="Y" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Ya</span>
												<input type="radio" class="i-f-radio-but">
												<span name="terikat_kontrak" value="N" class="text-i-f-radio">Tidak</span>
											</div>
										</div>
										<textarea name="terikat_kontrak_desc" class="f-text-rek-on2" id="terikat_kontrak_desc" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1">
												Apakah anda mengikuti proses test di perusahaan lain selain di perusahaan ini? Perusahaan apa dan Sampai dimana?
											</div>
											<div class="item-text-ck-2">
												<input name="pernah_tes_lain" value="Y" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Ya</span>
												<input name="pernah_tes_lain" value="N" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Tidak</span>
											</div>
										</div>
										<textarea name="pernah_tes_lain_desc" class="f-text-rek-on2" id="pernah_tes_lain_desc" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="wrap-text-ck-top">
											<div class="item-text-ck-1">
												Apakah anda masih mendapatkan bantuan financial? Dari siapa?
											</div>
											<div class="item-text-ck-2">
												<input name="bantuan_finansial" value="Y"  type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Ya</span>
												<input name="bantuan_finansial" value="N" type="radio" class="i-f-radio-but">
												<span class="text-i-f-radio">Tidak</span>
											</div>
										</div>
										<textarea name="bantuan_finansial_desc" class="f-text-rek-on2" id="bantuan_finansial_desc" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="notice-bottom-input">
								*Cabang Bank Bukopin (per Januari 2016):  Jakarta (Pusat), Banda Aceh, Bandar Lampung, Padang, Jambi, Palembang, Medan, Batam, Tj. Pinang, Bandung, Bogor, Karawang, Tasikmalaya, Cilegon, Cirebon, Tegal, Malang, Solo, Semarang, Purwokerto, Yogyakarta, Probolinggo, Surabaya, Jember, Malang, Sidoarjo, Mataram, Denpasar, Samarinda, Balikpapan, Pontianak, Banjarmasin, Kupang, Pare-Pare, Makassar, Manado, Pekanbaru, Magelang, Sukabumi, Kediri, Madiun, Palu, Sorong,
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja5.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek" id="lowongan_step_5">Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 6 -->
				<div class="item" id="lowongan6">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle6"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Kegiatan Lainnya</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="item-input-rek-online text-left" style="padding-left:5px;">
										<span>Kegiatan Sosial Yang Pernah Diikuti</span>
									</div>
									<div class="col-md-6">
										<textarea name="kegiatan_sosial[]" class="f-text-rek-on2" placeholder="1."></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="kegiatan_sosial[]" class="f-text-rek-on2" placeholder="2."></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="kegiatan_sosial[]" class="f-text-rek-on2" placeholder="3."></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="kegiatan_sosial[]" class="f-text-rek-on2" placeholder="4."></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="kegiatan_sosial[]" class="f-text-rek-on2" placeholder="5."></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="kegiatan_sosial[]" class="f-text-rek-on2" placeholder="6."></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Adakah pekerjaan yang dilakukan seminggu sekali? Bila ada, uraikanlah!</span>
										</div>
										<textarea name="kegiatan_mingguan" class="f-text-rek-on2" id="kegiatan_mingguan" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Adakah pekerjaan yang dilakukan bulanan? Bila ada, uraikanlah!</span>
										</div>
										<textarea name="kegiatan_bulanan" class="f-text-rek-on2" id="kegiatan_bulanan" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Menurut pendapat anda, pekerjaan anda lebih merupakan tugas perorangan/tugas kelompok? Uraikanlah lebih lanjut!</span>
										</div>
										<textarea name="pendapat_pekerjaan" class="f-text-rek-on2" id="pendapat_pekerjaan" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="item-input-rek-online text-left" style="padding-left:5px;">
										<span>Secara keseluruhan, hal-hal apakah yang menurut anda merupakan factor pendukung bagi keberhasilan anda dalam tugas sekarang ini?</span>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_pendukung_keberhasilan[]" id="faktor_pendukung_keberhasilan" class="f-text-rek-on2" placeholder="Dari anda sendiri"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_pendukung_keberhasilan[]"  class="f-text-rek-on2" placeholder="Dari teman teman sekantor pada umumnya"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_pendukung_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari atasan anda"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_pendukung_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari klien anda (pemakai jasa perusahaan ini)"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_pendukung_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari bawahan anda"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja6.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek" id="lowongan_step_6">Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 7 -->
				<div class="item" id="lowongan7">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle7"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Kegiatan Lainnya</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="item-input-rek-online text-left" style="padding-left:5px;">
										<span>Uraikanlah hal-hal yang menurut anda penghambat dari keberhasilan tugas Anda sekarang ini!</span>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_penghambat_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari anda"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_penghambat_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari atasan anda"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_penghambat_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari bawahan anda"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_penghambat_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari teman teman sekantor pada umumnya"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_penghambat_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari kebijakan perusahaan"></textarea>
									</div>
									<div class="col-md-6">
										<textarea name="faktor_penghambat_keberhasilan[]" class="f-text-rek-on2" placeholder="Dari klien anda(pemakai jasa perusahaan ini)"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Uraikanlah hal-hal yang menurut anda berpeluang untuk menjadi penghambat dari keberhasilan tugas Anda kini:</span>
										</div>
										<textarea name="peluang_penghambat" class="f-text-rek-on2" id="peluang_penghambat" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Seandainya anda mengalami keraguan/kesulitan dalam bekerja, apa yang Anda lakukan dan pada siapa biasanya Anda bertanya?</span>
										</div>
										<textarea name="kesulitan_dlm_kerja" class="f-text-rek-on2" id="kesulitan_dlm_kerja" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Mengapa anda memutuskan untuk tetap bekerja di perusahaan ini sampai kini? Jelaskanlah jawaban anda</span>
										</div>
										<textarea name="alasan_masih_bekerja" class="f-text-rek-on2" id="alasan_masih_bekerja" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Tuliskanlah 3 keuntungan/manfaat yang anda rasakan telah Anda peroleh karena Anda bekerja di Perusahaan ini!</span>
										</div>
										<textarea name="manfaat_kerja_skrg" class="f-text-rek-on2" id="manfaat_kerja_skrg" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Tuliskanlah 3 hal yang dapat menjadi penyebab Anda tidak bersedia lagi bekerja di Perusahaan ini</span>
										</div>
										<textarea name="penyebab_resign" class="f-text-rek-on2" id="penyebab_resign" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Bila Anda memiliki waktu luang, kegiatan apa yang Anda lakukan?</span>
										</div>
										<textarea name="kegiatan_luang" class="f-text-rek-on2" id="kegiatan_luang" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Tuliskanlah hobby (kegemaran) yang anda lakukan secara serius dan teratur!</span>
										</div>
										<textarea name="hobby" class="f-text-rek-on2" id="hobby" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja7.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek"  id="lowongan_step_7" >Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 8 -->
				<div class="item" id="lowongan8">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle8"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Riwayat Pekerjaan</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-input-rek-online text-left">
											<span>Tuliskan seluruh pengalaman kerja Anda, yang dimulai dari pekerjaan Anda yang paling terahir atau pekerjaan Anda saat ini apabila Anda sekarang masih bekerja.</span>
										</div>
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">Pekerjaan Terakhir</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="last_job_name" type="text" class="f-i-rek-on" placeholder="Nama Perusahaan">
									</div>
									<div class="col-md-6">
										<input name="last_job_alamat" type="text" class="f-i-rek-on" placeholder="Alamat Perusahaan">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="last_job_jabatan" type="text" class="f-i-rek-on" placeholder="Jabatan">
									</div>
									<div class="col-md-6">
										<input name="last_job_laporke" type="text" class="f-i-rek-on" placeholder="Melapor Kepada">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="input-f-res" style="min-width:300px;">
											<p class="desc-f-i-rek-on-left">
												Masa Kerja
											</p>
											<select name="last_job_dari_bulan" id="last_job_dari_bulan" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
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
											<select name="last_job_dari_tahun" id="last_job_dari_tahun" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
												<?php
												for($i=1950; $i<=2020; $i+=1){
													echo "<option value=".$i.">".$i."</option>";
												}
												?>
												
											</select>
										</div>
										<div class="input-f-res" style="min-width:300px;">
											<p class="desc-f-i-rek-on-left">
												Sampai
											</p>
											<select name="last_job_sampai_bulan" id="last_job_sampai_bulan" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
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
											<select name="last_job_sampai_tahun" id="last_job_sampai_tahun" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
											<?php
											for($i=1950; $i<=2020; $i+=1){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<p class="desc-f-i-rek-on-top">
											Deskripsi Pekerjaan
										</p>
										<textarea name="last_job_desc" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="last_job_jenis_usaha" type="text" class="f-i-rek-on" placeholder="Jenis Usaha">
									</div>
									<div class="col-md-6">
										<input name="last_job_gaji" type="text" class="f-i-rek-on" placeholder="Besar Gaji">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="last_job_atasan" type="text" class="f-i-rek-on" placeholder="Nama Atasan/ SDM yang bisa di Konfirmasi">
									</div>
									<div class="col-md-6">
										<input name="last_job_no_tlp" type="text" class="f-i-rek-on" placeholder="No. Tlp Kantor:">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<p class="desc-f-i-rek-on-top">
											Alasan Berhenti
										</p>
										<textarea name="last_job_alasan_resign" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">Pekerjaan Sebelumnya</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="job_sblmnya_name" type="text" class="f-i-rek-on" placeholder="Nama Perusahaan">
									</div>
									<div class="col-md-6">
										<input name="job_sblmnya_alamat" type="text" class="f-i-rek-on" placeholder="Alamat Perusahaan">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="job_sblmnya_jabatan" type="text" class="f-i-rek-on" placeholder="Jabatan">
									</div>
									<div class="col-md-6">
										<input name="job_sblmnya_laporke" type="text" class="f-i-rek-on" placeholder="Melapor Kepada">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<div class="input-f-res" style="min-width:300px;">
											<p class="desc-f-i-rek-on-left">
												Masa Kerja
											</p>
											<select name="job_sblmnya_dari_bulan" id="" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
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
											<select name="job_sblmnya_dari_tahun" id="" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
											<?php
											for($i=1950; $i<=2020; $i+=1){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
											</select>
										</div>
										<div class="input-f-res" style="min-width:300px;">
											<p class="desc-f-i-rek-on-left">
												Sampai
											</p>
											<select name="job_sblmnya_sampai_bulan" id="" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
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
											<select name="job_sblmnya_sampai_tahun" id="" class="s-f-t-rek-on" style="display: inline-block;width:100%;max-width:100px;">
											<?php
											for($i=1950; $i<=2020; $i+=1){
												echo "<option value=".$i.">".$i."</option>";
											}
											?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<p class="desc-f-i-rek-on-top">
											Deskripsi Pekerjaan
										</p>
										<textarea name="job_sblmnya_desc" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="job_sblmnya_jenis_usaha" type="text" class="f-i-rek-on" placeholder="Jenis Usaha">
									</div>
									<div class="col-md-6">
										<input name="job_sblmnya_gaji" type="text" class="f-i-rek-on" placeholder="Besar Gaji">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-6">
										<input name="job_sblmnya_atasan" type="text" class="f-i-rek-on" placeholder="Nama Atasan/ SDM yang bisa di Konfirmasi">
									</div>
									<div class="col-md-6">
										<input name="job_sblmnya_no_tlp" type="text" class="f-i-rek-on" placeholder="No. Tlp Kantor:">
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-lg-12">
										<p class="desc-f-i-rek-on-top">
											Alasan Berhenti
										</p>
										<textarea name="job_sblmnya_alasan_resign" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja8.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek"  id="lowongan_step_8" >Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 9 -->
				<div class="item" id="lowongan9">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle9"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Gambaran Karir Yang Anda Inginkan</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
										Tuliskan Deskripsi ( gambaran ) yang jelas dari karir / pekerjaan yang Anda inginkan :
									</p>
									<div class="col-md-12">
										<textarea name="gambaran_karir" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
										Besar Gaji & Tunjangan – tunjangan yang diharapkan :
									</p>
									<div class="col-md-12">
										<textarea name="harapan_gaji" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
										Gambarkan posisi jabatan terakhir saudara pada struktur organisasi (jika sudah pernah bekerja)
									</p>
									<div class="col-md-12">
										<textarea name="harapan_posisi" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="rek-on-head-title">Referensi</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
											Nama Teman / Relasi yang sudah bekerja di BANK BUKOPIN
										</p>
										<table class="table-input-low-p peng-kredit9">
											<tr class="row-head-input-low">
												<td style="width: 33%;">Nama</td>
												<td style="width: 34%;">Jabatan/Unit Kerja</td>
												<td style="width: 33%;">Jenis Hubungan</td>
											</tr>
											<tr>
												<td>
													<input name="relasi_bukopin_name[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="relasi_bukopin_jabatan[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="relasi_bukopin_hubungan[]" type="text" class="f-i-rek-on2">
												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit9"></i>
										</table>
									</div>
								</div>
							</div>
							<div class="item-input-rek-online">
								<div class="row">
									<div class="col-lg-12 tb-overflow">
										<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
											Nama Teman / Atasan / Relasi di tempat kerja sebalumnya
										</p>
										<table class="table-input-low-p peng-kredit10">
											<tr class="row-head-input-low">
												<td style="width: 33%;">Nama</td>
												<td style="width: 34%;">Jabatan/Unit Kerja</td>
												<td style="width: 33%;">Jenis Hubungan</td>
											</tr>
											<tr>
												<td>
													<input name="relasi_kantor_name[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="relasi_kantor_jabatan[]" type="text" class="f-i-rek-on2">
												</td>
												<td>
													<input name="relasi_kantor_hubungan[]" type="text" class="f-i-rek-on2">
												</td>
											</tr>
											<i class="fa fa-plus bt-add-field-loker bt-peng-kredit10"></i>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja9.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" class="nav-next-rek" id="lowongan_step_9">Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 10 -->
				<div class="item" id="lowongan10">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle10"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="rek-on-head-title">Deskripsikan tentang diri Anda atau karakter anda</div>
							<div class="item-input-rek-online text-left">
								<div class="row">
									<div class="col-md-12">
										<textarea name="deskripsi_diri" class="f-text-rek-on2" id="" placeholder="Penjelasan"></textarea>
									</div>
								</div>
							</div>
							<div class="box-syarat-ket box-ja-checkbox">
								<div class="item-box-ja-1">
									<input name="chk_faq" id="chk_faq" value="1" type="checkbox">
								</div>
								<div class="item-box-ja-2">
									<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
										Dengan ini saya menyatakan bahwa :
									</p>
									<ul class="list-item-syarat2">
										<li>
											<div class="list-syaket-no">1.</div>
											<div class="list-syaket-item">Belum pernah bekerja sebagai staf reguler (bukan outsourcing) di seluruh cabang PT Bank Bukopin, Tbk di seluruh Indonesia.</div>
											<div class="clear"></div>
										</li>
										<li>
											<div class="list-syaket-no">2.</div>
											<div class="list-syaket-item">Tidak pernah diberhentikan dengan tidak hormat dari instansi atau badan hukum pemerintah maupun swasta.</div>
											<div class="clear"></div>
										</li>
										<li>
											<div class="list-syaket-no">3.</div>
											<div class="list-syaket-item">Tidak pernah dihukum karena melakukan tindak pidana kejahatan dan kegiatan teroris.</div>
											<div class="clear"></div>
										</li>
										<li>
											<div class="list-syaket-no">4.</div>
											<div class="list-syaket-item">Saya bersedia dilakukan Bank Cheking dalam bentuk apapun dan saya menyatakan bahwa tidak memiliki tuggakan atau kredit macet.</div>
											<div class="clear"></div>
										</li>
									</ul>
								</div>
								<div class="clear"></div>
							</div>
							<div class="box-syarat-ket box-ja-checkbox">
								<div class="item-box-ja-1">
									<input name="chk_setuju" id="chk_setuju" value="1" type="checkbox">
								</div>
								<div class="item-box-ja-2">
									<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
										Saya menyatakan bahwa semua keterangan / pernyataan diatas adalah benar dan menyadari bahwa apabila keterangan /pernyataan tersebut tidak benar, maka saya dapat diberhentikan bekerja setiap waktu.
									</p>
								</div>
								<div class="clear"></div>
							</div>
							<div class="box-syarat-ket box-ja-checkbox">
								<div class="item-box-ja-1">
									<input name="chk_setuju2" id="chk_setuju2" value="1" type="checkbox">
								</div>
								<div class="item-box-ja-2">
									<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
										Dalam hubungannya dengan lamaran kerja ini, Saya memberikan wewenang kepada Bank Bukopin untuk memperoleh atau mendapatkan data yang lebih jelas tentang Saya maupun kebenaran keterangan-keterangan  di atas kepada pihak tertentu.
									</p>
								</div>
								<div class="clear"></div>
							</div>
							<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
								Upload Foto Berwarna (maksimal 500 kb) *
							</p>
							<div class="box-syarat-ket box-ja-checkbox" style="border:1px solid #c2c2c2">
								<div class="row">
									<div class="col-lg-12">
										<div class="item-file-upload-loker">
											<input name="userfile" id="userfile" type="file" class="cus-file-up">
										</div>
										<div class="bt-upload-cus-add">
											add
										</div>
										<div class="bt-upload-cus-remove" >
											remove
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="img-step-rek2">
							<img src="<?php echo site_url('assets/img/ja10.png');?>" alt="">
						</div>
						<span class="note-w">* Wajib Diisi</span>
						<div class="bt-next-popup-syaket">
							<a href="#" class="nav-prev-rek">sebelumnya</a>
							<a href="#" id="submit_form" class="nav-next-rek" >Selanjutnya</a>
						</div>
					</div>
				</div>
				<!-- Popup Lowongan Pekerjaan 11 -->
				<div class="item" id="lowongan11">
					<div class="item-slider-rek-online">
						<h2>job application form</h2>
						<h4>Posisi Yang Dilamar: <span id="jobtitle11"></span></h4>
						<div class="wrap-input-form-rek-online">
							<div class="box-syarat-ket box-ja-checkbox">
							<div id="resultdivjob">
								<ul class="list-item-syarat2">
									<li>
										<div class="list-syaket-no">1.</div>
										<div class="list-syaket-item">Setiap pelamar hanya mengisi 1 (satu) formulir lamaran untuk 1 (satu) lowongan pekerjaan;</div>
										<div class="clear"></div>
									</li>
									<li>
										<div class="list-syaket-no">2.</div>
										<div class="list-syaket-item">Bagi pelamar yang pernah mengisi data diri pada formulir lamaran, diwajibkan untuk memperbarui lamaran dengan mengisi form sesuai posisi yang dibuka;</div>
										<div class="clear"></div>
									</li>
									<li>
										<div class="list-syaket-no">3.</div>
										<div class="list-syaket-item">Setiap pelamar wajib menyimpan hasil pengisian formulir lamaran yang berupa file pdf, dikarenakan formulir lamaran tersebut akan dibawa saat tes awal.</div>
										<div class="clear"></div>
									</li>
									<li>
										<div class="list-syaket-no">4.</div>
										<div class="list-syaket-item">Untuk pengumuman hasil seleksi akan diumumkan melalui email atau sms blast kepada pelamar yang lulus tahapan administrasi Hanya kandidat terbaik (shortlisted candidates) dengan mempertimbangkan aspek-aspek keseluruhan</div>
										<div class="clear"></div>
									</li>
									<li>
										<div class="list-syaket-no">5.</div>
										<div class="list-syaket-item">yang akan diproses ke tahap selanjutnya;Keputusan hasil seleksi merupakan wewenang Bank Bukopin yang bersifat mutlak dan tidak dapat</div>
										<div class="clear"></div>
									</li>
									<li>
										<div class="list-syaket-no">6.</div>
										<div class="list-syaket-item">diganggu gugat.</div>
										<div class="clear"></div>
									</li>
								</ul>
							</div>
							</div>
							<p class="desc-f-i-rek-on-top" style="padding-left:5px;">
								<b>PERINGATAN!</b> Hati-hati terhadap penipuan. Bank Bukopin tidak memungut biaya apapun selama proses seleksi.
							</p>
							<div class="bt-save-pdf">
								<a href="#"><!-- <i class="fa fa-file-pdf-o"></i> -->
								Tutup</a>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		</form>
	</div>
	
<script type="text/javascript">
	$('.maskdate').mask('00-00-0000');
</script>	
<?php echo $footer;?>





<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $slider;?>
<!-- HOME -->
<!-- button big on slider -->
<div class="bt-big-3-col bt-big-3-col-content">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="item-bt-big-3-col">
               <a href="#"></a>
               <div class="bt-big-3-col-icon">
                  <img src="<?php echo base_url('assets/img/bti1.png');?>" alt="">
               </div>
               <div class="bt-big-3-col-title">
                  <h2>produk dana</h2>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="item-bt-big-3-col">
               <a href="#"></a>
               <div class="bt-big-3-col-icon">
                  <img src="<?php echo base_url('assets/img/bti2.png');?>" alt="">
               </div>
               <div class="bt-big-3-col-title">
                  <h2>produk kredit</h2>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="item-bt-big-3-col">
               <a href="#"></a>
               <div class="bt-big-3-col-icon">
                  <img src="<?php echo base_url('assets/img/bti3.png');?>" alt="">
               </div>
               <div class="bt-big-3-col-title">
                  <h2>layanan</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- content -->
<div class="wrap-content wrap-content-home">
   <div class="container">
      <div class="section-1">
         <div class="row">
            <div class="col-md-8">
               <div class="tab-log-reg">
                  <input id="tab1" type="radio" name="tabs" checked />
                  <label for="tab1">Pengumuman</label>
                  <input id="tab2" type="radio" name="tabs" />
                  <label for="tab2">siaran pers</label>
                  <section id="content1">
                     <div class="head-tab-content-1">
                        <div class="row">
                           <div class="col-md-12 tab-c-link-all">
                              <a href="<?php echo base_url('page/berita');?>">LIHAT SEMUA BERITA <i class="fa fa-bars"></i></a>
                           </div>
                        </div>
                     </div>
					 <?php foreach ($recent_post as $c) { ?>					 
                     <!-- item -->
                     <div class="item-tab-content-1">
                        <div class="item-t-c-1-date">
							<?php
							$p_satu = explode(' ', $c['datepost']);
							$tgl = explode('-', $p_satu[0]);
							$bulan = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
							?>
							<?php echo $tgl[2]; ?> <?php echo $bulan[($tgl[1] - 1)]; ?>
							<?php echo $tgl[0]; ?> 
                        </div>
                        <div class="item-t-c-1-link">
                           <a href="<?php echo base_url('read'); ?>/<?php echo $c['id_post']; ?>-<?php echo $c['seotitle']; ?>"><?php echo $c['title']; ?></a>
						   <?php //echo word_limiter(strip_tags($c['content'], '<br><p><a>'),20); ?>
                        </div>
                     </div>
				  <?php } ?>
                  </section>
                  <section id="content2">
                     <div class="head-tab-content-1">
                        <div class="row">
                           <div class="col-md-12 tab-c-link-all">
                              <a href="<?php echo base_url('page/siaran-pers');?>">LIHAT SEMUA SIARAN PERS <i class="fa fa-bars"></i></a>
                           </div>
                        </div>
                     </div>
					 <?php foreach ($siaran_pers as $c) { ?>					 
                     <!-- item -->
                     <div class="item-tab-content-1">
                        <div class="item-t-c-1-date">
							<?php
							$p_satu = explode(' ', $c['datepost']);
							$tgl = explode('-', $p_satu[0]);
							$bulan = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
							?>
							<?php echo $tgl[2]; ?> <?php echo $bulan[($tgl[1] - 1)]; ?>
							<?php echo $tgl[0]; ?> 
                        </div>
                        <div class="item-t-c-1-link">
                           <a href="<?php echo base_url('read'); ?>/<?php echo $c['id_post']; ?>-<?php echo $c['seotitle']; ?>"><?php echo $c['title']; ?></a>
						   <?php //echo word_limiter(strip_tags($c['content'], '<br><p><a>'),20); ?>
                        </div>
                     </div>
				  <?php } ?>
                  </section>
               </div>
            </div>
            <div class="col-md-4">
            <?php foreach ($kurs as $key => $val) { 
                  echo $val['content'];
            } ?>
<!--                <div class="wrap-tab-kurs">
                  <div class="tab-kurs-bukopin-head">kurs bukopin</div>
               </div>
               <div class="tab-kurs-item">
                  <div class="row tab-kurs-title">
                     <div class="col-xs-4">mata uang</div>
                     <div class="col-xs-4">jual</div>
                     <div class="col-xs-4">beli</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">usd</div>
                     <div class="col-xs-4">13.00.00</div>
                     <div class="col-xs-4">13.00.00</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">sgd</div>
                     <div class="col-xs-4">9000.33</div>
                     <div class="col-xs-4">9000.33</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">eur</div>
                     <div class="col-xs-4">14.420.00</div>
                     <div class="col-xs-4">14.420.00</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">gbp</div>
                     <div class="col-xs-4">15.420.00</div>
                     <div class="col-xs-4">15.420.00</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">aud</div>
                     <div class="col-xs-4">10.800.00</div>
                     <div class="col-xs-4">10.800.00</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">jpy</div>
                     <div class="col-xs-4">15.880.00</div>
                     <div class="col-xs-4">15.880.00</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-xs-4">hkd</div>
                     <div class="col-xs-4">10.234.00</div>
                     <div class="col-xs-4">10.234.00</div>
                  </div>
                  <div class="row tab-kurs-row">
                     <div class="col-lg-12">12-februari-2016 08:24 WIB</div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
	  
		<div class="section-2 row">
			<div class="col-sm-6">
				<div class="section-2-head text-center">Suku Bunga Dasar Kredit (%)</div>
				<div class="section-2-item">
					<table>
					<tr class="heading">
					<td colspan="2" rowspan="2" class="text-center"><b>Jenis</b></td>
					<td rowspan="2" class="sec-2-tab-bg text-center"><b>kredit korporasi</b></td>
					<td rowspan="2" class="text-center"><b>kredit ritel</b></td>
					<td rowspan="2" class="sec-2-tab-bg text-center"><b>kredit mikro</b></td>
					<td colspan="2" class="text-center"><b>kredit konsumsi</b></td>
					</tr>
					<tr>
					<td class="text-center">KPR</td>
					<td class="sec-2-tab-bg text-center">NON KPR</td>
					</tr>
					<tr>
					<td colspan="2">
					<!-- Suku Bunga Dasar Kredit<br>(Prime Lending Rate) -->
                                        <a href="<?php echo base_url('pages/26-sbdk'); ?>"><img src="<?php echo base_url('assets/images/Picture2.png'); ?>" width="135px"></a>
					</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">13,05</td>
					<td class="text-center s-tab-blue">13,34</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">17,10</td>
					<td class="text-center s-tab-blue">12,93</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">12,89</td>
					</tr>
					</table>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="section-2-head text-center">Suku Bunga Deposito (%)</div>
				<div class="section-2-item">
					<table>
					<tr class="heading">
					<td class="text-center"><b>Jenis</b></td>
					<td class="sec-2-tab-bg text-center"><b>1 bulan</b></td>
					<td class="text-center"><b>3 bulan</b></td>
					<td class="sec-2-tab-bg text-center"><b>6 bulan</b></td>
					<td  class="text-center"><b>12 bulan</b></td>
					</tr>
					
					<tr>
					<td>Deposito Umum</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">5,50</td>
					<td class="text-center s-tab-blue">6,00</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">6,00</td>
					<td class="text-center s-tab-blue">12,00</td>
					</tr>

					<tr>
					<td>Deposito Merdeka</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">6,50</td>
					<td class="text-center s-tab-blue">6,50</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">6,50</td>
					<td class="text-center s-tab-blue">6,50</td>
					</tr>

					<tr>
					<td>Deposito US$</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">0,75</td>
					<td class="text-center s-tab-blue">0,80</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">1,00</td>
					<td class="text-center s-tab-blue">1,00</td>
					</tr>

					<tr>
					<td>Penjaminan LPS (IDR)</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">6,25</td>
					<td class="text-center s-tab-blue">6,25</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">6,25</td>
					<td class="text-center s-tab-blue">6,25</td>
					</tr>

					<tr>
					<td>Penjaminan LPS (US$)</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">0,75</td>
					<td class="text-center s-tab-blue">0,75</td>
					<td class="sec-2-tab-bg text-center s-tab-blue">0,75</td>
					<td class="text-center s-tab-blue">0,75</td>
					</tr>


					</table>
					<i>Berlaku per 9 Desember 2016</i>
				</div>
			</div>
		</div>
      <div class="section-3">
         <div class="row cus-pad-col">
            <div class="col-md-6 cus-pad-col">
               <div class="wrap-item-banner-img">
                  <a href="https://www.youtube.com/watch?v=fCnAqqKA-PY" target="_blank"></a>
                  <img src="<?php echo base_url('assets/img/banner1.png');?>" alt="">
               </div>
            </div>
            <div class="col-md-6 cus-pad-col">
               <div class="wrap-item-banner-img">
                  <a  href="https://www.youtube.com/watch?v=_d41s21ZBsU" target="_blank"></a>
                  <img src="<?php echo base_url('assets/img/banner2.png');?>" alt="">
               </div>
            </div>
            <div class="col-md-4 cus-pad-col">
               <div class="wrap-item-banner-img">
                  <a href="#"></a>
                  <img src="<?php echo base_url('assets/img/banner3.png');?>" alt="">
               </div>
            </div>
            <div class="col-md-4 cus-pad-col">
               <div class="wrap-item-banner-img">
                  <a href="#"></a>
                  <img src="<?php echo base_url('assets/img/banner4.png');?>" alt="">
               </div>
            </div>
            <div class="col-md-4 cus-pad-col">
               <div class="wrap-item-banner-img">
                  <a href="#"></a>
                  <img src="<?php echo base_url('assets/img/banner5.png');?>" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php echo $footer;?>

<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>

<link rel="stylesheet" href="<?php echo base_url('assets/js/jmodal/jquery-nicemodal.css');?>">
<script src="<?php echo base_url('assets/js/jmodal/jquery-nicemodal.js');?>"></script>
<!-- content page -->
<div class="wrap-content-page2">
	<div class="container">
		<div class="content-page2">
			<div class="row">
				<!-- content page -->
				<div class="col-md-8 col-md-push-4">
					<div class="content-page-in"> 
						<div class="c-block-1">
							<div class="c-block-1-img"> 
                                                                <a href="https://instagram.com/kartukreditbukopin" target="_blank" >
								<img width="100%" src="<?php echo base_url('assets/images/produk-kredit.jpg');?>">
                                                                  </a>
							</div>
						</div>
						<!-- c blok 1 -->
						<div class="c-block-1 post-content">  
							
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<select name="promopilihan" id="promopilihan" class="form-control">
										<option value="4" selected>Kuliner Seru</option>
										<?php foreach($category as $cat){
											if($cat['id']!=4){ ?>
											<option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
										<?php } } ?>
									</select><br><br>
								</div>								
							</div> 
							<div class="row" id="promo1">
							<?php  
								foreach($product as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>

							<div class="row" id="promo2">
							<?php  
								foreach($product2 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>

							<div class="row" id="promo3">
							<?php  
								foreach($product3 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<!--<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	-->
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>


							<div class="row" id="promo4">
							<?php  
								foreach($product4 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>


							<div class="row" id="promo5">
							<?php  
								foreach($product5 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>


							<div class="row" id="promo6">
							<?php  
								foreach($product6 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2/cicilan" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Cicilan</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>

							<div class="row" id="promo7">
							<?php  
								foreach($product7 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>

							<div class="row" id="promo8">
							<?php  
								foreach($product8 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>

							<div class="row" id="promo9">
							<?php  
								foreach($product9 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>

							<div class="row" id="promo10">
							<?php  
								foreach($product10 as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 280px!important;max-height: 350px;">
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;">
										<img id="imgcontent<?=$prod['id_post']?>" src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><div id="titlecontent<?=$prod['id_post']?>"><?php echo $prod['title'];?></div></strong>
											<div style="display:none" id="htmlcontent<?=$prod['id_post']?>">
											<?php
											if ($this->session->userdata('site_lang') == 'english'){
												echo $prod['content_en'];
											}else{
												echo $prod['content'];
											}
											?>
											</div>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												<a href="#" data-url="getproduct/<?=$prod['id_post']?>/2" style="cursor: pointer;" >Detail</a> 
											</div>
											<div class="product-discount">
												<span style="font-size:10px;">Diskon</span><br>
												<?php echo ($prod['discount']>0)?$prod['discount']:0;?> %								
											</div>	
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>


						</div>
					</div>
				</div>

				<?php echo $sidebar; ?>

			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$('#promo1').show();	
	$('#promo2').hide();
	$('#promo3').hide();
	$('#promo4').hide();
	$('#promo5').hide();
	$('#promo6').hide();
	$('#promo7').hide();
	$('#promo8').hide();
	$('#promo9').hide();
	$('#promo10').hide();

    $('.box-product').nicemodal({
        width: '700px',
        height: 'auto',        
        keyCodeToClose: 27,
        defaultCloseButton: true,
        closeOnClickOverlay: true,
        closeOnDblClickOverlay: false
        // onOpenModal: function(){
        //     alert('Opened');
        // },
        // onCloseModal: function(){
        //     alert('Closed');
        // }
    });
	$( "#promopilihan" ).change(function() {

		var cat = $(this).val();
		
		if(cat=='4'){
			$('#promo1').show();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();			
		}else if(cat=='13'){
			$('#promo1').hide();	
			$('#promo2').show();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();			
		}else if(cat=='14'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').show();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();
		}else if(cat=='15'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').show();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();
		}else if(cat=='16'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').show();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();
		}else if(cat=='17'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').show();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();
		}else if(cat=='19'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').show();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').hide();
		}else if(cat=='20'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').show();
			$('#promo9').hide();
			$('#promo10').hide();		
		}else if(cat=='21'){
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').show();
			$('#promo10').hide();	
		}else {
			$('#promo1').hide();	
			$('#promo2').hide();
			$('#promo3').hide();
			$('#promo4').hide();
			$('#promo5').hide();
			$('#promo6').hide();
			$('#promo7').hide();
			$('#promo8').hide();
			$('#promo9').hide();
			$('#promo10').show();	
		}

	});


});
</script>


<?php echo $footer;?>





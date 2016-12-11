
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
								<img width="100%" src="<?php echo base_url('assets/images/catalog-feature-image.png');?>">
							</div>
						</div>
						<!-- c blok 1 -->
						<div class="c-block-1 post-content">  
							
<!-- 							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<select class="form-control">
										<?php foreach($category as $cat){?>
											<option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
										<?php } ?>
									</select><br><br> 
								</div>								
							</div>  -->
							<div class="row ">
							<?php  
								foreach($product as $prod){?>			 
								
								<div class="col-md-4 mb15" style="height: 300px!important;max-height: 350px; ">
									<div class="box-product" id="buttonproduct" style="z-index:9999!important" data-url="getproduct/<?=$prod['id_post']?>" style="cursor: pointer;">
										<img src="<?php echo $prod['images'];?>" width="100%">
										<div class="pad15">
										<strong><?php echo $prod['title'];?></strong>
										<?php
										// if ($this->session->userdata('site_lang') == 'english')
										// 	{
										// 	echo $prod['content_en'];
										// 	}
										// 	else
										// 	{
										// 	echo $prod['content'];
										// 	}
										?>
										</div> 
										<div class="box-info">											
											<div class="product-detail">
												Rp. <?php echo number_format($prod['price'],0, '', '.');?>,-
											</div>
											<div class="product-cart">
												<i class="fa fa-shopping-cart"></i>							
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

    $('.box-product').nicemodal({
        width: '700px',
        height: 'auto',        
        keyCodeToClose: 27,
        defaultCloseButton: true,
        closeOnClickOverlay: true,
        closeOnDblClickOverlay: false,
        // onOpenModal: function(){
        //     alert('Opened');
        // },
        // onCloseModal: function(){
        //     alert('Closed');
        // }
    });
});
</script>

<?php echo $footer;?>



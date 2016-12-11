
<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>

<!-- content page -->
<div class="wrap-content-page2">
	<div class="container">
		<div class="content-page2">
			<div class="">
				<!-- content page -->
				<div class="col-md-8 col-md-push-4">
					<div class="content-page-in"> 

						<!-- c blok 1 -->
						<div class="c-block-1 post-content">  
						<div class="c-block-1-title">
							<h2>Laporan Tahunan</h2>
							
						</div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="padding-left: 0px!important;margin-bottom: 20px; ">
    <li role="presentation" class="active"><a href="#tahunan" aria-controls="tahunan" role="tab" data-toggle="tab"><strong>Laporan Tahunan</strong></a></li>
    <li role="presentation"><a href="#keberlanjutan" aria-controls="keberlanjutan" role="tab" data-toggle="tab"><strong>Laporan Keberlanjutan</strong></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="tahunan">
							<div class="">
							
							<?php  
								foreach($product as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 400px!important;max-height: 450px;">
									<div class="text-center" style="color: #00adff"><?=$prod['year']?> </div>
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id']?>/2" >
										<img id="imgcontent<?=$prod['id']?>" src="<?php echo $prod['image'];?>" style="width:auto;height:220px;">
										<div class="box-info">											
											<div class="pad15">
												<div id="titlecontent<?=$prod['id']?>"><?php echo $prod['title'];?></div>
											</div> 
											<div class="text-right">
												<a style="cursor: pointer;padding: 1px 6px;margin-bottom: 10px;margin-right: 10px;" class="btn btn-success" target="_blank" href="<?php echo site_url('assets/files/'.$prod['files']);?>"  >Download</a> 
											</div>
										</div>
									</div>
								</div>	
							<?php } ?>
							</div>    	


    </div>
    <div role="tabpanel" class="tab-pane" id="keberlanjutan">
    	
							<?php  
								foreach($product_lanjut as $prod){?>			 								
								<div class="col-md-4 mb15" style="height: 400px!important;max-height: 450px;">
									<div class="text-center" style="color: #00adff"><?=$prod['year']?> </div>
									<div class="box-product" id="buttonproduct" data-url="getproduct/<?=$prod['id']?>/2" >
										<img id="imgcontent<?=$prod['id']?>" src="<?php echo $prod['image'];?>" style="width:auto;height:220px;">
										<div class="box-info">											
											<div class="pad15">
												<div id="titlecontent<?=$prod['id']?>"><?php echo $prod['title'];?></div>
											</div> 
											<div class="text-right">
												<a style="cursor: pointer;padding: 1px 6px;margin-bottom: 10px;margin-right: 10px;" class="btn btn-success" target="_blank" href="<?php echo site_url('assets/files/'.$prod['files']);?>"  >Download</a> 
											</div>
										</div>
									</div>
								</div>	
							<?php } ?>

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





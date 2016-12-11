
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

						<div class="c-block-1 post-content">
						<div class="c-block-1-title">
						<h2>Temu Analis</h2>
						</div>
						
						<div class="row">
						<?php  
							foreach($product as $prod){?>

							<div class="col-md-4 mb15" style="height: 250px!important; max-height: 450px; width: auto;">
							<div id="buttonproduct" class="box-product" data-url=""><img id="imgcontent1" src="<?php echo $prod['image'];?>" width="250px" height="150px" />
							<div class="box-info">
							<div class="pad15">
							<div id="titlecontent<?=$prod['id']?>"><?php echo $prod['title'];?></div>
							</div>
							<div class="text-right"><a class="btn btn-success" style="cursor: pointer; padding: 1px 6px; margin-bottom: 10px; margin-right: 10px;" href="<?php echo site_url('assets/files/'.$prod['files']);?>" target="_blank">Download</a></div>
							</div>
							</div>
							</div>
						<?php }?>
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

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
					<div class="c-block-1 post-content">						
						<?php foreach($content as $read){ ?>
							<div class="c-block-1-title">
								<h2><?php echo $read['title']; ?></h2>
							</div> 
							<div class="">
							<?php echo $read['content']; ?>
							</div>	
						<?php } ?>	
					</div><!-- END c-block-1 post-content -->						
				</div>
			</div>
            <?php echo $sidebar; ?>			
         </div>
      </div>
   </div>
</div>
<?php echo $footer;?>


 

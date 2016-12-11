
<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>

<?php foreach($content as $read) { ?>
<!-- content page -->
<div class="wrap-content-page2">
	<div class="container">
		<div class="content-page2">
			<div class="row">
				<!-- content page -->
				<div class="col-md-8 col-md-push-4">
					<div class="content-page-in">

				<?php
				if (!empty($read['images']))
					{
						echo '<div class="c-block-1"><div class="c-block-1-img"><img width="100%" src="' . $read['images'] . '"></div></div>';
					} 
				?>

						<!-- c blok 1 -->
						<div class="c-block-1 post-content"> 
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
						</div>
					</div>
				</div>

				<?php echo $sidebar; ?>

			</div>
		</div>
	</div>
</div>

<?php } ?>
<?php echo $footer;?>
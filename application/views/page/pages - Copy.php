
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
						<div class="c-block-1">
							<div class="c-block-1-img">
								<?php
									if (!empty($read['images']))
									{
										echo '<img width="100%" src="' . base_url('assets/images/' . $read['images']) . '">';
									} 
								?>
							</div>
						</div>
						<!-- c blok 1 -->
						<div class="c-block-1 post-content">
							<div class="c-block-1-title">
								<h2>
									<?php
										if ($this->session->userdata('site_lang') == 'english')
										{
										echo $read['title_en'];
										}
										else
										{
										echo $read['title'];
										}
									?>
								</h2>
							</div>
							<p>
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
							</p>
						</div>
					</div>
				</div>

				<?php include "sidebar.php"; ?>

			</div>
		</div>
	</div>
</div>

<?php } ?>
<?php echo $footer;?>
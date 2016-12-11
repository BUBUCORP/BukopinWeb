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
		<div class="c-block-1 post-content">
			<div class="c-block-1-title">
				<h2>Tanggung Jawab Sosial</h2>
			</div> 
				<div class="row" id="album">
				<?php foreach ($content as $key => $val) { ?>
				<div class="col-sm-4" style="min-height: 245px;">
                    <a class="thumbnail fancybox" data-thumbnail="<?=site_url('assets/images/gallery/'.$val['picture']);?>"  href="<?=site_url('assets/images/gallery/'.$val['picture']);?>" title="<?=$val['name'];?>">
                      <img src="<?=site_url('assets/images/gallery/'.$val['picture']);?>" alt="<?=$val['name'];?>" width="256" height="256" />
                      <div class="title">
                        <span><?=$val['name'];?></span>
                      </div>
                    </a>
              	</div>              	
				<?php } ?>
            </div> 	
			<div class="col-md-12">
				<nav aria-label="Page navigation">
				  <ul class="pager">
						<li><?php echo $pagination; ?></li>
				  </ul>
				</nav>
			</div>            				 													
		</div>
	</div>
</div>
<?php echo $sidebar; ?>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	$(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        helpers: {
            thumbs: {
                width  : 40,
                height : 40,
                source  : function(current) {
                    return $(current.element).data('thumbnail');
                }
            }
        }
    });
});
</script>
 <?php echo $footer;?>


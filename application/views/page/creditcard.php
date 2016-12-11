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

					<style type="text/css">
						#carousel .cloud9-item, #buttons button {
					  cursor: pointer;
					}
					    #carousel {height: 250px;}
					</style>                
				
					<div id="carousel">
					<?php foreach ($kartukredit as $key => $val) {?>
						<img class="cloud9-item" src="<?=$val['image']?>" alt="<?=$val['content']?>">
					<?php } ?> 

					  				  
					</div>

					<div id="buttons">
					  <button class="left" style="border: none;background: url('../assets/img/prev.png');width: 50px;height: 45px;z-index: 100;top: -165px;position: relative;"></button>
					  <button class="right" style="border: none;background: url('../assets/img/next.png');width: 50px;height: 45px;z-index: 100;top: -165px;position: relative;float:right;"></button>
					</div>	


            <!-- c blok 1 -->
            <div class="c-block-1" id="post">
              <div class="c-block-1-title" id="isicontent">
                
              </div>
            </div>
          </div>
        </div>
        <!-- sidebarwidget -->
        <?php echo $sidebar; ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
	jQuery(document).ready(function($){
		$("#carousel").Cloud9Carousel( {
		  buttonLeft: $("#buttons > .left"),
		  buttonRight: $("#buttons > .right"),
		  autoPlay: 0,
		  bringToFront: true,
		  onRendered: rendered

		});		
		function rendered(carousel){
			var idKartu = carousel.nearestItem();			
			if(idKartu.width==200){
				$('#isicontent').empty();
				var idPage = idKartu.element.alt;
				//console.log(idPage);
				$.getJSON('<?php echo site_url('page/getPage/');?>'+idPage, function(result) {
		  			$('#isicontent').append(result.content);
				});			
			}
		}

	});

</script>
	<!-- footer -->
<?php echo $footer;?>
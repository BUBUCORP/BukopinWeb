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
						<div class="c-block-1-title">
							<h2>Laporan Triwulan</h2><br>
							
						</div>
						<h3>Laporan Keuangan Konsolidasi</h3><br/>
<div id="accordion" class="panel-group">
<?php  foreach ($tahun as $key => $val) { ?>
<div class="panel panel-primary">
<div id="heading1" class="panel-heading">
<div class="panel-title"><a class="collapsed" href="#collapse<?=$val['label']?>" data-toggle="collapse" data-parent="#accordion"><?=$val['label']?></a></div>
</div>
<div id="collapse<?=$val['label']?>" class="panel-collapse collapse in">
<div class="panel-body">
<?php foreach($content as $keypost => $valpost){ 

	 	if($val['label']==$valpost['year']) { ?>
			<ul> 
				<li><?php echo $valpost['title'];?><a style="float: right;" href="<?php echo site_url('assets/files/'.$valpost['files']);?>"><i class="fa fa-download" aria-hidden="true"></i></a></li>
			</ul>
		<?php }?>
<?php } ?>
</div>
</div>
</div>
<?php } ?>
</div>						

						<div class="clearfix"></div>
						<hr>
						<div class="col-md-12">
							<nav aria-label="Page navigation">
							  <ul class="pager">
									<li><?php echo $links; ?></li>
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

<?php echo $footer;?>

 

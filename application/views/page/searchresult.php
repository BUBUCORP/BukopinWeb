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
							<h2>Search Result</h2>
						</div> 
						<?php foreach($results as $beritas){ ?>
						<div> 
							<div style="border-bottom:1px solid #f5f5f5;margin:0 0 15px 0">
							<span style="font-size:11px;color:#ccc;">
							<?php
							$p_satu = explode(' ',$beritas->date);
							$tgl =explode('-',$p_satu[0]);
							$bulan = array('Jan','Feb','Mar', 'Apr', 'Mei', 'Jun','Jul','Ags','Sep','Okt', 'Nov','D');
							?>
							<?php echo $tgl[2]; ?> <?php echo $bulan[($tgl[1]-1)]; ?>
							<?php echo $tgl[0]; ?> | Hits : <?php echo $beritas->hits;?>
							</span>
							<h4 style="margin:0 0 8px 0"><a href="<?php echo base_url('read');?>/<?php echo $beritas->id_post;?>-<?php echo $beritas->seotitle;?>"><?php echo $beritas->title;?></a></h4>
							<?php echo word_limiter($beritas->content,50); ?>
							</div>
						</div>
						<?php } ?> 
					</div>						
				</div>
			</div>
            <?php echo $sidebar; ?>			
         </div>
      </div>
   </div>
</div>
<?php echo $footer;?>


 

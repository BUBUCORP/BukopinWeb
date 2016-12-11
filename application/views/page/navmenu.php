<!-- menu top -->
<div class="wrap-menu-top">
	<div class="container">
		<div class="menu-top">
			<ul>
				<li><a href="#">program promo</a></li>
				<li><a href="#">swamitra</a></li>
				<li><a href="#">simulasi kredit</a></li>
				<li><a href="#">situs korporasi</a></li>
				<li><a href="<?php echo site_url('pages/25-kurs-bukopin');?>">info kurs</a></li>
				<li><a href="#">harga saham</a></li>
				<li><a href="#">CSR </a></li>
				<li><a href="<?php echo base_url();?>page/siaran-pers">siaran pers</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- overlay menu responsive -->
<div class="overlay-menu-responsive">
	<div class="overlay-mn-res-logo">
		<div class="container">
			<div class="mn-res-logo">
				<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/img/logo.png');?>" alt=""></a>
			</div>
		</div>
		<div class="bt-mn-res-close">
			<i class="fa fa-close"></i>
		</div>
	</div>
	<div class="wrap-mn-res-left">
		<div class="container">
			<div class="mn-res-left">
				<ul>
<?php foreach ($menu as $key => $val) { ?>					
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
<a href="<?=$val['menu_link']?>"><?=strtoupper($val['ind_name'])?></a> 								
<ul class="sub-menu">
<?php foreach ($submenu as $skey => $sval) { ?>
<?php if($val['id_menu']==$sval['parent_menu']){ ?>
<?php if(isset($c3[$sval['id_menu']])){ ?>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
<?php }else{?>
<li class="menu-item menu-item-type-custom menu-item-object-custom ">
<?php }?>																					
<a href="<?=$sval['menu_link']?>"><?=strtoupper($sval['ind_name'])?></a>
<ul class="sub-menu">												
<?php foreach ($submenulv2 as $skey2 => $sval2) { ?>
<?php if($sval['id_menu']==$sval2['parent_menu']){ ?>	
<?php if(isset($c4[$sval2['id_menu']])){ ?>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
<?php }else{?>
<li class="menu-item menu-item-type-custom menu-item-object-custom ">
<?php }?>
<a href="<?=$sval2['menu_link']?>"><?=strtoupper($sval2['ind_name'])?></a>
<ul class="sub-menu">													
<?php foreach ($submenulv3 as $skey3 => $sval3) { ?>
<?php if($sval2['id_menu']==$sval3['parent_menu']){ ?>
<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="<?=$sval3['menu_link']?>"><?=strtoupper($sval3['ind_name'])?></a>
</li>
<?php }?>
<?php }?>
</ul>
</li>	
<?php }?>
<?php }?>
</ul>
</li>
<?php }?>
<?php }?>
</ul> 
</li>		
<?php }?>

				</ul>
				<ul class="mn-second-logo">
					<li><a href="<?php echo base_url();?>produk-dana/pembukaan-rekening-online">pembukaan rekening online</a></li>
					<li><a href="https://ib.bukopin.co.id/">internet banking</a></li>
					<li><a target="_blank" href="https://bcm.bukopin.co.id/">BUKOPIN CASH MANAGEMENT</a></li>
					<li><a href="<?php echo base_url();?>hubungi-kami">hubungi kami</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- logo menu 2 -->
<div class="wrap-sticky-menu">
	<!-- responsive bar -->
	<div class="wrap-responsive-bar">
		<div class="container">
			<div class="item-responsive-menu">
				<div class="bt-menu-res"><i class="fa fa-bars"></i></div>
				<div class="bt-search-res"><i class="fa fa-search"></i></div>
				<div class="logo-responsive-bar">
					<a href="#"><img src="<?php echo base_url('assets/img/logo.png');?>" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- search form -->
	<div class="search-form-res">
		<form method="post" name="keyword" action="<?php echo base_url('page/searchresult');?>"><i class="fa fa-search"></i><input type="text" placeholder="Search &amp; Hit Enter..."></form>
	</div>
	<div class="wrap-menu-top-2">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo-img">
						<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/img/logo.png');?>" alt=""></a>
					</div>
				</div>
				<div class="col-md-9">
					<div class="wrap-nav-right-top-2">
						<div class="logo-right-mn">
							<img src="<?php echo base_url('assets/img/logo-r.png');?>" alt="">
						</div>
						<div class="menu-search-form">
							<form method="post" action="<?php echo base_url('page/searchresult');?>">
								<input type="text" name="keyword" placeholder="Search...">
								<button type="submit" name="submit"><i class="fa fa-search"></i></button>								
							</form>
						</div>
						<div class="wrap-menu-lang-top">
							<select name="#" id="">
								<option value="#" selected>english</option>
								<option value="#">indonesia</option>
							</select>
						</div>
						<div class="nav-right-top-2">
							<ul>
								<li><a href="<?php echo base_url();?>produk-dana/pembukaan-rekening-online">pembukaan rekening online</a></li>
								<li><a href="https://ib.bukopin.co.id/">internet banking</a></li>
								<li><a target="_blank" href="https://bcm.bukopin.co.id/">BUKOPIN CASH MANAGEMENT</a></li>
								<li><a href="<?php echo base_url();?>hubungi-kami">hubungi kami</a></li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- main menu -->
	<div class="wrap-main-menu">
		<div class="container">
			<nav class="menu_nav">
				<ul class="menu_nav_nor">
<?php foreach ($menu as $key => $val) { ?>					
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
<a href="<?=$val['menu_link']?>"><?=strtoupper($val['ind_name'])?></a> 								
<ul class="sub-menu">
<?php foreach ($submenu as $skey => $sval) { ?>
<?php if($val['id_menu']==$sval['parent_menu']){ ?>
<?php if(isset($c3[$sval['id_menu']])){ ?>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
<?php }else{?>
<li class="menu-item menu-item-type-custom menu-item-object-custom ">
<?php }?>																					
<a href="<?=$sval['menu_link']?>"><?=strtoupper($sval['ind_name'])?></a>
<ul class="sub-menu">												
<?php foreach ($submenulv2 as $skey2 => $sval2) { ?>
<?php if($sval['id_menu']==$sval2['parent_menu']){ ?>	
<?php if(isset($c4[$sval2['id_menu']])){ ?>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children ">
<?php }else{?>
<li class="menu-item menu-item-type-custom menu-item-object-custom ">
<?php }?>
<a href="<?=$sval2['menu_link']?>"><?=strtoupper($sval2['ind_name'])?></a>
<ul class="sub-menu">													
<?php foreach ($submenulv3 as $skey3 => $sval3) { ?>
<?php if($sval2['id_menu']==$sval3['parent_menu']){ ?>
<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="<?=$sval3['menu_link']?>"><?=strtoupper($sval3['ind_name'])?></a>
</li>
<?php }?>
<?php }?>
</ul>
</li>	
<?php }?>
<?php }?>
</ul>
</li>
<?php }?>
<?php }?>
</ul> 
</li>		
<?php }?>

				</ul>
			</nav>
		</div>
	</div>
</div>

<section class="pad30">
<div class="container-fluid">
<div class="row">


<div class="hidden-xs hidden-sm col-md-2">
<div class="sidebar">
	<div class="sidebar-logo">
	<img width="100%" src="<?php echo base_url(); ?>/assets/images/logo-dark.png">
	</div>
	<ul id="mainmenu" class="nav nav-pills nav-stacked">
		<li <?php if($this->uri->segment(2)=="index"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/index');?>"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
		<li <?php if($this->uri->segment(2)=="menus"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/menus');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Menu</a></li>  
		<li <?php if($this->uri->segment(2)=="pagelist"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/pagelist');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Page</a></li>
		<li <?php if($this->uri->segment(2)=="postlist"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/postlist');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Post Article</a></li>
		<li <?php if($this->uri->segment(2)=="category"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/category');?>"><i class="fa fa-list-ul" aria-hidden="true"></i> Kategori Post</a></li>
		<li <?php if($this->uri->segment(2)=="productlist"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/productlist');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Post Product Kredit</a></li>
		<li <?php if($this->uri->segment(2)=="categoryproduct"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/categoryproduct');?>"><i class="fa fa-list-ul" aria-hidden="true"></i> Kategori Product Kredit</a></li>
		<li <?php if($this->uri->segment(2)=="jaringan"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/jaringan');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Post Jaringan</a></li>

		<li <?php if($this->uri->segment(2)=="hubunganinvestor"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/hubunganinvestor');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Hubungan Investor</a></li> 
		<li <?php if($this->uri->segment(2)=="categoryhubunganinvestor"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/categoryhubunganinvestor');?>"><i class="fa fa-list-ul" aria-hidden="true"></i> Kategori Hub Investor</a></li>
		<li <?php if($this->uri->segment(2)=="kalender"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/kalender');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Kalender Acara</a></li>

		<li <?php if($this->uri->segment(2)=="careerlist"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/careerlist');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Post Career</a></li>
		<!--       <li <?php if($this->uri->segment(2)=="postnews"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/postnews');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Berita</a></li>    -->   
		<!--       <li <?php if($this->uri->segment(2)=="kurs"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/kurs');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Kurs Bukopin</a></li>    -->  
		<!--       <li <?php if($this->uri->segment(2)=="sukubunga"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/sukubunga');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Suku Bunga</a></li> -->              
		<li <?php if($this->uri->segment(2)=="rekening"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/rekening');?>"><i class="fa fa-envelope" aria-hidden="true"></i> Pembukaan Rekening</a></li>      

		<li <?php if($this->uri->segment(2)=="gallery"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/gallery');?>"><i class="fa fa-picture-o" aria-hidden="true"></i> List Gallery</a></li>
		<li <?php if($this->uri->segment(2)=="contact"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/contact');?>"><i class="fa fa-envelope" aria-hidden="true"></i> List Contact</a></li>
		<li <?php if($this->uri->segment(2)=="slider"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/slider');?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Slider Images</a></li>  		    

		<li <?php if($this->uri->segment(2)=="users"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/users');?>"><i class="fa fa-user" aria-hidden="true"></i> Users</a></li>
		<li <?php if($this->uri->segment(2)=="setting"){echo 'class="active"';}?>><a href="<?php echo base_url('admincms/setting');?>"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a></li>
	</ul>
</div>
</div>

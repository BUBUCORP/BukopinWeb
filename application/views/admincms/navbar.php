<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>" target="_blank"><i class="fa fa-home"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">        
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/index');?>">Dashboard</a></li>
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/menus');?>">Menu</a> </li>
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/pagelist');?>">Page</a> </li>
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/postlist');?>">Post</a> </li>
        <!-- <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/postnews');?>">News</a> </li> -->
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/category');?>">Kategori Post</a></li>
        <!-- <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/kurs');?>">Kurs Bukopin</a> </li>  -->
        <!-- <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/sukubunga');?>">Suku Bunga</a> </li>  -->                 
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/contact');?>">List Contact</a></li>
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/rekening');?>">Pembukaan Rekening</a></li>

        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/users');?>">Users</a></li>
        <li class="hidden-md hidden-lg"><a href="<?php echo base_url('admincms/setting');?>">Setting</a></li>
        <li>
            <a><i class="fa fa-user"></i>
              Hi, <?php echo $namelogin; ?>
            </a>
        </li>
        <li><a class="btn btn-info" href="<?php echo base_url(); ?>admincms/logout" onclick="return confirm('yakin mau keluar ?');" title="logout"><span class="ico-off"> <i class="fa fa-lock"></i> Logout</span></a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



		<div class="col-md-10">
      <div class="content">

				<div id="infoMessage"><?php echo $message;?></div>

		      <h2>Welcome<small> content management system</small></h2>
          <hr>
          <div class="row"> 
            <div class="col-md-3">
              <a href="<?php echo base_url('admincms/contact');?>">
                <div class="box-modul">
                  <i class="fa fa-envelope fa-3x"></i>
                  <span><?php echo $total_contact;?> Message</span>
                </div>
              </a>
            </div>
            <div class="col-md-3">
              <a href="<?php echo base_url('admincms/postlist');?>">
              <div class="box-modul">
              <i class="fa fa-edit fa-3x"></i>
              <span><?php echo $total_article;?> Articles</span>
              </div>
              </a>
            </a>
            </div>

          </div>



      </div>
		</div>











		</div>
	</div>
</section>

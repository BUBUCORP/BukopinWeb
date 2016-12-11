<?php echo $head;?>
<?php echo $navbar;?>
<?php echo $breadcrumb;?>
	<style type="text/css">
		.monthly {
			/* box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); */
			border: solid 1px #EBEBEB;
		}

/*		input[type="text"] {
			padding: 15px;
			border-radius: 2px;
			font-size: 16px;
			outline: none;
			border: 2px solid rgba(255, 255, 255, 0.5);
			background: rgba(63, 78, 100, 0.27);
			color: #fff;
			width: 250px;
			box-sizing: border-box;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
		}*/
/*		input[type="text"]:hover {
			border: 2px solid rgba(255, 255, 255, 0.7);
		}
		input[type="text"]:focus {
			border: 2px solid rgba(255, 255, 255, 1);
			background:#eee;
			color:#222;
		}*/

		.button {
			display: inline-block;
			padding: 15px 25px;
			margin: 25px 0 75px 0;
			border-radius: 3px;
			color: #fff;
			background: #000;
			letter-spacing: .4em;
			text-decoration: none;
			font-size: 13px;
		}
		.button:hover {
			background: #3b587a;
		}
		.desc {
			max-width: 250px;
			text-align: left;
			font-size:14px;
			padding-top:30px;
			line-height: 1.4em;
		}
		.resize {
			background: #222;
			display: inline-block;
			padding: 6px 15px;
			border-radius: 22px;
			font-size: 13px;
		}
		@media (max-height: 700px) {
			.sticky {
				position: relative;
			}
		}
		@media (max-width: 600px) {
			.resize {
				display: none;
			}
		}
	</style>
	<link rel="stylesheet" href="<?php echo site_url('assets/css/monthly.css');?>">
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
							<h2>Kalender Acara</h2><br>							
						</div>
						<div class="col-md-12">
							<div style="width:100%; max-width:600px; display:inline-block;">
								<div class="monthly" id="mycalendar"></div>
							</div>						
						</div>

						
						<div class="col-md-12">
						<hr>
						<br>
							<h2>Acara Mendatang</h2>
<?php 
		$tanggal = array( "0" => 'Kosong', "01" => 'Jan', "02" => 'Feb', "03" => 'Mar', "04" => 'Apr', "05" => 'Mei', "06" => 'Jun', "07" => 'Jul', "08" => 'Agu', "09" => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des' );
  		foreach ($content as $key => $val) {
  			if(!empty($val['start_date'])){
  				$sp1 = explode(" ", $val['start_date']);  				
  				$startdate = $sp1[0];
  				$datenum =explode("-", $startdate);
  				$y = $datenum[0];
  				$m = $datenum[1];
  				$d = $datenum[2];

  				$starttime = $sp1[1];
  			}else{
  				$startdate = ""; 				
  				$starttime = "";
  				$y = 0;
  				$m = 0;
  				$d = 0;  				
  			}

  			if(!empty($val['end_date'])){
  				$sp2 = explode(" ", $val['end_date']);  
  				$enddate = $sp2[0];
  				$endtime = $sp2[1];
  				$datenum =explode("-", $enddate);
  				$yn = $datenum[0];
  				$mn = $datenum[1];
  				$dn = $datenum[2];   						
  			}else{
  				$enddate = "";
  				$endtime = "";	
  				$yn = 0;
  				$mn = 0;
  				$dn = 0;  				
  			} ?>
<div class="monthly-list-item item-has-event"><div class="monthly-event-list-date"><?=$tanggal[$m]?><br><?=$d?></div><a href="<?=$val['url']?>" class="listed-event"  title="<?=$val['name']?>"><?=$val['name']?> <div><div class="monthly-list-time-start"><?=$starttime?></div><div class="monthly-list-time-end"><?=$endtime?></div></div></a></div>
<?php }?>

						</div>						
					</div> 
					</div>   				
			</div>
             <?php echo $sidebar; ?>				
         </div>
      </div>
   </div>
</div>
<!-- JS ======================================================= -->
<script type="text/javascript" src="<?php echo site_url('assets/js/monthly.js');?>"></script>
<script type="text/javascript">
	$(window).load( function() {

		$('#mycalendar').monthly({
			mode: 'event',
			jsonUrl: '<?php echo site_url('page/getkalender');?>',
			dataType: 'json'
			//xmlUrl: 'events.xml'
		});
	switch(window.location.protocol) {
	case 'http:':
	case 'https:':
	// running on a server, should be good.
	break;
	case 'file:':
	//alert('Just a heads-up, events will not work when run locally.');
	}

	});
</script>
<?php echo $footer;?>

 

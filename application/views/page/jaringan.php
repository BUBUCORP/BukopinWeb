
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
					<div class="c-block-1 content-page-in">
						<h3>Jaringan ATM Bukopin</h3>
						
						<div style="height:250px;background:url('<?=site_url('assets/images/jaringanbukopin.png');?>') no-repeat;background-size:contain;">																			
							<!-- c blok 1 -->
							<div class="col-md-12" style=" position: absolute;bottom: 7px;">
								<div class="row form-field" id="container" >
									<form name="jaringanatm" method="POST" action="">
										<div class="col-md-6 ">
											<strong><label style="color: #fff;">Provinsi</label></strong><br>
											<select name="provinsi" id="provinsi" >
												<?php foreach ($provinsi as $key => $val) {?>
													<option value="<?=$val['idprovinsi'];?>"><?=$val['nama_provinsi'];?></option>
												<?php }?>										
											</select>
										</div>
										<div class="col-md-6 ">
											<strong><label style="color: #fff;">Kota</label></strong><br>
											<select name="kota" id="kota" >
												<option value="">Select</option>											
											</select>
										</div>	
									</form>							
								</div>
							</div>
						</div>
						<div class="post-content "> 

						<div class="col-md-12">
							<?php foreach ($content as $key => $val) { ?>
								<div class="row" style="border-bottom: 1px solid #ccc;margin-top: 15px;">
									<div class="col-md-9 text-left">
										<p>
											<strong><?=$val['title']?></strong>
										<br>								
											<?=$val['alamat']?>								
										</p>							
									</div>
									<div class="col-md-3">

										<a target="_blank" href="<?=$val['map']?>" class="btn btn-default"><i class="fa fa-map-marker" ></i> | Buka di Peta</a>
									</div>
								</div>								
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
<script type="text/javascript">
$(function() {
	$('#provinsi').change(function(){	
		var idProv = $('#provinsi').val();  
		 $.getJSON('<?php echo site_url("page/getkabupaten/");?>' + idProv, function(data) {
		 	$('#kota').empty();
			for (key in data) {
				$('#kota').append($('<option>', {value: data[key].idkabupaten,text: data[key].namakabupaten}));
			}	  		 
		});			
	});
});	
</script>
<?php echo $footer;?>
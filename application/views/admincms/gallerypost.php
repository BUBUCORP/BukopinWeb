<div class="col-md-10" style="margin:0!important">
    <div class="title clearfix">
        <h3>Gallery</h3>
    </div>
    <div class="content">
	
		<?php echo $this->session->flashdata('msg'); ?>

		<div class="modal fade" id="infonya" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-sm text-center" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<h3 class="modal-title">Status</h3>
						<?php echo $this->session->flashdata('msg'); ?>
						<br>
						<button type="button" class="btn btn-success" data-dismiss="modal" onClick="refresh()">TETAP EDIT</button>
						<a href="<?php echo base_url('admincms/gallery'); ?>" class="btn btn-info"><i class="fa fa-trash"></i> KEMBALI KE POST LIST</a>
					</div>
				</div>
			</div>
		</div>

		<form method="post" action="<?php echo $formaction;?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<input class="hidden" name="id_gallery[]" value="<?php echo $id_gallery?>">  
					<div class="multi-field-wrapper text-right">
						<div class="multi-fields">
							<div class="multi-field input-group" style="margin-bottom:15px;">
								<div class="row">
									<div class="col-md-3" >
										<select name="type_gallery[]" class="form-control">						
											<option value="1">Gallery</option>
											<option value="2">Tanggung Jawab Perusahaan</option>						
										</select>
									</div>
									<div class="col-md-4">
										<input placeholder="Name" type="text" class="form-control" name="name[]" value="">
									</div>
									<div class="col-md-3"> 
										<input id="UploadImages" class=" form-control" name="picture[]" type="file" />
									</div>
									<div class="col-md-1">
										<img width="100%" id="PreviewFoto" src="#" alt=""/>

									</div>
								</div>
								
									<div class="input-group-btn remove-field">
										<button class="btn btn-danger" type="button"><i class="fa fa-remove"></i> </button>
									</div>
								
							</div> 
						</div>
						<button type="button" class="btn btn-info add-field"><i class="fa fa-plus"></i></button>
					</div>				
					<div class="clearfix"></div>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12">
						<div class="input-group">
							<button class="btn btn-blue" type="submit"><i class="fa fa-save"></i> Simpan</button> 
							<button class="btn btn-black" onclick="window.history.back();">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</form>
    </div> 
</div>
</section>

<script>
	var x =1;
	$('.multi-field-wrapper').each(function() {
		var $wrapper = $('.multi-fields', this);
		
		$(".add-field", $(this)).click(function(e) {			
			var $clone = $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper);
			$clone.find('input').val('').focus();
			$clone.find('#UploadImages').attr('id','UploadImages'+x);
			$clone.find('#PreviewFoto').attr('id','PreviewFoto'+x);
			$("#UploadImages"+x).change(function(){
			 	 readURL(this,"PreviewFoto"+x);
			 });	 		
			x= x+1;
		});
		$('.multi-field .remove-field', $wrapper).click(function() {
			if ($('.multi-field', $wrapper).length > 1){
				$(this).parent('.multi-field').remove();				
			}
		});
	});
	// untuk preview foto
	function readURL(input,idp) {
		if (input.files && input.files[0])
		{
			var reader = new FileReader();
			reader.onload = function (e) 
		{
			$('#'+idp).attr('src', e.target.result);
		}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#UploadImages").change(function(){
		 readURL(this,"PreviewFoto");
	});

   // sampai sini untuk preview foto
</script>
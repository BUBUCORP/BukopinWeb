$(window).load(function() {
  $('#loader').fadeOut();
});

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

$(document).ready(function(){
  $("img").unveil(300);
  $('.counterhits').counterUp({
      delay: 10,
      time: 1000
  });
  $("#DataPictureBand").hide();
  $("#DataVideoBand").hide();
  $("#DataMusicBand").hide();
  $("#showpicture").click(function(){
      $("#DataPictureBand").show();
      $("#DataBand").hide();
      $("#DataVideoBand").hide();
      $("#DataMusicBand").hide();
  });
  $("#showdata").click(function(){
    $("#DataPictureBand").hide();
    $("#DataBand").show();
    $("#DataVideoBand").hide();
    $("#DataMusicBand").hide();
  });
  $("#showvideo").click(function(){
    $("#DataPictureBand").hide();
    $("#DataBand").hide();
    $("#DataVideoBand").show();
    $("#DataMusicBand").hide();
  });
  $("#showmusic").click(function(){
    $("#DataPictureBand").hide();
    $("#DataBand").hide();
    $("#DataVideoBand").hide();
    $("#DataMusicBand").show();
  });

    $('#DataTable').DataTable();
    $(".selecttwo").select2();
    $('[data-toggle="tooltip"]').tooltip();
    $('#datetimepicker').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    var ckeditor = CKEDITOR.replace('ckeditor',{
        height:'auto',
        allowedContent: 'p h1 h2 strong em; a[!href];'
    });
});

// untuk preview foto
function readURL(input) {
		 if (input.files && input.files[0]) {
				 var reader = new FileReader();
				 reader.onload = function (e) {
						 $('#PreviewFoto').attr('src', e.target.result);
				 }
				 reader.readAsDataURL(input.files[0]);
		 }
 }
 $("#UploadImages").change(function(){
		 readURL(this);
 });
 // sampai sini untuk preview foto

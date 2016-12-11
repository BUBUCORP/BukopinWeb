$(function() {
  $('#loader').hide();
  $('#DataTable').DataTable();
  $(".selecttwo").select2();
  $('[data-toggle="tooltip"]').tooltip();
  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
  $('#confirm-edit').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
  $(".postactive").bootstrapSwitch();
});

  $('#datetimepicker').datetimepicker({
      format: 'YYYY-MM-DD'
  });
  $('#start_date').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss'
  });  
  $('#end_date').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss'
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



//CHECK LENGTH
function check_length(check_length)
{
  maxLen = 160;
  //HITUNG DESCRIPTION KARAKTER
  if (articlepost.meta_description.value.length >= maxLen)
  {
    var msg = "Anda telah mencapai batas maksimum karakter yang diizinkan";
    alert(msg);
    articlepost.meta_description.value = articlepost.meta_description.value.substring(0, maxLen);
  }
  else
  {
    articlepost.text_num.value = maxLen - articlepost.meta_description.value.length;
  }
  //HITUNG KEYWORD KARAKTER
  if (articlepost.meta_keyword.value.length >= maxLen) {
    var msg = "Anda telah mencapai batas maksimum karakter yang diizinkan";
    alert(msg);
    articlepost.meta_keyword.value = articlepost.meta_keyword.value.substring(0, maxLen);
  }
  else
  {
    articlepost.text_num2.value = maxLen - articlepost.meta_keyword.value.length;
  }
}

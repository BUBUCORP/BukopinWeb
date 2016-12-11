<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="modal-title">Confirm Delete</h3>
                <br>
                <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                <a class="btn btn-danger btn-ok"><i class="fa fa-trash"></i> YES</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="modal-title">Confirm Edit</h3>
                <br>
                <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                <a class="btn btn-warning btn-ok"><i class="fa fa-edit"></i> YES EDIT</a>
            </div>
        </div>
    </div>
</div>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    BLOND &copy; 2016 dinartdesign | content management system
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo base_url('assets/vendor/datepicker/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/datepicker/js/bootstrap-datetimepicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/jquery.tinymce.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/tinymce.min.js');?>"></script>
<!--    <script src="<?php echo base_url('assets/vendor/ckeditor/ckeditor.js');?>"></script>    -->    
    <script src="<?php echo base_url('assets/vendor/select/dist/js/select2.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/taginput/bootstrap-tagsinput.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/admin.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-switch.min.js');?>"></script>


<!--     <script src="<?php echo base_url('assets/js/responsive_filemanager/filemanager/plugin.min.js');?>"></script> -->
    <script src="<?php echo base_url('assets/vendor/fancybox/jquery.fancybox.js');?>"></script>

<script>
$(document).ready(function(){
  $(".loadfile").fancybox({
    maxWidth	: 800,
    maxHeight	: 600,
    fitToView	: false,
    width		: '70%',
    height		: '70%',
    autoSize	: false,
    closeClick	: false,
    openEffect	: 'none',
    closeEffect	: 'none'
  });
  // ckeditor = CKEDITOR.replace('ckeditor',{
  //   filebrowserBrowseUrl : '<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  //   filebrowserUploadUrl : '<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  //   filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
  // });
  // ckeditor_en = CKEDITOR.replace('ckeditor_en',{
  //   filebrowserBrowseUrl : '<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  //   filebrowserUploadUrl : '<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  //   filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/vendor/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
  // });
});
</script>
<script type="text/javascript">
tinymce.init({
    selector: '#ckeditor',  // change this value according to your HTML
    theme: 'modern',
    height : 400,
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools jbimages'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  jbimages',
    
    image_advtab: true,

    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});  
tinymce.init({

    selector: '#ckeditor_en',  // change this value according to your HTML
    theme: 'modern',
    height : 400,
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools jbimages'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages ',
    
    image_advtab: true,
    relative_urls: false,
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});   
</script>
</body>
</html>

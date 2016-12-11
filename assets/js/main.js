$(window).load(function() {
    $('#loader').fadeOut();
});
(function($) {
    "use strict";
    $(document).on("ready", function() {
        $('#submit_form').on("click", function(event) {
            event.preventDefault();
          var a = $("#chk_faq").val();
          var b = $("#chk_setuju").val();
          var c = $("#chk_setuju2").val();
          var d = $("#userfile").val();
          if(a!='' && b!='' && c!='' && d!=''){
              // Get some values from elements on the page:
              var $form = $('#career_form'),
                data = $form.serialize(),
                url = $form.attr( "action" );             
              // Send the data using post
              var posting = $.post( url, data );             
              // Put the results in a div
              posting.done(function( data ) {
                //var content = $( data ).find( "#content" );    
                 $(".slider-rek-online").trigger('next.owl.carousel');            
                $( "#resultdivjob" ).empty().append( data );
              });   
          }else{
            alert("*wajib disini, harap lengkapi data anda");
          }                             
        });
        //$("#submitbtn").click(function(){
           // Attach a submit handler to the form
            $( "#hubungikami" ).submit(function( event ) {
             
              // Stop form from submitting normally
              event.preventDefault();
             
              // Get some values from elements on the page:
              var $form = $( this ),
                data = $form.serialize(),
                url = $form.attr( "action" );
             
              // Send the data using post
              var posting = $.post( url, data );
             
              // Put the results in a div
              posting.done(function( data ) {
                //var content = $( data ).find( "#content" );
                $("#myModalLabel").empty();
                $( "#resultdiv" ).empty().append( data );

              });
            });
        //});

            $( "#registrasionline" ).submit(function( event ) {
             
              // Stop form from submitting normally
              event.preventDefault();
             
              // Get some values from elements on the page:
              var $form = $( this ),
                data = $form.serialize(),
                url = $form.attr( "action" );
             
              // Send the data using post
              var posting = $.post( url, data );
             
              // Put the results in a div
              posting.done(function( data ) {
                //var content = $( data ).find( "#content" );
                //$("#myModalLabel").empty();
                $( "#resultdiv" ).empty().append( data );

              });
            });

   
        // Menu Button Responsive
        $('.bt-nav-res').on("click", function() {
            $('.menu-nav-responsive').slideToggle();
        });
        // Search Button Responsive
        $('.bt-search-res').on("click", function() {
            $('.search-form-res').slideToggle();
            $('.search-form-res input').focus();
        });
        // menu responsive overlay popup
        $('.bt-menu-res').on("click", function() {
            $('.overlay-menu-responsive').addClass('overlay-menu-responsive-active');
        });
        $('.bt-mn-res-close').on("click", function() {
            $('.overlay-menu-responsive').removeClass('overlay-menu-responsive-active');
        });
        $('.bt-save-pdf').on("click", function() {
            $('.overlay-menu-responsive').removeClass('overlay-menu-responsive-active');
        });        
        // Slider 1
        var items = $('.slider-1 .item');
        if(items.length > 1) {
            $('.slider-1').owlCarousel({
                loop: true,
                autoplayTimeout: 7000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: true,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        } else {
            $('.slider-1').owlCarousel({
                loop: false,
                autoplayTimeout: 7000,
                autoplay: true,
                touchDrag: true,
                mouseDrag: false,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        }
        $(".slider-1-nav-left").on("click", function() {
            $(".slider-1").trigger('next.owl.carousel');
        });
        $(".slider-1-nav-right").on("click", function() {
            $(".slider-1").trigger('prev.owl.carousel');
        });
        // Button To Top
        $('.bt-top').on("click", function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        // Responsive Sub Menu Click
        $('.mn-res-left ul li.menu-item-has-children > a').on("click", function(e) {
            e.preventDefault();
            $(this).parent().find("> ul").slideToggle(300);
        });
        // Responsive Sub Menu Click
        // $('.menu-left-show ul li.menu-item-has-children > a').on("click", function(e) {
        //     e.preventDefault();
        //     $(this).parent().find("> ul").slideToggle(300);
        // });
        // sticky main menu
        $(".wrap-sticky-menu").sticky({
            topSpacing: 0
        });
        // Wow Js Animate
        new WOW().init();
        $(".detail").fancybox({
            maxWidth: 800,
            maxHeight: 500,
            fitToView: false,
            width: '70%',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                title: null
            }
        });
        $(".detailpromo").fancybox({
            maxWidth: 800,
            maxHeight: 500,
            fitToView: false,
            width: '70%',
            height: 360,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                title: null
            }
        });
        $(".applyjob").fancybox({
            maxWidth: 800,
            maxHeight: 500,
            fitToView: false,
            width: '70%',
            height: 400,
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                title: null,
                overlay: {
                    closeClick: false
                }
            },
            beforeClose: function() {
                confirm('Anda yakin akan menutup form?');
            }
        });

        

        var no_kredit = 2;
        var no_kel = 3;
        var no_ortu =3;
        var no_sodara =2;
        var no_kursus =2;
        var no_kegiatan =2;
        $(".bt-peng-kredit").click(function() {
           var add_row = "<tr><td class='text-center'>"+no_kredit+"</td><td><select name='kredit_jenis[]' class='s-f-t-rek-on2'><option value='Kartu Kredit'>Kartu Kredit</option><option value='KTA'>KTA</option><option value='KPR'>KPR</option><option value='Lain-lain'>Lain-lain</option></select></td><td><input name='kredit_dimana[]' type='text' class='f-i-rek-on2'></td><td><input name='kredit_sejak[]' type='text' class='maskdate f-i-rek-on2'></td><td><select name='kredit_proses[]' class='s-f-t-rek-on2'><option value='Masih Berjalan'>Masih Berjalan</option><option value='Sudah Selesai'>Sudah Selesai</option></select></td></tr>";
           $(".peng-kredit").append(add_row);
           $('.maskdate').mask('00-00-0000');
           no_kredit++;
         })

        $(".bt-peng-kredit2").click(function() {
           var add_row = "<tr><td class='text-center'>"+no_kel+"</td><td><input name='keluarga_nama[]' type='text' class='f-i-rek-on2' placeholder='Anak'></td><td><input name='keluarga_tgl_lahir[]' type='text' class='maskdate f-i-rek-on2' placeholder='DD-MM-YYYY'></td><td><select name='keluarga_jk[]'  class='s-f-t-rek-on2'><option value='L'>L</option><option value='P'>P</option></select></td><td><input name='keluarga_job[]' type='text' class='f-i-rek-on2'></td><td><input name='keluarga_no_tlp[]' type='text' class='f-i-rek-on2'></td><td><select name='keluarga_pendidikan[]'  class='s-f-t-rek-on2'><option value='3' >S1</option><option value='2' >S2</option><option value='1' >S3</option><option value='4' >D1</option><option value='5' >D2</option><option value='6' >D3</option><option value='7' >SMA/SMK/STM</option><option value='8' >SMP</option><option value='9' >SD</option></select></td></tr>";
           $(".peng-kredit2").append(add_row);
           $('.maskdate').mask('00-00-0000');
           no_kel++;
         })

        $(".bt-peng-kredit3").click(function() {
           var add_row = "<tr><td class='text-center'>"+no_ortu+"</td><td><input name='ortu_name[]' type='text' class='f-i-rek-on2' placeholder='Ayah/Ibu'></td><td><input name='ortu_tgl_lahir[]' type='text' class='maskdate f-i-rek-on2' placeholder='DD-MM-YYYY'></td><td><select name='ortu_jk[]' class='s-f-t-rek-on2'><option value='L'>L</option><option value='P'>P</option></select></td><td><input name='ortu_job[]' type='text' class='f-i-rek-on2'></td><td><input name='ortu_job_kantor[]' type='text' class='f-i-rek-on2'></td><td><input name='ortu_no_tlp[]' type='text' class='f-i-rek-on2'></td><td><select name='ortu_pendidikan[]'  class='s-f-t-rek-on2'><option value='3' >S1</option><option value='2' >S2</option><option value='1' >S3</option><option value='4' >D1</option><option value='5' >D2</option><option value='6' >D3</option><option value='7' >SMA/SMK/STM</option><option value='8' >SMP</option><option value='9' >SD</option></select></td></tr>";
           $(".peng-kredit3").append(add_row);
           $('.maskdate').mask('00-00-0000');
           no_ortu++;
         })

        $(".bt-peng-kredit4").click(function() {
           var add_row = "<tr><td class='text-center'>"+no_sodara+"</td><td><input name='saudara_name[]' type='text' class='f-i-rek-on2' placeholder='Saudara Kandung'></td><td><input name='saudara_tgl_lahir[]' type='text' class='maskdate f-i-rek-on2' placeholder='DD-MM-YYYY'></td><td><select name='saudara_status_nikah[]' class='s-f-t-rek-on2'><option value='Sudah Menikah'>Sudah Menikah</option><option value='Belum Menikah'>Belum Menikah</option><option value='Duda/Janda'>Duda/Janda</option>    </select></td><td>    <select name='saudara_jk[]' class='s-f-t-rek-on2'><option value='L'>L</option><option value='P'>P</option>    </select></td><td>    <input name='saudara_job[]' type='text' class='f-i-rek-on2'></td><td>    <input name='saudara_job_kantor[]' type='text' class='f-i-rek-on2'></td><td>    <input name='saudara_no_tlp[]' type='text' class='f-i-rek-on2'></td><td>    <select name='saudara_pendidikan[]' class='s-f-t-rek-on2'><option value='3' >S1</option><option value='2' >S2</option><option value='1' >S3</option><option value='4' >D1</option><option value='5' >D2</option><option value='6' >D3</option><option value='7' >SMA/SMK/STM</option><option value='8' >SMP</option><option value='9' >SD</option>    </select></td></tr>";
           $(".peng-kredit4").append(add_row);
           $('.maskdate').mask('00-00-0000');
           no_sodara++;
         })

        $(".bt-peng-kredit5").click(function() {
            var opt ="";
            var i;
            for (i = 2016; i > 1950; i--) { 
                opt = opt + "<option value=" + i + ">" + i + "</option>";
            }
            //console.log(opt);
           var add_row = "<tr><td class='text-center'>"+no_kursus+"</td><td><input name='kursus_jenis[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><input name='kursus_name[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><select name='kursus_thn_masuk[]' class='s-f-t-rek-on2'>"+opt+"</select></td><td><select name='kursus_thn_lulus[]' class='s-f-t-rek-on2'>"+opt+"</select></td></tr>";
           $(".peng-kredit5").append(add_row);
           no_kursus++;
         })

        $(".bt-peng-kredit6").click(function() {
           var add_row = "<tr>  <td><input name='bahasa[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><select name='bahasa_kategori[]' class='s-f-t-rek-on2'>    <option value='Basic'>Basic</option>    <option value='Standart'>Standart</option>    <option value='Advance'>Advance</option></select></td></tr>";
           $(".peng-kredit6").append(add_row);
         })

         $(".bt-peng-kredit7").click(function() {
           var add_row = "<tr><td><input name='komputer_skill[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><select name='komputer_skill_kategori[]' class='s-f-t-rek-on2'><option value='Basic'>Basic</option><option value='Standart'>Standart</option><option value='Advance'>Advance</option></select></td></tr>";           
           $(".peng-kredit7").append(add_row);
         })

         $(".bt-peng-kredit8").click(function() {
            var opt2 ="";
            var i;
            for (i = 1; i < 21; i++) { 
                opt2 += "<option value=" + i + ">" + i + " Tahun</option>";
            }
            console.log(opt2);
           var add_row = "<tr><td class='text-center'>"+no_kegiatan+"</td><td><input name='kegiatan_name[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><input name='kegiatan_organisasi[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><input name='kegiatan_jabatan[]' type='text' class='f-i-rek-on2' placeholder=''></td><td><select name='kegiatan_lamanya[]' class='s-f-t-rek-on2'>"+opt2+"</select></td></tr>";
           $(".peng-kredit8").append(add_row);
           no_kegiatan++;
         })

         $(".bt-peng-kredit9").click(function() {
           var add_row = "<tr><td><input name='relasi_bukopin_name[]' type='text' class='f-i-rek-on2'></td><td><input name='relasi_bukopin_jabatan[]' type='text' class='f-i-rek-on2'></td><td><input name='relasi_bukopin_hubungan[]' type='text' class='f-i-rek-on2'></td></tr>";
           $(".peng-kredit9").append(add_row);
         })

         $(".bt-peng-kredit10").click(function() {
           var add_row = "<tr><td><input name='relasi_kantor_name[]' type='text' class='f-i-rek-on2'></td><td><input name='relasi_kantor_jabatan[]' type='text' class='f-i-rek-on2'></td><td><input name='relasi_kantor_hubungan[]' type='text' class='f-i-rek-on2'></td></tr>";
           $(".peng-kredit10").append(add_row);
         })

        $('.bt-upload-cus-add').on('click', function () {
          $('.cus-file-up').trigger('click');
        });

        // popup pembukaan rekening
        // $('.bt-pop-rek-on').on("click",function(){
        //     $('.wrapper-container-rek-online').addClass('wrapper-container-rek-online-active');
        // });
        // $('.bt-close-pop-rek').on("click",function(){
        //     $('.wrapper-container-rek-online').removeClass('wrapper-container-rek-online-active');
        // });

        // popup lowongan pekerjaan
        $('.bt-pop-low-on').on("click",function(){
            $('.wrapper-container-low-pekerjaan').addClass('wrapper-container-low-pekerjaan-active');
            var jobid = $(this).attr('data-jobid');
            var title = $(this).attr('data-title');  
            $('#jobtitle').text(title);
            $('#jobtitle2').text(title);
            $('#jobtitle3').text(title);
            $('#jobtitle4').text(title);
            $('#jobtitle5').text(title);
            $('#jobtitle6').text(title);
            $('#jobtitle7').text(title);
            $('#jobtitle8').text(title);
            $('#jobtitle9').text(title);
            $('#jobtitle10').text(title);
            $('#jobtitle11').text(title);
            $('#jobid').val(jobid);
            //alert(title);          
        });

        $('.bt-close-pop-loker').on("click",function(){
            $('.wrapper-container-low-pekerjaan').removeClass('wrapper-container-low-pekerjaan-active');
        });

        // popup hubungi kami
        // $('.bt-pop-rek-on').on("click",function(){
        //     $('.wrapper-container-rek-online').addClass('wrapper-container-rek-online-active');
        // });
        // $('.bt-close-pop-loker').on("click",function(){
        //     $('.wrapper-container-hub-kami').removeClass('wrapper-container-hub-kami-active');
        // });

        // popup tiket appski
        // $('.bt-pop-rek-on').on("click",function(){
        //     $('.wrapper-container-rek-online').addClass('wrapper-container-rek-online-active');
        // });
        // $('.bt-close-pop-loker').on("click",function(){
        //     $('.wrapper-container-tiket-app').removeClass('wrapper-container-tiket-app-active');
        // });

        // Slider 1

        // popup rekening online slide
        var items = $('.slider-rek-online .item');
        // if(items.length > 1) {
        //      $('.slider-rek-online').owlCarousel({
        //         loop: false,
        //         autoplayTimeout: 7000,
        //         autoplay: false,
        //         touchDrag: false,
        //         mouseDrag: false,            
        //         margin:20,
        //         autoplayHoverPause: false,
        //         autoHeight: true,
        //         nav: false,
        //         dots: true,
        //         smartSpeed: 700,
        //         items: 1
        //     });
        // } else {
             $('.slider-rek-online').owlCarousel({
                loop: false,
                autoplayTimeout: 7000,
                autoplay: false,
                touchDrag: false,
                mouseDrag: false,
                autoplayHoverPause: false,
                autoHeight: true,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        //}

        // $(".nav-next-rek").on("click", function() {
        //     $(".slider-rek-online").trigger('next.owl.carousel');
        // });

        // Button To Top
        $('.bt-top').on("click", function() {
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

        // Responsive Sub Menu Click
        $('ul li.menu-item-has-children > a').on("click", function(e) {
            e.preventDefault();
            //if($(this).parent().find("> ul").slideDown(300)){
              $(this).parent().find("> ul").slideToggle(300);
            //}else{
            //  $(this).parent().find("> ul").slideDown(300);              
            //}

        });

        // sticky main menu
        $(".wrap-sticky-menu").sticky({topSpacing:0});


        $(".nav-prev-rek").on("click", function() {
            $(".slider-rek-online").trigger('prev.owl.carousel');
        });
       
        $("#lowongan_step_1").on("click", function() {
          var a = $("#nama_lengkap").val();
          var b = $("#tempat_lahir").val();
          var c = $("#usia").val();
          var d = $("#tinggi_bdn").val();
          var e = $("#berat_bdn").val();
          var f = $("#ktp_p4").val();
          var g = $("#npwp_4").val();
          var h = $("#alamat").val();
          var i = $("#no_tlp").val();
          var j = $("#no_hp").val();
          var k = $("#email").val();
          var l = $("#nama_darurat").val();
          var m = $("#hubungan_darurat").val();
          var n = $("#no_hp_darurat").val();
          var o = $("#alamat_darutat").val();
          if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!='' && i!='' && j!='' && k!='' && l!='' && m!='' && n!='' && o!='' ){
             $(".slider-rek-online").trigger('next.owl.carousel');            
          }else{
            alert("*wajib disini, harap lengkapi data anda");
          }                         
         });

        $("#lowongan_step_2").on("click", function() {          
          $(".slider-rek-online").trigger('next.owl.carousel');                                           
         });

        $("#lowongan_step_3").on("click", function() {
          var a = $("#ortu_name").val();
          var b = $("#ortu_tgl_lahir").val();
          var c = $("#ortu_job").val();
          var d = $("#ortu_job_kantor").val();
          var e = $("#ortu_no_tlp").val();
          var f = $("#saudara_name").val();
          var g = $("#saudara_tgl_lahir").val();
          var h = $("#saudara_job").val();
          var i = $("#saudara_job_kantor").val();
          var j = $("#saudara_no_tlp").val();
          if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!='' && i!='' && j!=''){
             $(".slider-rek-online").trigger('next.owl.carousel');            
          }else{
            alert("*wajib disini, harap lengkapi data anda");
          }                         
         });

        $("#lowongan_step_4").on("click", function() {
          var a = $("#pendidikan_name").val();
          var b = $("#pendidikan_sekolah").val();
          var c = $("#pendidikan_jurusan").val();
          var d = $("#pendidikan_ipk").val();
          var e = $("#pendidikan_name2").val();
          var f = $("#pendidikan_sekolah2").val();
          var g = $("#pendidikan_jurusan2").val();
          var h = $("#pendidikan_ipk2").val();
          if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!=''){
             $(".slider-rek-online").trigger('next.owl.carousel');            
          }else{
            alert("*wajib disini, harap lengkapi data anda");
          }                         
         });

        $("#lowongan_step_5").on("click", function() {
             $(".slider-rek-online").trigger('next.owl.carousel');                                  
         });

        $("#lowongan_step_6").on("click", function() {
          var a = $("#pendapat_pekerjaan").val();
          var b = $("#faktor_pendukung_keberhasilan").val();

          if(a!='' && b!='' ){
             $(".slider-rek-online").trigger('next.owl.carousel');            
          }else{
            alert("*wajib disini, harap lengkapi data anda");
          }                         
         });

        $("#lowongan_step_7").on("click", function() {

             $(".slider-rek-online").trigger('next.owl.carousel');            
        });

        $("#lowongan_step_8").on("click", function() {

             $(".slider-rek-online").trigger('next.owl.carousel');            
        });

        $("#lowongan_step_9").on("click", function() {

             $(".slider-rek-online").trigger('next.owl.carousel');            
        });

                 

//        $("#lowongan_step_8").on("click", function() {
        //   var a = $("#nama_lengkap").val();
        //   var b = $("#tempat_lahir").val();
        //   var c = $("#usia").val();
        //   var d = $("#tinggi_bdn").val();
        //   var e = $("#berat_bdn").val();
        //   var f = $("#ktp_p4").val();
        //   var g = $("#npwp_4").val();
        //   var h = $("#alamat").val();
        //   var i = $("#no_tlp").val();
        //   var j = $("#no_hp").val();
        //   var k = $("#email").val();
        //   var l = $("#nama_darurat").val();
        //   var m = $("#hubungan_darurat").val();
        //   var n = $("#no_hp_darurat").val();
        //   var o = $("#alamat_darutat").val();
        //   if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!='' && i!='' && j!='' && k!='' && l!='' && m!='' && n!='' && o!='' ){
        //      $(".slider-rek-online").trigger('next.owl.carousel');            
        //   }else{
        //     alert("*wajib disini, harap lengkapi data anda");
        //   }                         
        //  });

        // $("#lowongan_step_1").on("click", function() {
        //   var a = $("#nama_lengkap").val();
        //   var b = $("#tempat_lahir").val();
        //   var c = $("#usia").val();
        //   var d = $("#tinggi_bdn").val();
        //   var e = $("#berat_bdn").val();
        //   var f = $("#ktp_p4").val();
        //   var g = $("#npwp_4").val();
        //   var h = $("#alamat").val();
        //   var i = $("#no_tlp").val();
        //   var j = $("#no_hp").val();
        //   var k = $("#email").val();
        //   var l = $("#nama_darurat").val();
        //   var m = $("#hubungan_darurat").val();
        //   var n = $("#no_hp_darurat").val();
        //   var o = $("#alamat_darutat").val();
        //   if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!='' && i!='' && j!='' && k!='' && l!='' && m!='' && n!='' && o!='' ){
        //      $(".slider-rek-online").trigger('next.owl.carousel');            
        //   }else{
        //     alert("*wajib disini, harap lengkapi data anda");
        //   }                         
        //  });

        // $("#lowongan_step_1").on("click", function() {
        //   var a = $("#nama_lengkap").val();
        //   var b = $("#tempat_lahir").val();
        //   var c = $("#usia").val();
        //   var d = $("#tinggi_bdn").val();
        //   var e = $("#berat_bdn").val();
        //   var f = $("#ktp_p4").val();
        //   var g = $("#npwp_4").val();
        //   var h = $("#alamat").val();
        //   var i = $("#no_tlp").val();
        //   var j = $("#no_hp").val();
        //   var k = $("#email").val();
        //   var l = $("#nama_darurat").val();
        //   var m = $("#hubungan_darurat").val();
        //   var n = $("#no_hp_darurat").val();
        //   var o = $("#alamat_darutat").val();
        //   if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!='' && i!='' && j!='' && k!='' && l!='' && m!='' && n!='' && o!='' ){
        //      $(".slider-rek-online").trigger('next.owl.carousel');            
        //   }else{
        //     alert("*wajib disini, harap lengkapi data anda");
        //   }                         
        //  });

        // $("#lowongan_step_1").on("click", function() {
        //   var a = $("#nama_lengkap").val();
        //   var b = $("#tempat_lahir").val();
        //   var c = $("#usia").val();
        //   var d = $("#tinggi_bdn").val();
        //   var e = $("#berat_bdn").val();
        //   var f = $("#ktp_p4").val();
        //   var g = $("#npwp_4").val();
        //   var h = $("#alamat").val();
        //   var i = $("#no_tlp").val();
        //   var j = $("#no_hp").val();
        //   var k = $("#email").val();
        //   var l = $("#nama_darurat").val();
        //   var m = $("#hubungan_darurat").val();
        //   var n = $("#no_hp_darurat").val();
        //   var o = $("#alamat_darutat").val();
        //   if(a!='' && b!='' && c!='' && d!='' && e!='' && f!='' && g!='' && h!='' && i!='' && j!='' && k!='' && l!='' && m!='' && n!='' && o!='' ){
        //      $(".slider-rek-online").trigger('next.owl.carousel');            
        //   }else{
        //     alert("*wajib disini, harap lengkapi data anda");
        //   }                         
        //  });




    });
})(jQuery);

$(document).on('show','.accordion', function (e) {
     //$('.accordion-heading i').toggleClass(' ');
     $(e.target).prev('.accordion-heading').addClass('accordion-opened');
});

$(document).on('hide','.accordion', function (e) {
    $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
    //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
});
    


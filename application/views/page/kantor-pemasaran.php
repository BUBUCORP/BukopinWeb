

<?php echo $head;?>

<?php echo $navbar;?>

<?php echo $breadcrumb;?>

    <style>



      #map {

      	width: 350px;

        height: 100%;

      }

    </style>

<!-- content page -->

<div class="wrap-content-page2">

	<div class="container">

		<div class="content-page2">

			<div class="row">

				<!-- content page -->

				<div class="col-md-8 col-md-push-4">

					<div class="c-block-1 content-page-in">

						<h3>Kantor Perwakilan</h3>

						<div class="c-block-1">

							<div class="c-block-1-img"> 

								<img width="100%" src="<?php echo base_url('assets/images/06-KARTU-KREDIT-KANTOR-PEMASARAN.png');?>">

							</div>

						</div>

							<!-- c blok 1 -->

							<div class="col-md-12" style=" background: #0f9f0f;">

								<div class="row form-field" id="container" >

									<form name="jaringanatm" method="POST" action="">

										<div class="col-md-6 ">

											<strong><label style="color: #fff;">Provinsi</label></strong><br>

											<select name="provinsi" id="provinsi" >

													<option value="6" selected>DKI Jakarta</option>

												<?php foreach ($provinsi as $key => $val) {?>

													<option value="<?=$val['idprovinsi'];?>"><?=$val['nama_provinsi'];?></option>

												<?php }?>										

											</select>

										</div>

										<div class="col-md-6 ">

											<strong><label style="color: #fff;">Kota</label></strong><br>

											<select name="kota" id="kota" >

												<option value="">Select</option>	

												<?php foreach ($kabupaten as $key => $val) {?>

													<option value="<?=$val['idkabupaten'];?>"><?=$val['namakabupaten'];?></option>

												<?php }?>												

																						

											</select>

										</div>	

									</form>							

								</div>

							</div>

						<div id="map" style="height:300px;width:595px;background-size:contain;"></div>

						<div class="post-content "> 









						<div class="col-md-12" id="contenAlamat">

							<?php foreach ($content as $key => $val) { ?>

								<doc>

									

										<div class="row" style="border-bottom: 1px solid #ccc;margin-top: 15px;">

											<div  class="col-md-9 text-left">

												<p>

													<strong><?=$val['title']?></strong>

												<br>								

													<?=$val['alamat']?>								

												</p>							

											</div>

											<div class="col-md-3">												

												<a target="_blank" href="http://maps.google.com/maps?saddr=&daddr=<?=$val['lat']?>,<?=$val['lng']?>" class="btn btn-default"><i class="fa fa-map-marker" ></i> | Buka di Peta</a>

											</div>

										</div>	

									

								</doc>							

							<?php }?>

						</div>

						<div class="col-md-12">

							 <div id="pagination" style="margin: auto;">

							</div>						

						</div>

						

						</div>

					</div>

				</div>



				<?php echo $sidebar; ?>



			</div>

		</div>

	</div>

</div>

<script src="<?php echo base_url('assets/js/smartpaginator/smartpaginator.js');?>"></script>

<script type="text/javascript">

// GOOGLE MAPS 

var gmarkers = new Array();

var globapMap;

var jsonUrl = "<?php echo site_url('page/getjaringan/3');?>";

var linkUrl;

var marker, i;

var mapOptions;

var defLatlng;

var map;

var geocoder;

var infowindow;

var datas;

//CONTOH DATA

datas = 

[{"id_jaringan":"60","type_jaringan":"PEMASARAN","idprovinsi":"6","idkabupaten":"147","title":"KCP Rasuna Said","alamat":"Gd. Dep. Koperasi & UKM Lt.1 Jl. HR. Rasuna Said Kav.3-5 Jakarta Selatan 12940<br><strong>Telp.<\/strong>(021) 5257903, 52921240\/ 41<br><strong>Fax.<\/strong>(021) 5221579","lat":"-6.2192221","lng":"106.8306454","map":null},{"id_jaringan":"67","type_jaringan":"PEMASARAN","idprovinsi":"6","idkabupaten":"147","title":"KCP Plaza Asia","alamat":"Jl. Jend. Sudirman Kav. 59 No. 77 Lt. GF No. GF - D Blok A Senayan, Kebayoran Baru, Jakarta Selatan<br><strong>Telp.<\/strong>(021) 51401083, 51401086<br><strong>Fax.<\/strong>(021) 51401082","lat":"-6.226676","lng":"106.8082743","map":null},{"id_jaringan":"68","type_jaringan":"PEMASARAN","idprovinsi":"6","idkabupaten":"147","title":"KCP Bulog II","alamat":"Gedung Diklat Bulog II Jl. Kuningan Timur Blok M2 No.5 Jakarta Selatan 12950<br><strong>Telp.<\/strong>(021) 5204262\/ 85<br><strong>Fax.<\/strong>(021) 5204265","lat":"-6.2359748","lng":"106.8273414","map":null},{"id_jaringan":"70","type_jaringan":"PEMASARAN","idprovinsi":"6","idkabupaten":"147","title":"KCP Pondok Indah Plaza V","alamat":"Plaza V Pondok Indah Kav.A11 Jl. Marga Guna Raya - Pondok Indah Jakarta Selatan<br><strong>Telp.<\/strong>(021) 7396863 \/ 7396876<br><strong>Fax.<\/strong>(021) 7396882","lat":"-6.2736728","lng":"106.7796382","map":null},{"id_jaringan":"71","type_jaringan":"PEMASARAN","idprovinsi":"6","idkabupaten":"147","title":"KCP Kebayoran Lama","alamat":"Jl. Raya Kebayoran Lama No.10 Jakarta Selatan 12220<br><strong>Telp.<\/strong>(021) 7393737 \/ 2700579<br><strong>Fax.<\/strong>(021) 2700578","lat":"-6.2303508","lng":"106.7716593","map":null}];



function initMap() {

	defLatlng = new google.maps.LatLng(-6.2439351, 106.8499851);

    mapOptions ={

        map: map,

        zoom: 12,

        minZoom: 2,

        center: defLatlng,

        mapTypeId: google.maps.MapTypeId.ROADMAP,

        panControl: false,

        zoomControl: true,

        mapTypeControl: false,

        scaleControl: true,

        streetViewControl: false,

        navigationControl: true

    };

	map = new google.maps.Map(document.getElementById("map"), mapOptions);

    geocoder = new google.maps.Geocoder();

    infowindow = new google.maps.InfoWindow();

    globapMap = map;



	for (i = 0; i < datas.length; i++) {

		marker = new google.maps.Marker({

            position: new google.maps.LatLng(datas[i].lat, datas[i].lng),

            map: map,            

            zIndex: 10,            

            markerAddress: datas[i].alamat

        });

		google.maps.event.addListener(marker, 'click', (function(marker, i) {

			  return function() {

			  		linkUrl  = datas[i].lat+","+datas[i].lng;

                    //Set pop up marker contents

                    infowindow.setContent(

                        "<div class='map-popup'>"+

                        "<h5>"+datas[i].title+"</h5>"+

                        "<div class='map-popup-content'>"+

                        "<p>"+datas[i].alamat+"</p>"+

						"<p><a href='javascript:void(0);' onclick=\"callExternalLinks('http://maps.google.com/maps?saddr=&daddr='+linkUrl)\">Get Direction &raquo;</a></p>"+

                        "</div>"+

                        "</div>"

                    );

                    infowindow.open(map, marker);

			  }

		})(marker, i));

		gmarkers.push(marker);

	}

}



function callExternalLinks(link){

	window.open(link);

}



function clearMarkers() {

  for (i = 0; i < gmarkers.length; i++) {

    gmarkers[i].setMap(null);

  }

  gmarkers = [];

}



function reloadMap(e){

	datas = e;

	 for(var i = 0; i <gmarkers.length; i++){

	 	 var thisMarker = gmarkers[i];

	 	 thisMarker.setMap(null);

	 	 if(i==1){

	 	 	defLatlng = new google.maps.LatLng(datas[1].lat, datas[1].lng);	 	 	

	 	 }

	 }

    mapOptions ={

        map: map,

        zoom: 12,

        minZoom: 2,

        center: defLatlng,

        mapTypeId: google.maps.MapTypeId.ROADMAP,

        panControl: false,

        zoomControl: true,

        mapTypeControl: false,

        scaleControl: true,

        streetViewControl: false,

        navigationControl: true

    };

	map = new google.maps.Map(document.getElementById("map"), mapOptions);

    geocoder = new google.maps.Geocoder();

    infowindow = new google.maps.InfoWindow();

    globapMap = map;



	for (i = 0; i < datas.length; i++) {

		marker = new google.maps.Marker({

            position: new google.maps.LatLng(datas[i].lat, datas[i].lng),

            map: map,            

            zIndex: 10,            

            markerAddress: datas[i].alamat

        });

		google.maps.event.addListener(marker, 'click', (function(marker, i) {

			  return function() {

			  		linkUrl  = datas[i].lat+","+datas[i].lng;

                    //Set pop up marker contents

                    infowindow.setContent(

                        "<div class='map-popup'>"+

                        "<h5>"+datas[i].title+"</h5>"+

                        "<div class='map-popup-content'>"+

                        "<p>"+datas[i].alamat+"</p>"+

						"<p><a href='javascript:void(0);' onclick=\"callExternalLinks('http://maps.google.com/maps?saddr=&daddr='+linkUrl)\">Get Direction &raquo;</a></p>"+

                        "</div>"+

                        "</div>"

                    );

                    infowindow.open(map, marker);

			  }

		})(marker, i));

		gmarkers.push(marker);

	}

}

//GOOGLE MAP END



$(function() {

	//drop();

$('#pagination').smartpaginator({ totalrecords: <?php echo count($content);?>,recordsperpage: 5,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });



	$('#provinsi').change(function(){	

		var idProv = $('#provinsi').val();

		 $.getJSON(jsonUrl+'/'+idProv,function(datas){		 	

		 	//console.log(datas);

		 	if(datas.length>0){

			 	reloadMap(datas);

			 	$("#contenAlamat").empty();

			 	for (key in datas) {

			 		var str = '<doc><div class="row" style="border-bottom: 1px solid #ccc;margin-top: 15px;"><div class="col-md-9 text-left"><p><strong>'+datas[key].title+'</strong><br>'+datas[key].alamat+'</p></div><div class="col-md-3"><a target="_blank" href="http://maps.google.com/maps?saddr=&daddr='+datas[key].lat+','+datas[key].lng+'" class="btn btn-default"><i class="fa fa-map-marker" ></i> | Buka di Peta</a></div></div></doc>';

			 		$("#contenAlamat").append(str);

			 	}

				$('#pagination').smartpaginator({ totalrecords: datas.length,recordsperpage: 5,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });



		 	}else{

		 		clearMarkers();

		 		$("#contenAlamat").empty();

		 		$('#kota').empty();

				$('#pagination').smartpaginator({ totalrecords: 0,recordsperpage: 5,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });



		 	}

		 });

		 $.getJSON('<?php echo site_url("page/getkabupaten/");?>' + idProv, function(data) {

		 	$('#kota').empty();

			for (key in data) {

				$('#kota').append($('<option>', {value: data[key].idkabupaten,text: data[key].namakabupaten}));

			}



		});			

	});



	$('#kota').change(function(){	

		var idProv = $('#provinsi').val();

		var idKota = $('#kota').val();



		 $.getJSON(jsonUrl+'/'+idProv+'/'+idKota,function(datas){		 	

		 	//console.log(datas);

		 	if(datas.length>0){

			 	reloadMap(datas);

			 	$("#contenAlamat").empty();

			 	for (key in datas) {

			 		var str = '<doc><div class="row" style="border-bottom: 1px solid #ccc;margin-top: 15px;"><div class="col-md-9 text-left"><p><strong>'+datas[key].title+'</strong><br>'+datas[key].alamat+'</p></div><div class="col-md-3"><a target="_blank" href="http://maps.google.com/maps?saddr=&daddr='+datas[key].lat+','+datas[key].lng+'" class="btn btn-default"><i class="fa fa-map-marker" ></i> | Buka di Peta</a></div></div></doc>';

			 		$("#contenAlamat").append(str);

			 	}

				$('#pagination').smartpaginator({ totalrecords: datas.length,recordsperpage: 5,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });



		 	}else{

		 		clearMarkers();

		 		$("#contenAlamat").empty();		 		

				$('#pagination').smartpaginator({ totalrecords: 0,recordsperpage: 5,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });



		 	}

		 });

		

	});



});	

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYz0K18IcYbJcGBe-GAlJUl6uVf9dq3FA&signed_in=true&callback=initMap"></script>

<?php echo $footer;?>
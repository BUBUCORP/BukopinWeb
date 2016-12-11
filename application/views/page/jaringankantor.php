
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
						<h3>Jaringan Kantor Bukopin</h3>
    <style>

      #map {
      	width: 350px;
        height: 100%;
      }
    </style>

 

							<div id="map" style="height:300px;width:595px;background-size:contain;"></div>
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
var jsonUrl = "<?php echo site_url('page/getjaringan/1');?>";
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
[{"id_jaringan":"60","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Rasuna Said","alamat":"Gd. Dep. Koperasi & UKM Lt.1 Jl. HR. Rasuna Said Kav.3-5 Jakarta Selatan 12940<br><strong>Telp.<\/strong>(021) 5257903, 52921240\/ 41<br><strong>Fax.<\/strong>(021) 5221579","lat":"-6.2192221","lng":"106.8306454","map":null},{"id_jaringan":"67","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Plaza Asia","alamat":"Jl. Jend. Sudirman Kav. 59 No. 77 Lt. GF No. GF - D Blok A Senayan, Kebayoran Baru, Jakarta Selatan<br><strong>Telp.<\/strong>(021) 51401083, 51401086<br><strong>Fax.<\/strong>(021) 51401082","lat":"-6.226676","lng":"106.8082743","map":null},{"id_jaringan":"68","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Bulog II","alamat":"Gedung Diklat Bulog II Jl. Kuningan Timur Blok M2 No.5 Jakarta Selatan 12950<br><strong>Telp.<\/strong>(021) 5204262\/ 85<br><strong>Fax.<\/strong>(021) 5204265","lat":"-6.2359748","lng":"106.8273414","map":null},{"id_jaringan":"70","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Pondok Indah Plaza V","alamat":"Plaza V Pondok Indah Kav.A11 Jl. Marga Guna Raya - Pondok Indah Jakarta Selatan<br><strong>Telp.<\/strong>(021) 7396863 \/ 7396876<br><strong>Fax.<\/strong>(021) 7396882","lat":"-6.2736728","lng":"106.7796382","map":null},{"id_jaringan":"71","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Kebayoran Lama","alamat":"Jl. Raya Kebayoran Lama No.10 Jakarta Selatan 12220<br><strong>Telp.<\/strong>(021) 7393737 \/ 2700579<br><strong>Fax.<\/strong>(021) 2700578","lat":"-6.2303508","lng":"106.7716593","map":null},{"id_jaringan":"74","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Kebayoran Baru","alamat":"Jl. RS. Fatmawati No.7 Blok A Kebayoran Baru Jakarta Selatan12140<br><strong>Telp.<\/strong>(021) 7245577, 7202392<br><strong>Fax.<\/strong>(021) 7398600","lat":"-6.258916","lng":"106.7948433","map":null},{"id_jaringan":"80","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Melawai","alamat":"Jl. Melawai Raya Kebayoran Baru No. 66 Jakarta Selatan 12160<br><strong>Telp.<\/strong>(021) 72789683<br><strong>Fax.<\/strong>(021) 72789688, 7278908","lat":"-6.245629","lng":"106.7953022","map":null},{"id_jaringan":"87","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK PLN AP Lenteng Agung","alamat":"Jl. Raya Tanjung Barat No. 55 Jakarta Selatan 12610<br><strong>Telp.<\/strong>(021) 78843985<br><strong>Fax.<\/strong>(021) 78843985","lat":"-6.3098554","lng":"106.8373008","map":null},{"id_jaringan":"88","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Bidakara","alamat":"Gd. Menara Bidakara Lt. Lobby, Jl. Jend. Gatot Subroto Kav. 71 - 72 Pancoran, Jakarta Selatan 12870<br><strong>Telp.<\/strong>(021) 83700825<br><strong>Fax.<\/strong>(021) 83700826","lat":"-6.217273","lng":"106.8268583","map":null},{"id_jaringan":"89","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Kalibata","alamat":"Kalibata Mall Lantai Dasar, Jl. Raya Taman Makam Pahlawan Kalibata Jakarta Selatan 12750<br><strong>Telp.<\/strong>(021) 7988556<br><strong>Fax.<\/strong>(021) 7901674","lat":"-6.2573136","lng":"106.8552173","map":null},{"id_jaringan":"91","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK PLN Mampang","alamat":"Gd. PLN Mampang Jl. Warung Buncit Raya No. 10 Jakarta Selatan 12760<br><strong>Telp.<\/strong>(021) 79181662<br><strong>Fax.<\/strong>(021) 79182938","lat":"-6.2658831","lng":"106.8231426","map":null},{"id_jaringan":"99","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK LIA Pengadegan","alamat":"Kampus LBA LIA JL. Pengadegan Timur No. 11 Jakarta Selatan 12770<br><strong>Telp.<\/strong>(021) 7948701<br><strong>Fax.<\/strong>(021) 7948701","lat":"-6.24823935","lng":"106.85969565","map":null},{"id_jaringan":"102","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK PLN Bulungan CSW","alamat":"Gd. PLN CSW Bulungan Lt. Dasar, Jl. Sisingamangaraja No. 1 Kebayoran Baru, Jakarta - 12120<br><strong>Telp.<\/strong>(021) 7244754<br><strong>Fax.<\/strong>(021) 7244859","lat":"-6.24056775","lng":"106.80335384","map":null},{"id_jaringan":"108","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK RS. MMC","alamat":"Gd. RS. MMC Lt. Basement, Jl. HR. Rasuna Said Kav. C 20-21 Kuningan, Jakarta Selatan - 12940<br><strong>Telp.<\/strong>(021) 5202615<br><strong>Fax.<\/strong>(021) 5202616","lat":"-6.21979474","lng":"106.83248598","map":null},{"id_jaringan":"112","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Dolog Jaya","alamat":"Komp Perum Bulog Divre DKI Jaya, Jl. Perintis Kemerdekaan Jakarta - 14220<br><strong>Telp.<\/strong>(021) 45840713<br><strong>Fax.<\/strong>(021) 4502964","lat":"-6.1706391","lng":"106.8950845","map":null},{"id_jaringan":"115","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Jamsostek Cilandak","alamat":"Gedung Jamsostek Cilandak Jl. RA. Kartini Kav.13 Cilandak Barat Jakarta Selatan 12430<br><strong>Telp.<\/strong>021-7659789<br><strong>Fax.<\/strong>021-7659669","lat":"-6.29281091","lng":"106.79346286","map":null},{"id_jaringan":"116","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Trunojoyo","alamat":"Gd. PLN Pusat Lobby Lt. Dasar, Jl. Trunojoyo Blok M1 No. 135 Kebayoran Baru Jakarta Selatan<br><strong>Telp.<\/strong>(021) 72793450<br><strong>Fax.<\/strong>(021) 72793450","lat":"-6.240567","lng":"106.8033529","map":null},{"id_jaringan":"122","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Perbanas","alamat":"Kampus Perbanas Jl.Karet Perbanas Kuningan Jakarta Selatan 12940<br><strong>Telp.<\/strong>(021) 52921286<br><strong>Fax.<\/strong>(021) 52921287","lat":"-6.217148","lng":"106.828693","map":null},{"id_jaringan":"123","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Bulog I","alamat":"Gedung. Perum Bulog Lt. Dasar, Jl. Jenderal Gatot Subroto Kav.49 Jakarta Selatan<br><strong>Telp.<\/strong>(021) 5204941<br><strong>Fax.<\/strong>(021) 5204945","lat":"-6.23715552","lng":"106.82934243","map":null},{"id_jaringan":"127","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KK Menara Kuningan","alamat":"Gd. Menara Kuningan Lt. Dasar, Jl. HR.Rasuna Said Blok X-7 Kav. 5 Jakarta Selatan 12940<br><strong>Telp.<\/strong>(021) 30016075<br><strong>Fax.<\/strong>(021) 30016074","lat":"-6.21846663","lng":"106.83058116","map":null},{"id_jaringan":"137","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Radio Dalam","alamat":"Jl. Radio Dalam Raya No.89 Jakarta Selatan<br><strong>Telp.<\/strong>(021) 73910987<br><strong>Fax.<\/strong>(021) 73910978","lat":"-6.2580699","lng":"106.7893631","map":null},{"id_jaringan":"151","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Dr. Saharjo","alamat":"Jl. Dr. Saharjo No. 317 Blok A - E Rt. 009\/ 003, Kelurahan Tebet, Kecamatan Tebet, Jakarta Selatan<br><strong>Telp.<\/strong>(021) 83702515<br><strong>Fax.<\/strong>(021) 83701202","lat":"-6.2281217","lng":"106.8477221","map":null},{"id_jaringan":"152","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Tebet","alamat":"Jl. Tebet Barat Dalam Raya No. 153 A Tebet, Jakarta Selatan 12810<br><strong>Telp.<\/strong>(021) 83790423<br><strong>Fax.<\/strong>(021) 83701728","lat":"-6.237158","lng":"106.847132","map":null},{"id_jaringan":"153","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Pondok Indah Plaza I","alamat":"Jl. Metro Duta Plaza I Kav. UA No. 6 Pondok Indah Jakarta Selatan<br><strong>Telp.<\/strong>(021) 7657707<br><strong>Fax.<\/strong>(021) 7504010, 7504011","lat":"-6.279659","lng":"106.781526","map":null},{"id_jaringan":"154","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Bakrie Tower","alamat":"Menara Epicentrum Lt. 1, Jl. HR. Rasuna Said Jakarta Selatan 12960<br><strong>Telp.<\/strong>(021) 29941488<br><strong>Fax.<\/strong>(021) 29941477","lat":"-6.219388","lng":"106.834598","map":null},{"id_jaringan":"155","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"KCP Cinere","alamat":"Jl. Cinere Raya Blok A No. 26 - 27 Cinere - Jakarta Selatan 16515<br><strong>Telp.<\/strong>(021) 7536335<br><strong>Fax.<\/strong>(021) 7546234","lat":"-6.332274","lng":"106.783074","map":null},{"id_jaringan":"173","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"Kantor Fungsional Non Operasional Mikro Mampang","alamat":"Jl. Buncit Raya Pulo No. 117 A Rt. 005\/ 010 Mampang Jakarta Selatan 12790<br><strong>Telp.<\/strong>(021) 7971065<br><strong>Fax.<\/strong>","lat":"-6.25615","lng":"106.8273339","map":null},{"id_jaringan":"174","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"Kantor Fungsional Non Operasional Mikro Mayestik","alamat":"Jl. Kyai Maja No. 63 Ruko Blok B No. 24 Jakarta Selatan<br><strong>Telp.<\/strong><br><strong>Fax.<\/strong>","lat":"-6.2404242","lng":"106.7927267","map":null},{"id_jaringan":"176","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"Kantor Fungsional Non Operasional Mikro Fatmawati","alamat":"Jl. RS. Fatmawati Kav. 5 Gd. Plaza Mebel Lt. Dasar Jakarta Selatan 12420<br><strong>Telp.<\/strong>(021) 7506443<br><strong>Fax.<\/strong>","lat":"-6.265045","lng":"106.797049","map":null},{"id_jaringan":"201","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"Kantor Fungsional Non Operasional Mikro Pasar Minggu","alamat":"Jl. Tanjung Barat Raya No. 111 Jagakarsa Jakarta Selatan 12530<br><strong>Telp.<\/strong>(021) 78843565<br><strong>Fax.<\/strong>","lat":"-6.29976116","lng":"106.84086813","map":null},{"id_jaringan":"216","type_jaringan":"KANTOR","idprovinsi":"6","idkabupaten":"147","title":"Kantor Pusat","alamat":"Jl. M.T. Haryono Kav. 50-51 Jakarta - 12770. www.bukopin.co.id<br><strong>Telp.<\/strong>(021) 7988266 \/ 7989837<br><strong>Fax.<\/strong>(021) 7980625 \/ 7980238 \/ 7980244","lat":"-6.24393396","lng":"106.8500806","map":null}];

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
$('#pagination').smartpaginator({ totalrecords: <?php echo count($content);?>,recordsperpage: 10,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });

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
				$('#pagination').smartpaginator({ totalrecords: datas.length,recordsperpage: 10,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });

		 	}else{
		 		clearMarkers();
		 		$("#contenAlamat").empty();
		 		$('#kota').empty();
				$('#pagination').smartpaginator({ totalrecords: 0,recordsperpage: 10,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });

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
				$('#pagination').smartpaginator({ totalrecords: datas.length,recordsperpage: 10,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });

		 	}else{
		 		clearMarkers();
		 		$("#contenAlamat").empty();		 		
				$('#pagination').smartpaginator({ totalrecords: 0,recordsperpage: 10,datacontainer: 'contenAlamat', dataelement: 'doc',theme: 'green' });

		 	}
		 });
		
	});

});	
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYz0K18IcYbJcGBe-GAlJUl6uVf9dq3FA&signed_in=true&callback=initMap"></script>
<?php echo $footer;?>

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
var jsonUrl = "<?php echo site_url('page/getjaringan/2');?>";
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
[{"id_jaringan":"342","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"ATM BASEMENT II ##","alamat":"JL. MT HARYONO KAV. 50 - 51 JAKSEL","lat":"-6.2439942","lng":"106.8496581","map":""},{"id_jaringan":"343","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"ATM CENTER PASARAYA","alamat":"Pasaraya Gedung Dalam A,Jln. Iskandarsyah II No.2 Blok M Kebayoran Baru Jaksel","lat":"-6.2476517","lng":"106.7974536","map":""},{"id_jaringan":"344","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"ATM SPBU COCO MT. Haryono","alamat":"Jl. MT Haryono, Tebet, Jakarta Selatan","lat":"-6.2535479","lng":"106.8304312","map":""},{"id_jaringan":"345","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"ATM SPBU COCO Rasuna Said","alamat":"JL. HR Rasuna Said Kax X2\/2, Jakarta Selatan","lat":"-6.2175515","lng":"106.8122292","map":""},{"id_jaringan":"346","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"ATM SPBU COCO Tendean","alamat":"Jl. Kapt.Piere Tendean No.38, Jakarta Selatan","lat":"-6.242339","lng":"106.85238","map":""},{"id_jaringan":"347","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"BANKING HALL","alamat":"JL.MT.HARYONO KAV.50-51 JAK SEL","lat":"-6.2440432","lng":"106.8502502","map":""},{"id_jaringan":"348","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"BASEMENT 3","alamat":"JL. MT HARYONO KAV. 50 - 51 JAK SEL","lat":"-6.2440432","lng":"106.8502502","map":""},{"id_jaringan":"349","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"CPM ABDA","alamat":"GD ABDA JL.JEND SUDIRMAN KAV 59 NO.77 KBY BARU JAKSEL","lat":"-6.2265095","lng":"106.8097823","map":""},{"id_jaringan":"350","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"DBEST FATMAWATI","alamat":"KOMPLEK GOLDEN FATMAWATI (ATM CENTER RUKO DBEST FATMAWATI) JL.FATMAWATI RAYA NO.15 JAKSEL","lat":"-6.225014","lng":"106.8413738","map":""},{"id_jaringan":"351","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"GRAHA ENERGY","alamat":"GRAHA ENERGY, JL.JEND SUDIRMAN, JAKSEL","lat":"-6.2261149","lng":"106.8065072","map":""},{"id_jaringan":"352","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"HOTEL BUMIKARSA","alamat":"JL. GATOT SUBROTO Kav. 71-73 PANCORAN JAK SEL","lat":"-6.2265158","lng":"106.8168678","map":""},{"id_jaringan":"353","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KAMPUS PERBANAS","alamat":"Jl. Perbanas, Karet Kuningan, Setiabudi Jakarta Selatan","lat":"-6.2171547","lng":"106.8281759","map":""},{"id_jaringan":"354","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KAMPUS STEKPI","alamat":"KAMPUS STEKPI JL. TMP KALIBATA, JAK SEL","lat":"-6.254323","lng":"106.8487872","map":""},{"id_jaringan":"355","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KCP BAKRIE TOWER","alamat":"JL. H.R. RASUNA SAID, JAKSEL","lat":"-6.2196492","lng":"106.8342318","map":""},{"id_jaringan":"356","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KCP BULOG II","alamat":"JL GATOT SUBROTO KAV 49 PANCORAN, JAK SEL","lat":"-6.2299027","lng":"106.8325154","map":""},{"id_jaringan":"357","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KCP KBY LAMA","alamat":"JL RAYA KEBAYORAN LAMA NO.10 JAK SEL","lat":"-6.2312268","lng":"106.7777715","map":""},{"id_jaringan":"358","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KCP KBY-BARU","alamat":"JL RS FATMAWATI NO.7 KBY BARU, JAK SEL","lat":"-6.2529961","lng":"106.7881949","map":""},{"id_jaringan":"359","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KCP MALL PDK INDAH","alamat":"JL. MARGAGUNA BLK A 11 PIM, JAK SEL","lat":"-6.2529959","lng":"106.7881949","map":""},{"id_jaringan":"360","type_jaringan":"ATM","idprovinsi":"6","idkabupaten":"147","title":"KCP MELAWAI","alamat":"Jl Melawai Raya No.66, JakSel","lat":"-6.2457611","lng":"106.7985648","map":""}];

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
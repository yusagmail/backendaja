<?php

use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AssetItem;
use backend\models\AssetItem_Generic;
use backend\models\TypeAssetItem3;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$dataListAssetTypeAsetItem3 = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
AppAsset::register($this);
?>
<link href="http://leaflet.github.io/Leaflet.fullscreen/dist/leaflet.fullscreen.css" rel='stylesheet' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" integrity="sha256-iYUgmrapfDGvBrePJPrMWQZDcObdAcStKBpjP3Az+3s=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js" integrity="sha256-CNm+7c26DTTCGRQkM9vp7aP85kHFMqs9MhPEuytF+fQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="http://leaflet.github.io/Leaflet.fullscreen/dist/Leaflet.fullscreen.min.js"></script> 

<style>
	#map {
		height: 450px;
		width: 100% !important margin: 0px;
		padding: 0px;
	}
	.leaflet-right {
		right: 13px;
	}
	.leaflet-top {
    	top: 11px;
	}
	.leaflet-panel-layers {
    padding: 4px;
    background: rgba(255,255,255,0.5);
    box-shadow: -2px 0 8px rgba(0,0,0,0.3);
	}
</style>
<?php
	$defaultvaluepath = backend\models\AssetItemSearch_Generic::getValueMapPathFromDynamicLabel($model, $varian_group);
	// echo "DATA : ".$defaultvaluepath;
	$first_latitude = "-6.92468015606316";
	$first_longitude = "107.59700775146484";
	// $data = '[[' . $first_latitude . ', ' . $first_longitude . ']]';	
	$parse = '{"type": "FeatureCollection","features":['.$defaultvaluepath.']}';

	$data = json_decode($parse, true);
	// print_r($data);

	$set = 1;
	$no=0;
	if(isset($data['features'])){
		foreach($data['features'] as $key => $val)
		{
			//print_r($var = $val['geometry']['coordinates']); 
				// echo $var[1];
				// echo $var[0];
			$no++;
			if($no == 1){
				//ambil data pertama sebagai centernya
				// $first_latitude = $var[1];
				// $first_longitude = $var[0];
			}
		}
	}
	if($defaultvaluepath != ""){
?>
<div class="map-view-form">
            
			<div class="row">
				<div class="col-md-9">
					<div class="box-body">
						<div id="map"></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box-body" style="">
						<label class="container">Base Map Utama
							<input type="checkbox" id="basemap" checked="checked">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
</div>
<script>
   
   function initialize() {

       	var initlat = <?=$first_latitude?>;
       	var initlong = <?=$first_longitude?>;
       	var mapCenter = [initlat, initlong];
        var map = L.map('map').setView([initlat,  initlong], 15);
        var tileLayer = new L.tileLayer('http://{s}.google.com/vt/lyrs=traffic,m&x={x}&y={y}&z={z}', {
                attribution: '&copy; <a href="#">OpenStreetMap</a> contributors',
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                maxZoom: 18,
                id: 'mapbox.light'
        });
        tileLayer.addTo(map);
        
		var scale = L.control.scale(); // Creating scale control
            scale.addTo(map); // Adding scale control to the map
        
		/*
		var icons = '<?php echo Yii::getAlias('@web') . '/images/powerlinepole.png'?>';

        var icon = L.icon({
           iconUrl: icons,
           iconSize: [30, 42],
           iconAnchor: [15, 42],
           });
       	
		var marker = L.marker(mapCenter,{
           icon: icon
    	}).addTo(map);
		*/

		 <?php if($parse != "") { ?>
		var data = <?php echo $parse ?>;
		// var mygeojson = {"type": "FeatureCollection","features":[data]};
		// console.log(mygeojson);
		var layerwilayah = L.geoJson(null,{
			onEachFeature: onEachFeature,
			style: function(feature){
				// Warna Polygon 
				return {
					color: "#FF0000",
					weight: 4,
					opacity: 1,
				};
			}
		});
		layerwilayah.addData(data);
		// layerwilayah.addTo(map); // fungsi ini tidak ditampilkan dimap 
		<?php } ?>

		//custom style warna polygon 
		var mystyle = {
			color: "#FF0000",
			weight: 4,
			opacity: 1,
		}
		
		function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
		}

		function featureToMarker(feature, latlng) {
			return L.marker(latlng, {
				icon: L.divIcon({
					className: 'marker-'+feature.properties.amenity,
					// html: iconByName(feature.properties.amenity),
					// iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
					iconSize: [25, 41],
					iconAnchor: [12, 41],
					popupAnchor: [1, -34],
					shadowSize: [41, 41]
				})
			});
		}

		var baseLayers = [
			{
				name: "GoogleMaps",
				layer: tileLayer
			},
			{
				name: "OpenCycleMap",
				layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
			},
			{
				name: "OpenStreetMap",
				layer: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
			}
		];

		// variable overlayers ini digunakan untuk menampilkan data ploygon, 
		var overLayers = [
			{
				name: "Polygon",
				icon: iconByName('bar'),
				layer: L.geoJson(data, {pointToLayer: featureToMarker,onEachFeature: onEachFeature, style:mystyle}).addTo(map)
			},
		];

		var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true
		});

		map.addControl(panelLayers);

		/* 	ini untuk Popup Label dan ini hany contoh mengambil data
			dari Geometry (feature.properties.Name)
		*/
		function onEachFeature(feature, layer) {

			//var popupContent = "<p> "+feature.properties.Name + "</p>";
			var popupContent = "<p>Asset</p>";

			if (feature.properties && feature.properties.popupContent) {
				popupContent += feature.properties.popupContent;
			}

			layer.bindPopup(popupContent);
		}
		
       	// create fullscreen control
       	var fsControl = L.control.fullscreen();
       	// add fullscreen control to the map
       	map.addControl(fsControl);

       	// detect fullscreen toggling
       	map.on('enterFullscreen', function(){
           if(window.console) window.console.log('enterFullscreen');
       	});
       	map.on('exitFullscreen', function(){
           if(window.console) window.console.log('exitFullscreen');
       	});

		document.getElementById("basemap").addEventListener("change", function () {
            if (document.getElementById(this.id).checked == true) {
                tileLayer.addTo(map);
            } else {
                tileLayer.remove(map);
            }
        });
   }

   function loadScript() {
          initialize();
   }

   window.onload = loadScript;

</script>
<?php
	}else{
		echo '
		<div class="callout callout-warning">
			<h4>Peta belum bisa ditampilkan</h4>

			<p>Peta tidak bisa ditampilkan. Area di peta belum diset / ditentukan!.
			</p>
		</div>
		';
	}
?>
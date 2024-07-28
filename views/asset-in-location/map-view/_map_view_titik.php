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

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js" integrity="sha256-CNm+7c26DTTCGRQkM9vp7aP85kHFMqs9MhPEuytF+fQ=" crossorigin="anonymous"></script>
<script src="http://leaflet.github.io/Leaflet.fullscreen/dist/Leaflet.fullscreen.min.js"></script>

<style>
	#map {
		height: 450px;
		width: 100% !important margin: 0px;
		padding: 0px;
	}
</style>

<?php

	$defaultvaluepath = backend\models\AssetItemSearch_Generic::getValueMapPathFromDynamicLabel($model, $varian_group);
    // echo "DATA : ".$defaultvaluepath;
	
	$first_latitude = "-6.92468015606316";
    $first_longitude = "107.59700775146484";

	$parse = '{"type": "FeatureCollection","features":['.$defaultvaluepath.']}';
	// echo $parse;
	$data = json_decode($parse, true);
	// print_r($data);
	
	$set = 1;
	$no=0;
	if(isset($data['features'])){
		foreach($data['features'] as $key => $val)
		{
			$var = $val['geometry']['coordinates']; 
				// echo $var[0];
				// echo $var[1];
			$no++;
			if($no == 1){
				//ambil data pertama sebagai centernya
				$first_latitude = $var[1];
				$first_longitude = $var[0];
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
        
		var icons = '<?php echo Yii::getAlias('@web') . '/leaflet/images/marker-hijau.png'?>';

        var icon = L.icon({
           iconUrl: icons,
           iconSize: [30, 42],
           iconAnchor: [15, 42],
        });
       	/*
		var marker = L.marker(mapCenter,{
        //    icon: icon
    	}).addTo(map);
        */
        <?php if($parse != "") { ?>
        var data = 
        [
            <?php echo $parse ?>
        ];		
		// var mygeojson = {"type": "FeatureCollection","features":data};
        console.log(data);
        var layerwilayah = L.geoJson(null,{
			onEachFeature: onEachFeature,
			pointToLayer: function (feature, latlng) {
			return L.marker(latlng, {icon: icon});
			},
		});
		layerwilayah.addData(data);
		layerwilayah.addTo(map);
		
		<?php } ?>
        
	    function onEachFeature(feature, layer) {
			//var popupContent = "<p> "+feature.properties.name + "</p>";
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
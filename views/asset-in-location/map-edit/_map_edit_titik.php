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
use yii\widgets\ActiveForm;
use app\assets\AppAsset;


/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$dataListAssetTypeAsetItem3 = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
AppAsset::register($this);
?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" integrity="sha256-iYUgmrapfDGvBrePJPrMWQZDcObdAcStKBpjP3Az+3s=" crossorigin="anonymous" /> -->
<link href="http://leaflet.github.io/Leaflet.fullscreen/dist/leaflet.fullscreen.css" rel='stylesheet' />

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js" integrity="sha256-CNm+7c26DTTCGRQkM9vp7aP85kHFMqs9MhPEuytF+fQ=" crossorigin="anonymous"></script>
<script src="http://leaflet.github.io/Leaflet.fullscreen/dist/Leaflet.fullscreen.min.js"></script> 

<style>
	#map {
		height: 450px;
		width: 100% !important margin: 0px;
		padding: 0px;
	}
    .input {
    margin-bottom : 2px;
	}
    .marker-delete-button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
<div class="map-edit-form">
	<div class="callout callout-info">
		<h4>Petunjuk</h4>

		<p>Silakan klik <b>Tambah Titik</b> maka akan muncul marker di tengah.
		Marker nya bisa anda geser-geser sesuai posisi yang anda inginkan. 
		Jika ingin menambahkan titik lagi, silakan klik lagi tambah titik dan geser-geser lagi seperti sebelumnya.<br>
		Jika setelah yakin sudah lengkap dan posisi sudah tepat, silakan klik <b>SIMPAN</b>.
		</p>
	</div>            
	<div class="row">
		<div class="col-md-9">
			<div class="box-body">
				<input id="addmarker" type="submit" value="Tambah Titik" class="btn btn-primary btn-sm">
                
				<br>
				<br>
                <div id="map"></div>
            </div>
            <br>
           
		</div>
		<div class="col-md-3">
			<div class="box-body" style="">
				<label class="container">Base Map Utama
					<input type="checkbox" id="basemap" checked="checked">
					<span class="checkmark"></span>
                </label>
                <?php $form = ActiveForm::begin([
					//'action' => ['index1'],
					'method' => 'post',
                ]); ?>
                <?php 
					$defaultnodecollections = backend\models\AssetItemSearch_Generic::getValueMapPathFromDynamicLabel($model, $varian_group);
				
				/*
				<textarea type="text" name="path2" value="" id="path2" rows="4" class="span12"> </textarea>
				*/ ?>
				<?php
				if($defaultnodecollections == ""){
					echo '
					<div class="callout callout-warning">
						<p>Titik-titik posisi belum diset. Silakan set terlebih dahulu!.
						</p>
					</div>
					';
				}
				?>
			    <?= Html::textarea('path', $defaultnodecollections, ['id'=>"path", 'class' => 'form-control', 'rows'=>'6' ,'readonly'=>'readonly']) ?>
                <br><input id="getAllMarkers" name="savepath" type="submit" value="Simpan" class="btn btn-success btn-sm">
			    <?php /*
				<input type="submit" name="savepos" value="Save" class="btn btn-primary btn-sm">
				*/ ?>
                <?php ActiveForm::end(); ?>
			</div>
		</div>
    </div>
</div>

<?php
	//$first_latitude = "-6.92468015606316";
	//$first_longitude = "107.59700775146484";
	//$data = '[[' . $first_latitude . ', ' . $first_longitude . ']]';

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

?>
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
		var icon_img = '<?php echo Yii::getAlias('@web') . '/images/powerlinepole.png'?>';
		var icon2_img = '<?php echo Yii::getAlias('@web') . '/images/marker.png'?>';

		/*
	   var icon = L.icon({
	   iconUrl: icon_img,
	   iconSize: [30, 42],
	   iconAnchor: [15, 42],
	   });
	   
       var marker = L.marker(mapCenter,{
           icon: icon
       }).addTo(map);
	   */
	   
		var icon2 = L.icon({
			iconUrl: icon2_img,
			iconSize: [30, 42],
			iconAnchor: [15, 42],
		});

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

        var layergroup = L.layerGroup().addTo(map);
        var activeMarker;
		
        <?php if($parse != "") { ?>
        var data = 
        [
            <?php echo $parse ?>
        ];		
		// var mygeojson = {"type": "FeatureCollection","features":data};
        // console.log(mygeojson);
        var layerwilayah = L.geoJson(null);
		layerwilayah.addData(data);
		layerwilayah.addTo(map);
		
		<?php } ?>

        $("#addmarker").click(function() {
			alert('Satu marker telah ditambahkan di tengah peta. Silakan geser-geser sesuai posisi!');
			var mapCenter = map.getCenter();

			var geojsonFeature = {
				"type": "Feature",
				"properties": {
				// "name": "",
				// "typ": "marker",
				// "reichweite": ""
				},
				"geometry": {
				"type": "Point",
				"coordinates": [mapCenter.lat, mapCenter.lng]
				}
			};

			var geojsonlayer = L.geoJson(geojsonFeature, {
				pointToLayer: function(feature, latlng) {
				var marker = L.marker(map.getCenter(), {
					draggable: true,
					icon : icon2
				}).bindPopup("<div id='titel'></div><input type='button' value='Hapus Titik' class='marker-delete-button'/>");

				marker.on("popupopen", onPopupOpen);

				return marker;
				}
			});

			layergroup.addLayer(geojsonlayer.getLayers()[0]); // use the only marker instead of the GeoJSON layer.

        });

        // Function to handle delete as well as other events on marker popup open
        function onPopupOpen() {

        activeMarker = this;

        $(".marker-delete-button:visible").click(function() {
            layergroup.removeLayer(activeMarker);
            activeMarker = null;
        });
        
        $("#path").val(activeMarker.feature.properties.name).change(modifyName);
        }

        function modifyName(event) {
            var newName = event.currentTarget.value;
			activeMarker.feature.properties.name = newName;
        }

        function getAllMarkers() {
            var allMarkersObjArray = layergroup.getLayers();
            var allMarkersGeoJsonArray = [];

            layergroup.eachLayer(function(layer) {
            allMarkersGeoJsonArray.push(JSON.stringify(layer.toGeoJSON()));
            // You could also have used layergroup.toGeoJSON(), but it would have given a FeatureCollection, whereas here you get an array of Feature's.
            });

            console.log(allMarkersObjArray);
            $("#path").val(allMarkersGeoJsonArray);
            // alert("Data : " + allMarkersGeoJsonArray.length + "\n\n" + allMarkersGeoJsonArray + "\n\n");
            }

            $("#getAllMarkers").click(function() {
				getAllMarkers();
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
       //var script = document.createElement('script');
       //script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
       //document.body.appendChild(script);
       initialize();
    }

   window.onload = loadScript;

</script>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" integrity="sha256-iYUgmrapfDGvBrePJPrMWQZDcObdAcStKBpjP3Az+3s=" crossorigin="anonymous" />
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
</style>
<div class="map-edit-form">
	<div class="callout callout-info">
		<h4>Petunjuk</h4>

		<p>Silakan pilih cursor yang berbentuk segilimas. Kemudian plot di area yang ingin ditandai sebagai batas.
		Bentuk yang ditandai silakan diatur sesuai dengan bentuk asli di lapangan. 
		Pastikan bentuk polygon nya kembali ke titik awal (bangun tertutup)!
		Jika peta terlalu kecil, silakan zoom ke skala yang sesuai dengan anda.
		<br>
		Setelah selesai, silakan klik simpan.
		</p>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="box-body" style="">
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
					$defaultvaluepath = backend\models\AssetItemSearch_Generic::getValueMapPathFromDynamicLabel($model, $varian_group);
				
				/*
				<textarea type="text" name="path2" value="" id="path2" rows="4" class="span12"> </textarea>
				*/ ?>
				<?php
				if($defaultvaluepath == ""){
					echo '
					<div class="callout callout-warning">
						<p>Area belum diset. Silakan set terlebih dahulu!.
						</p>
					</div>
					';
				}
				?>
			    <?= Html::textarea('path', $defaultvaluepath, ['id'=>"path", 'class' => 'form-control', 'rows'=>'4' ,'readonly'=>'readonly']) ?>
                <br>
                <input type="submit" name="savepath" value="Simpan" class="btn btn-primary btn-sm">
                <?php ActiveForm::end(); ?>
			</div>
		</div>
    </div>
</div>

<?php
$first_latitude = "-6.92468015606316";
$first_longitude = "107.59700775146484";

$parse = '{"type": "FeatureCollection","features":['.$defaultvaluepath.']}';

$dataparse = json_decode($parse, true);
// print_r($dataparse);
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


$data = '[[' . $first_latitude . ', ' . $first_longitude . ']]';
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
		console.log(data);
		var layerwilayah = L.geoJson(null);
		layerwilayah.addData(data);
		layerwilayah.addTo(map);
		
		<?php } ?>

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
        var featureGroup = new L.FeatureGroup([layerwilayah]);
        map.addLayer(featureGroup);
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: featureGroup,
                edit : true,
            },
            draw: {
                polyline: false,
                polygon: true,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false,
         },
        });
        map.addControl(drawControl);

        // map.on(L.Draw.Event.CREATED, function (event) {
        //     var layer = event.layer;
        //     featureGroup.addLayer(layer);

        // });
        
        map.on('draw:created', function (e) {
            var type = e.layerType, 
            layer = e.layer;
            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);
            var textdata = $('#path').val();
            if(type === 'polyline'){
                if(textdata.length == 0){
                textdata += ''+JSON.stringify(drawnJSONObject)+'';
                } else {
                    textdata +=', '+JSON.stringify(drawnJSONObject)+'';
                }
                $('#path').val(textdata);
            }else if(type === 'polygon'){
                if(textdata.length == 0){
                textdata += ''+JSON.stringify(drawnJSONObject)+'';
                }else{
                    textdata += ', '+JSON.stringify(drawnJSONObject)+'';
                } 
                $('#path').val(textdata);
            }else{
                console.log('__undefined__');
            }
            featureGroup.addLayer(layer);

        });
        map.on('draw:edited', editPolygon2);
        map.on('draw:deleted', deletePolygon); //Hapus Polygon

        function editPolygon(e) {
            var layers = e.layers;
			var countOfEditedLayers = 0;
			layers.eachLayer(function(layer) {
				countOfEditedLayers++;
			});
            console.log("Edited " + countOfEditedLayers + " layers");
        }

        function editPolygon2(e) {
			var type = e.layerType, 
            layer = e.layer;
            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);
            var textdata = $('#path').val();
            if(type === 'polyline'){
                if(textdata.length == 0){
                textdata += ''+JSON.stringify(drawnJSONObject)+'';
                } else {
                    textdata +=', '+JSON.stringify(drawnJSONObject)+'';
                }
                $('#path').val(textdata);
            }else if(type === 'polygon'){
                if(textdata.length == 0){
                textdata += ''+JSON.stringify(drawnJSONObject)+'';
                }else{
                    textdata += ', '+JSON.stringify(drawnJSONObject)+'';
                } 
                $('#path').val(textdata);
            }else{
                console.log('__undefined__');
            }
            featureGroup.addLayer(layer);
        }

        function deletePolygon(e) {
            var layers = e.layers;
			var countOfEditedLayers = 0;
			alert('Data akan dihapus semua. Jangan lupa klik simpan!');
            $('#path').val('');
			layers.eachLayer(function(layer) {
				countOfEditedLayers++;
			});
            console.log("Edited " + countOfEditedLayers + " layers");
        }

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
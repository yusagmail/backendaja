<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\Location;

/* @var $this yii\web\View */
/* @var $model backend\models\Node */

$this->title = $model->location_name;
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<div class="node-view">

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> <?= Html::encode($this->title) ?></h3>
		</div>
		<div class="box-body">
			<ul class="nav nav-tabs">
				<li class=""><?= Html::a('List Node', ['index']) ?></li>
				<li class=""><?= Html::a('Add Node', ['create']) ?></li>
				<li class="active"><?= Html::a('Map Edit', ['view', 'id' => $model->id_location]) ?></li>
			</ul>
			<hr>
     <?php
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(Location::tableName());

		//Propinsi
		$coltypeAsset = [
			'label' => 'Propinsi',
			'attribute' => 'id_propinsi',
			'value'=>function ($data) {
				if(isset($data->propinsi)){
					return $data->propinsi->nama_propinsi;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_propinsi', $coltypeAsset);


		//Kabupaten
		$coltypeAsset = [
			'label' => 'Kabupaten',
			'attribute' => 'id_kabupaten',
			'value'=>function ($data) {
				if(isset($data->kabupaten)){
					return $data->kabupaten->nama_kabupaten;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_kabupaten', $coltypeAsset);

		//Kecamatan
		$coltypeAsset = [
			'label' => 'Kecamatan',
			'attribute' => 'id_kecamatan',
			'value'=>function ($data) {
				if(isset($data->kecamatan)){
					return $data->kecamatan->nama_kecamatan;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_kecamatan', $coltypeAsset);


		//Kelurahan
		$coltypeAsset = [
			'label' => 'Kelurahan',
			'attribute' => 'id_kelurahan',
			'value'=>function ($data) {
				if(isset($data->kelurahan)){
					return $data->kelurahan->nama_kelurahan;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_kelurahan', $coltypeAsset);


        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>
			<hr>
			<div class="callout callout-info">
				<p>Silakan edit atau tambahkan posisi dalam map.</p>				
			</div>
			<div id="map"></div>
			<br>
			
			<?php $form = ActiveForm::begin([
				//'action' => ['index1'],
				'method' => 'post',
				
			]); ?>
			<label for="latitude">Latitude</label>
			<input id="latitude" name="latitude" value="<?= $model->latitude ?>" />
			<label for="longitude">Longitude</label>
			<input id="longitude" name="longitude" value="<?= $model->longitude ?>"/>
			<input type="submit" name="savepos" value="Save" class="btn btn-primary btn-sm">
			<?php ActiveForm::end(); ?>
		</div>
	</div>

</div>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.js"></script>
	<?php
    $first_latitude = $model->latitude;
    $first_longitude = $model->longitude;
    $data = '[[' . $first_latitude . ', ' . $first_longitude . ']]';
	
	//Default
	if($model->latitude == "") {$model->latitude="-6.9024812";}
	if($model->longitude == "") {$model->longitude="107.6166213";}
    ?>
<script>
   
    function initialize() {
		var initlat = <?=$model->latitude?>;
		var initlong = <?=$model->longitude?>;
		var mapCenter = [initlat, initlong];
            var map = L.map('map').setView([initlat,  initlong], 15);
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a href="#">OpenStreetMap</a> contributors',
				maxZoom: 18,
				id: 'mapbox.light'
			}).addTo(map);

			var icons = '<?php echo Yii::getAlias('@web') . '/images/icon/powerlinepole.png'?>';

			var icon = L.icon({
			iconUrl: icons,
			iconSize: [30, 42],
			iconAnchor: [15, 42],
			});
		var marker = L.marker(mapCenter,{
			icon: icon
		}).addTo(map);
		var updateMarker = function(lat, lng) {
		    marker
		        .setLatLng([lat, lng])
		        .bindPopup("Your location :  " + marker.getLatLng().toString())
		        .openPopup();
		    return false;
		};
		map.on('click', function(e) {
		    $('#latitude').val(e.latlng.lat);
		    $('#longitude').val(e.latlng.lng);
		    updateMarker(e.latlng.lat, e.latlng.lng);
	    	});
	    	
	    	var updateMarkerByInputs = function() {
			return updateMarker( $('#latitude').val() , $('#longitude').val());
		}
		$('#latitude').on('input', updateMarkerByInputs);
		$('#longitude').on('input', updateMarkerByInputs);
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
    }
		

    function loadScript() {
        //var script = document.createElement('script');
        //script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        //document.body.appendChild(script);
        initialize();
    }


    window.onload = loadScript;

</script>
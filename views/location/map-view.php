<?php

use app\assets\AppAsset;
use common\utils\EncryptionDB;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\AppVocabularySearch;
use common\labeling\CommonActionLabelEnum;

$this->title = CommonActionLabelEnum::VIEW . ' ' . AppVocabularySearch::getValueByKey(' On Map').' '.'Span Tower :'.' '.$model->location_name;
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.2/dist/leaflet.draw.
css" />
<link href="http://leaflet.github.io/Leaflet.fullscreen/dist/leaflet.fullscreen.css" rel='stylesheet' />

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
	integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>
<script src="http://toko.teraselektronik.id/leaflet.ajax.min.js"></script>
<script src="https://unpkg.com/leaflet-draw@1.0.2/dist/leaflet.draw-src.js"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>
<script src="http://leaflet.github.io/Leaflet.fullscreen/dist/Leaflet.fullscreen.min.js"></script>

<?php
// $models = $dataProviderDisplay->getModels();
?>

<?php
//$first_latitude = $model->latitude;
//$first_longitude = $model->longitude;
$first_latitude = "-7.975293";
$first_longitude = "110.923327";
$data = "[";

$x = 0;
    if (isset($model)) {
        $lat = floatval($model->latitude) * 1;
        $long = floatval($model->longitude) * 1;

        $ic = EncryptionDB::encryptor('encrypt', $model->id_location);
        $urlpeta = Url::toRoute(['/location/map-edit', 'u' => $ic]);
        $urldetail = Html::a('Detail', $urlpeta, ['class' => 'btn btn-sm btn-danger']);
        $info = "<b>Span Tower</b>: " . $model->location_name;
        $info .= "<br><b>Address</b>: " . $model->address;
        $info .= "<br><a href='" . $urlpeta . "'>Detail</a>";
        if ($lat != 0 && $long != 0) {
            $data .= '[' . $lat . ', ' . $long . ',"/images/icon/red.png","title","' . $info . '"],';
            $x++;
            if ($x == 1) {
                $first_latitude = $model->latitude;
                $first_longitude = $model->longitude;
            }
        }
    }
    //break;
$data .= "]";
?>
<div class="map-view box box-primary">
            
	<div class="row">
		<div class="col-md-9">
			<div class="box-body" style="">
				<div id="map"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box-body" style="">
				<!-- <label class="container">Layer Map Jawa Tengah
					<input type="checkbox" id="dataid2" checked="checked">
					<span class="checkmark"></span>
				</label> -->
				<label class="container">Base Map Utama
					<input type="checkbox" id="basemap" checked="checked">
					<span class="checkmark"></span>
				</label>
				<!--<button href="#myModal" class="btn btn-settings" data-backdrop="false" data-toggle="modal">Open Modal
                </button>-->
			</div>
		</div>
    </div>
</div>

<script>

    /* Layer 1*/
    //load data
    var locations = <?php echo $data ?>;

    // initialize the map

    var map = L.map('map', {
        center: L.latLng(<?php echo $first_latitude; ?>, <?php echo $first_longitude; ?>),
        zoom: 13,
        fullscreenControl: {
            pseudoFullscreen: false
        }
    });

    // var drawnItems = new L.FeatureGroup();
    // map.addLayer(drawnItems);
    // var drawControl = new L.Control.Draw({
    //     edit: {
    //         featureGroup: drawnItems
    //     }
    // });
    // map.addControl(drawControl);

    // map.on(L.Draw.Event.CREATED, function (event) {
    //     var layer = event.layer;

    //     drawnItems.addLayer(layer);
    // });

    // load a tile layer
    var tileLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="#">OpenStreetMap</a> contributors',
        maxZoom: 18,
        id: 'mapbox.light'
    });
    tileLayer.addTo(map);

    var icons = '<?php echo Yii::getAlias('@web') . '/images/icon/powerlinepole.png'?>';

	var icon = L.icon({
			iconUrl: icons,
			iconSize: [30, 42],
			iconAnchor: [15, 42],
	});
    var markers = L.markerClusterGroup({
        chunkedLoading: true,
        spiderfyOnMaxZoom: false
    });

    for (i = 0; i < locations.length; i++) {

        var marker = L.marker([locations[i][0], locations[i][1]], {
            title: locations[i][3],
            content: locations[i][4],
            icon: icon
        }).addTo(map);
        marker.myID = i;
        marker.bindPopup(locations[i][4]).on('click', function (e) {
            var i = e.target.myID;
            console.log(locations[i]);
            $('#mymodal').modal('show').on('shown.bs.modal', function (e) {
            });
        });
        markers.addLayer(marker);
    }
    map.addLayer(markers);

    /* Layer 2 */
    // var dataUrl = 'http://toko.teraselektronik.id/wilayahJawaTengah.geojson';
    // var layerwilayah = new L.GeoJSON.AJAX(dataUrl, {
    //     style: {
    //         fillColor: "#2b2b2b",
    //         fillOpacity: 0.7,
    //         color: "white",
    //         weight: 1,
    //         opacity: 0.7
    //     }
    // });
    // layerwilayah.addTo(map);

    // document.getElementById("dataid2").addEventListener("change", function () {
    //     if (document.getElementById(this.id).checked == true) {
    //         layerwilayah.addTo(map);
    //     } else {
    //         layerwilayah.remove(map);
    //     }
    // });

    document.getElementById("basemap").addEventListener("change", function () {
        if (document.getElementById(this.id).checked == true) {
            tileLayer.addTo(map);
        } else {
            tileLayer.remove(map);
        }
    });
    // var html = window.open("http://localhost/assetmgt/web/map-maker/shp-display", "_blank", "width=800,height=600,location=no,menubar=no,status=no,titilebar=no,resizable=no,");
    var divContents = document.getElementById("layerwindow").innerHTML;

    var myWindow = window.open("", "map", "width=800,height=600");   // Opens a new window
    myWindow.document.write(divContents);
    myWindow.document.close();

</script>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Point */

$this->title = 'Add Point';
$this->params['breadcrumbs'][] = ['label' => 'Point', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding: 6px;" id="add-form">
	<div class="box-body point-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	        'action' => 'create'
	    ]) ?>

	</div>
</div>

<?php
$this->registerJs(
    "
$('#form-submit').on('beforeSubmit', function(e) {

    var form = $(this);

    var formData = form.serialize();

    $.ajax({
        url: form.attr(\"action\"),
        type: form.attr(\"method\"),
        data: formData,
        success: function (data) {
            alert('Success : ' + data);
            $.pjax.reload({container: '#pjax_id_point', async: false});
            focusToNew();
        },

        error: function () {
            alert('Something went wrong');
        }

    });

}).on('submit', function(e){
    e.preventDefault();
});
");
?>

<script>
    function focusToNew() {
        var lat = document.getElementById("point-latitude").value;
        var long = document.getElementById("point-longitude").value;

        clearMainMap();
        loadMainData();
        
        //displayNew();
        map.flyTo({
        //center: [(Math.random() - 0.5) * 360, (Math.random() - 0.5) * 100],

            center: [long, lat],
            zoom: 10,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
    }
    var i = 2;
    function displayNew(){
      i++;
        map.addSource('source'+i, {
          type: 'geojson',
          // Use a URL for the value for the `data` property.
          //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/prov-indonesia.geojson'
          //data: dir+'/geojson/test.geojson'
          //data: dir+'/geojson/test-multiple-point3.geojson'
          'data': dirfile+'/localgeojson/' + filenamePoi
        });

        map.addLayer({
          'id': 'point-node-'+i,
          'type': 'fill',
          'source': 'source'+i,
          'layout': {},
          'paint': {
          'fill-color': '#0080ff', // blue color fill
          'fill-opacity': 0.5
          }
        });

        map.addLayer({
          'id': 'points-nd'+i,
          'type': 'circle',
          'source': 'source'+i,
          'paint': {
            'circle-radius': 4,
            'circle-stroke-width': 2,
            'circle-color': 'red',
            'circle-stroke-color': 'white'
          }
        });

      map.addSource('places'+i, {
        'type': 'geojson',
        'data': dirfile+'/localgeojson/' + filenamePoi
      });

      layerUtama = map.addLayer({
      'id': 'poi-labels-'+i,
      'type': 'symbol',
      'source': 'places'+i,
      'layout': {
        'text-field': ['get', 'description'],
        'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
        //'text-radial-offset': 0.5,

        'text-justify': 'auto',
        //'font-scale': 0.8,
        'text-size': 10,
        'text-font': [
          'literal',
          ['Open Sans Regular']
        ]
        //'icon-image': ['get', 'icon']
      }
      });

        //map.removeLayer(layerUtama);
    }
</script>
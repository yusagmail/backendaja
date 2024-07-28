<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PolylineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polyline';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="height: 300px; overflow-x: auto;">
    <div id="index-panel" class="box-body polyline-index overflow-x: auto; width: 100%;" style="padding: 4px;">

    <button class="btn btn-success btn-xsh" onclick="showAddPanel()">Add</button>
    <?= Html::a('Reload All', ['map'], ['class' => 'btn btn-success btn-xs']) ?>    
    <?php /*
        <?= Html::a('Clear All', ['map', 'clear'=>"true"], ['class' => 'btn btn-warning btn-xs']) ?>
        */ ?>

        <?= Html::a('Flat Style', ['polyline/map', 'mapstyle'=>"custom"], ['class' => 'btn btn-info btn-xs']) ?>
        <?= Html::a('Map Street Style', ['polyline/map', 'mapstyle'=>"mapstreet"], ['class' => 'btn btn-warning btn-xs']) ?>
        <?php
            if($defaultClear){
                $defaultClear = true; 
                //echo "clear";
            }else{
                $defaultClear = false;
                //echo "all";
            }
        ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php
    \yii\widgets\Pjax::begin(['id' => 'pjax_id_point', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_polyline', 'neverTimeout'=>true]]);
    ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                /*
                ['class' => 'yii\grid\CheckboxColumn',
                    'header'=>'',
                    'checkboxOptions' => function($model, $key, $index, $widget) use ($defaultClear){

                        if ($model->id_polyline >0) {
                                return [
                                    'value' => $model->id_polyline, 
                                    'id' => 'el'.$model->id_polyline,
                                    'checked' => !$defaultClear, 
                                    'data-checkid'=> $model->id_polyline 
                                ];
                            }
                            return ['style' => ['display' => 'none']]; // OR ['disabled' => true]
                        },
                    
                ],
                */
                'name',
            'display_name',
            // 'color',
            // 'draw_style',
            // 'created_ts',
            //'modified_ts',
            //'deleted_ts',

                //['class' => 'yii\grid\ActionColumn'],
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '
                            <button class="viewrow1 glyphicon glyphicon-eye-open" data-viewid="' . $data->id_polyline . '"></button>
                            <button class="updaterow1 glyphicon glyphicon-pencil" data-updateid="' . $data->id_polyline . '"></button>
                            
                            <button class="deleterow1 glyphicon glyphicon-trash" data-pointid="' . $data->id_polyline . '"></button>
                        ';

                    },

                ],
            ],
        ]); ?>
    

        <?php
        \yii\widgets\Pjax::end();
        ?>
    </div>
</div>
<script src="../js/code.jquery.com_jquery-3.6.0.min.js"></script>

<script>
    //Jika : After pjax reload, script tidak jalan
    //Solusi : https://forum.yiiframework.com/t/scripts-not-working-after-pjax-reload-container/82327/8
    $(document).ready(function() {
        $('#index-panel').on('click', 'button[data-pointid]', function() {
            var id = $(this).data('pointid');
            console.log("id:"+id);
            // Kirim data melalui Ajax
            const response = confirm("Are you sure delete this item?")
            if(response){
                $( "#alertMsg" ).html( "Please wait loading .." );
                $.ajax({
                    url: "<?=  Yii::$app->urlManager->createUrl(['polyline/delete-row']) ?>",
                    method: 'POST',
                    data: {
                        id: id,

                    },
                    success: function(response) {
                        console.log(response); // Tampilkan respons di console
                        $.pjax.reload({container: '#pjax_id_point', async: false});
                        // Lakukan sesuatu setelah data berhasil dikirim
                        <?php
 if($defaultClear){ ?>                        window.location.href = '<?= Yii::$app->urlManager->createUrl(['polyline/map','clear'=>'true']) ?>';
                        <?php
 } ?>                        clearMainMap();
                        loadMainData();
                        $( "#alertMsg" ).html( "" );
                    },
                    error: function(xhr, status, error) {
                        // console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                        // Tangani kesalahan jika terjadi
                    }
                });
            }
        });

        $('#index-panel').on('click', 'button[data-viewid]', function() {
            var id = $(this).data('viewid');
            console.log("id:"+id);
            
            // Get data melalui Ajax
            //getDetailAjax(id);
            //Clear All dulu
            var x = document.getElementById("mydiv2");
              if (x.style.display === "none") {

              } else {
                alert('Please close the window that is still active!');
                //resetAllPanel(id);
              }
            //Tampilkan Add
            showAddPanel(false);
            id_primary_add = id;
            getDetailListPoint(id);
            //loadSinglePoly();
            $( '#idAddNew' ).html('#'+id_primary_add);

        });

        $('#index-panel').on('click', 'button[data-updateid]', function() {
            var id = $(this).data('updateid');
            //var lat = $(this).data('lat');
            //var long = $(this).data('long');
            console.log("id:"+id);
            
            // Get data melalui Ajax
            // getDetailAjax(id);
            var x = document.getElementById("mydiv2");
              if (x.style.display === "none") {

              } else {
                alert('Please close the window that is still active!');
              }
            //Tampilkan Add
            showAddPanel();
            id_primary_add = id;
            getDetailListPoint(id);
            //loadSinglePoly();
            $( '#idAddNew' ).html('#'+id_primary_add);
        });

        $('#index-panel').on('change', 'input[type="checkbox"][data-checkid]', function() {
            //console.log("Checkbox in this part is checked");
            var id = $(this).data('checkid');
            console.log("id:"+id);
            if (this.checked) {
                console.log("Checkbox with ID " + id + " checked.");
                addRemoveItem(id, "add");
            } else {
                console.log("Checkbox with ID " + id + " unchecked.");
                addRemoveItem(id, "remove");
            }
        });
    });
</script>


<script>
    function showAddPanel(isLoadReference=true) {
      var x = document.getElementById("mydiv2");
      clearAddPanel();
      if (x.style.display === "none") {
        map.getCanvas().style.cursor = 'pointer';
        x.style.display = "block";
        
        id_primary_add = -1;
        $( '#idAddNew' ).html('#'+id_primary_add);
        resetSinglePolyFile(0);
        //Load Reference Point
        clearMainMap();
        if(isLoadReference){
            loadDataReferencePoint();
        }
      } else {
        x.style.display = "none";
        map.getCanvas().style.cursor = '';
        console.log("close add form");
        window.location.href = '<?= Yii::$app->urlManager->createUrl(['polyline/map']) ?>';
        clearAddPanel();

        clearSinglePoly();

        //Load ulang
        clearLayerDataReferencePoint();
        loadMainData();
      }
    }

    function getDetailListPoint(id){
        $( "#alertMsg" ).html( "Please wait loading .." );

        if(id > 0){
          document.body.style.cursor='wait';
          //$.post("get-detail/", {id: id}, function(data, status){
          //$.post("../get-detail/", {id: id}, function(data, status){ 
          $.post("<?= Yii::$app->urlManager->createUrl('polyline/get-detail/') ?>", {id: id}, function(data, status){
            const obj = JSON.parse(data);
            console.log(data);
            console.log(obj.name);
            
            //$('#update-form #point-name').val(obj.name);
            <?php
            $model = new \backend\models\Polyline();
            foreach (array_keys($model->attributes ) as $key){
                echo "$('#add-form #polyline-".$key."').val(obj.".$key.");";
            }
            ?>            

            //showUpdatePanel(id);
            updateGridListPointAdd(id);
            loadSinglePoly();

            var firstLat = obj.first_lat;
            var firstLong = obj.first_long;
            focusToDetail(id, firstLat, firstLong);
            //Clear message
            $( "#alertMsg" ).html( "" );
            //$.pjax.reload({container: '#pjax_id_1', async: false});
          });
        }else{
            //$( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
        }
        
    }

    function resetSinglePolyFile(id){
        $.post("<?= Yii::$app->urlManager->createUrl('polyline/reset-single-file-poly/') ?>", {id: id}, function(data, status){
            const obj = JSON.parse(data);
            console.log(data);
            console.log(obj.name);
          }).fail(function(xhr, status, error) {
                console.log(xhr.responseText);
          });
    }

    function clearAddPanel(){
        <?php
        $model = new \backend\models\Polyline();
        foreach (array_keys($model->attributes ) as $key){
            echo "$('#add-form #point-".$key."').val('');";
        }
        ?>        console.log('clear form entry..');
    }

    function addRemoveItem(id, mode){
        console.log(id + " " + mode);
        $( "#alertMsg" ).html( "Please wait loading .." );
        //$.post("../point/remove-json-item/", {id: id,mode:mode}, function(data, status){
        $.post("<?= Yii::$app->urlManager->createUrl('polyline/remove-json-item/') ?>", {id: id,mode:mode}, function(data, status){ 
            const obj = JSON.parse(data);
            console.log(data);
            var long = (obj.longitude);
            var lat = (obj.latitude);
            map.flyTo({
            //center: [(Math.random() - 0.5) * 360, (Math.random() - 0.5) * 100],

                center: [long, lat],
                zoom: 6,
                essential: true // this animation is considered essential with respect to prefers-reduced-motion
            });

            clearMainMap();
            loadMainData();
            $( "#alertMsg" ).html( "" );
        });
    }

    function clearAllItem(){
        console.log("clear all");
        $( "#alertMsg" ).html( "Please wait loading .." );
        $.get("<?= Yii::$app->urlManager->createUrl('polyline/clear-all-item/') ?>", function(data, status){
            console.log(data);

            clearMainMap();
            loadMainData();
            $( "#alertMsg" ).html( "" );
        });
    }

    function showUpdatePanel(id) {
      var x = document.getElementById("mydiv3");
      console.log(id);
      if (x.style.display === "none") {
        map.getCanvas().style.cursor = 'pointer';
        x.style.display = "block";
      } else {
        x.style.display = "none";
        map.getCanvas().style.cursor = '';
      }
    }

    function focusToDetail(id, lat, long) {
        console.log(id);
        map.flyTo({
        //center: [(Math.random() - 0.5) * 360, (Math.random() - 0.5) * 100],

            center: [long, lat],
            zoom: 10,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
    }

    function getDetailAjax(id){
        $( "#alertMsg" ).html( "Please wait loading .." );

        if(id > 0){
          document.body.style.cursor='wait';
          //$.post("get-detail/", {id: id}, function(data, status){
          //$.post("../get-detail/", {id: id}, function(data, status){ 
          $.post("<?= Yii::$app->urlManager->createUrl('polyline/get-detail/') ?>", {id: id}, function(data, status){
            const obj = JSON.parse(data);
            console.log(data);
            console.log(obj.name);
            
            //$('#update-form #point-name').val(obj.name);
            <?php
            $model = new \backend\models\Polyline();
            foreach (array_keys($model->attributes ) as $key){
                echo "$('#update-form #polyline-".$key."').val(obj.".$key.");";
            }
            ?>            showUpdatePanel(id);
            updateGridListPoint(id);

            var x = document.getElementById("mydiv3");
            x.style.display = "block";
            document.body.style.cursor='default';
            //Clear message
            $( "#alertMsg" ).html( "" );
            //$.pjax.reload({container: '#pjax_id_1', async: false});
          });
        }else{
            //$( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
        }
        
    }

    var id_primary_add = 0;
    function addChildNode(id){
        console.log(id);
        $( "#alertMsg" ).html( "Please wait loading .." );

        if(id > 0){
          document.body.style.cursor='wait';
          $.post("<?= Yii::$app->urlManager->createUrl('polyline/add-child-node/') ?>", {id: id, id_primary_add: id_primary_add}, function(data, status){
            const obj = JSON.parse(data);
            console.log(data);
            console.log(obj.name);
            var message = obj.message;
            if(message != ""){
                alert(message);
            }
            
            //$('#update-form #point-name').val(obj.name);
            <?php
            $model = new \backend\models\Polyline();
            foreach (array_keys($model->attributes ) as $key){
                echo "$('#update-form #polyline-".$key."').val(obj.".$key.");";
            }
            ?>            
            //showUpdatePanel(id);
            updateGridListPointAdd(id_primary_add);
            console.log("end");
            loadSinglePoly();

            document.body.style.cursor='default';
            //Clear message
            $( "#alertMsg" ).html( "" );
            //$.pjax.reload({container: '#pjax_id_1', async: false});
          }).fail(function(xhr, status, error) {
                //$('#msginfo"').html('Terjadi kesalahan saat mengirim data.');
                console.log(xhr.responseText);
           });
        }else{
            //$( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
        }
    }


  function setInputLatLang (lat, long) {
    console.log(lat);
    //Isi yang bagian add data
    //document.getElementById("point-latitude").value = lat;
    //document.getElementById("point-longitude").value = long;
    //$('#add-form #polyline-latitude').val(lat);
    //$('#add-form #polyline-longitude').val(long);

    //Isi yang bagian update data
    //$('#update-form #polyline-latitude').val(lat);
    //$('#update-form #polyline-longitude').val(long);
    $('#add-form #referencepoint-latitude').val(lat);
    $('#add-form #referencepoint-longitude').val(long);
  }
</script>

<?php
            if($defaultClear){
                $defaultClear = true; 
                echo '<script>
                     $(document).ready(function() {
                        clearAllItem();
                     });
                </script>';
            }
?>
<?php
$this->registerJs("
    //$(document).on('ready pjax:success', function() {
        $('pjax-delete-link').on('click', function(e) {
            alert('masuk');
            e.preventDefault();
            var deleteUrl = $(this).attr('delete-url');
            var pjaxContainer = $(this).attr('pjax-container');
            var result = confirm('Delete this item, are you sure?');                                
            if(result) {
                $.ajax({
                    url: deleteUrl,
                    type: 'post',
                    error: function(xhr, status, error) {
                        alert('There was an error with your request.' + xhr.responseText);
                    }
                }).done(function(data) {
                    $.pjax.reload('#' + $.trim(pjaxContainer), {timeout: 3000});
                });
            }
        });

    //});
");
?>
<script>
    //Added partially
    // Wait until the map has finished loading.

    function loadDataReferencePoint(){
        console.log("load main reference-Point");
        var finenameReferencePoint = 'referencepoint.geojson';

        // Add the Mapbox Terrain v2 vector tileset. Read more about
        // the structure of data in this tileset in the documentation:
        // https://docs.mapbox.com/vector-tiles/reference/mapbox-terrain-v2/

        map.addSource('main-data', {
          type: 'geojson',
          // Use a URL for the value for the `data` property.
          //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/main-data.geojson'
          //data: dir+'/geojson/test.geojson'
          //data: dir+'/geojson/test-multiple-point3.geojson'
          'data': dirfile+'/localgeojson/' + finenameReferencePoint
        });



        map.addLayer({
          'id': 'points',
          'type': 'circle',
          'source': 'main-data',
          'paint': {
            'circle-radius': 4,
            'circle-stroke-width': 2,
            'circle-color': 'red',
            'circle-stroke-color': 'white'
          }
        });

        // Add a black outline around the polygon.
      map.addLayer({
        'id': 'outline',
        'type': 'line',
        'source': 'main-data',
        'layout': {},
        'paint': {
        'line-color': '#000',
        'line-width': 3
        }
      });

      //Label Tulisan
        map.addLayer({
          'id': 'points-label',
          'type': 'symbol',
          'source': 'main-data',
          'layout': {
            'icon-image': 'custom-marker',
            // get the title name from the source's "title" property
            //'text-field': ['get', 'title'],
            'text-field': ['get', 'description'],
            'text-variable-anchor': [ 'top'],
            'icon-anchor': 'bottom', //Posisi icon mepet di titiknya
            //'icon-size' : iconScale, //0.5 x ukuran asli
            'text-font': [
              'literal',
              ['Open Sans Regular']
            ],
            'text-size': 10,
            'text-offset': [0, 0.25], // (x,y)
            'text-anchor': 'top'
            }
          }
        );

      var w = map.on('click', 'points', (e) => onClickMapReference(e));
      console.log("w");
      console.log(w);
        
        setTimeout(() => {
          
          map.off('click', 'points', (e) => onClickMapReference(e));
          console.log("Disabled");
        }, 5000);

       
      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on('mouseenter', 'points', () => {
      map.getCanvas().style.cursor = 'pointer';
      });
       
      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'points', () => {
      map.getCanvas().style.cursor = '';
      });

    var marker = new mapboxgl.Marker();

    function add_marker (event) {
      const myDivElem = document.querySelector("#map");
      myDivElem.style.cursor = "pointer";
      var coordinates = event.lngLat;
      console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);

     new mapboxgl.Popup()    
          .setLngLat(coordinates)
          .setHTML("<B>Detail Point</b><br>"+ coordinates.lat.toFixed(5)+";"+ coordinates.lng.toFixed(5)+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"showAddPanelReferencePoint()\">Add New Reference Point</button>"+"<br><button class=\"btn btn-info btn-xsh\" onclick=\"showAddPanelReferencePointAndChild()\">Add Point and Add as Child Point</button>")
          .addTo(map);

      //marker.setLngLat(coordinates).addTo(map);
      setInputLatLang( coordinates.lat, coordinates.lng);
    }

    map.on('click', (e) => {
      const features = map.queryRenderedFeatures(e.point);
      const isClickOutsidePoints = features.every((feature) => feature.layer.id !== 'points');

      if (isClickOutsidePoints) {
        // Tindakan yang akan dijalankan jika klik dilakukan di luar layer 'points'
        add_marker(e); // Anda dapat memanggil add_marker atau tindakan lainnya di sini
      }
    });

       
      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on('mouseenter', 'points-icon', () => {
      map.getCanvas().style.cursor = 'pointer';
      });
       
      // Change it back to a pointer when it leaves.
      map.on('mouseleave', 'points-icon', () => {
      map.getCanvas().style.cursor = '';
      });

      map.on('idle', () => {
        // If these two layers were not added to the map, abort
        if (!map.getLayer('points') || !map.getLayer('points-label') ) {
            return;
        }

        // Enumerate ids of the layers.
        const toggleableLayerIds = ['points', 'points-label'];

        // Set up the corresponding toggle button for each layer.
        for (const id of toggleableLayerIds) {
            // Skip layers that already have a button set up.
            if (document.getElementById(id)) {
                continue;
            }

            // Create a link.
            const link = document.createElement('a');
            link.id = id;
            link.href = '#';
            link.textContent = id;
            link.className = 'active';

            // Show or hide layer when the toggle is clicked.
            link.onclick = function (e) {
                const clickedLayer = this.textContent;
                e.preventDefault();
                e.stopPropagation();

                const visibility = map.getLayoutProperty(
                    clickedLayer,
                    'visibility'
                );

                // Toggle layer visibility by changing the layout object's visibility property.
                if (visibility === 'visible') {
                    map.setLayoutProperty(clickedLayer, 'visibility', 'none');
                    this.className = '';
                } else {
                    this.className = 'active';
                    map.setLayoutProperty(
                        clickedLayer,
                        'visibility',
                        'visible'
                    );
                }
            };

            const layers = document.getElementById('menu');
            layers.appendChild(link);
        }
    });

    //});
    }

    var numberClick = 0;
    var lastLatClick = 0;
    var lastLongClick = 0;
    function onClickMapReference(e){
        // Copy coordinates array.
        const coordinates = e.features[0].geometry.coordinates.slice();
        const description = e.features[0].properties.description;
        const id = e.features[0].properties.id;
         
        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
          coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }
        
        /*
        new mapboxgl.Popup()
          .setLngLat(coordinates)
          .setHTML("<h3>REFPOINT #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>")
          .addTo(map);
        */
        numberClick++;
        console.log(lastLatClick + "x"+  lastLongClick);
        console.log(e.lngLat.lng + ","+  e.lngLat.lat);
        if(lastLatClick != e.lngLat.lng){
            addChildNode(id);
            console.log("<h3>cek point #"+id+"</h3>Name : "+description+"<br><button class=\"btn btn-success btn-xsh\" onclick=\"getDetailAjax("+id+")\">Detail</button>");
            console.log("Click#"+numberClick);
        }

        lastLongClick = e.lngLat.lat;
        lastLatClick = e.lngLat.lng;
    }

    function clearLayerDataReferencePoint(){
        //Remove Click
        console.log("Removed Layer Reference");
        map.off('click', 'points', (e) => {
          //map.getCanvas().style.cursor = '';
          console.log("off click");
        });

        if (map.getLayer("points")) {
            map.removeLayer('points');
        }
        if (map.getLayer("outline")) {
            map.removeLayer('outline');
        }
        if (map.getLayer("points-label")) {
            map.removeLayer('points-label');
        }

        if (map.getSource("main-data")) {
            map.removeSource('main-data');
        }
    }
</script>

<script>
    function loadSinglePoly(){
        console.log("load main single poly");
        var filePolySingle = 'polyline-poly-single.geojson';
        var filePolySingleLabel = 'polyline-poly-label-single.geojson';

        if (map.getLayer("single-area-poly")) {
            map.removeLayer('single-area-poly');
        }
        if (map.getLayer("single-outline")) {
            map.removeLayer('single-outline');
        }
        if (map.getLayer("single-points-label")) {
            map.removeLayer('single-points-label');
        }
        if (map.getSource("single-poly")) {
            map.removeSource('single-poly');
        }
        if (map.getSource("single-poly-label")) {
            map.removeSource('single-poly-label');
        }

        map.addSource('single-poly', {
          type: 'geojson',
          // Use a URL for the value for the `data` property.
          //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/main-data.geojson'
          //data: dir+'/geojson/test.geojson'
          //data: dir+'/geojson/test-multiple-point3.geojson'
          'data': dirfile+'/localgeojson/' + filePolySingle
        });

        map.addSource('single-poly-label', {
          type: 'geojson',
          // Use a URL for the value for the `data` property.
          //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/main-data.geojson'
          //data: dir+'/geojson/test.geojson'
          //data: dir+'/geojson/test-multiple-point3.geojson'
          'data': dirfile+'/localgeojson/' + filePolySingleLabel
        });

        // Add a new layer to visualize the polygon.
        map.addLayer({
          'id': 'single-area-poly',
          'type': 'line',
          'source': 'single-poly', // reference the data source
          'layout': {
          'line-join': 'round',
          'line-cap': 'round'
          },
          'paint': {
          'line-color': '#999',
          'line-width': 3
          }
        });
        // Add a black outline around the polygon.
        map.addLayer({
          'id': 'single-outline',
          'type': 'line',
          'source': 'single-poly',
          'layout': {},
          'paint': {
          'line-color': '#000',
          'line-width': 1
          }
        });

        //Label Sequence
        map.addLayer({
          'id': 'single-points-label',
          'type': 'symbol',
          'source': 'single-poly-label',
          'paint': {
            'text-color': 'red' // Ganti dengan warna yang Anda inginkan
          },
          'layout': {
            'icon-image': 'custom-marker',
            'symbol-avoid-edges': false,
            // get the title name from the source's "title" property
            //'text-field': ['get', 'title'],
            'text-field': ['get', 'description'],
            'text-variable-anchor': [ 'bottom'],
            'icon-anchor': 'bottom', //Posisi icon mepet di titiknya
            //'icon-size' : iconScale, //0.5 x ukuran asli
            'text-font': [
              'literal',
              ['Open Sans Regular']
            ],
            'text-size': 12,
            'text-offset': [0, 0.5], // (x,y)
            'text-anchor': 'bottom',
            'text-ignore-placement': true, // Menonaktifkan collision detection
            'symbol-spacing': 5, // Menggeser teks ke kiri (sesuaikan sesuai kebutuhan)
            }
          }
        );
    }

    function clearSinglePoly(){
        if (map.getLayer("single-area-poly")) {
            map.removeLayer('single-area-poly');
        }
        if (map.getLayer("single-outline")) {
            map.removeLayer('single-outline');
        }
        if (map.getLayer("single-points-label")) {
            map.removeLayer('single-points-label');
        }

        if (map.getSource("single-poly")) {
            map.removeSource('single-poly');
        }
        if (map.getSource("single-poly-label")) {
            map.removeSource('single-poly-label');
        }
    }
</script>

<script>
    function showAddPanelReferencePoint() {
      var x = document.getElementById("mydiv4");
      clearAddPanel();
      if (x.style.display === "none") {
        map.getCanvas().style.cursor = 'pointer';
        x.style.display = "block";

      } else {
        x.style.display = "none";
        map.getCanvas().style.cursor = '';
      }
    }
</script>

<script>
    function showAddPanelReferencePointAndChild() {
      var x = document.getElementById("mydiv5");
      clearAddPanel();
      if (x.style.display === "none") {
        map.getCanvas().style.cursor = 'pointer';
        x.style.display = "block";

      } else {
        x.style.display = "none";
        map.getCanvas().style.cursor = '';
      }
    }
</script>
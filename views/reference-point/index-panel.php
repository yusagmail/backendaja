<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReferencePointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reference Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="height: 300px; overflow-x: auto;">
    <div id="index-panel" class="box-body reference-point-index overflow-x: auto; width: 100%;" style="padding: 4px;">

    <button class="btn btn-success btn-xsh" onclick="showAddPanel()">Add</button>
    <?= Html::a('Reload All', ['map'], ['class' => 'btn btn-success btn-xs']) ?>    <?= Html::a('Clear All', ['map', 'clear'=>"true"], ['class' => 'btn btn-warning btn-xs']) ?>
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
    \yii\widgets\Pjax::begin(['id' => 'pjax_id_point', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_referencepoint', 'neverTimeout'=>true]]);
    ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\CheckboxColumn',
                    'header'=>'',
                    'checkboxOptions' => function($model, $key, $index, $widget) use ($defaultClear){

                        if ($model->id_reference_point >0) {
                                return [
                                    'value' => $model->id_reference_point, 
                                    'id' => 'el'.$model->id_reference_point,
                                    'checked' => !$defaultClear, 
                                    'data-checkid'=> $model->id_reference_point 
                                ];
                            }
                            return ['style' => ['display' => 'none']]; // OR ['disabled' => true]
                        },
                    
                ],

                'name',
            'display_name',
            'latitude',
            'longitude',

                //['class' => 'yii\grid\ActionColumn'],
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '
                            <button class="viewrow1 glyphicon glyphicon-eye-open" data-viewid="' . $data->id_reference_point . '" data-lat="' . $data->latitude . '" data-long="' . $data->longitude . '"></button>
                            <button class="updaterow1 glyphicon glyphicon-pencil" data-updateid="' . $data->id_reference_point . '"></button>
                            
                            <button class="deleterow1 glyphicon glyphicon-trash" data-pointid="' . $data->id_reference_point . '"></button>
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
<script src="../../js/code.jquery.com_jquery-3.6.0.min.js"></script>

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
                    url: "<?=  Yii::$app->urlManager->createUrl(['reference-point/delete-row']) ?>",
                    method: 'POST',
                    data: {
                        id: id,

                    },
                    success: function(response) {
                        console.log(response); // Tampilkan respons di console
                        $.pjax.reload({container: '#pjax_id_point', async: false});
                        // Lakukan sesuatu setelah data berhasil dikirim
                        <?php
 if($defaultClear){ ?>                        window.location.href = '<?php echo Yii::$app->urlManager->createUrl(['reference-point/map','clear'=>'true']) ?>';
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
            var lat = $(this).data('lat');
            var long = $(this).data('long');
            console.log("id:"+id+"lat:"+lat+"long:"+long);
            focusToDetail(id, lat, long);

        });

        $('#index-panel').on('click', 'button[data-updateid]', function() {
            var id = $(this).data('updateid');
            //var lat = $(this).data('lat');
            //var long = $(this).data('long');
            console.log("id:"+id);
            
            // Get data melalui Ajax
            getDetailAjax(id);
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
    function showAddPanel() {
      var x = document.getElementById("mydiv2");
      clearAddPanel();
      if (x.style.display === "none") {
        map.getCanvas().style.cursor = 'pointer';
        x.style.display = "block";

      } else {
        x.style.display = "none";
        map.getCanvas().style.cursor = '';
      }
    }

    function clearAddPanel(){
        <?php
        $model = new \backend\models\ReferencePoint();
        foreach (array_keys($model->attributes ) as $key){
            echo "$('#add-form #point-".$key."').val('');";
        }
        ?>        console.log('clear');
    }

    function addRemoveItem(id, mode){
        console.log(id + " " + mode);
        $( "#alertMsg" ).html( "Please wait loading .." );
        //$.post("../point/remove-json-item/", {id: id,mode:mode}, function(data, status){
        $.post("<?= Yii::$app->urlManager->createUrl('reference-point/remove-json-item/') ?>", {id: id,mode:mode}, function(data, status){ 
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
        $.get("<?= Yii::$app->urlManager->createUrl('reference-point/clear-all-item/') ?>", function(data, status){
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
            zoom: 6,
            essential: true // this animation is considered essential with respect to prefers-reduced-motion
        });
    }

    function getDetailAjax(id){
        $( "#alertMsg" ).html( "Please wait loading .." );

        if(id > 0){
          document.body.style.cursor='wait';
          //$.post("get-detail/", {id: id}, function(data, status){
          //$.post("../get-detail/", {id: id}, function(data, status){ 
          $.post("<?= Yii::$app->urlManager->createUrl('reference-point/get-detail/') ?>", {id: id}, function(data, status){
            const obj = JSON.parse(data);
            console.log(data);
            console.log(obj.name);
            
            //$('#update-form #point-name').val(obj.name);
            <?php
            $model = new \backend\models\ReferencePoint();
            foreach (array_keys($model->attributes ) as $key){
                echo "$('#update-form #referencepoint-".$key."').val(obj.".$key.");";
            }
            ?>            showUpdatePanel(id);

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

  function setInputLatLang (lat, long) {
    console.log(lat);
    //Isi yang bagian add data
    //document.getElementById("point-latitude").value = lat;
    //document.getElementById("point-longitude").value = long;
    $('#add-form #referencepoint-latitude').val(lat);
    $('#add-form #referencepoint-longitude').val(long);

    //Isi yang bagian update data
    $('#update-form #referencepoint-latitude').val(lat);
    $('#update-form #referencepoint-longitude').val(long);
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
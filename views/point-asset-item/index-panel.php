<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="height: 300px; overflow-x: auto;">

    <div id="index-panel" class="box-body point-index overflow-x: auto; width: 100%;" style="padding: 4px;">

        <button class="btn btn-success btn-xsh" onclick="showAddPanel()">Add</button>
        <?= Html::a('Reload All', ['point-asset-item/map', 'mapstyle'=>"mapstreet"], ['class' => 'btn btn-success btn-xs']) ?>
        <?php /*
        <?= Html::a('Clear All', ['map', 'clear'=>"true"], ['class' => 'btn btn-warning btn-xs']) ?>
        */ ?>

        <?= Html::a('Flat Style', ['point-asset-item/map', 'mapstyle'=>"custom"], ['class' => 'btn btn-info btn-xs']) ?>
        <?= Html::a('Map Street Style', ['point-asset-item/map', 'mapstyle'=>"mapstreet"], ['class' => 'btn btn-warning btn-xs']) ?>
        <?php /*
        <p>
            <?= Html::a('Manual Add', ['create'], ['class' => 'btn btn-success btn-xs various fancybox.ajax']) ?>

        </p>
        */ 
        ?>
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
        \yii\widgets\Pjax::begin(['id' => 'pjax_id_point', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_point', 'neverTimeout'=>true]]);
        ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['class' => 'yii\grid\CheckboxColumn',
                    'header'=>'',
                    'checkboxOptions' => function($model, $key, $index, $widget) use ($defaultClear){

                        if ($model->id_point >0) {
                                return [
                                    'value' => $model->id_point, 
                                    'id' => 'el'.$model->id_point,
                                    'checked' => !$defaultClear, 
                                    'data-checkid'=> $model->id_point 
                                ];
                            }
                            return ['style' => ['display' => 'none']]; // OR ['disabled' => true]
                        },
                    
                ],
                'name',
                //'icon',
                //'color',
                //'latitude',
                //'longitude',

                //['class' => 'yii\grid\ActionColumn'],
                /*
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $data->id_point], [
                            //'class' => 'btn btn-danger',
                            'datadel-pointid' => $data->id_point,
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    },

                ],
                */
                /*
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return \yii\bootstrap\Button::widget([
                            'label' => '',
                            'options' => [
                                'class' => 'deleterow1 glyphicon glyphicon-trash',
                                'data-pointid' => $data->id_point
                            ],
                        ]);

                    },

                ],
                */
                [
                    'label' => 'Action',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '
                            <button class="viewrow1 glyphicon glyphicon-eye-open" data-viewid="' . $data->id_point . '" data-lat="' . $data->latitude . '" data-long="' . $data->longitude . '"></button>
                            <button class="updaterow1 glyphicon glyphicon-pencil" data-updateid="' . $data->id_point . '"></button>
                            
                            <button class="deleterow1 glyphicon glyphicon-trash" data-pointid="' . $data->id_point . '"></button>
                        ';

                    },

                ],
                /*
                [
                    'label' => 'Del',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '<button class="deleterow glyphicon glyphicon-trash" data-id="' . $data->id_point . '"></button>';

                    },

                ],
                */
                /*
                [
                    'label' => 'KINERJA',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '<input type="text" data-sasaran="' . $data->id_point . '" data-triwulan="' . $this->title . '">';

                    },

                ],
                */

                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {delete}',
                    'header' => 'Action',
                    'buttons' => [
                            'viewx' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'View'),]);
                                },
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', true, [
                                    'class' => 'pjax-delete-link',
                                    'delete-url' => $url,
                                    'pjax-container' => 'pjax_id_point',
                                    'title' => Yii::t('yii', 'Delete')
                                ]);
                            },
                            'view' => function ($url, $model) {
                                    //return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post'], 'data-ajax' => '1']);

                                    return ( Html::a('<span class="glyphicon glyphicon-trash"></span>', true, ['class' => 'ajaxDelete', 'delete-url' => $url, 'pjax-container' => 'pjax-list', 'title' => Yii::t('app', 'Delete'), 'data-pjax' => '0', 'data' => ['confirm' => 'Are you sure you want to delete this item?']]));

                            }

                    ],

                ],
                */
            ],
        ]); ?>

        <?php
        \yii\widgets\Pjax::end();
        ?>
    
    
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    /*
    $(document).ready(function() {
        $('button[data-id]').on('click', function() {
            var id = $(this).data('id');
            console.log("id:"+id);
            // Kirim data melalui Ajax
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl(['point/delete-row']) ?>",
                method: 'POST',
                data: {
                    id: id,

                },
                success: function(response) {
                    console.log(response); // Tampilkan respons di console
                    $.pjax.reload({container: '#pjax_id_point', async: false});
                    // Lakukan sesuatu setelah data berhasil dikirim
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
        });

        $('button[data-id]').on('click', function() {
            var id = $(this).data('id');
            console.log("id:"+id);

        });
    });
    */

    //After pjax reload, script tidak jalan
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
                    url: "<?php echo Yii::$app->urlManager->createUrl(['point/delete-row']) ?>",
                    method: 'POST',
                    data: {
                        id: id,

                    },
                    success: function(response) {
                        console.log(response); // Tampilkan respons di console
                        $.pjax.reload({container: '#pjax_id_point', async: false});
                        // Lakukan sesuatu setelah data berhasil dikirim
                        <?php if($defaultClear){ ?>
                        window.location.href = '<?php echo Yii::$app->urlManager->createUrl(['point/map','clear'=>'true']) ?>';
                        <?php } ?>
                        clearMainMap();
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
            console.log("Checkbox in this part Is checked");
            var id = $(this).data('checkid');
            console.log("id:"+id);
            if (this.checked) {
                console.log("Checkbox dengan ID " + id + " checked.");
                addRemoveItem(id, "add");
            } else {
                console.log("Checkbox dengan ID " + id + " unchecked.");
                addRemoveItem(id, "remove");
            }
        });

        if( $('#el122').is(':checked') ){
            console.log("id:");
        }
    });



    $(document).ready(function() {
        $('a[pjax-delete]').on('click', function() {
            var sasaran = $(this).data('id');
            
            
            alert("sasaran"+sasaran);
        });
    });

    $(document).ready(function() {
        $('input[data-sasaran]').on('change', function() {
            var sasaran = $(this).data('sasaran');
            
            var value = $(this).val();
            alert("sasaran"+sasaran+ value);

            // Kirim data melalui Ajax
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl('/penilaian/save-data') ?>",
                method: 'POST',
                data: {
                    sasaran: sasaran,
                    value: value,
                    triwulan: triwulan,
                    login: login
                },
                success: function(response) {
                    // console.log(response); // Tampilkan respons di console
                    // Lakukan sesuatu setelah data berhasil dikirim
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
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
        $model = new \backend\models\Point();
        foreach (array_keys($model->attributes ) as $key){
            echo "$('#add-form #point-".$key."').val('');";
        }
        ?>
        console.log('clear');
    }

    function addRemoveItem(id, mode){
        console.log(id + " " + mode);
        $( "#alertMsg" ).html( "Please wait loading .." );
        //$.post("../point/remove-json-item/", {id: id,mode:mode}, function(data, status){
        $.post("<?= Yii::$app->urlManager->createUrl('point/remove-json-item/') ?>", {id: id,mode:mode}, function(data, status){ 
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
        $.get("<?= Yii::$app->urlManager->createUrl('point/clear-all-item/') ?>", function(data, status){
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
      //var msgText = $( "#txtBarcode" ).val();
      
        if(id > 0){
          document.body.style.cursor='wait';
          //../point/get-detail/
          $.post("<?= Yii::$app->urlManager->createUrl('point/get-detail/') ?>", {id: id}, function(data, status){
           
            const obj = JSON.parse(data);
            console.log(data);
            console.log(obj.name);
            
            //$('#update-form #point-name').val(obj.name);
            <?php
            $model = new \backend\models\Point();
            foreach (array_keys($model->attributes ) as $key){
                echo "$('#update-form #point-".$key."').val(obj.".$key.");";
            }
            ?>
            showUpdatePanel(id);

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
    document.getElementById("point-latitude").value = lat;
    document.getElementById("point-longitude").value = long;

    //Isi yang bagian update data
    $('#update-form #point-latitude').val(lat);
    $('#update-form #point-longitude').val(long);
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

<?php
/*
$this->registerJs(
    "
    $(function() {
    $(document).on('click', '.ajaxDelete', function() {
        alert('Mlebu');
        var deleteUrl = $(this).attr('delete-url');

        var pjaxContainer = $(this).attr('pjax-container');     

                $.ajax({

                    url: deleteUrl,

                    type: \"post\",

                    dataType: 'json',

                    error: function(xhr, status, error) {

                        alert('There was an error with your request.' + xhr.responseText);

                    }

                }).done(function(data) {

                                $.pjax.reload({container: '#' + $.trim(pjaxContainer)});

                });         

        });
    }
    ");
    */
?>


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

    <div id="index-panel" class="box-body point-index overflow-x: auto; width: 100%;">

        
        <p>
            <?= Html::a('Manual Add', ['create'], ['class' => 'btn btn-success btn-xs various fancybox.ajax']) ?>

        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php 
        \yii\widgets\Pjax::begin(['id' => 'pjax_id_point', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_point', 'neverTimeout'=>true]]);
        ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'icon',
                'color',
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
                        return '<button class="deleterow1 glyphicon glyphicon-trash" data-pointid="' . $data->id_point . '"></button>';

                    },

                ],
                [
                    'label' => 'Del',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '<button class="deleterow glyphicon glyphicon-trash" data-id="' . $data->id_point . '"></button>';

                    },

                ],
                /*
                [
                    'label' => 'KINERJA',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        return '<input type="text" data-sasaran="' . $data->id_point . '" data-triwulan="' . $this->title . '">';

                    },

                ],
                */
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
            ],
        ]); ?>

        <?php
        \yii\widgets\Pjax::end();
        ?>
    
    
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
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
    });

    //After pjax reload, script tidak jalan
    //Solusi : https://forum.yiiframework.com/t/scripts-not-working-after-pjax-reload-container/82327/8
    $(document).ready(function() {
        $('#index-panel').on('click', 'button[data-pointid]', function() {
            var id = $(this).data('pointid');
            console.log("id:"+id);
            // Kirim data melalui Ajax
            const response = confirm("Are you sure delete this item?")
            if(response){
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
            }
        });
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


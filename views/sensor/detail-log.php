<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensor Logs';
$this->params['breadcrumbs'][] = $this->title;
$listdata=\yii\helpers\ArrayHelper::map(\backend\models\Sensor::find()->asArray()->all(), 'id_sensor', 'sensor_name');
?>
<div class="sensor-log-index box box-header">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_sensor_log',
//            'sensorLog.sensor_name',
            [
                'label' => 'Sensor Name',
                'attribute'=>'sensor.sensor_name',
                'filter'=> Html::activeDropDownList($searchModel, 'id_sensor', $listdata, ['class'=>'form-control','prompt'=>'- Select Sensor Name -']),
            ],

            'log_time',
            //'log_date',
            /*
            'value1',
            'value2',
            'value3',
            'value4',
            'value5',
            */
            [
                'label' => 'Lat',
                'attribute'=>'value1',
                'value' => function ($data) {
                    //return \common\helpers\BarcodeHelper::generateEAN($data->value1);
                    //return \common\helpers\GisHelper::convertNMEAToDegreeFormat("lat", $data->value1);
                    return ($data->value1);
                },
            ],
            [
                'label' => 'Long',
                'attribute'=>'value2',
                'value' => function ($data) {
                    //return \common\helpers\BarcodeHelper::generateEAN($data->value1);
                    //return \common\helpers\GisHelper::convertNMEAToDegreeFormat("long", $data->value2);
                    return ($data->value2);
                },
            ],
            [
                'label' => 'Speed',
                'attribute'=>'value3',
            ],
            [
                'label' => 'Suhu',
                'attribute'=>'value4',
            ],
            [
                'label' => 'Hum',
                'attribute'=>'value5',
            ],
            [
               'label'=>'CEK DI MAP',
               'format' => 'raw',
               'value'=>function ($data) {
                   $id = EncryptionDB::encryptor("encrypt",$data->id_sensor_log);
                   return Html::a('CEK DI MAP', ['check-on-map', 'u' => $id], ['class' => 'btn btn-sm btn-success']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                //'template'=>'{view}{delete}',
                'template'=>'{delete}',
                'buttons'=>[
                    /*
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },
                    */
                    'delete' => function($url, $model,$key){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_sensor_log], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.',
                                'method' => 'post',
                            ],
                        ]);
                    },

                ],
            ],
        ],
    ]); ?>
</div>

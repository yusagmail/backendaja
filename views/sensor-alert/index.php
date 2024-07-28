<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorAlertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sensor Alerts';
$this->params['breadcrumbs'][] = $this->title;
$listdata=\yii\helpers\ArrayHelper::map(\backend\models\Sensor::find()->asArray()->all(), 'id_sensor', 'sensor_name');
?>
<div class="sensor-alert-index box box-header">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_sensor_alert',
//            'sensor.sensor_name',
            [
                'label' => 'Sensore Name',
                'attribute'=>'sensor.sensor_name',
                'filter'=> Html::activeDropDownList($searchModel, 'id_sensor', $listdata, ['class'=>'form-control','prompt'=>'- Select Sensor Name -']),
            ],
            'channel',
            'channel_number',
            'first_appereance_time',
            //'first_appereance_value',
            //'last_appreance_time',
            //'last_appreance_value',
            //'is_case_open',
            //'alert_message',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{delete}',
                'buttons'=>[
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },
                    'delete' => function($url, $model,$key){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id_sensor_alert], [
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

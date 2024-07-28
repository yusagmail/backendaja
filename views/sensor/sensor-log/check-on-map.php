<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLog */

$this->title = $model->sensor->sensor_name;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sensor-log-view box box-header">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_sensor_log',
            'sensor.sensor_name',
            'log_time',
            //'log_date',
            //'value1',
//            'value2',
//            'value3',
//            'value4',
//            'value5',
        ],
    ]) ?>


    <div class="map-view box box-primary">  
        <div class="box-header with-border">
          <h3 class="box-title">Peta Geografi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body" style="">
        <?= $this->render('../sensor-log/_map_single', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>

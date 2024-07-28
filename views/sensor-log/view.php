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

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor_log], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_sensor_log',
            'sensor.sensor_name',
            'log_time',
            'log_date',
            'value1',
//            'value2',
//            'value3',
//            'value4',
//            'value5',
        ],
    ]) ?>

</div>

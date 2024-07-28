<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlert */

$this->title = $model->sensor->sensor_name;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Alerts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sensor-alert-view box box-header">

    <p>

        <?= Html::a('Delete', ['delete', 'id' => $model->id_sensor_alert], [
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
//            'id_sensor_alert',
            'sensor.sensor_name',
            'channel',
            'channel_number',
            'first_appereance_time',
            'first_appereance_value',
            'last_appreance_time',
            'last_appreance_value',
            'is_case_open',
            'alert_message',
        ],
    ]) ?>

</div>

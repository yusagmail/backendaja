<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLog */

$this->title = 'Update Sensor Log: ' . $model->id_sensor_log;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sensor_log, 'url' => ['view', 'id' => $model->id_sensor_log]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sensor-log-update box box-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

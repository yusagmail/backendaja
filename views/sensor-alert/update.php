<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlert */

$this->title = 'Update Sensor Alert: ' . $model->id_sensor_alert;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Alerts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sensor_alert, 'url' => ['view', 'id' => $model->id_sensor_alert]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sensor-alert-update box box-header">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

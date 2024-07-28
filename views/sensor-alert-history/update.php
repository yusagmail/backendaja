<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlertHistory */

$this->title = 'Update Sensor Alert History: ' . $model->id_sensor_alert_history;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Alert Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sensor_alert_history, 'url' => ['view', 'id' => $model->id_sensor_alert_history]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sensor-alert-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

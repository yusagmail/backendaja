<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorWarningParameter */

$this->title = 'Update Sensor Warning Parameter: ' . $model->id_sensor_warning_parameter;
$this->params['breadcrumbs'][] = ['label' => 'Sensor Warning Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sensor_warning_parameter, 'url' => ['view', 'id' => $model->id_sensor_warning_parameter]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sensor-warning-parameter-update box box-header">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

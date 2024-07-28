<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sensor */

$this->title = 'Update : ' . $model->sensor_name;
$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sensor, 'url' => ['view', 'id' => $model->id_sensor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sensor-update-view box box-header">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

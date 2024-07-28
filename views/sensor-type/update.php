<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorType */

$this->title = 'Update Sensor Type';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sensor_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sensor-type-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

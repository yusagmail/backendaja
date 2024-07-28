<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLabel */

$this->title = 'Update Sensor Label';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Label', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sensor_label]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sensor-label-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

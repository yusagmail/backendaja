<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorType */

$this->title = 'Tambah Sensor Type';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sensor-type-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

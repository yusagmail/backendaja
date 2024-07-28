<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasePendapatan */

$this->title = 'Update Base Pendapatan';
$this->params['breadcrumbs'][] = ['label' => 'Base Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_base_pendapatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body base-pendapatan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DefectaDetails */

$this->title = 'Update Defecta Details';
$this->params['breadcrumbs'][] = ['label' => 'Defecta Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_defecta_detail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body defecta-details-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Defecta */

$this->title = 'Update Defecta';
$this->params['breadcrumbs'][] = ['label' => 'Defecta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_defecta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body defecta-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jurnal */

$this->title = 'Update Jurnal';
$this->params['breadcrumbs'][] = ['label' => 'Jurnal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_jurnal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body jurnal-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

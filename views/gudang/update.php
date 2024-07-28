<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gudang */

$this->title = 'Update Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_gudang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body gudang-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

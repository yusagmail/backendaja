<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStock */

$this->title = 'Tambah Mutasi Stock';
$this->params['breadcrumbs'][] = ['label' => 'Mutasi Stock', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mutasi-stock-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

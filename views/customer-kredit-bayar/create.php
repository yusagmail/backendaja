<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerKreditBayar */

$this->title = 'Tambah Customer Kredit Bayar';
$this->params['breadcrumbs'][] = ['label' => 'Customer Kredit Bayar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body customer-kredit-bayar-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

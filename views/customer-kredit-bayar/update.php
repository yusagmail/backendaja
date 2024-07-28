<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerKreditBayar */

$this->title = 'Update Customer Kredit Bayar';
$this->params['breadcrumbs'][] = ['label' => 'Customer Kredit Bayar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_customer_kredit_bayar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body customer-kredit-bayar-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

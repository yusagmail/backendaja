<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerKredit */

$this->title = 'Update Customer Kredit';
$this->params['breadcrumbs'][] = ['label' => 'Customer Kredit', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_customer_kredit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body customer-kredit-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

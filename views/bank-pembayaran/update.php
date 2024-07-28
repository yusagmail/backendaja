<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BankPembayaran */

$this->title = 'Update Bank Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Bank Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_bank_pembayaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body bank-pembayaran-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

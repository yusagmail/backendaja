<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BankPembayaran */

$this->title = 'Tambah Bank Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Bank Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body bank-pembayaran-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

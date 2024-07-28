<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesJurnal */

$this->title = 'Tambah Pembayaran Bertahap';
$this->params['breadcrumbs'][] = ['label' => 'Sales Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Bertahap', 'url' => ['update-pembayaran-bertahap', 'i'=>$i]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sales-jurnal-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

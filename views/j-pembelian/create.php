<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JPembelian */

$this->title = 'Tambah J Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'J Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body jpembelian-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

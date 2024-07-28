<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JPembelian */

$this->title = 'Update J Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'J Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_j_pembelian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body jpembelian-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

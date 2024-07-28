<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */

$this->title = 'Data Barang di Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Data Barang di Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-dismantle-received-create">
	    <?= $this->render('_detail', [
	        'model' => $modelOrder,
	    ]) ?>
		
	    <?= $this->render('_detail_received', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

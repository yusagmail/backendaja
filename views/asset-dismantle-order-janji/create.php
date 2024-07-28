<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleOrder */

$this->title = 'Tambah Asset Dismantle Order';
$this->params['breadcrumbs'][] = ['label' => 'Asset Dismantle Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-dismantle-order-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

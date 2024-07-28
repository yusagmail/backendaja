<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleOrder */

$this->title = 'Update Work Order';
$this->params['breadcrumbs'][] = ['label' => 'Work Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_asset_dismantle_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body asset-dismantle-order-update">

	<h2>
            <?= Html::encode('Update Teknisi Only') ?>
     
</h2>

		
	    <?= $this->render('_formEdit', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

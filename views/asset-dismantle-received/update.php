<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */

$this->title = 'Update Asset Dismantle Received';
$this->params['breadcrumbs'][] = ['label' => 'Asset Dismantle Received', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_asset_dismantle_received]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body asset-dismantle-received-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

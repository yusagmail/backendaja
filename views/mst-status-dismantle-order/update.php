<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusDismantleOrder */

$this->title = 'Update Mst Status Dismantle Order';
$this->params['breadcrumbs'][] = ['label' => 'Mst Status Dismantle Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_status_dismantle_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-status-dismantle-order-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

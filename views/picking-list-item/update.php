<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PickingListItem */

$this->title = 'Update Picking List Item';
$this->params['breadcrumbs'][] = ['label' => 'Picking List Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_picking_list_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body picking-list-item-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

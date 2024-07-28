<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PickingListItem */

$this->title = 'Tambah Picking List Item';
$this->params['breadcrumbs'][] = ['label' => 'Picking List Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body picking-list-item-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusDismantleOrder */

$this->title = 'Tambah Mst Status Dismantle Order';
$this->params['breadcrumbs'][] = ['label' => 'Mst Status Dismantle Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-status-dismantle-order-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

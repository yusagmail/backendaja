<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemConditionLog */

$this->title = 'Tambah Asset Item Condition Log';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Condition Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-item-condition-log-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

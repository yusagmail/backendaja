<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */

$this->title = 'Tambah Pencabutan';
$this->params['breadcrumbs'][] = ['label' => 'Pencabutan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-dismantle-received-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

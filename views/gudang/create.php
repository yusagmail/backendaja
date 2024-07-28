<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gudang */

$this->title = 'Tambah Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body gudang-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

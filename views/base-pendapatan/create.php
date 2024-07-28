<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasePendapatan */

$this->title = 'Tambah Base Pendapatan';
$this->params['breadcrumbs'][] = ['label' => 'Base Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body base-pendapatan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

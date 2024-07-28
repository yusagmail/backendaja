<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

$this->title = 'Mutasi Barang Jadi';
$this->params['breadcrumbs'][] = ['label' => 'Barang Jadi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-finish-create">

	<div class="callout callout-success">
	    <h4>Petunjuk</h4>

	    <p>Fitur Mutasi cepat. Silakan ubah tempat gudang yang baru. 
	    .</p>
	</div>

	    <?= $this->render('view', [
	        'model' => $model,
	    ]) ?>
		
	    <?= $this->render('_form_mutasi', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

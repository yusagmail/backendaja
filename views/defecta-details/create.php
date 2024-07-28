<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DefectaDetails */

$this->title = 'Tambah Data Barang';
$this->params['breadcrumbs'][] = ['label' => 'Defecta', 'url' => ['defecta/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body defecta-details-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

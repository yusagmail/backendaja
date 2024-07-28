<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JurnalType */

$this->title = 'Update Jurnal Type';
$this->params['breadcrumbs'][] = ['label' => 'Jurnal Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_jurnal_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body jurnal-type-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

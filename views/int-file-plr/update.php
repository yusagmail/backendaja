<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IntFilePlr */

$this->title = 'Update Int File Plr';
$this->params['breadcrumbs'][] = ['label' => 'Int File Plr', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_int_file_plr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body int-file-plr-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

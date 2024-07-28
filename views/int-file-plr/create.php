<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IntFilePlr */

$this->title = 'Tambah Int File Plr';
$this->params['breadcrumbs'][] = ['label' => 'Int File Plr', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body int-file-plr-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

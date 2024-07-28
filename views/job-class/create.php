<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobClass */

$this->title = 'Tambah Job Class';
$this->params['breadcrumbs'][] = ['label' => 'Job Class', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body job-class-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JobClass */

$this->title = 'Update Job Class';
$this->params['breadcrumbs'][] = ['label' => 'Job Class', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_job_class]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body job-class-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Job */

$this->title = 'Update Job';
$this->params['breadcrumbs'][] = ['label' => 'Job', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_job]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body job-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

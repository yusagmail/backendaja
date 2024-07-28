<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Job */

$this->title = 'Tambah Job';
$this->params['breadcrumbs'][] = ['label' => 'Job', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body job-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BaseSalary */

$this->title = 'Update Base Salary';
$this->params['breadcrumbs'][] = ['label' => 'Base Salary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_base_salary]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body base-salary-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

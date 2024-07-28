<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalaryMonthly */

$this->title = 'Update Salary Monthly';
$this->params['breadcrumbs'][] = ['label' => 'Salary Monthly', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_salary_monthly]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body salary-monthly-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

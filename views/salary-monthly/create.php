<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalaryMonthly */

$this->title = 'Tambah Salary Monthly';
$this->params['breadcrumbs'][] = ['label' => 'Salary Monthly', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body salary-monthly-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

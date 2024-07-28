<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reports */

$this->title = 'Tambah Reports';
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body reports-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

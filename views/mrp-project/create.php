<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */

$this->title = 'Tambah Project';
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mrp-project-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

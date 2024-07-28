<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */

$this->title = 'Tambah Material In';
$this->params['breadcrumbs'][] = ['label' => 'Material In', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-in-create">

		
	    <?= $this->render('_form2', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

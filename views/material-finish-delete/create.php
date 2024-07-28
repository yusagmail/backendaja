<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinishDelete */

$this->title = 'Tambah Material Finish Delete';
$this->params['breadcrumbs'][] = ['label' => 'Material Finish Delete', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-finish-delete-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

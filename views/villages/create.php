<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Villages */

$this->title = 'Tambah Villages';
$this->params['breadcrumbs'][] = ['label' => 'Villages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body villages-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

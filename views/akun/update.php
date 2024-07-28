<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Akun */

$this->title = 'Update Akun';
$this->params['breadcrumbs'][] = ['label' => 'Akun', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_akun]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body akun-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

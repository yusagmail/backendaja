<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Akun */

$this->title = 'Tambah Akun';
$this->params['breadcrumbs'][] = ['label' => 'Akun', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body akun-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

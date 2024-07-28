<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Defecta */

$this->title = 'Tambah Defecta';
$this->params['breadcrumbs'][] = ['label' => 'Defecta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body defecta-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JurnalType */

$this->title = 'Tambah Jurnal Type';
$this->params['breadcrumbs'][] = ['label' => 'Jurnal Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body jurnal-type-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

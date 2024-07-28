<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialKategori1 */

$this->title = 'Update Material Kategori1';
$this->params['breadcrumbs'][] = ['label' => 'Material Kategori1', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_material]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body material-kategori1-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

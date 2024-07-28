<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDoItem */

$this->title = 'Tambah Supplier Material Item';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Do Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body supplier-do-item-create">


		<?= $this->render('_form_add', [
			'model' => $model,
		]) ?>

	</div>
</div>
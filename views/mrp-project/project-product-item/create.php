<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProjectProductItem */

$this->title = 'Tambah Mrp Project Product Item';
$this->params['breadcrumbs'][] = ['label' => 'Mrp Project Product Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mrp-project-product-item-create">

		<?= $this->render('../_view_project', [
            'model' => $modelParent,
        ]) ?>

	    <?= $this->render('/mrp-project/project-product-item/_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

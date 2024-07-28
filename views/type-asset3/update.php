<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset3 */

$this->title = 'Update Type Asset 3';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset 3', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body type-asset3-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

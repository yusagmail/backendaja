<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset4 */

$this->title = 'Update Type Asset 4';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset 4', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body type-asset4-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

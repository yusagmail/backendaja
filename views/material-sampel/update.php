<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSampel */

$this->title = 'Update Material Sampel';
$this->params['breadcrumbs'][] = ['label' => 'Material Sampel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_material_sampel, 'url' => ['view', 'id' => $model->id_material_sampel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body material-sampel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

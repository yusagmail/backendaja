<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterial */

$this->title = 'Update Struktur Material';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_struktur_material, 'url' => ['view', 'id' => $model->id_struktur_material]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body struktur-material-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

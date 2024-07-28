<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterialItem */

$this->title = 'Update Struktur Material Item';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material Item', 'url' => ['/struktur-material/view?id='.$model->id_struktur_material]];
$this->params['breadcrumbs'][] = ['label' => 'Struktur Material Item', 'url' => ['view', 'id' => $model->id_struktur_material_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body purchase-raw-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

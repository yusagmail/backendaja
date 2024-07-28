<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeOfSupplier */

$this->title = 'Update Type Of Supplier: ' . $model->type_of_vendor;
$this->params['breadcrumbs'][] = ['label' => 'Type Of Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_of_vendor, 'url' => ['view', 'id' => $model->id_type_of_vendor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-of-supplier-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

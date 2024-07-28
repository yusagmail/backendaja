<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */

$this->title = 'Update Basic Packing Item: ' . $model->id_basic_packing_item;
$this->params['breadcrumbs'][] = ['label' => 'Basic Packing Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_basic_packing_item, 'url' => ['view', 'id' => $model->id_basic_packing_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="basic-packing-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Warehouse */

$this->title = 'Update Warehouse: ' . $model->id_warehouse;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_warehouse, 'url' => ['view', 'id_warehouse' => $model->id_warehouse]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

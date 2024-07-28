<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierRaw */

$this->title = 'Update Master Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Master Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_supplier_raw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body customer-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
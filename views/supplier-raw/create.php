<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierRaw */

$this->title = 'Tambah Master Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Master Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body customer-create">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
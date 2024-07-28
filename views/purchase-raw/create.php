<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseRaw */

$this->title = 'Tambah Pembelian Greige';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body basic-purchase-raw">


        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
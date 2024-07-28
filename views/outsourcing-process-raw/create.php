<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutsourcingProcessRaw */

$this->title = 'Tambah Pengiriman Greige';
$this->params['breadcrumbs'][] = ['label' => 'Pengiriman Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body utsourcing-process-raw">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
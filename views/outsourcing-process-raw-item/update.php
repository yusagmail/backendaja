<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutsourcingProcessRawItem */

$this->title = 'Update Pengiriman Greige Item';
$this->params['breadcrumbs'][] = ['label' => 'Pengiriman Greige Item', 'url' => ['/outsourcing-process-raw/view?id='.$model->id_outsourcing_process_raw]];
$this->params['breadcrumbs'][] = ['label' => 'Pengiriman Greige Item', 'url' => ['view', 'id' => $model->id_outsourcing_process_raw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body purchase-raw-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutsourcingProcessRaw */

$this->title = 'Update Pengiriman Greige';
$this->params['breadcrumbs'][] = ['label' => 'Pengiriman Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_outsourcing_process_raw, 'url' => ['view', 'id' => $model->id_outsourcing_process_raw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body purchase-raw-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

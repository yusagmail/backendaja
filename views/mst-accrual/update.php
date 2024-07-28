<?php

/* @var $this yii\web\View */
/* @var $model backend\models\MstAccrual */

$this->title = 'Update Mst Accrual';
$this->params['breadcrumbs'][] = ['label' => 'Mst Accruals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mst_accrual, 'url' => ['view', 'id' => $model->id_mst_accrual]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-accrual-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

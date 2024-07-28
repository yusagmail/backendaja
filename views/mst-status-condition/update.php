<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusCondition */

$this->title = 'Update Mst Status Condition';
$this->params['breadcrumbs'][] = ['label' => 'Mst Status Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_mst_status_condition, 'url' => ['view', 'id' => $model->id_mst_status_condition]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-status-condition-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

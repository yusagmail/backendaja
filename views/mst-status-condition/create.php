<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusCondition */

$this->title = 'Create Mst Status Condition';
$this->params['breadcrumbs'][] = ['label' => 'Mst Status Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary mst-status-condition-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

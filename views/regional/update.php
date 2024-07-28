<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Regional */

$this->title = 'Update Regional: ' . $model->id_regional;
$this->params['breadcrumbs'][] = ['label' => 'Regionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_regional, 'url' => ['view', 'id_regional' => $model->id_regional]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regional-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

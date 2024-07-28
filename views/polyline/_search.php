<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PolylineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polyline-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_polyline') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'display_name') ?>

    <?= $form->field($model, 'color') ?>

    <?= $form->field($model, 'draw_style') ?>

    <?php // echo $form->field($model, 'created_ts') ?>

    <?php // echo $form->field($model, 'modified_ts') ?>

    <?php // echo $form->field($model, 'deleted_ts') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

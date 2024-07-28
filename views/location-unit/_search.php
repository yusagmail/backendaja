<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-unit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_location_unit') ?>

    <?= $form->field($model, 'id_location') ?>

    <?= $form->field($model, 'id_owner') ?>

    <?= $form->field($model, 'label1') ?>

    <?= $form->field($model, 'label2') ?>

    <?php // echo $form->field($model, 'label3') ?>

    <?php // echo $form->field($model, 'keterangan1') ?>

    <?php // echo $form->field($model, 'keterangan2') ?>

    <?php // echo $form->field($model, 'keterangan3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

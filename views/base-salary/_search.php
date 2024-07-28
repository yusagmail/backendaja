<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BaseSalarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="base-salary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_base_salary') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'gaji_pokok') ?>

    <?= $form->field($model, 'tunjangan1') ?>

    <?= $form->field($model, 'tunjangan2') ?>

    <?php // echo $form->field($model, 'tunjangan3') ?>

    <?php // echo $form->field($model, 'tunjangan4') ?>

    <?php // echo $form->field($model, 'tunjangan5') ?>

    <?php // echo $form->field($model, 'rate_lembur') ?>

    <?php // echo $form->field($model, 'rate_kehadiran') ?>

    <?php // echo $form->field($model, 'property1') ?>

    <?php // echo $form->field($model, 'property2') ?>

    <?php // echo $form->field($model, 'property3') ?>

    <?php // echo $form->field($model, 'property4') ?>

    <?php // echo $form->field($model, 'property5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

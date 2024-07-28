<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalaryMonthlySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salary-monthly-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_salary_monthly') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'bulan') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'gaji_pokok') ?>

    <?php // echo $form->field($model, 'tunjangan1') ?>

    <?php // echo $form->field($model, 'tunjangan2') ?>

    <?php // echo $form->field($model, 'tunjangan3') ?>

    <?php // echo $form->field($model, 'tunjangan4') ?>

    <?php // echo $form->field($model, 'tunjangan5') ?>

    <?php // echo $form->field($model, 'jml_lembur') ?>

    <?php // echo $form->field($model, 'jml_kehadiran') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

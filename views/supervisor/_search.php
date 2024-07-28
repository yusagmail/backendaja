<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SupervisorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supervisor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_supervisor') ?>

    <!-- <?= $form->field($model, 'nama') ?> -->

    <?= $form->field($model, 'nama_lengkap') ?>

    <!-- <?= $form->field($model, 'NIK') ?> -->

    <?= $form->field($model, 'nomor_telepon') ?>

    <!-- <?= $form->field($model, 'jabatan') ?> -->

    <?php // echo $form->field($model, 'id_regional') ?>

    <?php // echo $form->field($model, 'id_witel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

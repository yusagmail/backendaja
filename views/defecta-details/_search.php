<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DefectaDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="defecta-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['defecta/view'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_defecta_detail') ?>

    <?= $form->field($model, 'id_defecta') ?>


    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'satuan') ?>

    <?= $form->field($model, 'sisa') ?>

    <?php // echo $form->field($model, 'pemakaian_sebulan') ?>

    <?php // echo $form->field($model, 'kebutuhan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrp-project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mrp_project') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'project_name') ?>

    <?= $form->field($model, 'remark') ?>

    <?= $form->field($model, 'is_internal_order') ?>

    <?php // echo $form->field($model, 'is_main_order') ?>

    <?php // echo $form->field($model, 'plan_start_date') ?>

    <?php // echo $form->field($model, 'plan_end_date') ?>

    <?php // echo $form->field($model, 'actual_start_date') ?>

    <?php // echo $form->field($model, 'actual_end_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

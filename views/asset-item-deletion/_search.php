<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDeletionController */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-deletion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_deletion') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'status_deletion') ?>

    <?= $form->field($model, 'execution_date') ?>

    <?= $form->field($model, 'execution_month') ?>

    <?php // echo $form->field($model, 'execution_year') ?>

    <?php // echo $form->field($model, 'execution_id_user') ?>

    <?php // echo $form->field($model, 'execution_user') ?>

    <?php // echo $form->field($model, 'income') ?>

    <?php // echo $form->field($model, 'id_mst_status_condition') ?>

    <?php // echo $form->field($model, 'condition_when_deletion') ?>

    <?php // echo $form->field($model, 'acquisition_by') ?>

    <?php // echo $form->field($model, 'grant_to') ?>

    <?php // echo $form->field($model, 'photo1') ?>

    <?php // echo $form->field($model, 'photo2') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

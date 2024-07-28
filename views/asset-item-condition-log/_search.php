<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemConditionLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-condition-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_condition_log') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'id_mst_status_condition') ?>

    <?= $form->field($model, 'condition_log_date') ?>

    <?= $form->field($model, 'condition_log_datetime') ?>

    <?php // echo $form->field($model, 'condition_log_notes') ?>

    <?php // echo $form->field($model, 'reported_by') ?>

    <?php // echo $form->field($model, 'reported_user_id') ?>

    <?php // echo $form->field($model, 'reported_ip_address') ?>

    <?php // echo $form->field($model, 'photo1') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

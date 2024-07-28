<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemMaintenanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-maintenance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_maintenance') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'id_asset_master_criteria_maintenance') ?>

    <?= $form->field($model, 'last_primer_value') ?>

    <?= $form->field($model, 'maintenance_date') ?>

    <?php // echo $form->field($model, 'id_vendor') ?>

    <?php // echo $form->field($model, 'carried_to_vendor_by') ?>

    <?php // echo $form->field($model, 'estimated_day') ?>

    <?php // echo $form->field($model, 'status_maintenance') ?>

    <?php // echo $form->field($model, 'maintenance_finish_date') ?>

    <?php // echo $form->field($model, 'maintenance_cost') ?>

    <?php // echo $form->field($model, 'received_date') ?>

    <?php // echo $form->field($model, 'received_user') ?>

    <?php // echo $form->field($model, 'maintenance_info') ?>

    <?php // echo $form->field($model, 'sparepart_changes_info') ?>

    <?php // echo $form->field($model, 'last_condition_report') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

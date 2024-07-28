<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterCriteriaMaintenanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-master-criteria-maintenance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_master_criteria_maintenance') ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'criteria') ?>

    <?= $form->field($model, 'type_criteria') ?>

    <?= $form->field($model, 'periodic_value') ?>

    <?php // echo $form->field($model, 'metric') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

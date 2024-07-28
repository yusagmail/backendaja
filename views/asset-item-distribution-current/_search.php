<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDistributionCurrentController */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-distribution-current-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_distribution_current') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'distribute_to') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'id_departement') ?>

    <?php // echo $form->field($model, 'id_asset_item_location') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'start_month') ?>

    <?php // echo $form->field($model, 'start_year') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'handover_by') ?>

    <?php // echo $form->field($model, 'handover_condition_notes') ?>

    <?php // echo $form->field($model, 'id_mst_status_condition') ?>

    <?php // echo $form->field($model, 'handover_photos1') ?>

    <?php // echo $form->field($model, 'handover_photos2') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

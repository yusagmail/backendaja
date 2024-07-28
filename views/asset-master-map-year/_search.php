<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterMapYearSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-master-map-year-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_master_map_year') ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'current_count') ?>

    <?= $form->field($model, 'total_need') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'updated_user') ?>

    <?php // echo $form->field($model, 'updated_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

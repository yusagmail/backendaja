<?php

use backend\models\AssetMaster;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDistributionLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-distribution-log-form box box-primary">

    <style>
    div.required label.control-label:after {
    content: ' *';
    color: red;
    }
    </style>

    <?php
    //CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
    ?>
    <style>
    .form-group {
        margin-bottom: 2px;
    }
    </style>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt'=>'multipart/form-data'],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>
    <br>

    <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
    echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
        'data' => $dataAssetMaster,
        'options' => ['placeholder' => 'Pilih Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Asset'); ?>

    <?= $form->field($model, 'distribute_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'from_id_pegawai')->textInput() ?>

    <?= $form->field($model, 'id_departement')->textInput() ?>

    <?= $form->field($model, 'id_asset_item_location')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'start_month')->textInput() ?>

    <?= $form->field($model, 'start_year')->textInput() ?>

    <?= $form->field($model, 'status_distribution')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'end_month')->textInput() ?>

    <?= $form->field($model, 'end_year')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handover_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handover_condition_notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mst_status_condition')->textInput() ?>

    <?= $form->field($model, 'handover_photos1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handover_photos2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <div class="box-footer" style="
    margin-left: 12px;">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

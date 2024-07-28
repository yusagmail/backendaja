<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AssetMaster;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

//use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemRepair */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }

    .form-group {
        margin-bottom: 0px;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<div class="asset-item-repair box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>
    <div class="box-body">

        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'options' => ['encrypt' => 'multipart/form-data'],
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-8',
                ],
            ],
        ]); ?>
        <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
        echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
            'data' => $dataAssetMaster,
            'options' => ['placeholder' => 'Pilih Asset'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nama Asset'); ?>

        <?= $form->field($model, 'id_asset_item_incident')->textInput()->label('Asset Item Incident') ?>
        <?= $form->field($model, 'repair_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            'id' => 'assetitemrepair-repair_date',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>

        <?= $form->field($model, 'id_vendor')->textInput()->label('Vendor') ?>

        <?= $form->field($model, 'carried_to_vendor_by')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'estimated_day')->textInput() ?>

        <?= $form->field($model, 'status_repair')->textInput() ?>

        <?= $form->field($model, 'repair_finish_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            'id' => 'assetitemrepair-repair_finish_date',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>


        <?= $form->field($model, 'repair_cost')->textInput() ?>
        <?= $form->field($model, 'received_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            'id' => 'assetitemrepair-received_date',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>

        <?= $form->field($model, 'received_user')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'repair_info')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sparepart_changes_info')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_condition_report')->textInput(['maxlength' => true]) ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

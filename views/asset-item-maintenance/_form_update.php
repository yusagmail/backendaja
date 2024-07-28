<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemMaintenance */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }

    .form-group {
        margin-bottom: 2px;
    }
</style>
<div class="asset-item-maintenance-form box box-primary">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>
    <div class="box-header with-border">
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
        <?php
        $datas = \backend\models\AssetItem::find()
            ->orderBy(['id_asset_master' => SORT_ASC, 'number1' => SORT_ASC])
            ->all();
        $listValueAssetItem = array();
        foreach ($datas as $data) {
            if (isset($data->assetMaster)) {
                $listValueAssetItem[$data->id_asset_item] = $data->assetMaster->asset_name . ' - ' . $data->number1;
            } else {
                $listValueAssetItem[$data->id_asset_item] = $data->id_asset_master . ' - ' . $data->number1;
            }
        }

        echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
            'data' => $listValueAssetItem,
            'options' => ['placeholder' => 'Pilih Asset'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nama Asset'); ?>

        <?php $dataAssetMaster = ArrayHelper::map(\backend\models\AssetMasterCriteriaMaintenance::find()->asArray()->all(), 'id_asset_master_criteria_maintenance', 'criteria');
        echo $form->field($model, 'id_asset_master_criteria_maintenance')->widget(Select2::classname(), [
            'data' => $dataAssetMaster,
            'options' => ['placeholder' => 'Pilih Criteria'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Criteria'); ?>
        <?= $form->field($model, 'last_primer_value')->textInput() ?>
        <?= $form->field($model, 'maintenance_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'id' => 'assetitemmaintenance-maintenance_date',
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>



        <?php
        $dataVendor = ArrayHelper::map(
            \backend\models\Vendor::find()->asArray()->all(),
            'id_vendor',
            function($model) {
                return $model['name'].' - '.$model['company'];
            }
        );
//        $dataAssetMaster = ArrayHelper::map(\backend\models\Vendor::find()->asArray()->all(), 'id_vendor', 'name');
        echo $form->field($model, 'id_vendor')->widget(Select2::classname(), [
            'data' => $dataVendor,
            'options' => ['placeholder' => 'Pilih Vendor'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Vendor'); ?>

        <?= $form->field($model, 'carried_to_vendor_by')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'estimated_day')->textInput() ?>

        <?= $form->field($model, 'status_maintenance')->textInput() ?>
        <?= $form->field($model, 'maintenance_finish_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'id' => 'assetitemmaintenance-maintenance_finish_date',
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]); ?>

        <?= $form->field($model, 'maintenance_cost')->textInput() ?>

        <?= $form->field($model, 'received_date')->textInput()->widget(
            \dosamigos\datepicker\DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'id' => 'assetitemmaintenance-received_date',
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'defaultDate' => date('Y-mm-dd'),
            ]
        ]); ?>

        <?= $form->field($model, 'received_user')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'maintenance_info')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sparepart_changes_info')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_condition_report')->textInput(['maxlength' => true]) ?>

        <div class="box-footer" style="
    margin-left: 12px;">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

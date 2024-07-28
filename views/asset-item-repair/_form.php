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
                'defaultDate' => date('Y-mm-dd'),
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
                'defaultDate' => date('Y-mm-dd'),
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
                'defaultDate' => date('Y-mm-dd'),
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        $("#assetitemrepair-repair_date").datepicker({dateFormat: 'Y-mm-dd'}).val(today);
        $("#assetitemrepair-repair_finish_date").datepicker({dateFormat: 'Y-mm-dd'}).val(today);
        $("#assetitemrepair-received_date").datepicker({dateFormat: 'Y-mm-dd'}).val(today);
    });
</script>

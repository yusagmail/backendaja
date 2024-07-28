<?php

use backend\models\AssetMaster;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDeletion */
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
<div class="asset-item-deletion-form box box-primary">
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
            ->orderBy(['id_asset_master'=>SORT_ASC, 'number1'=>SORT_ASC])
            ->all();
        $listValueAssetItem = array();
        foreach($datas as $data){
            if(isset($data->assetMaster)){
                $listValueAssetItem[$data->id_asset_item] = $data->assetMaster->asset_name.' - '.$data->number1;
            }else{
                $listValueAssetItem[$data->id_asset_item] = $data->id_asset_master.' - '.$data->number1;
            }
        }

        echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
            'data' => $listValueAssetItem,
            'options' => ['placeholder' => 'Pilih Asset'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nomor Aset');
        ?>

        <?= $form->field($model, 'status_deletion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'execution_date')->textInput() ?>

        <?= $form->field($model, 'execution_month')->textInput() ?>

        <?= $form->field($model, 'execution_year')->textInput() ?>

        <?= $form->field($model, 'execution_id_user')->textInput() ?>

        <?= $form->field($model, 'execution_user')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'income')->textInput() ?>

        <?= $form->field($model, 'id_mst_status_condition')->textInput() ?>

        <?= $form->field($model, 'condition_when_deletion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'acquisition_by')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'grant_to')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'photo1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'photo2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

        <div class="box-footer" style="
    margin-left: 12px;">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php

use backend\models\AssetMaster;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterCriteriaMaintenance */
/* @var $form yii\widgets\ActiveForm */
?>

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
        margin-bottom: 0px;
    }
</style>
<div class="asset-master-criteria-maintenance box box-primary">
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
    echo $form->field($model, 'id_asset_master')->widget(Select2::classname(), [
        'data' => $dataAssetMaster,
        'options' => ['placeholder' => 'Pilih Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Asset'); ?>

    <?= $form->field($model, 'criteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_criteria')->textInput() ?>

    <?= $form->field($model, 'periodic_value')->textInput() ?>

    <?= $form->field($model, 'metric')->textInput() ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

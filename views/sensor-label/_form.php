<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLabel */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="sensor-label-form">

    
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php
    $dataSensor = ArrayHelper::map(
        \backend\models\SensorType::find()->all(),
        'id_sensor_type',
        function($model) {
            //$kode = $model->cid;
            return $model['sensor_type'];
        }
    );

    echo $form->field($model, 'id_sensor_type')->widget(Select2::classname(), [
        'data' => $dataSensor,
        'options' => ['placeholder' => 'Pilih Sensor Type'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php //= $form->field($model, 'id_sensor_type')->textInput() ?>

    <?php //= $form->field($model, 'type_channel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_channel')->dropDownList(
        ['analog' => 'analog', 'digital' => 'digital'],['prompt'=>'--PIlih--']
    ) ?>

    <?= $form->field($model, 'channel_number')->textInput() ?>

    <?= $form->field($model, 'channel_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batas_bawah')->textInput() ?>

    <?= $form->field($model, 'is_warning_batas_bawah')->textInput() ?>

    <?= $form->field($model, 'color_batas_bawah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batas_atas')->textInput() ?>

    <?= $form->field($model, 'is_warning_batas_atas')->textInput() ?>

    <?= $form->field($model, 'color_batas_atas')->textInput() ?>

    <?= $form->field($model, 'color_normal')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

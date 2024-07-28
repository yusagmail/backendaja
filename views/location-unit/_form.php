<?php

use backend\models\Location;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
</style>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="location-unit-form box box-primary">

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
    <?php $dataListAssetMaster = ArrayHelper::map(Location::find()->asArray()->all(), 'id_location', 'location_name');
    echo $form->field($model, 'id_location')->widget(Select2::classname(), [
        'data' => $dataListAssetMaster,
        'pluginOptions' => [
            'allowClear' => true
        ],
        'options' => [
            'prompt' => 'Lokasi']
    ])->label("Lokasi");
    ?>

    <?php $dataListAssetMaster = ArrayHelper::map(Location::find()->asArray()->all(), 'id_owner', 'name');
    echo $form->field($model, 'id_owner')->widget(Select2::classname(), [
        'data' => $dataListAssetMaster,
        'pluginOptions' => [
            'allowClear' => true
        ],
        'options' => [
            'prompt' => 'Owner']
    ])->label("Owner");
    ?>

    <?= $form->field($model, 'label1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'label2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'label3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan3')->textInput(['maxlength' => true]) ?>

    <div class="box-footer" style="
    margin-left: 12px;">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

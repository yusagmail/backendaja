<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemReservation */
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
<div class="asset-item-reservation-form">

    
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
    <?php //= $form->field($model, 'id_asset_item')->textInput() ?>

    <?php
    $dataList = \yii\helpers\ArrayHelper::map(\backend\models\AssetItem::find()->orderBy([
        'number1' => SORT_ASC
        ])->
        asArray()->all(), 'id_asset_item', 'number1');
    ?>

    <?= $form->field($model, 'id_asset_item')->dropDownList(
        $dataList,
        ['prompt' => 'Select Room ...']
    ); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_date')->textInput() ?>

    <?= $form->field($model, 'start_time')->textInput() ?>

    <?= $form->field($model, 'end_time')->textInput() ?>

    

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'reservation_time')->textInput() ?>

    <?= $form->field($model, 'reservation_name')->textInput(['maxlength' => true]) ?>

    <?php /*

    <?= $form->field($model, 'reservation_id_user')->textInput() ?>

    <?= $form->field($model, 'reservation_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reservation_phone')->textInput(['maxlength' => true]) ?>
    */ 
    ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

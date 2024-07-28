<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemEventParticipant */
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
<div class="asset-item-event-participant-form">

    
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
    <?= $form->field($model, 'id_asset_item_event')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'participant_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_affiliation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_confirm_present')->textInput() ?>

    <?= $form->field($model, 'is_present')->textInput() ?>

    <?= $form->field($model, 'checkin_time')->textInput() ?>

    <?= $form->field($model, 'checkout_time')->textInput() ?>

    <?= $form->field($model, 'has_print_certificate')->textInput() ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

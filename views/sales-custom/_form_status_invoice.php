<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: " *";
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

<div class="sales-order-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-4',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-8',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'status_invoice')->dropDownList([
            'BELUM' => 'BELUM', 
            'INVOICE' => 'INVOICE', 
            'CANCEL' => 'CANCEL ORDER',
        ],
        ['prompt' => 'Pilih Status Invoice ...']
    ); ?>

    <?php //= $form->field($model, 'status_pembayaran')->textInput(['maxlength' => true]) ?>


    <?php /*= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'nomor')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
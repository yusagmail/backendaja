<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialKategori1 */
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

<div class="material-kategori1-form">

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

    <div class="form-group">
        <label class="control-label col-lg-2" ></label>
        <div class="col-lg-10">
            <div class="alert alert-info">Silakan masukkan kode dalam bentuk 3 digit (angka, huruf atau kombinasi)</div>
        </div>
    </div>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'is_active')->textInput() ?>
    <?php //= $form->field($model, 'is_active')->radioList(array('1'=>'Active','0'=>'Not Active')) ?>

    <?= $form->field($model, 'is_active')->dropDownList(
        [ '1' => 'YA', '0' => 'TIDAK',]
    ); ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
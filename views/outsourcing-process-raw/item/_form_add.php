<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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

<div class="purchase-raw-item-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php // $form->field($model, 'id_material_support')->textInput() 
    ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterialRawKategori = \yii\helpers\ArrayHelper::map(\backend\models\MaterialRawKategori1::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material_raw_kategori', 'nama');
    ?>

    <?= $form->field($model, 'id_material_raw_kategori')->dropDownList(
        $listMaterialRawKategori,
        ['prompt' => 'Pilih Item ...']
    ); ?>

    <?= $form->field($model, 'yard')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?php //= $form->field($model, 'created_id_user')->textInput() 
    ?>

    <?php //= $form->field($model, 'created_date')->textInput() 
    ?>

    <?php //= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) 
    ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
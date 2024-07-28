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
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php
    echo $form->field($model, 'tanggal_order')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Customer::find()->orderBy([
        'nama_customer' => SORT_ASC
    ])->asArray()->all(), 'id_customer', 'nama_customer');
    ?>

    <?= $form->field($model, 'id_customer')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Customer ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\OutletPenjualan::find()->orderBy([
        'nama_outlet' => SORT_ASC
    ])->asArray()->all(), 'id_outlet_penjualan', 'nama_outlet');
    ?>

    <?= $form->field($model, 'id_outlet_penjualan')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Outlet ...']
    ); ?>

    <?= $form->field($model, 'nomor_sales_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor')->textInput() ?>

    <?= $form->field($model, 'month')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'invoice_total')->textInput() ?>

    <?= $form->field($model, 'bayar_total_bayar')->textInput() ?>

    <?= $form->field($model, 'bayar_cara')->textInput(['maxlength' => true]) ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\BankPembayaran::find()->orderBy([
        'nama_bank' => SORT_ASC
    ])->asArray()->all(), 'id_bank_pembayaran', 'nama_bank');
    ?>

    <?= $form->field($model, 'bayar_id_bank_pembayaran')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Bank ...']
    ); ?>

    <?= $form->field($model, 'bayar_uang_muka')->textInput() ?>

    <?= $form->field($model, 'bayar_bukti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_order')->textInput(['maxlength' => true]) ?>

    <?php /*= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
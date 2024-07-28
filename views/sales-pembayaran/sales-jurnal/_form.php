<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\SalesJurnal */
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

<div class="sales-jurnal-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-3',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-9',
            ],
        ],
    ]); ?>

    <?php /*
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sales_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_customer')->textInput(['maxlength' => true]) ?>
    */ ?>

    <?php //= $form->field($model, 'tanggal')->textInput() ?>

    <?php
    echo $form->field($model, 'tanggal')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php //= $form->field($model, 'id_akun_debit')->textInput() ?>

    <?= $form->field($model, 'debit')->textInput(['maxlength' => true])->label("Jumlah Bayar (debit)") ?>

    <?php //= $form->field($model, 'id_akun_kredit')->textInput() ?>

    <?php //= $form->field($model, 'kredit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'bayar_cara')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'bayar_cara')->dropDownList([
                'TUNAI' => 'TUNAI', 
                'TRANSFER' => 'TRANSFER', 
                //'TUNAI' => 'TUNAI', 
            ], // old
            ['prompt' => 'Pilih...']) ;
            
            ?>

    <?php //= $form->field($model, 'id_bank_pembayaran')->textInput() ?>


    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\BankPembayaran::find()->orderBy([
        'nama_bank' => SORT_ASC
    ])->asArray()->all(), 'id_bank_pembayaran', 'nama_bank');
    ?>

    <?= $form->field($model, 'id_bank_pembayaran')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Bank ...']
    ); ?>
    <?= $form->field($model, 'bayar_bukti')->fileInput(['maxlength' => true]) ?>
    <?php //= $form->field($model, 'bayar_bukti')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'jumlah_bayar')->textInput(['maxlength' => true]) ?>

    <?php /*
    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user_id')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

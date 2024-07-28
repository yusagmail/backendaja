<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseRaw */
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

<div class="purchase-raw-form">

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
    //Mengambil list dari tabel sebelah (supplier raw)
    $listSupplierRaw = \yii\helpers\ArrayHelper::map(\backend\models\SupplierRaw::find()->orderBy([
        'nama_supplier' => SORT_ASC
    ])->asArray()->all(), 'id_supplier_raw', 'nama_supplier');
    ?>

    <?= $form->field($model, 'id_supplier')->dropDownList(
        $listSupplierRaw,
        ['prompt' => 'Pilih Supplier ...']
    ); ?>

    <?= $form->field($model, 'nomor_kontrak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_surat_jalan')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
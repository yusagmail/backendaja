<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSampel */
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

<div class="material-sampel-form">

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
    //Mengambil list dari tabel sebelah (customer)
    $listCustomer = \yii\helpers\ArrayHelper::map(\backend\models\Customer::find()->orderBy([
        'nama_customer' => SORT_ASC
    ])->asArray()->all(), 'id_customer', 'nama_customer');
    ?>

    <?= $form->field($model, 'id_customer')->dropDownList(
        $listCustomer,
        ['prompt' => 'Pilih Customer ...']
    ); ?>

    <?= $form->field($model, 'nama_sampel')->textInput(['maxlength' => true]) ?>

    <?php
    //Mengambil list dari tabel sebelah (purchase raw)
    $listMateialRawKategori = \yii\helpers\ArrayHelper::map(\backend\models\MaterialRawKategori1::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material_raw_kategori', 'nama');
    ?>

    <?= $form->field($model, 'id_material_raw_kategori')->dropDownList(
        $listMateialRawKategori,
        ['prompt' => 'Pilih Material ...']
    ); ?>

    <?php
    echo $form->field($model, 'tanggal_minta_sampel')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            //'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'tanggal_keluar_sampel')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            //'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php
    //Mengambil list dari tabel sebelah (purchase raw)
    $listSubcontractor = \yii\helpers\ArrayHelper::map(\backend\models\Subcontractor::find()->orderBy([
        'nama_subcontractor' => SORT_ASC
    ])->asArray()->all(), 'id_subcontractor', 'nama_subcontractor');
    ?>

    <?= $form->field($model, 'id_subcontractor')->dropDownList(
        $listSubcontractor,
        ['prompt' => 'Pilih Subcontractor ...']
    ); ?>

    <h4>Keterangan Produk Jadi</h4>
    <hr>
    <?php
    //Mengambil list dari tabel sebelah (purchase raw)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Material::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material kategori 1)
    $listMaterialKategori1 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori1::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori1')->dropDownList(
        $listMaterialKategori1,
        ['prompt' => 'Pilih Warna...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material kategori 1)
    $listMaterialKategori2 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori2::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori2')->dropDownList(
        $listMaterialKategori2,
        ['prompt' => 'Pilih Jenis ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material kategori 1)
    $listMaterialKategori3 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori3::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori3')->dropDownList(
        $listMaterialKategori3,
        ['prompt' => 'Pilih Motif...']
    ); ?>

    <?php /*
    <?= $form->field($model, 'kode_barcode')->textInput(['maxlength' => true]) ?>
    */ ?>

    <?= $form->field($model, 'keterangan')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            'DITOLAK' => 'Ditolak',
            'ACC' => 'Acc',
            'DIUBAH' => 'Diubah',
        ],
        ['prompt' => 'Pilih Status...']
    ); ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
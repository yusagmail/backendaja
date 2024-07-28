<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSales */
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

<div class="material-sales-form">

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
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\SalesOrder::find()->orderBy([
        'id_sales_order' => SORT_ASC
    ])->asArray()->all(), 'id_sales_order', 'id_sales_order');
    ?>

    <?= $form->field($model, 'sales_id_sales_order')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Sales Order ...']
    ); ?>

    <?= $form->field($model, 'sales_harga_jual')->textInput() ?>

    <?php /* $form->field($model, 'sales_created_id_user')->textInput() ?>

    <?= $form->field($model, 'sales_created_date')->textInput() ?>

    <?= $form->field($model, 'sales_created_ip_address')->textInput(['maxlength' => true]) */ ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\MaterialFinish::find()->orderBy([
        'id_material_finish' => SORT_ASC
    ])->asArray()->all(), 'id_material_finish', 'kode');
    ?>

    <?= $form->field($model, 'id_material_finish')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material Finish ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Material::find()->orderBy([
        'id_material' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori1::find()->orderBy([
        'id_material' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori1')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material Kategori 1 ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori2::find()->orderBy([
        'id_material' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori2')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material Kategori 2 ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori3::find()->orderBy([
        'id_material' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori3')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material Kategori 3...']
    ); ?>

    <?= $form->field($model, 'yard')->textInput() ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'no_urut')->textInput() ?>

    <?= $form->field($model, 'no_urut_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_splitting')->textInput() ?>

    <?= $form->field($model, 'barcode_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_packing')->dropDownList(
        ['0' => 'BELUM PACKING', '1' => 'SUDAH PACKING']
    ); ?>

    <?php
    $listBackingPacking = \yii\helpers\ArrayHelper::map(\backend\models\BasicPacking::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_basic_packing', 'nama');
    ?>

    <?= $form->field($model, 'id_basic_packing')->dropDownList(
        $listBackingPacking,
        ['prompt' => 'Pilih Basic Packing ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\MaterialInItemProc::find()->orderBy([
        'id_material_in_item_proc' => SORT_ASC
    ])->asArray()->all(), 'id_material_in_item_proc', 'id_material_in_item_proc');
    ?>

    <?= $form->field($model, 'id_material_in_item_proc')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material In Item Proc ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\MaterialIn::find()->orderBy([
        'id_material_in' => SORT_ASC
    ])->asArray()->all(), 'id_material_in', 'id_material_in');
    ?>

    <?= $form->field($model, 'id_material_in')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material In ...']
    ); ?>

    <?= $form->field($model, 'is_join_packing')->dropDownList(
        ['0' => 'TIDAK ADA', '1' => 'JOIN',],
        [
            'onchange' => '
                selectFieldByType($(this).val());
            '
        ]

    ); ?>

    <?= $form->field($model, 'join_info')->textInput(['maxlength' => true]) ?>

    <?php
    $listGudang = \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()->orderBy([
        'nama_gudang' => SORT_ASC
    ])->asArray()->all(), 'id_gudang', 'nama_gudang');
    ?>

    <?= $form->field($model, 'id_gudang')->dropDownList(
        $listGudang,
        ['prompt' => 'Pilih Gudang ...']
    ); ?>

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
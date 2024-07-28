<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturMaterial */
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

<div class="struktur-material-form">

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

    <h4>Barang Jadi : </h4>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Material::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material kategori 1)
    $listMaterialKategori1 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori1::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori1')->dropDownList(
        $listMaterialKategori1,
        ['prompt' => 'Pilih ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material kategori 1)
    $listMaterialKategori2 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori2::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori2')->dropDownList(
        $listMaterialKategori2,
        ['prompt' => 'Pilih ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material kategori 1)
    $listMaterialKategori3 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori3::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori3')->dropDownList(
        $listMaterialKategori3,
        ['prompt' => 'Pilih ...']
    ); ?>

    <h4>Dibuat Dari Bahan : </h4>
    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterialRawKategori = \yii\helpers\ArrayHelper::map(\backend\models\MaterialRawKategori1::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material_raw_kategori', 'nama');
    ?>

    <?= $form->field($model, 'id_material_raw_kategori')->dropDownList(
        $listMaterialRawKategori,
        ['prompt' => 'Pilih Greige ...']
    ); ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
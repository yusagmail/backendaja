<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */
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

<div class="callout callout-warning">
    <p>Data-data terkait dengan material, warna, jenis, dll tidak dapat diubah. Karena dapat mengubah kode.
    </p>
</div>

<script>
    function selectFieldByType(val){
        switch(val){
            case "0":
                $('#join-info-div').hide();
                break;

            case "1":
                $('#join-info-div').show();
                break;

        }
    }
</script>

<div class="material-finish-form">

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
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>
    <?php /*
    <?= $form->field($model, 'id_material')->textInput() ?>

    <?= $form->field($model, 'id_material_kategori1')->textInput() ?>

    <?= $form->field($model, 'id_material_kategori2')->textInput() ?>

    <?= $form->field($model, 'id_material_kategori3')->textInput() ?>
    */ ?>

    <?php /*
    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Material::find()->orderBy([
        'nama' => SORT_ASC
        ])->
        asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material')->dropDownList(
        $listMaterial,
        ['prompt' => 'Pilih Material ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterialKategori1 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori1::find()->orderBy([
        'nama' => SORT_ASC
        ])->
        asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori1')->dropDownList(
        $listMaterialKategori1,
        ['prompt' => 'Pilih Kategori ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterialKategori2 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori2::find()->orderBy([
        'nama' => SORT_ASC
        ])->
        asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori2')->dropDownList(
        $listMaterialKategori2,
        ['prompt' => 'Pilih Kategori ...']
    ); ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterialKategori3 = \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori3::find()->orderBy([
        'nama' => SORT_ASC
        ])->
        asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material_kategori3')->dropDownList(
        $listMaterialKategori3,
        ['prompt' => 'Pilih Kategori ...']
    ); ?>
    */ ?>


    <?= $form->field($model, 'yard')->textInput(['maxlength' => 4]) ?>

   

    <?php //= $form->field($model, 'year')->textInput(['maxlength' => 4]) ?>

    <?php //= $form->field($model, 'no_urut')->textInput() ?>

    <?php //= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'no_urut_kode')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'barcode_kode')->textInput(['maxlength' => true]) ?>

    

    <?php //= $form->field($model, 'is_packing')->textInput() ?>

    <?php //= $form->field($model, 'id_basic_packing')->textInput() ?>

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
    $listGudang = \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()->orderBy([
        'nama_gudang' => SORT_ASC
    ])->asArray()->all(), 'id_gudang', 'nama_gudang');
    ?>

    <?= $form->field($model, 'id_gudang')->dropDownList(
        $listGudang,
        ['prompt' => 'Pilih Gudang ...']
    ); ?>

    <?= $form->field($model, 'is_join_packing')->dropDownList(
        ['0' => 'TIDAK ADA', '1' => 'JOIN', ], [
            'onchange'=>'
                selectFieldByType($(this).val());
            '
        ]

    ); ?>

    <?php
    $listPallete = \yii\helpers\ArrayHelper::map(\backend\models\PalletGudang::find()->orderBy([
        'nomor_pallet' => SORT_ASC
    ])->asArray()->all(), 'id_pallet_gudang', 'nomor_pallet');
    ?>

    <?= $form->field($model, 'id_pallet_gudang')->dropDownList(
        $listPallete,
        ['prompt' => 'Pilih Pallet ...']
    ); ?>

    <div id="join-info-div">
        <div class="form-group field-content-keyname required">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
                <div class="alert alert-info">Silakan isi dengan jumlah joinnya. Misalnya : 30+25
                </div>
            </div>
        </div>

        <?= $form->field($model, 'join_info')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?php /*

    <?= $form->field($model, 'id_material_in_item_proc')->textInput() ?>

    <?= $form->field($model, 'id_material_in')->textInput() ?>

    <?= $form->field($model, 'id_gudang')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<body onload="$('#join-info-div').hide();">


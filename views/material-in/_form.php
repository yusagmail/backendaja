<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */
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

<div class="material-in-form">

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
    ]);  ?>

    <?php //= $form->field($model, 'id_unit_poduksi')->textInput() ?>

    <?php
    //Mengambil list dari tabel sebelah (unit_produksi)
    $listUnitProduksi = \yii\helpers\ArrayHelper::map(\backend\models\UnitProduksi::find()->orderBy([
        'nama_unit' => SORT_ASC
        ])->
        asArray()->all(), 'id_unit_produksi', 'nama_unit');
    ?>

    <?= $form->field($model, 'id_unit_poduksi')->dropDownList(
        $listUnitProduksi,
    ); ?>

    <?php //= $form->field($model, 'id_material')->textInput() ?>

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

    <?= $form->field($model, 'varian')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'tanggal_proses')->textInput() ?>

    <?php
    echo $form->field($model, 'tanggal_proses')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);
    ?>

    <?= $form->field($model, 'catatan')->textInput(['maxlength' => true]) ?>

    <h4>Surat Jalan</h4>
    <?= $form->field($model, 'nomor_surat_jalan')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'tanggal_surat_jalan')->widget(datepicker::className(),[
                            'model' => $model,
                            'attribute' => 'date',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'endDate' =>date('Y-m-d'),
                            ]
                        ]);
    ?>



    <?php //= $form->field($model, 'created_id_user')->textInput() ?>

    <?php //= $form->field($model, 'created_date')->textInput() ?>

    <?php //= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

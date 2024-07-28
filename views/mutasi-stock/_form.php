<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStock */
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

<div class="mutasi-stock-form">

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

    <?php //= $form->field($model, 'tanggal_mutasi')->textInput() ?>

    <?php
    echo $form->field($model, 'tanggal_mutasi')->widget(datepicker::className(),[
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

    <?php //= $form->field($model, 'id_gudang_asal')->textInput() ?>
    <?php
    $dataListGudang = \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()->orderBy([
        'nama_gudang' => SORT_ASC
        ])->
        asArray()->all(), 'id_gudang', 'nama_gudang');
    ?>

    <?= $form->field($model, 'id_gudang_asal')->dropDownList(
        $dataListGudang,
        ['prompt' => 'Pilih Gudang Asal ...']
    ); ?>

    <?php //= $form->field($model, 'id_gudang_tujuan')->textInput() ?>

    <?= $form->field($model, 'id_gudang_tujuan')->dropDownList(
        $dataListGudang,
        ['prompt' => 'Pilih Gudang Tujuan ...']
    ); ?>

    <?php //= $form->field($model, 'id_pemberi_perintah')->textInput() ?>

    <?php
    $dataListPegawai = \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()->orderBy([
        'nama_lengkap' => SORT_ASC
        ])->
        asArray()->all(), 'id_pegawai', 'nama_lengkap');
    ?>

    <?= $form->field($model, 'id_pemberi_perintah')->dropDownList(
        $dataListPegawai,
        ['prompt' => 'Pilih Pemberi Perintah ...']
    ); ?>

    <?php //= $form->field($model, 'id_pelaksana_perintah')->textInput() ?>

    <?= $form->field($model, 'id_pelaksana_perintah')->dropDownList(
        $dataListPegawai,
        ['prompt' => 'Pilih Pelaksana Perintah ...']
    ); ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesRetur */
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
<div class="sales-retur-form">

    <?php //$form = ActiveForm::begin(); ?>
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

    <?php //= $form->field($model, 'id_sales_order')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'tanggal_retur')->textInput() ?>

    <?php
    echo $form->field($model, 'tanggal_retur')->widget(datepicker::className(), [
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

   

    <?php //= $form->field($model, 'id_penerima_barang')->textInput() ?>

    <?php
    $dataListPegawai = \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()->orderBy([
        'nama_lengkap' => SORT_ASC
        ])->
        asArray()->all(), 'id_pegawai', 'nama_lengkap');
    ?>

    <?= $form->field($model, 'id_penerima_barang')->dropDownList(
        $dataListPegawai,
        ['prompt' => 'Pilih Penerima Barang ...']
    ); ?>

     <?= $form->field($model, 'alasan_retur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catatan_kondisi_barang')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

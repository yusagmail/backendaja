<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\OutsourcingProcessRaw */
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

<div class="outsourcing-process-raw-form">

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
    echo $form->field($model, 'tanggal_proses')->widget(datepicker::className(), [
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
    $listSubcontractors = \yii\helpers\ArrayHelper::map(\backend\models\Subcontractor::find()->orderBy([
        'nama_subcontractor' => SORT_ASC
    ])->asArray()->all(), 'id_subcontractor', 'nama_subcontractor');
    ?>

    <?= $form->field($model, 'id_subcontractor')->dropDownList(
        $listSubcontractors,
        ['prompt' => 'Pilih Subcontractor ...']
    ); ?>

    <?= $form->field($model, 'nomor_kontrak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_surat_jalan')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
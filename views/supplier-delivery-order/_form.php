<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDeliveryOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-delivery-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    //Mengambil list dari tabel sebelah (unit_produksi)
    $listSupplier = \yii\helpers\ArrayHelper::map(\backend\models\Supplier::find()->orderBy([
        'name_company' => SORT_ASC
    ])->asArray()->all(), 'id_supplier', 'name_company');
    ?>

    <?= $form->field($model, 'id_supplier')->dropDownList(
        $listSupplier,
    ); ?>

    <?= $form->field($model, 'nomor_surat_jalan')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'tanggal_surat_jalan')->widget(datepicker::className(), [
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

    <?= $form->field($model, 'nomor_invoice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
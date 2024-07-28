<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDoItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-do-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_supplier_delivery_order')->textInput() 
    ?>

    <?php
    //Mengambil list dari tabel sebelah (unit_produksi)
    $listMaterial = \yii\helpers\ArrayHelper::map(\backend\models\Material::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material', 'nama');
    ?>

    <?= $form->field($model, 'id_material')->dropDownList(
        $listMaterial,
    ); ?>

    <?= $form->field($model, 'varian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>

    <?= $form->field($model, 'total_price')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?php /* $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user_id')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
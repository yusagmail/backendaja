<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basic-packing-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id_material_support')->textInput() 
    ?>

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listMaterialSupport = \yii\helpers\ArrayHelper::map(\backend\models\MaterialSupport::find()->orderBy([
        'nama' => SORT_ASC
    ])->asArray()->all(), 'id_material_support', 'nama');
    ?>

    <?= $form->field($model, 'id_material_support')->dropDownList(
        $listMaterialSupport,
        ['prompt' => 'Pilih Material Pendukung ...']
    ); ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'created_id_user')->textInput() ?>

    <?php //= $form->field($model, 'created_date')->textInput() ?>

    <?php //= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>